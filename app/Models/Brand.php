<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kategori_id',
        'nama_brand',
        'kode_brand',
        'jenis_brand',
        'negara_asal',
        'stok_brand'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}