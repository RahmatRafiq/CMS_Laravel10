@extends('layouts.app', ['menu' => 'Akun Bank'])

@section('style')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BANGBELI</title>
@endsection

@section('content')
    {{-- Modal Input Data --}}
    <form id="form-data-form" method="post" enctype="multipart/form-data">
        <div class="modal fade form-data" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title form-data-title"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('master-data.barang.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade lihat-gambar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title form-data-title"></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('master-data.barang.lihat-gambar')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" class="btn btn-primary">Simpan Data</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Modal Input Data --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Barang</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal"
                            data-target=".form-data">Tambah Data</button>
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
                                        <th>Nama Barang</th>
                                        <th>Warna</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->warna }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>
                                                <button class="btn btn-success"
                                                    onclick="form_data('lihat',{{ json_encode($item) }})"
                                                    data-toggle="modal" data-target=".lihat-gambar">Lihat Gambar</button>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- <button class="btn btn-success shadow btn-xs sharp mr-1" onclick="form_data('lihat','{{ json_encode($item) }}')" data-toggle="modal" data-target=".form-data"><i class="fa fa-search"></i></button> --}}
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
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('cms/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('cms/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('cms/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('cms/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>

    <script>
        // Form Modal Tambah & Edit Data
        function form_data(tipe, data = false) {
            if (tipe == 'add') {
                $('.form-data-title').html('Tambah Data Bank');
                document.getElementById('form-data-form').action = "/manage-data/barang";
                $('#id').val('');
                $('#judul').val('');
                $('#harga').val('');
                $('#warna').val('');
                $('#stok').val('');
                $('#deskripsi_thmbnl').val('');
                $('#deskripsi').val('');
            } else if (tipe == 'ubah') {
                $('.form-data-title').html('Edit Data Bank');
                document.getElementById('form-data-form').action = "/manage-data/barang/update";

                $('#id').val(data.id);
                $('#judul').val(data.judul);
                $('#harga').val(data.harga);
                $('#warna').val(data.warna);
                $('#stok').val(data.stok);
                $('#deskripsi_tmbnl').val(data.deskripsi_tmbnl);
                $('#deskripsi').val(data.deskripsi);
            } else if (tipe == 'lihat') {
                $('.form-data-title').html('Lihat Gambar Barang');
                var html = '';
                JSON.parse(data['image']).forEach((element, key) => {
                    html += '<div class="col-xl-12 col-md-12">' +
                        '<div class="form-group row">' +
                        '<label class="col-lg-4 col-form-label " for="image">Gambar ' + (key + 1) +
                        '<span class="text-danger"></span>' +
                        '</label>' +
                        '<div class="col-lg-8">' +
                        '<img src="{{ asset('barang/') }}/' + element +
                        '" alt="" style="object-fit: contain; width: 100%;">' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                });
                $('#view-lihat-gambar').html(html);
            }
        }

        // Hapus Data Akun Bank
        function hapus(id) {
            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Akan Menghapus Data Barang !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data !'
            }).then((result) => {
                console.log(result);
                if (result.value == true) {
                    var url = '/manage-data/barang/:id/delete';
                    url = url.replace(':id', id);
                    window.location.href = url;
                }
            })
        }
    </script>
@endsection
