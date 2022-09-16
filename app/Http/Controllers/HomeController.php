<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        // $user = auth()->user();
        // DB::table('users')
        // ->where('id',$user->id)
        // ->update(['current_tenant_id' => 1]);

        // dd($user);
        $supplier = Supplier::count();
        $tenant = Tenant::join('tenant_user','tenants.id','=','tenant_user.tenant_id')
        ->where('tenant_user.user_id',auth()->user()->id)
        ->count();
        return view('pemilikbisnis.dashboard.index',compact('supplier','tenant'));
    }


}
