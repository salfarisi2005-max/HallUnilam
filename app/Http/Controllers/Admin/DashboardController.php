<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Konten;
use App\Models\Media;
use App\Models\Paket;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFasilitas = Fasilitas::count();
        $totalKonten = Konten::where('key', 'about')->count();
        $totalPaket = Paket::count();
        $totalMedia = Media::count();

        return view('Admin.dashboard', compact('totalFasilitas', 'totalKonten', 'totalPaket', 'totalMedia'));
    }
}
