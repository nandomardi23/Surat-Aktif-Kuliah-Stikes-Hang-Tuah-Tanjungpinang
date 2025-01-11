@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Settings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Isi Surat</li>
        </ol>
    </nav>
</div>
<section>
    <div class="card">
        <div class="card-header">
            <div>
                <h4>Form isi Surat/Badan Surat</h4>
            </div>
            <form action="{{isset($isiSurat) ? route('isi_surat.update') : route('isi_surat.store')}}"></form>
            <div class="card-body">
                <div>
                    <label for="badan_surat" class="form-label">Isi Surat:</label>
                    <textarea class="form-control" rows="4" name="badan_surat"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{isset($isiSurat) ? 'Update Data' : 'Simpan Data'}}
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
