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
                    <h4 class="card-title">Ganti Password</h4>
                </div>
            </div>
        </div>
        <section class="card">
			<div class="card-block">
				<form action="{{ url('/ganti-password/update/') }}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
					<div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="posisi"><strong>Email</strong>
                            <span class="text-danger"></span>
                        </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="posisi"><strong>Password</strong>
                            <span class="text-danger"></span>
                        </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="password" placeholder="Password" name="password" required>
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
                    $('#email').val('');
                    $('#password').val('');
  
                    $('#form-data-title').html('Tambahkan Password');
                    document.getElementById('form-data-form').action = "/ganti-password/";
                } else {

                    users = data
                    $('#email').val(users.email);
                    $('#password').val(users.password);


                    $('#form-data-title').html('Edit Data Password');
                    document.getElementById('form-data-form').action = "/ganti-password/update/" + users.id;

                }
            }
        </script>
    @endsection
