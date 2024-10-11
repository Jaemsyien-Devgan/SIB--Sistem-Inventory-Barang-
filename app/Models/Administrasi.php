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

    public function subAnggarans()
    {
        return $this->hasMany(SubAnggaran::class, 'administrasi_id');
    }

    public function product(){
        return $this->hasMany(product::class,'product_id');
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
    public function lpb(){
        return $this->hasMany(Lpb::class);
    }
    public function sublpb(){
        return $this->hasMany(SubLpb::class);
    }
    public function bpb(){
        return $this->hasMany(Bpb::class);
    }
    public function subbpb(){
        return $this->hasMany(bpb::class);
    }
}
