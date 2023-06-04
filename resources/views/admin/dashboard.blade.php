@extends('admin.layout')
@section('content')
<h1>dashboard</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
     <button type="submit">logout</button>
</form>
@endsection