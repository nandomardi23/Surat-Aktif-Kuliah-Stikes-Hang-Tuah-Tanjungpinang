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
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
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
                            <option value="{{$prodi->id}}">{{$prodi->namaProdi}}</option>
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
                        <select name="semester_id" id="" class="form-select @error('semester_id') is-invalid @enderror">
                            <option value="">--- Pilih Semester ---</option>
                            @foreach ($semester as $semester)
                            <option value="{{$semester->id}}">{{$semester->semesterRomawi}}</option>
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
                        <label for="" class="form-label">Masukan Nama Lengkap Ayah Anda (tanpa gelar):</label>
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
                        <label for="" class="form-label">Masukan Nama Lengkap Ibu Anda (tanpa gelar):</label>
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                            placeholder="Nur Siti">
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
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Kirim Data</button>
        </div>
    </form>
</div>