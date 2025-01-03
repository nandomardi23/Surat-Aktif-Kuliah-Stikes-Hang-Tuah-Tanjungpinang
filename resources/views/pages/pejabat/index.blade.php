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
                    <a href="{{route('pejabat.create')}}" class="btn btn-success">Tambah Data</a>
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
                        <tbody>
                            @forelse ($pejabats as $pajabat )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pajabat->nik}}</td>
                                <td>{{$pajabat->nama_pejabat}}</td>
                                <td>{{$pajabat->jabatan}}</td>
                                <td>
                                    <a href="{{route('pejabat.edit', $pajabat)}}" class=" btn btn-warning">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center"> <span> Data Masih Kosong</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
