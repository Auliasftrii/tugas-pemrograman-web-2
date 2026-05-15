<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama_kategori', 'kode_kategori', 'deskripsi'])]

class Kategori extends Model
{
    use HasFactory;

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}