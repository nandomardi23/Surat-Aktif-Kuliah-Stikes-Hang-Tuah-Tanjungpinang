<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'namaProdi' => 'S1 Keperawatan'
        ]);
        Prodi::create([
            'namaProdi' => 'D3 Keperawatan'
        ]);
        Prodi::create([
            'namaProdi' => 'D3 Farmasi'
        ]);
        Prodi::create([
            'namaProdi' => 'Profesi Ners'
        ]);
    }
}
