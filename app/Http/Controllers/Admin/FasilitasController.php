<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        return view('Admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('Admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'harga'          => 'required|numeric',
            'stok'           => 'required|integer',
        ]);

        Fasilitas::create($request->all());

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil ditambahkan');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('Admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'harga'          => 'required|numeric',
            'stok'           => 'required|integer',
        ]);

        $fasilitas->update($request->all());

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil diperbarui');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Data fasilitas berhasil dihapus');
    }
}