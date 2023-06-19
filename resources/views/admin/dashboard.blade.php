@extends('admin.layout')
@section('content')
<h1>dashboard</h1>
{{-- <div class="first_chart">
  <div class="itemchart">
    <p class="p">ddd</p>
  <div id="chartUser">
    <canvas id="UserChart"></canvas>
  </div>
</div>
<div class="itemchart">
  <p class="p">ddd</p>
<div id="chartkey">
  <canvas id="ProductKey"></canvas>
</div>
</div>
</div>
<p>the number of Products </p>
<div id="chartProdutv">
    <canvas id="myChart"></canvas>
  </div> --}}
        <!-- Main -->
        <main class="main-container">
          <div class="main-title">
            <p class="font-weight-bold">DASHBOARD</p>
          </div>
  
          <div class="main-cards">
  
            <div class="card">
              <div class="card-inner">
                <p class="text-primary">PRODUCTS</p>
                <span class="material-icons-outlined text-blue">inventory_2</span>
              </div>
              <span class="text-primary font-weight-bold">{{$productsCount}}</span>
            </div>
  
            <div class="card">
              <div class="card-inner">
                <p class="text-primary">The Clients</p>
                <span class="material-icons-outlined text-orange"><i class="fa fa-user"></i></span>
              </div>
              <span class="text-primary font-weight-bold">{{$normal_user}}</span>
            </div>
  
            <div class="card">
              <div class="card-inner">
                <p class="text-primary">SALES ORDERS</p>
                <span class="material-icons-outlined text-green">shopping_cart</span>
              </div>
              <span class="text-primary font-weight-bold">{{$sales}}</span>
            </div>
  
            <div class="card">
              <div class="card-inner">
                <p class="text-primary">Admin</p>
                <span class="material-icons-outlined text-red"><i class="fa fa-user"></i></span>
              </div>
              <span class="text-primary font-weight-bold">{{$admin_user}}</span>
            </div>
  
          </div>
  
          <div class="charts">
  
            <div class="charts-card">
              <p class="chart-title">The Products</p>
              {{-- <div id="bar-chart"></div> --}}
              <canvas id="myChart"></canvas>

            </div>
  
            <div class="charts-card">
              <p class="chart-title">The Keys of products</p>
              {{-- <div id="area-chart"></div> --}}
              <canvas id="ProductKey"></canvas>

            </div>
  
          </div>
        </main>
        <!-- End Main -->
  
<script>
     const ctx = document.getElementById('myChart');
     const ctuser = document.getElementById('UserChart');
     const key = document.getElementById('ProductKey');

     var products = @json($products);
     var keys=@json($keys);
     var roles=@json($roles);

const pie=new Chart(ctuser,{
   type: 'pie',
  data: {
    labels: ['normal user', 'admin user'],
    datasets: [{
      label: 'Role',
      data: roles,
      borderWidth: 1
    }]
  },
  options: {
   
  }
});
const bar=new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['GAMES', 'FILMS', 'IPTV'],
    datasets: [{
      label: 'product',
      data: products,
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        steps: 10,
        stepValue: 5,
        max: 100
      }
    }
  }
});
const line=new Chart(key,{
  type: 'line',
  data: {
    labels: ['GAMES_key', 'FILMS_keys', 'IPTV_Keys'],
     datasets: [{
    label: 'the Keys of Products',
    data: keys,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
  },
})
</script>
@endsection