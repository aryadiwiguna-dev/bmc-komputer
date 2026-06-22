<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'kategori',
        'harga_beli',
        'harga_jual',
        'stok',
        'stok_minimum',
        'satuan',
        'gambar',
    ];

    public function stockIns()
    {
        return $this->hasMany(StockIn::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
