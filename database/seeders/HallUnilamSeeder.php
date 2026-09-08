<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konten;
use App\Models\Fasilitas; // Memastikan Model Fasilitas ter-import dengan benar

class HallUnilamSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Sewa Sarana Satuan (Master Fasilitas)
        $fasilitasData = [
            ['nama_fasilitas' => 'Sewa Gedung Utama', 'harga' => 7000000, 'stok' => 1],
            ['nama_fasilitas' => 'Wisma Penginapan', 'harga' => 350000, 'stok' => 4],
            ['nama_fasilitas' => 'Kursi + Cover', 'harga' => 17000, 'stok' => 600],
            ['nama_fasilitas' => 'Pendingin AC 5PK', 'harga' => 1000000, 'stok' => 10],
            ['nama_fasilitas' => 'Soundsystem Paket', 'harga' => 5000000, 'stok' => 1],
            ['nama_fasilitas' => 'Projector + Screen', 'harga' => 1500000, 'stok' => 1],
        ];

        foreach ($fasilitasData as $item) {
            Fasilitas::updateOrCreate(['nama_fasilitas' => $item['nama_fasilitas']], $item);
        }

        // 2. Data Tabel Matriks Paket Pernikahan (Diisi ke Tabel Konten)
        $pernikahanMatrix = [
            'headers' => ['Standar (Rp 11.000.000)', 'Semi Reguler (Rp 14.000.000)', 'Reguler (Rp 16.000.000)', 'VIP (Rp 17.000.000)', 'VVIP (Rp 25.000.000)'],
            'rows' => [
                ['fasilitas' => 'Gedung Utama', 'standar' => '1 unit', 'semi' => '1 unit', 'reguler' => '1 unit', 'vip' => '1 unit', 'vvip' => '1 unit'],
                ['fasilitas' => 'Kursi + Cover', 'standar' => '100 unit', 'semi' => '200 unit', 'reguler' => '300 unit', 'vip' => '400 unit', 'vvip' => '500 unit'],
                ['fasilitas' => 'Meja Panjang / Sedang / Bulat', 'standar' => '2 / 2 / 4 set', 'semi' => '2 / 2 / 4 set', 'reguler' => '2 / 2 / 5 set', 'vip' => '4 / 2 / 5 set', 'vvip' => '4 / 2 / 5 unit'],
                ['fasilitas' => 'Sofa', 'standar' => '2 set', 'semi' => '2 set', 'reguler' => '4 set', 'vip' => '4 set', 'vvip' => '4 set'],
                ['fasilitas' => 'AC 5PK / Blower', 'standar' => '- / 4 unit', 'semi' => '4 / 6 unit', 'reguler' => '6 / 6 unit', 'vip' => '10 / 6 unit', 'vvip' => '16 / 6 unit'],
                ['fasilitas' => 'Lighting & Soundsystem', 'standar' => 'Sound', 'semi' => 'Sound', 'reguler' => 'Sound', 'vip' => 'Light & Sound', 'vvip' => 'Light & Sound'],
                ['fasilitas' => 'Wisma Penginapan', 'standar' => '-', 'semi' => '-', 'reguler' => '-', 'vip' => '4 Kamar', 'vvip' => '4 Kamar'],
            ]
        ];

        // 3. Data Paket Seminar
        $seminarList = [
            'catatan' => 'Semua paket seminar sudah termasuk Projector & Screen 1 paket.',
            'items' => [
                ['tipe' => 'Standar (Full/Half)', 'harga' => 'Rp 11JT / Rp 10JT'],
                ['tipe' => 'Reguler (Full/Half)', 'harga' => 'Rp 14JT / Rp 12JT'],
                ['tipe' => 'VIP (Full/Half)', 'harga' => 'Rp 16JT / Rp 13JT'],
                ['tipe' => 'VVIP (Full/Half)', 'harga' => 'Rp 25JT / Rp 20JT'],
            ]
        ];

        // 4. Data Paket Perpisahan Sekolah
        $perpisahanList = [
            'waktu' => '08.00 - 13.30 WIB',
            'items' => [
                ['tipe' => 'Standar (200 Kursi, Blower, Sound)', 'harga' => 'Rp 8.000.000'],
                ['tipe' => 'Reguler (+ 6 AC 5PK, 300 Kursi)', 'harga' => 'Rp 10.000.000'],
                ['tipe' => 'VIP (+ 10 AC 5PK, 400 Kursi)', 'harga' => 'Rp 11.000.000'],
                ['tipe' => 'VVIP (+ 16 AC 5PK, 500 Kursi)', 'harga' => 'Rp 17.000.000'],
            ]
        ];

        // Masukkan ke Tabel Konten
        Konten::updateOrCreate(
            ['key' => 'paket_pernikahan'],
            ['judul' => 'PAKET PERNIKAHAN (08.00 - 14.30 WIB)', 'konten' => json_encode($pernikahanMatrix)]
        );

        Konten::updateOrCreate(
            ['key' => 'paket_seminar'],
            ['judul' => 'PAKET SEMINAR', 'konten' => json_encode($seminarList)]
        );

        Konten::updateOrCreate(
            ['key' => 'paket_perpisahan'],
            ['judul' => 'PAKET PERPISAHAN SEKOLAH', 'konten' => json_encode($perpisahanList)]
        );
    }
}