<x-app-layout>
    @section('title', 'Dashboard')

    <!-- Welcome Banner -->
    <section class="glass-panel rounded-xl p-6 flex flex-col md:flex-row items-center md:items-start gap-6 relative overflow-hidden">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary-fixed-dim rounded-full blur-3xl opacity-30 pointer-events-none"></div>
        <img alt="Dr. Ahmad" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-sm z-10" data-alt="A professional headshot of an Asian male educator, wearing a neat suit, smiling confidently against a soft, bright office background. The lighting is modern and flattering, fitting a corporate educational context." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFXeYUisExN6hwpzWvRlF1R_Iarv9RJ4Wu6EY5jhe6y6nMMIBTlv-M142oBh2AHQa7O10ritihBoF0Bv_9A2T9WwSPBxIIGV62CS8_kvlswS4qdhRPXXGxHVZoQDGWg1TNLRWnOmU48BzgKiRnSqLxsunqdm1D_G93uK2xRxvplRu-5pRkxw3v_YHVQQ67OdccbzEO6CEiA7XkzeY5zAytZqSJEa8wCOmI05b3AoVnx_H8_utppL7uKUYRm6wObq7Y4Hr9fFhRn9o" />
        <div class="flex-1 text-center md:text-left z-10">
            <h2 class="text-headline-lg font-headline-lg text-primary mb-1">
                Selamat Datang, {{ Auth::user()->name ?? 'Pengajar' }}!
            </h2>
            <p class="text-body-md font-body-md text-on-surface-variant">
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </p>
            <div class="mt-4 flex flex-wrap gap-3 justify-center md:justify-start">
                <button class="bg-primary text-on-primary px-4 py-2 rounded-lg text-label-md font-label-md hover:bg-primary-container transition-colors shadow-sm">
                    Input Nilai
                </button>
                <button class="border border-primary text-primary px-4 py-2 rounded-lg text-label-md font-label-md hover:bg-primary/5 transition-colors">
                    Lihat Report JP
                </button>
                <button class="border border-primary text-primary px-4 py-2 rounded-lg text-label-md font-label-md hover:bg-primary/5 transition-colors">
                    Evaluasi
                </button>
            </div>
        </div>
    </section>

    <!-- Quick Stats Row (Bento Style) -->
    <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <div class="raised-card rounded-xl p-4 flex flex-col justify-between cursor-pointer hover:-translate-y-1 transition-transform">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">class</span>
                </div>
            </div>
            <div>
                <p class="text-display-lg font-display-lg text-on-surface">{{ $totalKelasAktif }}</p>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase mt-1">
                    Kelas Aktif
                </p>
            </div>
        </div>
        <div class="raised-card rounded-xl p-4 flex flex-col justify-between cursor-pointer hover:-translate-y-1 transition-transform">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">schedule</span>
                </div>
            </div>
            <div>
                <p class="text-display-lg font-display-lg text-on-surface">{{ $totalJpBulanIni ?? 0 }}</p>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase mt-1">
                    Total JP (Bulan Ini)
                </p>
            </div>
        </div>
        <div class="raised-card rounded-xl p-4 flex flex-col justify-between cursor-pointer hover:-translate-y-1 transition-transform">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-primary/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">event</span>
                </div>
            </div>
            <div>
                <p class="text-display-lg font-display-lg text-on-surface">{{ $jadwalMingguIni ?? 0 }}</p>
                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase mt-1">
                    Sesi Minggu Ini
                </p>
            </div>
        </div>
        <div class="raised-card rounded-xl p-4 flex flex-col justify-between cursor-pointer hover:-translate-y-1 transition-transform items-center text-center">
            <div class="relative w-16 h-16 mb-2">
                <svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
                    <path class="text-surface-variant" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3"></path>
                    <path class="text-secondary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="86, 100" stroke-width="3"></path>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-label-md font-label-md font-bold text-on-surface">8.6</span>
                </div>
            </div>
            <p class="text-label-sm font-label-sm text-on-surface-variant uppercase mt-auto">
                Evaluasi
            </p>
        </div>
        <div class="raised-card rounded-xl p-4 flex flex-col justify-between cursor-pointer hover:-translate-y-1 transition-transform bg-error-container/20">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-error/10 rounded-lg text-error">
                    <span class="material-symbols-outlined">assignment_late</span>
                </div>
                <span class="bg-error text-on-error text-[10px] font-bold px-2 py-1 rounded-full uppercase">Segera!</span>
            </div>
            <div>
                <p class="text-display-lg font-display-lg text-error">15</p>
                <p class="text-label-sm font-label-sm text-error uppercase mt-1">
                    Tugas Pending
                </p>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
        <!-- Recent Schedule -->
        <section class="lg:col-span-1 raised-card rounded-xl p-6">
            <h3 class="text-headline-sm font-headline-sm text-on-surface mb-6">
                Jadwal Terdekat
            </h3>
            <div class="relative border-l-2 border-surface-variant ml-3 space-y-6">
                @forelse($upcomingSchedules ?? [] as $index => $schedule)
                <div class="relative pl-6">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 {{ $index === 0 ? 'bg-primary' : 'bg-surface-variant' }} rounded-full border-2 border-white"></div>
                    <p class="text-label-sm font-label-sm {{ $index === 0 ? 'text-primary' : 'text-on-surface-variant' }} mb-1">
                        {{ \Carbon\Carbon::parse($schedule->tgl_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->tgl_selesai)->format('H:i') }}
                        ({{ \Carbon\Carbon::parse($schedule->tgl_mulai)->format('d M') }})
                    </p>
                    <p class="text-body-md font-body-md font-medium text-on-surface">
                        {{ $schedule->kelas->diklat->nama_diklat ?? 'Kelas Umum' }}
                    </p>
                    <p class="text-label-sm font-label-sm text-on-surface-variant">
                        {{ $schedule->kelas->tempat_acara ?? 'Ruang Kelas' }}
                    </p>
                </div>
                @empty
                <div class="relative pl-6">
                    <p class="text-body-md font-body-md font-medium text-on-surface">Tidak ada jadwal terdekat</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- Active Classes Grid -->
        <section class="lg:col-span-2 glass-panel rounded-xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-headline-sm font-headline-sm text-on-surface">
                    Kelas Aktif
                </h3>
                <button class="text-label-sm font-label-sm text-primary hover:underline">
                    Lihat Semua
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="raised-card p-4 rounded-lg border border-outline-variant/30">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-body-md font-body-md font-semibold text-on-surface">
                            TOT Angkatan V
                        </h4>
                        <span class="material-symbols-outlined text-on-surface-variant text-sm">more_vert</span>
                    </div>
                    <p class="text-label-sm font-label-sm text-on-surface-variant mb-4">
                        30 Peserta • Klasikal
                    </p>
                    <div class="w-full bg-surface-variant rounded-full h-2 mb-2">
                        <div class="bg-secondary h-2 rounded-full" style="width: 78%"></div>
                    </div>
                    <div class="flex justify-between text-label-sm font-label-sm text-on-surface-variant">
                        <span>Progress</span>
                        <span>78%</span>
                    </div>
                </div>
                <div class="raised-card p-4 rounded-lg border border-outline-variant/30">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-body-md font-body-md font-semibold text-on-surface">
                            PKA Gelombang II
                        </h4>
                        <span class="material-symbols-outlined text-on-surface-variant text-sm">more_vert</span>
                    </div>
                    <p class="text-label-sm font-label-sm text-on-surface-variant mb-4">
                        45 Peserta • Blended
                    </p>
                    <div class="w-full bg-surface-variant rounded-full h-2 mb-2">
                        <div class="bg-primary h-2 rounded-full" style="width: 45%"></div>
                    </div>
                    <div class="flex justify-between text-label-sm font-label-sm text-on-surface-variant">
                        <span>Progress</span>
                        <span>45%</span>
                    </div>
                </div>
                <div class="raised-card p-4 rounded-lg border border-outline-variant/30">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-body-md font-body-md font-semibold text-on-surface">
                            Latsar CPNS - Gol III
                        </h4>
                        <span class="material-symbols-outlined text-on-surface-variant text-sm">more_vert</span>
                    </div>
                    <p class="text-label-sm font-label-sm text-on-surface-variant mb-4">
                        40 Peserta • Daring
                    </p>
                    <div class="w-full bg-surface-variant rounded-full h-2 mb-2">
                        <div class="bg-primary h-2 rounded-full" style="width: 15%"></div>
                    </div>
                    <div class="flex justify-between text-label-sm font-label-sm text-on-surface-variant">
                        <span>Progress</span>
                        <span>15%</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
