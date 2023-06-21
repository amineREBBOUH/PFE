@extends('store.seeting.layout')
@section('content')
<form class="accountinfo" method="post" action="{{route('store.seetingPost')}}">
    @csrf
    <h3 class="mb-4">Account Settings</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                  <label> Name</label>
                  <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
                  @error('name')
                       <p class="error">{{$message}}</p>
                  @enderror
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" value="Acharya">
                  
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" value="{{old('email',$user->email)}}" name="email">
                  @error('email')
                  <p class="error">{{$message}}</p>
             @enderror
            </div>
        </div>
        
        
        
        
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Update</button>
        <button class="btn btn-light">Cancel</button>
    </div>
</form>
@endsection