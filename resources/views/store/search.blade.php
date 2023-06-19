<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('store.links')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            color: #444444;
        }

        a,
        a:hover {
            text-decoration: none;
            color: inherit;
        }

        .section-products {
            padding: 80px 0 54px;
        }

        .section-products .header {
            margin-bottom: 50px;
        }

        .section-products .header h3 {
            font-size: 1rem;
            color: #fe302f;
            font-weight: 500;
        }

        .section-products .header h2 {
            font-size: 2.2rem;
            font-weight: 400;
            color: #444444; 
        }

        .section-products .single-product {
            margin-bottom: 26px;
        }

        .section-products .single-product .part-1 {
            position: relative;
            height: 290px;
            max-height: 290px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .section-products .single-product .part-1 img {
                position: absolute;
                content: "";
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                transition: all 0.3s;
        }

        .section-products .single-product:hover .part-1 img {
                transform: scale(1.2,1.2) rotate(5deg);
        }

        .section-products .product-1 .part-1  {
			

                transition: all 0.3s;
				width: 100%;
				height: 300px;
				position: relative;
        }


        .section-products .single-product .part-1 .discount,
        .section-products .single-product .part-1 .new {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #ffffff;
            background-color: #fe302f;
            padding: 2px 8px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .section-products .single-product .part-1 .new {
            left: 0;
            background-color: #444444;
        }

        .section-products .single-product .part-1 .ul {
            position: absolute;
            bottom: -41px;
            left: 20px;
            margin: 0;
            padding: 0;
            list-style: none;
            opacity: 0;
            transition: bottom 0.5s, opacity 0.5s;
        }

        .section-products .single-product:hover .part-1 ul {
            bottom: 30px;
            opacity: 1;
			display: flex;
        }

        .section-products .single-product .part-1 ul li {
            display: inline-block;
            margin-right: 4px;
			
        }

        .section-products .single-product .part-1 ul li a,.section-products .single-product .part-1 form button {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #ffffff;
            color: #444444;
            text-align: center;
            box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
            transition: color 0.2s;
			border: none;
			display: flex;
			align-items: center;
			justify-content: center;
			
        }

        .section-products .single-product .part-1 ul li a:hover {
            color: #fe302f;
        }

        .section-products .single-product .part-2 .product-title {
            font-size: 1rem;
        }

        .section-products .single-product .part-2 h4 {
            display: inline-block;
            font-size: 1rem;
			color: red
        }

        .section-products .single-product .part-2 .product-old-price {
            position: relative;
            padding: 0 7px;
            margin-right: 2px;
            opacity: 0.6;
        }

        .section-products .single-product .part-2 .product-old-price::after {
            position: absolute;
            content: "";
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #444444;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    @include('store.layoutNavBar')
    <section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Featured Product</h3>
										<h2>Popular Products</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
						@foreach ($products as $product)
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div  class="single-product">
										<div class="part-1" >
											<img src="data:image/png;base64,{{$product->pict}}" alt="">
												<ul class="ul">
													@if ($product->cards->isNotEmpty()) 
													@foreach ($product->cards as $key => $value) 
														@if ($value->user_id==Auth::user()->id) 
														  <li>
															<button>already </button>
														  </li>
														@else
														@if (count($product->Keys->where('status','not_yet'))>0)
														<li>
															<form action="{{route('store.add_to.cart')}}" method="post">
																@csrf
																<input type="hidden" name="id" value="{{$product['id']}}">
											  
																  <button type="submit"><i class="fas fa-shopping-cart"></i></button>
															  </form>
														</li>
														@else
															<li>
																<button>order</button>
															</li>
														@endif
													   
														@endif 
														
													  @endforeach     
													  
													  @else 
														 @if (count($product->Keys->where('status','not_yet'))>0)
														 <li>
															<form action="{{route('store.add_to.cart')}}" method="post">
																@csrf
																<input type="hidden" name="id" value="{{$product['id']}}">
											  
																  <button type="submit"><i class="fas fa-shopping-cart"></i></button>
															  </form>
														 </li>
														 @else
														   <li>
															<button>order</button>
														   </li>
														 @endif
														
												  
												  @endif
														{{-- <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li> --}}
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														<li><a href="#"><i class="fas fa-plus"></i></a></li>
														<li><a href="#"><i class="fas fa-expand"></i></a></li>
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">{{$product->name}}</h3>
												<h4 class="product-old-price">${{$product->old_price}}</h4>
												<h4 class="product-price">${{$product->new_price}}</h4>
										</div>
								</div>
						</div>
						@endforeach

				</div>
		</div>
</section>
</body>
</html>