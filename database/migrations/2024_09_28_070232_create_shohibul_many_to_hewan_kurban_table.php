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
        Schema::create('shohibul_many_to_hewan_kurban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("shohibul_kurban_id");
            $table->unsignedBigInteger("hewan_kurban_id");
            $table->timestamps();

            $table->foreign("shohibul_kurban_id")->references("id")->on("shohibul_kurban");
            $table->foreign("hewan_kurban_id")->references("id")->on("hewan_kurban");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shohibul_many_to_hewan_kurban');
    }
};
