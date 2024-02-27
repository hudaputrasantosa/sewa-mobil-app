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
        Schema::create('sewas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('users_id')->constrained();
            $table->foreignUuid('mobils_id')->constrained();
            $table->string("tanggal_mulai");
            $table->string("tanggal_selesai");
            $table->string("harga_sewa");
            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_mobil')->references('id')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
