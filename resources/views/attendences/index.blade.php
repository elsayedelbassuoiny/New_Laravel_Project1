<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>


        @foreach ($subjects as $subject)

         <div>
                <a href="{{ route('attendences.show',$subject -> id)}} " class="name">
                    {{$subject -> name}}
                </a>


         </div>


        @endforeach
</body>
</html>
