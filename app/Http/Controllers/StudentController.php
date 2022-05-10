<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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
        //dd($request->name);
       $student = new Student;
       $student->name = $request->name;
       $student->email = $request->email;
       $student->phone = $request->phone;
       $student->bdate = $request->bdate;
       $student->save();
    }
}
