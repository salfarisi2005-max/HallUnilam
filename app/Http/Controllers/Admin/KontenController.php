<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function index()
    {
        $konten = Konten::latest()->get();
        return view('Admin.konten.index', compact('konten'));
    }

    public function edit(Konten $konten)
    {
        return view('Admin.konten.edit', compact('konten'));
    }

    public function update(Request $request, Konten $konten)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
        ]);

        $konten->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        return redirect()->route('admin.konten.index')->with('success', 'Konten berhasil diperbarui');
    }
}