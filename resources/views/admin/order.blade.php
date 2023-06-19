@extends('admin.layout')
@section('content')
<style>
    h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
        }

        /* Table Styles */

        .table-wrapper{
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td, .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #0a72ca;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            /* background: #324960; */
            background: #707070;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }
            .table-wrapper:before{
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }
            .fl-table thead, .fl-table tbody, .fl-table thead th {
                display: block;
            }
            .fl-table thead th:last-child{
                border-bottom: none;
            }
            .fl-table thead {
                float: left;
            }
            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }
            .fl-table td, .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }
            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }
            .fl-table tbody tr {
                display: table-cell;
            }
            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }
            .fl-table tr:nth-child(even) {
                background: transparent;
            }
            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tbody td {
                display: block;
                text-align: center;
            }
            
        }
        .notify{
                border: none;
                color: white;
                background-color: #0a72ca;
                padding: 5px;
                float: right;
                margin: 10px;
                cursor: pointer;
            }
            .image .imgLL{
                width: 80%;
                height: 200px;

            }
            .image{
                display: flex;
                justify-content: center
            }
</style>
<div>
    <h1>order</h1>
     <button class="notify" onclick="orderN()">send notify</button>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>date</th>
                <th>order_id</th>
                <th>email_client</th>
                <th>product_img</th>
                <th>product_name</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    
                
            <tr>
                <td>{{$order->created_at}}ff</td>
                <td>{{$order->id}}</td>
                <td>{{$order->user->email}}</td>
                <td class="image"><img class="imgLL" src="data:image/jpeg;base64,{{ $order->product->pict }}" alt=""></td>
                <td>{{$order->product->name}}</td>
            </tr>
            @endforeach
           
            
           
            <tbody>
        </table>
    </div>
</div>
<script>
    function orderN() {
      $.ajax({
        url: "{{route('dashboard.orderN')}}",
        type: 'POST',
        dataType: 'JSON',
        data: { '_token': '{{csrf_token()}}'},
        success: function (res) {
            //console.log(res.res);
            if (res.message=="sent") {
                let timerInterval
                Swal.fire({
                title: 'emails sending!',
                html: 'the emails are sending.',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    //b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            }
            

        }
    })
    }
   </script>
@endsection