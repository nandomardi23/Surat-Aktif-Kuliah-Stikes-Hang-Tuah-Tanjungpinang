<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat_kampus',
        'no_telp',
        'nama_yayasan',
        'nama_kampus',
        'logo_kampus'
    ];
}
