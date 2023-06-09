<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $games1=[
        [
            "img" => "/Media/Games/G1.png",
            "name"=>"EA Sport FIFA 23"
        ],
        [
            "img"=>"/Media/Games/G2.png",
            "name"=>"The Callisto  Protocol"
        ],
        [
            "img"=>"/Media/Games/G3.png",
            "name"=>"Marvel's Midnight Suns"
        ],
        [
            "img"=>"/Media/Games/G4.png",
            "name"=>"Horizon Forbidden West"
        ],
        [
            "img"=>"/Media/Games/G5.png",
            "name"=>"Elden Ring"
        ],
        [
            "img"=>"/Media/Games/G6.png",
            "name"=>"God Of War Ragnarok"
        ],
    ];
    $games2=[
        [
            "img"=>"/Media/Games/G7.png",
            "name"=>"EA Sport FIFA 23"
        ],
        [
            "img"=>"/Media/Games/G8.png",
            "name"=>"The Callisto  Protocol"
        ],
        [
            "img"=>"/Media/Games/G9.png",
            "name"=>"Marvel's Midnight Suns"
        ],
        [
            "img"=>"/Media/Games/G10.png",
            "name"=>"Horizon Forbidden West"
        ],
        [
            "img"=>"/Media/Games/G11.png",
            "name"=>"Elden Ring"
        ],
        [
            "img"=>"/Media/Games/G12.png",
            "name"=>"God Of War Ragnarok"
        ],
    ];
    return view('main',["games1"=>$games1,"games2"=>$games2]);
});
Auth::routes([
    'verify'=>true
]);
Route::middleware(['auth'])->group(function () {
 //route foe users
 Route::middleware(['user','verified'])->group(function () {
    require __DIR__.'/userRoute.php';

 });
 

 Route::middleware(['admin'])->group(function () {
    require __DIR__.'/adminRoute.php';

 });
    
});
require __DIR__.'/auth.php';
