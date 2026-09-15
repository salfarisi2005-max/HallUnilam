@extends('layouts.app')

@section('title', 'Kelola Konten & Paket')
@section('page-title', 'KELOLA PAKET & ABOUT')

@section('sidebar-menu')
    @include('Admin.partials.sidebar', ['active' => 'konten'])
@endsection

@section('content')
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-teal-100">
        <h3 class="text-lg font-bold text-slate-800 mb-1">Daftar Konten Dinamis Website</h3>
        <p class="text-xs text-slate-400 mb-6">Kelola teks About yang tampil di halaman depan. Paket dikelola melalui menu Kelola Paket.</p>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-2xl border border-teal-100 shadow-sm">
            <table class="w-full text-left text-sm">
            <thead class="bg-teal-800 text-white">
                    <tr>
                        <th class="p-4 font-semibold">Key Identifier</th>
                        <th class="p-4 font-semibold">Judul Konten / Paket</th>
                        <th class="p-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-50">
                    @foreach($konten as $item)
                        <tr class="odd:bg-white even:bg-teal-50/40 hover:bg-teal-100/60 transition">
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