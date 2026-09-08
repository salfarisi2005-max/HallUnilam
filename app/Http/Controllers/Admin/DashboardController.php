<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Konten;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFasilitas = Fasilitas::count();
        $totalKonten = Konten::count();

        return view('Admin.dashboard', compact('totalFasilitas', 'totalKonten'));
    }
}