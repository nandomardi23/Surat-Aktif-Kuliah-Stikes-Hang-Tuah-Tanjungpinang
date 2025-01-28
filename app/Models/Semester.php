<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Yajra\DataTables\Html\Editor\Fields\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semester extends Model
{
    use HasFactory;
    // protected $table = 'semesters';
    protected $fillable = [
        'semesterRomawi'
    ];

    public function Student(): BelongsTo
    {
        return $this->belongsTo(Students::class);
    }
}
