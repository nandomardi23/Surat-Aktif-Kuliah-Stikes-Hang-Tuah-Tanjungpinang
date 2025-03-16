@extends('frontend.layouts.app')
@section('content')
<section>
    <!-- Featured Services Section -->
    <section id="alur_sistem" class="featured-services section">
        <div class="container section-title">
            <h2>Alur Pengajuan Surat Aktif Kuliah</h2>
            <p><span class="description-title">Ada beberapa tahapan dalam melakukan pembuatan
                    surat aktif kuliah mahasiswa</span></p>
            <img class="mt-3" src="{{asset('assets/frontend/assets/img/alur penginputan Surat Aktif Kuliah.png')}}"
                alt="">
        </div>
    </section>

    <section class="team section light-background">
    </section>

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
    <section id="" class="team section light-background">
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