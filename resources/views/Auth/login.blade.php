<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - La Tansa Hall Unilam</title>

    <!-- Favicon Logo Portal -->
    <link rel="icon" href="{{ asset('images/logo-HallUnilam.png') }}" type="image/png">

    <!-- Tailwind CSS, FontAwesome & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .login-shell {
            background:
                linear-gradient(135deg, rgba(1, 55, 52, .58), rgba(4, 91, 84, .38)),
                url('/images/halamanDepanHall.jpeg') center / cover no-repeat fixed;
            min-height: 100vh;
        }

        .login-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, .18), rgba(4, 65, 61, .22));
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .58);
            box-shadow: 0 26px 65px rgba(0, 45, 42, .28), inset 0 1px 0 rgba(255, 255, 255, .42);
        }

        .login-glass-control {
            background: rgba(2, 44, 44, .16);
            border: 1px solid rgba(209, 250, 229, .32);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .08);
            transition: background .25s ease, border-color .25s ease, box-shadow .25s ease, transform .25s ease;
        }

        .login-glass-control:focus {
            background: rgba(4, 66, 63, .34);
        }

        .login-alert {
            background: rgba(127, 29, 29, .2);
            border: 1px solid rgba(254, 202, 202, .35);
            color: #fee2e2;
        }

        .login-field:focus-within {
            box-shadow: 0 0 0 3px rgba(45, 212, 191, .16), 0 12px 28px rgba(0, 0, 0, .18);
            transform: scale(1.025) translateY(-1px);
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body class="login-shell text-emerald-50 flex items-center justify-center min-h-screen p-4 font-sans antialiased relative overflow-hidden">

    <!-- Login Card Container -->
    <div class="login-card w-full max-w-sm rounded-3xl p-7 md:p-8 relative z-10">
        
        <!-- Header dengan Logo Custom -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/85 p-2 rounded-full shadow-xl shadow-black/20 mb-4">
                <img src="{{ asset('images/logo-HallUnilam.png') }}" alt="Logo Hall Unilam" class="w-full h-full object-contain rounded-full">
            </div>
            
            <h2 class="text-2xl font-black text-white tracking-wide">LOGIN ADMIN</h2>
            <p class="text-xs text-emerald-100/90 font-medium mt-2">Welcome back, silakan masuk ke akun Anda</p>
        </div>

        <!-- Error Alert Message -->
        @if ($errors->any())
            <div class="login-alert mb-6 p-3.5 text-xs rounded-2xl flex items-center gap-2.5 backdrop-blur-sm">
                <i class="fa-solid fa-circle-exclamation text-rose-300 text-sm shrink-0"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-5" x-data="{ showPassword: false }">
            @csrf

            <!-- Email Input -->
            <div>
                <label class="block text-[11px] font-medium text-white/85 mb-2">Alamat Email</label>
                <div class="login-field relative rounded-xl transition duration-200">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-emerald-300">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="login-glass-control w-full pl-11 pr-4 py-3.5 text-sm rounded-xl text-white placeholder-emerald-100/45 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300/40 transition duration-200"
                           placeholder="admin@gmail.com">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label class="block text-[11px] font-medium text-white/85 mb-2">Kata Sandi</label>
                <div class="login-field relative rounded-xl transition duration-200">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-emerald-300">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </span>
                    <input :type="showPassword ? 'text' : 'password'" name="password" required
                           class="login-glass-control w-full pl-11 pr-11 py-3.5 text-sm rounded-xl text-white placeholder-emerald-100/45 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300/40 transition duration-200"
                           placeholder="••••••••">
                    
                    <!-- Toggle Password Button -->
                    <button type="button" @click="showPassword = !showPassword" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-emerald-100/60 hover:text-emerald-300 transition">
                        <i class="fa-solid" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center cursor-pointer text-emerald-100/70 hover:text-white transition">
                    <input type="checkbox" name="remember" class="rounded border-emerald-200/50 bg-emerald-950/40 text-emerald-500 focus:ring-emerald-400">
                    <span class="ml-2">Ingat Saya di Perangkat Ini</span>
                </label>
            </div>

            <!-- Submit Button (Solid Teal Theme) -->
                <button type="submit"
                    class="w-full py-3.5 bg-emerald-500 hover:bg-emerald-400 hover:-translate-y-0.5 text-emerald-950 font-black rounded-xl shadow-lg shadow-emerald-500/30 transition duration-200 text-sm tracking-wide">
                Masuk Sekarang
            </button>
        </form>

        <!-- Back Link -->
        <div class="mt-8 text-center pt-4 border-t border-emerald-200/20">
            <a href="{{ route('beranda') }}" class="text-xs text-emerald-100/65 hover:text-emerald-300 font-medium transition">
                ← Kembali ke Halaman Utama
            </a>
        </div>

    </div>

</body>
</html>