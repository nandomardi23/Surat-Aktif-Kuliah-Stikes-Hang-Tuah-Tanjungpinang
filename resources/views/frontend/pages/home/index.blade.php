@extends('frontend.layouts.app')
@section('content')
<section>
    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-activity icon"></i></div>
                        <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                        <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                        <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section>
    <!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p><span>Find Out More</span> <span class="description-title">About Us</span></p>
        </div>
        <!-- End Section Title -->

        <div class="container">

            <div class="row gy-3">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('frontend/assets/img/about.jpg') }}" alt="" class="img-fluid">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-diagram-3"></i>
                                <div>
                                    <h4>Ullamco laboris nisi ut aliquip consequat</h4>
                                    <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre
                                        trade</p>
                                </div>
                            </li>
                            <li>
                                <i class="bi bi-fullscreen-exit"></i>
                                <div>
                                    <h4>Magnam soluta odio exercitationem reprehenderi</h4>
                                    <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna
                                        pasata redi</p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </section><!-- /About Section -->


    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-emoji-smile"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-headset"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-people"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section>
    <!-- /Stats Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "spaceBetween": 40
                    },
                    "480": {
                      "slidesPerView": 3,
                      "spaceBetween": 60
                    },
                    "640": {
                      "slidesPerView": 4,
                      "spaceBetween": 80
                    },
                    "992": {
                      "slidesPerView": 6,
                      "spaceBetween": 120
                    }
                  }
                }
                </script>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Clients Section -->

    <!-- Services Section -->
    <section id="form_surat" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Form Surat</h2>
            <p><span class="description-title">Pengajuan Surat Aktif Kuliah</span></p>
        </div><!-- End Section Title -->

        <div class="container">
            <form action="{{ route('frontend.store') }}" method="POST">
                @csrf
                <div class="alert alert-warning" role="alert">
                    <h5><Strong>Perhatikan Sebelum Megisi Data Anda!!!</Strong></h5>
                    <p> Gunakan Huruf Besar Pada Setiap Kata Nama, Daerah RT,RW, Jika Tidak Pengajuan Surat Aktif Kuliah
                        <strong> Anda Ditolak/ Tidak Diproses</strong>
                    </p>
                </div>
                <div class="row ">
                    <div class=" col-lg-6 col-md-6 col-sm-12 mt-3">
                        <strong>
                            input Data Mahasiswa/Mahasiswi
                            <hr>
                        </strong>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan Nama Anda:</label>
                            <input type="text" name="nama_mahasiswa"
                                class=" form-control @error('nama_mahasiswa') is-invalid @enderror"
                                placeholder="Misal: Adam Budi Setia ...">
                            @error('nama_mahasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan NIM Anda:</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                placeholder="Misal: 212109001">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan Tempat Lahir Anda:</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                name="tempat_lahir" placeholder="Misal: Tanjungpinang/Batam ...">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan Tanggal Lahir Anda:</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan Tanggal Lahir Anda:</label>
                            <select name="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">--- Pilih Jenis Kelamin ---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Peremepuan">Peremepuan</option>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Pilih Jurusan</label>
                            <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                                <option value="">--- Pilih Jurusan ---</option>
                                @foreach ($prodi as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->namaProdi }}</option>
                                @endforeach
                                @error('prodi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Pilih Semester</label>
                            <select name="semester_id" id=""
                                class="form-select @error('semester_id') is-invalid @enderror">
                                <option value="">--- Pilih Semester ---</option>
                                @foreach ($semester as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->semesterRomawi }}</option>
                                @endforeach
                                @error('semester_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukkan Alamat Anda Disini:</label>
                            <textarea name="alamat_mahasiswa" rows="3"
                                class="form-control @error('alamat_mahasiswa') is-invalid @enderror"></textarea>
                            @error('alamat_mahasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Tujuan Pengajuan Surat Aktif Kuliah</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                name="keterangan" placeholder="Misal: Perpanjang BPJS ...">
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-6 col-sm-12 mt-3">
                        <strong>
                            input Data orang Tua Mahasiswa/Mahasiswi
                            <hr>
                        </strong>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Nama Lengkap Ayah Anda (tanpa
                                gelar):</label>
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                name="nama_ayah" placeholder="Misal:Bejo Adam">
                            @error('nama_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Pekerjaan Ayah Anda:</label>
                            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                name="pekerjaan_ayah" placeholder="Misal:Petani">
                            @error('pekerjaan_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Nama Lengkap Ibu Anda (tanpa
                                gelar):</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                name="nama_ibu" placeholder="Nur Siti">
                            @error('nama_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Pekerjaan Ibu Anda:</label>
                            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                name="pekerjaan_ibu" placeholder="Misal:Ibu Rumah Tangga">
                            @error('pekerjaan_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukkan Alamat Lengkap Orang Tua Anda:</label>
                            <textarea name="alamat_orang_tua" rows="3"
                                class="form-control @error('alamat_orang_tua') is-invalid @enderror"></textarea>
                            @error('alamat_orang_tua')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim Data</button>
            </form>
        </div>

    </section>
    <!-- /Services Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">
    </section>

    <!-- Pricing Section -->
    <section id="table-surat" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>List Pengajuan Surat Kuliah</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class=" table-responsive">
                <table id="surat_table" class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa/i</th>
                            <th>Program Studi</th>
                            <th>Status</th>
                        </tr>
                    <tbody>

                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </section>


</section>
@push('scriptFrontend')
<script>
    $(document).ready(function() {
                // console.log();

                $('#surat_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('surat.data') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            width: '5%'
                        },
                        {
                            data: 'nim',
                            name: 'student.nim', // Sesuai dengan nama relasi
                            width: '15%'
                        },
                        {
                            data: 'nama_mahasiswa',
                            name: 'student.nama', // Sesuaikan dengan nama field
                            width: '25%'
                        },
                        {
                            data: 'prodi',
                            name: 'student.prodi.namaProdi', // Relasi nested
                            width: '25%'
                        },
                        {
                            data: 'status_surat',
                            name: 'status.nama_status',
                            width: '15%'
                        }
                    ]

                });
            });
</script>
@endpush
@endsection