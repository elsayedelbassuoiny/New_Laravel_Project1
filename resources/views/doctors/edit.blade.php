<!DOCTYPE html>
<html>
  <head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{asset('css/add_subject.css')}}">
    
  </head>
  <body>
    <div class="form-container">
      <form action="{{ route('doctors.update',$doctors->id)}}" method="POST" id="my-form">
    @csrf
    @method('PUT')
      
        <div class="form-group">
          <label for="name">user name:</label>
          <input type="text" id="name" name="name" value="{{$doctors->name}}" required>
        </div>
        <div class="form-group">
          <label for="code">Email:</label>
          <input type="text" id="email" name="email" value="{{$doctors->email}}"required>
        </div>
        <div class="form-group">
            <label for="code">Password:</label>
            <input type="text" id="password" name="password" value="{{$doctors->password}}"required>
          </div>
          <div class="form-group">
            <input type="submit" value="Send">
            <input type="button" value="Clear"onclick="clearForm()">
          </div>
      </form>
    </div>

    <script src="{{asset('js/add_subject.js')}}"></script>
  </body>
</html>
