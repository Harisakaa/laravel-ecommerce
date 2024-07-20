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
        Schema::create('tbjual', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_stok');
            $table->string('no_bukti');
            $table->string('nama');
            $table->text('alamat');
            $table->string('nohp');
            $table->string('kode_pos');
            $table->string('pesan')->nullable();
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_stok')->references('id_stok')->on('tbstok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbjual');
    }
};
