<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::with('items')->orderBy('urutan')->orderBy('id')->get();

        return view('Admin.paket.index', compact('paket'));
    }

    public function create()
    {
        return view('Admin.paket.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedPackage($request);
        $items = $data['items'] ?? [];
        unset($data['items']);

        DB::transaction(function () use ($data, $items) {
            $paket = Paket::create($data);
            $this->syncItems($paket, $items);
        });

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Paket $paket)
    {
        $paket->load('items');

        return view('Admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $data = $this->validatedPackage($request);
        $items = $data['items'] ?? [];
        unset($data['items']);

        DB::transaction(function () use ($paket, $data, $items) {
            $paket->update($data);
            $paket->items()->delete();
            $this->syncItems($paket, $items);
        });

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }

    private function validatedPackage(Request $request): array
    {
        return $request->validate([
            'nama_paket' => 'required|string|max:255',
            'jenis' => 'required|string|max:50',
            'amount' => 'nullable|numeric',
            'waktu' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
            'aktif' => 'nullable|boolean',
            'items' => 'nullable|array',
            'items.*.nama_item' => 'required_with:items.*.nilai|string|max:255',
            'items.*.tipe' => 'nullable|string|max:100',
            'items.*.nilai' => 'required_with:items.*.nama_item|string',
            'items.*.urutan' => 'nullable|integer|min:0',
            'items.*.aktif' => 'nullable|boolean',
        ]) + ['aktif' => $request->boolean('aktif')];
    }

    private function syncItems(Paket $paket, array $items): void
    {
        foreach ($items as $item) {
            if (blank($item['nama_item'] ?? null) || blank($item['nilai'] ?? null)) {
                continue;
            }

            $paket->items()->create([
                'nama_item' => $item['nama_item'],
                'tipe' => $item['tipe'] ?? null,
                'nilai' => $item['nilai'],
                'urutan' => $item['urutan'] ?? 0,
                'aktif' => isset($item['aktif']) && (bool) $item['aktif'],
            ]);
        }
    }
}
