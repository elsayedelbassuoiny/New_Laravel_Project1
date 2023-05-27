<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <h1 class="d-print-none">Name : {{$students->name}}</h1>
    <div class="d-print-none">Email : {{$students->email}}</div>
    <div class="d-print-none">Password : {{$students->password}}</div>
    <div class="d-print-none">Level : {{$students->level}}</div>
    <div class="d-print-none">Acadimic Number : {{$students->acadimic_number}}</div>

    
    <br>
    <form action="{{ route('students.destroy', $students->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    
</body>
</html>