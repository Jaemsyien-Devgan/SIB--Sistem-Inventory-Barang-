<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $table ='satuan';
    protected $fillable = ['kode_satuan', 'nama_satuan', 'singkatan', 'deskripsi'];

    public function product()
    {
        return $this->hasMany(product::class,'satuan_id');
    }
    public function administrasi()
    {
        return $this->hasMany(Administrasi::class,'satuan_id');
    }
    public function subLpb()
    {
        return $this->hasMany(SubLpb::class,'sub_lpb_id');
    }
    public function LPB()
    {
        return $this->hasMany(Lpb::class,'satuan_id');
    }
}



