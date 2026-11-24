@extends('layouts.app')

@section('title', 'Pengaduan Warga - Desa Cipetir Kabupaten Sukabumi')

@section('content')
<section class="bg-cipetir-dark text-white py-14 border-b-4 border-cipetir-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-wider text-cipetir-gold">Partisipasi Masyarakat</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-2 mb-3">Layanan Aspirasi & Pengaduan Warga</h1>
        <p class="text-gray-300 max-w-2xl text-sm sm:text-base">
            Sampaikan laporan kendala infrastruktur, pelayanan desa, maupun usulan pembangunan. Simpan kode tiket Anda untuk memantau tindak lanjut perangkat desa.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- KOLOM KIRI: Form Pengaduan Baru (7 Kolom) -->
        <div class="lg:col-span-7 bg-white rounded-2xl p-6 sm:p-8 border border-gray-200 shadow-sm">
            <h2 class="text-xl font-extrabold text-cipetir-dark mb-1">Formulir Laporan Baru</h2>
            <p class="text-xs text-gray-500 mb-6">Identitas pelapor dijaga kerahasiaannya untuk keperluan verifikasi tindak lanjut.</p>

            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">Nama Lengkap Pelapor *</label>
                        <input type="text" name="sender_name" required placeholder="Contoh: Asep Saepuloh" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:border-cipetir-green focus:ring-1 focus:ring-cipetir-green outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">No. WhatsApp / Telepon *</label>
                        <input type="tel" name="sender_phone" required placeholder="0812xxxxxxxx" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:border-cipetir-green focus:ring-1 focus:ring-cipetir-green outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">Kategori Laporan *</label>
                        <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm bg-white focus:border-cipetir-green focus:ring-1 focus:ring-cipetir-green outline-none">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Infrastruktur & Jalan">Infrastruktur & Jalan Desa</option>
                            <option value="Pelayanan Administrasi">Pelayanan Administrasi</option>
                            <option value="Bantuan Sosial">Bantuan Sosial & Kependudukan</option>
                            <option value="Keamanan & Lingkungan">Keamanan & Kebersihan Lingkungan</option>
                            <option value="Lainnya">Aspirasi / Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">Judul / Subjek Singkat *</label>
                        <input type="text" name="subject" required placeholder="Contoh: Lampu PJU Mati di Kp. Babakan" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:border-cipetir-green focus:ring-1 focus:ring-cipetir-green outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">Rincian Laporan / Lokasi Kejadian *</label>
                    <textarea name="message" rows="4" required placeholder="Jelaskan kronologi, patokan lokasi RT/RW, atau detail keluhan secara jelas..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:border-cipetir-green focus:ring-1 focus:ring-cipetir-green outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">Foto Bukti / Lampiran (Opsional)</label>
                    <input type="file" name="attachment" accept="image/*,.pdf" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-cipetir-green hover:file:bg-emerald-100 cursor-pointer border border-gray-200 rounded-xl">
                    <p class="text-[11px] text-gray-400 mt-1">Format JPG, PNG, atau PDF maksimal 2MB.</p>
                </div>

                <button type="submit" class="w-full bg-cipetir-green hover:bg-cipetir-emerald text-white font-bold py-3.5 px-6 rounded-xl shadow-md transition">
                    Kirim Laporan & Dapatkan Kode Tiket
                </button>
            </form>
        </div>

        <!-- KOLOM KANAN: Lacak Status Tiket (5 Kolom) -->
        <div id="lacak-tiket" x-data="{
            ticketInput: 'CPT-2026-001',
            result: {
                ticket_code: 'CPT-2026-001',
                category: 'Infrastruktur & Jalan',
                subject: 'Perbaikan Saluran Drainase RT 03',
                status: 'Diproses',
                updated_at: '22 Nov 2026, 14:30 WIB',
                admin_response: 'Laporan telah diterima Kasi Pembangunan. Tim teknis desa dijadwalkan melakukan peninjauan lokasi bersama Ketua RT 03 besok pagi.'
            },
            checkTicket() {
                if (this.ticketInput.trim().toUpperCase() === 'CPT-2026-001') {
                    this.result = {
                        ticket_code: 'CPT-2026-001',
                        category: 'Infrastruktur & Jalan',
                        subject: 'Perbaikan Saluran Drainase RT 03',
                        status: 'Diproses',
                        updated_at: '22 Nov 2026, 14:30 WIB',
                        admin_response: 'Laporan telah diterima Kasi Pembangunan. Tim teknis desa dijadwalkan melakukan peninjauan lokasi bersama Ketua RT 03 besok pagi.'
                    };
                } else {
                    this.result = 'not_found';
                }
            }
        }" class="lg:col-span-5 bg-cipetir-green text-white rounded-2xl p-6 sm:p-8 shadow-lg border-t-4 border-cipetir-gold">
            <h2 class="text-xl font-extrabold mb-1">Lacak Status Pengaduan</h2>
            <p class="text-xs text-emerald-100 mb-5">Masukkan kode tiket yang Anda terima saat mengirim laporan (coba ketik: <code class="bg-black/30 px-1.5 py-0.5 rounded text-cipetir-gold">CPT-2026-001</code>).</p>

            <div class="flex gap-2 mb-6">
                <input 
                    type="text" 
                    x-model="ticketInput" 
                    placeholder="Contoh: CPT-2026-001" 
                    class="flex-1 px-4 py-2.5 rounded-xl bg-white text-cipetir-dark font-bold text-sm uppercase focus:outline-none focus:ring-2 focus:ring-cipetir-gold"
                >
                <button @click="checkTicket()" type="button" class="bg-cipetir-gold hover:bg-cipetir-goldLight text-cipetir-dark font-extrabold text-sm px-5 py-2.5 rounded-xl transition">
                    Cek
                </button>
            </div>

            <!-- Hasil Pencarian Tiket -->
            <template x-if="result && result !== 'not_found'">
                <div class="bg-cipetir-dark/90 rounded-xl p-5 border border-emerald-700/60 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold text-cipetir-gold" x-text="result.ticket_code"></span>
                        <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-amber-400/20 text-cipetir-goldLight border border-cipetir-gold/40" x-text="result.status"></span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400" x-text="result.category"></p>
                        <h3 class="text-sm font-bold text-white mt-0.5" x-text="result.subject"></h3>
                    </div>
                    <div class="pt-3 border-t border-gray-800">
                        <p class="text-[11px] font-bold uppercase text-emerald-400 mb-1">Tanggapan Admin Desa:</p>
                        <p class="text-xs text-gray-300 leading-relaxed" x-text="result.admin_response"></p>
                        <p class="text-[10px] text-gray-500 mt-2">Diperbarui: <span x-text="result.updated_at"></span></p>
                    </div>
                </div>
            </template>

            <template x-if="result === 'not_found'">
                <div class="bg-red-950/60 border border-red-500/40 rounded-xl p-4 text-xs text-red-200">
                    Kode tiket tidak ditemukan. Pastikan penulisan kode sesuai dengan bukti pengaduan Anda.
                </div>
            </template>
        </div>

    </div>
</section>
@endsection