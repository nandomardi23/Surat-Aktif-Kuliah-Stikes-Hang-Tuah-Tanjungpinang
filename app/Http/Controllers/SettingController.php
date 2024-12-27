<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $settings = Setting::first();
        return view('pages.settings.index',compact('settings'));
    }

    /**
     * 
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
        // dd($request->all());
         $request->validate([
            'logo_yayasan'=>'image|required|max:512',
            'logo_kampus'=>'image|required|max:512',
            'nama_yayasan'=>'required|min:4|max:50',
            'nama_kampus'=>'required|min:4|max:50',
            'no_telp'=>'required|numeric|',
            'alamat_kampus'=>'required|max:100'
        ]);
       
        $nama_yayasan = $request->input('nama_yayasan');
        $nama_kampus = $request->input('nama_kampus');

        if($request->hasFile('logo_yayasan')) {
           $logo_yayasan = $request->file('logo_yayasan');
           $filaName1 = $nama_yayasan . '.' . $logo_yayasan->getClientOriginalExtension();
           $path_logo_yayasan = $logo_yayasan->storeAs('logo',$filaName1, 'public');

        }
        if($request->hasFile('logo_kampus')){
            $logo_kampus = $request->file('logo_kampus');
            $filaName2 = $nama_kampus . '.' . $logo_kampus->getClientOriginalExtension();
            $path_logo_kampus = $logo_kampus->storeAs('logo', $filaName2, 'public');
        }

        Setting::create([
            'alamat_kampus' => $request->alamat_kampus,
            'no_telp' => $request->no_telp,
            'nama_yayasan' => $request->nama_yayasan,
            'nama_kampus' => $request->nama_kampus,
            'logo_yayasan' => $path_logo_yayasan,
            'logo_kampus' => $path_logo_kampus,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'logo_yayasan'=>'image|required|size:512',
            'logo_kampus'=>'image|required|size:512',
            'nama_yayasan'=>'required|min:4|max:50',
            'nama_kampus'=>'required|min:4|max:50',
            'no_telp'=>'required|numeric|min:6',
            'alamat_kampus'=>'required|max:255'
        ]);
       
        $setting = Setting::firtsOrCreate([

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
