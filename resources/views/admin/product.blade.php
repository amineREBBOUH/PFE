@extends('admin.layout')
@section('content')
<h1>product</h1>
<div id="types">

<a href="{{route('dashboard.type'). '?category=1'}}">
<figure>
    <img src="{{asset('images/games.jpg')}}" alt="">
    <figcaption>The games</figcaption>
</figure>
</a>
<a href="{{route('dashboard.type'). '?category=2'}}">
<figure >
    {{-- style="--c:#fff5" --}}
    <img src="{{asset('images/films.jpg')}}" alt="">
    <figcaption>the films</figcaption>
</figure>
</a>
<a href="{{route('dashboard.type'). '?category=3'}}">
    <figure >
        <img src="{{asset('images/iptv.jpg')}}" alt="">
        <figcaption>the Iptv</figcaption>
    </figure>
    </a>
</div>
@endsection