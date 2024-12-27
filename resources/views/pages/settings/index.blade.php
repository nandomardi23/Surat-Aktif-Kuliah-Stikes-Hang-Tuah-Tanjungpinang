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
            <div class="card-body">
                <div class="mt-3">
                    <label for="" class=" form-label">Alamat Lengkap Kampus:</label>
                    <textarea name="" cols="10" rows="5" class="form-control"></textarea>
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">No.Telp</label>
                    <input type="file" name="" class=" form-control">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Nama Yayasan:</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Nama Kampus:</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Logo Yayasan</label>
                    <input type="file" class=" form-control">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Logo Stikes</label>
                    <input type="file" class=" form-control">
                </div>
            </div>
            <div class="card-footer">
                @if (isset($setting))
                    <button class="btn btn-primary">Upload</button>
                @else
                    <button class="btn btn-primary">Kirim</button>
                @endif
            </div>
        </div>
    </section>
@endsection
