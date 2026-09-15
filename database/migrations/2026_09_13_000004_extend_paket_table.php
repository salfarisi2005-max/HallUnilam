<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('paket', function (Blueprint $table) {
            $table->string('jenis')->default('lainnya')->after('nama_paket');
            $table->string('waktu')->nullable()->after('amount');
            $table->text('catatan')->nullable()->after('waktu');
            $table->unsignedInteger('urutan')->default(0)->after('catatan');
            $table->boolean('aktif')->default(true)->after('urutan');
        });
    }

    public function down(): void
    {
        Schema::table('paket', function (Blueprint $table) {
            $table->dropColumn(['jenis', 'waktu', 'catatan', 'urutan', 'aktif']);
        });
    }
};
