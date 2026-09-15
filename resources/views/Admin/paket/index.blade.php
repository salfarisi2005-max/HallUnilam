@extends('layouts.app')

@section('title', 'Kelola Paket')
@section('page-title', 'KELOLA PAKET')

@section('sidebar-menu')
    @include('Admin.partials.sidebar', ['active' => 'paket'])
@endsection

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Paket dan Item Harga</h3>
            <p class="text-xs text-slate-500 mt-1">Kelola kategori paket, varian, fasilitas, dan harga tanpa JSON.</p>
        </div>
        <a href="{{ route('admin.paket.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs px-4 py-2.5 rounded-xl font-bold transition">
            <i class="fa-solid fa-plus mr-1"></i> Tambah Paket
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs p-4 rounded-xl mb-6">{{ session('success') }}</div>
    @endif

    <div class="space-y-6">
        @forelse($paket as $item)
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-teal-100">
                <div class="flex flex-wrap gap-4 items-start justify-between border-b border-slate-100 pb-4 mb-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-extrabold text-slate-800">{{ $item->nama_paket }}</h3>
                            <span class="text-[10px] uppercase bg-teal-50 text-teal-700 px-2 py-1 rounded-full font-bold">{{ $item->jenis }}</span>
                        </div>
                        <p class="text-xs text-slate-500">{{ $item->waktu ?: 'Waktu belum diatur' }} · {{ $item->items->where('aktif', true)->count() }} item aktif</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.paket.edit', $item) }}" class="bg-amber-500 hover:bg-amber-600 text-white text-xs px-3 py-2 rounded-lg"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="{{ route('admin.paket.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus paket ini beserta semua itemnya?')">
                            @csrf @method('DELETE')
                            <button class="bg-rose-500 hover:bg-rose-600 text-white text-xs px-3 py-2 rounded-lg"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto rounded-2xl border border-teal-100">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-teal-800 text-white"><tr><th class="p-3">Nama Item</th><th class="p-3">Tipe / Kolom</th><th class="p-3">Nilai</th><th class="p-3">Status</th></tr></thead>
                        <tbody class="divide-y divide-teal-50">
                            @forelse($item->items as $detail)
                                <tr class="odd:bg-white even:bg-teal-50/40 hover:bg-teal-100/60 transition"><td class="p-3 font-semibold">{{ $detail->nama_item }}</td><td class="p-3">{{ $detail->tipe ?: '-' }}</td><td class="p-3">{{ $detail->nilai }}</td><td class="p-3">{{ $detail->aktif ? 'Aktif' : 'Nonaktif' }}</td></tr>
                            @empty
                                <tr><td colspan="4" class="p-4 text-center text-slate-400">Belum ada item paket.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl p-8 text-center text-sm text-slate-400">Belum ada paket.</div>
        @endforelse
    </div>
@endsection
