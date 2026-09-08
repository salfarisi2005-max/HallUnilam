<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Konten;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        
        // Ambil konten dinamis
        $about = Konten::where('key', 'about')->first();
        $paketPernikahan = Konten::where('key', 'paket_pernikahan')->first();
        $paketSeminar = Konten::where('key', 'paket_seminar')->first();
        $paketPerpisahan = Konten::where('key', 'paket_perpisahan')->first();

        return view('welcome', compact(
            'fasilitas',
            'about',
            'paketPernikahan',
            'paketSeminar',
            'paketPerpisahan'
        ));
    }
}