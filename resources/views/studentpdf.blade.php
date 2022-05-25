<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        html, body {
            font-family: sans-serif;
        }
        .page-break {
            page-break-after: always;
            }
    </style>
</head>
<body>
    <h1>Student inschrijving bewijs</h1>
    <h2>{{$student->name}}</h2>
    {{$student->email}}<hr>
    {{$student->phone}}<hr>
    {{$student->bdate}}<hr>
    <div class="page-break"></div>
    <h3>Is ingeschreven voor volgende opleiding</h3>
    @foreach ($student->course as $course)
        {{$course->course_name}}
    @endforeach
</body>
</html>


