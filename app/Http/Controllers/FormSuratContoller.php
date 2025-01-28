<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Surat;
use App\Models\Semester;
use App\Models\Students;
use Carbon\Carbon;

use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class FormSuratContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return::DataTables

        return view('frontend.pages.surat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semester = Semester::all();
        $prodi = Prodi::all();

        return view('frontend.pages.surat.create', compact('semester', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_mahasiswa'    => 'required',
            'nim'               => 'required|integer',
            'tanggal_lahir'     => 'required',
            'tempat_lahir'      => 'required',
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

    /**
     * Display the specified resource.
     */
    public function show(surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surat $surat)
    {
        //
    }
}
