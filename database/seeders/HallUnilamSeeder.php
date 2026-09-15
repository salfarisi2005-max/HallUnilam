<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\Paket;
use Illuminate\Database\Seeder;

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

        // 2. Data paket biasa yang dapat dikelola melalui CRUD admin.
        $paketData = [
            ['nama_paket' => 'PAKET PERNIKAHAN (08.00 - 14.30 WIB)', 'jenis' => 'pernikahan', 'waktu' => '08.00 - 14.30 WIB', 'items' => [
                ['nama_item' => 'Gedung Utama', 'tipe' => 'Standar', 'nilai' => '1 unit'], ['nama_item' => 'Gedung Utama', 'tipe' => 'Semi Reguler', 'nilai' => '1 unit'], ['nama_item' => 'Gedung Utama', 'tipe' => 'Reguler', 'nilai' => '1 unit'], ['nama_item' => 'Gedung Utama', 'tipe' => 'VIP', 'nilai' => '1 unit'], ['nama_item' => 'Gedung Utama', 'tipe' => 'VVIP', 'nilai' => '1 unit'],
                ['nama_item' => 'Kursi + Cover', 'tipe' => 'Standar', 'nilai' => '100 unit'], ['nama_item' => 'Kursi + Cover', 'tipe' => 'Semi Reguler', 'nilai' => '200 unit'], ['nama_item' => 'Kursi + Cover', 'tipe' => 'Reguler', 'nilai' => '300 unit'], ['nama_item' => 'Kursi + Cover', 'tipe' => 'VIP', 'nilai' => '400 unit'], ['nama_item' => 'Kursi + Cover', 'tipe' => 'VVIP', 'nilai' => '500 unit'],
            ]],
            ['nama_paket' => 'PAKET SEMINAR', 'jenis' => 'seminar', 'waktu' => 'Full Day / Half Day', 'catatan' => 'Semua paket seminar sudah termasuk Projector & Screen 1 paket.', 'items' => [
                ['nama_item' => 'Standar (Full/Half)', 'nilai' => 'Rp 11JT / Rp 10JT'], ['nama_item' => 'Reguler (Full/Half)', 'nilai' => 'Rp 14JT / Rp 12JT'], ['nama_item' => 'VIP (Full/Half)', 'nilai' => 'Rp 16JT / Rp 13JT'], ['nama_item' => 'VVIP (Full/Half)', 'nilai' => 'Rp 25JT / Rp 20JT'],
            ]],
            ['nama_paket' => 'PAKET PERPISAHAN SEKOLAH', 'jenis' => 'perpisahan', 'waktu' => '08.00 - 13.30 WIB', 'items' => [
                ['nama_item' => 'Standar (200 Kursi, Blower, Sound)', 'nilai' => 'Rp 8.000.000'], ['nama_item' => 'Reguler (+ 6 AC 5PK, 300 Kursi)', 'nilai' => 'Rp 10.000.000'], ['nama_item' => 'VIP (+ 10 AC 5PK, 400 Kursi)', 'nilai' => 'Rp 11.000.000'], ['nama_item' => 'VVIP (+ 16 AC 5PK, 500 Kursi)', 'nilai' => 'Rp 17.000.000'],
            ]],
        ];

        foreach ($paketData as $urutan => $data) {
            $items = $data['items'];
            unset($data['items']);
            $paket = Paket::updateOrCreate(['jenis' => $data['jenis']], $data + ['amount' => 0, 'urutan' => $urutan, 'aktif' => true]);
            $paket->items()->delete();
            foreach ($items as $itemUrutan => $item) {
                $paket->items()->create($item + ['urutan' => $itemUrutan, 'aktif' => true]);
            }
        }
    }
}
