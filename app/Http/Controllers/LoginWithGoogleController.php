<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    //
    public function handleGoogleCallback()
    {
        try {
        // dd('dd');
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
                if (Auth::user()->role==1) {
                    return redirect('/dashboard');
                } else {
                    # code...
                    return redirect('/store');
                }
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                $find_user=User::where('email',$user->email)->get()->first();

                $card=Card::create([
                    "name_Card"=>$find_user->name.'_'.rand(),
                    "user_id"=>$find_user->id
                ]);
                $card->save();
                Auth::login($newUser);
               if (Auth::user()) {
                return redirect('/store');
            }
                
                
      
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
