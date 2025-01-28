<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Status;
use App\Models\Pejabat;
use App\Models\Students;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // dd(
        //     $data = Surat::with('status', 'pejabat', 'student', 'student.prodi', 'student.semester')->latest()->get()
        // );
        if ($request->ajax()) {
            $data = Surat::with('status', 'pejabat', 'student', 'student.prodi', 'student.semester')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn_edit = '<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>';
                    return $btn_edit;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.surat.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }
}
