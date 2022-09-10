@extends('layouts.master')
@section('title')
Menambahkan Outlet Baru
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Menambahkan Outlet Baru</h4>
    <h6>Create new outlet</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-6 col-sm-6 col-12">
    <div class="form-group">
    <label>Nama Outlet</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-12">
    <div class="form-group">
    <label>Nomor Telepon</label>
    <input type="text">
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Alamat Outlet</label>
    <textarea class="form-control"></textarea>
    </div>
    </div>
    <div class="col-lg-8 col-sm-6 col-12">
    <div class="form-group">
    <label>Tax</label>
    <select class="select">
    <option>Pilih Kelurahan Alamat Outlet</option>
    <option>2%</option>
    </select>
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="form-group">
        <label>Kode Pos</label>
        <input type="text">
        </div>
        </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Foto Outlet</label>
    <div class="image-upload">
    <input type="file">
    <div class="image-uploads">
    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg" alt="img">
    <h4>Pilih File Foto Outlet</h4>
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
