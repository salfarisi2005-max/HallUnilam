@extends('layouts.app')

@section('title', 'Tambah Fasilitas')
@section('page-title', 'TAMBAH FASILITAS BARU')

@section('sidebar-menu')
    @include('Admin.partials.sidebar', ['active' => 'fasilitas'])
@endsection

@section('content')
    <div class="max-w-2xl bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Nama Fasilitas / Sarana</label>
                <input type="text" name="nama_fasilitas" required placeholder="Contoh: Pendingin AC 5PK" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Harga Sewa (Rp)</label>
                    <input type="number" name="harga" required placeholder="1000000" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Jumlah Stok</label>
                    <input type="number" name="stok" required placeholder="10" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600">
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm px-5 py-2.5 rounded-xl font-medium transition">
                    Simpan Data
                </button>
                <a href="{{ route('admin.fasilitas.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm px-5 py-2.5 rounded-xl font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection