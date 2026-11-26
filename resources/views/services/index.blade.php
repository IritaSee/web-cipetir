@extends('layouts.app')

@section('title', 'Layanan Publik - Desa Cipetir Kabupaten Sukabumi')

@section('content')
@php
    // Dummy data disesuaikan dengan struktur kolom tabel 'services' pada ERD
    $services = [
        [
            'id' => 1,
            'name' => 'Surat Pengantar KTP & Kartu Keluarga (KK)',
            'slug' => 'surat-pengantar-ktp-kk',
            'description' => 'Layanan penerbitan surat pengantar tingkat desa untuk perekaman e-KTP baru, pembaruan data, atau penerbitan Kartu Keluarga baru.',
            'requirements' => [
                'Fotokopi Kartu Keluarga (KK) lama / Akta Kelahiran',
                'Surat Pengantar dari Ketua RT dan RW setempat',
                'Surat Keterangan Kehilangan dari Kepolisian (jika hilang)',
            ],
            'procedure' => [
                'Pemohon meminta surat pengantar dari RT/RW setempat.',
                'Datang ke loket pelayanan Kantor Desa Cipetir dengan membawa berkas.',
                'Petugas memverifikasi kelengkapan berkas dan mencetak surat pengantar.',
                'Penandatanganan oleh Kepala Desa / Sekretaris Desa.',
            ],
            'processing_time' => '1 Hari Kerja',
            'fee' => 'Gratis (Rp 0)',
            'form_file_url' => '#unduh-formulir-f101',
            'is_active' => true,
        ],
        [
            'id' => 2,
            'name' => 'Surat Keterangan Usaha (SKU)',
            'slug' => 'surat-keterangan-usaha',
            'description' => 'Surat resmi yang menerangkan domisili dan jenis usaha mikro/kecil milik warga Desa Cipetir untuk pengajuan KUR atau NIB.',
            'requirements' => [
                'Fotokopi KTP dan Kartu Keluarga pemohon',
                'Surat Pengantar RT/RW yang menerangkan keberadaan usaha',
                'Foto tempat/lokasi usaha yang sedang berjalan',
            ],
            'procedure' => [
                'Menyerahkan berkas persyaratan ke meja pelayanan desa.',
                'Verifikasi lapangan singkat oleh perangkat desa jika diperlukan.',
                'Penerbitan dan pengesahan Surat Keterangan Usaha.',
            ],
            'processing_time' => '1 Hari Kerja',
            'fee' => 'Gratis (Rp 0)',
            'form_file_url' => '#unduh-formulir-sku',
            'is_active' => true,
        ],
        [
            'id' => 3,
            'name' => 'Surat Keterangan Tidak Mampu (SKTM)',
            'slug' => 'surat-keterangan-tidak-mampu',
            'description' => 'Surat rekomendasi resmi desa untuk keperluan keringanan biaya pendidikan (beasiswa/KIP), kesehatan, maupun bantuan sosial.',
            'requirements' => [
                'Fotokopi KTP dan Kartu Keluarga pemohon',
                'Surat Pengantar dari RT dan RW setempat',
                'Surat pernyataan kondisi ekonomi keluarga',
            ],
            'procedure' => [
                'Mengajukan surat pengantar melalui RT/RW.',
                'Pengecekan data DTKS oleh operator desa.',
                'Penerbitan SKTM untuk diteruskan ke tingkat Kecamatan jika diperlukan.',
            ],
            'processing_time' => 'Langsung Jadi (30 Menit)',
            'fee' => 'Gratis (Rp 0)',
            'form_file_url' => null,
            'is_active' => true,
        ],
        [
            'id' => 4,
            'name' => 'Surat Keterangan Domisili Warga / Lembaga',
            'slug' => 'surat-keterangan-domisili',
            'description' => 'Keterangan tempat tinggal sementara bagi warga pendatang maupun keterangan domisili sekretariat organisasi/yayasan di Desa Cipetir.',
            'requirements' => [
                'Fotokopi KTP pemohon / pengurus lembaga',
                'Surat Pengantar RT/RW lokasi domisili',
                'Akta pendirian (khusus untuk lembaga/yayasan)',
            ],
            'procedure' => [
                'Melapor ke Ketua RT/RW setempat maksimal 2x24 jam.',
                'Membawa surat pengantar ke Kantor Desa Cipetir.',
                'Pencatatan buku register penduduk dan penerbitan surat.',
            ],
            'processing_time' => '1 Hari Kerja',
            'fee' => 'Gratis (Rp 0)',
            'form_file_url' => '#unduh-formulir-domisili',
            'is_active' => true,
        ],
    ];
@endphp

