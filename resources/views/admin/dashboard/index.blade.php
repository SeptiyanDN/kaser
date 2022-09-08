@extends('layouts.master')
@section('title')
Dashboard CMS Admin
@endsection

@section('content')

<div class="row">
<div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Pie </h5>
            </div>
            <div class="ibox-content">
                <div>
                    <canvas id="doughnutChart" height="140"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Bulan ini</span>
                <h5>Total Penjualan</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">Rp. 1.000.000</h1>
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

                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Donut Chart Example</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="morris-donut-chart" height="140" ></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget red-bg p-lg text-center">
                                <div class="m-b-md">
                                    <i class="fa fa-bell fa-4x"></i>
                                    <h1 class="m-xs">47</h1>
                                    <h3 class="font-bold no-margins">
                                        Notification
                                    </h3>
                                    <small>We detect the error.</small>
                                </div>
                            </div>
                    </div>
            <div class="col-lg-3">
                <div class="widget navy-bg p-lg no-padding">
                    <div class="p-m">
                        <h1 class="m-xs">$ 1,540</h1>

                        <h3 class="font-bold no-margins">
                            Annual income
                        </h3>
                        <small>Income form project Alpha.</small>
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart1"></div>
                    </div>
                </div>
            </div>  
            
    </div>
            





@endsection
@push('scripts')

<script>
        var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    points: {
                        width: 0.1,
                        show: false
                    }
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false
                }
            });
</script>
<script>
     var doughnutData = {
        labels: ["Penjualan","Pembelian","Kas bon" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#E80F88","#FF7F3F","#277BC0"]
        }],
        
    } ;


    var doughnutOptions = {
        responsive: true
    };
 var ctx4 = document.getElementById("doughnutChart").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
</script>

<script>
     Morris.Donut({
        element: 'morris-donut-chart',
        data: [{ label: "Download Sales", value: 12 },
            { label: "In-Store Sales", value: 30 },
            { label: "Mail-Order Sales", value: 20 } ],
        resize: true,
        colors: ['#E80F88', '#FF7F3F','#277BC0'],
    });
</script>
 
@endpush
