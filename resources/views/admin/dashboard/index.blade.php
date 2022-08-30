@extends('layouts.master')
@section('title')
Dashboard CMS Admin
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Bulan ini</span>
                <h5>Total Penjualan</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">Rp. 10.000.000</h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>Lihat Detail</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Bulan ini</span>
                <h5>Total Keuntungan</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">Rp. 2.750.000</h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small>Lihat Detail</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right">Bulan ini</span>
                <h5>Total Transaksi</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">210</h1>
                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>Lihat Detail</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">Bulan ini</span>
                <h5>Produk terjual</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">15</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>Lihat Detail</small>
            </div>
        </div>
</div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Detail Penjualan </h5>
                <span class="label label-success pull-right">Bulan ini</span>
                <img style="margin-top: -2px;" src="https://krenz-snack-751901.qasir.id/assets/images/svg/information.svg" >
            </div>
            <div class="ibox-content">
                <div class="row">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xs-7">
                                    <h4>Penjualan Kotor</h4>
                                </div>
                                <div class="col-xs-5">
                                    <h4 >Rp. 10.000.000</h4>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xs-7">
                                    <h4>Diskon</h4>
                                </div>
                                <div class="col-xs-5">
                                    <h4 >Rp. 0</h4>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xs-7">
                                    <h4>Pajak</h4>
                                </div>
                                <div class="col-xs-5">
                                    <h4 >Rp. 0</h4>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="row">
                                <div class="col-xs-7">
                                    <h4>Total Penjualan</h4>
                                </div>
                                <div class="col-xs-5">
                                    <h4 >Rp. 10.000.000</h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                 </div>
             </div>
          </div>
    </div>



@endsection
