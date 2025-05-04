<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('jenis_kelamin');
            $table->date('tanggal');
            $table->string('negara');
            $table->string('instansi');
            $table->string('provinsi');
            $table->string('jenis_perusahaan');
            $table->string('kota');
            $table->string('alamat');
            $table->string('no_fax')->nullable();
            $table->enum('status', ['open', 'verifikasi', 'cancel', 'close'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};

