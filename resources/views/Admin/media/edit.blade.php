@extends('layouts.app')
@section('title', 'Edit Gambar')
@section('page-title', 'EDIT GAMBAR')
@section('sidebar-menu') @include('Admin.partials.sidebar', ['active' => 'media']) @endsection
@section('content')<div class="max-w-3xl bg-white rounded-2xl p-6 shadow-sm border border-slate-100"><h3 class="text-lg font-bold mb-6">Edit Gambar #{{ $media->id }}</h3><img src="{{ $media->publicUrl() }}" alt="{{ $media->alt }}" class="w-full max-h-72 object-cover rounded-xl mb-6">@include('Admin.media.form')</div>@endsection
