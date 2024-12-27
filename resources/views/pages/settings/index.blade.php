@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </nav>
    </div>
    <section>
        <div class="card">
            <div class="card-header">
                <h4><span>Form Settings</span></h4>
            </div>
            {{-- <div class="card-body"> --}}

            @if (isset($settings))
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <label for="" class="form-label">Nama Yayasan:</label>
                                <input type="text" class="form-control" name="nama_yayasan"
                                    value="{{ old('nama_yayasan', $settings->nama_yayasan) }}">
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="" class="form-label">Logo Yayasan</label>
                                <input type="file" class=" form-control" name="logo_yayasan"
                                    value="{{ old('logo_yayasan', $settings->logo_yayasan) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-3">
                                <label for="" class="form-label">Nama Kampus:</label>
                                <input type="text" class="form-control" name="nama_kampus"
                                    value="{{ old('nama_kampus', $settings->nama_kampus) }}">
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="" class="form-label">Logo Kampus</label>
                                <input type="file" class=" form-control" name="logo_kampus"
                                    value="{{ old('logo_kampus', $settings->logo_kampus) }}">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">No.Telp</label>
                        <input type="text" name="" class=" form-control"
                            value="{{ old('no_telp', $settings->no_telp) }}">
                    </div>
                    <div class="mt-3">
                        <label for="" class=" form-label">Alamat Lengkap Kampus:</label>
                        <textarea name="" cols="10" rows="5" class="form-control">{{ $settings->alamat_kampus }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Upload</button>
                </div>
            @else
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">Nama Yayasan:</label>
                                    <input type="text" class="form-control" name="nama_yayasan">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Logo Yayasan</label>
                                    <input type="file" class="form-control" name="logo_yayasan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">Nama Kampus:</label>
                                    <input type="text" class="form-control" name="nama_kampus">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Logo Kampus</label>
                                    <input type="file" class=" form-control" name="logo_kampus">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">No.Telp</label>
                            <input type="text" name="no_telp" class=" form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class=" form-label">Alamat Lengkap Kampus:</label>
                            <textarea name="alamat_kampus" cols="10" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            @endif
    </section>
@endsection
