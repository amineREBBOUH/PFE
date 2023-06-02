<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/store.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<nav>
    <div class="logo">
        <a href="/store">  <div id="logo"><img src="{{asset('/Media/digital.png')}}" alt=""><span>Digital</span></div></a>
        <div class="items">
            <ul>
                <li  @if (Request::is('store/games')) class="item active" @else class="item" @endif><a href="/store/games">games</a></li>
                <li  @if (Request::is('store/random_key')) class="item active" @else class="item" @endif><a href="/store/random_key">random key</a></li>
                <li  @if (Request::is('store/software')) class="item active" @else class="item" @endif><a href="/store/software">software</a></li>
                <li  @if (Request::is('Gallery/create')) class="item active" @else class="item" @endif><i class="fa-solid fa-list"></i> categories 
                    <ul class="dropdown">
                        <li><a href="#">Sub-1</a></li>
                        <li><a href="#">Sub-2</a></li>
                        <li><a href="#">Sub-3</a></li>
                      </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="features">
        <i class="fa-regular fa-face-smile"></i>
        <i class="fa-regular fa-heart"></i>
        <i class="fa-solid fa-cart-shopping"></i>
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</nav>
@yield('content')
</body>
</html>