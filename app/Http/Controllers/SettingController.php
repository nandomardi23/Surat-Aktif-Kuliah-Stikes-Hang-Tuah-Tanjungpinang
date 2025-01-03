<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first();
        return view('pages.settings.index', compact('settings'));
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
            'logo_kampus' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_yayasan' => 'required|min:4|max:50',
            'nama_kampus' => 'required|min:4|max:50',
            'no_telp' => 'required|numeric|',
            'alamat_kampus' => 'required|max:100'
        ]);


        $folderName = Str::slug($request->nama_kampus, '_'); // Mengganti spasi dengan underscore
        $folderPath = 'logo/' . $folderName;

        // Simpan gambar ke storage dengan folder sesuai nama_kampus
        $logoPath = $request->file('logo_kampus')->store($folderPath, 'public');

        Setting::create([
            'alamat_kampus' => $request->alamat_kampus,
            'no_telp' => $request->no_telp,
            'nama_yayasan' => $request->nama_yayasan,
            'nama_kampus' => $request->nama_kampus,
            'logo_kampus' => $logoPath,
        ]);

        return redirect()->back()->with('success', 'Data berhasil Ditambahkan');
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
            'alamat_kampus' => 'required|string',
            'no_telp' => 'required|string',
            'nama_yayasan' => 'required|string',
            'nama_kampus' => 'required|string',
            'logo_kampus' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::first();
        if ($request->hasFile('logo_kampus')) {
            // Hapus gambar lama jika ada
            if ($setting->logo_kampus && Storage::disk('public')->exists($setting->logo_kampus)) {
                Storage::disk('public')->delete($setting->logo_kampus);
            }

            // Bersihkan nama_kampus untuk digunakan sebagai nama folder
            $folderName = Str::slug($request->nama_kampus, '_'); // Mengganti spasi dengan underscore
            $folderPath = 'kampus/' . $folderName;

            // Simpan gambar baru dengan folder sesuai nama_kampus
            $logoPath = $request->file('logo_kampus')->store($folderPath, 'public');
            $setting->logo_kampus = $logoPath;
        }

        // Update data lainnya
        $setting->alamat_kampus = $request->alamat_kampus;
        $setting->no_telp = $request->no_telp;
        $setting->nama_yayasan = $request->nama_yayasan;
        $setting->nama_kampus = $request->nama_kampus;

        // Simpan perubahan
        $setting->save();

        return redirect()->route('setting.index')->with('success', 'Data kampus berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
