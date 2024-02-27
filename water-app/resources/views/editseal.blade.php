@extends('layout')
@section('title', 'Seal details')
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
    <form action="{{route('updateseal', $seal->id)}}" method="POST"class="ms-auto me-auto mt-auto"style ="width: 500px">
      @csrf
      @method('PUT')
        <input type="hidden" name="seal_id" value="{{ $seal->id }}">
        <div class="mb-3">
          <label class="form-label">Batch No</label>
          <input type="text" class="form-control" name="batch_no" id="batch_no" value="{{ $seal->batch_no}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Serial Start No</label>
            <input type="text" class="form-control" name="serial_start_no" id="serial_start_no" value="{{ $seal->serial_start_no }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Serial End No</label>
            <input type="text" class="form-control" name="serial_end_no" id="serial_end_no" value="{{ $seal->serial_end_no }}" required>
          </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
</div> 
 

@endsection 