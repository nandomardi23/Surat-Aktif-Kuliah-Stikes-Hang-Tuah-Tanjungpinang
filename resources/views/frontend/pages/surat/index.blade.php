@extends('frontend.layouts.app')
@section('content')
<section>
    <div class="mt-3 container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>Table Mahasiswa Pengajuan Surat Aktif Kuliah</h5>
                    <div>
                        <a href="{{route('pengajuan_surat.create')}}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mahasiswa</th>
                                <th>Status</th>
                                <th>Tanggal dibuat</th>
                                <th>Tanggal siap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
