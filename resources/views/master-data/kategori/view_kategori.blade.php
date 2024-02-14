@extends('layouts.app', ['menu' => 'Akun Bank'])

@section('style')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BANGBELI</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('cms/images/favicon.png') }}">
    <link href="{{ asset('cms/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form id="form-data-form" action="/kategori" method="POST" enctype="multipart/form-data">
        <div class="modal fade form-data" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-data-title"></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('master-data.kategori.form_kategori')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="post">
        <div class="modal fade export-data" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Export Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('master-data.kategori.export_kategori')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Export Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Category</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal"
                            data-target=".form-data">Tambah Data</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".export-data">Export
                            Data</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>View ID Pelanggan</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($data_kategori as $data)
                                        <tr>
                                            <td><img src="{{ URL::asset($data['image']) }}" alt="profile Pic" height="80"
                                                    width="80"></td>
                                            <td>{{ $data['name'] }}</td>
                                            @if ($data['view_pelanggan_id'] == 1)
                                                <td>
                                                    <span class="badge light badge-success">
                                                        <i class="fa fa-circle text-success mr-1"></i>
                                                        Active
                                                    </span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge light badge-danger">
                                                        <i class="fa fa-circle text-danger mr-1"></i>
                                                        Non-Active
                                                    </span>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        onclick="form_data('ubah','{{ json_encode($data) }}')"
                                                        data-toggle="modal" data-target=".form-data"><i
                                                            class="fa fa-pencil"></i></button>
                                                    &nbsp;
                                                    <button class="btn btn-danger shadow btn-xs sharp"
                                                        onclick="hapus({{ $data['id'] }})"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('cms/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('cms/js/plugins-init/datatables.init.js') }}"></script>

        <script src="{{ asset('cms/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

        <script>
            function form_data(tipe, data = false) {
                if (tipe == 'add') {
                    $('#form-data-title').html('Tambah Data Contoh');
                    $('#name').val('');
                    $("input[name='view_pelanggan_id']:checked").val('');
                    document.getElementById('form-data-form').action = "/manage-data/kategori";
                } else {
                    var data = JSON.parse(data);
                    $('#name').val(data.name);
                    $("input[name='view_pelanggan_id']:checked").val(data.view_pelanggan_id);
                    if (data.view_pelanggan_id == 1) {
                        radiobtn = document.getElementById("view_pelanggan_id_1");
                        radiobtn.checked = true;
                    } else {
                        radiobtn = document.getElementById("view_pelanggan_id_2");
                        radiobtn.checked = true;
                    }
                    $('#id').val(data.id);
                    document.getElementById('form-data-form').action = "/manage-data/kategori/update";
                    $('#form-data-title').html('Edit Data Contoh');
                }
            }

            function hapus(id) {
                Swal.fire({
                    title: 'Apa Anda Yakin ?',
                    text: "Akan Menghapus Data Contoh !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus Data !'
                }).then((result) => {
                    console.log(result);
                    if (result.value == true) {
                        var url = '/manage-data/kategori/:id/delete';
                        url = url.replace(':id', id);
                        window.location.href = url;
                    }
                })
            }
        </script>
    @endsection
