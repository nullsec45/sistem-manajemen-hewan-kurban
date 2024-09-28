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
        Schema::create('hewan_kurban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("jenis_hewan_kurban_id");
            $table->unsignedBigInteger("tipe_kurban_id");
            $table->integer("berat_hewan");
            $table->integer("tinggi_hewan");
            $table->unsignedBigInteger("kondisi_fisik_hewan_id");
            $table->unsignedBigInteger("usia_hewan_id");
            $table->string("image", 150);
            
            $table->timestamps();

            $table->foreign("jenis_hewan_kurban_id")->references("id")->on("jenis_hewan_kurban");
            $table->foreign("tipe_kurban_id")->references("id")->on("tipe_kurban");
            $table->foreign("kondisi_fisik_hewan_id")->references("id")->on("kondisi_fisik_hewan");
            $table->foreign("usia_hewan_id")->references("id")->on("usia_hewan");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewan_kurban');
    }
};
