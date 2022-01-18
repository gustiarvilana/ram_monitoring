@extends('layouts.master')

@section('title')
    User Management
@endsection

@section('content')

<div class="row">
    <div class="box box-success">
        <div class="box-header">
            <button onclick="addform('{{ route('user.store') }}')" class="btn-success btn-xs"><i
                    class="fa fa-plus-circle"></i> Tambah user</button>
        </div>
        <div class="box-body table-responsive">
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{-- <h3 class="panel-title">Custom Filter [Case Sensitive]</h3> --}}
                </div>
                <div class="panel-body">
                        <div class="form-group">
                            <label for="filter_name">Cari Nama</label>
                            <input type="text" class="form-control filter" name="filter_name" id="filter_name" placeholder="search name">
                        </div>
                </div>
            </div>
            <table class="table table-striped table-inverse table-bordered table-responsive" id="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@includeIf('user.form')

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
                url: '{{ route('user.data') }}',
                data: function(d){
                    d.name = name;
                }
            },
            columns: [
                {data: 'DT_RowIndex',searcable: false,sortable: false},
                {data: 'nik'},
                {data: 'name'},
                {data: 'username'},
                {data: 'pass'},
                {data: 'email'},
                {data: 'nama_jabatan'},
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
        $('#modal-form .modal-title').text('Tambah User');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
    };

    function editform(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit User');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nik]').val(response.nik);
                $('#modal-form [name=name]').val(response.name);
                $('#modal-form [name=username]').val(response.username);
                $('#modal-form [name=email]').val(response.email);
                $('#modal-form [name=level]').val(response.level);
                $('#modal-form [name=password]').val(response.password);
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
</script>
@endpush