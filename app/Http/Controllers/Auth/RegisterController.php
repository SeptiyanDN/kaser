<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class RegisterController extends Controller
{

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect(config('app.url'))->with('session','Berhasil Logout');
    }

    public function register(){
        return view('/auth.register');
    }

    public function registration(Request $request){
        $request->validate([
            'name'=> ['required', 'string','max:255'],
            'username' => ['required','string'],
            'email' => ['required', 'string', 'email','max:255','unique:users'],
            'password' => ['required', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $randomString = Str::random(10);
        $tenant = Tenant::create([
            'name' => $request->name . ' Team',
            'subdomain' => $request->username.$randomString,
        ]);
        $tenant->users()->attach($user->id);
        $user->update(['current_tenant_id' => $tenant->id]);
        Auth::login($user);

        $mainDomain = str_replace('://' , '://' . $tenant->subdomain . '.' , config('app.url'));
        return redirect ($mainDomain . RouteServiceProvider::HOME);

    }

    public function registrasiTenant(Request $request) {
        
        return view('auth.registertenant');
    }
}
