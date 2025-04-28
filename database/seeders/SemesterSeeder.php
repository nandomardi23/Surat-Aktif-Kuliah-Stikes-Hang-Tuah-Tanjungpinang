<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::create([
            'semesterRomawi' => 'I'
        ]);
        Semester::create([
            'semesterRomawi' => 'II'
        ]);
        Semester::create([
            'semesterRomawi' => 'III'
        ]);
        Semester::create([
            'semesterRomawi' => 'IV'
        ]);
        Semester::create([
            'semesterRomawi' => 'V'
        ]);
        Semester::create([
            'semesterRomawi' => 'VI'
        ]);
        Semester::create([
            'semesterRomawi' => 'VII'
        ]);
        Semester::create([
            'semesterRomawi' => 'VIII'
        ]);
        Semester::create([
            'semesterRomawi' => 'IX'
        ]);
        Semester::create([
            'semesterRomawi' => 'XI'
        ]);
        Semester::create([
            'semesterRomawi' => 'XII'
        ]);
        Semester::create([
            'semesterRomawi' => 'XIII'
        ]);
        Semester::create([
            'semesterRomawi' => 'XIV'
        ]);
    }
}
