<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBpb extends Model
{
    use HasFactory;
    protected $table = 'sub_bpb';
    protected $fillable = [
        'bpb_id',
        'sub_lpb_id',
    ];

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class, foreignKey: 'administrasi_id');
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

    public function subLpb()
    {
        return $this->belongsTo(SubLpb::class, foreignKey:'sub_lpb_id');
    }

    public function subAnggarans(){
        return $this->hasMany(SubAnggaran::class, 'sub_anggaran_id');
    }

}
