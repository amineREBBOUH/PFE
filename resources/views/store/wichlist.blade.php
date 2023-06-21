<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('store.links')

    <title>Document</title>
    <style>
      .container{
        margin: 40px auto;
        
      }
      .col-2 img{
        width: 50px;
        height: 50px;
        margin-right: 5px;
      }.table-row p{
       cursor: pointer;
      }
      #table{
        height: 70%;
        overflow: scroll
      }
    </style>
</head>
<body>
  @include('store.layoutNavBar')
  <div id="table">
    <div id="wichlist" style="display: none;">
        <div id="title">
            <div></div>
            <div><h2>My Wichlist</h2></div>
        </div>
        
    </div>
    <div class="container">
        <h2><i class="fa fa-heart" style="width: 30px; color:red;" ></i>My Wichlist</h2>
        <ul class="responsive-table">
          <li class="table-header">
            <div class="col col-1">like Id</div>
            <div class="col col-2">product name</div>
            <div class="col col-3">see details</div>
            <div class="col col-4">action</div>
          </li>
          @foreach ($likes as $like)
              
          
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">{{$like->id}}</div>
            <div class="col col-2" data-label="Customer Name"><img src="data:image/png;base64,{{$like->product->pict}}" />{{$like->product->name}}</div>
            <div class="col col-3" data-label="Amount"><a href="{{route('store.details',$like->product->id)}}" style="color: black">see deatail</a></div>
            <div class="col col-4" data-label="Payment Status"><p style="color: red; " onclick="remove(this,{{$like->id}})">remove </p></div>
          </li>
          @endforeach
          
          
        </ul>
      </div>
    </div>
      @include('store.layoutFooter')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function remove(e,like_id) {
    e.parentElement.parentElement.style.display='none'
    console.log(like_id);
    $.ajax({
            url: "{{route('store.remove_like')}}",
            type: 'POST',
            dataType: 'JSON',
            data: { '_token': '{{csrf_token()}}', id: like_id },
            success: function (res) {
                
               console.log(res);
  
            }
        })
}
</script>
</body>
</html>