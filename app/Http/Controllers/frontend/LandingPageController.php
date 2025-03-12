<?php

namespace App\Http\Controllers\frontend;

use App\Models\Prodi;
use App\Models\Surat;
use App\Models\Semester;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $semester = Semester::all();
        $prodi = Prodi::all();
        return view('frontend.pages.home.index', compact('semester', 'prodi'));
    }


    public function getData(Request $request)
    {
        $query = Surat::with(['student.prodi', 'status']); // Eager load relasi

        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('nim', function ($surat) {
                    return $surat->student->nim ?? '-';
                })
                ->addColumn('nama_mahasiswa', function ($surat) {
                    return $surat->student->nama_mahasiswa ?? '-'; // Sesuaikan dengan nama field yang benar
                })
                ->addColumn('prodi', function ($surat) {
                    return $surat->student->prodi->namaProdi ?? '-';
                })
                ->addColumn('status_surat', function ($surat) {
                    return $surat->status->nama_status ?? '-';
                })
                ->filterColumn('student.nim', function ($query, $keyword) {
                    $query->whereHas('student', function ($q) use ($keyword) {
                        $q->where('nim', 'like', "%{$keyword}%");
                    });
                })
                ->rawColumns(['nim', 'nama_mahasiswa', 'prodi', 'status_surat'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa'    => 'required',
            'nim'               => 'required|integer',
            'tanggal_lahir'     => 'required',
            'tempat_lahir'      => 'required',
            'jenis_kelamin'     => 'required',
            'alamat_mahasiswa'  => 'required',
            'prodi_id'          => 'required',
            'semester_id'       => 'required',
            'keterangan'        => 'required',
            'nama_ayah'         => 'required',
            'pekerjaan_ayah'    => 'required',
            'nama_ibu'          => 'required',
            'pekerjaan_ibu'     => 'required',
            'alamat_orang_tua'  => 'required'
        ]);

        $student = Students::create([
            'nama_mahasiswa'    => $request->nama_mahasiswa,
            'nim'               => $request->nim,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'tempat_lahir'      => $request->tempat_lahir,
            'alamat_mahasiswa'  => $request->alamat_mahasiswa,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'prodi_id'          => $request->prodi_id,
            'semester_id'       => $request->semester_id,
            'nama_ayah'         => $request->nama_ayah,
            'pekerjaan_ayah'    => $request->pekerjaan_ayah,
            'nama_ibu'          => $request->nama_ibu,
            'pekerjaan_ibu'     => $request->pekerjaan_ibu,
            'alamat_orang_tua'  => $request->alamat_orang_tua
        ]);

        Surat::create([
            'student_id' => $student->id,
            'status_id' => 1,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pengajuan_surat.index');
    }
}
