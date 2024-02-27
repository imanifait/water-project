{{-- @extends('layout')
@section('title',"Home Page") --}}
{{-- @auth
   {{auth()->user()}}
   @endauth --}}
{{-- @section('content') --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"rel="stylesheet">
  </head>
  <body>
    @if ($errors->any())
    <div class="col-12">
        @foreach ($errors->all() as $error)
           <div class="alert alert-danger" id="error-message">{{$error}}</div>  
        @endforeach
        <script>
          var errorMessage = document.getElementById("error-message");
          if (errorMessage) {
            setTimeout(function() {
              errorMessage.style.display = 'none';
            }, 3000);
          }
        </script>
    </div>     
    @endif
    @if(session('success'))
        <div class="alert alert-success" id="success-message" role="alert">
          {{ session('success') }}
        </div>
        <script>
          var successMessage = document.getElementById("success-message");
          if (successMessage) {
            setTimeout(function() {
              successMessage.style.display = 'none';
            }, 3000);
          }
        </script>
    @endif
    <div class="container mt-5">
       <h2>Registered Staff</h2>
       <a href="{{ route('registration') }}" class="btn btn-primary" style="display: inline-block; float: right;">Add Staff</a>
      <form method="POST" action="{{route('performAction')}}">
        @csrf
       <table class="table">
        <thead>
           <tr>
             <th>ID</th>
             <th>First Name</th>
             <th>Second Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Mobile Number</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody> 
           @foreach($users->all() as $user)
           <tr>
              <td>{{ $user->id}}</td>
              <td>{{ $user->first_name }}</td>
              <td>{{ $user->second_name }}</td>
              <td>{{ $user->last_name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->mobile_number }}</td>
              <td>
                <a href="{{route('edit', $user->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('delete', $user->id)}}" class="btn btn-danger">Delete</a>
              </td>
           </tr>
           @endforeach
         </tbody>
       </table>
      </form>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
   
 {{--    
// @endsection --}}