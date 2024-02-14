@extends('layouts.app', ['menu' => 'Sub Kategori'])

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
    <form id="form-data-form" action="#" method="post" enctype="multipart/form-data">
        <div class="modal fade form-data" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-data-title"></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('master-data.sub-kategori.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
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
                        <h4 class="card-title">Sub Kategori</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal"
                            data-target=".form-data">Tambahkan Sub Kategori</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Name</th>
                                        <th>Server</th>
                                        <th>Image</th>
                                        <th>Opsi</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->kategori?->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->server }}</td>
                                            <td>
                                                <img src="{!! env('MAIN_HOST_URL') . $item->image !!}" class="img-thumbnail"
                                                    style="width: 120px !important; height: 48px !important; object-fit: contain;">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp mr-1"
                                                        onclick="form_data('ubah',{{ json_encode($item) }})"
                                                        data-toggle="modal" data-target=".form-data"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-danger shadow btn-xs sharp"
                                                        onclick="hapus({{ $item->id }})"><i
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
        <script src="{{ asset('cms/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('cms/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('cms/js/custom.min.js') }}"></script>
        <script src="{{ asset('cms/js/deznav-init.js') }}"></script>

        <script src="{{ asset('cms/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('cms/js/plugins-init/datatables.init.js') }}"></script>

        <script src="{{ asset('cms/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>


        <script>
            function changePassword(id) {

            }

            function form_data(tipe, data = false) {
                if (tipe == 'add') {
                    $('#kategori_id').val('');
                    $('#name').val('');
                    $('#server').val('');
                    $('#image').val('');

                    $('#form-data-title').html('Tambahkan Sub Kategori');
                    document.getElementById('form-data-form').action = "/manage-data/sub-kategori/";
                } else {

                    subkategori = data
                    $('#kategori_id').val(subkategori.kategori_id);
                    $('#name').val(subkategori.name);
                    $('#server').val(subkategori.server);
                    $('#image').val(subkategori.image);



                    $('#form-data-title').html('Edit Data Sub Kategori');
                    document.getElementById('form-data-form').action = "/manage-data/sub-kategori/update/" + subkategori.id;

                }
            }

            function hapus(id) {
                Swal.fire({
                    title: 'Apa Anda Yakin ?',
                    text: "Akan Menghapus Data Sub Kategori !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus Data !'
                }).then((result) => {
                    console.log(result);
                    if (result.value == true) {
                        var url = '/manage-data/sub-kategori/:id/delete';
                        url = url.replace(':id', id);
                        window.location.href = url;
                    }
                })
            }
        </script>
    @endsection
