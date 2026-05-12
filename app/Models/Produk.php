<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'nama_produk',
    'kode_produk',
    'kategori_id',
    'brand_id',
    'stok',
    'harga'
])]

class Produk extends Model
{
    use HasFactory;

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}