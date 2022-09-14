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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class RegisterController extends Controller
{

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect(config('app.url'))->with('session','Berhasil Logout');
    }
    public function kelurahanJson(Request $request)
    {
        $search = trim($request->kelurahan);

        $data = DB::table('villages')
        ->leftJoin('districts','villages.district_id','=','districts.id')
        ->leftJoin('regencies','districts.regency_id', '=','regencies.id')
        ->leftJoin('provinces','regencies.province_id', '=','provinces.id')
        ->Where('villages.name', $search )
        ->select(
            'villages.name as villages_name',
            'districts.name as districts_name',
            'regencies.name as regencies_name',
            'provinces.name as provinces_name'
        )
        ->get();

        $kelurahanJson = [];

        foreach ($data as $item) {
            $kelurahanJson[] = [
                "id" => "$item->villages_name, $item->districts_name, $item->regencies_name, $item->provinces_name",
                "text" => "$item->villages_name, $item->districts_name, $item->regencies_name, $item->provinces_name",
            ];
        }

        return response()->json($kelurahanJson);
    }
    public function register(){

        return view('/auth.register');
    }

    public function registration(Request $request){
        $user = User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
        ]);
        $randomString = Str::random(5);
        $strtolower = strtolower(str_replace(' ','-',$request->nama_bisnis));
        $tenant = Tenant::create([
            'name' => $request->nama_bisnis.' Cabang Pusat',
            'subdomain' => $strtolower.$randomString,
            'telepon' => $request->telepon,
            'alamat'=> $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos
        ]);

        $user->update(['current_tenant_id' => $tenant->id]);
        if($user->email == 'business.septiyan@gmail.com'){
            $user->assignRole('admin');
        } else {
            $user->assignRole('tamu');
        }
        DB::table('tenant_user')->insert([
            'tenant_id' => $tenant->id,
            'user_id' => $user->id,
            'pemilik' =>$user->id
        ]);
        Auth::login($user);

        $mainDomain = str_replace('://' , '://' . $tenant->subdomain . '.' , config('app.url'));
        return redirect ($mainDomain . RouteServiceProvider::HOME);

    }

    public function registrasiTenant(Request $request) {

        return view('auth.registertenant');
    }
}
