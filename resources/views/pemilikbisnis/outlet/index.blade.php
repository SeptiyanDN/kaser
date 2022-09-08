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
                <button onclick="addForm('{{ route('create-outlet') }}')" class="btn btn-success btn-outline btn-xs dim"><i
                class="fa fa-plus"></i>
            Tambah Outlet Baru</button>
 
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                 
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">                        <thead>
                        <tr>
                        <th width="1%">No</th>
                            <th>Nama Outlet</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Kelurahan</th>
                            <th width="8%"><i class="fa fa-cog"></i></th>
                        </tr>
                        </thead>
                       
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@includeIf('pemilikbisnis.outlet.form')

@endsection
@push('scripts')
<script type="text/javascript">
    let table;
    $(function (){
        table = $('.table').DataTable({
                processing: true,
                responsive: true,
                serverSide : true,
                ajax: {
                    url: "{{route('json')}}"
                },
                columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data :'nama_outlet',name:'nama_outlet'},
                    {data :'telepon', name:'telepon'},
                    {data :'alamat', name:'alamat'},
                    {data :'kelurahan', name:'kelurahan'},
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

            $('#modal-form').validator().on('submit', function (e){
            if (! e.preventDefault()){
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                .done((response) => {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                    toastr.success('Data member telah disimpan','BERHASIL')
                })
                .fail((errors) => {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                    toastr.warning('tidak dapat menyimpan data','GAGAL')
                    return;
                });
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('.livesearch').select2({
            dropdownParent: $('#modal-form .modal-content'),
            width:'100%',
            language: 'id',
            ajax: { 
          url: "{{route('ajax-autocomplete-search')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            console.log(response)
            return {
              results: response
            };
          },
          cache: true
             },
             minimumInputLength: 3,
             escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                    templateResult: function(response) {
                        if (response.id) {
                          return '<strong>'+response.kelurahan+'</strong><br>'+response.id;
                      } 
                      return response.text;
                    },
                    templateSelection: function(response) {
                       
                        if (response.id) {
                            return response.id;
                        }
                        return response.text;
                    }
        })
           
    })

    function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Daftar Outlet Baru');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_outlet]').focus();
        $('#modal-form [name=telepon]')
        $('#modal-form [name=alamat]')
        $('#modal-form [name=kelurahan]')
    }

    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Data Outlet');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_outlet]').focus();
        $.get(url)
        .done((response) => {
            $('#modal-form [name=nama_outlet]').val(response.nama_outlet);
            $('#modal-form [name=telepon]').val(response.telepon);
            $('#modal-form [name=alamat]').val(response.alamat);
            $('#modal-form [name=kelurahan]').val(response.kelurahan);
        })
        .fail((errors) => {
            alert(' dapat menampilkan data');
            return;
        });
    }

    function deleteData(url){
        if (confirm('Yakin Ingin Hapus Data')) {
            $.post(url, {
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete'
        })
        .done((response) => {
            table.ajax.reload();
            toastr.error('Data telah dihapus','PERHATIAN')
        })
        .fail((errors) => {
            alert('tidak dapat menghapus data');
            return;
        });
        }
    }
</script>

@endpush
