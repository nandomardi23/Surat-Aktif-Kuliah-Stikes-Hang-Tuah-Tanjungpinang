@extends('frontend.layouts.app')
@section('content')

<section class="mt-3 container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>
                    <h5>Format Pengajuan Surat Aktif Kuliah</h5>
                </span>
                <a href="" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <form action="{{route('pengajuan_surat.store')}}" method="POST">
            @csrf
            <div class="card-body">
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
                            <input type="text" class="form-control" name="nama_mahasiswa"
                                placeholder="Misal: Adam Budi Setia ...">
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan NIM Anda:</label>
                            <input type="text" class="form-control" name="nim" placeholder="Misal: 212109001">
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan Tempat Lahir Anda:</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                placeholder="Misal: Tanjungpinang/Batam ...">
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Masukkan Tanggal Lahir Anda:</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Pilih Jurusan</label>
                            <select name="prodi_id" id="" class="form-select">
                                <option value="">--- Pilih Jurusan ---</option>
                                @foreach ($prodi as $prodi)
                                <option value="{{$prodi->id}}">{{$prodi->namaProdi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Pilih Semester</label>
                            <select name="semester_id" id="" class="form-select">
                                <option value="">--- Pilih Semester ---</option>
                                @foreach ($semester as $semester)
                                <option value="{{$semester->id}}">{{$semester->semesterRomawi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukkan Alamat Anda Disini:</label>
                            <textarea name="alamat_mahasiswa" rows="3" class="form-control"></textarea>
                        </div>
                        <div class=" form-group mt-2">
                            <label for="" class="form-label">Tujuan Pengajuan Surat Aktif Kuliah</label>
                            <input type="text" class="form-control" name="keterangan"
                                placeholder="Misal: Perpanjang BPJS ...">
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-6 col-sm-12 mt-3">
                        <strong>
                            input Data orang Tua Mahasiswa/Mahasiswi
                            <hr>
                        </strong>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Nama Lengkap Ayah Anda (tanpa gelar):</label>
                            <input type="text" class="form-control" name="nama_ayah" placeholder="Misal:Bejo Adam">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Pekerjaan Ayah Anda:</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Misal:Petani">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Nama Lengkap Ibu Anda (tanpa gelar):</label>
                            <input type="text" class="form-control" name="nama_ibu" placeholder="Nur Siti">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukan Pekerjaan Ibu Anda:</label>
                            <input type="text" class="form-control" name="pekerjaan_ibu"
                                placeholder="Misal:Ibu Rumah Tangga">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="form-label">Masukkan Alamat Lengkap Orang Tua Anda:</label>
                            <textarea name="alamat_orang_tua" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kirim Data</button>
            </div>
        </form>
    </div>
</section>
@endsection