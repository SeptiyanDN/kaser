<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DeskripsiPemasukan;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{

    public function index()
    {
        $deskripsi = DeskripsiPemasukan::all();
        return view('module.kelolakas.pemasukan.index',compact('deskripsi'));
    }

    public function data(){
        $pemasukan = Pemasukan::leftJoin('deskripsi_pemasukans', 'deskripsi_pemasukans.id', 'pemasukans.deskripsi_pemasukan_id')
        ->select('pemasukans.*', 'deskripsi_pemasukan')
        ->orderBy('deskripsi_pemasukan', 'asc')->get();

        return datatables()
            ->of($pemasukan)
            ->addIndexColumn()
            ->addColumn('select_all', function ($pemasukan){
                return '<input type="checkbox" name="id[]" value="'. $pemasukan->id .'">';
            })
            ->addColumn('created_at',function($pemasukan){
                return Helpers::tanggal_indonesia($pemasukan->created_at, false);
            })
            ->addColumn('nominal',function($pemasukan){
                return 'Rp. '.Helpers::format_uang($pemasukan->nominal);
            })
            ->addColumn('Action', function ($pemasukan){
                return '
                <a class="me-3" onclick="editForm(`'. route('pemasukan.show', $pemasukan->id) .'`)">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
            </a>
            <a class="me-3" onclick="deleteData(`'. route('pemasukan.destroy', $pemasukan->id) .'`)">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
            </a>
                ';
            })
            ->rawColumns(['Action','select_all'])
            ->make(true);


    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pemasukan = Pemasukan::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id)
    {
        $pemasukan = Pemasukan::find($id);

        return response()->json($pemasukan);
    }

    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $pemasukan = Pemasukan::find($id)->update($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }
   public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return response(null, 204);
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $produk = Pemasukan::find($id);
            $produk->delete();
        }
        return response()->json(null, 204);
    }
}
