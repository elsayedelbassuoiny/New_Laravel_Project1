<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/adding-department.css')}}">

    <title>Document</title>
</head>
<body>

        @foreach ($doctors as $doctors)
        <div class="container">
            <a href="{{ route('doctors.show',$doctors -> id)}} " class="doc-title"> Dr :{{$doctors -> name}} </a>
            <a href="{{ route('doctors.edit',$doctors -> id)}}" class="edit">
                Edit
            </a>

        </div>

        @endforeach

        <div class="add">
            <a href="{{ route('doctors.create')}}">
              <button type="button" class="btn-add" id="show-form-btn">Add Doctor</button>
            </a>
         </div>
</body>
</html>
