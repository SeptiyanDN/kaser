<?php

namespace App\View\Components\Layouts;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tenant = DB::table('tenants')
        ->leftJoin('tenant_user','tenant_user.tenant_id', '=', 'tenants.id')
        ->where('tenant_user.user_id',auth()->user()->id)
        ->select(
            'tenants.name as name',
            'tenants.id as id'
         )
         ->get();
        return view('components.layouts.navbar',compact('tenant'));
    }
}
