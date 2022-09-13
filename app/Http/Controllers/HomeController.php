<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{

    public function index()
    {
        $roles = Role::get();


        return view('pemilikbisnis.dashboard.index',compact('roles'));
    }


}
