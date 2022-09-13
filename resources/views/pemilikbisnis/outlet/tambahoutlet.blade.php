@extends('layouts.master')
@section('title')
Menambahkan Outlet Baru
@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
    <h4>Menambahkan Outlet Baru</h4>
    <h6>Menambahkan Outlet Baru</h6>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-lg-6 col-sm-6 col-12">

    <form action={{route('create-outlet')}} method="POST">
        @csrf
    <div class="form-group">
    <label>Nama Outlet</label>
    <input type="text" id="nama_outlet" name="nama_outlet" class="form-control">
    </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-12">
    <div class="form-group">
    <label>Nomor Telepon</label>
    <input type="text" class="form-control" id="telepon" name="telepon">
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Alamat Outlet</label>
    <textarea class="form-control" id="alamat" name="alamat" type="text"></textarea>
    </div>
    </div>
    <div class="col-lg-8 col-sm-6 col-12">
    <div class="form-group">
    <label>Kelurahan</label>
    <select  id="kelurahan" name="kelurahan" class="form-control select">
    <option>Pilih Kelurahan Alamat Outlet</option>
    <option value="kelurahan testing">2%</option>
    </select>
    </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="form-group">
        <label>Kode Pos</label>
        <input type="text" id="kode_pos" name="kode_pos" class="form-control">
        </div>
        </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label>Foto Outlet</label>
    <div class="image-upload">
    <input type="file" name="foto" class="form-control">
    <div class="image-uploads">
    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/upload.svg" alt="img">
    <h4>Pilih File Foto Outlet</h4>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-12">
    <button type="submit" class="btn btn-primary ">Submit</button>
    <a href="https://dreamspos.dreamguystech.com/laravel/template/public/productlist" class="btn btn-cancel">Cancel</a>
    </div>
</form>

    </div>
    </div>
    </div>

    </div>
@endsection
