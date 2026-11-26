<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Resmi Desa Cipetir - Kabupaten Sukabumi')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        cipetir: {
                            green: '#064E3B',      // Hijau Tua Pegunungan Sukabumi
                            emerald: '#15803D',    // Hijau Aksen Utama
                            gold: '#EAB308',       // Kuning Emas Identitas
                            goldLight: '#FACC15',  // Kuning Highlight
                            dark: '#111827',       // Hitam Karbon Teks & Footer
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-cipetir-dark antialiased flex flex-col min-h-screen">

    <!-- Top Info Bar (Data dari tabel: infos) -->
    <div class="bg-cipetir-dark text-gray-200 text-xs py-2 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span>Kec. Kadudampit, Kab. Sukabumi, Jawa Barat</span>
                <span class="hidden sm:inline text-cipetir-gold">•</span>
                <span class="hidden sm:inline">Senin - Jumat: 08.00 - 16.00 WIB</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="tel:0266000000" class="hover:text-cipetir-gold transition">Telp: (0266) 123-456</a>
                <a href="{{ route('complaints.index') }}#lacak-tiket" class="text-cipetir-gold font-semibold hover:underline">Lacak Pengaduan</a>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <header x-data="{ mobileOpen: false }" class="bg-cipetir-green text-white sticky top-0 z-50 shadow-lg border-b-4 border-cipetir-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Nama Desa -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-cipetir-gold text-cipetir-dark font-extrabold flex items-center justify-center text-xl shadow-md group-hover:scale-105 transition">
                        DC
                    </div>
                    <div>
                        <span class="block font-extrabold text-lg tracking-tight leading-none text-white">DESA CIPETIR</span>
                        <span class="block text-xs text-cipetir-goldLight font-medium mt-1">Kabupaten Sukabumi</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-cipetir-goldLight' : 'hover:text-cipetir-goldLight transition' }}">
                        Beranda
                    </a>
                    
                    <!-- Dropdown Profil (pages & structures) -->
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="flex items-center gap-1 hover:text-cipetir-goldLight py-2 transition">
                            <span>Profil Desa</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-cloak x-transition class="absolute left-0 mt-0 w-52 bg-white text-cipetir-dark rounded-xl shadow-xl py-2 border border-gray-100">
                            <a href="#" class="block px-4 py-2 hover:bg-emerald-50 hover:text-cipetir-emerald">Sejarah & Visi Misi</a>
                            <a href="#" class="block px-4 py-2 hover:bg-emerald-50 hover:text-cipetir-emerald">Struktur Perangkat Desa</a>
                            <a href="#" class="block px-4 py-2 hover:bg-emerald-50 hover:text-cipetir-emerald">Lembaga Desa (BPD/LPM)</a>
                        </div>
                    </div>

                    <a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'text-cipetir-goldLight' : 'hover:text-cipetir-goldLight transition' }}">
                        Layanan Publik
                    </a>
                    <a href="{{ route('home') }}#potensi" class="hover:text-cipetir-goldLight transition">Potensi Desa</a>

                    <!-- Dropdown Transparansi (apbdes & stats) -->
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="flex items-center gap-1 py-2 {{ request()->routeIs('transparency.*') ? 'text-cipetir-goldLight' : 'hover:text-cipetir-goldLight transition' }}">
                            <span>Transparansi</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-cloak x-transition class="absolute left-0 mt-0 w-56 bg-white text-cipetir-dark rounded-xl shadow-xl py-2 border border-gray-100">
                            <a href="{{ route('transparency.apbdes') }}" class="block px-4 py-2 hover:bg-emerald-50 hover:text-cipetir-emerald">Laporan APBDes</a>
                            <a href="{{ route('transparency.stats') }}" class="block px-4 py-2 hover:bg-emerald-50 hover:text-cipetir-emerald">Statistik Kependudukan</a>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#galeri" class="hover:text-cipetir-goldLight transition">Galeri</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('complaints.index') }}" class="bg-cipetir-gold hover:bg-cipetir-goldLight text-cipetir-dark font-bold text-sm px-5 py-2.5 rounded-xl shadow transition">
                        Lapor Warga
                    </a>
                </div>

                <!-- Mobile Hamburger -->
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-gray-200 hover:bg-cipetir-emerald">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-cloak class="lg:hidden bg-cipetir-dark border-t border-gray-800 px-4 pt-3 pb-5 space-y-2 text-sm font-medium">
            <a href="{{ route('home') }}" class="block py-2 {{ request()->routeIs('home') ? 'text-cipetir-gold' : 'text-gray-200 hover:text-cipetir-gold' }}">Beranda</a>
            <a href="#" class="block py-2 text-gray-200 hover:text-cipetir-gold">Profil & Kelembagaan</a>
            <a href="{{ route('services.index') }}" class="block py-2 {{ request()->routeIs('services.*') ? 'text-cipetir-gold' : 'text-gray-200 hover:text-cipetir-gold' }}">Layanan Publik</a>
            <a href="{{ route('home') }}#potensi" class="block py-2 text-gray-200 hover:text-cipetir-gold">Potensi Desa</a>
            <a href="{{ route('transparency.apbdes') }}" class="block py-2 {{ request()->routeIs('transparency.apbdes') ? 'text-cipetir-gold' : 'text-gray-200 hover:text-cipetir-gold' }}">Transparansi APBDes</a>
            <a href="{{ route('transparency.stats') }}" class="block py-2 {{ request()->routeIs('transparency.stats') ? 'text-cipetir-gold' : 'text-gray-200 hover:text-cipetir-gold' }}">Statistik Kependudukan</a>
            <a href="{{ route('complaints.index') }}" class="block mt-3 text-center bg-cipetir-gold text-cipetir-dark font-bold py-2.5 rounded-lg">Buat Pengaduan Warga</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer (Data dari tabel: infos) -->
    <footer class="bg-cipetir-dark text-gray-300 border-t-4 border-cipetir-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-lg bg-cipetir-gold text-cipetir-dark font-extrabold flex items-center justify-center">DC</div>
                    <span class="font-bold text-white text-lg">Pemerintah Desa Cipetir</span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Portal resmi pelayanan publik, transparansi anggaran, dan promosi potensi wisata serta UMKM Desa Cipetir, Kecamatan Kadudampit, Kabupaten Sukabumi.
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 border-l-4 border-cipetir-gold pl-3">Kontak & Kantor Desa</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li>Jl. Raya Cipetir, Kec. Kadudampit, Kab. Sukabumi 43153</li>
                    <li>WhatsApp Pelayanan: +62 812-3456-7890</li>
                    <li>Email: pemdes@cipetir-sukabumi.desa.id</li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 border-l-4 border-cipetir-gold pl-3">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('services.index') }}" class="hover:text-cipetir-gold transition">Persyaratan Administrasi Surat</a></li>
                    <li><a href="{{ route('transparency.apbdes') }}" class="hover:text-cipetir-gold transition">Realisasi APBDes Tahun Berjalan</a></li>
                    <li><a href="{{ route('transparency.stats') }}" class="hover:text-cipetir-gold transition">Data Demografi & Statistik Desa</a></li>
                    <li><a href="{{ route('complaints.index') }}" class="hover:text-cipetir-gold transition">Layanan Pengaduan Masyarakat</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-black/40 py-4 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Pemerintah Desa Cipetir, Kabupaten Sukabumi. Seluruh Hak Cipta Dilindungi.
        </div>
    </footer>

</body>
</html>