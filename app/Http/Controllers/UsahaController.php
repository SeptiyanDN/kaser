<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemilikbisnis.usaha.index');
    }
    public function json() {
        return Datatables::of(Usaha::limit(10))
        ->addColumn('aksi', function($data){
                     $button = "<span><a href='".$data->id."' class='edit btn-primary btn-xs' id='".$data->id."'><i class='fa fa-pencil'></i></a></span>";
                     $button .= "<span><a href='".$data->id."' class='lihat btn-danger btn-xs' id='".$data->id."'><i class='fa fa-eye'></i></a></span>";
                     $button .= "<span><a href='".$data->id."' class='hapus btn-success btn-xs' id='".$data->id."'><i class='fa fa-trash'></i></a></span>";
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
        Usaha::create([
            'nama_usaha' => $request->nama_usaha,
            'kategori_usaha' => $request -> kategori_usaha,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('cabang-outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(Usaha $usaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usaha $usaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usaha $usaha)
    {
        //
    }
}
