<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unilam Hall - Universitas La Tansa Mashiro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans">

    <!-- Sticky Navigation Bar -->
    <nav class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="text-xl font-bold text-blue-900">UNILAM HALL</span>
                <span class="text-xs text-slate-500 hidden md:inline">Universitas La Tansa Mashiro</span>
            </div>
            <div class="flex gap-6 text-sm font-semibold text-slate-600">
                <a href="#about" class="hover:text-blue-900 transition">Tentang Hall</a>
                <a href="#pernikahan" class="hover:text-blue-900 transition">Paket Pernikahan</a>
                <a href="#paket-lain" class="hover:text-blue-900 transition">Seminar & Perpisahan</a>
                <a href="#fasilitas" class="hover:text-blue-900 transition">Sewa Satuan</a>
            </div>
            <a href="https://wa.me/6282113332337" target="_blank" class="bg-blue-900 text-white text-sm px-4 py-2 rounded-lg font-medium hover:bg-blue-800 transition">
                📅 Reservasi Now
            </a>
        </div>
    </nav>

    <!-- Content Container -->
    <div class="max-w-6xl mx-auto px-4 py-8 space-y-12">

        <!-- 1. SECTION ABOUT (Tentang La Tansa Hall) -->
        <section id="about" class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-slate-200">
            <h1 class="text-2xl font-bold text-blue-900 mb-3">
                {{ $about->judul ?? 'Tentang La Tansa Hall' }}
            </h1>
            <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                {{ $about->konten ?? 'La Tansa Hall hadir di kota Rangkasbitung dengan menawarkan fasilitas untuk acara-acara seperti pernikahan, seminar, konser musik, family gathering, perpisahan sekolah, bulu tangkis, dan outbound. Didukung oleh fasilitas mumpuni dengan kapasitas gedung hingga 1.500 orang (dengan tempat duduk) atau 3.000 orang (tanpa tempat duduk).' }}[cite: 1]
            </p>
        </section>

        <!-- 2. SECTION PAKET PERNIKAHAN (Tabel Matriks) -->
        <section id="pernikahan" class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-slate-200">
            <div class="flex items-center gap-2 mb-1">
                <span class="bg-amber-500 text-white rounded-full w-7 h-7 flex items-center justify-center text-xs font-bold">I</span>
                <h2 class="text-xl font-bold text-slate-900">{{ $pernikahan['judul'] ?? 'PAKET PERNIKAHAN (08.00 - 14.30 WIB)' }}</h2>
            </div>
            <p class="text-xs text-slate-400 mb-6 ml-9">Berlaku Januari - Desember 2026</p>

            <div class="overflow-x-auto rounded-xl border border-slate-200">
                <table class="w-full text-left text-sm">
                    <thead class="bg-teal-800 text-white">
                        <tr>
                            <th class="p-3.5 font-semibold">Fasilitas / Uraian</th>
                            @foreach($pernikahan['headers'] ?? [] as $header)
                                <th class="p-3.5 text-center font-semibold text-amber-400">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-teal-50">
                        @foreach($pernikahan['rows'] ?? [] as $row)
                            <tr class="odd:bg-white even:bg-teal-50/40 hover:bg-teal-100/60 transition">
                                <td class="p-3.5 font-semibold text-slate-700">{{ $row['fasilitas'] }}</td>
                                <td class="p-3.5 text-center text-slate-600">{{ $row['standar'] }}</td>
                                <td class="p-3.5 text-center text-slate-600">{{ $row['semi'] }}</td>
                                <td class="p-3.5 text-center text-slate-600">{{ $row['reguler'] }}</td>
                                <td class="p-3.5 text-center text-slate-600">{{ $row['vip'] }}</td>
                                <td class="p-3.5 text-center text-slate-600">{{ $row['vvip'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- 3. SECTION PAKET SEMINAR & PERPISAHAN -->
        <section id="paket-lain" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Paket Seminar -->
            <div class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-slate-200 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="bg-blue-900 text-white rounded-full w-7 h-7 flex items-center justify-center text-xs font-bold">II</span>
                        <h3 class="text-lg font-bold text-slate-900">PAKET SEMINAR</h3>
                    </div>
                    <p class="text-xs text-slate-400 mb-6 ml-9">A. Full Day (08.00-15.30) | B. Half Day (08.00-12.00 / 13.00-17.00)</p>

                    <div class="space-y-3">
                        @foreach($seminar['items'] ?? [] as $item)
                            <div class="flex justify-between items-center text-sm border-b pb-2.5">
                                <span class="text-slate-600 font-medium">{{ $item['tipe'] }}</span>
                                <span class="font-bold text-blue-900">{{ $item['harga'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 bg-amber-50 border border-amber-200 text-amber-800 text-xs p-3.5 rounded-xl flex items-center gap-2">
                    <span>💡</span>
                    <span>{{ $seminar['catatan'] ?? 'Semua paket seminar sudah termasuk Projector & Screen 1 paket.' }}</span>
                </div>
            </div>

            <!-- Paket Perpisahan Sekolah -->
            <div class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-slate-200">
                <div class="flex items-center gap-2 mb-1">
                    <span class="bg-emerald-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-xs font-bold">III</span>
                    <h3 class="text-lg font-bold text-slate-900">PAKET PERPISAHAN SEKOLAH</h3>
                </div>
                <p class="text-xs text-slate-400 mb-6 ml-9">Waktu Acara: {{ $perpisahan['waktu'] ?? '08.00 - 13.30 WIB' }}</p>

                <div class="space-y-3">
                    @foreach($perpisahan['items'] ?? [] as $item)
                        <div class="flex justify-between items-center text-sm border-b pb-2.5">
                            <span class="text-slate-600 font-medium">{{ $item['tipe'] }}</span>
                            <span class="font-bold text-blue-900">{{ $item['harga'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>

        <!-- 4. SECTION SEWA SARANA SATUAN -->
        <section id="fasilitas" class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-slate-200">
            <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span>📋</span> Sewa Sarana & Peralatan Satuan (2026)
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($fasilitasSatuan as $fasilitas)
                    <div class="p-4 rounded-xl border border-slate-100 bg-slate-50 hover:border-slate-300 transition">
                        <p class="text-xs text-slate-500 font-medium">{{ $fasilitas->nama_fasilitas }}</p>
                        <p class="text-base font-bold text-blue-900 mt-1">
                            Rp {{ number_format($fasilitas->harga, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ unit</span>
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

</body>
</html>