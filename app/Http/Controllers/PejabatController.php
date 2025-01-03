<?php

namespace App\Http\Controllers;

use App\Models\Pejabat;
use Illuminate\Http\Request;

class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pejabats = Pejabat::latest()->paginate(5);
        return view('pages.pejabat.index', compact('pejabats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pejabat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik' => 'required|numeric|unique:pejabats,nik,',
            'nama_pejabat' => 'required|',
            'jabatan' => 'required|unique:pejabats,jabatan,'
        ]);

        Pejabat::create($request->all());

        return redirect()->route('pejabat.index')->with('success', 'Data Berhasil Disimpan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pejabat $pejabat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pejabat $pejabat)
    {
        return view('pages.pejabat.edit', compact('pejabat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pejabat $pejabat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pejabat $pejabat)
    {
        //
    }
}
