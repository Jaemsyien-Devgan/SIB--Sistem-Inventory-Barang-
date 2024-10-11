<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['kode_produk', 'nama_produk', 'satuan_id'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
    public function administrasi()
    {
        return $this->belongsTo(Administrasi::class, 'administrasi_id');
    }
    public function subAnggarans()
    {
        return $this->belongsTo(SubAnggaran::class, 'product_id');
    }
    public function subLpb()
    {
        return $this->hasMany(SubLpb::class, 'product_id');
    }
    public function lPB()
    {
        return $this->hasMany(Lpb::class, 'product_id');
    }
    public function bpb(){
        return $this->hasMany(Bpb::class, 'product_id');
    }
    public function subbpb(){
        return $this->hasMany(SubBpb::class, 'product_id');
    }
}
