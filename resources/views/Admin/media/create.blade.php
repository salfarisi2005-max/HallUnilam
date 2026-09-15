@extends('layouts.app')
@section('title', 'Upload Gambar')
@section('page-title', 'UPLOAD GAMBAR')
@section('sidebar-menu') @include('Admin.partials.sidebar', ['active' => 'media']) @endsection
@section('content')<div class="max-w-3xl bg-white rounded-2xl p-6 shadow-sm border border-slate-100"><h3 class="text-lg font-bold mb-6">Tambah Gambar</h3>@include('Admin.media.form')</div>@endsection
