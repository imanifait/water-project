@extends('layout')
@section('title', 'Staff details')
{{-- @auth
   {{auth()->staff()}}
   @endauth --}}
@section('content')
<div class="container">
  {{-- <div class="mt-5"> 
    @if ($errors->any())
         <div class="col-12">
             @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>  
             @endforeach
         </div>     
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>  
    @endif

    @if(session()->has('success'))
         <div class="alert alert-success">{{session('success')}}</div>  
    @endif
  </div> --}}
    <form action="{{route('update', $staff->id)}}" method="POST"class="ms-auto me-auto mt-auto"style ="width: 500px">
      @csrf
      @method('PUT')
        <input type="hidden" name="staff_id" value="{{ $staff->id }}">
        <div class="mb-3">
          <label class="form-label">First name</label>
          <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $staff->first_name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Second name</label>
            <input type="text" class="form-control" name="second_name" id="second_name" value="{{ $staff->second_name }}" required>
          </div>
        <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $staff->last_name }}" required>
          </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{ $staff->email }}" required>
        </div>
          <div class="mb-3">
            <label class="form-label">Mobile number</label>
            <input type="char" class="form-control" name="mobile_number" id="mobile_number" value="{{ $staff->mobile_number }}" required>
          </div>
        {{-- <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name ="password" id="password" value="{{ $customer->password }}" required>
        </div> --}}
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
</div> 
 

@endsection 