<div x-data="{
    search: '',
    selectedService: null,
    services: @js($services),
    get filteredServices() {
        if (this.search.trim() === '') return this.services;
        return this.services.filter(item => 
            item.name.toLowerCase().includes(this.search.toLowerCase()) ||
            item.description.toLowerCase().includes(this.search.toLowerCase())
        );
    }
}">
    <!-- Header Banner -->
    <section class="bg-cipetir-green text-white py-14 border-b-4 border-cipetir-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-wider text-cipetir-goldLight">Standar Pelayanan Publik</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold mt-2 mb-4">Administrasi & Layanan Desa</h1>
            <p class="text-emerald-100 max-w-2xl text-sm sm:text-base leading-relaxed">
                Cek kelengkapan berkas, alur pengurusan, estimasi waktu, dan unduh formulir permohonan dari rumah sebelum datang ke Kantor Desa Cipetir.
            </p>

            <!-- Search Bar -->
            <div class="mt-8 max-w-xl relative">
                <input 
                    type="text" 
                    x-model="search" 
                    placeholder="Cari jenis surat atau layanan (contoh: SKU, KTP, Domisili)..." 
                    class="w-full pl-5 pr-12 py-3.5 rounded-xl bg-white text-cipetir-dark placeholder-gray-400 text-sm font-medium shadow-lg focus:outline-none focus:ring-2 focus:ring-cipetir-gold"
                >
                <svg class="w-5 h-5 text-gray-400 absolute right-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Daftar Kartu Layanan -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <template x-for="service in filteredServices" :key="service.id">
                <div class="bg-white rounded-2xl p-6 sm:p-7 border border-gray-200 shadow-sm hover:shadow-md hover:border-cipetir-emerald transition flex flex-col justify-between">
                    <div>
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-cipetir-green" x-text="service.fee"></span>
                            <span class="text-xs font-semibold text-gray-500 flex items-center gap-1">
                                <svg class="w-4 h-4 text-cipetir-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span x-text="service.processing_time"></span>
                            </span>
                        </div>
                        <h2 class="text-xl font-extrabold text-cipetir-dark mb-2" x-text="service.name"></h2>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6" x-text="service.description"></p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3">
                        <button 
                            @click="selectedService = service" 
                            class="bg-cipetir-dark hover:bg-cipetir-green text-white text-xs font-bold px-5 py-2.5 rounded-xl transition"
                        >
                            Lihat Syarat & Alur
                        </button>
                        <template x-if="service.form_file_url">
                            <a :href="service.form_file_url" class="text-xs font-bold text-cipetir-emerald hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Unduh Formulir
                            </a>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <!-- Empty State -->
        <div x-show="filteredServices.length === 0" class="text-center py-12 bg-white rounded-2xl border border-gray-200">
            <p class="text-gray-500 font-semibold">Layanan dengan kata kunci "<span x-text="search" class="text-cipetir-dark"></span>" tidak ditemukan.</p>
        </div>
    </section>

    <!-- Modal Detail Persyaratan & Prosedur -->
    <div x-show="selectedService" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
        <div @click.away="selectedService = null" class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border-t-4 border-cipetir-gold">
            <template x-if="selectedService">
                <div class="p-6 sm:p-8">
                    <div class="flex justify-between items-start gap-4 pb-4 border-b border-gray-100">
                        <div>
                            <span class="px-2.5 py-1 rounded-md bg-amber-100 text-amber-800 text-xs font-bold" x-text="selectedService.processing_time"></span>
                            <h3 class="text-xl sm:text-2xl font-extrabold text-cipetir-dark mt-2" x-text="selectedService.name"></h3>
                        </div>
                        <button @click="selectedService = null" class="p-2 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-cipetir-dark">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <div class="mt-6 space-y-6">
                        <!-- Persyaratan -->
                        <div>
                            <h4 class="text-sm font-extrabold uppercase tracking-wider text-cipetir-green mb-3">Dokumen Persyaratan</h4>
                            <ul class="space-y-2">
                                <template x-for="(req, idx) in selectedService.requirements" :key="idx">
                                    <li class="flex items-start gap-2.5 text-sm text-gray-700">
                                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-cipetir-green font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">&#10003;</span>
                                        <span x-text="req"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <!-- Prosedur -->
                        <div>
                            <h4 class="text-sm font-extrabold uppercase tracking-wider text-cipetir-green mb-3">Alur / Prosedur Pelayanan</h4>
                            <ol class="space-y-2.5">
                                <template x-for="(step, idx) in selectedService.procedure" :key="idx">
                                    <li class="flex items-start gap-3 text-sm text-gray-700">
                                        <span class="w-6 h-6 rounded-lg bg-cipetir-dark text-cipetir-gold font-bold text-xs flex items-center justify-center shrink-0" x-text="idx + 1"></span>
                                        <span x-text="step" class="pt-0.5"></span>
                                    </li>
                                </template>
                            </ol>
                        </div>
                    </div>

                    <div class="mt-8 pt-5 border-t border-gray-100 flex flex-wrap justify-between items-center gap-3">
                        <div class="text-xs text-gray-500">
                            Biaya Retribusi: <strong class="text-cipetir-green" x-text="selectedService.fee"></strong>
                        </div>
                        <div class="flex gap-3">
                            <template x-if="selectedService.form_file_url">
                                <a :href="selectedService.form_file_url" class="bg-cipetir-gold hover:bg-cipetir-goldLight text-cipetir-dark font-bold text-xs px-4 py-2.5 rounded-xl transition">
                                    Unduh Formulir PDF
                                </a>
                            </template>
                            <button @click="selectedService = null" class="bg-gray-200 hover:bg-gray-300 text-cipetir-dark font-bold text-xs px-4 py-2.5 rounded-xl transition">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection