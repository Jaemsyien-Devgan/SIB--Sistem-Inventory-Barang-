<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpb extends Model
{
    use HasFactory;
    protected $table = 'lpb';
    protected $fillable = [
        'nomor_lpb',
        'tanggal_lpb',
        'nomor_op',
        'nomor_pp',
        'administrasi_id',
        'transaksi_id',
        'supplier_id',
        'tanda_tangan',
        'jabatan',
    ];

    protected $casts = [
        'tanda_tangan' => 'array',
        'jabatan' => 'array',
    ];

    public function administrasi()
    {
        return $this->belongsTo(Administrasi::class, foreignKey: 'administrasi_id');
    }
    public function supplier()
    {
        return $this->belongsTo(supplier::class, foreignKey: 'supplier_id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, foreignKey: 'transaksi_id');
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, foreignKey: 'satuan_id');
    }
    public function sublpb()
    {
        return $this->hasMany(SubLpb::class, foreignKey: 'lpb_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, foreignKey: 'product_id');
    }
}
