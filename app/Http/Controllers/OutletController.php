<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Outlet;
use App\Models\District;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectSearch(Request $request)
    {
        $search = $request->search;

        // if($search != null){
        $results = DB::table('villages')
        ->leftJoin('districts','villages.district_id','=','districts.id')
        ->leftJoin('regencies','districts.regency_id', '=','regencies.id')
        ->leftJoin('provinces','regencies.province_id', '=','provinces.id')
        ->Where('villages.name', 'like', '%' .$search . '%')
        ->select(
            'villages.name as villages_name',
            'districts.name as districts_name',
            'regencies.name as regencies_name',
            'provinces.name as provinces_name'
        )
        ->get();
        // }

        $response = array();
        foreach($results as $result) {
            $response[] = array(
                "kelurahan" => $result->villages_name,
                "id" => "$result->villages_name, $result->districts_name, $result->regencies_name, $result->provinces_name",
                "text" => "$result->villages_name, $result->districts_name, $result->regencies_name, $result->provinces_name",

            );
        }
        return response()->json($response);
    }

    public function index()
    {
        return view('pemilikbisnis.outlet.index');
    }
    public function json() {
        return DataTables::of(Outlet::limit(10))
        ->addColumn('aksi', function($data){

                     $button = '<a class="me-3" href="https://dreamspos.dreamguystech.com/laravel/template/public/product-details">
                     <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
                     </a>';
                     $button .= '<a class="me-3" href="https://dreamspos.dreamguystech.com/laravel/template/public/editproduct">
                     <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
                     </a>';
                     $button .= '<a class="me-3" onclick="deleteData(`'. route('remove-outlet', $data->id) .'`)">
                     <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
                     </a>';
                     return $button;
                 })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function tambahOutlet(){
        dd('Test');

        return view('pemilikbisnis.outlet.tambahoutlet');
    }

    /**
     *
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outlet = new Outlet();
        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->telepon = $request->telepon;
        $outlet->alamat = $request->alamat;
        $outlet->kelurahan = $request->kelurahan;
        $outlet->save();

        return response()->json('Data berhasil Disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outlet = Outlet::find($id);
        return response()->json($outlet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $outlet = Outlet::find($id);
        $outlet->update($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = outlet::find($id);
        $outlet->delete();
        return response()->json(null, 204);
    }
}
