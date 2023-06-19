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
    </style>
</head>
<body>
  @include('store.layoutNavBar')

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
            <div class="col col-1">Job Id</div>
            <div class="col col-2">Customer Name</div>
            <div class="col col-3">Amount Due</div>
            <div class="col col-4">Payment Status</div>
          </li>
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">42235</div>
            <div class="col col-2" data-label="Customer Name">John Doe</div>
            <div class="col col-3" data-label="Amount">$350</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li>
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">42442</div>
            <div class="col col-2" data-label="Customer Name">Jennifer Smith</div>
            <div class="col col-3" data-label="Amount">$220</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li>
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">42257</div>
            <div class="col col-2" data-label="Customer Name">John Smith</div>
            <div class="col col-3" data-label="Amount">$341</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li>
          <li class="table-row">
            <div class="col col-1" data-label="Job Id">42311</div>
            <div class="col col-2" data-label="Customer Name">John Carpenter</div>
            <div class="col col-3" data-label="Amount">$115</div>
            <div class="col col-4" data-label="Payment Status">Pending</div>
          </li>
        </ul>
      </div>
      @include('store.layoutFooter')

</body>
</html>