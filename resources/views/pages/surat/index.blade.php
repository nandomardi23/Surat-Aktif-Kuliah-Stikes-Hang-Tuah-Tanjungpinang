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
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Pejabat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Edit Surat -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Surat Aktif Kuliah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <!-- Input Nomor Surat -->
                    <div class="mb-3">
                        <label for="edit_nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="edit_nomor_surat" name="nomor_surat">
                        <!-- Tempat error -->
                        <div class="invalid-feedback" id="error_nomor_surat"></div>
                    </div>

                    <!-- Input Status -->
                    <div class="mb-3">
                        <label for="edit_status_id" class="form-label">Status</label>
                        <select class="form-select" id="edit_status_id" name="status_id">
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                            @endforeach
                        </select>
                        <!-- Tempat error -->
                        <div class="invalid-feedback" id="error_status_id"></div>
                    </div>

                    <!-- Input Pejabat -->
                    <div class="mb-3">
                        <label for="edit_pejabat_id" class="form-label">Pejabat</label>
                        <select class="form-select" id="edit_pejabat_id" name="pejabat_id">
                            @foreach($pejabats as $pejabat)
                            <option value="{{ $pejabat->id }}">{{ $pejabat->nama_pejabat }}</option>
                            @endforeach
                        </select>
                        <!-- Tempat error -->
                        <div class="invalid-feedback" id="error_pejabat_id"></div>
                    </div>

                    <!-- Tampilkan error umum -->
                    <div class="alert alert-danger d-none" id="error_general"></div>

                    <button type="button" class="btn btn-primary" id="saveEdit">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#table_surat_aktif').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{ route('surat.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'nomor_surat', name: 'nomor_surat', searchable: true },
                { data: 'student.nama_mahasiswa', name: 'nama_mahasiswa', searchable: true },
                { data: 'student.nim', name: 'nim' },
                { data: 'pejabat.nama_pejabat', name: 'pejabat' },
                { data: 'status.nama_status', name: 'status.nama_status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Event untuk menampilkan modal edit
        $('body').on('click', '.edit-btn', function() {
            let id = $(this).data('id');

        $.get(`/surat/${id}/edit`, function(data) {
            $('#edit_id').val(data.id);
            $('#edit_nomor_surat').val(data.nomor_surat);
            $('#edit_status_id').val(data.status_id);
            $('#edit_pejabat_id').val(data.pejabat_id);
            $('#editModal').modal('show');
            });
        });

        $('#saveEdit').click(function(e) {
            e.preventDefault();
            const suratId = $('#edit_id').val();
            $.ajax({
                url: `/surat/${suratId}`,
                method: 'PUT',
                data: {
                nomor_surat: $('#edit_nomor_surat').val(),
                status_id: $('#edit_status_id').val(),
                pejabat_id: $('#edit_pejabat_id').val()
            },
            success: function(response) {
            // Reset error
                $('#editForm .invalid-feedback').text('').hide();
                $('#editForm input, #editForm select').removeClass('is-invalid');

            // Feedback sukses
                $('#editModal').modal('hide');
                $('#table_surat_aktif').DataTable().ajax.reload();
            Swal.fire('Sukses!', response.success, 'success');
            },
            error: function(xhr) {
            // Reset error
                $('#editForm .invalid-feedback').text('').hide();
                $('#editForm input, #editForm select').removeClass('is-invalid');

            if (xhr.status === 422) {
            // Tampilkan error validasi per field
                const errors = xhr.responseJSON.errors;
                for (const field in errors) {
                    $(`#error_${field}`).text(errors[field][0]).show();
                    $(`#edit_${field}`).addClass('is-invalid');
                }
            } else {
            // Handle error umum dengan SweetAlert
            let errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';

            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            } else if (xhr.status === 0) {
                errorMessage = 'Tidak bisa terhubung ke server.';
            }

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
            });
            }
        }
    });
});


});

</script>
@endpush

@endsection