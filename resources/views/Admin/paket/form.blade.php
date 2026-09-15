@php($editing = isset($paket))
<form action="{{ $editing ? route('admin.paket.update', $paket) : route('admin.paket.store') }}" method="POST" class="space-y-6" x-data="{ nextIndex: {{ $editing ? $paket->items->count() : 1 }} }">
    @csrf
    @if($editing) @method('PUT') @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><label class="label">Nama Paket</label><input name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket ?? '') }}" required class="input"></div>
        <div><label class="label">Jenis</label><select name="jenis" required class="input"><option value="pernikahan" @selected(old('jenis', $paket->jenis ?? '') === 'pernikahan')>Pernikahan</option><option value="seminar" @selected(old('jenis', $paket->jenis ?? '') === 'seminar')>Seminar</option><option value="perpisahan" @selected(old('jenis', $paket->jenis ?? '') === 'perpisahan')>Perpisahan</option><option value="lainnya" @selected(old('jenis', $paket->jenis ?? '') === 'lainnya')>Lainnya</option></select></div>
        <div><label class="label">Waktu</label><input name="waktu" value="{{ old('waktu', $paket->waktu ?? '') }}" class="input"></div>
        <div><label class="label">Urutan</label><input type="number" min="0" name="urutan" value="{{ old('urutan', $paket->urutan ?? 0) }}" required class="input"></div>
        <div class="md:col-span-2"><label class="label">Catatan</label><textarea name="catatan" rows="2" class="input">{{ old('catatan', $paket->catatan ?? '') }}</textarea></div>
    </div>

    <label class="flex items-center gap-2 text-xs font-semibold text-slate-600"><input type="checkbox" name="aktif" value="1" @checked(old('aktif', $paket->aktif ?? true))> Tampilkan paket di halaman depan</label>

    <div>
        <div class="flex items-center justify-between mb-3"><div><h3 class="font-bold text-slate-800">Item Paket</h3><p class="text-xs text-slate-500">Untuk pernikahan, isi Tipe dengan nama kolom seperti Standar, VIP, dan VVIP.</p></div><button type="button" @click="$refs.items.insertAdjacentHTML('beforeend', $refs.template.innerHTML.replaceAll('__INDEX__', nextIndex++))" class="text-xs bg-slate-900 text-white px-3 py-2 rounded-lg"><i class="fa-solid fa-plus mr-1"></i> Tambah Baris</button></div>
        <div x-ref="items" class="space-y-3">
            @foreach(old('items', $paket->items ?? []) as $index => $item)
                <div class="grid grid-cols-1 md:grid-cols-12 gap-2 p-3 bg-slate-50 border border-slate-200 rounded-xl">
                    <input name="items[{{ $index }}][nama_item]" value="{{ is_array($item) ? ($item['nama_item'] ?? '') : $item->nama_item }}" placeholder="Nama item" class="input md:col-span-4" required>
                    <input name="items[{{ $index }}][tipe]" value="{{ is_array($item) ? ($item['tipe'] ?? '') : $item->tipe }}" placeholder="Tipe / kolom" class="input md:col-span-3">
                    <input name="items[{{ $index }}][nilai]" value="{{ is_array($item) ? ($item['nilai'] ?? '') : $item->nilai }}" placeholder="Nilai / harga" class="input md:col-span-4" required>
                    <input type="hidden" name="items[{{ $index }}][urutan]" value="{{ is_array($item) ? ($item['urutan'] ?? $index) : $item->urutan }}">
                    <label class="flex items-center gap-2 text-xs text-slate-600 md:col-span-1"><input type="checkbox" name="items[{{ $index }}][aktif]" value="1" @checked(is_array($item) ? ($item['aktif'] ?? true) : $item->aktif)> Aktif</label>
                </div>
            @endforeach
        </div>
    </div>

    <template x-ref="template"><div class="grid grid-cols-1 md:grid-cols-12 gap-2 p-3 bg-slate-50 border border-slate-200 rounded-xl"><input name="items[__INDEX__][nama_item]" placeholder="Nama item" class="input md:col-span-4"><input name="items[__INDEX__][tipe]" placeholder="Tipe / kolom" class="input md:col-span-3"><input name="items[__INDEX__][nilai]" placeholder="Nilai / harga" class="input md:col-span-4"><input type="hidden" name="items[__INDEX__][urutan]" value="0"><label class="flex items-center gap-2 text-xs text-slate-600 md:col-span-1"><input type="checkbox" name="items[__INDEX__][aktif]" value="1" checked> Aktif</label></div></template>

    <div class="flex gap-3"><button class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold">Simpan</button><a href="{{ route('admin.paket.index') }}" class="bg-slate-100 text-slate-600 px-5 py-2.5 rounded-xl text-sm font-bold">Batal</a></div>
</form>
