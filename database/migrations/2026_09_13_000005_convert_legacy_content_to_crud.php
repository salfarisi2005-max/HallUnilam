<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $legacyPackages = DB::table('konten')
            ->whereIn('key', ['paket_pernikahan', 'paket_seminar', 'paket_perpisahan'])
            ->get()
            ->keyBy('key');

        $packageMap = [
            'paket_pernikahan' => [
                'jenis' => 'pernikahan',
                'waktu' => '08.00 - 14.30 WIB',
                'amount' => 0,
            ],
            'paket_seminar' => [
                'jenis' => 'seminar',
                'waktu' => '08.00 - 15.30 WIB / 08.00 - 12.00 WIB / 13.00 - 17.00 WIB',
                'amount' => 0,
            ],
            'paket_perpisahan' => [
                'jenis' => 'perpisahan',
                'waktu' => '08.00 - 13.30 WIB',
                'amount' => 0,
            ],
        ];

        foreach ($packageMap as $key => $defaults) {
            if (! isset($legacyPackages[$key]) || DB::table('paket')->where('jenis', $defaults['jenis'])->exists()) {
                continue;
            }

            $legacy = $legacyPackages[$key];
            $content = json_decode($legacy->konten, true) ?: [];
            $packageId = DB::table('paket')->insertGetId([
                'nama_paket' => $legacy->judul,
                'jenis' => $defaults['jenis'],
                'amount' => $defaults['amount'],
                'waktu' => $content['waktu'] ?? $defaults['waktu'],
                'catatan' => $content['catatan'] ?? null,
                'urutan' => count(DB::table('paket')->where('aktif', true)->get()),
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($key === 'paket_pernikahan') {
                $headers = $content['headers'] ?? [];
                foreach ($content['rows'] ?? [] as $rowIndex => $row) {
                    foreach ($headers as $headerIndex => $header) {
                        $headerKey = match ($headerIndex) {
                            0 => 'standar',
                            1 => 'semi',
                            2 => 'reguler',
                            3 => 'vip',
                            4 => 'vvip',
                            default => strtolower($header),
                        };

                        DB::table('paket_items')->insert([
                            'paket_id' => $packageId,
                            'nama_item' => $row['fasilitas'] ?? 'Item paket',
                            'tipe' => $header,
                            'nilai' => $row[$headerKey] ?? '',
                            'urutan' => ($rowIndex * 100) + $headerIndex,
                            'aktif' => true,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            } else {
                foreach ($content['items'] ?? [] as $index => $item) {
                    DB::table('paket_items')->insert([
                        'paket_id' => $packageId,
                        'nama_item' => $item['tipe'] ?? 'Item paket',
                        'tipe' => null,
                        'nilai' => $item['harga'] ?? '',
                        'urutan' => $index,
                        'aktif' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        $heroImages = [
            ['BagianDalamHall.jpeg', 'Interior Utama Hall'],
            ['dalamBagianDepanHall.jpeg', 'Panggung Hall'],
            ['halamanDepanHall.jpeg', 'Halaman Depan Hall'],
            ['halamanLuarHall.jpeg', 'Halaman Luar Hall'],
            ['halamanSampingHall.jpeg', 'Halaman Samping Hall'],
            ['halamanBelakangHall.jpeg', 'Halaman Belakang Hall'],
        ];

        foreach ($heroImages as $index => [$path, $title]) {
            DB::table('media')->insertOrIgnore([
                'jenis' => 'hero',
                'judul' => $title,
                'caption' => null,
                'alt' => $title,
                'path' => 'images/'.$path,
                'urutan' => $index,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $gallery = [
            ['halamanDepanHall.jpeg', 'Foyer & Pintu Utama'],
            ['BagianDalamHall.jpeg', 'Interior Utama Hall'],
            ['dalamBagianDepanHall.jpeg', 'Panggung & Karpet Merah'],
        ];

        foreach ($gallery as $index => [$path, $caption]) {
            DB::table('media')->insertOrIgnore([
                'jenis' => 'galeri',
                'judul' => $caption,
                'caption' => $caption,
                'alt' => $caption,
                'path' => 'images/'.$path,
                'urutan' => $index,
                'aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $settings = [
            'hero_lokasi' => 'Rangkasbitung, Banten',
            'hero_deskripsi' => 'Panggung serbaguna dengan kapasitas 1.500-2.500 untuk Pernikahan, Seminar, Konser, Gathering, dan Perpisahan Sekolah.',
            'hero_tombol' => 'Lihat Katalog Paket Pricing',
            'whatsapp_nomor' => '6281234567890',
            'whatsapp_nama' => 'Bu Euis (WhatsApp Official)',
            'whatsapp_pesan' => 'Halo Bu Euis, saya ingin sewa La Tansa Hall Unilam',
            'instagram_hall' => 'https://www.instagram.com/latansa_hall?igsh=M3N4cXpjMjQwMnl1',
            'instagram_unilam' => 'https://www.instagram.com/unilam.official?igsh=eHhseWMzZjVibTFu',
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
        DB::table('paket_items')->delete();
        DB::table('paket')->whereIn('jenis', ['pernikahan', 'seminar', 'perpisahan'])->delete();
        DB::table('media')->delete();
        DB::table('pengaturan')->delete();
    }
};
