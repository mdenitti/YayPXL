@extends('layouts.theme')

@section('content')
<h1>Thank you for your confidence {{$validation['name']}}</h1>

You have enrolled in our class:
<h4>{{$course}}</h4>

Your details are:
<div>
{{$validation['name']}} <hr>
{{$validation['email']}} <hr>
{{$validation['phone']}} <hr>
{{$validation['bdate']}} <hr>
</div>

@endsection