<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{

    public function index()
    {

        $supplier = Supplier::count();
        return view('pemilikbisnis.dashboard.index',compact('supplier'));
    }


}
