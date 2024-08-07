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
        Schema::create('tbpelanggan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan'); 
            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('cascade');
            $table->string('no_bukti');
            $table->string('nama');
            $table->text('alamat');
            $table->string('nohp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbpelanggan');
    }
};
