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
        'product_id',
        'no_detail',
        'anggaran_id',
        'kuantitas',
        'harga_satuan',
        'jumlah_harga',
    ];

    public function administrasi()
    {
        return $this->belongsTo(Administrasi::class, foreignKey: 'administrasi_id');
    }
    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class, foreignKey: 'anggaran_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, foreignKey: 'product_id');
    }
}
