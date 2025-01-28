<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <style>
        /* Navbar Info Styling */
        .navbar-info {
            background-color: #343a40;
            /* Dark background */
            color: #fff;
            font-size: 0.9rem;
            transition: transform 0.3s ease-in-out;
            /* Smooth hide effect */
        }

        .navbar-info.hidden {
            transform: translateY(-100%);
            /* Hide navbar when scrolling */
        }

        /* Media query to hide navbar-info on small devices */
        @media (max-width: 768px) {
            .navbar-info {
                display: none;
            }
        }

        /* Navbar Menu Styling */
        .navbar-menu {
            background-color: #0056b3;
            /* Blue background */
        }
    </style>
</head>

<body>

    <header>

        <!-- Navbar Info -->
        <nav id="navbarInfo" class="navbar navbar-expand-lg bg-black opacity-25 py-1">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <span><strong>YAYASAN NALA</strong></span>
                    <span class="mx-3">|</span>
                    <span>Jl. W.R. Supratman, Tanjungpinang Timur, Tanjung Pinang</span>
                    <span class="mx-3">|</span>
                    <span>(0771) 44400</span>
                </div>
            </div>
        </nav>

        <!-- Navbar Menu -->
        <nav class="navbar navbar-expand-lg navbar-menu navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">BAAK Stikes Hang Tuah</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">Tracking Surat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#unit">Tata cara Pengajuan Surat</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')


    <footer>

    </footer>

    <script>
        // JavaScript untuk menghilangkan navbar-info saat scrolling
  let lastScrollTop = 0;
  const navbarInfo = document.getElementById("navbarInfo");

  window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      // Scroll ke bawah, sembunyikan navbar-info
      navbarInfo.classList.add("hidden");
    } else {
      // Scroll ke atas, tampilkan navbar-info
      navbarInfo.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
  });
    </script>

</body>

</html>
