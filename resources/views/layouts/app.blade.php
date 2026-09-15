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
    <style>
        .admin-nav-link {
            isolation: isolate;
            overflow: hidden;
            position: relative;
            transform: translateZ(0);
        }

        .admin-nav-link::before {
            background: rgba(204, 251, 241, .42);
            border-radius: 9999px;
            content: '';
            height: 9rem;
            left: -4rem;
            position: absolute;
            top: 50%;
            transform: translateY(-50%) scale(0);
            transition: transform .35s ease;
            width: 9rem;
            z-index: -1;
        }

        .admin-nav-link:hover::before {
            transform: translateY(-50%) scale(1);
        }

        .admin-nav-link > * {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="bg-teal-50/50 text-slate-800 font-sans antialiased min-h-screen flex flex-col md:flex-row">

    <!-- Sidebar Admin -->
    <aside x-data="{ sidebarSearch: '' }" class="w-full md:w-72 bg-teal-700 text-white min-h-screen p-5 flex flex-col justify-between shadow-xl shadow-teal-950/20 shrink-0">
        <div>
            <!-- Header Sidebar & Logo UNILAM Real -->
            <div class="flex items-center gap-3 pb-6 mb-5 border-b border-teal-200/35">
                <!-- Container Logo Gambar -->
                <div class="w-11 h-11 bg-white p-1 rounded-full shadow-md flex items-center justify-center shrink-0 border border-teal-200/80">
                    <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo UNILAM" class="w-full h-full object-contain">
                </div>
                <div>
                    <h2 class="font-extrabold text-sm tracking-wide text-white leading-none">HALL UNILAM</h2>
                    <p class="text-[10px] text-teal-100 font-bold uppercase tracking-wider mt-1">Admin Panel</p>
                </div>
            </div>

            <label class="relative block mb-5">
                <span class="sr-only">Cari menu admin</span>
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-teal-100/70 text-xs"></i>
                <input x-model="sidebarSearch" type="search" placeholder="Cari menu..." class="w-full rounded-xl border border-teal-100/40 bg-teal-800/70 py-2.5 pl-9 pr-3 text-xs text-white placeholder-teal-100/75 outline-none transition focus:border-teal-100 focus:bg-teal-800 focus:ring-2 focus:ring-teal-100/30">
            </label>

            <!-- Menu Navigation -->
            <nav class="space-y-1.5" aria-label="Navigasi admin">
                @yield('sidebar-menu')
            </nav>
        </div>

        <!-- Footer Sidebar -->
        <div class="pt-6 border-t border-teal-200/35 text-[11px] text-teal-100/75 text-center font-medium">
            &copy; {{ date('Y') }} La Tansa Hall Unilam
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-h-screen overflow-y-auto">
        <!-- Top Navbar -->
        <header class="bg-teal-100 border-b border-teal-200 px-8 py-4 flex justify-between items-center shadow-sm">
            <h1 class="text-base font-bold text-teal-950 uppercase tracking-wider">
                @yield('page-title', 'Dashboard')
            </h1>
            <div class="flex items-center gap-3">
                <span class="text-xs font-medium text-slate-500">Halo, <strong class="text-teal-900">{{ Auth::user()->name ?? 'Admin' }}</strong></span>
                <div class="w-9 h-9 bg-teal-100 text-teal-700 font-bold rounded-full flex items-center justify-center text-xs border border-teal-300 shadow-sm">
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