@extends('layouts.app', ['menu' => 'Produk'])
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
                        @include('master-data.produk.form')
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
                        <h4 class="card-title">Produk</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal"
                            data-target=".form-data">Tambahkan Produk</button>
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
                                        <th>Kategori</th>
                                        <th>Sub Kategori</th>
                                        <th>Kode</th>
                                        <th>Auto</th>
                                        <th>Notes</th>
                                        <th>Poin</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Image</th>
                                        <th>Aksi</th>

                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->subkategori->kategori->name }}</td>
                                            <td>{{ $item->subkategori->name }}</td>
                                            <td>{{ $item->kode_produk }}</td>
                                            <td>{!! $item->auto !!}</td>
                                            <td>{!! $item->notes !!}</td>
                                            <td>{{ $item->poin }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->stok }}</td>
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
        {{-- <script src="{{ asset('cms/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}
        <script src="{{ asset('cms/js/custom.min.js') }}"></script>
        <script src="{{ asset('cms/js/deznav-init.js') }}"></script>

        <script src="{{ asset('cms/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('cms/js/plugins-init/datatables.init.js') }}"></script>

        <script src="{{ asset('cms/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>


        <script>
            function changePassword(id) {

            }


            function kategoriSelect(kategori_id, type = false) {
                if (kategori_id) {
                    $.ajax({
                            method: "get",
                            url: "{{ url('') }}/manage-data/produk/ajax/sub_kategori_by_kategori/" + kategori_id
                        })
                        .done(function(msg) {
                            var sub_kategori = JSON.parse(msg);

                            var providerSelect = '<option value="">-- Sub Kategori --</option>';
                            for (i = 0; i < sub_kategori.length; i++) {
                                providerSelect += '<option value="' + sub_kategori[i].id + '">' + sub_kategori[i].name +
                                    '</option>';
                            }
                            console.log(providerSelect);
                            $('#sub_kategori_id').html(providerSelect);

                            if (type) {
                                console.log(type)
                                $('#sub_kategori_id').val(type);
                            }
                        });
                } else {
                    $('#sub_kategori_id').html('<option value="">-- Sub Kategori --</option>');
                }
            }

            function form_data(tipe, data = false) {
                if (tipe == 'add') {
                    $('#kategori_id').val('');
                    $('#sub_kategori_id').val('');
                    $('#kode_produk').val('');
                    $('#otomatis').val('');
                    $('#notes').val('');
                    $('#poin').val('');
                    $('#description').val('');
                    $('#price').val('');
                    $('#stok').val('');
                    $('#image_produk').val('');

                    $('#form-data-title').html('Tambahkan Produk');
                    document.getElementById('form-data-form').action = "/manage-data/produk/";
                } else {

                    produk = data
                    $('#kategori_id').val(produk.kategori_id);
                    $('#sub_kategori_id').val(produk.sub_kategori_id);
                    $('#kode_produk').val(produk.kode_produk);
                    $('#otomatis').val(produk.otomatis);
                    $('#notes').val(produk.notes);
                    $('#poin').val(produk.poin);
                    $('#description').val(produk.description);
                    $('#price').val(produk.price);
                    $('#stok').val(produk.stok);
                    $('#image_produk').val(produk.image_produk);



                    $('#form-data-title').html('Edit Data Produk');
                    document.getElementById('form-data-form').action = "/manage-data/produk/update/" + produk.id;

                }
            }

            function hapus(id) {
                Swal.fire({
                    title: 'Apa Anda Yakin ?',
                    text: "Akan Menghapus Data Produk !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus Data !'
                }).then((result) => {
                    console.log(result);
                    if (result.value == true) {
                        var url = '/manage-data/produk/:id/delete';
                        url = url.replace(':id', id);
                        window.location.href = url;
                    }
                })
            }
        </script>
    @endsection
