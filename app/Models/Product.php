<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'sku_kode',
        'supplier_id',
        'stok_awal',
        'stok_masuk',
        'stok_keluar',
        'stok_akhir',
        'satuan',
        'harga_satuan',
        'total_harga',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

