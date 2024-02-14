@extends('layouts.app', ['menu' => 'Akun Bank'])

@section('breadcrump')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Akun Bank</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master-data.akun-bank.index')}}">Akun Bank</a></li>
                        <li class="breadcrumb-item active">{{isset($akun_bank) ? 'Edit Akun Bank' : 'Tambah Akun Bank' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection

@section('style')
@endsection

@section('content')
    <form action="{{route('master-data.akun-bank.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Bank</label>
                            <input type="text" value="{{ isset($akun_bank) ? $akun_bank->nama_bank : '' }}" class="form-control" placeholder="Nama Bank" name="nama_bank" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Rekening</label>
                            <input type="text" value="{{ isset($akun_bank) ? $akun_bank->no_rekening : '' }}" class="form-control" placeholder="No Rekening" name="no_rekening" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Atas Nama</label>
                            <input type="text" value="{{ isset($akun_bank) ? $akun_bank->atas_nama : '' }}" class="form-control" placeholder="Atas Nama" name="atas_nama" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Rekening</label>
                            <select name="qris" required class="form-control">
                                <option value="">- Select Qris -</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="image" class="form-control" required/>
                        </div>

                        <div class="d-flex flex-wrap gap-3">
                            <button type="submit" class="btn btn-success waves-effect waves-light w-md">{{isset($akun_bank) ? 'Edit' : 'Save' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
