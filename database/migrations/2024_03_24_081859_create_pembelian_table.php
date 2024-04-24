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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('pembelian_id');
            $table->unsignedBigInteger('pembelian_user_id');
            $table->unsignedBigInteger('pembelian_metode_pembayaran_id');
            $table->timestamp('pembelian_tanggal')->nullable();
            $table->integer('pembelian_total_harga');

            // Foreign key 
            $table->foreign('pembelian_user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pembelian_metode_pembayaran_id')->references('metode_pembayaran_id')->on('metode_pembayaran')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};