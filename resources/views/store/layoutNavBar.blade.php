 <nav>
  <div class="logo"><a href="{{route('store')}}"><h1>A2R</h1></a></div>
    <div id="search">
      {{-- <div class="search"> --}}
        <form action="{{route('store.search')}}" method="get"class="search">
        <select name="category" id="">
          <option selected disabled>Choose </option>
          <option value="games">Games</option>
          <option value="software">software</option>
          <option value="books">Books</option>
          <option value="subscriptions">subscriptions</option>
        </select>
        <input type="search" name="name" id="" placeholder="searche....?" />
        <button>search</button>
      </form>
      {{-- </div> --}}
    </div>
    <div style="display: flex">
      <div class="options">
        <ul>
            <a href="{{route('store.seeting')}}">
          <li>
            <i class="fa-regular fa-face-smile"></i><span>account</span>
          </li></a>
          <a href="{{route('store.shopping.cart')}}">
            <li>
                <i class="fa-solid fa-cart-shopping"></i><span>My Cart</span>
              </li>
          </a>
          <a href="{{route('store.wichlist')}}">
          <li><i class="fa-regular fa-heart"></i><span>Wishlist</span></li></a>
          <a id="loggout">
          <li>
            <form  method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit">
              <i class="fa-solid fa-arrow-right-from-bracket"></i
              ><span>logout</span>
            </button>
        </form>
          </li></a>
        </ul>
      </div>
      <div class="toogle" id="toogle">
        <i class="fa fa-bars"></i>
      </div>
    </div>
</nav>
  <div id="search" class="search2 f">
    {{-- <div class="search S2"> --}}
      <form action="{{route('store.search')}}" method="get"class="search S2">
      <select name="category" id="">
        <option selected disabled>Choose one</option>
        <option value="games">Games</option>
          <option value="software">software</option>
          <option value="books">Books</option>
          <option value="subscriptions">subscriptions</option>
      </select>
      <input type="search" name="name" id="" placeholder="searche....?" />
      <button>search</button>
    </form>
    {{-- </div> --}}
  </div>
  <div id="responsive">
    <div class="logo">
      <div><h1>A2R</h1></div>
      <div><i class="fa fa-times" id="times"></i></div>
    </div>
    <div class="wrap">
      <div class="social">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-skype"></i>
        <i class="fa-brands fa-dropbox"></i>
        <i class="fa-brands fa-apple"></i>
      </div>
    </div>
    <div id="search" class="search2 B">
      <div class="search S2">
        <input type="search" placeholder="searche....?" id="fieldS" />
        <button>search</button>
      </div>
    </div>
    <div class="items_res">
      <ul>
        <a href=""><li>fff</li></a>
        <a href=""><li>fff</li></a>
        <a href=""><li>fff</li></a>
        <a href=""><li>fff</li></a>
        <div id="OP">
          <a href=""
            ><li>
              <i class="fa-regular fa-face-smile"></i><span>account</span>
            </li></a
          >
          <a href=""
            ><li>
              <i class="fa-solid fa-cart-shopping"></i><span>My Cart</span>
            </li></a
          >
          <a href=""
            ><li>
              <i class="fa-regular fa-heart"></i><span>Wishlist</span>
            </li></a
          >
          <li class="logout">
            <button>
              <i class="fa-solid fa-arrow-right-from-bracket"></i
              ><span>logout</span>
            </button>
          </li>
        </div>
      </ul>
    </div>
  </div>

