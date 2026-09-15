<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\Konten;
use App\Models\Media;
use App\Models\Paket;
use App\Models\Pengaturan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed User Admin (Sesuai Kode Kamu)
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Seed Master Fasilitas Satuan
        $fasilitasData = [
            ['nama_fasilitas' => 'Gedung Utama (Hall)', 'harga' => 15000000, 'stok' => 1],
            ['nama_fasilitas' => 'Kursi Futura + Cover', 'harga' => 15000, 'stok' => 500],
            ['nama_fasilitas' => 'Sound System & Microphone', 'harga' => 2500000, 'stok' => 2],
            ['nama_fasilitas' => 'AC Portable 5 PK', 'harga' => 750000, 'stok' => 6],
            ['nama_fasilitas' => 'Projector & Screen', 'harga' => 1000000, 'stok' => 3],
            ['nama_fasilitas' => 'Panggung Ukuran Standard', 'harga' => 2000000, 'stok' => 1],
            ['nama_fasilitas' => 'Lampu Lighting Stage', 'harga' => 1500000, 'stok' => 2],
        ];

        foreach ($fasilitasData as $data) {
            Fasilitas::create($data);
        }

        // 3. Seed About Profil
        Konten::create([
            'key' => 'about',
            'judul' => 'Tentang La Tansa Hall',
            'konten' => 'La Tansa Hall hadir di kota Rangkasbitung dengan menawarkan fasilitas untuk acara-acara seperti pernikahan, seminar, konser musik, family gathering, perpisahan sekolah, bulu tangkis, dan outbound. Didukung oleh fasilitas mumpuni dengan kapasitas gedung hingga 1.500 orang (dengan tempat duduk) atau 3.000 orang (tanpa tempat duduk).',
        ]);

        // 4. Seed paket dalam bentuk record biasa, bukan JSON.
        $paketData = [
            ['nama_paket' => 'Paket Pernikahan Hall Unilam', 'jenis' => 'pernikahan', 'waktu' => '08.00 - 14.30 WIB', 'catatan' => null, 'items' => [
                ['nama_item' => 'Kapasitas Tamu', 'tipe' => 'Standar', 'nilai' => '300 Pax'],
                ['nama_item' => 'Kapasitas Tamu', 'tipe' => 'Semi', 'nilai' => '500 Pax'],
                ['nama_item' => 'Kapasitas Tamu', 'tipe' => 'Reguler', 'nilai' => '700 Pax'],
                ['nama_item' => 'Kapasitas Tamu', 'tipe' => 'VIP', 'nilai' => '1000 Pax'],
                ['nama_item' => 'Kapasitas Tamu', 'tipe' => 'VVIP', 'nilai' => '1500 Pax'],
                ['nama_item' => 'Harga Paket', 'tipe' => 'Standar', 'nilai' => 'Rp 25.000.000'],
                ['nama_item' => 'Harga Paket', 'tipe' => 'Semi', 'nilai' => 'Rp 35.000.000'],
                ['nama_item' => 'Harga Paket', 'tipe' => 'Reguler', 'nilai' => 'Rp 45.000.000'],
                ['nama_item' => 'Harga Paket', 'tipe' => 'VIP', 'nilai' => 'Rp 60.000.000'],
                ['nama_item' => 'Harga Paket', 'tipe' => 'VVIP', 'nilai' => 'Rp 75.000.000'],
            ]],
            ['nama_paket' => 'Paket Seminar', 'jenis' => 'seminar', 'waktu' => '08.00 - 15.30 WIB / 08.00 - 12.00 WIB / 13.00 - 17.00 WIB', 'catatan' => 'Semua paket seminar sudah termasuk Projector, Screen, Sound System, dan 100 Kursi Futura.', 'items' => [
                ['nama_item' => 'Full Day (08.00 - 15.30 WIB)', 'nilai' => 'Rp 7.500.000'],
                ['nama_item' => 'Half Day (08.00 - 12.00 WIB)', 'nilai' => 'Rp 4.500.000'],
                ['nama_item' => 'Half Day (13.00 - 17.00 WIB)', 'nilai' => 'Rp 4.500.000'],
            ]],
            ['nama_paket' => 'Paket Perpisahan Sekolah', 'jenis' => 'perpisahan', 'waktu' => '08.00 - 13.30 WIB', 'catatan' => null, 'items' => [
                ['nama_item' => 'Paket Perpisahan SMA / Sederajat', 'nilai' => 'Rp 10.000.000'],
                ['nama_item' => 'Paket Perpisahan SMP / SD / TK', 'nilai' => 'Rp 8.000.000'],
            ]],
        ];

        foreach ($paketData as $urutan => $data) {
            $items = $data['items'];
            unset($data['items']);
            $paket = Paket::create($data + ['amount' => 0, 'urutan' => $urutan, 'aktif' => true]);
            foreach ($items as $itemUrutan => $item) {
                $paket->items()->create($item + ['urutan' => $itemUrutan, 'aktif' => true]);
            }
        }

        // 5. Seed media awal dan pengaturan yang dapat diedit di dashboard.
        foreach ([
            ['BagianDalamHall.jpeg', 'Interior Utama Hall'], ['dalamBagianDepanHall.jpeg', 'Panggung Hall'], ['halamanDepanHall.jpeg', 'Halaman Depan Hall'],
            ['halamanLuarHall.jpeg', 'Halaman Luar Hall'], ['halamanSampingHall.jpeg', 'Halaman Samping Hall'], ['halamanBelakangHall.jpeg', 'Halaman Belakang Hall'],
        ] as $urutan => [$path, $judul]) {
            Media::firstOrCreate(['jenis' => 'hero', 'path' => 'images/'.$path], ['judul' => $judul, 'alt' => $judul, 'urutan' => $urutan, 'aktif' => true]);
        }

        foreach ([['halamanDepanHall.jpeg', 'Foyer & Pintu Utama'], ['BagianDalamHall.jpeg', 'Interior Utama Hall'], ['dalamBagianDepanHall.jpeg', 'Panggung & Karpet Merah']] as $urutan => [$path, $caption]) {
            Media::firstOrCreate(['jenis' => 'galeri', 'path' => 'images/'.$path], ['judul' => $caption, 'caption' => $caption, 'alt' => $caption, 'urutan' => $urutan, 'aktif' => true]);
        }

        foreach ([
            'hero_lokasi' => 'Rangkasbitung, Banten',
            'hero_deskripsi' => 'Panggung serbaguna dengan kapasitas 1.500-2.500 untuk Pernikahan, Seminar, Konser, Gathering, dan Perpisahan Sekolah.',
            'hero_tombol' => 'Lihat Katalog Paket Pricing',
            'whatsapp_nomor' => '6281234567890',
            'whatsapp_nama' => 'Bu Euis (WhatsApp Official)',
            'whatsapp_pesan' => 'Halo Bu Euis, saya ingin sewa La Tansa Hall Unilam',
            'instagram_hall' => 'https://www.instagram.com/latansa_hall?igsh=M3N4cXpjMjQwMnl1',
            'instagram_unilam' => 'https://www.instagram.com/unilam.official?igsh=eHhseWMzZjVibTFu',
            'facebook_url' => '',
            'tiktok_url' => '',
            'youtube_url' => '',
        ] as $key => $value) {
            Pengaturan::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
