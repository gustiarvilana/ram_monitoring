@extends('layouts.master')

@section('title')
Customer Detail
@endsection

@section('content')

<div class="row">
    <div class="box box-success">
        <div class="box-header">
            <div class="col-lg-6 col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nosp</th>
                            <th>:</th>
                            <th>{{ $customer->nosp }}</th>
                        </tr>
                        <tr>
                            <th>No Kwitansi</th>
                            <th>:</th>
                            <th>{{ $customer->kwitansi }}</th>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th>{{ $customer->nama_konsumen }}</th>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <th>:</th>
                            <th>Rp. {{ format_uang($customer->besar_angsur_bln * 9) }}</th>
                        </tr>
                        <tr>
                            <div style="display: none">
                                @php
                                $total_bayar=0;
                                @endphp
                                @foreach ($tagihan as $item)
                                {{ $total_bayar += $item->nominal_tagih; }}
                                @endforeach
                            </div>
                            <th>Sisa</th>
                            <th>:</th>
                            <th>Rp. {{ format_uang($customer->besar_angsur_bln * 9 - $total_bayar) }}</th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th>{{ $customer->alamat }}</th>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <th>:</th>
                            <th>{{ $customer->kecamatan }}</th>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <th>:</th>
                            <th>{{ $customer->kodekota->nama_kota }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-xs-12">
                {{-- <center>
                    <h1>check</h1>
                </center> --}}
            </div>
        </div>
        <div>
            <hr>
        </div>
        <div class="box-body table-responsive">
            <center>
                <h2>History</h2>
                <br>
            </center>
            <div class="panel panel-default">
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>tgl penagihan</th>
                            <th>kolektor</th>
                            <th>koordinator</th>
                            <th>Cicilan Ke</th>
                            <th>Nominal Tagih</th>
                            <th>tgl Jatuh tempo</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tagihan as $key=>$item)
                        <tr>
                            <td>{{ $key + 1  }}</td>
                            <td>{{ $item->tgl_penagihan  }}</td>
                            <td>{{ $item->colector  }}</td>
                            <td>{{ $item->koordinator_clt  }}</td>
                            <td>{{ $item->cicilan_ke  }}</td>
                            <td>{{ $item->nominal_tagih  }}</td>
                            <td>{{ $item->tgl_jt_tempo  }}</td>
                            <td>{{ $item->ket  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('customer.form')

@endsection

@push('script')
{{-- <script>
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
{data: 'no_kwitansi'},
{data: 'nosp'},
{data: 'nama_customer'},
{data: 'alamat'},
{data: 'kelurahan'},
{data: 'kecamatan'},
{data: 'kota'},
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
$('#modal-form [name=nosp]').val(response.nosp);
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

$('#table').DataTable().ajax.reload(null,false)
});
</script> --}}
@endpush