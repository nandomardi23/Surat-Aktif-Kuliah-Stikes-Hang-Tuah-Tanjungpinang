<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login Admin SHT</title>

    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/backend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">

                            <!-- Logo -->
                            <div class="text-center mb-4">
                                <img src="{{ asset('backend/assets/img/logo.png') }}" alt="Logo" class="mb-3"
                                    style="height: 80px;">
                                <h3 class="text-dark">Sistem Administrasi SHT</h3>
                            </div>

                            <div class="card shadow">
                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <h5 class="card-title">Login Admin</h5>
                                        <p class="text-muted">Masukkan email dan password</p>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Input -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-envelope"></i>
                                                </span>
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="nama@contoh.com" required autofocus>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password Input -->
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-lock"></i>
                                                </span>
                                                <input type="password" name="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="••••••••" required>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="togglePassword()">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Login Button -->
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                                Masuk
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="text-center mt-4">
                                <p class="text-muted small">
                                    © {{ date('Y') }} STIKES Hang Tuah Tanjungpinang
                                    <br>
                                    <small>Powered by NiceAdmin</small>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.querySelector('#password + button i');
            
            if(passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>

</body>

</html>