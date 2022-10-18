@extends('layouts.master')
@section('title')
Pengeluaran Outlet
@endsection
@section('content')
    <div class="page-header">
    <div class="page-title">
    <h4>Pengeluaran Outlet</h4>
    <h6>Pengeluaran Outlet</h6>
    </div>
    <div class="row">
        <div class="col-sm-12">
        </div>
        </div>
        </div>
    <div class="card">
    <div class="card-body">
    <div class="table-top">
    <div class="search-set">
    <div class="search-input">
        <a onclick="addForm('{{route('pengeluaran.store')}}')" class="btn btn-primary btn-sm">Tambah Transaksi Baru</a>
        <a type="button" onclick="deleteSelected('{{ route('pengeluaran.delete_selected') }}')" class="btn btn-secondary btn-sm">Hapus</a>

    </div>
    </div>
    <div class="wordset">
    <ul>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/pdf.svg" alt="img"></a>
    </li>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/excel.svg" alt="img"></a>
    </li>
    <li>
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/printer.svg" alt="img"></a>
    </li>
    </ul>
    </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="card mb-0" id="filter_inputs">
    <div class="card-body pb-0">
    <div class="row">
    <div class="col-lg-12 col-sm-12">
    <div class="row">

    </div>
    </div>
    </div>
    </div>
    </div>
     <form class="form-produk" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th width="1%">
                            <input type="checkbox" name="select_all" id="select_all">
                        </th>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Jenis Pengeluaran</th>
                        <th>Nominal</th>
                        <th width="10%">Action</i></th>
                    </thead>
                </table>
            </div>
        </form>
    </div>
    </div>

    </div>
@includeIf('module.kelolakas.pengeluaran.form')
@endsection
@push('scripts')
<script>
  let table;
    $(function () {
        table = $('.table').DataTable({
            "bFilter": true,
            "responsive":true,
            "serverSide" : true,
            "proccessing" : true,
			"sDom": 'fBtlpi',
            "autoWidth": false,
			"language": {
				search: ' ',
				sLengthMenu: '_MENU_',
				searchPlaceholder: "Mencari...",
				info: "_START_ - _END_ of _TOTAL_ items",
			 },
            ajax: {
                url: '{{ route('pengeluaran.data') }}',

            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex'},
                {data: 'created_at'},
                {data: 'deskripsi_pengeluaran'},
                {data: 'nominal'},
                {data: 'Action'},
            ]
        });

        $('#modal-form').validator().on('submit', function (e){
            if (! e.preventDefault()){
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
            swal({
            title: "Berhasil!",
            text: "Data anda telah tersimpan",
            type: "success",
            confirmButtonColor: "#FF9F43"
            },function () {
                $('#modal-form').modal('hide');
                table.ajax.reload();
                });
            }
        });

        $('[name=select_all]').on('click', function (){
            $(':checkbox').prop('checked', this.checked);
        });

    })
    function deleteSelected(url){
        if ($('input:checked').length >= 1) {
            swal({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus",
            confirmButtonColor: "#DD6B55",
            closeOnConfirm: true
            },
                function () {
                    $.post(url, $('.form-produk').serialize())
            .done((response) => {
            table.ajax.reload();
            toastr.success('Data anda telah terhapus','BERHASIL')
            });
            });
        }else{
        toastr.error('Pilih data yang akan di hapus!','PERHATIAN')
            return;
        }
    }
    function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Pengeluaran Baru');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=deskripsi]').focus();
    }
    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Pemasukan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=deskripsi]').focus();

        $.get(url)
        .done((response) => {
            $('#modal-form [name=deskripsi_pemasukan]').val(response.deskripsi_pemasukan);
            $('#modal-form [name=nominal]').val(response.nominal);
        })
        .fail((errors) => {
            alert('tidak dapat menampilkan data');
            return;
        });
    }
    function deleteData(url){
        swal({
            title: "Peringatan!",
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus",
            closeOnConfirm: false
        },
        function () {
        $.post(url, {
        '_token': $('[name=csrf-token]').attr('content'),
        '_method': 'delete'
        })
        .done((response) => {
        swal("Deleted!", "Data anda telah terhapus", "success");
        table.ajax.reload();
        });
        });
    }
</script>
@endpush
