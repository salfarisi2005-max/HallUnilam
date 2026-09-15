<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Konten;
use App\Models\Media;
use App\Models\Paket;
use App\Models\Pengaturan;

class BerandaController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $about = Konten::where('key', 'about')->first();
        $paket = Paket::with(['items' => fn ($query) => $query->where('aktif', true)])
            ->where('aktif', true)
            ->orderBy('urutan')
            ->orderBy('id')
            ->get()
            ->keyBy('jenis');
        $heroMedia = Media::where('jenis', 'hero')->where('aktif', true)->orderBy('urutan')->orderBy('id')->get();
        $galeriMedia = Media::where('jenis', 'galeri')->where('aktif', true)->orderBy('urutan')->orderBy('id')->get();
        $pengaturan = Pengaturan::pluck('value', 'key');

        return view('welcome', compact(
            'fasilitas',
            'about',
            'paket',
            'heroMedia',
            'galeriMedia',
            'pengaturan'
        ));
    }
}
