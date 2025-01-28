<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaProdi'
    ];

    public function Student(): BelongsTo
    {
        return $this->belongsTo(Students::class);
    }
}
