@extends('layouts.app')

@section('title', 'Transparansi APBDes - Desa Cipetir Kabupaten Sukabumi')

@section('content')
@php
    // Dummy data disesuaikan dengan tabel 'finances' dan relasi 'justifications' pada ERD
    $finances = [
        '2026' => [
            'year' => 2026,
            'type' => 'APBDes Perubahan TA 2026',
            'start_bal' => 125000000,
            'income' => 1850000000,
            'expense' => 1420000000,
            'justifications' => [
                [
                    'id' => 1,
                    'title' => 'Pembangunan & Rabat Beton Jalan Lingkungan Kp. Babakan RW 02',
                    'amount' => 420000000,
                    'progress_pct' => 100,
                    'photo_url' => 'https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Pengecoran jalan desa sepanjang 450 meter dengan lebar 3 meter untuk memperlancar akses distribusi hasil pertanian warga.'
                ],
                [
                    'id' => 2,
                    'title' => 'Rehabilitasi Saluran Irigasi & Drainase Pertanian Cipetir Wetan',
                    'amount' => 315000000,
                    'progress_pct' => 85,
                    'photo_url' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Perbaikan dinding penahan tanah dan saluran air irigasi seluas 35 hektare lahan sawah produktif.'
                ],
                [
                    'id' => 3,
                    'title' => 'Penyaluran Bantuan Langsung Tunai (BLT) Dana Desa & Ketahanan Pangan',
                    'amount' => 360000000,
                    'progress_pct' => 75,
                    'photo_url' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Penyaluran bantuan triwulan I-III kepada 100 Keluarga Penerima Manfaat (KPM) serta pengadaan bibit hortikultura.'
                ],
                [
                    'id' => 4,
                    'title' => 'Peningkatan Sarana Posyandu & Pencegahan Stunting Balita',
                    'amount' => 145000000,
                    'progress_pct' => 60,
                    'photo_url' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Pengadaan alat ukur antropometri digital, pemberian makanan tambahan (PMT), dan insentif kader kesehatan di 6 Posyandu.'
                ],
                [
                    'id' => 5,
                    'title' => 'Digitalisasi Pelayanan Desa & Pemeliharaan Sistem Informasi',
                    'amount' => 180000000,
                    'progress_pct' => 90,
                    'photo_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Pengadaan perangkat komputer pelayanan terpadu, jaringan internet kantor desa, dan pengembangan portal informasi publik.'
                ],
            ]
        ],
        '2025' => [
            'year' => 2025,
            'type' => 'Realisasi Akhir APBDes TA 2025',
            'start_bal' => 98000000,
            'income' => 1720000000,
            'expense' => 1693000000,
            'justifications' => [
                [
                    'id' => 6,
                    'title' => 'Pembangunan Tembok Penahan Tanah (TPT) Area Rawan Longsor',
                    'amount' => 510000000,
                    'progress_pct' => 100,
                    'photo_url' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Pembangunan TPT sepanjang 120 meter di titik rawan pergeseran tanah wilayah RW 04.'
                ],
                [
                    'id' => 7,
                    'title' => 'Penyertaan Modal BUMDes Cipetir Mandiri Unit Agrowisata',
                    'amount' => 450000000,
                    'progress_pct' => 100,
                    'photo_url' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Pengembangan kios produk UMKM lokal dan penataan area wisata edukasi pertanian.'
                ],
                [
                    'id' => 8,
                    'title' => 'Pemasangan 45 Titik Penerangan Jalan Umum (PJU) Tenaga Surya',
                    'amount' => 733000000,
                    'progress_pct' => 100,
                    'photo_url' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80',
                    'info' => 'Pemasangan lampu jalan hemat energi di seluruh jalur utama penghubung antar-kedusunan.'
                ],
            ]
        ]
    ];
@endphp

