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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->string('prodi');
            $table->string('event');
            $table->string('penyelenggara');
            $table->string('tempat');
            $table->date('tglMulai');
            $table->date('tglAkhir');
            $table->string('kategoriPenghargaan');
            $table->string('peringkat');
            $table->string('level');
            $table->string('attachment')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Field user_id nullable
            $table->timestamps();

            // Menambahkan foreign key constraint tanpa onDelete cascade
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
