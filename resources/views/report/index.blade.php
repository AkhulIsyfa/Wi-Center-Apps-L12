<x-app-layout>
    @section('title', 'Laporan JP')

    <!-- Header Section -->
    <div class="md:hidden mb-6">
        <h1 class="text-headline-sm font-headline-sm text-on-surface">
            Laporan Jam Pelajaran (JP)
        </h1>
        <p class="text-body-md font-body-md text-on-surface-variant mt-1">
            Review your cumulative teaching hours.
        </p>
    </div>
    
    <div class="hidden md:block mb-6">
        <h1 class="text-headline-sm font-headline-sm text-on-surface">
            Laporan Jam Pelajaran (JP)
        </h1>
        <p class="text-body-md font-body-md text-on-surface-variant mt-1">
            Review your cumulative teaching hours.
        </p>
    </div>

    <!-- Filter Bar -->
    <div class="bg-surface-container-lowest p-6 rounded-xl border border-white shadow-[0_20px_20px_-5px_rgba(30,58,138,0.08)] flex flex-col sm:flex-row gap-4 items-end mb-6">
        <div class="w-full sm:w-auto flex-1">
            <label class="block text-label-sm font-label-sm text-on-surface-variant uppercase mb-2" for="month">Bulan</label>
            <div class="relative">
                <select class="w-full appearance-none bg-surface border border-outline-variant text-on-surface text-body-md font-body-md rounded-lg pl-4 pr-10 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" id="month">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option selected value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-on-surface-variant">
                    <span class="material-symbols-outlined" data-icon="expand_more">expand_more</span>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-auto flex-1">
            <label class="block text-label-sm font-label-sm text-on-surface-variant uppercase mb-2" for="year">Tahun</label>
            <div class="relative">
                <select class="w-full appearance-none bg-surface border border-outline-variant text-on-surface text-body-md font-body-md rounded-lg pl-4 pr-10 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" id="year">
                    <option value="2023">2023</option>
                    <option selected value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-on-surface-variant">
                    <span class="material-symbols-outlined" data-icon="expand_more">expand_more</span>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-auto">
            <button class="w-full bg-primary text-on-primary text-label-md font-label-md px-6 py-2.5 rounded-lg hover:bg-primary-container transition-colors flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-[20px]" data-icon="filter_list">filter_list</span>
                Terapkan Filter
            </button>
        </div>
    </div>

    <!-- Report Table -->
    <div class="bg-surface-container-lowest rounded-xl border border-white shadow-[0_20px_20px_-5px_rgba(30,58,138,0.08)] overflow-hidden flex flex-col flex-1 mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[600px]">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant/30">
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider w-16">No</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Materi Modul</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Lokasi (Balai)</th>
                        <th class="py-4 px-6 text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider text-right w-32">JP (Jam)</th>
                    </tr>
                </thead>
                <tbody class="text-body-md font-body-md text-on-surface divide-y divide-outline-variant/30">
                    <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                        <td class="py-4 px-6 text-on-surface-variant">1</td>
                        <td class="py-4 px-6">Kepemimpinan Strategis Sektor Publik</td>
                        <td class="py-4 px-6 text-on-surface-variant">BPSDM Provinsi Jawa Barat</td>
                        <td class="py-4 px-6 text-right font-medium">8 JP</td>
                    </tr>
                    <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                        <td class="py-4 px-6 text-on-surface-variant">2</td>
                        <td class="py-4 px-6">Manajemen Risiko Keuangan Daerah</td>
                        <td class="py-4 px-6 text-on-surface-variant">Pusdiklatwas BPKP Ciawi</td>
                        <td class="py-4 px-6 text-right font-medium">6 JP</td>
                    </tr>
                    <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                        <td class="py-4 px-6 text-on-surface-variant">3</td>
                        <td class="py-4 px-6">Etika dan Integritas ASN</td>
                        <td class="py-4 px-6 text-on-surface-variant">BPSDM Kementerian Dalam Negeri</td>
                        <td class="py-4 px-6 text-right font-medium">4 JP</td>
                    </tr>
                    <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                        <td class="py-4 px-6 text-on-surface-variant">4</td>
                        <td class="py-4 px-6">Inovasi Pelayanan Publik Berbasis Digital</td>
                        <td class="py-4 px-6 text-on-surface-variant">BPSDM Provinsi DKI Jakarta</td>
                        <td class="py-4 px-6 text-right font-medium">2 JP</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="bg-surface-container border-t border-primary/20">
                        <td class="py-4 px-6 text-right text-headline-sm font-headline-sm text-primary" colspan="3">
                            Total Kumulatif JP:
                        </td>
                        <td class="py-4 px-6 text-right text-headline-sm font-headline-sm text-primary font-bold">
                            20 JP
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="flex justify-end gap-4 mt-2">
        <button class="border border-primary text-primary bg-transparent text-label-md font-label-md px-6 py-2.5 rounded-lg hover:bg-primary/5 transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]" data-icon="download">download</span>
            Unduh PDF
        </button>
        <button class="bg-secondary text-on-secondary text-label-md font-label-md px-6 py-2.5 rounded-lg hover:bg-secondary-fixed transition-colors flex items-center gap-2 shadow-[0_4px_12px_rgba(0,108,73,0.2)]">
            <span class="material-symbols-outlined text-[20px]" data-icon="print">print</span>
            Cetak Laporan
        </button>
    </div>
</x-app-layout>
