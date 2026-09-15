@extends('layouts.app')
@section('title', 'Tambah Paket')
@section('page-title', 'TAMBAH PAKET')
@section('sidebar-menu') @include('Admin.partials.sidebar', ['active' => 'paket']) @endsection
@section('content')
<div class="max-w-5xl bg-white rounded-2xl p-6 shadow-sm border border-slate-100"><h3 class="text-lg font-bold mb-6">Tambah Paket Baru</h3>@include('Admin.paket.form')</div>
@endsection
