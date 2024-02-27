@extends('layout')
@section('title', 'sealregistration')
@section('content')
<div class="container">
  <div class="mt-5"> 
  </div>
    <form action="{{route('sealregistration.post')}}" method="POST"class="ms-auto me-auto mt-auto"style ="width: 500px">
      @csrf
        <div class="mb-3">
          <h2>Register Seal</h2>
          
          <label class="form-label">Batch No</label>
          <input type="text" class="form-control" name="batch_no" id="batch_no">
        </div>
        <div class="mb-3">
            <label class="form-label">Serial Start No</label>
            <input type="text" class="form-control" name="serial_start_no" id="serial_start_no">
          </div>
          <div class="mb-3">
            <label class="form-label">Serial End No</label>
            <input type="text" class="form-control" name="serial_end_no" id="serial_end_no">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> 
 @endsection
 

 {{-- <select class="form-select" name="serial_no" id="serial_no">
  <option value="serial1">Serial 1</option>
  <option value="serial2">Serial 2</option>
  <option value="serial3">Serial 3</option>
  <!-- Add more options as needed -->
</select>  --}} 