<!DOCTYPE html>
<html>
  <head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{asset('css/add_subject.css')}}">
    
  </head>
  <body>
    <div class="form-container">
      <form action="{{ route('students.update',$students->id)}}" method="POST" id="my-form">
    @csrf
    @method('PUT')
      
        <div class="form-group">
          <label for="name">user name:</label>
          <input type="text" id="name" name="name" value="{{$students->name}}" required>
        </div>
        <div class="form-group">
          <label for="code">Email:</label>
          <input type="text" id="email" name="email" value="{{$students->email}}"required>
        </div>
        <div class="form-group">
            <label for="code">Password:</label>
            <input type="text" id="password" name="password" value="{{$students->password}}"required>
          </div>
          <div class="form-group">
            <label for="code">level:</label>
            <input type="text" id="level" name="level" value="{{$students->level}}"required>
          </div>
          <div class="form-group">
            <label for="code">Acadimic Number:</label>
            <input type="text" id="acadimic_number" name="acadimic_number" value="{{$students->acadimic_number}}"required>
          </div>
          <div class="form-group">
            <input type="submit" value="Send">
            <input type="button" value="Clear" onclick="clearForm()">
          </div>
      </form>
    </div>

    <script src="{{asset('js/add_subject.js')}}"></script>
  </body>
</html>
