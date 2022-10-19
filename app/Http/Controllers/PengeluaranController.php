<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DeskripsiPengeluaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengeluaranController extends Controller
{

    public function index()
    {
        $deskripsi = DeskripsiPengeluaran::all();

        return view('module.kelolakas.pengeluaran.index',compact('deskripsi'));
    }


    public function data(){
        $pengeluaran = Pengeluaran::leftJoin('deskripsi_pengeluarans','deskripsi_pengeluarans.id','pengeluarans.deskripsi_pengeluaran_id')
                        ->select('pengeluarans.*','deskripsi_pengeluaran')
                        ->orderBy('deskripsi_pengeluaran','asc')->get();
        return datatables()
        ->of($pengeluaran)
        ->addIndexColumn()
        ->addColumn('select_all', function ($pengeluaran){
            return '<input type="checkbox" name="id[]" value="'. $pengeluaran->id .'">';
        })
        ->addColumn('created_at',function($pengeluaran){
            return Helpers::tanggal_indonesia($pengeluaran->created_at, false);
        })
        ->addColumn('nominal',function($pengeluaran){
            return 'Rp. '.Helpers::format_uang($pengeluaran->nominal);
        })
        ->addColumn('Action', function ($pengeluaran){
            return '
            <a class="me-3" onclick="editForm(`'. route('pengeluaran.show', $pengeluaran->id) .'`)">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
        </a>
        <a class="me-3" onclick="deleteData(`'. route('pengeluaran.destroy', $pengeluaran->id) .'`)">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
        </a>
            ';
        })
        ->rawColumns(['Action','select_all'])
        ->make(true);

    }

    public function store(Request $request)
    {

        /*
        TODO : Menambahkan Keterangan & Image pada table Pengeluaran
        TODO : Memperbaiki CREATE DATA , file tidak bisa terkirim kemungkinan salah di function addForm (AJAX)
        */
        //Get just filename
        $filename = Str::lower(str_replace(' ', '-', $request->nama_produk));
        // Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = 'produk_'.$filename.'_'.time().'.'.$extension;
        // Upload Image
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);

        $pengeluaran = Pengeluaran::create([
            'image' => $fileNameToStore,
            'deskripsi_pengeluaran_id' => $request->deskripsi_pengeluaran_id,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,

        ]);
        return response()->json('Data Berhasil di Simpan',200);
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return response()->json($pengeluaran);
    }

    public function update(Request $request, $id)
    {
        Pengeluaran::find($id)->update($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return response(null, 204);
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $pengeluaran = Pengeluaran::find($id);
            $pengeluaran->delete();
        }
        return response()->json(null, 204);
    }
}
