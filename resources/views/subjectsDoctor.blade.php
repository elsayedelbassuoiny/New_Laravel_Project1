<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach ($subjects as $subject)
        <a href="/subjects/{{$subject->id}}">{{$subject->name}} <br> {{$subject->code}}</a>
        <br>
        <hr>
    @endforeach

</body>
</html>
