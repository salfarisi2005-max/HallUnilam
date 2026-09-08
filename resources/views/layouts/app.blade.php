<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Hall Unilam</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-HallUnilam.png') }}" type="image/png">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased min-h-screen flex flex-col md:flex-row">

    <!-- Sidebar Admin -->
    <aside class="w-full md:w-64 bg-slate-950 text-white min-h-screen p-5 flex flex-col justify-between shadow-xl shrink-0">
        <div>
            <!-- Header Sidebar & Logo UNILAM Real -->
            <div class="flex items-center gap-3 pb-6 mb-6 border-b border-slate-800/80">
                <!-- Container Logo Gambar -->
                <div class="w-10 h-10 bg-white p-1 rounded-xl shadow-md flex items-center justify-center shrink-0 border border-slate-200">
                    <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo UNILAM" class="w-full h-full object-contain">
                </div>
                <div>
                    <h2 class="font-extrabold text-sm tracking-wide text-white leading-none">HALL UNILAM</h2>
                    <p class="text-[10px] text-teal-400 font-bold uppercase tracking-wider mt-1">Admin Panel</p>
                </div>
            </div>

            <!-- Menu Navigation -->
            <nav class="space-y-1.5">
                @yield('sidebar-menu')
            </nav>
        </div>

        <!-- Footer Sidebar -->
        <div class="pt-6 border-t border-slate-900 text-[11px] text-slate-500 text-center font-medium">
            &copy; {{ date('Y') }} La Tansa Hall Unilam
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-h-screen overflow-y-auto">
        <!-- Top Navbar -->
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center shadow-sm">
            <h1 class="text-base font-bold text-slate-800 uppercase tracking-wider">
                @yield('page-title', 'Dashboard')
            </h1>
            <div class="flex items-center gap-3">
                <span class="text-xs font-medium text-slate-500">Halo, <strong class="text-slate-800">{{ Auth::user()->name ?? 'Admin' }}</strong></span>
                <div class="w-8 h-8 bg-teal-100 text-teal-700 font-bold rounded-full flex items-center justify-center text-xs border border-teal-300">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- Dynamic View Content -->
        <div class="p-8 flex-1">
            @yield('content')
        </div>
    </main>

</body>
</html>