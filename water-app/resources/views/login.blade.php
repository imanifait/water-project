@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container">
  <div class="mt-5"> 
  </div>
    <form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <div class="input-group">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
      <button type="button" id="password-toggle" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
        <i id="password-icon" class="bi bi-eye"></i>
      </button>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
   </form>
</div> 
<script>
function togglePasswordVisibility() {
var passwordInput = document.getElementById("password");
var passwordIcon = document.getElementById("password-icon");

if (passwordInput.getAttribute("type") === "password") {
  passwordInput.setAttribute("type", "text");
  passwordIcon.classList.remove("bi-eye");
  passwordIcon.classList.add("bi-eye-slash");
} else {
  passwordInput.setAttribute("type", "password");
  passwordIcon.classList.remove("bi-eye-slash");
  passwordIcon.classList.add("bi-eye");
}
}
</script>
@endsection