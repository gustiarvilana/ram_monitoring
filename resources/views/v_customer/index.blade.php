@extends('layouts.master')

@section('title')
    Customer Report
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
                            <center>
                            <div class="row form-horizontal">
                                <div class="col-lg-6 col-xs-6 ">
                                    <label for="filter_name">Masukan NIK Kolektor</label>
                                    <input type="text" class="form-control filter" name="filter_kolektor" id="filter_kolektor" placeholder="nik kolektor">
                                    <br>

                                    <div class="col">
                                        <label for="filter_name">Filter Tahap</label>

                                        <select name="filter_tahap" id="filter_tahap" class="filter">
                                            <option value="">Pilih Tahap Upload</option>
                                            <option value="1">Tahap 1</option>
                                            <option value="2">Tahap 2</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="col">
                                        <label for="filter_name">Filter Jenis</label>

                                        <select name="filter_jenis" id="filter_jenis" class="filter">
                                            <option value="">Pilih Jenis Konsumen</option>
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item['jns'] }}">{{ $item['nama_jenis'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="filter_name">Filter Status</label>

                                    <select name="filter_sts_bayar" id="filter_sts_bayar" class="filter">
                                        <option value="">Pilih Status Bayar</option>
                                        <option value="9">Sudah Bayar</option>
                                        <option value="1">Belum Bayar</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            </center>
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
                        <th>No Hp</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Jenis</th>
                        <th>Kolektor</th>
                        <th>Status Bayar</th>
                        <th> = Nominal = </th>
                        <th> Selisih </th>
                        <th>Tahap Data</th>
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
    let tahap = $("#filter_tahap").val()
    let kolektor = $("#filter_kolektor").val()
    let jenis = $("#filter_jenis").val()
    let sts_bayar = $("#filter_sts_bayar").val()

    $(document).ready(function () {

        var table = $('#table').DataTable({
            proccesing: true,
            searching:true,
            autoWidth: false,
            ajax: {
                url: '{{ route('customer.data') }}',
                data: function(d){
                    d.name = name;
                    d.tahap = tahap;
                    d.kolektor = kolektor;
                    d.jenis = jenis;
                    d.sts_bayar = sts_bayar;
                }
            },
            columns: [
                {data: 'DT_RowIndex',searcable: false,sortable: false},
                {data: 'nosp'},
                {data: 'kwitansi'},
                {data: 'nama_konsumen'},
                {data: 'nohp'},
                {data: 'kecamatan'},
                {data: 'kodekota.nama_kota' },
                {data: 'jenis.nama_jenis'},
                {data: 'kd_kolektor'},
                {data: 'sts_bayar'},
                {data: 'sesuai_bayar'},
                {data: 'selisih'},
                {data: 'tahap_data'},
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
        tahap = $("#filter_tahap").val()
        kolektor = $("#filter_kolektor").val()
        jenis = $("#filter_jenis").val()
        sts_bayar = $("#filter_sts_bayar").val()

        console.log([name,tahap,kolektor,jenis,sts_bayar]);

        $('#table').DataTable().ajax.reload(null,false)
    });
</script>
@endpush
