<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>mail key or Account send</h1>
    <h4>the name of product{{$data['product']['name']}}</h4>
    @if ($data["key"]["key"])
       <p>the key of this product is: <br> {{$data['key']["key"]}}</p>
        
    @else
        <h5>the account of this product is</h5>
        <h6>the email:</h6>
        <p>{{$data["key"]["email"]}}</p>
        <h6>the password:</h6>
        <p>{{$data['key']["password"]}}</p>
    @endif
</body>
</html>