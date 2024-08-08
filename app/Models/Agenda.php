<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam',
        'kegiatan',
        'deskripsi',
        'pj',
        'lokasi',
        'tanggal',
    ];
}
