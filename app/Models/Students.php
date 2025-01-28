<?php

namespace App\Models;

use App\Models\Prodi;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students extends Model
{
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_mahasiswa',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_orang_tua',
        'semester_id',
        'prodi_id'
    ];

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
