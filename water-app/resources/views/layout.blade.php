<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Custom Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"rel="stylesheet">
  </head>
  <body>
     @include('include.header')
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
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
  </body>
</html>
