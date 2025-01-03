@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1> Form Input Pejabat Stikes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Pejabat Stikes Hangtuah</li>
            <li class="breadcrumb-item active">Form Input Pejabat Stikes</li>
        </ol>
    </nav>
</div>
<section>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>Form Input Pejabat </h4>
                </div>
                <div>
                    <a href="{{route('pejabat.index')}}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
        <form action="{{route('pejabat.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nik" class="form-label">Masukan NIK Pegawaian:</label>
                    <input type="text" name="nik" class=" form-control @error('nik') is-invalid @enderror">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_pejabat" class="form-label">Masukan Nama Pejabat Berseta Gelar:</label>
                    <input type="text" name="nama_pejabat"
                        class=" form-control @error('nama_pejabat') is-invalid @enderror">
                    @error('nama_pejabat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan" class="form-label">Masukan Jabatan:</label>
                    <input type="text" name="jabatan" class=" form-control @error('jabatan') is-invalid @enderror">
                    @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</section>
@endsection
