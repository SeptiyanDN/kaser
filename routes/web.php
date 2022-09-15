<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\Permissions\AssignController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Permissions\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
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
Route::get('/tenant/change/{tenantID}',[TenantController::class, 'changeTenant'])->name('tenants.change');
Route::post('/ajax-autocomplete-search', [OutletController::class, 'selectSearch'])->name('ajax-autocomplete-search');
Route::get('/kelurahan/json', [RegisterController::class,'kelurahanJson']);


Route::middleware('has.role')->group(function(){

    Route::prefix('products')->group(function(){

        Route::prefix('kategori')->group(function(){
            Route::get('/',[kategoriController::class,'index']);
            Route::post('/',[kategoriController::class,'store'])->name('tambah.kategori');
        });

        Route::prefix('merek')->group(function(){
            Route::get('/',[MerekController::class,'index']);
            Route::post('/',[MerekController::class,'store'])->name('tambah.merek');
        });

        Route::get('/',[ProdukController::class,'index'])->name('index.produk');
        Route::get('/tambah',[ProdukController::class,'create']);
        Route::post('/tambah',[ProdukController::class,'store'])->name('tambah.produk');

    });

    Route::prefix('users')->group(function(){
        Route::get('/create',[UserController::class,'createUsers']);
        Route::post('/create',[UserController::class,'tambahUser'])->name('users.create');
        Route::get('/management',[UserController::class,'index'])->name('users.management');

    });
    Route::prefix('outlet')->group(function(){
        Route::get('/tambah-outlet',[TenantController::class,'tambahOutlet']);
        Route::get('/',[TenantController::class,'index'])->name('outlet');
        Route::get('/json',[TenantController::class,'json'])->name('json');
        Route::post('/',[TenantController::class,'store'])->name('create-outlet');
        Route::get('/{id}',[OutletController::class,'show'])->name('update-outlet');
        Route::put('/{id}',[OutletController::class,'update']);
        Route::delete('/{id}',[OutletController::class,'destroy'])->name('remove-outlet');
    });

    Route::prefix('suppliers')->group(function(){
        Route::get('/',[SupplierController::class,'index']);
        Route::get('/tambah',[SupplierController::class,'create']);
        Route::post('/tambah',[SupplierController::class,'store'])->name('tambah.supplier');
    });

    Route::prefix('role-and-permission')->namespace('Permissions')->group(function(){
        Route::prefix('assignable')->group(function(){
            Route::get('/',[AssignController::class,'create'])->name('assign.create');
            Route::post('/',[AssignController::class,'store']);
            Route::get('/{role}/edit',[AssignController::class,'edit'])->name('assign.edit');
            Route::put('/{role}/edit',[AssignController::class,'update']);
        });
        Route::prefix('assign')->group(function(){
            Route::get('/user',[UserController::class,'create'])->name('assign.user.create');
            Route::post('/user',[UserController::class,'store']);
            Route::get('/{user}/edit',[UserController::class,'edit'])->name('assign.user.edit');
            Route::put('/{user}/edit',[UserController::class,'update']);
        });

        Route::prefix('roles')->group(function(){
            Route::get('/',[RoleController::class,'index'])->name('roles.index');
            Route::post('/create',[RoleController::class,'create'])->name('roles.create');
            Route::get('/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
            Route::put('/{role}/edit',[RoleController::class,'update']);
            Route::delete('/{id}',[RoleController::class,'destroy'])->name('roles.remove');
        });

        Route::prefix('permissions')->group(function(){
            Route::get('/',[PermissionController::class,'index'])->name('permissions.index');
            Route::post('/create',[PermissionController::class,'create'])->name('permissions.create');
            Route::get('/{permission}/edit',[PermissionController::class,'edit'])->name('permissions.edit');
            Route::put('/{permission}/edit',[PermissionController::class,'update']);
            Route::delete('/{id}',[PermissionController::class,'destroy'])->name('permissions.remove');
        });

    });

});

