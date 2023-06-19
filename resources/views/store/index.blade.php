<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/store.css')}}">
    <link rel="stylesheet" href="{{asset('/css/footer.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
    <title>Document</title>
</head>
<body>
      @include('store.layoutNavBar')
       <div id="sunav">
        <div class="sunav">
          <div id="category">
            <i class="fa fa-bars"></i>
            <select name="" id="categoriesItems">
              <option selected disabled>Choose one</option>
              <option value="games">Games</option>
              <option value="films">IPTV</option>
              <option value="books">Books</option>
              <option value="films">Films</option>
            </select>
          </div>
          <div class="items">
            <ul>
              <li>Games</li>
              <li>Key</li>
              <li>Software</li>
              <li>Courses</li>
            </ul>
          </div>
        </div>
      </div>
      <div id="slide">
        <div class="item_slide active_slide" id="first_slide">
          <div class="info">
              <h1 class="animate__animated animate__bounceInDown">the New Game</h1>
              <p class="animate__animated animate__bounceInLeft">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
              <button class="animate__animated animate__zoomIn">Buy Now</button>
          </div>
        </div>
        <div class="item_slide" id="second_slide">
          <div class="info">
              <h1 class="animate__animated animate__bounceInDown">the New Game</h1>
              <p class="animate__animated animate__bounceInLeft">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
              <button class="animate__animated animate__zoomIn">Buy Now</button>
          </div>
        </div>
        <div class="item_slide" id="third_slide">
          <div class="info">
              <h1 class="animate__animated animate__bounceInDown">the New Game</h1>
              <p class="animate__animated animate__bounceInLeft">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
              <button class="animate__animated animate__zoomIn">Buy Now</button>
          </div>
        </div>
  
        <div class="btns_slid">
          <i class="fa fa-circle active" aria-hidden="true" data-item="1"></i>
          <i class="fa fa-circle" aria-hidden="true" data-item="2"></i>
          <i class="fa fa-circle" aria-hidden="true" data-item="3"></i>
        </div>
      </div>
      <div id="catItems">
      @include('store.layoutContent')
    </div>

      @include('store.layoutFooter')

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('js/store.js')}}"></script>

<script>
  //item it depends category
const selectItem=document.getElementById('categoriesItems');
const containerItems=document.getElementById('catItems');
selectItem.addEventListener('change',ContentChange)
function ContentChange(params) {
  const val=selectItem.value;
  $.ajax({
    url: "{{route('store.filter')}}",
    type: 'POST',
     dataType: 'JSON',
    data: { '_token': '{{csrf_token()}}', type: val },
    success: function (res) {
        //console.log(res);
        containerItems.innerHTML=res.html;

    }
})
}
</script>
</body>
</html>