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
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['anggota', 'CA'])->default('anggota');
            $table->foreignid('id_user')->constrained('tb_user')->onDelete('cascade');
            $table->foreignid('id_kegiatan')->constrained('tb_kegiatan_absensi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_absensi');
    }
};
