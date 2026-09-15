<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $settings = [
            'brand_nama' => 'HALL UNILAM',
            'brand_subtitle' => 'UNIVERSITAS LA TANSA MASHIRO',
            'hero_judul' => 'Hall Unilam - Universitas La Tansa Mashiro',
            'galeri_judul' => 'Galeri Real Venue La Tansa Hall',
            'galeri_deskripsi' => 'Dokumentasi nyata tampilan gedung interior dan exterior',
            'kontak_judul' => 'Pemesanan Venue Official',
            'kontak_deskripsi' => 'Untuk cek ketersediaan tanggal acara, survei lokasi, dan reservasi gedung, silakan hubungi penanggung jawab resmi:',
            'footer_teks' => 'Universitas La Tansa Mashiro (UNILAM) - La Tansa Hall. All rights reserved.',
        ];

        foreach ($settings as $key => $value) {
            DB::table('pengaturan')->insertOrIgnore([
                'key' => $key,
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('pengaturan')->whereIn('key', [
            'brand_nama', 'brand_subtitle', 'hero_judul', 'galeri_judul', 'galeri_deskripsi',
            'kontak_judul', 'kontak_deskripsi', 'footer_teks',
        ])->delete();
    }
};
