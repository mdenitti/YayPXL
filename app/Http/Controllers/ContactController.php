<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

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

        Mail::raw('YooHoo: '.request('question') .' - '.request('phone'), function($message){ $message->to(request('email'))
        ->subject('Vraag van: ' . request('name'));
        });

        return view('contact.yay')->with('message','Email send to the administrators'); 
        // session var 'message'
        }
}
