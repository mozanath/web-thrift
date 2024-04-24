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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50);
            $table->string('password', 50);
            $table->string('fullname', 100);
            $table->string('email', 50);
            $table->char('user_nohp', 13);
            $table->string('user_alamat', 200);
            $table->string('user_profile_url', 255)->default('url_placeholder_profil');
            $table->enum('user_level', ['admin', 'pengguna']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
