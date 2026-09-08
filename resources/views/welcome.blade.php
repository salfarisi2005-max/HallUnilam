<?php
    $jsonPernikahan = isset($paketPernikahan) ? json_decode($paketPernikahan->konten, true) : null;
    $jsonSeminar = isset($paketSeminar) ? json_decode($paketSeminar->konten, true) : null;
    $jsonPerpisahan = isset($paketPerpisahan) ? json_decode($paketPerpisahan->konten, true) : null;
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tansa Hall Unilam - Universitas La Tansa Mashiro</title>
    
    <!-- Favicon Logo -->
    <link rel="icon" href="{{ asset('images/logo-HallUnilam.png') }}" type="image/png">
    
    <!-- Tailwind CSS, FontAwesome & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-emerald-600 selection:text-white">

    <!-- Header Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            
            <!-- Logo & Brand Header -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-white p-1 rounded-xl border border-emerald-500/30 shadow-sm flex items-center justify-center">
                    <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo Hall Unilam" class="w-full h-full object-contain">
                </div>
                <div>
                    <span class="font-black text-base md:text-lg tracking-wider text-slate-900 block leading-none">LA TANSA HALL</span>
                    <span class="text-[10px] text-emerald-600 font-bold tracking-widest uppercase">UNIVERSITAS LA TANSA MASHIRO</span>
                </div>
            </a>
            
            <!-- Navigation Links -->
            <nav class="hidden md:flex gap-8 text-xs font-bold text-slate-600">
                <a href="#hero" class="hover:text-emerald-600 transition-colors">Beranda</a>
                <a href="#about" class="hover:text-emerald-600 transition-colors">Tentang</a>
                <a href="#paket" class="text-emerald-600 underline underline-offset-8 decoration-2 font-extrabold">Daftar Harga & Paket</a>
                <a href="#kontak" class="hover:text-emerald-600 transition-colors">Kontak & Reservasi</a>
            </nav>

            <!-- Reservasi Now / Admin Link -->
            <div class="flex items-center gap-3">
                <a href="https://wa.me/6281234567890?text=Halo%20Bu%20Euis,%20saya%20ingin%20reservasi%20La%20Tansa%20Hall%20Unilam" 
                   target="_blank" 
                   class="bg-blue-800 hover:bg-blue-900 text-white text-xs px-5 py-2.5 rounded-full font-bold transition shadow-md shadow-blue-800/20 flex items-center gap-2">
                    <i class="fa-solid fa-calendar-check text-xs"></i> Reservasi Now
                </a>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-4 py-2.5 rounded-full font-bold transition shadow-md shadow-emerald-600/20">
                        <i class="fa-solid fa-gauge"></i> Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-300 text-xs px-4 py-2.5 rounded-full font-bold transition">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section Carousel Autoplay -->
    <section id="hero" class="relative pt-28 pb-16 px-6 bg-slate-900 overflow-hidden min-h-[60vh] flex items-center justify-center"
             x-data="{ 
                 activeSlide: 0, 
                 images: [
                     '{{ asset('images/BagianDalamHall.jpeg') }}',
                     '{{ asset('images/dalamBagianDepanHall.jpeg') }}',
                     '{{ asset('images/halamanDepanHall.jpeg') }}',
                     '{{ asset('images/halamanLuarHall.jpeg') }}',
                     '{{ asset('images/halamanSampingHall.jpeg') }}',
                     '{{ asset('images/halamanBelakangHall.jpeg') }}'
                 ],
                 init() {
                     setInterval(() => {
                         this.activeSlide = (this.activeSlide + 1) % this.images.length;
                     }, 4000);
                 }
             }">
        
        <!-- Background Slider Crossfade -->
        <template x-for="(img, index) in images" :key="index">
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out bg-cover bg-center"
                 :class="activeSlide === index ? 'opacity-40 scale-105' : 'opacity-0 scale-100'"
                 :style="`background-image: url('${img}');`">
            </div>
        </template>
        
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-900/60 to-slate-900"></div>

        <div class="relative z-10 text-center max-w-4xl mx-auto">
            <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest bg-emerald-950/80 border border-emerald-500/40 px-4 py-1.5 rounded-full inline-block mb-4 shadow-md">
                Rangkasbitung, Banten
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-white leading-tight mb-4">
                La Tansa Hall Universitas La Tansa Mashiro
            </h1>
            <p class="text-slate-300 text-sm md:text-base mb-8 max-w-2xl mx-auto leading-relaxed">
                Panggung serbaguna dengan kapasitas 1.500-2.500 untuk Pernikahan, Seminar, Konser, Gathering, dan Perpisahan Sekolah.
            </p>
            <a href="#paket" class="bg-emerald-600 hover:bg-emerald-500 text-white text-xs px-6 py-3 rounded-full font-bold transition shadow-lg shadow-emerald-600/30">
                Lihat Katalog Paket Pricing
            </a>
        </div>
    </section>

    <!-- Section About Dinamis -->
    <section id="about" class="py-16 bg-white border-b border-slate-200 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="bg-slate-50 p-8 md:p-10 rounded-3xl border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-black text-slate-900 mb-4 flex items-center gap-3">
                    <i class="fa-solid fa-building-user text-emerald-600"></i>
                    {{ $about->judul ?? 'Tentang La Tansa Hall' }}
                </h2>
                <p class="text-slate-700 leading-relaxed text-sm md:text-base">
                    {{ $about->konten ?? 'La Tansa Hall hadir di Rangkasbitung dengan fasilitas serbaguna untuk berbagai jenis acara.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Area: Paket Pricing & Tabel Dinamis -->
    <main id="paket" class="py-16 px-4 md:px-8 max-w-7xl mx-auto space-y-12">
        
        <!-- I. PAKET PERNIKAHAN (Dinamis dari DB JSON) -->
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-md border border-slate-200">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-amber-500 text-white font-bold rounded-lg flex items-center justify-center text-sm shadow">
                    I
                </div>
                <div>
                    <h2 class="text-xl font-black text-slate-900 uppercase tracking-tight">
                        {{ $jsonPernikahan['judul'] ?? 'PAKET PERNIKAHAN (08.00 - 14.30 WIB)' }}
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">Berlaku Januari - Desember {{ date('Y') }}</p>
                </div>
            </div>

            <!-- Tabel Matriks Pernikahan -->
            <div class="overflow-x-auto rounded-2xl border border-slate-200 shadow-sm">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-900 text-white">
                        <tr>
                            <th class="p-4 font-bold uppercase text-slate-300 w-1/4">Fasilitas / Uraian</th>
                            @if(isset($jsonPernikahan['headers']))
                                @foreach($jsonPernikahan['headers'] as $header)
                                    <th class="p-4 text-center font-bold">{{ $header }}</th>
                                @endforeach
                            @else
                                <th class="p-4 text-center font-bold">Standar <br><span class="text-amber-400 font-extrabold text-[11px]">Rp 11.000.000</span></th>
                                <th class="p-4 text-center font-bold">Semi Reguler <br><span class="text-amber-400 font-extrabold text-[11px]">Rp 14.000.000</span></th>
                                <th class="p-4 text-center font-bold">Reguler <br><span class="text-amber-400 font-extrabold text-[11px]">Rp 16.000.000</span></th>
                                <th class="p-4 text-center font-bold">VIP <br><span class="text-amber-400 font-extrabold text-[11px]">Rp 17.000.000</span></th>
                                <th class="p-4 text-center font-bold">VVIP <br><span class="text-amber-400 font-extrabold text-[11px]">Rp 25.000.000</span></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                        @if(isset($jsonPernikahan['rows']))
                            @foreach($jsonPernikahan['rows'] as $row)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="p-4 font-bold text-slate-900">{{ $row['fasilitas'] }}</td>
                                    <td class="p-4 text-center">{{ $row['standar'] }}</td>
                                    <td class="p-4 text-center">{{ $row['semi'] ?? $row['semi_reguler'] }}</td>
                                    <td class="p-4 text-center">{{ $row['reguler'] }}</td>
                                    <td class="p-4 text-center">{{ $row['vip'] }}</td>
                                    <td class="p-4 text-center">{{ $row['vvip'] }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-4 font-bold text-slate-900">Gedung Utama</td>
                                <td class="p-4 text-center">1 unit</td><td class="p-4 text-center">1 unit</td><td class="p-4 text-center">1 unit</td><td class="p-4 text-center">1 unit</td><td class="p-4 text-center">1 unit</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-4 font-bold text-slate-900">Kursi + Cover</td>
                                <td class="p-4 text-center">100 unit</td><td class="p-4 text-center">200 unit</td><td class="p-4 text-center">300 unit</td><td class="p-4 text-center">400 unit</td><td class="p-4 text-center">500 unit</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- II & III. PAKET SEMINAR & PERPISAHAN SEKOLAH (Dinamis DB JSON) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- II. PAKET SEMINAR -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-md border border-slate-200 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-blue-800 text-white font-bold rounded-lg flex items-center justify-center text-sm shadow">
                            II
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-slate-900 uppercase">
                                {{ $paketSeminar->judul ?? 'PAKET SEMINAR' }}
                            </h3>
                            <p class="text-[11px] text-slate-500 font-medium">A. Full Day (08.00-15.30) | B. Half Day (08.00-12.00 / 13.00-17.00)</p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-slate-100 text-xs">
                        @if(isset($jsonSeminar['items']))
                            @foreach($jsonSeminar['items'] as $item)
                                <div class="flex justify-between items-center py-1 border-b border-slate-50">
                                    <span class="font-bold text-slate-700">{{ $item['tipe'] }}:</span>
                                    <span class="font-extrabold text-slate-900">{{ $item['harga'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="flex justify-between items-center py-1 border-b border-slate-50">
                                <span class="font-bold text-slate-700">Full Day (08.00 - 15.30 WIB):</span>
                                <span class="font-extrabold text-slate-900">Rp 7.500.000</span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-slate-50">
                                <span class="font-bold text-slate-700">Half Day (08.00 - 12.00 WIB):</span>
                                <span class="font-extrabold text-slate-900">Rp 4.500.000</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6 p-3 bg-amber-50 rounded-xl border border-amber-200 text-[11px] text-amber-900 flex items-center gap-2">
                    <i class="fa-solid fa-circle-info text-amber-600"></i>
                    <span>{{ $jsonSeminar['catatan'] ?? 'Semua paket seminar sudah termasuk Projector & Screen 1 paket.' }}</span>
                </div>
            </div>

            <!-- III. PAKET PERPISAHAN SEKOLAH -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-md border border-slate-200 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-emerald-600 text-white font-bold rounded-lg flex items-center justify-center text-sm shadow">
                            III
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-slate-900 uppercase">
                                {{ $paketPerpisahan->judul ?? 'PAKET PERPISAHAN SEKOLAH' }}
                            </h3>
                            <p class="text-[11px] text-slate-500 font-medium">Waktu Acara: {{ $jsonPerpisahan['waktu'] ?? '08.00 - 13.30 WIB' }}</p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-slate-100 text-xs">
                        @if(isset($jsonPerpisahan['items']))
                            @foreach($jsonPerpisahan['items'] as $item)
                                <div class="flex justify-between items-center py-1 border-b border-slate-50">
                                    <span class="font-bold text-slate-700">{{ $item['tipe'] }}:</span>
                                    <span class="font-extrabold text-slate-900">{{ $item['harga'] }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="flex justify-between items-center py-1 border-b border-slate-50">
                                <span class="font-bold text-slate-700">Paket Perpisahan SMA / Sederajat:</span>
                                <span class="font-extrabold text-slate-900">Rp 10.000.000</span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-slate-50">
                                <span class="font-bold text-slate-700">Paket Perpisahan SMP / SD / TK:</span>
                                <span class="font-extrabold text-slate-900">Rp 8.000.000</span>
                            </div>
                        @endif
                    </div>
                </div>

                <a href="https://wa.me/6281234567890?text=Halo%20Bu%20Euis,%20saya%20inbound%20sewa%20Paket%20Perpisahan" target="_blank" class="mt-6 w-full text-center py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow">
                    Pesan Paket Perpisahan
                </a>
            </div>

        </div>

        <!-- IV. SEWA SARANA & PERALATAN SATUAN (Dinamis dari DB Tabel Facilities) -->
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-md border border-slate-200">
            <div class="flex items-center gap-3 mb-6">
                <i class="fa-solid fa-list-check text-amber-500 text-lg"></i>
                <h3 class="text-lg font-black text-slate-900">Sewa Sarana & Peralatan Satuan ({{ date('Y') }})</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse($fasilitas as $item)
                    <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-100 flex flex-col justify-between">
                        <div>
                            <span class="text-xs text-slate-500 font-medium block">{{ $item->nama_fasilitas }}</span>
                            <span class="text-[10px] text-emerald-600 font-semibold">Tersedia: {{ $item->stok }} Unit</span>
                        </div>
                        <p class="text-base font-black text-blue-900 mt-2">
                            Rp {{ number_format($item->harga, 0, ',', '.') }} <span class="text-xs font-bold text-slate-500">/ unit</span>
                        </p>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-6 text-slate-400 text-xs">
                        Belum ada data fasilitas yang ditambahkan di admin.
                    </div>
                @endforelse
            </div>
        </div>

    </main>

    <!-- Section Galeri Foto Real Venue -->
    <section id="galeri" class="py-16 bg-white border-t border-slate-200 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-black text-slate-900">Galeri Real Venue La Tansa Hall</h2>
                <p class="text-xs text-slate-500 mt-1">Dokumentasi nyata tampilan gedung interior dan exterior</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group relative overflow-hidden rounded-2xl border border-slate-200 aspect-video shadow-sm">
                    <img src="{{ asset('images/BagianDalamHall.jpeg') }}" alt="Bagian Dalam Hall" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute bottom-3 left-3 bg-slate-900/80 text-white text-[11px] px-3 py-1 rounded-full font-bold">Interior Utama Hall</span>
                </div>
                <div class="group relative overflow-hidden rounded-2xl border border-slate-200 aspect-video shadow-sm">
                    <img src="{{ asset('images/dalamBagianDepanHall.jpeg') }}" alt="Panggung Hall" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute bottom-3 left-3 bg-slate-900/80 text-white text-[11px] px-3 py-1 rounded-full font-bold">Panggung & Karpet Merah</span>
                </div>
                <div class="group relative overflow-hidden rounded-2xl border border-slate-200 aspect-video shadow-sm">
                    <img src="{{ asset('images/halamanDepanHall.jpeg') }}" alt="Halaman Depan" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute bottom-3 left-3 bg-slate-900/80 text-white text-[11px] px-3 py-1 rounded-full font-bold">Foyer & Pintu Utama</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Kontak, WhatsApp Bu Euis & Social Media -->
    <section id="kontak" class="py-16 bg-slate-900 text-white px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            <!-- WhatsApp Bu Euis -->
            <div class="bg-slate-800/80 p-8 rounded-3xl border border-slate-700 shadow-xl">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest block mb-1">Kontak Reservasi & Sewa</span>
                <h3 class="text-2xl font-black text-white mb-4">Pemesanan Venue Official</h3>
                <p class="text-slate-300 text-xs mb-6 leading-relaxed">
                    Untuk cek ketersediaan tanggal acara, survei lokasi, dan reservasi gedung, silakan hubungi penanggung jawab resmi:
                </p>

                <a href="https://wa.me/6281234567890?text=Halo%20Bu%20Euis,%20saya%20ingin%20sewa%20La%20Tansa%20Hall%20Unilam" 
                   target="_blank" 
                   class="flex items-center gap-4 bg-emerald-600 hover:bg-emerald-500 text-white p-4 rounded-2xl font-bold transition shadow-lg shadow-emerald-600/30">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div>
                        <span class="text-xs text-emerald-100 block font-normal">Penanggung Jawab Sewa Hall</span>
                        <span class="text-base font-extrabold">Bu Euis (WhatsApp Official)</span>
                    </div>
                </a>
            </div>

            <!-- Instagram Links -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-white mb-2">Akun Instagram Resmi</h3>
                <p class="text-slate-400 text-xs mb-4">Ikuti Instagram kami untuk update dokumentasi event dan info kampus:</p>

                <a href="https://www.instagram.com/latansa_hall?igsh=M3N4cXpjMjQwMnl1" 
                   target="_blank" 
                   class="flex items-center justify-between bg-slate-800 hover:bg-slate-700 border border-slate-700 p-4 rounded-2xl transition group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 rounded-xl flex items-center justify-center text-white text-xl">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm group-hover:text-pink-400 transition">@latansa_hall</h4>
                            <p class="text-xs text-slate-400">Instagram Resmi La Tansa Hall</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-400"></i>
                </a>

                <a href="https://www.instagram.com/unilam.official?igsh=eHhseWMzZjVibTFu" 
                   target="_blank" 
                   class="flex items-center justify-between bg-slate-800 hover:bg-slate-700 border border-slate-700 p-4 rounded-2xl transition group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-tr from-emerald-600 to-teal-400 rounded-xl flex items-center justify-center text-white text-xl">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm group-hover:text-emerald-400 transition">@unilam.official</h4>
                            <p class="text-xs text-slate-400">Instagram Resmi Universitas La Tansa Mashiro</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-400"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 py-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} Universitas La Tansa Mashiro (UNILAM) - La Tansa Hall. All rights reserved.</p>
    </footer>

</body>
</html>