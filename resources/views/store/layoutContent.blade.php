
    <div id="productsL">
      <div id="titleww">
        <h3>new Products:{{$type}}</h3>
        <a href="{{route('store.categories',$type)}}">view all</a>
      </div>
        <div id="first">
         <div class="row">
     
         @foreach ($products as $key=> $product)
         
         <div class="div{{(int)$key+1}} item"style="background-image: url(data:image/png;base64,{{$product['pict']}});">
            <div class="info">
              @if ($product->likes->isNotEmpty())
                @if ($product->likes->where('user_id',Auth::user()->id)->first())
                <div class="heart"> <i class="fa-solid fa-heart" style="color: red" onclick="like(this,{{$product->id}})"></i></div>

                @else
                <div class="heart"> <i class="fa-solid fa-heart" style="color: white"onclick="like(this,{{$product->id}})"></i></div>

                @endif

              @else
              <div class="heart"> <i class="fa-solid fa-heart" style="color: white"onclick="like(this,{{$product->id}})"></i></div>

              @endif
                <div class="inf"><a href="{{route('store.details',$product->id)}}"><i class="fa-solid fa-circle-info"></i></a></div>
                <p>{{$product['name']}}</p>
                <p>{{count($product->Keys->where('status','not_yet'))}}</p>
                @if ($product->cards->isNotEmpty()) 
                  @foreach ($product->cards as $key => $value) 
                      @if ($value->user_id==Auth::user()->id) 
                        <button class="already">already into to card</button>
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
                         <button class="order" onclick="order(this,{{$product['id']}})">order</button>
                       @endif
                      
                
                @endif
                
              </div>
        </div>

         @endforeach
        </div>
        <div class="row  justify-content-center">
            {{-- @foreach (array_slice((array)$products,2,3) as $key=> $product)
            <div class="div{{(int)$key+3}} item"style="background-image: url(data:image/png;base64,{{$product['pict']}});">
               <div class="info">
                   <p>the name of products</p>
                   <form action="{{route('store.add_to.cart')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product['id']}}">
                       <button type="submit">add To card</button>
                   </form>
                 </div>
           </div>
   
            @endforeach --}}
        </div>
        </div>
 
     </div>

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