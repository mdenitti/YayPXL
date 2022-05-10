@extends('layouts.theme')

@section('content')
<h1>Detail page Student {{$student->name}}</h1>

{{$student->id}}
{{$student->name}} 
{{$student->email}}
@endsection