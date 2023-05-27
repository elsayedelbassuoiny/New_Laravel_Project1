<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <h1>{{$subject->name}}</h1>
    <div>{{$subject->code}}</div>

    <div>{{$subject->department->name}} ({{$subject->department->code}})</div>
    {{-- <div>{{$department->name}}</div> --}}

    {{-- @foreach (json_decode($subject->files) as $file)
        {{$file}}
        <br>
    @endforeach --}}

    <a href="/subjects/{{$subject->id}}/files/create">Upload Files</a>
</body>
</html>
