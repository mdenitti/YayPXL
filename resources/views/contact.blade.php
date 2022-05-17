@extends('layouts.theme')

@section('content')
<h1>Contact.blade.php</h1>
<form method="post" action="/contact" enctype="multipart/form-data">
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
        <label for="">Telefoon</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group mt-3">
        <label for="">Uw vraag</label>
        <textarea class="form-control" name="question"></textarea>
        </div>

        
        <input type="submit" class="btn btn-warning mt-3" value="Stel uw vraag">
</form>
@endsection