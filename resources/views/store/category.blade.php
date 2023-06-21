<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('store.links')

</head>
<body>
    @include('store.layoutNavBar')

    <div id="categoryPages">
        <div id="category">
            <div id="title">
                <span>Products Category</span>
            </div>
            <div class="types">
                <ul>
                    <li><div><a href="{{route('store.categories',"games")}}"> Games </a></div> <div><hr></div><div>{{$gamesC}}</div> </li>
                    <li><div><a href="{{route('store.categories',"subscriptions")}}"> Subscriptions </a></div> <div><hr></div><div>{{$filmsC}}</div> </li>
                    <li><div><a href="{{route('store.categories',"software")}}"> Software </a></div> <div><hr></div><div>{{$softwareC}}</div> </li>
                   
                </ul>
            </div>
        </div>
        <div id="products">
            <div id="search_head">
                <div class="bar">
                    <div class="count">
                        <div class="icon">
                            <i class="fa fa-list active view" ></i>
                            <i class="fa fa-th view"></i>
                            <i>View</i>
                        </div>
                    </div>
                    <div class="sort">
                        <label for="">sort by</label>:
                        <select name="" id="">
                            <option value="">fff</option>
                            <option value="">ffffff</option>
                            <option value="">fff</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="products">
                @foreach ($products as $product)
                    
                
                <div class="product pro">
                    <div class="pict"><img src="data:image/jpeg;base64,{{ $product->pict }}" alt=""></div>
                    <div class="info">
                       <h2>{{$product->name}}</h2>
                       <div class="div09">
                        <div class="infoS">
                       <p>the old price :<span>{{$product->old_price}}</span></p>
                       <p>the new price :<span>{{$product->new_price}}</span></p>
                       </div>
                       <div class="btnss">
                        @if ($product->cards->isNotEmpty()) 
                        @foreach ($product->cards as $key => $value) 
                            @if ($value->user_id==Auth::user()->id) 
                              <button class="alredy">already into to card</button>
                            @else
                            @if (count($product->Keys->where('status','not_yet'))>0)
                            <form action="{{route('store.add_to.cart')}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$product['id']}}">
            
                                <button type="submit" class="addCard">add To cafrd</button>
                            </form>
                            @else
                                <button class="order"onclick="order(this,{{$product['id']}})">order</button>
                            @endif
                           
                            @endif 
                            
                          @endforeach     
                          
                          @else 
                             @if (count($product->Keys->where('status','not_yet'))>0)
                             <form action="{{route('store.add_to.cart')}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$product['id']}}">
            
                                <button type="submit" class="addCard">add To cgard</button>
                            </form>
                             @else
                               <button class="order"onclick="order(this,{{$product['id']}})">order</button>
                             @endif
                            
                      
                      @endif
                       </div>

                       </div>

                    </div>
                </div>
                @endforeach
                {{$products->links()}}
                
            </div>
        </div>
    </div>
    @include('store.layoutFooter')
    <script>
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
       </script>
    <script src="{{asset('js/store.js')}}"></script>

</body>
</html>