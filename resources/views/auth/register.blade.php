<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link href="{{ asset('./css/form.css') }}" rel="stylesheet"> 
</head>
<body>
    <!--Sign Up-->
<div class="container">
    <div class="map left">
        <span>welcome, Back</span>
        <p>To Keep connected with us please login with <br> your personel info</p>
        <a href={{route('login')}}> <button>signIn</button></a>
        
    </div>
    <div class="sign right">
       <h1> <span class="lettre">S</span>ign Up</h1>
    <form action={{route('register')}} method="post">
        @csrf
        <div class="fields">
        <label for="first_name">enter your  name</label> <br>
        <input type="text" name="name" id="name" value={{@old('name')}}><br>
        @error('name')
            <div class="error">
                <span>{{$message}}</span>
            </div>
        @enderror
        <label for="email">enter your email</label> <br>
        <input type="email" name="email" id="email"value={{@old('email')}}><br>
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
        <label for="password_confirmation">password confirmation</label> <br>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>
        <div id="btns">
            <button type="submit">Sign up <i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>

    </form>
</div>

</div>

</body>
</html>