<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLpb extends Model
{
    use HasFactory;
    protected $table = 'sub_lpb';
    protected $fillable = [
        'lpb_id',
        'sub_anggaran_id',
        'product_id',
        'kuantitas',
        'spesifikasi',
        'deskripsi',
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
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, foreignKey: 'satuan_id');
    }
    public function lpb()
    {
        return $this->belongsTo(Lpb::class, foreignKey: 'lpb_id');
    }

    public function subAnggarans(){
        return $this->hasMany(SubAnggaran::class, 'sub_anggaran_id');
    }

}
