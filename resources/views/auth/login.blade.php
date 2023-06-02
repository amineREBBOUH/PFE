<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('./css/form.css') }}" rel="stylesheet"> 
</head>
<body>

       <!--Sign in-->
<div class="container">

    <div class="sign left">
       <h1> <span class="lettre">S</span>ign In</h1>
       <div class="social_media">
        <a href="{{route('google')}}"><button>Login with google</button></a>
       </div>
       <span class="chose">Or use Your account</span>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="fields">
        <label for="email">enter your email</label> <br>
        <input type="email" name="email" id="email" value={{@old('email')}}><br>
        @error('email')
            <div class="error">
                <span>{{$message}}</span>
            </div>
         @enderror
        <label for="password">enter your password</label> <br>
        <input type="password" name="password" id="password"><br>
        @error('password')
            <div class="error">
                <span>{{$message}}</span>
            </div>
         @enderror
        <span>forgot your password?</span><br>
        <div id="btns">
            <button>Sign in <i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

    </form>
</div>
<div class="map right">
    <span >Hello Friend</span>
    <p>enter personel detail and start journy with us</p>
    <a href={{route('register')}}><button>signUp</button></a>
    
</div>
</div>

</body>
</html>