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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('umkm_id')->constrained()->onDelete('cascade');
            $table->enum('jenis_layanan', ['permintaan informasi', 'pengaduan', 'pendampingan']);
            $table->text('isi_layanan');
            $table->date('tanggal_layanan');
            $table->string('petugas_layanan');
            $table->string('zoom')->nullable();
            $table->string('no_telpon');
            $table->string('pesan')->nullable();
            $table->enum('status', ['buka', 'selesai'])->default('buka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
