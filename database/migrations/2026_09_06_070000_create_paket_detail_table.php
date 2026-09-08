<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_detail', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel paket
            $table->foreignId('paket_id')
                  ->constrained('paket')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // Foreign Key ke tabel fasilitas
            $table->foreignId('fasilitas_id')
                  ->constrained('fasilitas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_detail');
    }
};