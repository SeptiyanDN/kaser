<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->middleware('auth');


Route::get('/login',[LoginController::class,'login'])->middleware('guest')->name('login');
Route::post('/login/prosses',[LoginController::class,'authentication'])->name('authentication');
Route::get('/logout',[RegisterController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/register',[RegisterController::class, 'register'])->name('register');
Route::post('/registration',[RegisterController::class, 'registration'])->name('registration');
Route::get('/register-tenant',[RegisterController::class,'registrasiTenant']);

// Route::get('/cabang-outlet',[OutletController::class,'index'])->name('cabang-outlet');
// Route::get('/cabang-outlet/json',[OutletController::class,'json'])->name('json');
// Route::post('/cabang-outlet',[OutletController::class,'store'])->name('create-outlet');
// Route::get('/cabang-outlet/{id}',[OutletController::class,'show'])->name('update-outlet');
// Route::put('/cabang-outlet/{id}',[OutletController::class,'update']);
// Route::delete('/cabang-outlet/{id}',[OutletController::class,'destroy'])->name('remove-outlet');
// Route::post('/ajax-autocomplete-search', [OutletController::class, 'selectSearch'])->name('ajax-autocomplete-search');
// Route::get('/cabang-outlet/outlet-baru',[OutletController::class,'tambahOutlet']);

Route::prefix('cabang-outlet')->group(function(){
    Route::get('/',[OutletController::class,'index'])->name('cabang-outlet');
    Route::get('/json',[OutletController::class,'json'])->name('json');
    Route::post('/',[OutletController::class,'store'])->name('create-outlet');
    Route::get('/{id}',[OutletController::class,'show'])->name('update-outlet');
    Route::put('/{id}',[OutletController::class,'update']);
    Route::delete('/{id}',[OutletController::class,'destroy'])->name('remove-outlet');
    Route::post('/ajax-autocomplete-search', [OutletController::class, 'selectSearch'])->name('ajax-autocomplete-search');
    Route::get('/tambahOutlet','OutletController@tambahOutlet')->name('tambahOutlet');

});

Route::get('/tenant/change/{tenantID}',[TenantController::class, 'changeTenant'])->name('tenants.change');
