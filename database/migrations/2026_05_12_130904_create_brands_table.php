<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained()->cascadeOnDelete();
            $table->string('nama_brand');
            $table->string('kode_brand')->unique();
            $table->string('jenis_brand');
            $table->integer('stok_brand');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};