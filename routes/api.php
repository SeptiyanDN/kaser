<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\ChannelController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\MerekController;
use App\Http\Controllers\API\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('auth')->group(function(){
    Route::post('/login',AuthController::class);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::prefix('products')->group(function(){
        Route::get('/',[ProdukController::class,'index']);
        Route::post('/',[ProdukController::class,'store']);
        Route::put('/{produk}',[ProdukController::class,'update']);
        Route::delete('/{produk}',[ProdukController::class,'destroy']);
    });
    Route::prefix('kategori')->group(function(){
        Route::get('/',[KategoriController::class,'index']);
        Route::post('/',[KategoriController::class,'store']);
        Route::get('/{id}',[KategoriController::class,'show']);
        Route::put('/{kategori}',[KategoriController::class,'update']);
        Route::delete('/{kategori}',[KategoriController::class,'destroy']);
    });
    Route::prefix('merek')->group(function(){
        Route::get('/',[MerekController::class,'index']);
        Route::post('/',[MerekController::class,'store']);
        Route::get('/{id}',[MerekController::class,'show']);
        Route::put('/{merek}',[MerekController::class,'update']);
        Route::delete('/{merek}',[MerekController::class,'destroy']);
    });
    Route::prefix('channel')->group(function(){
        Route::get('/',[ChannelController::class,'index']);
        Route::post('/',[ChannelController::class,'store']);
        Route::get('/{channel}',[ChannelController::class,'show']);
        Route::put('/{channel}',[ChannelController::class,'update']);
        Route::delete('/{channel}',[ChannelController::class,'destroy']);
    });
});


