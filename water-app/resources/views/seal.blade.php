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
       <h2>Registered Seals</h2>
       <a href="{{ route('sealregistration') }}" class="btn btn-primary" style="display: inline-block; float: right;">Add Seal</a>
      <form method="POST" action="{{route('performAction2')}}">
        @csrf
       <table class="table">
        <thead>
           <tr>
            <th>ID</th>
             <th>Batch No</th>
             <th> Serial Start No</th>
             <th> Serial End No</th>
             <th>Quantity</th>
             <th>Status</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody> 
          
           @foreach($seals->all() as $seal)
           <tr>
              <td>{{ $seal->id}}</td>
              <td>{{ $seal->batch_no }}</td>
              <td>{{ $seal->serial_start_no }}</td>
              <td>{{ $seal->serial_end_no }}</td>
              <td>{{ $seal->quantity = $seal->serial_end_no - $seal->serial_start_no}}</td>
              <td>{{ $seal->status }}</td>
              
              <td>
                <a href="{{route('editseal', $seal->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('deleteseal', $seal->id)}}" class="btn btn-danger">Delete</a>
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