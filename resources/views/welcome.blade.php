@extends('layouts.theme')

@section('content')
<h1>Welcome.blade.php</h1>

@php 
$results = App\Models\Student::with('course')->get();
//dd($results);
@endphp

@foreach ($results as $result)
  <hr>  {{$result->name}}<hr>
    @foreach ($result->course as $course)
        {{$course->course_name}}
    @endforeach
@endforeach


@endsection