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

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Surat Aktif Kuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Nomor Surat</dt>
                            <dd class="col-sm-8" id="detail_nomor_surat"></dd>

                            <dt class="col-sm-4">Nama Mahasiswa</dt>
                            <dd class="col-sm-8" id="detail_nama_mahasiswa"></dd>

                            <dt class="col-sm-4">NIM</dt>
                            <dd class="col-sm-8" id="detail_nim"></dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Program Studi</dt>
                            <dd class="col-sm-8" id="detail_prodi"></dd>

                            <dt class="col-sm-4">Semester</dt>
                            <dd class="col-sm-8" id="detail_semester"></dd>

                            <dt class="col-sm-4">Pejabat</dt>
                            <dd class="col-sm-8" id="detail_pejabat"></dd>

                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8" id="detail_status"></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // crsf token
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
    // Inisialisasi DataTable
        var table = $('#table_surat_aktif').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('surat.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nomor_surat', name: 'nomor_surat' },
                { data: 'student.nama_mahasiswa', name: 'student.nama_mahasiswa' },
                { data: 'student.nim', name: 'student.nim' },
                { data: 'pejabat.nama_pejabat', name: 'pejabat.nama_pejabat' },
                { data: 'status.nama_status', name: 'status.nama_status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Handle Edit
        $(document).on('click', '.edit-btn', function() {
            const id = $(this).data('id');

            $.get(`/surat/${id}/edit`, function(data) {
                $('#edit_id').val(data.id);
                $('#edit_nomor_surat').val(data.nomor_surat);
                $('#edit_status_id').val(data.status_id).trigger('change');
                $('#edit_pejabat_id').val(data.pejabat_id).trigger('change');
                $('#editModal').modal('show');
            });
        });

        // Handle Update
        $('#saveEdit').click(function(e) {
            e.preventDefault();
            const id = $('#edit_id').val();

            $.ajax({
                url: `/surat/${id}`,
                method: 'PUT',
                headers: {
                'X-CSRF-TOKEN': csrfToken // Tambahkan CSRF token di header
                },
                data: {
                    nomor_surat: $('#edit_nomor_surat').val(),
                    status_id: $('#edit_status_id').val(),
                    pejabat_id: $('#edit_pejabat_id').val()
                },
                success: function(response) {
                    $('#editModal').modal('hide');
                    table.ajax.reload(null, false); // Reload tanpa reset pagination
                    Swal.fire('Sukses!', response.success, 'success');
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        handleValidationErrors(xhr.responseJSON.errors);
                    } else {
                        showGeneralError(xhr);
                    }
                }
            });
        });

        // Handle Detail
        $(document).on('click', '.detail-btn', function() {
            const id = $(this).data('id');

            $.ajax({
                url: `/surat/${id}`,
                method: 'GET',
                headers: {
                'X-CSRF-TOKEN': csrfToken // Tambahkan CSRF token di header
                },
                success: function(response) {
                    populateDetailModal(response);
                    $('#detailModal').modal('show');
                },
                error: function() {
                    Swal.fire('Error!', 'Gagal memuat detail', 'error');
                }
            });
        });

        // Handle Delete
        $(document).on('click', '.delete-btn', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Hapus Data?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/surat/${id}`,
                        method: 'DELETE',
                        headers: {
                        'X-CSRF-TOKEN': csrfToken // Tambahkan CSRF token di header
                        },
                        success: function(response) {
                            table.ajax.reload(null, false);
                            Swal.fire('Terhapus!', response.success, 'success');
                        }
                    });
                }
            });
        });

        // Fungsi Bantuan
        function handleValidationErrors(errors) {
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            for (const field in errors) {
                $(`#edit_${field}`).addClass('is-invalid');
                $(`#error_${field}`).text(errors[field][0]);
            }
        }

        function showGeneralError(xhr) {
            let message = 'Terjadi kesalahan pada server';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }
            $('#error_general').removeClass('d-none').text(message);
        }

        function populateDetailModal(data) {
            $('#detail_nomor_surat').text(data.nomor_surat);
            $('#detail_nama_mahasiswa').text(data.nama_mahasiswa);
            $('#detail_nim').text(data.nim);
            $('#detail_prodi').text(data.prodi);
            $('#detail_semester').text(data.semester);
            $('#detail_pejabat').text(data.pejabat);
            $('#detail_status').text(data.status);
        }
</script>
@endpush
@endsection