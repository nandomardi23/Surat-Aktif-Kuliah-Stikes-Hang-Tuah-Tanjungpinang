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
            <h3>Form Settings</h3>
            @session('success')
            <div class=" mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endsession
        </div>
        <form action="{{ isset($settings) ? route('setting.update',$settings) : route('setting.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($settings))
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="nama_kampus" class=" form-label">Nama Kampus:</label>
                            <input type="text" class="form-control @error('nama_kampus') is-invalid @enderror"
                                id="nama_kampus" name="nama_kampus"
                                value="{{ isset($settings) ? $settings->nama_kampus : old('nama_kampus') }}">
                            @error('nama_kampus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="nama_yayasan" class=" form-label">Nama Yayasan</label>
                            <input type="text" class="form-control @error('nama_yayasan') is-invalid @enderror"
                                id="nama_yayasan" name="nama_yayasan"
                                value="{{ isset($settings) ? $settings->nama_yayasan : old('nama_yayasan') }}">
                            @error('nama_yayasan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="no_telp" class=" form-label">Nomor Telpon Kampus</label>
                            <input type="text" class="form-control @error('nama_yayasan') is-invalid @enderror"
                                id="no_telp" name="no_telp"
                                value="{{ isset($settings) ? $settings->no_telp : old('no_telp') }}">
                            @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat_kampus" class=" form-label">Alamat Kampus Lengkap</label>
                            <textarea rows="4" class="form-control @error('alamat_kampus') is-invalid @enderror"
                                name="alamat_kampus"
                                id="alamat_kampus">{{ isset($settings) ? $settings->alamat_kampus : old('alamat_kampus') }}</textarea>
                            @error('alamat_kampus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class=" form-group mt-3">
                        <label for="logo_kampus" class=" form-label">Logo Kampus:</label>
                        <input type="file" class="form-control @error('logo_kampus') is-invalid @enderror"
                            name="logo_kampus" id="logo_kampus"
                            value="{{ isset($settings) ? $settings->logo_kampus : old('logo_kampus') }}"
                            onchange="previewImage(event)">
                        @error('logo_kampus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="my-5">
                            <img id="image-preview"
                                src="{{ isset($settings->logo_kampus) ? asset('storage/' . $settings->logo_kampus) : '#' }}"
                                alt="Preview Logo Kampus"
                                style="max-width: 200px; display: {{ isset($settings->logo_kampus) ? 'block' : 'none' }};">
                        </div>
                    </div>
                </div>
            </div>
            <div class=" card-footer">
                <button type="submit" class=" btn btn-primary">
                    {{ isset($settings) ? 'Update Data' : 'Simpan Data'}}
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    function previewImage(event) {
            // console.log('test');
            const reader = new FileReader();
            const imagePreview = document.getElementById('image-preview');

            reader.onload = function() {
                if (reader.readyState === 2) {
                    imagePreview.src = reader.result;
                    imagePreview.style.display = 'block';
                }
            };

            reader.readAsDataURL(event.target.files[0]);
        }
</script>
@endsection
