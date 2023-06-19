<!DOCTYPE html>
<html lang="en">
<head>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard </title> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src={{asset('/Media/digital.png')}} alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">A2R</span>
                    <span class="profession">Digital Product</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                {{-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> --}}

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{route('dashboard.index')}}"@if (Request::is('dashboard')) class="active"@else @endif>
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('dashboard.Revenue')}}"@if (Request::is('dashboard/Revenue')) class="active"@else @endif>
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('dashboard.products')}}"@if (Request::is('dashboard/products') or Request::is('dashboard/products/type') or Request::is('dashboard/products/show/*'))  class="active"@else @endif>
                            <i class="fa-brands fa-product-hunt icon"></i>
                            <span class="text nav-text">Products</span>
                        </a>
                    </li>
                    

                    <li class="nav-link">
                        <a href="{{route('dashboard.add')}}"@if (Request::is('dashboard/products/add')) class="active"@else @endif>
                            <i class='bx bx-plus icon' ></i>
                            <span class="text nav-text">add Product</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{route('dashboard.order')}}"@if (Request::is('dashboard/order')) class="active"@else @endif>
                            <i class="bx bx-box icon"></i>
                            <span class="text nav-text">order</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                     <button type="submit" id="logout">
                        <li class="">
                            <a href="#" class="logOut">
                                <i class='bx bx-log-out icon' ></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>
                     </button>
                </form>
                

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">
            @yield('content')
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>