@extends('layouts.app')

@section('title', 'Statistik Kependudukan - Desa Cipetir Kabupaten Sukabumi')

@section('content')
@php
    // Dummy data disesuaikan dengan kolom tabel 'stats' pada ERD
    $statsData = [
        '2026' => [
            'year' => 2026,
            'total_population' => 6420,
            'total_kk' => 1985,
            'male_population' => 3250,
            'female_population' => 3170,
            'ages' => [
                ['label' => 'Usia 0 - 5 Tahun (Balita)', 'count' => 540],
                ['label' => 'Usia 6 - 12 Tahun (Anak / SD)', 'count' => 780],
                ['label' => 'Usia 13 - 17 Tahun (Remaja)', 'count' => 690],
                ['label' => 'Usia 18 - 25 Tahun (Pemuda)', 'count' => 920],
                ['label' => 'Usia 26 - 40 Tahun (Produktif Awal)', 'count' => 1540],
                ['label' => 'Usia 41 - 54 Tahun (Produktif Akhir)', 'count' => 1130],
                ['label' => 'Usia 55+ Tahun (Lansia)', 'count' => 820],
            ]
        ],
        '2025' => [
            'year' => 2025,
            'total_population' => 6295,
            'total_kk' => 1940,
            'male_population' => 3185,
            'female_population' => 3110,
            'ages' => [
                ['label' => 'Usia 0 - 5 Tahun (Balita)', 'count' => 525],
                ['label' => 'Usia 6 - 12 Tahun (Anak / SD)', 'count' => 770],
                ['label' => 'Usia 13 - 17 Tahun (Remaja)', 'count' => 680],
                ['label' => 'Usia 18 - 25 Tahun (Pemuda)', 'count' => 905],
                ['label' => 'Usia 26 - 40 Tahun (Produktif Awal)', 'count' => 1510],
                ['label' => 'Usia 41 - 54 Tahun (Produktif Akhir)', 'count' => 1105],
                ['label' => 'Usia 55+ Tahun (Lansia)', 'count' => 800],
            ]
        ]
    ];
@endphp

