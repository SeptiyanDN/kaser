@extends('layouts.master')
@section('title')
Daftar Cabang Outlet
@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Manage Daftar Cabang Outlet</h5>
                <div class="ibox-tools">
                         <!-- Button trigger modal -->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Cabang Outlet
              </button>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                 
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="datatables1">
                        <thead>
                        <tr>
                            <th>Nama Cabang</th>
                            <th>Kategori</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                       
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('create-outlet')}}">
            @csrf
            <div class="form-group">
                <input name="nama_outlet" id="nama_outlet" type="text" class="form-control" placeholder="nama_outlet" required="">
            </div><div class="form-group">
                <input name="kategori" id="kategori" type="text" class="form-control" placeholder="kategori" required="">
            </div><div class="form-group">
                <input name="alamat" id="alamat" type="text" class="form-control" placeholder="alamat" required="">
            </div>
        </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary block full-width m-b form-control">Tambah Outlet</button>
    </form>

      </div>
    </div>
  </div>

@endsection
@push('scripts')

<script type="text/javascript">
          $(function(){
            $('#datatables1').DataTable({
                processing: true,
                responsive: true,
                serverSide : true,
                ajax: {
                    url: "{{route('json')}}"
                },
                columns: [
                    {data :'nama_outlet',name:'nama_outlet'},
                    {data :'kategori', name:'kategori'},
                    {data :'alamat', name:'alamat'},
                    {data :'aksi', name:'aksi'}
                ],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ],

            });
          });

</script>

@endpush
