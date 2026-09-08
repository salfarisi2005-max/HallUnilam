<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Admin Hall Unilam</title>

    <!-- Favicon Logo Portal -->
    <link rel="icon" href="{{ asset('images/logo-HallUnilam.png') }}" type="image/png">

    <!-- Tailwind CSS, FontAwesome & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="relative flex items-center justify-center min-h-screen p-4 overflow-hidden font-sans antialiased bg-slate-950 text-slate-100"
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

    <!-- Background Image Slider (Auto Crossfade Overlay) -->
    <template x-for="(img, index) in images" :key="index">
        <div class="absolute inset-0 bg-center bg-cover transition-opacity duration-1000 ease-in-out pointer-events-none"
             :class="activeSlide === index ? 'opacity-30 scale-105' : 'opacity-0 scale-100'"
             :style="`background-image: url('${img}');`">
        </div>
    </template>

    <!-- Dark Gradient Masking Layer -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-teal-950/80 to-slate-950/90 pointer-events-none"></div>

    <!-- Ambient Glowing Background Orbs -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Login Card Transparan (Glassmorphism) -->
    <div class="relative z-10 w-full max-w-md p-8 border shadow-2xl bg-slate-900/60 backdrop-blur-xl border-white/15 rounded-3xl">
        
        <!-- Header dengan Logo Custom -->
        <div class="mb-6 text-center">
            <div class="relative inline-block mb-3">
                <!-- Glowing Aura Effect -->
                <div class="absolute -inset-1 rounded-2xl bg-gradient-to-r from-teal-500 to-emerald-400 blur-md opacity-50"></div>
                
                <!-- Container Gambar Logo -->
                <div class="relative flex items-center justify-center w-20 h-20 p-2 overflow-hidden border shadow-xl bg-slate-950/80 rounded-2xl border-teal-500/40">
                    <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo Hall Unilam" class="object-contain w-full h-full">
                </div>
            </div>
            
            <h2 class="text-2xl font-black tracking-wide text-white">PORTAL ADMIN</h2>
            <p class="mt-1 text-xs text-teal-200/70">Masuk untuk mengelola fasilitas dan data website</p>
        </div>

        <!-- Session Status / Error Message -->
        @if ($errors->any())
            <div class="flex items-center gap-2 p-3 mb-5 text-xs border rounded-xl bg-rose-500/20 border-rose-500/50 text-rose-200 backdrop-blur-md">
                <i class="fa-solid fa-circle-exclamation text-rose-400"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-5" x-data="{ showPassword: false }">
            @csrf

            <!-- Email Input -->
            <div>
                <label class="block text-xs font-semibold text-teal-100 mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-teal-300/60">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full pl-10 pr-4 py-2.5 text-sm bg-white/10 border border-white/15 rounded-xl text-white placeholder-teal-200/40 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:bg-slate-900/60 transition duration-200"
                           placeholder="admin@gmail.com">
                </div>
            </div>

            <!-- Password Input dengan Toggle Mata -->
            <div>
                <label class="block text-xs font-semibold text-teal-100 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-teal-300/60">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input :type="showPassword ? 'text' : 'password'" name="password" required
                           class="w-full pl-10 pr-10 py-2.5 text-sm bg-white/10 border border-white/15 rounded-xl text-white placeholder-teal-200/40 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:bg-slate-900/60 transition duration-200"
                           placeholder="••••••••">
                    
                    <!-- Tombol Toggle Mata -->
                    <button type="button" @click="showPassword = !showPassword" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-teal-300/60 hover:text-teal-200 transition">
                        <i class="fa-solid" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center cursor-pointer text-teal-200/80">
                    <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/10 text-teal-500 focus:ring-teal-400 focus:ring-offset-slate-900">
                    <span class="ml-2">Ingat Saya</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full py-3 bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-400 hover:to-emerald-400 text-white font-bold rounded-xl shadow-lg shadow-teal-500/25 hover:shadow-teal-500/40 hover:scale-[1.01] active:scale-[0.99] transition duration-200 text-sm">
                Masuk Sekarang
            </button>
        </form>

        <!-- Back to Public Home -->
        <div class="mt-6 text-center">
            <a href="{{ route('beranda') }}" class="text-xs font-medium transition text-teal-300/80 hover:text-white">
                ← Kembali ke Halaman Utama
            </a>
        </div>

    </div>

</body>
</html>