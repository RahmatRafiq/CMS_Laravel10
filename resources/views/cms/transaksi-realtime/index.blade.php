@extends('cms.layouts.app')

@section('style')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BANGBELI</title>


    <style>
        .mt-2 {
            margin-top: 4px;
        }

        .d-flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .align-self-end {
            align-self: flex-end;
        }

        .bg-light {
            background-color: #fafafa;
            border: none;
            color: #000;
        }

        .bg-light:hover {
            background-color: #f4f4f4;
        }

        #now {
            font-size: 32px;
            align-self: flex-end;
            text-align: center;
            text-transform: uppercase;
        }

        button>* {
            pointer-events: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Transaksi</h4>
                    </div>
                    <div class="card-body container-fluid">
                        <div class="row">
                            <form action="{{ url('transaksi-realtime') }}" method="GET" id="filter_transaksi"
                                style="display: grid; gap: 8px; width: 100%;">
                                @if (Session::has('message'))
                                    <div class="alert alert-{{ Session::get('alert') }} alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {{--  <h5> Alert!</h5>  --}}
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <div class="row d-flex justify-center">
                                    <div class="col-md-3">
                                        <label for="">Tanggal Mulai</label>
                                        <input type="date" value="{{ isset($_GET['tanggal']) ? $_GET['tanggal'] : '' }}"
                                            class="form-control" name="tanggal" placeholder="dd-mm-yyyy"
                                            {{ isset($_GET['tanggal_end']) ? 'max=' . $_GET['tanggal_end'] : '' }}
                                            required />
                                    </div>
                                    <button class="col-md-1 btn bg-light mt-2 align-self-end" type="button"
                                        id="enable_range">
                                        <div class="duration-300 d-flex justify-center align-items-center">&#8213;</div>
                                    </button>
                                    <div class="col-md-3">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date"
                                            value="{{ isset($_GET['tanggal_end']) ? $_GET['tanggal_end'] : '' }}"
                                            class="form-control" name="tanggal_end" placeholder="dd-mm-yyyy"
                                            {{ isset($_GET['tanggal']) ? 'min=' . $_GET['tanggal'] : '' }} />
                                    </div>
                                    <span id="now" class="col-md-3">now</span>
                                </div>
                                <div class="row d-flex justify-center" style="gap: 8px">
                                    <button type="submit" class="btn btn-success col-md-6"
                                        style="margin: auto 0;">Search</button>
                                    <button type="reset" class="btn btn-danger col-md-2" style="margin: auto 0;"
                                        onclick='window.location.replace("{{ url()->current() }}")'>Reset</button>
                                </div>
                            </form>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Total Transaksi {!! request()->query('tanggal') ? '<br/><br/>' : '' !!}</label>
                                    <input type="text" class="form-control"
                                        value="{{ 'Rp ' . number_format($result->transaksi_total, 2, ',', '.') }}"
                                        readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Transaksi Server {!! request()->query('tanggal')
                                        ? '<br/>(' .
                                            request()->query('tanggal') .
                                            ' - ' .
                                            (request()->query('tanggal_end') ? request()->query('tanggal_end') : 'now') .
                                            ')'
                                        : '' !!}</label>
                                    <input type="text" class="form-control"
                                        value="{{ 'Rp ' . number_format($result->transaksi_total_server, 2, ',', '.') }}"
                                        readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Laba {!! request()->query('tanggal')
                                        ? '<br/>(' .
                                            request()->query('tanggal') .
                                            ' - ' .
                                            (request()->query('tanggal_end') ? request()->query('tanggal_end') : 'now') .
                                            ')'
                                        : '' !!}</label>
                                    <input type="text" class="form-control"
                                        value="{{ 'Rp ' . number_format($result->laba, 2, ',', '.') }}" readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Laba Seluruh {!! request()->query('tanggal') ? '<br/><br/>' : '' !!}</label>
                                    <input type="text" class="form-control"
                                        value="{{ 'Rp ' . number_format($result->laba_seluruh, 2, ',', '.') }}" readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Potongan Admin</label> <input type="text" class="form-control"
                                        value="{{ number_format($result->potongan_admin, 2, ',', '.') }}" readonly />
                                    {{-- <input type="text" class="form-control"
                                        value="{{ 'Rp ' . number_format($result->potongan_admin, 2, ',', '.') }}" /> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example50" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Produk</th>
                                        <th>No Tujuan</th>
                                        <th>Member</th>
                                        <th>Nama Lengkap</th>
                                        <th>Laba</th>
                                        <th>Opsi</th>
                                        <th>SaldoAkhir</th>
                                    </tr>
                                </thead>
                                <tbody>
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
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

    {{-- <script src="{{ asset('cms/lightbox/js/lightbox-plus-jquery.min.js') }}"></script> --}}
    <script>
        let enableRange = {{ request()->query('tanggal_end') !== null ? 1 : 0 }} ? false : true
        const filterTransaksi = document.querySelector('[name="tanggal_end"]')
        if (!enableRange) {
            document.getElementById('now').style.display = 'none'
            filterTransaksi.parentNode.style.display = 'block'
        } else {
            filterTransaksi.setAttribute('disabled', '')
            document.getElementById('now').style.display = 'block'
            filterTransaksi.parentNode.style.display = 'none'
        }
        document.getElementById('enable_range').addEventListener('click', (e) => {
            if (enableRange) {
                filterTransaksi.removeAttribute('disabled')
                document.getElementById('now').style.display = 'none'
                filterTransaksi.parentNode.style.display = 'block'
            } else {
                document.getElementById('now').style.display = 'block'
                filterTransaksi.parentNode.style.display = 'none'
                filterTransaksi.setAttribute('disabled', '')
            }

            enableRange = !enableRange
        })

        const tanggalElement = document.querySelector('[name="tanggal"]')
        const tanggalEndElement = document.querySelector('[name="tanggal_end"]')

        tanggalElement.addEventListener('change', (e) => {
            const min = e.target.value
            console.log(min)
            if (min) {
                tanggalEndElement.setAttribute('min', min)
            } else {
                tanggalEndElement.removeAttribute('min')
            }
        })

        tanggalEndElement.addEventListener('change', (e) => {
            const max = e.target.value
            console.log(max)
            if (max) {
                tanggalElement.setAttribute('max', max)
            } else {
                tanggalElement.removeAttribute('max')
            }
        })
    </script>

    @include('cms.transaksi-realtime.pusher')
@endsection
