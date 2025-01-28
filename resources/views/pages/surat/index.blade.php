@extends('layouts.app')
@section('content')
<section>
    <div class="card">
        <div class="card-header">
            <h5>List Surat Aktif Kuliah</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-2">
                <table id="table_surat_aktif" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nomor Surat</td>
                            <td>Nama Mahasiswa</td>
                            <td>NIM</td>
                            <td>Pejabat</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Edit Surat Aktif Kuliah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('#table_surat_aktif').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        ajax: "{{ route('surat.index') }}",
        columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'nomor_surat', name: 'nomor_surat', searchable: true},
        { data: 'student.nama_mahasiswa', name:'nama_mahasiswa', searchable: true},
        { data: 'student.nim', name: 'nim' },
        { data: 'pejabat.nama_pejabat', name: 'pejabat' },
        { data: 'status.nama_status', name: 'status.nama_status' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
        });



    });
</script>
@endpush
@endsection
