<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pejabat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama_pejabat',
        'jabatan'
    ];
}
