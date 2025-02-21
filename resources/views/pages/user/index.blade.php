@extends('layouts.app')
@section('content')
<section>
    <div class="card">
        <div class=" card-header">
            <h5><strong><span>Form Input Users</span></strong></h5>
            @session('success')
            <div class=" mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endsession
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="row mt-3">
                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="" class=" form-label">nama</label>
                            <input type="text" name="name" class=" form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="" class=" form-label">email</label>
                            <input type="text" name="email"
                                class=" form-control form-control @error('email') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class=" mt-4 btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>


    <div class="card mt-3">
        <div class=" card-header">
            <h5><span>Table User</span></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td class="text-center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#resetPasswordModal"
                                    onclick="setResetPasswordFormAction('{{ route('user.reset-password', $user->id) }}')">
                                    Reset Password
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal" data-id="{{ $user }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"><span>Data User Tidak Temukan/Belum ada</span></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="justify-content-between">
                {{ $users->onEachSide(5)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>


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
                    @if (isset($user))
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE') <button type="submit" class="btn btn-primary">Ya, Hapus</button> </form>
                    @else
                    <button disabled class="btn btn-secondary">Ya, Hapus </button>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reset Password -->
    <div class="modal fade" id="resetPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPasswordModalLabel">Konfirmasi Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mereset password pengguna ini?
                </div>
                <div class="modal-footer">
                    <form id="resetPasswordForm" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-warning">Ya, Reset</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>


</section>
@push('scripts')
<script>
    function setResetPasswordFormAction(action) {
            document.getElementById('resetPasswordForm').action = action;
        }
</script>
@endpush
@endsection