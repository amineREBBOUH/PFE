<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    {{-- nav bar --}}
    <nav>
          <div class="div1">
            <img src={{asset('/Media/digital.png')}} alt="" />
            <ul>
                <li ><a href=""name="G" class="a ">Games <i class="fa-solid fa-angle-right" ></i></a></li>
                <li ><a href=""name="M"class="a ">Material <i class="fa-solid fa-angle-right"></i></a></li>
                <li ><a href=""name="S"class="a ">Services <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href=""name="N"class="a ">News <i class="fa-solid fa-angle-right"></i></a></li>
                <li ><a href=""name="Sh"class="a ">Shop <i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
          </div>
          <div class="div2">
            <a href="{{route('login')}}"><button>login</button></a>
             <span><i class="fa fa-search" aria-hidden="true"></i></span>
             <span><i class="fa fa-bars" aria-hidden="true"id="bars"></i></span>
          </div>
        
        </nav>
        {{-- end nav bar --}}
        {{-- body --}}
        <div id="body">
            <img src={{asset('/Media/digital.png')}} alt="" id="img1"/>
            <div id="pict1" class="bag anim">
                <div>
                    <h1>Great Game You can't miss in 2023</h1>
                    <p>From Innovative indie games to cutting-edge big budget title,<br />discover the most exicting games coming to ps5 next year</p>
                    <button>Start Exploring</button>
                </div>
            </div>
            <div id="pict2" class="bag rem ">
                <div class="div22">
                <h1>Adventures are Unforgetable</h1>
                <p>Play as one the Straw Hat crew members in this all-new RPG set in <br />the World of the hit anime One Piece ,out Now on ps4 and ps5</p>
                <button>More Informations</button>
                </div>
            </div>
            <div id="pict3" class="bag rem">
                <div>
                <h1><img src={{asset('/Media/logo3.png')}} alt="" />Live a New Reality</h1>
                <p>Move than 3à Games are on track to accompany the launch of ps VR2, <br />including a free update for Gran Turisom7,while other titles  <br />in developement ,such as Beat Saber</p>
                <button>More Informations</button>
                </div>
            </div>
            <div id="pict4" class="bag rem">
                 <div id="div44">
                   <h1>Explore  Great Holiday Deals</h1>
                   <p>Incredibale offres are available with the renwal of the January  Super Promo ,Descover what's New</p>
                   <button id="btns">see Offre</button>
                 </div>
            </div>
            
           
        </div>
        <div class="slider" id="slider">
            <div class="item on" >
                <img src={{asset('/Media/pict1.png')}} alt=""onclick="move(this)"id="0" />
            </div>
            <div class="item ">
            <img src={{asset('/Media/pict2.png')}} alt="" onclick="move(this)"id="1"/>
            </div>
            <div class="item ">
            <img src={{asset('/Media/pict3.png')}} alt="" onclick="move(this)" id="2"/>
            </div>
            <div class="item ">
            <img src={{asset('/Media/pict4.png')}} alt="" onclick="move(this)" id="3"/>
            </div>
        </div>
        {{-- end body --}}
        {{-- products --}}
        <div id="Products">
            <button id="prev" onclick="decrease()"><i class="fa-solid fa-angle-left" ></i></button>
              <div class="product active">
               <div class="infoP">
                   <h1> PlayStation 5 Console</h1>
                   <p>Enjoy a whole new generation <br /> of great PlayStation games.</p>
                   <button>Learn More</button>
               </div>
               <div class="pictP"><img src={{asset('/Media/Products/playstation-5.png')}} alt="" /></div>
              </div>
              <button id="next" onclick="increase()"><i class="fa-solid fa-angle-right" ></i></button>
            </div>
        {{-- end products --}}
        {{-- lastest --}}
        <div id="lastest">
            <div class="l1">
            <div class="l11">
             <div>
             <h1> <img src={{asset('/Media/ps_0.png')}} alt="" /> PlayStation Plus </h1>
             <p>Enhance your PlayStation experience with access to online multiplayer <br/> games of the month, exclusive discounts and more.</p>
             <button>Browse PlayStation Plus</button>
             </div>
            </div>
            <div class="l22">
            <img src={{asset('/Media/games.png')}} alt="" class="g ani"/>
            </div>
            </div>
            <div class="l2">
               <div id="su">
                 <img src={{asset('/Media/png.png')}} alt="" />
                 <h1>Season 4 has started</h1>
                 <button>More Informations</button>
               </div>
            </div>
         </div>
        {{-- end lastest --}}
        {{-- games --}}
        <div id="games">
            <h1>New Games</h1>
            <div class="cont gg">
            
            @foreach ($games1 as $game1)
                <div class="itemG" >
                <div><img src={{$game1['img']}} alt="" /></div>
                <p>{{$game1['name']}}</p>
             </div>
            @endforeach
            </div>
            <div class="cont">
                @foreach ($games2 as $game2)
                <div class="itemG" >
                    <div><img src={{$game2['img']}} alt="" /></div>
                    <p>{{$game2['name']}}</p>
                </div>
                @endforeach
            </div>
          
        </div>
        {{-- end games --}}
        {{-- new --}}
        <div id="new">
            <div id="Ninfo">
             <div>
                 <img src={{asset('/Media/New00.png')}} alt="" />
                 <h2>New PlayStation  Store Discounts</h2>
                 <p>Discover the latest seasonal offers and promotions <br/> on the best games and additional content for PS5 <br/> and PS4.</p>
                 <button>See All Offers</button>
             </div>
            </div>
            <div id="Npict"></div>
         </div>
        {{-- end new --}}
        {{-- clothes --}}
        <div id="Clothes">
            <div class="Cinfo">
                <img src={{asset('/Media/C.png')}} alt="" />
                <h2>Officially licensed PlayStation <br/> apparel and merchandise</h2>
                <p>Browse the PlayStation Gear store for official accessories,<br/> collectibles, apparel and more</p>
            </div>
            <div class="Cpict">
                <div class="CLitem">
                    <div><img src={{asset('/Media/Gear/C1.webp')}} alt="" /></div>
                    <h3>PlayStation™ Heritage Zip Hoodie</h3>
                    <button>Buy Now</button>
                </div>
                <div class="CLitem">
                    <div><img src={{asset('/Media/Gear/C2.webp')}} alt="" /></div>
                    <h3>PlayStation™ Logo T-Shirt</h3>
                    <button>Buy Now</button>
                </div>
                <div class="CLitem">
                    <div><img src={{asset('/Media/Gear/C3.webp')}} alt="" /></div>
                    <h3>PlayStation™ 47 - Cap</h3>
                    <button>Buy Now</button>
                </div>
                <div class="CLitem">
                    <div><img src={{asset('/Media/Gear/C4.webp')}} alt="" /></div>
                    <h3>PlayStation™ Heritage Mug</h3>
                    <button>Buy Now</button>
                </div>
            </div>
            <div class="btnC"> <button>Descover The Collctions</button></div> 
        </div>
        {{-- end clothes --}}

        {{-- social media --}}
        <div id="Social">
            <h1>Follow Us In the Social Networks</h1>
            <div >
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>  
          </div>
        </div>
        {{-- end social media --}}
        {{-- footer --}}
        <div id="footer">
            <div class="container">
             <div class="row">
              <div class="footer-col sp">
                  <img src={{asset('/Media/digital.png')}} alt=""/>	
              </div>
                 <div class="footer-col">
                     <h4>company</h4>
                     <ul>
                         <li><a href="#">about us</a></li>
                         <li><a href="#">our services</a></li>
                         <li><a href="#">privacy policy</a></li>
                         <li><a href="#">affiliate program</a></li>
                     </ul>
                 </div>
                 <div class="footer-col">
                     <h4>get help</h4>
                     <ul>
                         <li><a href="#">FAQ</a></li>
                         <li><a href="#">shipping</a></li>
                         <li><a href="#">returns</a></li>
                         <li><a href="#">order status</a></li>
                         
                     </ul>
                 </div>
                 <div class="footer-col">
                     <h4>online shop</h4>
                     <ul>
                         <li><a href="#">watch</a></li>
                         <li><a href="#">bag</a></li>
                         <li><a href="#">shoes</a></li>
                         <li><a href="#">dress</a></li>
                     </ul>
                 </div>
             </div>
         </div>
          </div>
        {{-- end footer --}}
        <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
        <script src="{{asset('/js/main.js')}}"></script>
    </body>
</html>