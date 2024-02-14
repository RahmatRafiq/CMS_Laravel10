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
                        @include('cms.member.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- <form action="#" method="post" enctype="multipart/form-data">
        <div class="modal fade form-change-password" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-data-title"></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('cms.member.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Member</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" onclick="form_data('add')" data-toggle="modal" data-target=".form-data">Tambah Member</button>
                        <div class="mt-3">
                            <label for="">Jumlah Saldo Member</label>
						    <input type="text" class="form-control" value="{{ "Rp " . number_format($saldo,2,',','.') }}"/>
                        </div>
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
                                    <th>Username</th>
                                    <th>Tanggal</th>
                                    <th>Email</th>
                                    <th>Nama Lengkap</th>
                                    <th>No Tlp</th>
                                    <th>Saldo</th>
                                    <th>Poin</th>
                                    <th>Kode OTP</th>
                                    <th>Jenis Mitra</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ "Rp " . number_format($item->saldo,0,',','.') }}</td>
                                        <td>{{ $item->poin }}</td>
                                        <td>{{ $item->otp }}</td>
                                        <td>{{ $item->status_member }}</td>
                                        <td>
                                            <div class="row">
                                                <button class="btn btn-primary shadow btn-xs sharp mr-1" onclick="form_data('ubah',{{ json_encode($item) }})" data-toggle="modal" data-target=".form-data"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-success shadow btn-xs sharp mr-1" data-toggle="modal" data-target=".tambah-saldo" data-id="{{$item->id}}"><i class="fa fa-money"></i></button>
                                                <button class="btn btn-danger shadow btn-xs sharp" onclick="hapus({{$item->id}})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-secondary shadow btn-xs sharp mr-1" data-toggle="modal" data-target=".ganti-password" style="width: auto; font-size: 7px" data-id="{{$item->id}}">Ganti Password</button>
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
    @include('cms.member.ganti-password')
    @include('cms.member.tambah-saldo')
@endsection

@section('javascript')


    <script src="{{ asset('cms/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('cms/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('cms/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        function changePassword(id){

        }

        function form_data(tipe, data=false){
            if(tipe == 'add'){
                $('#email').val('');
                $('#username').val('');
				$('#address').val('');
				$('#phone').val('');
				$('#saldo').val('');
				$('#poin').val('');
				$('#password').val('');
				$('#verifikasi').val('');
				$('#gender').val('');
				$('#nama_lengkap').val('');
				$('#status_member').val('');
				$('#kode_referral').val('');
				$('#id_atas').val('');
                $('#input-password').show();
				$('#form-data-title').html('Tambah Data Member');
                document.getElementById('form-data-form').action = "/manage-member/member";
            } else {
                msg = data
                $('#input-password').hide();
                $('#email').val(msg.email);
                $('#username').val(msg.username);
                $('#address').val(msg.address);
                $('#phone').val(msg.phone);
                $('#saldo').val(msg.saldo);
                $('#poin').val(msg.poin);
                $('#verifikasi').val(msg.verifikasi);
                $('#gender').val(msg.gender);
                $('#status_member').val(msg.status_member);
                $('#nama_lengkap').val(msg.nama_lengkap);
                $('#kode_referral').val(msg.kode_referral);
                $('#id_atas').val(msg.username_atas);
                $('#token_notif').val(msg.token_notif);
                $('#total_masukan_pin').val(msg.total_masukan_pin);
                $('#pin').val(msg.pin);
                $('#id').val(msg.id);
                $('#form-data-title').html('Edit Data Member');
                document.getElementById('form-data-form').action = "/manage-member/member/update";
            }
        }

        function hapus(id){
            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Akan Menghapus Data Member !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data !'
              }).then((result) => {
                  console.log(result);
                    if (result.value == true) {
                        var url = '/manage-member/member/:id/delete';
                        url = url.replace(':id',id);
                        window.location.href = url;
                    }
              })
        }
    </script>
@endsection
