<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
</head>
<body>
    <h1>dashboard</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
         <button type="submit">logout</button>
    </form>
</body>
</html>