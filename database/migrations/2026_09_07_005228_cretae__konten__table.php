<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konten', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('judul');
            $table->longText('konten');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konten');
    }
};