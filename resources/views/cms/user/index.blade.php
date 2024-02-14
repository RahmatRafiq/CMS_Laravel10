@extends('cms.layouts.app')

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
                        @include('cms.user.form')
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
                        <h4 class="card-title">User</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal" data-target=".form-data">Tambah User</button>
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
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp mr-1" onclick="form_data('ubah',{{ json_encode($item) }})" data-toggle="modal" data-target=".form-data"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger shadow btn-xs sharp" onclick="hapus({{$item->id}})"><i class="fa fa-trash"></i></button>
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
        function form_data(tipe, data=false){
            if(tipe == 'add'){
                $('#name').val('');
				$('#email').val('');
				$('#phone').val('');
				$('#address').val('');
                $('#input-password').show();
				$('#form-data-title').html('Tambah Data User');
                document.getElementById('form-data-form').action = "{{ route('user.store') }}";
            } else {
                $('#input-password').hide();
                $('#name').val(data.name);
				$('#email').val(data.email);
				$('#phone').val(data.phone);
				$('#address').val(data.address);
                $('#id').val(data.id)
                $('#form-data-title').html('Edit Data User');
                document.getElementById('form-data-form').action = "{{ route('user.update') }}";
            }
        }

        function hapus(id){
            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Akan Menghapus Data User !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data !'
              }).then((result) => {
                  console.log(result);
                    if (result.value == true) {
                        var url = '{{ route("user.destroy", ":id") }}';
                        url = url.replace(':id',id);
                        window.location.href = url;
                    }
              })
        }

        function gantiStatus(id) {
            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Anda akan mengubah status gambar.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah status gambar!'
              }).then((result) => {
                    if (result.value == true) {
                        var form = document.getElementById(`change-status-${id}`)
                        form.submit();
                    }
              })
        }
    </script>
@endsection
