<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function changeTenant($tenantID){
        $tenant = Auth::user()->tenants()->findOrFail($tenantID);

        Auth::user()->update(['current_tenant_id' => $tenantID]);

        $mainDomain = str_replace('://' , '://' . $tenant->subdomain . '.' , config('app.url'));
        return redirect ($mainDomain);          
    }
}
