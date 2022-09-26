<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Helpers\NotificationHelpers;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $products = Produk::with('kategori','merek')->get();
        return view('module.produk.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.produk.createproduk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $produk = Produk::create([
        'nama_produk'=> $request->nama_produk,
        'kategori_id'=> $request->kategori_id,
        'merek_id'=> $request->merek_id,
        'harga_jual'=> $request->harga_jual,
        'harga_modal'=> $request->harga_modal,
        'sku'=> $request->sku,
        'satuan'=> $request->satuan,
        'stok'=> $request->stok,
        'minimum_stok'=> $request->minimum_stok,
        'favorit'=> $request->favorit,
        'notifikasi_stok_minimum'=> $request->notifikasi_stok_minimum,
       ]);

        $message = "Berhasil Menambahkan Produk";
        NotificationHelpers::sendNotification($produk,$message);

       return redirect()->route('index.produk')->with('success','data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('module.produk.editproduk',[
            'produk'=>$produk,
            'produks'=>Produk::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $produk->update([
            'nama_produk'=> $request->nama_produk,
            'kategori_id'=> $request->kategori_id,
            'merek_id'=> $request->merek_id,
            'harga_jual'=> $request->harga_jual,
            'harga_modal'=> $request->harga_modal,
            'sku'=> $request->sku,
            'satuan'=> $request->satuan,
            'stok'=> $request->stok,
            'minimum_stok'=> $request->minimum_stok,
            'favorit'=> $request->favorit,
            'notifikasi_stok_minimum'=> $request->notifikasi_stok_minimum,
        ]);

        return redirect()->route('index.produk')->with('success','Berhasil Mengubah Data Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

    }
}
