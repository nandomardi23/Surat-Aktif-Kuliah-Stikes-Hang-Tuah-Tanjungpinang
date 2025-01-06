@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Pejabat Stikes Hangtuah</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Pejabat Stikes Hangtuah</li>
        </ol>
    </nav>
</div>

<section>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Table Pejabat Stikes</h3>
                </div>
                <div>
                    <a href="{{ route('pejabat.create') }}" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
            <div>
                @session('success')
                <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                    {{ $value }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endsession
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="mt-3 table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>NIK</td>
                            <td>Nama Pejabat</td>
                            <td>Jabatan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pejabats as $pejabat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pejabat->nik }}</td>
                            <td>{{ $pejabat->nama_pejabat }}</td>
                            <td>{{ $pejabat->jabatan }}</td>
                            <td>
                                <a href="{{ route('pejabat.edit', $pejabat) }}" class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus{{ $pejabat->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Konfirmasi Hapus -->
                        <div class="modal fade" id="modalHapus{{ $pejabat->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel{{ $pejabat->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel{{ $pejabat->id }}">Hapus Data
                                            Pejabat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data pejabat <strong>{{ $pejabat->nama_pejabat
                                            }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <!-- Form Hapus -->
                                        <form action="{{ route('pejabat.destroy', $pejabat) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Data Masih Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection