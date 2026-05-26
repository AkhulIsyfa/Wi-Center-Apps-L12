<x-app-layout>
    @section('title', 'Detail Kelas')

    <style>
      /* Custom scrollbar for tab navigation */
      .tab-scroll::-webkit-scrollbar {
        height: 4px;
      }
      .tab-scroll::-webkit-scrollbar-track {
        background: transparent;
      }
      .tab-scroll::-webkit-scrollbar-thumb {
        background: rgba(30, 58, 138, 0.2);
        border-radius: 4px;
      }
    </style>

    <!-- LAYER 1: Tampilan utama halaman detail kelas -->
    <section class="bg-slate-50 border-b border-slate-200 -mx-margin-mobile md:-mx-margin-desktop -mt-margin-mobile md:-mt-margin-desktop mb-6">
        <!-- Header Detail Kelas -->
        <div class="px-7 py-6">
          <div class="mb-5 flex items-center gap-2 text-sm">
            <a href="{{ route('classes.index') }}" class="font-semibold text-slate-700 hover:text-primary">
              Kelas Saya
            </a>
            <span class="material-symbols-outlined text-base text-slate-400">chevron_right</span>
            <span class="font-semibold text-primary">Pelatihan TOT Angkatan 3</span>
          </div>

          <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">
              <div>
                <span class="inline-flex items-center gap-2 rounded-full bg-green-50 text-green-700 border border-green-200 px-3 py-1 text-xs font-semibold">
                  <span class="w-2 h-2 rounded-full bg-green-600"></span>
                  Aktif
                </span>

                <h1 class="text-3xl font-bold text-primary mt-3">
                  Pelatihan TOT Angkatan 3
                </h1>

                <div class="flex flex-wrap gap-5 text-sm text-slate-600 mt-4">
                  <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">calendar_month</span>
                    1 - 15 Mei 2024
                  </span>
                  <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">groups</span>
                    25 Peserta
                  </span>
                  <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">location_on</span>
                    Ruang Kelas A / Online Hybrid
                  </span>
                </div>
              </div>

              <button class="inline-flex items-center justify-center gap-2 rounded-lg border border-primary px-5 py-2.5 text-primary font-semibold hover:bg-primary/5">
                <span class="material-symbols-outlined text-lg">edit</span>
                Edit Kelas
              </button>
            </div>
          </div>
        </div>

        <!-- Tab Navigation -->
        <div class="bg-white border-t border-slate-200 px-7 overflow-x-auto tab-scroll">
            <nav class="flex gap-8 min-w-max" id="classTabs">
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-primary text-primary" data-tab="ringkasan">Ringkasan</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="materi">Materi</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="peserta">Peserta</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="diskusi">Diskusi</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="penilaian">Penilaian</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="evaluasi">Evaluasi</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="buat-tugas">+ Buat Tugas</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="pengumpulan-tugas">Pengumpulan Tugas</button>
            </nav>
        </div>
    </section>

    <!-- Tab Content Wrapper -->
    <div class="bg-slate-50 rounded-xl p-6 min-h-[calc(100vh-360px)]">
        <!-- TAB 1: RINGKASAN -->
        <section id="tab-ringkasan" class="tab-content block space-y-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-primary">Ringkasan Kelas</h2>
                    <p class="text-slate-500 mt-1">Monitoring umum aktivitas Pelatihan TOT Angkatan 3.</p>
                </div>
                <button class="px-4 py-2 rounded-lg border border-primary text-primary font-semibold hover:bg-primary/5">Unduh Ringkasan</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Total Peserta</p>
                        <span class="material-symbols-outlined text-primary">groups</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">25</h3>
                    <p class="text-sm text-green-600 mt-1">24 aktif, 1 perlu perhatian</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Materi Tersedia</p>
                        <span class="material-symbols-outlined text-primary">folder</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">8</h3>
                    <p class="text-sm text-slate-500 mt-1">PDF, PPTX, dan referensi</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Tugas Aktif</p>
                        <span class="material-symbols-outlined text-primary">assignment</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">3</h3>
                    <p class="text-sm text-orange-600 mt-1">1 tugas mendekati deadline</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Progress Kelas</p>
                        <span class="material-symbols-outlined text-primary">trending_up</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">65%</h3>
                    <div class="w-full bg-slate-100 rounded-full h-2 mt-3">
                        <div class="bg-primary h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                    <h3 class="text-lg font-bold text-primary mb-5">Aktivitas Terbaru</h3>
                    <div class="space-y-5">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center">
                                <span class="material-symbols-outlined text-sm">upload_file</span>
                            </div>
                            <div>
                                <p class="font-semibold text-slate-800">Materi baru diunggah</p>
                                <p class="text-sm text-slate-500">02 - Teknik Komunikasi Efektif.pdf ditambahkan pada Modul 2.</p>
                                <p class="text-xs text-slate-400 mt-1">3 Mei 2024, 09:15</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100">
                    <h3 class="text-lg font-bold text-primary mb-5">Jadwal Berikutnya</h3>
                    <div class="space-y-5">
                        <div class="border-l-4 border-primary pl-4">
                            <p class="text-sm font-bold text-primary">6 Mei 2024</p>
                            <p class="font-semibold text-slate-800 mt-1">Praktik Micro Teaching</p>
                            <p class="text-sm text-slate-500">09:00 - 12:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Other tabs would go here... -->
        
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => {
                        t.classList.remove('border-primary', 'text-primary');
                        t.classList.add('border-transparent', 'text-slate-600');
                    });
                    
                    tab.classList.remove('border-transparent', 'text-slate-600');
                    tab.classList.add('border-primary', 'text-primary');
                    
                    // Logic to toggle content would go here
                });
            });
        });
    </script>
</x-app-layout>
