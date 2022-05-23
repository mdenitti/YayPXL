@extends('layouts.theme')

@section('content')
<h1>My Personal details</h1>

{{-- @foreach ($students as $row)

{{$row->id}} - {{$row->name}} - {{$row->email}} <a class="btn btn-primary btn-sm" href="/student/{{$row->id}}">Details</a>
<hr>
@endforeach --}}
{{$student}}

@if (Auth::user()->role_id == 1) 
<button class="btn btn-primary">Teacher custom button</button>
@endif

@endsection