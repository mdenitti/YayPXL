@extends('layouts.theme')

@section('content')
<h1>Signup student</h1>

<form method="post" action="/students">
@csrf
<div class="form-group">
        <label for="">Uw volledige naam</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-3">
        <label for="">Uw email</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group mt-3">
        <label for="">Geboortedatum</label>
        <input type="date" class="form-control" name="bdate" value="{{ old('bdate') }}">
        </div>
        <div class="form-group mt-3">
        <label for="">Telefoon</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
        </div>

       <div class="form-group mt-3">
      <label for="exampleFormControlSelect1">Kies uw cursus</label>
        <select class="form-control" name="course">
            @foreach ($courses as $course)
            <option value="{{$course->id}}">{{$course->course_name}} - €{{$course->price}}</option>
            @endforeach
        </select>
      </div>
        <input type="submit" class="btn btn-warning mt-3" value="Enroll in our course">
</form>


@endsection