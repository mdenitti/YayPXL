<!DOCTYPE html> 
<html lang="en"> 
<head>
    <title>Document</title> 
    <style>
        body {
             font-family: Arial, Helvetica, sans-serif;
        } 
    </style>
</head>
<body>
    <img src="{{ asset('assets/img/logo.png')}}">
    <h1>Bedankt voor uw contactaanvraag</h1>
    <div><b>Uw naam: </b>{{$name}}</div>
    <div><b>Uw vraag: </b>{{$question}}</div>
    <div><br><br>Wij contacteren u ASAP,<br>mvg SynPXL</div>
</body>
</html>


