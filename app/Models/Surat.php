<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nomor_surat',
        'student_id',
        'status_id',
        'pejabat_id',
        'keterangan'

    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    // Relasi ke model Pejabat
    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class, 'pejabat_id');
    }

    // Relasi ke model Students
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
