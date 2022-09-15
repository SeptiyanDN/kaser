@extends('layouts.master')
@section('title')
Tambahkan Produk Baru
@endsection
@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Product Add</h4>
    <h6>Create new product</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
    <label>Product Name</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="form-group">
        <label>Category</label>
        <select class="select">
        <option>Choose Category</option>
        <option>Computers</option>
        </select>
        <p class="text-muted text-block cursor-pointer">
            Kategori tidak tersedia? <span class="text-danger">Tambahkan kategori baru</span>
        </p>
        </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
            <label>Merek</label>
            <select class="select">
            <option>Choose Merek</option>
            <option>Computers</option>
            </select>
            <p class="text-muted text-block cursor-pointer">
                Kategori tidak tersedia? <span class="text-danger">Tambahkan Merek baru</span>
            </p>
            </div>
            </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Harga Jual</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Harga Modal</label>
     <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Kode Produk (SKU)</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
        <label>Satuan</label>
        <select class="select">
        <option>Pilih Satuan</option>
        <option>Pcs</option>
        </select>
        </div>
    </div>


    <div class="col-lg-6 col-sm-6 col-12">
        <div class="form-group">
        <label>Jumlah Stock</label>
         <input type="text">
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-12">
        <div class="form-group">
        <label>Minimum Stock</label>
        <input type="text">
        </div>
    </div>
    <div class="col-md-12 form-group">
        <label>
            <input type="checkbox" />
            Kirimkan notifikasi saat stok mencapai batas minimum                                    </label>
    </div>
</div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Description</label>
    <textarea class="form-control"></textarea>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Tax</label>
    <select class="select">
    <option>Choose Tax</option>
    <option>2%</option>
    </select>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Discount Type</label>
    <select class="select">
    <option>Percentage</option>
    <option>10%</option>
    <option>20%</option>
    </select>
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label>Price</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
    <label> Status</label>
    <select class="select">
    <option>Closed</option>
    <option>Open</option>
    </select>
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label> Product Image</label>
    <div class="image-upload">
    <input type="file">
    <div class="image-uploads">
    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg" alt="img">
    <h4>Drag and drop a file to upload</h4>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-12">
    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
    <a href="https://dreamspos.dreamguystech.com/laravel/template/public/productlist" class="btn btn-cancel">Cancel</a>
    </div>
    </div>
    </div>
    </div>

    </div>
@endsection
@push('scripts')


@endpush
