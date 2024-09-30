<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAnggaran extends Model
{
    use HasFactory;
    protected $table = 'sub_anggarans';
    protected $fillable = [
        'administrasi_id',
        'kode_anggaran',
        'nama_anggaran',
        'anggaran_id',
        'satuan_id',
        'kuantitas',
        'harga_satuan',
        'jumlah_harga',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function administrasi()
    {
        return $this->belongsTo(Administrasi::class);
    }
    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }
}