<div x-data="{
    selectedYear: '2026',
    statsData: @js($statsData),
    get current() {
        return this.statsData[this.selectedYear];
    },
    get malePct() {
        return ((this.current.male_population / this.current.total_population) * 100).toFixed(1);
    },
    get femalePct() {
        return ((this.current.female_population / this.current.total_population) * 100).toFixed(1);
    },
    get maxAgeCount() {
        return Math.max(...this.current.ages.map(a => a.count));
    },
    formatNumber(num) {
        return new Intl.NumberFormat('id-ID').format(num);
    }
}">
    <!-- Header Banner -->
    <section class="bg-cipetir-dark text-white py-14 border-b-4 border-cipetir-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-cipetir-gold">Data Monografi & Demografi</span>
                <h1 class="text-3xl sm:text-4xl font-extrabold mt-2 mb-3">Statistik Kependudukan Desa</h1>
                <p class="text-gray-300 max-w-2xl text-sm sm:text-base">
                    Rekapitulasi data jumlah penduduk, kepala keluarga, rasio jenis kelamin, dan struktur kelompok usia masyarakat Desa Cipetir.
                </p>
            </div>

            <!-- Pilihan Tahun Data -->
            <div class="flex items-center gap-2 bg-gray-900 p-1.5 rounded-xl border border-gray-800 self-start">
                <template x-for="year in Object.keys(statsData).reverse()" :key="year">
                    <button 
                        @click="selectedYear = year"
                        :class="selectedYear === year ? 'bg-cipetir-gold text-cipetir-dark font-extrabold' : 'text-gray-300 hover:text-white font-semibold'"
                        class="px-4 py-2 rounded-lg text-xs sm:text-sm transition"
                        x-text="'Tahun ' + year"
                    ></button>
                </template>
            </div>
        </div>
    </section>

    <!-- 4 Kartu Ringkasan Populasi -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white rounded-2xl p-6 shadow-md border-t-4 border-cipetir-green">
                <p class="text-xs font-bold text-gray-500 uppercase">Total Penduduk</p>
                <p class="text-3xl font-extrabold text-cipetir-dark mt-2" x-text="formatNumber(current.total_population)"></p>
                <span class="text-xs text-cipetir-emerald font-semibold mt-1 block">Jiwa Terdaftar</span>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md border-t-4 border-cipetir-gold">
                <p class="text-xs font-bold text-gray-500 uppercase">Kepala Keluarga</p>
                <p class="text-3xl font-extrabold text-cipetir-dark mt-2" x-text="formatNumber(current.total_kk)"></p>
                <span class="text-xs text-amber-700 font-semibold mt-1 block">Kartu Keluarga (KK)</span>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md border-t-4 border-cipetir-emerald">
                <p class="text-xs font-bold text-gray-500 uppercase">Penduduk Laki-Laki</p>
                <p class="text-3xl font-extrabold text-cipetir-dark mt-2" x-text="formatNumber(current.male_population)"></p>
                <span class="text-xs text-gray-500 font-semibold mt-1 block" x-text="malePct + '% dari Total'"></span>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md border-t-4 border-gray-900">
                <p class="text-xs font-bold text-gray-500 uppercase">Penduduk Perempuan</p>
                <p class="text-3xl font-extrabold text-cipetir-dark mt-2" x-text="formatNumber(current.female_population)"></p>
                <span class="text-xs text-gray-500 font-semibold mt-1 block" x-text="femalePct + '% dari Total'"></span>
            </div>
        </div>
    </section>

    <!-- Visualisasi Perbandingan Gender & Kelompok Umur -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-8">
        
        <!-- Rasio Jenis Kelamin -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-gray-200 shadow-sm">
            <h2 class="text-lg font-extrabold text-cipetir-dark mb-1">Komposisi Berdasarkan Jenis Kelamin</h2>
            <p class="text-xs text-gray-500 mb-6">Perbandingan populasi laki-laki dan perempuan Desa Cipetir.</p>

            <div class="w-full h-8 rounded-xl overflow-hidden flex font-bold text-xs shadow-inner">
                <div 
                    class="bg-cipetir-green text-white flex items-center justify-center transition-all duration-500"
                    :style="'width: ' + malePct + '%'"
                    x-text="'Laki-laki (' + malePct + '%)'"
                ></div>
                <div 
                    class="bg-cipetir-gold text-cipetir-dark flex items-center justify-center transition-all duration-500"
                    :style="'width: ' + femalePct + '%'"
                    x-text="'Perempuan (' + femalePct + '%)'"
                ></div>
            </div>
        </div>

        <!-- Distribusi Kelompok Umur -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-gray-200 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 pb-4 border-b border-gray-100">
                <div>
                    <h2 class="text-lg font-extrabold text-cipetir-dark">Distribusi Kelompok Usia</h2>
                    <p class="text-xs text-gray-500">Pemetaan demografi usia produktif, pelajar, balita, dan lansia.</p>
                </div>
                <span class="text-xs font-bold text-cipetir-emerald mt-2 sm:mt-0" x-text="'Total: ' + formatNumber(current.total_population) + ' Jiwa'"></span>
            </div>

            <div class="space-y-5">
                <template x-for="(age, index) in current.ages" :key="index">
                    <div>
                        <div class="flex justify-between text-xs sm:text-sm font-bold mb-1.5">
                            <span class="text-cipetir-dark" x-text="age.label"></span>
                            <span class="text-gray-600">
                                <strong class="text-cipetir-green" x-text="formatNumber(age.count) + ' Jiwa'"></strong>
                                <span class="text-xs text-gray-400" x-text="' (' + ((age.count / current.total_population) * 100).toFixed(1) + '%)'"></span>
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3.5 overflow-hidden">
                            <div 
                                class="bg-gradient-to-r from-cipetir-green to-cipetir-emerald h-3.5 rounded-full transition-all duration-500"
                                :style="'width: ' + ((age.count / maxAgeCount) * 100) + '%'"
                            ></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </section>
</div>
@endsection