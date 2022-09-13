<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard.index');
    }
}
