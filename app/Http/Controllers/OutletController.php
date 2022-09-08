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
        // foreach($kelurahan as $lurah){
        //    $response[] = array(
        //         "id"=>$lurah->name,
        //         "text"=>".$lurah->name.+ .$lurah->id."
        //    );
        // }
  
        return response()->json($response);
    }

    public function index()
    {
        return view('pemilikbisnis.outlet.index');
    }
    public function json() {
        return DataTables::of(Outlet::limit(10))
        ->addIndexColumn()
        ->addColumn('aksi', function($data){
         
                     $button = '<button onclick="editForm(`'. route('update-outlet', $data->id) .'`)" class="btn btn-warning  btn-xs "><i class="fa fa-pencil"></i></button>';
                     $button .= '<button onclick="deleteData(`'. route('remove-outlet', $data->id) .'`)" class="btn btn-danger  btn-xs demo3 "><i class="fa fa-trash"></i></button>';
                     return $button;
                 })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    /**
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
