@extends('layouts.app')

@section('title', 'Beranda - Portal Resmi Desa Cipetir Sukabumi')

@section('content')
<!-- HERO SECTION -->
<section class="relative bg-cipetir-green text-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-cipetir-dark/90 via-cipetir-green/85 to-cipetir-emerald/75"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cipetir-gold/20 border border-cipetir-gold text-cipetir-goldLight text-xs font-bold uppercase tracking-wider mb-5">
                Kabupaten Sukabumi • Jawa Barat
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight mb-6">
                Mewujudkan <span class="text-cipetir-gold">Desa Cipetir</span> yang Mandiri, Transparan, dan Sejahtera.
            </h1>
            <p class="text-gray-200 text-base sm:text-lg mb-8 leading-relaxed">
                Akses layanan administrasi kependudukan, pantau transparansi APBDes, dan jelajahi potensi agrowisata serta UMKM lokal dalam satu pintu digital.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('services.index') }}" class="bg-cipetir-gold hover:bg-cipetir-goldLight text-cipetir-dark font-bold px-6 py-3.5 rounded-xl shadow-lg transition">
                    Jelajahi Layanan Publik
                </a>
                <a href="#apbdes" class="bg-white/10 hover:bg-white/20 border border-white/30 text-white font-semibold px-6 py-3.5 rounded-xl transition">
                    Transparansi APBDes
                </a>
            </div>
        </div>
    </div>
</section>

<!-- STATISTIK KEPENDUDUKAN (Mapping tabel: stats) -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-lg font-extrabold text-cipetir-dark">Statistik Kependudukan Desa</h2>
                <p class="text-xs text-gray-500">Data Demografi Tahun 2026</p>
            </div>
            <a href="#" class="text-xs font-bold text-cipetir-emerald hover:underline mt-2 sm:mt-0">Lihat Rincian Kelompok Umur &rarr;</a>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-100">
                <p class="text-xs font-semibold text-gray-500 uppercase">Total Penduduk</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-cipetir-green mt-1">6.420</p>
                <span class="text-xs text-cipetir-emerald font-medium">Jiwa Terdata</span>
            </div>
            <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-100">
                <p class="text-xs font-semibold text-gray-500 uppercase">Kepala Keluarga</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-cipetir-dark mt-1">1.985</p>
                <span class="text-xs text-amber-700 font-medium">Kartu Keluarga (KK)</span>
            </div>
            <div class="p-4 rounded-xl bg-gray-50 border border-gray-200/70">
                <p class="text-xs font-semibold text-gray-500 uppercase">Laki-Laki</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-cipetir-dark mt-1">3.250</p>
                <span class="text-xs text-gray-500 font-medium">50.6% Populasi</span>
            </div>
            <div class="p-4 rounded-xl bg-gray-50 border border-gray-200/70">
                <p class="text-xs font-semibold text-gray-500 uppercase">Perempuan</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-cipetir-dark mt-1">3.170</p>
                <span class="text-xs text-gray-500 font-medium">49.4% Populasi</span>
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN PUBLIK (Mapping tabel: services) -->
<section id="layanan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-cipetir-emerald">Pelayanan Administrasi</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-cipetir-dark mt-1">Layanan Publik Desa</h2>
        </div>
        <a href="{{ route('services.index') }}" class="text-sm font-bold text-cipetir-green hover:text-cipetir-emerald mt-3 sm:mt-0">Semua Layanan &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
            $dummyServices = [
                ['name' => 'Surat Pengantar KTP & KK', 'time' => '1 Hari Kerja', 'fee' => 'Gratis (Rp 0)', 'desc' => 'Pengurusan surat pengantar pembuatan atau pembaruan identitas kependudukan warga.'],
                ['name' => 'Surat Keterangan Usaha (SKU)', 'time' => '1 Hari Kerja', 'fee' => 'Gratis (Rp 0)', 'desc' => 'Legalitas keterangan usaha mikro dan UMKM warga Desa Cipetir untuk perbankan/izin.'],
                ['name' => 'Surat Keterangan Tidak Mampu', 'time' => 'Langsung Jadi', 'fee' => 'Gratis (Rp 0)', 'desc' => 'Rekomendasi bantuan pendidikan, kesehatan, dan jaminan sosial bagi warga membutuhkan.'],
            ];
        @endphp

        @foreach($dummyServices as $service)
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md border border-gray-200/80 transition flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-cipetir-green">{{ $service['fee'] }}</span>
                    <span class="text-xs font-semibold text-gray-500">Estimasi: {{ $service['time'] }}</span>
                </div>
                <h3 class="text-lg font-bold text-cipetir-dark mb-2">{{ $service['name'] }}</h3>
                <p class="text-sm text-gray-600 leading-relaxed mb-6">{{ $service['desc'] }}</p>
            </div>
            <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center w-full py-2.5 px-4 rounded-xl bg-gray-900 hover:bg-cipetir-green text-white text-xs font-bold transition">
                Lihat Syarat & Unduh Formulir
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- POTENSI DESA (Mapping tabel: potentials) -->
<section id="potensi" class="bg-cipetir-dark text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-cipetir-gold">Ekonomi & Pariwisata</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-1">Potensi Unggulan Desa Cipetir</h2>
            </div>
            <a href="#" class="text-sm font-bold text-cipetir-gold hover:underline mt-3 sm:mt-0">Eksplorasi Semua Potensi &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $dummyPotentials = [
                    ['sector' => 'Pertanian & Perkebunan', 'title' => 'Sentra Sayuran Dataran Tinggi', 'owner' => 'Kelompok Tani Mukti', 'loc' => 'Kedusunan Cipetir Wetan'],
                    ['sector' => 'UMKM Kuliner', 'title' => 'Olahan Keripik & Gula Aren', 'owner' => 'UMKM Barokah Cipetir', 'loc' => 'Kampung Babakan'],
                    ['sector' => 'Wisata Alam', 'title' => 'Agrowisata & Panorama Kaki Gunung', 'owner' => 'BUMDes Cipetir Mandiri', 'loc' => 'Area Lereng Kadudampit'],
                ];
            @endphp

            @foreach($dummyPotentials as $item)
            <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden group hover:border-cipetir-gold transition">
                <div class="h-44 bg-gradient-to-br from-cipetir-green to-gray-800 flex items-end p-4">
                    <span class="px-3 py-1 rounded-lg bg-cipetir-gold text-cipetir-dark text-xs font-extrabold">
                        {{ $item['sector'] }}
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-white group-hover:text-cipetir-gold transition mb-2">{{ $item['title'] }}</h3>
                    <p class="text-xs text-gray-400 mb-1">Pengelola: <span class="text-gray-200">{{ $item['owner'] }}</span></p>
                    <p class="text-xs text-gray-400">Lokasi: <span class="text-gray-200">{{ $item['loc'] }}</span></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TRANSPARANSI APBDES & PENGADUAN CTA (Mapping tabel: finances & complaints) -->
