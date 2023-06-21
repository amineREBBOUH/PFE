{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> 
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout> --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    body,html{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    }
#verify{
    padding: 17px;
    overflow: hidden;
    width: 40%;
    height: 80%;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
#verify h2{
    text-align: center;
    color: #378ed5;
}
#verify .img{
    display: flex;
    justify-content: center;
    animation: anim 1.2s ease-in;
    position: relative;
}
@keyframes anim {
    from {
        left: -30vw;
    }
    to {
        left: 0px;
    }
}
#verify img{
    width: 80%
}
#verify #action{
display: flex;
gap: 5px;
justify-content: center;
}
</style>
<body>
    <div id="verify">
        <h2>E-Verify</h2>
        <div class="img">
            <img src="{{asset('/images/email.png')}}" alt="">
        </div>

    <h2>Please Verify Your Email To Activate your Account</h2>
    <div id="action">

    
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
            <x-button class="btn btn-warning">
                {{ __('Resend Verification Email') }}
            </x-button>
        </div>
    </form>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="btn btn-danger">
            {{ __('Log Out') }}
        </button>
    </form>
</div>
</div>
</body>
</html>
