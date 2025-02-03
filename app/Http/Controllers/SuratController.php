<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Status;
use App\Models\Pejabat;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Exceptions\HttpResponseException;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $statuses = Status::all();
        $pejabats = Pejabat::all();

        if ($request->ajax()) {
            $data = Surat::with('status', 'pejabat', 'student', 'student.prodi', 'student.semester')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return Blade::render('
                    <div class="btn-group">
                        <button class="btn btn-sm btn-warning edit-btn ms-1" data-id="' . $row->id . '">Edit</button>
                        <button class="btn btn-sm btn-info detail-btn ms-1" data-id="' . $row->id . '">Detail</button>
                        <button class="btn btn-sm btn-danger delete-btn ms-1" data-id="' . $row->id . '">Hapus</button>
                    </div>', ['id' => $row->id]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.surat.index', compact('statuses', 'pejabats'));;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {

        // $surat = Surat::with('status', 'pejabat', 'student')->find($surat);
        $surat->load('status', 'pejabat', 'student');
        return response()->json($surat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {

        try {
            $validated = $request->validate([
                'nomor_surat' => 'required|string|max:255',
                'status_id' => 'required|exists:statuses,id',
                'pejabat_id' => 'required|exists:pejabats,id',
            ]);

            $surat->update($validated);

            return response()->json(['success' => 'Surat berhasil diperbarui!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Kembalikan error validasi sebagai JSON
            return response()->json([
                'errors' => $e->validator->errors()
            ], 422); // 422: Unprocessable Entity
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }
}
