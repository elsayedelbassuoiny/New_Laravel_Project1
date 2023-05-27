<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/adding-department.css')}}">
    
    <title>Document</title>
</head>
<body>
    
        @foreach ($students as $students)
        <div class="container">
            <a href="{{ route('students.show',$students -> id)}} " class="dep-title">{{$students -> name}} </a>
            <a href="{{ route('students.edit',$students -> id)}}" class="edit">
                Edit
            </a>
           
        </div>    
        
        @endforeach 

        <div class="add">
            <a href="{{ route('students.create')}}">
              <button type="button" class="btn-add" id="show-form-btn">Add New Student</button>
            </a>
         </div> 
</body>
</html>