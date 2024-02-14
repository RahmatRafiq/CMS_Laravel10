@extends('cms.layouts.app')

@section('style')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BANGBELI</title>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')
    {{-- Modal Input Data --}}
    <form id="form-data-form" method="post" enctype="multipart/form-data">
        <div class="modal fade form-data" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title form-data-title"></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('cms.poin.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Akhir Modal Input Data --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Poin</h4>
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
                        <form action="" onreset="window.location.href='/poin'">
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Search" name="search" class="form-control" value="{{request()->query('search')}}">
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-success">Cari</button>
                                </div>
                                <div class="col-lg-1">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="example50" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Description</th>
                                        <th>Poin</th>
                                        <th>Poin Akhir</th>
                                        <th>Tipe Poin</th>
                                        <th>Waktu Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->member->username }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->point }}</td>
                                            <td>{{ $item->point_akhir }}</td>
                                            <td>{{ $item->type_point }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
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

    {{-- <script src="{{ asset('cms/lightbox/js/lightbox-plus-jquery.min.js') }}"></script> --}}

    <script>
        $('#example50').DataTable({
            paging: false,
            info: false,
            searching: false,
        })

        // Form Modal Tambah & Edit Data
        function form_data(tipe, data = false) {
            if (tipe == 'add') {
                $('.form-data-title').html('Tambah Data Bank');
                document.getElementById('form-data-form').action = "/manage-data/provider";
                $('#id').val('');
                $('#nama').val('');
            } else if (tipe == 'ubah') {
                $('.form-data-title').html('Edit Data Bank');
                document.getElementById('form-data-form').action = "/manage-data/provider/update";

                $('#id').val(data.id);
                $('#nama').val(data.nama);
            }
        }

        // Hapus Data Akun Bank
        function hapus(id) {
            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Akan Menghapus Data Poin !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data !'
            }).then((result) => {
                console.log(result);
                if (result.value == true) {
                    var url = '/manage-data/provider/:id/delete';
                    url = url.replace(':id', id);
                    window.location.href = url;
                }
            })
        }
    </script>
@endsection
