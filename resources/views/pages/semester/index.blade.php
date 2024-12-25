@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Semester</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Semester</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-sm-12 col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3><span>Table Data Semester</span></h3>
                </div>
                <div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class=" text-center">
                                        <th>#</th>
                                        <th>Semester</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $semester)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class=" text-center">{{$semester->semesterRomawi}}</td>
                                        <td class="text-center">

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusModal" data-id="{{$semester}}">
                                                Hapus
                                            </button>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            {{ $semesters->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-sm-12 col-lg-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    Data Semester
                    {{-- <div class=""> --}}
                        @session('success')
                        <div class=" mt-3 alert alert-success alert-dismissible fade show" role="alert">
                            {{ $value }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endsession
                        {{--
                    </div> --}}
                </div>

                <form action="{{route('semester.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mt-3">
                            <label for="" class=" form-label">Masukan Semester:</label>
                            <input type="text" name="semesterRomawi"
                                class=" form-control @error('semesterRomawi') is-invalid @enderror"
                                placeholder="Masukan Huruf Romawi">
                            @error('semesterRomawi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class=" card-footer">
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
                <form action="{{route('semester.destroy',$semester)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Ya,Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection