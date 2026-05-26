<x-app-layout>
    @section('title', 'Jadwal Mengajar')

    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
        <div>
            <h2 class="text-headline-md font-headline-md text-on-background mb-1">
                Jadwal Mengajar
            </h2>
            <p class="text-body-md font-body-md text-on-surface-variant">
                Kelola dan pantau jadwal serta dokumen penugasan Anda.
            </p>
        </div>
        <!-- Filter Bar -->
        <div class="flex items-center gap-3 bg-white p-2 rounded-lg shadow-[0_4px_20px_-5px_rgba(30,58,138,0.08)] border border-white">
            <div class="flex items-center gap-2 px-3 py-1.5 bg-surface-container-low rounded-md border border-outline-variant/30 hover:border-primary/30 transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-on-surface-variant text-[20px]">calendar_month</span>
                <select class="bg-transparent border-none p-0 text-label-md font-label-md text-on-surface focus:ring-0 cursor-pointer outline-none">
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                </select>
            </div>
            <div class="flex items-center gap-2 px-3 py-1.5 bg-surface-container-low rounded-md border border-outline-variant/30 hover:border-primary/30 transition-colors cursor-pointer">
                <select class="bg-transparent border-none p-0 text-label-md font-label-md text-on-surface focus:ring-0 cursor-pointer outline-none">
                    <option>2023</option>
                    <option>2024</option>
                </select>
            </div>
            <button class="bg-primary text-on-primary px-4 py-2 rounded-md text-label-md font-label-md hover:bg-primary-container transition-colors shadow-sm">
                Filter
            </button>
        </div>
    </div>
    
    <!-- Data Table Card (Glassmorphism / Raised) -->
    <div class="bg-white/80 backdrop-blur-md rounded-xl shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] border border-white/20 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/50 border-b border-outline-variant/50">
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider w-16">No</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Tanggal</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Materi</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Waktu</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Lokasi</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider text-right">Dokumen (SPMK)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30 text-body-md font-body-md text-on-surface">
                    <tr class="hover:bg-surface-container-lowest transition-colors group">
                        <td class="py-4 px-6 text-on-surface-variant">1</td>
                        <td class="py-4 px-6 font-medium">12 Okt 2023</td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-primary">Kepemimpinan Pelayanan</div>
                            <div class="text-label-sm text-on-surface-variant mt-0.5">Diklat PIM IV Angkatan II</div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1.5 text-on-surface-variant">
                                <span class="material-symbols-outlined text-[18px]">schedule</span>
                                <span>08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[18px] text-on-surface-variant">location_on</span>
                                <span>Balai Diklat BPSDM</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <button class="inline-flex items-center gap-1.5 bg-secondary/10 text-secondary hover:bg-secondary hover:text-white border border-secondary/20 px-3 py-1.5 rounded-md text-label-md font-label-md transition-all">
                                <span class="material-symbols-outlined text-[18px]">download</span>
                                Unduh
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-lowest transition-colors group">
                        <td class="py-4 px-6 text-on-surface-variant">2</td>
                        <td class="py-4 px-6 font-medium">15 Okt 2023</td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-primary">Manajemen Mutu</div>
                            <div class="text-label-sm text-on-surface-variant mt-0.5">Diklat Teknis Fungsional</div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1.5 text-on-surface-variant">
                                <span class="material-symbols-outlined text-[18px]">schedule</span>
                                <span>10.15 - 12.15</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[18px] text-on-surface-variant">location_on</span>
                                <span>Ruang Kelas C</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <span class="inline-flex items-center gap-1.5 bg-error-container text-error px-3 py-1.5 rounded-md text-label-md font-label-md border border-error/20">
                                <span class="material-symbols-outlined text-[18px]">warning</span>
                                Belum
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination Footer -->
        <div class="bg-surface-container-lowest/50 border-t border-outline-variant/30 px-6 py-4 flex items-center justify-between">
            <span class="text-label-md font-label-md text-on-surface-variant">Menampilkan 1-2 dari 12 jadwal</span>
            <div class="flex gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-surface-container-low disabled:opacity-50" disabled>
                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-primary bg-primary/5 text-primary font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface hover:bg-surface-container-low transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface hover:bg-surface-container-low transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
