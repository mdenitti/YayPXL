<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
    public function store(Request $request) {
        //return request();
        $validate = request()->validate(
            ['name' => 'required',
             'email' => 'required|email', 
             'phone' => 'required', 
             'question' => 'required'
        ]); 
        
        Contact::Create($validate);
        //Yoohoo mails

        // Plain old, text mails... for internal use only
        // Mail::raw('YooHoo: '.request('question') .' - '.request('phone'), function($message){ $message->to(request('email'))
        // ->subject('Vraag van: ' . request('name'));
        // });

        Mail::send('mails.contact', $validate, function($message){ $message->to(request('email'))
            ->subject('Vraag van: ' . request('name')); });

            toast('Yay','success')->autoClose(5000)->position('top-end');
            Alert::success('Success Title', 'Success Message');
            return view('contact.yay',$validate);
        
        // optional, post our contactinfo to an external API... Http::post facade
        // $response = Http::post('https://reqres.in/api/users',$validate);
    
        // session var 'message'
        
        }
        
}
