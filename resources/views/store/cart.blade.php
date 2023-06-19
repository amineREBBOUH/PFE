<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @include('store.links')

    <title>Document</title>
</head>
<body>
    @include('store.layoutNavBar')
    <form action="{{route('store.chekout')}}" method="post">
      @csrf
    <div id="bodyCart">
    <div class="CartContainer">
        <div class="Header">
          <h3 class="Heading">Shopping Cart</h3>
          <h5 class="Action" onclick="removeAll()">Remove all</h5>
        </div>
        <div class="Items" id="Items">
          @php
            $total=0  
          @endphp
        @foreach ($cards->products as $product)
              
          
          <div class="Cart-Items">
            <div class="box1">
              <div class="image-box">
                <img src="data:image/png;base64,{{$product->pict}}" style="height: 120px" />
              </div>
              <div class="about">
                <h1 class="title">{{$product->name}}</h1>
                @if (count($product->Keys->where('status','not_yet'))>0)
                <p class="stock">stock</p>

                @else
                <p class="stock end">stock</p>

                @endif
              </div>
            </div>
            <div class="box2">
              <div class="prices">
                <div class="old"><span>{{$product->old_price}}$$</span></div>

                <div class="amount"><span>{{$product->new_price}}$$</span></div>
                @if (count($product->Keys->where('status','not_yet'))>0)

                @php
                    $total+=$product->new_price
                @endphp
                @endif

              </div>
              <div class="action">
                <div class="remove" ><u onclick="removeItem(this,{{$product->id}},{{$product->new_price}})"> <i class="fa fa-trash"></i> Remove</u></div>

              </div>
            </div>
          </div>
        @endforeach 
          
        </div>
        <hr />
        <div class="checkout">
          <div class="total">
            <div>
              <div class="Subtotal">Sub-Total</div>
              <div class="items" > <span id="count">{{count($cards->products)}}</span> items</div>
            </div>
            <div class="total-amount" >$ <span id="total">{{$total}}</span> </div>
          </div>
          <button class="button">Checkout</button>
        </div>
      </div>
    </div>
  </form>
    @include('store.layoutFooter')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
       const Items= document.getElementById("Items");
       var count=document.getElementById("count")
       var total=document.getElementById("total")
      function removeItem(e,id,price) {
        var element=e.parentElement;
        while (element.className !="Cart-Items") {
          element=element.parentElement;
          
        }
        total.innerHTML=parseInt(total.innerHTML) - price
        count.innerHTML=parseInt(count.innerHTML) - 1
        element.style.display="none";
        $.ajax({
        url: "{{route('store.removeItem')}}",
        type: 'POST',
        dataType: 'JSON',
        data: { '_token': '{{csrf_token()}}',id:id },
        success: function (res) {
            console.log(res);

        }
})

      }
      function removeAll(params) {
        Items.innerHTML=null
        count.innerHTML=0
        total.innerHTML=0
        $.ajax({
        url: "{{route('store.removeAll')}}",
        type: 'POST',
        dataType: 'JSON',
        data: { '_token': '{{csrf_token()}}' },
        success: function (res) {
            console.log(res);

        }
})

      }
    </script>
</body>
</html>