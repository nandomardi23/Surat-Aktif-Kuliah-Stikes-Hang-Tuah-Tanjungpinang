@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Program Studi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Program Studi</li>
            </ol>
        </nav>
    </div>
    <section>
        <div class="row">
            <div class="col-sm-12 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><span>Table Program Studi</span></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class=" table table-bordered">
                                <thead>
                                    <tr>
                                        <td class=" text-center">#</td>
                                        <td>Nama Program Studi</td>
                                        <td class=" text-center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prodis as $prodi)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $prodi->namaProdi }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapusModal" data-id="{{ $prodi->id }}">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3" class=""><span>Data belum ada</span></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class=" justify-content-between">
                            {{ $prodis->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <span>Form Program Studi</span>
                        @session('success')
                            <div class=" mt-3 alert alert-success alert-dismissible fade show" role="alert">
                                {{ $value }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endsession
                    </div>
                    <form action="{{ route('programstudi.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="mt-3">
                                <label for="" class=" form-label">Input Program Studi</label>
                                <input type="text" class=" form-control @error('namaProdi') is-invalid @enderror"
                                    name="namaProdi">
                                @error('namaProdi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Ini??
                </div>
                <div class="modal-footer">
                    @if (isset($prodi))
                        <form action="{{ route('programstudi.destroy', $prodi->id) }}" method="POST"> @csrf
                            @method('DELETE') <button type="submit" class="btn btn-primary">Ya, Hapus</button> </form>
                    @else
                        <button disabled class="btn btn-secondary">Ya, Hapus </button>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
