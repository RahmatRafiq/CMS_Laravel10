@extends('layouts.app', ['menu' => 'Akun Bank'])

@section('breadcrump')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Akun Bank</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ env('APP_NAME') }}</a></li>
                        <li class="breadcrumb-item active">Akun Bank</li>
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
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah anda yakin ?')) {
                window.location.href = `akun-bank/${id} `;
            }
        }
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('master-data.akun-bank.create') }}" type="button"
                            class="btn btn-success waves-effect waves-light">
                            <i class="uil-plus"></i> Tambah Akun Bank
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Bank</th>
                                <th>QRIS</th>
                                <th>Gambar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nama_bank }}</td>
                                    <td>
                                        @if ($item->qris == 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{!! env('MAIN_HOST_URL') . $item->image !!}" class="img-thumbnail"
                                            style="width: 120px !important; height: 48px !important; object-fit: contain;">
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="{{ route('master-data.akun-bank.show', ['akun_bank' => $item->id]) }}"
                                                type="button" class="btn btn-info waves-effect waves-light btn-sm">
                                                <i class="uil-search"></i> Detail
                                            </a>
                                            <a href="{{ route('master-data.akun-bank.edit', ['akun_bank' => $item->id]) }}"
                                                type="button" class="btn btn-success waves-effect waves-light btn-sm">
                                                <i class="uil-edit"></i> Ubah
                                            </a>
                                            <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                class="btn btn-danger waves-effect waves-light btn-sm">
                                                <i class="uil-trash-alt"></i> Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
