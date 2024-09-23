<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyek';
    protected $fillable = ['kode_proyek', 'nama_proyek', 'start_date', 'status'];

    protected $casts = [
        'start_date' => 'date',
    ];
}


