<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('store.links')
<style>
                img {
            max-width: 100%; }

            .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
                -ms-flex-direction: column;
                    flex-direction: column; }
            @media screen and (max-width: 996px) {
                .preview {
                margin-bottom: 20px; } }

            .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
                -ms-flex-positive: 1;
                    flex-grow: 1; }

            .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px; }
            .preview-thumbnail.nav-tabs li {
                width: 18%;
                margin-right: 2.5%; }
                .preview-thumbnail.nav-tabs li img {
                max-width: 100%;
                display: block; }
                .preview-thumbnail.nav-tabs li a {
                padding: 0;
                margin: 0; }
                .preview-thumbnail.nav-tabs li:last-of-type {
                margin-right: 0; }

            .tab-content {
            overflow: hidden; }
            .tab-content img {
                width: 100%;
                -webkit-animation-name: opacity;
                        animation-name: opacity;
                -webkit-animation-duration: .3s;
                        animation-duration: .3s; }

            .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em; }

            @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex; } }

            .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
                -ms-flex-direction: column;
                    flex-direction: column; }

            .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
                -ms-flex-positive: 1;
                    flex-grow: 1; }

            .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;
            font-weight: bold; }

            .checked, .price span {
            color: #ff9f1a; }

            .product-title, .rating, .product-description, .price, .vote, .sizes {
            margin-bottom: 15px; }

            .product-title {
            margin-top: 0; }

            .size {
            margin-right: 10px; }
            .size:first-of-type {
                margin-left: 40px; }

            .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px; }
            .color:first-of-type {
                margin-left: 20px; }

            .add-to-cart, .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
                    transition: background .3s ease; }
            .add-to-cart:hover, .like:hover {
                background: #b36800;
                color: #fff; }

            .not-available {
            text-align: center;
            line-height: 2em; }
            .not-available:before {
                font-family: fontawesome;
                content: "\f00d";
                color: #fff; }

            .orange {
            background: #ff9f1a; }

            .green {
            background: #85ad00; }

            .blue {
            background: #0076ad; }

            .tooltip-inner {
            padding: 1.3em; }

            @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                        transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                        transform: scale(1); } }

            @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                        transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                        transform: scale(1); } 

        
        }
        .action{
            display: flex;
            gap: 10px;
            border: none;
        }
        .like{
            display: flex;
            justify-content: center;
            align-items: center
        }
        .oldP{
            text-decoration: line-through;
            color: red;
            font-size: 20px;
            font-weight: 400;
        }
        button{
            width: auto !important;
        }
</style>
</head>
<body>
    @include('store.layoutNavBar')
	<div class="container" style="margin-bottom: 40px; margin-top: 40px;">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="data:image/png;base64,{{$product['pict']}}" /></div>
						  {{-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> --}}
						</div>
						{{-- <ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul> --}}
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$product->name}}</h3>
						{{-- <div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							{{-- <span class="review-no">41 reviews</span> 
						</div> --}}
						<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">current price: <span style="color: #0076ad ">${{$product->new_price}}</span></h4>
						<h6 class=" oldP">old price: <span>${{$product->old_price}}</span></h6>
						
						{{-- <h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5> --}}
						<div class="action">
                        @if ($product->cards->isNotEmpty()) 
                            @foreach ($product->cards as $key => $value) 
                                @if ($value->user_id==Auth::user()->id) 
                                  <button class="already btn btn-warning">already into to card</button>
                                @else
                                @if (count($product->Keys->where('status','not_yet'))>0)
                                <form action="{{route('store.add_to.cart')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{$product['id']}}">
                
                                    <button type="submit" class="addCard btn btn-primary">add To card</button>
                                </form>
                                @else
                                    <button class="order btn btn-info"onclick="order(this,{{$product['id']}})">order</button>
                                @endif
                               
                                @endif 
                                
                              @endforeach     
                              
                              @else 
                                 @if (count($product->Keys->where('status','not_yet'))>0)
                                 <form action="{{route('store.add_to.cart')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{$product['id']}}">
                
                                    <button type="submit" class="btn btn-primary addCard">add To card</button>
                                </form>
                                 @else
                                   <button class="order btn btn-info" onclick="order(this,{{$product['id']}})">order</button>
                                 @endif
                                
                          
                        @endif
                        @if ($product->likes->isNotEmpty())
                          @if ($product->likes->where('user_id',Auth::user()->id)->first())
                            <button class="like btn btn-default" type="button"onclick="like(this,{{$product->id}})"style="color: red;"><span class="fa fa-heart" ></span></button>

                           @else
                             <button class="like btn btn-default" type="button"onclick="like(this,{{$product->id}})"style="color: white;"><span class="fa fa-heart" ></span></button>

                            
                        @endif

                        @else
                        <button class="like btn btn-default" type="button"onclick="like(this,{{$product->id}})"style="color: white;"><span class="fa fa-heart" ></span></button>

                        @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>@include('store.layoutFooter')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script>
        function order(event,id) {
          $.ajax({
            url: "{{route('store.order')}}",
            type: 'POST',
            dataType: 'JSON',
            data: { '_token': '{{csrf_token()}}', id: id },
            success: function (res) {
                //console.log(res.res);
                switch (res.res) {
                  case 'already':
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your order already exist',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  
                    
                    break;
                  case "good":
                      Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Your order has been saved',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    break;
                
                  default:
                    break;
                }
  
            }
        })
        }
        function like(e,id) {
        if(e.style.color=='red'){
            console.log("deslike");
            e.style.color='white'
            var path="{{route('store.deslike')}}"
        }
        else if(e.style.color=='white'){
          console.log('like');
          e.style.color='red'
          var path="{{route('store.like')}}"
        }
        $.ajax({
            url: path,
            type: 'POST',
            dataType: 'JSON',
            data: { '_token': '{{csrf_token()}}', id: id },
            success: function (res) {
                console.log(res);
               
  
            }
        })
        
      }
       </script>
</body>
</html>
