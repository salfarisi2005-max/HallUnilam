@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'DASHBOARD UTAMA')

@section('sidebar-menu')
    <!-- Menu Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-white bg-teal-600 shadow-sm">
        <i class="fa-solid fa-gauge-high text-lg"></i>
        <span>Dashboard</span>
    </a>

    <!-- Menu Master Fasilitas -->
    <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-teal-400 transition-all duration-300">
        <i class="fa-solid fa-couch text-lg"></i>
        <span>Kelola Fasilitas</span>
    </a>

    <!-- Menu Kelola Paket & Konten -->
    <a href="{{ route('admin.konten.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-teal-400 transition-all duration-300">
        <i class="fa-solid fa-layer-group text-lg"></i>
        <span>Kelola Paket & About</span>
    </a>

    <!-- Form Logout -->
    <form action="{{ route('logout') }}" method="POST" class="mt-auto pt-6">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-rose-400 hover:bg-rose-950/30 transition-all duration-300">
            <i class="fa-solid fa-right-from-bracket text-lg"></i>
            <span>Keluar</span>
        </button>
    </form>
@endsection

@section('content')
    <!-- Banner Header Solid Teal (Tanpa Logo, Hanya Teks & Tombol) -->
    <div class="bg-teal-600 p-6 rounded-2xl text-white mb-8 flex items-center justify-between shadow-sm">
        <div>
            <h3 class="text-xl font-black leading-tight">Selamat Datang di Panel Administrator</h3>
            <p class="text-xs text-teal-100 font-medium mt-1">La Tansa Hall - Universitas La Tansa Mashiro</p>
        </div>
        <a href="{{ route('beranda') }}" target="_blank" class="hidden md:flex items-center gap-2 bg-white text-teal-700 hover:bg-teal-50 text-xs px-4 py-2.5 rounded-xl font-bold transition shadow-sm">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Halaman Utama
        </a>
    </div>

    <!-- Ringkasan Stat Card Flat White -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Fasilitas Satuan</p>
                <h3 class="text-3xl font-black text-slate-800 mt-2">{{ $totalFasilitas }} <span class="text-xs font-normal text-slate-400">Item</span></h3>
                <p class="text-[11px] text-teal-600 mt-1 font-medium"><i class="fa-solid fa-circle-check mr-1"></i>Siap Disewakan</p>
            </div>
            <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-couch"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Paket & Konten</p>
                <h3 class="text-3xl font-black text-blue-800 mt-2">{{ $totalKonten }} <span class="text-xs font-normal text-slate-400">Modul</span></h3>
                <p class="text-[11px] text-blue-600 mt-1 font-medium"><i class="fa-solid fa-circle-check mr-1"></i>Modul Dinamis Active</p>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-700 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-layer-group"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Server</p>
                <h3 class="text-2xl font-black text-emerald-600 mt-2">Aktif / Normal</h3>
                <p class="text-[11px] text-slate-400 mt-1">Sistem Siap Digunakan</p>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-server"></i>
            </div>
        </div>
    </div>

    <!-- Panel Operasional & Aksi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-between">
            <div>
                <h4 class="text-base font-extrabold text-slate-800 mb-1">Aksi Cepat Admin</h4>
                <p class="text-xs text-slate-500 mb-6">Pilih menu navigasi di bawah untuk kelola sarana atau informasi paket.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.fasilitas.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs px-5 py-2.5 rounded-xl font-bold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Tambah Fasilitas
                </a>
                <a href="{{ route('admin.konten.index') }}" class="bg-blue-800 hover:bg-blue-900 text-white text-xs px-5 py-2.5 rounded-xl font-bold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-pen-to-square"></i> Kelola Informasi Paket
                </a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-between">
            <div>
                <h4 class="text-base font-extrabold text-slate-800 mb-1">Informasi Operasional</h4>
                <p class="text-xs text-slate-500 leading-relaxed mb-4">
                    Gunakan menu **Kelola Fasilitas** untuk menyunting sarana satuan, atau menu **Kelola Paket & About** untuk mengubah paket gedung.
                </p>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Lokasi: Rangkasbitung, Banten</span>
                <span class="text-teal-600 font-bold">UNILAM Official</span>
            </div>
        </div>
    </div>
@endsection