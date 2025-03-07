@extends('layouts.app')

@section('content')
<section class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Profil {{ Auth::user()->name }}</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.update', auth()->user()) }}">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', Auth::user()->name) }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', Auth::user()->email) }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Lama -->
                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <div class="input-group">
                        <input type="password" name="current_password" id="current_password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            placeholder="Masukkan password lama">
                        <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                        @error('current_password')
                        <div class="invalid-feedback">
                            @if($message == 'Password lama wajib diisi jika ingin mengganti password')
                            {{ $message }}
                            @elseif($message == 'Password lama tidak sesuai')
                            {{ $message }}
                            @else
                            Terjadi kesalahan validasi password
                            @endif
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Password Baru -->
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan password baru (min 8 karakter)">
                        <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                        @error('password')
                        <div class="invalid-feedback">
                            @if($message == 'Password baru wajib diisi')
                            {{ $message }}
                            @elseif($message == 'Konfirmasi password tidak cocok')
                            {{ $message }}
                            @elseif($message == 'Password minimal harus 8 karakter')
                            {{ $message }}
                            @else
                            Terjadi kesalahan validasi password
                            @endif
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Konfirmasi Password Baru -->
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Konfirmasi password baru">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Fungsi toggle password dengan animasi eye icon
    function togglePassword(inputId, buttonId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.querySelector(`${buttonId} i`);
        
        if(passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
        }
    }

    // Event listeners
    document.getElementById('toggleCurrentPassword').addEventListener('click', () => {
        togglePassword('current_password', '#toggleCurrentPassword');
    });

    document.getElementById('toggleNewPassword').addEventListener('click', () => {
        togglePassword('password', '#toggleNewPassword');
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', () => {
        togglePassword('password_confirmation', '#toggleConfirmPassword');
    });
</script>
@endpush
@endsection