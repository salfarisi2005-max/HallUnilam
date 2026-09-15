@php
    $paketPernikahan = $paket['pernikahan'] ?? null;
    $paketSeminar = $paket['seminar'] ?? null;
    $paketPerpisahan = $paket['perpisahan'] ?? null;
    $setting = fn ($key, $fallback = '') => $pengaturan[$key] ?? $fallback;
    $whatsappUrl = 'https://wa.me/' . preg_replace('/\D+/', '', $setting('whatsapp_nomor', '6281234567890'));
@endphp
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hall Unilam - Universitas La Tansa Mashiro</title>
    
    <!-- Favicon Logo -->
    <link rel="icon" href="{{ asset('images/logo-HallUnilam.png') }}" type="image/png">
    
    <!-- Tailwind CSS, FontAwesome & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes hero-slideshow {
            0%, 16% { opacity: .42; transform: scale(1.05); }
            20%, 96% { opacity: 0; transform: scale(1); }
            100% { opacity: .42; transform: scale(1.05); }
        }
        .hero-slide { animation: hero-slideshow 24s linear infinite; }
        .hero-delay-0 { animation-delay: 0s; }
        .hero-delay-1 { animation-delay: -4s; }
        .hero-delay-2 { animation-delay: -8s; }
        .hero-delay-3 { animation-delay: -12s; }
        .hero-delay-4 { animation-delay: -16s; }
        .hero-delay-5 { animation-delay: -20s; }

        .glass-panel {
            background: rgba(255, 255, 255, .78);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .instagram-brand {
            background: linear-gradient(45deg, #feda75 0%, #fa7e1e 25%, #d62976 50%, #962fbf 75%, #4f5bd5 100%);
        }

        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        textarea:focus-visible {
            outline: 3px solid rgba(20, 184, 166, .65);
            outline-offset: 3px;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body class="bg-teal-50 text-teal-950 font-sans antialiased selection:bg-teal-600 selection:text-white">

    <!-- Header Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-teal-100 shadow-sm shadow-teal-900/5 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            
            <!-- Logo & Brand Header -->
            <a href="#hero" class="flex items-center gap-3 group">
                <div class="w-14 h-14 bg-white p-1.5 rounded-full shadow-lg shadow-teal-900/15 flex items-center justify-center transition">
                    <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo Hall Unilam" class="w-full h-full object-contain rounded-full">
                </div>
                <div>
                    <span class="font-black text-base md:text-lg tracking-wider text-teal-950 block leading-none">{{ $setting('brand_nama', 'HALL UNILAM') }}</span>
                    <span class="text-[10px] text-teal-600 font-bold tracking-widest uppercase">{{ $setting('brand_subtitle', 'UNIVERSITAS LA TANSA MASHIRO') }}</span>
                </div>
            </a>
            
            <!-- Navigation Links -->
            <nav class="hidden md:flex gap-8 text-xs font-bold text-teal-800" x-data="{ activeSection: 'hero' }">
                <a href="#hero" @click="activeSection = 'hero'" :class="activeSection === 'hero' ? 'text-teal-600 underline underline-offset-8 decoration-2 font-extrabold' : 'hover:text-teal-600'" class="transition-colors">Beranda</a>
                <a href="#about" @click="activeSection = 'about'" :class="activeSection === 'about' ? 'text-teal-600 underline underline-offset-8 decoration-2 font-extrabold' : 'hover:text-teal-600'" class="transition-colors">Tentang</a>
                <a href="#paket" @click="activeSection = 'paket'" :class="activeSection === 'paket' ? 'text-teal-600 underline underline-offset-8 decoration-2 font-extrabold' : 'hover:text-teal-600'" class="transition-colors">Daftar Harga & Paket</a>
                <a href="#kontak" @click="activeSection = 'kontak'" :class="activeSection === 'kontak' ? 'text-teal-600 underline underline-offset-8 decoration-2 font-extrabold' : 'hover:text-teal-600'" class="transition-colors">Kontak & Reservasi</a>
            </nav>

            <!-- Reservasi Now / Admin Link -->
            <div class="flex items-center gap-3">
                <a href="{{ $whatsappUrl . '?text=' . urlencode($setting('whatsapp_pesan', 'Halo, saya ingin reservasi La Tansa Hall Unilam')) }}"
                   target="_blank" 
                   class="bg-teal-700 hover:bg-teal-800 text-white text-xs px-5 py-2.5 rounded-full font-bold transition shadow-md shadow-teal-800/25 flex items-center gap-2">
                    <i class="fa-solid fa-calendar-check text-xs"></i> Reservasi Now
                </a>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs px-4 py-2.5 rounded-full font-bold transition shadow-md shadow-teal-600/20">
                        <i class="fa-solid fa-gauge"></i> Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-teal-50 hover:bg-teal-100 text-teal-800 border border-teal-200 text-xs px-4 py-2.5 rounded-full font-bold transition">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section Carousel Autoplay -->
    <section id="hero" class="relative pt-28 pb-16 px-6 bg-teal-900 overflow-hidden min-h-[60vh] flex items-center justify-center">
        @foreach($heroMedia as $index => $slide)
            <img src="{{ $slide->publicUrl() }}" alt="{{ $slide->alt }}" class="absolute inset-0 w-full h-full object-cover hero-slide hero-delay-{{ min($index, 5) }}">
        @endforeach

        <div class="absolute inset-0 bg-linear-to-b from-teal-900/78 via-teal-800/58 to-teal-900"></div>

        <div class="relative z-10 text-center max-w-4xl mx-auto">
            <span class="text-xs font-bold text-teal-100 uppercase tracking-widest bg-teal-900/70 border border-teal-200/50 px-4 py-1.5 rounded-full inline-block mb-4 shadow-md shadow-teal-950/20">
                {{ $setting('hero_lokasi', 'Rangkasbitung, Banten') }}
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-white leading-tight mb-4">
                {{ $setting('hero_judul', 'Hall Unilam - Universitas La Tansa Mashiro') }}
            </h1>
            <p class="text-teal-50/85 text-sm md:text-base mb-8 max-w-2xl mx-auto leading-relaxed">
                {{ $setting('hero_deskripsi', 'Panggung serbaguna dengan kapasitas 1.500-2.500 untuk Pernikahan, Seminar, Konser, Gathering, dan Perpisahan Sekolah.') }}
            </p>
            <a href="#paket" class="bg-teal-500 hover:bg-teal-400 text-teal-950 text-xs px-6 py-3 rounded-full font-bold transition shadow-lg shadow-teal-500/30">
                {{ $setting('hero_tombol', 'Lihat Katalog Paket Pricing') }}
            </a>
        </div>
    </section>

    <!-- Section About Dinamis -->
    <section id="about" class="scroll-mt-24 pt-32 pb-16 bg-teal-50 border-b border-teal-100 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="glass-panel p-8 md:p-10 rounded-3xl border border-teal-100 shadow-xl shadow-teal-900/5">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 bg-white rounded-full p-1 shadow-md shadow-teal-900/10 shrink-0">
                        <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo Hall Unilam" class="w-full h-full object-contain rounded-full">
                    </div>
                    <h2 class="text-2xl font-black text-teal-950">
                        {{ $about->judul ?? 'Tentang La Tansa Hall' }}
                    </h2>
                </div>
                <p class="text-teal-900/80 leading-relaxed text-sm md:text-base">
                    {{ $about->konten ?? 'La Tansa Hall hadir di Rangkasbitung dengan fasilitas serbaguna untuk berbagai jenis acara.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Area: Paket Pricing & Tabel Dinamis -->
    <main id="paket" class="scroll-mt-24 py-16 px-4 md:px-8 max-w-7xl mx-auto space-y-12">
        
        @php
            $weddingItems = $paketPernikahan?->items->groupBy('nama_item') ?? collect();
            $weddingHeaders = $paketPernikahan?->items->pluck('tipe')->filter()->unique()->values() ?? collect();
        @endphp

        <!-- I. PAKET PERNIKAHAN -->
        <div class="glass-panel rounded-3xl p-6 md:p-8 shadow-xl shadow-teal-900/5 border border-teal-100">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 bg-teal-600 text-white rounded-xl flex items-center justify-center text-base shadow shadow-teal-600/20">
                    <i class="fa-solid fa-building-columns" aria-hidden="true"></i>
                </div>
                <div>
                    <h2 class="text-xl font-black text-teal-950 uppercase tracking-tight">
                        {{ $paketPernikahan->nama_paket ?? 'PAKET PERNIKAHAN' }}
                    </h2>
                    <p class="text-xs text-teal-700/60 font-medium">{{ $paketPernikahan->waktu ?? '' }}</p>
                </div>
            </div>

            <!-- Tabel Matriks Pernikahan -->
            <div class="overflow-x-auto rounded-2xl border border-teal-100 shadow-sm">
                <table class="w-full text-left text-xs">
                    <thead class="bg-teal-800 text-white">
                        <tr>
                            <th class="p-4 font-bold uppercase text-teal-100 w-1/4">Fasilitas / Uraian</th>
                            @foreach($weddingHeaders as $header)
                                <th class="p-4 text-center font-bold">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-teal-50 text-teal-900/80 font-medium">
                        @forelse($weddingItems as $name => $row)
                                <tr class="odd:bg-white even:bg-teal-50/40 hover:bg-teal-100/60 transition">
                                    <td class="p-4 font-bold text-teal-950">{{ $name }}</td>
                                    @foreach($weddingHeaders as $header)
                                        <td class="p-4 text-center">{{ $row->firstWhere('tipe', $header)?->nilai ?? '-' }}</td>
                                    @endforeach
                                </tr>
                        @empty
                            <tr><td colspan="{{ $weddingHeaders->count() + 1 }}" class="p-4 text-center text-teal-700/55">Belum ada item paket.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- II & III. PAKET SEMINAR & PERPISAHAN SEKOLAH -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- II. PAKET SEMINAR -->
            <div class="glass-panel rounded-3xl p-6 md:p-8 shadow-xl shadow-teal-900/5 border border-teal-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-teal-700 text-white rounded-xl flex items-center justify-center text-base shadow shadow-teal-700/20">
                            <i class="fa-solid fa-chalkboard-user" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-teal-950 uppercase">
                                {{ $paketSeminar->nama_paket ?? 'PAKET SEMINAR' }}
                            </h3>
                            <p class="text-[11px] text-teal-700/60 font-medium">{{ $paketSeminar->waktu ?? '' }}</p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-teal-100 text-xs">
                        @forelse($paketSeminar?->items ?? [] as $item)
                                <div class="flex justify-between items-center py-1 border-b border-teal-50">
                                    <span class="font-bold text-teal-900">{{ $item->nama_item }}:</span>
                                    <span class="font-extrabold text-teal-950">{{ $item->nilai }}</span>
                                </div>
                        @empty
                            <p class="text-xs text-teal-700/55">Belum ada item paket.</p>
                        @endforelse
                    </div>
                </div>

                <div class="mt-6 p-3 bg-teal-50 rounded-xl border border-teal-200 text-[11px] text-teal-900 flex items-center gap-2">
                    <i class="fa-solid fa-circle-info text-teal-600"></i>
                    <span>{{ $paketSeminar->catatan ?? '' }}</span>
                </div>
            </div>

            <!-- III. PAKET PERPISAHAN SEKOLAH -->
            <div class="glass-panel rounded-3xl p-6 md:p-8 shadow-xl shadow-teal-900/5 border border-teal-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 bg-emerald-500 text-teal-950 rounded-xl flex items-center justify-center text-base shadow shadow-emerald-500/20">
                            <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-teal-950 uppercase">
                                {{ $paketPerpisahan->nama_paket ?? 'PAKET PERPISAHAN SEKOLAH' }}
                            </h3>
                            <p class="text-[11px] text-teal-700/60 font-medium">Waktu Acara: {{ $paketPerpisahan->waktu ?? '' }}</p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-teal-100 text-xs">
                        @forelse($paketPerpisahan?->items ?? [] as $item)
                                <div class="flex justify-between items-center py-1 border-b border-teal-50">
                                    <span class="font-bold text-teal-900">{{ $item->nama_item }}:</span>
                                    <span class="font-extrabold text-teal-950">{{ $item->nilai }}</span>
                                </div>
                        @empty
                            <p class="text-xs text-teal-700/55">Belum ada item paket.</p>
                        @endforelse
                    </div>
                </div>

                <a href="{{ $whatsappUrl . '?text=' . urlencode('Halo ' . $setting('whatsapp_nama', 'Admin') . ', saya ingin sewa ' . ($paketPerpisahan->nama_paket ?? 'Paket Perpisahan')) }}" target="_blank" class="mt-6 w-full text-center py-2.5 bg-teal-600 hover:bg-teal-700 text-white rounded-xl text-xs font-bold transition shadow shadow-teal-600/20">
                    Pesan Paket Perpisahan
                </a>
            </div>

        </div>

        <!-- IV. SEWA SARANA & PERALATAN SATUAN (Dinamis dari DB Tabel Facilities) -->
        <div class="glass-panel rounded-3xl p-6 md:p-8 shadow-xl shadow-teal-900/5 border border-teal-100">
            <div class="flex items-center gap-3 mb-6">
                <i class="fa-solid fa-list-check text-teal-600 text-lg"></i>
                <h3 class="text-lg font-black text-teal-950">Sewa Sarana & Peralatan Satuan ({{ date('Y') }})</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse($fasilitas as $item)
                    <div class="bg-teal-50/70 p-4 rounded-2xl border border-teal-100 flex flex-col justify-between hover:bg-teal-100/70 transition">
                        <div>
                            <span class="text-xs text-teal-900/75 font-medium block">{{ $item->nama_fasilitas }}</span>
                            <span class="text-[10px] text-teal-600 font-semibold">Tersedia: {{ $item->stok }} Unit</span>
                        </div>
                        <p class="text-base font-black text-teal-950 mt-2">
                            Rp {{ number_format($item->harga, 0, ',', '.') }} <span class="text-xs font-bold text-teal-700/60">/ unit</span>
                        </p>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-6 text-teal-700/55 text-xs">
                        Belum ada data fasilitas yang ditambahkan di admin.
                    </div>
                @endforelse
            </div>
        </div>

    </main>

    <!-- Section Galeri Foto Real Venue -->
    <section id="galeri" class="py-16 bg-teal-50 border-t border-teal-100 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-black text-teal-950">{{ $setting('galeri_judul', 'Galeri Real Venue La Tansa Hall') }}</h2>
                <p class="text-xs text-teal-800/65 mt-1">{{ $setting('galeri_deskripsi', 'Dokumentasi nyata tampilan gedung interior dan exterior') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($galeriMedia as $media)
                    <div class="group relative overflow-hidden rounded-2xl border border-teal-100 aspect-video shadow-lg shadow-teal-900/10">
                        <img src="{{ $media->publicUrl() }}" alt="{{ $media->alt }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @if($media->caption)
                            <span class="absolute bottom-3 left-3 bg-teal-950/85 text-teal-50 text-[11px] px-3 py-1 rounded-full font-bold backdrop-blur-sm">{{ $media->caption }}</span>
                        @endif
                    </div>
                @empty
                    <p class="col-span-full text-center py-6 text-teal-700/55 text-xs">Belum ada gambar galeri.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Section Kontak, WhatsApp Bu Euis & Social Media -->
    <section id="kontak" class="scroll-mt-24 py-16 bg-teal-900 text-white px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            <!-- WhatsApp Bu Euis -->
            <div class="bg-teal-800/80 p-8 rounded-3xl border border-teal-500/50 shadow-xl shadow-teal-950/25 backdrop-blur-md">
                <span class="text-xs font-bold text-teal-300 uppercase tracking-widest block mb-1">Kontak Reservasi & Sewa</span>
                <h3 class="text-2xl font-black text-white mb-4">{{ $setting('kontak_judul', 'Pemesanan Venue Official') }}</h3>
                <p class="text-teal-100/75 text-xs mb-6 leading-relaxed">
                    {{ $setting('kontak_deskripsi', 'Untuk cek ketersediaan tanggal acara, survei lokasi, dan reservasi gedung, silakan hubungi penanggung jawab resmi:') }}
                </p>

                <a href="{{ $whatsappUrl . '?text=' . urlencode($setting('whatsapp_pesan', 'Halo, saya ingin sewa La Tansa Hall Unilam')) }}"
                   target="_blank" 
                   class="flex items-center gap-4 bg-teal-500 hover:bg-teal-400 text-teal-950 p-4 rounded-2xl font-bold transition shadow-lg shadow-teal-500/30">
                    <div class="w-10 h-10 bg-[#25D366] text-white rounded-xl flex items-center justify-center text-xl shadow-md shadow-green-950/20">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div>
                        <span class="text-xs text-teal-950/70 block font-normal">Penanggung Jawab Sewa Hall</span>
                        <span class="text-base font-extrabold">{{ $setting('whatsapp_nama', 'WhatsApp Official') }}</span>
                    </div>
                </a>
            </div>

            <!-- Social Media Links -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-white mb-2">Media Sosial Resmi</h3>
                <p class="text-teal-100/65 text-xs mb-4">Ikuti kanal resmi kami untuk dokumentasi event, info kampus, dan kabar terbaru.</p>

                @foreach([
                    ['key' => 'instagram_hall', 'icon' => 'fa-instagram', 'title' => 'Instagram Hall', 'description' => 'Akun Instagram Resmi La Tansa Hall', 'color' => 'from-yellow-400 via-pink-500 to-purple-600', 'hover' => 'group-hover:text-pink-300'],
                    ['key' => 'instagram_unilam', 'icon' => 'fa-instagram', 'title' => 'Instagram UNILAM', 'description' => 'Instagram Resmi Universitas La Tansa Mashiro', 'color' => 'from-yellow-400 via-pink-500 to-purple-600', 'hover' => 'group-hover:text-pink-300'],
                    ['key' => 'facebook_url', 'icon' => 'fa-facebook-f', 'title' => 'Facebook', 'description' => 'Halaman Facebook resmi Hall Unilam', 'color' => 'from-teal-700 to-teal-400', 'hover' => 'group-hover:text-teal-300'],
                    ['key' => 'tiktok_url', 'icon' => 'fa-tiktok', 'title' => 'TikTok', 'description' => 'Video dan kabar terbaru Hall Unilam', 'color' => 'from-teal-950 to-teal-500', 'hover' => 'group-hover:text-teal-300'],
                    ['key' => 'youtube_url', 'icon' => 'fa-youtube', 'title' => 'YouTube', 'description' => 'Video dokumentasi dan informasi venue', 'color' => 'from-emerald-700 to-teal-400', 'hover' => 'group-hover:text-emerald-300'],
                ] as $social)
                    @if($setting($social['key']))
                        <a href="{{ $setting($social['key']) }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between bg-teal-800/70 hover:bg-teal-700 border border-teal-500/50 p-4 rounded-2xl transition group backdrop-blur-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 {{ str_starts_with($social['icon'], 'fa-instagram') ? 'instagram-brand' : 'bg-linear-to-tr ' . $social['color'] }} rounded-2xl ring-2 ring-teal-200/40 shadow-lg shadow-teal-950/20 flex items-center justify-center text-white text-2xl">
                                    <i class="fa-brands {{ $social['icon'] }}" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white text-sm {{ $social['hover'] }} transition">{{ $social['title'] }}</h4>
                                    <p class="text-xs text-teal-100/60">{{ $social['description'] }}</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs text-teal-200/60"></i>
                        </a>
                    @endif
                @endforeach
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-teal-950/95 border-t border-teal-700 py-6 text-center text-xs text-teal-200/70">
        <p>&copy; {{ date('Y') }} {{ $setting('footer_teks', 'Universitas La Tansa Mashiro (UNILAM) - La Tansa Hall. All rights reserved.') }}</p>
    </footer>

</body>
</html>