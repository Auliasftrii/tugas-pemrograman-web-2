<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_brand',
        'kode_brand',
        'jenis_brand',
        'stok_brand'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}