@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'DASHBOARD UTAMA')

@section('sidebar-menu')
    @include('Admin.partials.sidebar', ['active' => 'dashboard'])
@endsection

@section('content')
    <!-- Banner Header Solid Teal (Tanpa Logo, Hanya Teks & Tombol) -->
    <div class="bg-teal-600 p-7 rounded-3xl text-white mb-8 flex items-center justify-between shadow-xl shadow-teal-900/20">
        <div>
            <p class="inline-block bg-teal-800 text-white text-base md:text-lg font-black uppercase tracking-wide px-4 py-2 rounded-xl mb-3 shadow-sm">RUANG KENDALI ADMINISTRATOR HALL UNILAM</p>
            <h3 class="text-2xl md:text-3xl font-black leading-tight text-white drop-shadow-sm">Selamat Datang di Panel Administrator</h3>
            <p class="text-sm text-white/90 font-semibold mt-2">La Tansa Hall - Universitas La Tansa Mashiro</p>
        </div>
        <a href="{{ route('beranda') }}" target="_blank" class="hidden md:flex items-center gap-2 bg-white text-teal-700 hover:bg-teal-100 text-xs px-4 py-2.5 rounded-xl font-bold transition shadow-sm">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Halaman Utama
        </a>
    </div>

    <!-- Ringkasan Stat Card Flat White -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-teal-100 flex items-center justify-between hover:border-teal-300 hover:shadow-lg hover:shadow-teal-900/5 transition">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Fasilitas Satuan</p>
                <h3 class="text-3xl font-black text-slate-800 mt-2">{{ $totalFasilitas }} <span class="text-xs font-normal text-slate-400">Item</span></h3>
                <p class="text-[11px] text-teal-600 mt-1 font-medium"><i class="fa-solid fa-circle-check mr-1"></i>Siap Disewakan</p>
            </div>
            <div class="w-12 h-12 bg-teal-100 text-teal-700 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-couch"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-teal-100 flex items-center justify-between hover:border-teal-300 hover:shadow-lg hover:shadow-teal-900/5 transition">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Paket & Konten</p>
                <h3 class="text-3xl font-black text-teal-800 mt-2">{{ $totalKonten }} <span class="text-xs font-normal text-slate-400">Modul</span></h3>
                <p class="text-[11px] text-teal-600 mt-1 font-medium"><i class="fa-solid fa-circle-check mr-1"></i>Modul Dinamis Aktif</p>
            </div>
            <div class="w-12 h-12 bg-teal-100 text-teal-700 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-layer-group"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-teal-100 flex items-center justify-between hover:border-teal-300 hover:shadow-lg hover:shadow-teal-900/5 transition">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Server</p>
                <h3 class="text-2xl font-black text-emerald-600 mt-2">Aktif / Normal</h3>
                <p class="text-[11px] text-slate-400 mt-1">Sistem Siap Digunakan</p>
            </div>
            <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-server"></i>
            </div>
        </div>
    </div>

    <!-- Panel Operasional & Aksi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-teal-100 flex flex-col justify-between hover:border-teal-300 hover:shadow-lg hover:shadow-teal-900/5 transition">
            <div>
                <h4 class="text-base font-extrabold text-slate-800 mb-1">Aksi Cepat Admin</h4>
                <p class="text-xs text-slate-500 mb-6">Pilih menu navigasi di bawah untuk kelola sarana atau informasi paket.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.fasilitas.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs px-5 py-2.5 rounded-xl font-bold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Tambah Fasilitas
                </a>
                <a href="{{ route('admin.paket.index') }}" class="bg-teal-700 hover:bg-teal-800 text-white text-xs px-5 py-2.5 rounded-xl font-bold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-pen-to-square"></i> Kelola Informasi Paket
                </a>
                <a href="{{ route('admin.media.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-5 py-2.5 rounded-xl font-bold transition flex items-center gap-2 shadow-sm"><i class="fa-solid fa-images"></i> Kelola Gambar</a>
            </div>
        </div>

        <div class="bg-teal-50/80 p-6 rounded-2xl shadow-sm border border-teal-200 flex flex-col justify-between hover:border-teal-300 hover:shadow-lg hover:shadow-teal-900/5 transition">
            <div>
                <h4 class="text-base font-extrabold text-slate-800 mb-1">Informasi Operasional</h4>
                <p class="text-xs text-slate-500 leading-relaxed mb-4">
                    Gunakan menu **Kelola Fasilitas** untuk menyunting sarana satuan, atau menu **Kelola Paket & About** untuk mengubah paket gedung.
                </p>
            </div>

            <div class="pt-4 border-t border-teal-200 flex items-center justify-between text-xs text-slate-500">
                <span>Lokasi: Rangkasbitung, Banten</span>
                <span class="text-teal-600 font-bold">UNILAM Official</span>
            </div>
        </div>
    </div>
@endsection