<div x-data="{
    selectedYear: '2026',
    finances: @js($finances),
    activeProof: null,
    get current() {
        return this.finances[this.selectedYear];
    },
    get remainingBalance() {
        return (this.current.start_bal + this.current.income) - this.current.expense;
    },
    get realizationPct() {
        const totalAvailable = this.current.start_bal + this.current.income;
        return ((this.current.expense / totalAvailable) * 100).toFixed(1);
    },
    formatRupiah(angka) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
    }
}">
    <!-- Header Banner -->
    <section class="bg-cipetir-green text-white py-14 border-b-4 border-cipetir-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-cipetir-goldLight">Akuntabilitas & Keterbukaan Informasi</span>
                <h1 class="text-3xl sm:text-4xl font-extrabold mt-2 mb-3">Transparansi APBDes</h1>
                <p class="text-emerald-100 max-w-2xl text-sm sm:text-base">
                    Laporan pengelolaan Anggaran Pendapatan dan Belanja Desa (APBDes) beserta rincian justifikasi dan bukti fisik realisasi pembangunan Desa Cipetir.
                </p>
            </div>

            <!-- Filter Tahun Anggaran -->
            <div class="flex items-center gap-2 bg-cipetir-dark/60 p-1.5 rounded-xl border border-emerald-700/60 self-start">
                <template x-for="year in Object.keys(finances).reverse()" :key="year">
                    <button 
                        @click="selectedYear = year"
                        :class="selectedYear === year ? 'bg-cipetir-gold text-cipetir-dark font-extrabold shadow' : 'text-gray-200 hover:text-white font-semibold'"
                        class="px-4 py-2 rounded-lg text-xs sm:text-sm transition"
                        x-text="'TA ' + year"
                    ></button>
                </template>
            </div>
        </div>
    </section>

    <!-- Ringkasan Anggaran (Tabel: finances) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 sm:p-8">
            <div class="flex flex-wrap items-center justify-between gap-2 pb-5 mb-6 border-b border-gray-100">
                <div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-cipetir-green" x-text="current.type"></span>
                    <h2 class="text-lg font-extrabold text-cipetir-dark mt-2">Ikhtisar Keuangan Desa</h2>
                </div>
                <div class="text-right">
                    <span class="text-xs text-gray-500 block">Tingkat Serapan Belanja</span>
                    <span class="text-xl font-extrabold text-cipetir-emerald" x-text="realizationPct + '%'"></span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Saldo Awal -->
                <div class="p-5 rounded-xl bg-gray-50 border border-gray-200">
                    <p class="text-xs font-bold text-gray-500 uppercase">Saldo Awal (SiLPA Lalu)</p>
                    <p class="text-lg sm:text-xl font-extrabold text-cipetir-dark mt-2" x-text="formatRupiah(current.start_bal)"></p>
                </div>

                <!-- Pendapatan -->
                <div class="p-5 rounded-xl bg-emerald-50/80 border border-emerald-200">
                    <p class="text-xs font-bold text-cipetir-green uppercase">Total Pendapatan Desa</p>
                    <p class="text-lg sm:text-xl font-extrabold text-cipetir-green mt-2" x-text="formatRupiah(current.income)"></p>
                </div>

                <!-- Belanja -->
                <div class="p-5 rounded-xl bg-amber-50/80 border border-amber-200">
                    <p class="text-xs font-bold text-amber-800 uppercase">Realisasi Belanja Desa</p>
                    <p class="text-lg sm:text-xl font-extrabold text-amber-700 mt-2" x-text="formatRupiah(current.expense)"></p>
                </div>

                <!-- Sisa Anggaran -->
                <div class="p-5 rounded-xl bg-cipetir-dark text-white border border-gray-800">
                    <p class="text-xs font-bold text-cipetir-gold uppercase">Sisa Anggaran Berjalan</p>
                    <p class="text-lg sm:text-xl font-extrabold text-white mt-2" x-text="formatRupiah(remainingBalance)"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rincian Justifikasi & Realisasi Kegiatan (Tabel: justifications) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="mb-8">
            <span class="text-xs font-bold uppercase tracking-wider text-cipetir-emerald">Pertanggungjawaban Kegiatan</span>
            <h2 class="text-2xl font-extrabold text-cipetir-dark mt-1">Rincian Realisasi & Bukti Fisik</h2>
        </div>

        <div class="space-y-4">
            <template x-for="item in current.justifications" :key="item.id">
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:border-cipetir-emerald transition">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span 
                                    :class="item.progress_pct === 100 ? 'bg-emerald-100 text-cipetir-green' : 'bg-amber-100 text-amber-800'"
                                    class="px-2.5 py-1 rounded-md text-xs font-extrabold"
                                    x-text="item.progress_pct === 100 ? 'Selesai 100%' : 'Progres ' + item.progress_pct + '%'"
                                ></span>
                                <span class="text-sm font-extrabold text-cipetir-dark" x-text="formatRupiah(item.amount)"></span>
                            </div>

                            <h3 class="text-lg font-bold text-cipetir-dark mb-1.5" x-text="item.title"></h3>
                            <p class="text-sm text-gray-600 leading-relaxed" x-text="item.info"></p>

                            <!-- Progress Bar -->
                            <div class="mt-4 max-w-md">
                                <div class="flex justify-between text-[11px] font-bold text-gray-500 mb-1">
                                    <span>Realisasi Fisik & Keuangan</span>
                                    <span x-text="item.progress_pct + '%'"></span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2.5">
                                    <div 
                                        :class="item.progress_pct === 100 ? 'bg-cipetir-emerald' : 'bg-cipetir-gold'"
                                        class="h-2.5 rounded-full transition-all duration-500" 
                                        :style="'width: ' + item.progress_pct + '%'"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Lihat Bukti Foto -->
                        <div class="shrink-0">
                            <button 
                                @click="activeProof = item"
                                class="w-full lg:w-auto inline-flex items-center justify-center gap-2 bg-cipetir-dark hover:bg-cipetir-green text-white text-xs font-bold px-5 py-3 rounded-xl transition"
                            >
                                <svg class="w-4 h-4 text-cipetir-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Lihat Bukti Foto
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <!-- Modal Preview Bukti Realisasi -->
    <div x-show="activeProof" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/75 backdrop-blur-sm">
        <div @click.away="activeProof = null" class="bg-white rounded-2xl max-w-2xl w-full overflow-hidden shadow-2xl border-t-4 border-cipetir-gold">
            <template x-if="activeProof">
                <div>
                    <div class="relative h-64 sm:h-80 bg-gray-900">
                        <img :src="activeProof.photo_url" :alt="activeProof.title" class="w-full h-full object-cover">
                        <button @click="activeProof = null" class="absolute top-4 right-4 bg-black/70 text-white p-2 rounded-full hover:bg-black">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between gap-2 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-cipetir-green" x-text="'Progres: ' + activeProof.progress_pct + '%'"></span>
                            <span class="text-sm font-extrabold text-cipetir-dark" x-text="formatRupiah(activeProof.amount)"></span>
                        </div>
                        <h3 class="text-lg font-extrabold text-cipetir-dark mb-2" x-text="activeProof.title"></h3>
                        <p class="text-sm text-gray-600 leading-relaxed" x-text="activeProof.info"></p>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection