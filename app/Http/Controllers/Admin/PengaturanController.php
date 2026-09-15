<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    private array $fields = [
        'brand_nama' => 'Nama Brand',
        'brand_subtitle' => 'Subjudul Brand',
        'hero_lokasi' => 'Lokasi Hero',
        'hero_judul' => 'Judul Hero',
        'hero_deskripsi' => 'Deskripsi Hero',
        'hero_tombol' => 'Teks Tombol Hero',
        'galeri_judul' => 'Judul Galeri',
        'galeri_deskripsi' => 'Deskripsi Galeri',
        'kontak_judul' => 'Judul Kontak',
        'kontak_deskripsi' => 'Deskripsi Kontak',
        'whatsapp_nomor' => 'Nomor WhatsApp',
        'whatsapp_nama' => 'Nama Penanggung Jawab',
        'whatsapp_pesan' => 'Pesan WhatsApp',
        'instagram_hall' => 'Instagram Hall',
        'instagram_unilam' => 'Instagram UNILAM',
        'facebook_url' => 'Facebook',
        'tiktok_url' => 'TikTok',
        'youtube_url' => 'YouTube',
        'footer_teks' => 'Teks Footer',
    ];

    public function edit()
    {
        $settings = Pengaturan::whereIn('key', array_keys($this->fields))->pluck('value', 'key');

        return view('Admin.pengaturan.edit', ['fields' => $this->fields, 'settings' => $settings]);
    }

    public function update(Request $request)
    {
        $rules = [];
        foreach (array_keys($this->fields) as $key) {
            $rules[$key] = 'nullable|string|max:2000';
        }

        $data = $request->validate($rules);
        foreach ($this->fields as $key => $label) {
            Pengaturan::updateOrCreate(['key' => $key], ['value' => $data[$key] ?? '']);
        }

        return redirect()->route('admin.pengaturan.edit')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
