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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->text('alamat');
            $table->string('ketua_kelompok');
            $table->string('file'); // Untuk menyimpan path ke file proposal
            $table->enum('keterangan', ['diproses', 'disetujui', 'ditolak'])->default('diproses');
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};