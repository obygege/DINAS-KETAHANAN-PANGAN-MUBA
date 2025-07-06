<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('harga_pangan', function (Blueprint $table) {
            $table->id(); // Kolom ID (Primary Key, Auto Increment)
            $table->string('nama_pangan'); // Kolom untuk nama pangan, tipe varchar
            $table->integer('harga_pangan'); // Kolom untuk harga, tipe integer
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_pangans');
    }
};
