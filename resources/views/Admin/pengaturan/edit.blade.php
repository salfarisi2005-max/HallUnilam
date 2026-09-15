@extends('layouts.app')
@section('title', 'Pengaturan Situs')
@section('page-title', 'PENGATURAN SITUS')
@section('sidebar-menu') @include('Admin.partials.sidebar', ['active' => 'pengaturan']) @endsection
@section('content')
<div class="max-w-5xl bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-teal-100">
	<div class="flex items-start gap-4 mb-6">
		<div class="w-11 h-11 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center text-lg shrink-0"><i class="fa-solid fa-sliders"></i></div>
		<div>
			<h3 class="text-lg font-black text-teal-950">Teks, Kontak & Sosial Media</h3>
			<p class="text-xs text-slate-500 mt-1">Semua nilai di sini langsung digunakan oleh halaman depan.</p>
		</div>
	</div>

	@if(session('success'))
		<div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs p-4 rounded-xl mb-6">{{ session('success') }}</div>
	@endif

	<form action="{{ route('admin.pengaturan.update') }}" method="POST" class="space-y-7">
		@csrf
		@method('PUT')

		@foreach($fields as $key => $label)
			<div>
				<label class="block text-xs font-bold text-teal-950 mb-1.5">{{ $label }}</label>
				@if(str_contains($key, 'deskripsi') || str_contains($key, 'pesan'))
					<textarea name="{{ $key }}" rows="3" class="w-full px-4 py-2.5 border border-teal-100 bg-teal-50/30 rounded-xl text-sm text-slate-700 outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100 transition">{{ old($key, $settings[$key] ?? '') }}</textarea>
				@else
					<input name="{{ $key }}" value="{{ old($key, $settings[$key] ?? '') }}" class="w-full px-4 py-2.5 border border-teal-100 bg-teal-50/30 rounded-xl text-sm text-slate-700 outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100 transition">
				@endif
			</div>
		@endforeach

		<div class="flex gap-3 pt-2">
			<button class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-sm transition"><i class="fa-solid fa-floppy-disk mr-1"></i> Simpan Pengaturan</button>
		</div>
	</form>
</div>
@endsection
