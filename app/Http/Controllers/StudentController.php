<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    public function showAll() {
        // $result = \DB::table('student')->get();
        $result = Student::get();
        //dd($result);
        return view('students',['students' => $result]);
    }

    public function showStudent($id) {
        $result = Student::where('id', $id)->firstOrFail();
        //dd($result);
        return view('student',['student' => $result]);
    }

    public function store (Request $request) {
    //    dd($request->name);
    //    $student = new Student;
    //    $student->name = $request->name;
    //    $student->email = $request->email;
    //    $student->phone = $request->phone;
    //    $student->bdate = $request->bdate;
    //    $student->save();

    // First we validate!
    $validation = $request->validate([
        'name' => 'required',
        'email' => 'required | email',
        'phone' => 'required | max:400',
        'bdate' => 'required',
        'course' => 'required'
    ]);

    // then we store, if e-mail is non existant
    //dd($validation); 
    $student = Student::firstOrCreate(
        ['email' => $request->input('email')],
        [ 
            'name' => $request->input('name'), 
            'email' => $request->input('email'), 
            'phone' => $request->input('phone'), 
            'bdate' => $request->input('bdate')
        ]);

        // we check if succes and do something...
        if($student->wasRecentlyCreated) {
            // Fill the pivot table, no need to worrie about the course_id or student_id
            // All magical provided trought conventions in Laravel
            $student->course()->attach($request->input('course'));
            // on the succes page, i want to reproduce the data provided by the student
            // pluck returns an array with the key as paramter
            $course = Course::find($request->input('course'))->pluck('course_name')->first();
            return view('signupok',compact('validation','course'));
        } else {
           return view('signupfail');
        }

    }
}
