<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table ='supplier';
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'alamat_supplier',
        'telepon_supplier',
        'tanggal_bergabung',
        'tanggal_berakhir',
        'status',
    ];
}
