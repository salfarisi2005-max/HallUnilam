@extends('layouts.app')

@section('title', 'Edit Konten')
@section('page-title', 'EDIT KONTEN WEBSITE')

@section('sidebar-menu')
    @include('Admin.partials.sidebar', ['active' => 'konten'])
@endsection

@section('content')
    <div class="max-w-3xl bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <form action="{{ route('admin.konten.update', $konten->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Key Identifier (Read-only)</label>
                <input type="text" value="{{ $konten->key }}" disabled class="w-full px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-sm font-mono text-slate-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Judul Konten</label>
                <input type="text" name="judul" value="{{ $konten->judul }}" required class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Isi Tentang</label>
                <textarea name="konten" rows="10" required class="w-full px-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600">{{ $konten->konten }}</textarea>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm px-5 py-2.5 rounded-xl font-medium transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.konten.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm px-5 py-2.5 rounded-xl font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection