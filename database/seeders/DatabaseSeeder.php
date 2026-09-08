<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fasilitas;
use App\Models\Konten;
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
            'password' => bcrypt('password')
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

        // 3. Seed Konten Dinamis (About & Paket Pricing)
        
        // A. About Profil
        Konten::create([
            'key' => 'about',
            'judul' => 'Tentang La Tansa Hall',
            'konten' => 'La Tansa Hall hadir di kota Rangkasbitung dengan menawarkan fasilitas untuk acara-acara seperti pernikahan, seminar, konser musik, family gathering, perpisahan sekolah, bulu tangkis, dan outbound. Didukung oleh fasilitas mumpuni dengan kapasitas gedung hingga 1.500 orang (dengan tempat duduk) atau 3.000 orang (tanpa tempat duduk).'
        ]);

        // B. Paket Pernikahan (JSON)
        $paketPernikahan = [
            'judul' => 'PAKET PERNIKAHAN (08.00 - 14.30 WIB)',
            'headers' => ['Standar', 'Semi', 'Reguler', 'VIP', 'VVIP'],
            'rows' => [
                [
                    'fasilitas' => 'Kapasitas Tamu',
                    'standar' => '300 Pax',
                    'semi' => '500 Pax',
                    'reguler' => '700 Pax',
                    'vip' => '1000 Pax',
                    'vvip' => '1500 Pax'
                ],
                [
                    'fasilitas' => 'Sewa Gedung & AC',
                    'standar' => '✓',
                    'semi' => '✓',
                    'reguler' => '✓',
                    'vip' => '✓',
                    'vvip' => '✓'
                ],
                [
                    'fasilitas' => 'Kursi Futura & Cover',
                    'standar' => '100 Unit',
                    'semi' => '200 Unit',
                    'reguler' => '300 Unit',
                    'vip' => '400 Unit',
                    'vvip' => '500 Unit'
                ],
                [
                    'fasilitas' => 'Harga Paket',
                    'standar' => 'Rp 25.000.000',
                    'semi' => 'Rp 35.000.000',
                    'reguler' => 'Rp 45.000.000',
                    'vip' => 'Rp 60.000.000',
                    'vvip' => 'Rp 75.000.000'
                ]
            ]
        ];

        Konten::create([
            'key' => 'paket_pernikahan',
            'judul' => 'Paket Pernikahan Hall Unilam',
            'konten' => json_encode($paketPernikahan, JSON_PRETTY_PRINT)
        ]);

        // C. Paket Seminar (JSON)
        $paketSeminar = [
            'items' => [
                ['tipe' => 'Full Day (08.00 - 15.30 WIB)', 'harga' => 'Rp 7.500.000'],
                ['tipe' => 'Half Day (08.00 - 12.00 WIB)', 'harga' => 'Rp 4.500.000'],
                ['tipe' => 'Half Day (13.00 - 17.00 WIB)', 'harga' => 'Rp 4.500.000']
            ],
            'catatan' => 'Semua paket seminar sudah termasuk Projector, Screen, Sound System, dan 100 Kursi Futura.'
        ];

        Konten::create([
            'key' => 'paket_seminar',
            'judul' => 'Paket Seminar',
            'konten' => json_encode($paketSeminar, JSON_PRETTY_PRINT)
        ]);

        // D. Paket Perpisahan Sekolah (JSON)
        $paketPerpisahan = [
            'waktu' => '08.00 - 13.30 WIB',
            'items' => [
                ['tipe' => 'Paket Perpisahan SMA / Sederajat', 'harga' => 'Rp 10.000.000'],
                ['tipe' => 'Paket Perpisahan SMP / SD / TK', 'harga' => 'Rp 8.000.000']
            ]
        ];

        Konten::create([
            'key' => 'paket_perpisahan',
            'judul' => 'Paket Perpisahan Sekolah',
            'konten' => json_encode($paketPerpisahan, JSON_PRETTY_PRINT)
        ]);
    }
}