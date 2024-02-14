@extends('layouts.app', ['menu' => 'Akun Bank'])

@section('breadcrump')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">{{ 'Detail Akun Bank' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{env('APP_NAME')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('master-data.akun-bank.index') }}">Akun Bank</a></li>
                        <li class="breadcrumb-item active">{{ 'Detail Akun Bank' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection

@section('style')

@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Bank</label>
                        <input type="text" value="{{ $akun_bank->nama_bank }}" class="form-control" name="fname"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Rekening</label>
                        <input type="text" value="{{ $akun_bank->no_rekening }}" class="form-control" name="fname"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Atas Nama</label>
                        <input type="text" value="{{ $akun_bank->atas_nama }}" class="form-control" name="fname"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Created At</label>
                        <input type="text" value="{{ $akun_bank->created_at }}" class="form-control" name="fname"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="text" value="{{ $akun_bank->created_at }}" class="form-control" name="fname"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection