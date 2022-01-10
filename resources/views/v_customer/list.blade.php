@extends('layouts.master')

@section('title')
    Customer Monitoring
@endsection

@section('content')
<div class="row">
    <div class="box box-success">
        <div class="box-header">
            {{--  --}}
        </div>
        <div class="box-body table-responsive">
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{-- <h3 class="panel-title">Custom Filter [Case Sensitive]</h3> --}}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="filter_name">Global Filter</label>
                        <input type="text" class="form-control filter" name="filter_name" id="filter_name" placeholder="search name">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-inverse table-bordered table-responsive" id="table">
                <thead class="thead-inverse">
                    <tr>
                        <th width='5%'>No</th>
                        <th>No SP</th>
                        <th>No Kwitansi</th>
                        <th>Nama</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Jenis</th>
                        <th>Kolektor</th>
                        <th>Status Bayar</th>
                        <th> = Nominal </th>
                        <th> Selisih </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@includeIf('customer.form')
@endsection

@push('script')
<script>
    let name = $("#filter_name").val() 

    $(document).ready(function () {

        var table = $('#table').DataTable({
            proccesing: true,
            searching:true,
            autoWidth: false,
            ajax: {
                url: '{{ route('customer.data') }}',
                data: function(d){
                    d.name = name;
                }
            },
            columns: [
                {data: 'DT_RowIndex',searcable: false,sortable: false},
                {data: 'nosp'},
                {data: 'kwitansi'},
                {data: 'nama_konsumen'},
                {data: 'kecamatan'},
                {data: 'kodekota.nama_kota' },
                {data: 'jenis.nama_jenis'},
                {data: 'kd_kolektor'},
                {data: 'sts_bayar'},
                {data: 'sesuai_bayar'},
                {data: 'selisih'},
                {data: 'aksi'},
            ],

            // export
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5 ]
                    }
                },
                'colvis'
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (!e.preventDefault()) {
                $.ajax({
                        url: $('#modal-form form').attr('action'),
                        type: "post",
                        data: $('#modal-form form').serialize()
                    })
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        $('#table').DataTable().ajax.reload()
                    })
                    .fail((errors) => {
                        alert('Tidak dapat Menyimpan Data');
                        return;
                    });
            }
        })
    });

    function addform(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Customer');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
    };

    function editform(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Customer');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');

        $.get(url)
            .done((response) => {
                $('#modal-form [name=no_sp]').val(response.no_sp);
                $('#modal-form [name=nama_customer]').val(response.nama_customer);
                $('#modal-form [name=username]').val(response.username);
                $('#modal-form [name=alamat]').val(response.alamat);
                $('#modal-form [name=status]').val(response.status);
            })
            .fail((errors) => {
                alert('Tidak Dapat menampilkan data');
                return;
            });
    };

    function deleteform(url) {
        if (confirm('Yakin Akan Menghapus data???')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    $('#table').DataTable().ajax.reload()

                })
                .fail((errors) => {
                    return alert('Tidak Dapat Menghapus Data');
                });
        }
    }

    $(".filter").on('change',function () { 
        name = $("#filter_name").val() 

        console.log(name);
        
        $('#table').DataTable().ajax.reload(null,false)
    });
</script>
@endpush