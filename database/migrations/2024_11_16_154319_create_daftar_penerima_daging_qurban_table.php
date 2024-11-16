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
        Schema::create('daftar_penerima_daging_qurban', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->string('alamat', 150);
            $table->string('kecamatan', 150);
            $table->string('kelurahan', 150);
            $table->string('rt', 150);
            $table->string('rw', 150);
            $table->unsignedBigInteger('status_penyerahan_id');
            $table->date('tanggal_penyerahan');
            $table->string('bukti_penyerahan', 255);
            $table->timestamps();

            $table->foreign('status_penyerahan_id')->references('id')->on('status_penyerahan_daging_qurban');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_penerima_daging_kurban');
    }
};
