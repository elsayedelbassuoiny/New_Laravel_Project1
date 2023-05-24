<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <h1 class="d-print-none">Name : {{$doctors->name}}</h1>
    <div class="d-print-none">Email : {{$doctors->email}}</div>
    <div class="d-print-none">Password : {{$doctors->password}}</div>


    
    <br>
    <form action="{{ route('doctors.destroy', $doctors->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-primary" type="submit">Delete</button>

    </form>
    
</body>
</html>