<section id="apbdes" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Ringkasan APBDes -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-gray-200 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-wider text-cipetir-emerald">Akuntabilitas Publik</span>
            <h3 class="text-2xl font-extrabold text-cipetir-dark mt-1 mb-6">Ringkasan APBDes TA 2026</h3>
            
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm font-bold mb-1">
                        <span class="text-gray-600">Pendapatan Desa</span>
                        <span class="text-cipetir-green">Rp 1.850.000.000</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3">
                        <div class="bg-cipetir-emerald h-3 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm font-bold mb-1">
                        <span class="text-gray-600">Realisasi Belanja Desa</span>
                        <span class="text-amber-600">Rp 1.420.000.000 (76.7%)</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3">
                        <div class="bg-cipetir-gold h-3 rounded-full" style="width: 77%"></div>
                    </div>
                </div>
            </div>

            <a href="#" class="inline-block mt-6 text-sm font-bold text-cipetir-green hover:underline">
                Lihat Detail Justifikasi & Bukti Realisasi &rarr;
            </a>
        </div>

        <!-- Kotak Pengaduan Warga -->
        <div id="pengaduan" class="bg-cipetir-green text-white rounded-2xl p-6 sm:p-8 shadow-md flex flex-col justify-between relative overflow-hidden">
            <div>
                <span class="px-3 py-1 rounded-full bg-cipetir-gold text-cipetir-dark text-xs font-extrabold">Aspirasi & Aduan</span>
                <h3 class="text-2xl font-extrabold mt-4 mb-3">Sampaikan Laporan atau Aspirasi Anda</h3>
                <p class="text-sm text-emerald-100 leading-relaxed mb-6">
                    Laporkan kendala infrastruktur, layanan publik, atau berikan saran pembangunan. Setiap laporan mendapatkan kode tiket untuk dipantau status tindak lanjutnya secara transparan.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('complaints.index') }}" class="bg-cipetir-gold hover:bg-cipetir-goldLight text-cipetir-dark font-bold text-sm px-5 py-3 rounded-xl transition">
                    Tulis Pengaduan Baru
                </a>
                <a href="{{ route('complaints.index') }}#lacak-tiket" class="bg-cipetir-dark hover:bg-black text-white font-semibold text-sm px-5 py-3 rounded-xl transition">
                    Cek Status Tiket
                </a>
            </div>
        </div>
    </div>
</section>
@endsection