@extends('layouts.theme')

@section('content')
<h1>My students</h1>

@foreach ($students as $row)

{{$row->id}} - {{$row->name}} - {{$row->email}} <a class="btn btn-primary btn-sm" href="/student/{{$row->id}}">Details</a>
<hr>
@endforeach
@endsection