@extends('store.seeting.layout')
@section('content')
<form class="password" method="post" action="{{route('store.passwordPost')}}">
    @csrf
    <h3 class="mb-4">Password Settings</h3>
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                  <label>Old password</label>
                  <input type="password" class="form-control">
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                  <label>New password</label>
                  <input type="password" class="form-control" name="password">
                  @error('password')
                  <p class="error">{{$message}}</p>
                      
                  @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                  <label>Confirm new password</label>
                  <input type="password" class="form-control" name="password_confirmation">
                  @error('password_confirmation')
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