@extends('store.layout_Nav')
@section('content')
    <h1>{{$type}}</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
         <button type="submit">logout</button>
    </form>
@endsection