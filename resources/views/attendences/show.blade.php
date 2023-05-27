<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <h1>{{$subject->name}}</h1>
    <div>{{$subject->code}}</div>

    <a href="/attendences/{{$subject->id}}/subscribe">Generate Student Names</a>
</body>
</html>
