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
                        @include('cms.image.form')
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
                        <h4 class="card-title">Gambar</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal" data-target=".form-data">Tambah Gambar</button>
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
                                    <th style="width: 7em">Status</th>
                                    <th style="min-width: 200px">Gambar</th>
                                    <th>Posisi Slide</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Halaman</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="btn-status-group" style="width: 7em">
                                                <form action="{{route('image.update.status')}}" method="post" id="change-status-{{$item->id}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="IDstatus" value="{{ $item->id }}">
                                                </form>
                                                @if ($item->status === 'aktif')
                                                <button class="btn btn-success shadow sharp btn-block" onclick="gantiStatus({{$item->id}})">Aktif</button>
                                                @else
                                                <button class="btn btn-danger shadow sharp btn-block" onclick="gantiStatus({{$item->id}})">Tidak Aktif</button>
                                                @endif
                                            </div>
                                        </td>
                                        <td><img src="{{ asset($item->gambar) }}" alt="Title" style="height: 140px; width: 450px;"></td>
                                        <td>{{ $item->posisi }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->halaman }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp" data-toggle="modal" data-target=".form-data" onclick="form_data('edit',{{$item->id}})"><i class="fa fa-edit"></i></button>
                                                &nbsp;
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
                $('#status').val('');
				$('#posisi').val('');
				$('#halaman').val('');
				$('#judul').val('');
				$('#deskripsi').val('');
				$('#form-gambar').show();
                $('#form-data-title').html('Tambah Data Gambar');
                document.getElementById('form-data-form').action = "{{ route('image.store') }}";
            } else {
                $.ajax({
					method: "get",
					url: "{{url('')}}/admin-v2/image/update/"+data
				})
				.done(function( msg ) {
					msg = JSON.parse(msg);
					$('#status').val(msg.status);
					$('#posisi').val(msg.posisi);
					$('#halaman').val(msg.halaman);
					$('#judul').val(msg.judul);
					$('#deskripsi').val(msg.deskripsi);
					$("#form-gambar").css("display","none")
					$('#myModal').modal('show');
				});
                $('#form-data-title').html('Edit Data Gambar');
                document.getElementById('form-data-form').action = "{{ route('image.update') }}";
            }
            $('#id').val(data)
        }

        function hapus(id){
            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Akan Menghapus Data Gambar !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data !'
              }).then((result) => {
                  console.log(result);
                    if (result.value == true) {
                        var url = '{{ route("image.destroy", ":id") }}';
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

        $("#gambar").change(function () {
            let placeholder = document.getElementById("placeholder-input-gambar");
            if (this.files.length > 0) {
                let filename = this.files[0].name;
                if (filename !== "") {
                    placeholder.innerText = filename;
                    return;
                }
            }
            placeholder.innerText = "Pilih gambar (*.jpg)";
        });


    </script>
@endsection
