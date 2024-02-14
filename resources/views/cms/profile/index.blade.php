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
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title">Profile</h4>
                </div>
            </div>
        </div>
        <section class="card">
			<div class="card-block">
				<form action="{{ url('/profile/update/'.$data->id) }}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
					<div class="form-group row">
						<div class="col-lg-12">
                            <div class="card-header d-block">
                                <span style="font-weight: bold;">Tentang Poin</span>
                                <textarea class="form-control" name="tentang_poin" placeholder="Tentang Poin" rows="10" required>{{ $data->tentang_poin }}</textarea>
                            </div>
                        </div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
                            <div class="card-header d-block">
                                <span style="font-weight: bold;">Notifikasi</span>
                                <textarea class="form-control" name="notifikasi" placeholder="Notifikasi" rows="10" required>{{ $data->notifikasi }}</textarea>
                            </div>
                        </div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
                            <div class="card-header d-block">
                                <span style="font-weight: bold;">Persyaratan Akun Premium</span>
                                <textarea class="form-control" name="syarat_premium" placeholder="Syarat Premium" rows="10" required>{{ $data->syarat_premium }}</textarea>
                            </div>
                        </div>
					</div>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Save</button>
				</form>
			</div>
		</section>
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
                    $('#tentang_poin').val('');
                    $('#notifikasi').val('');
                    $('#syarat_premium').val('');
  
                    $('#form-data-title').html('Tambahkan Profile');
                    document.getElementById('form-data-form').action = "/manage-data/profile/";
                } else {

                    profile = data
                    $('#tentang_poin').val(profile.tentang_poin);
                    $('#notifikasi').val(profile.notifikasi);
                    $('#syarat_premium').val(profile.syarat_premium);

                    $('#form-data-title').html('Edit Data Profile');
                    document.getElementById('form-data-form').action = "/manage-data/profile/update/" + profile.id;

                }
            }
        </script>
    @endsection
