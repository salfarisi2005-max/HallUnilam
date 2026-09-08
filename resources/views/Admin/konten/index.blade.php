@extends('layouts.app')

@section('title', 'Kelola Konten & Paket')
@section('page-title', 'KELOLA PAKET & ABOUT')

@section('sidebar-menu')
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-emerald-400 transition">
        <i class="fa-solid fa-square-poll-vertical text-lg"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-emerald-400 transition">
        <i class="fa-solid fa-couch text-lg"></i>
        <span>Kelola Fasilitas</span>
    </a>
    <a href="{{ route('admin.konten.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm bg-emerald-600 text-white shadow-md">
        <i class="fa-solid fa-layer-group text-lg"></i>
        <span>Kelola Paket & About</span>
    </a>
@endsection

@section('content')
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <h3 class="text-lg font-bold text-slate-800 mb-1">Daftar Konten Dinamis Website</h3>
        <p class="text-xs text-slate-400 mb-6">Kelola teks About dan struktur JSON untuk Paket Pernikahan, Seminar, serta Perpisahan.</p>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-900 text-white">
                    <tr>
                        <th class="p-4 font-semibold">Key Identifier</th>
                        <th class="p-4 font-semibold">Judul Konten / Paket</th>
                        <th class="p-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($konten as $item)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 font-mono text-xs text-emerald-600 font-bold">{{ $item->key }}</td>
                            <td class="p-4 font-bold text-slate-800">{{ $item->judul }}</td>
                            <td class="p-4 text-center">
                                <a href="{{ route('admin.konten.edit', $item->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white text-xs px-4 py-2 rounded-lg transition">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit Konten
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection