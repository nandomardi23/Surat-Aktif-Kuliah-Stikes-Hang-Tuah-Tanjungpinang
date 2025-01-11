<?php

namespace App\Http\Controllers;

use App\Models\IsiSurat;
use Illuminate\Http\Request;

class IsiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isiSurat = IsiSurat::first();
        return view('pages.isisurat.index', compact('isiSurat'));
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
    public function show(IsiSurat $isiSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IsiSurat $isiSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IsiSurat $isiSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsiSurat $isiSurat)
    {
        //
    }
}
