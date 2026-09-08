@extends('layouts.app')

@section('title', 'Master Fasilitas')
@section('page-title', 'KELOLA MASTER FASILITAS')

@section('sidebar-menu')
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-emerald-400 transition">
        <i class="fa-solid fa-square-poll-vertical text-lg"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm bg-emerald-600 text-white shadow-md">
        <i class="fa-solid fa-couch text-lg"></i>
        <span>Kelola Fasilitas</span>
    </a>
    <a href="{{ route('admin.konten.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-emerald-400 transition">
        <i class="fa-solid fa-layer-group text-lg"></i>
        <span>Kelola Paket & About</span>
    </a>
@endsection

@section('content')
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Daftar Sarana Satuan</h3>
                <p class="text-xs text-slate-400">Data ini akan otomatis muncul pada tampilan depan website.</p>
            </div>
            <a href="{{ route('admin.fasilitas.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm px-4 py-2.5 rounded-xl font-medium transition flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Fasilitas
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-900 text-white">
                    <tr>
                        <th class="p-4 font-semibold">No</th>
                        <th class="p-4 font-semibold">Nama Fasilitas / Sarana</th>
                        <th class="p-4 font-semibold">Harga Sewa</th>
                        <th class="p-4 font-semibold">Stok Unit</th>
                        <th class="p-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($fasilitas as $index => $item)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 font-medium text-slate-500">{{ $index + 1 }}</td>
                            <td class="p-4 font-bold text-slate-800">{{ $item->nama_fasilitas }}</td>
                            <td class="p-4 font-semibold text-emerald-600">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="p-4 text-slate-600">{{ $item->stok }} Unit</td>
                            <td class="p-4 flex justify-center gap-2">
                                <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white text-xs px-3 py-1.5 rounded-lg transition">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-500 hover:bg-rose-600 text-white text-xs px-3 py-1.5 rounded-lg transition">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-slate-400">Belum ada data fasilitas. Silakan klik tombol Tambah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection