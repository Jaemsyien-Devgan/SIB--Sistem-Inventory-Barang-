<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;
    protected $table = 'administrasi';
    protected $fillable = ['proyek_id','kode_proyek','nama_proyek','status'];

    public function satuan()
    {
        return $this->belongsTo(Proyek::class);
    }
}
