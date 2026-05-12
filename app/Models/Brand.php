<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_brand','kode_brand'])]

class Brand extends Model
{
    use HasFactory;

    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }
}