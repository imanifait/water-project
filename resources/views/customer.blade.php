@extends('layout')
@section('title', 'Customer')
@section('content')
<div class="container">
  <div class="mt-5"> 
  </div>
    <form action="{{route('customer.post')}}" method="POST"class="ms-auto me-auto mt-auto"style ="width: 500px">
      @csrf
        <div class="mb-3">
          <h2>Customer</h2>
          
          <label class="form-label">First name</label>
          <input type="text" class="form-control" name="first_name" id="first_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Second name</label>
            <input type="text" class="form-control" name="second_name" id="second_name">
          </div>
        <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
          </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
          <div class="mb-3">
            <label class="form-label">Mobile number</label>
            <input type="char" class="form-control" name="mobile_number" id="mobile_number">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> 
 @endsection