<x-app-layout>
    @section('title', 'Daftar Kelas')

    <!-- Decorative Background Gradients -->
    <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-primary-container/5 to-transparent -z-10 pointer-events-none"></div>
    
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-headline-lg font-headline-lg text-primary-container mb-2">
                Kelas Saya
            </h2>
            <p class="text-body-md font-body-md text-on-surface-variant">
                Kelola dan pantau progres pelatihan yang sedang Anda fasilitasi.
            </p>
        </div>
    </div>
    
    <!-- Filter & Search Bar -->
    <div class="bg-white/70 backdrop-blur-xl border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-xl p-3 flex flex-col md:flex-row gap-4 justify-between items-center w-full mt-6">
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 hide-scrollbar">
            <button class="px-5 py-2.5 rounded-lg bg-primary-container text-on-primary text-label-md font-label-md whitespace-nowrap flex-shrink-0 shadow-md shadow-primary-container/20 transition-all hover:bg-primary-container/90">
                Semua
            </button>
            <button class="px-5 py-2.5 rounded-lg text-on-surface-variant bg-white/50 hover:bg-white border border-outline-variant/20 shadow-sm text-label-md font-label-md whitespace-nowrap flex-shrink-0 transition-all">
                Aktif
            </button>
            <button class="px-5 py-2.5 rounded-lg text-on-surface-variant bg-white/50 hover:bg-white border border-outline-variant/20 shadow-sm text-label-md font-label-md whitespace-nowrap flex-shrink-0 transition-all">
                Selesai
            </button>
        </div>
        <div class="relative w-full md:w-72 flex-shrink-0">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]" data-icon="search">search</span>
            <input class="w-full bg-white/80 border border-outline-variant/30 rounded-lg py-2.5 pl-10 pr-4 text-body-md font-body-md focus:ring-2 focus:ring-primary-container/20 focus:border-primary-container text-on-surface placeholder:text-outline transition-all" placeholder="Cari nama pelatihan..." type="text" />
        </div>
    </div>
    
    <!-- Bento Grid - Class Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <!-- Card 1 -->
        <a class="group bg-white/70 backdrop-blur-lg rounded-2xl border border-white/60 overflow-hidden shadow-[0_8px_30px_rgb(30,58,138,0.04)] hover:shadow-[0_8px_30px_rgb(30,58,138,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative" href="{{ route('classes.show', 1) }}">
            <div class="p-6 flex-1 flex flex-col relative z-10">
                <div class="flex justify-between items-start mb-5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-secondary-container/50 text-secondary border border-secondary/10 text-label-sm font-label-sm uppercase tracking-wider font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary shadow-[0_0_8px_rgba(0,108,73,0.6)]"></span>
                        Aktif
                    </span>
                    <span class="text-on-surface-variant text-label-sm font-label-sm bg-surface-container-high/50 border border-outline-variant/20 px-3 py-1.5 rounded-full">Batch 3</span>
                </div>
                <h3 class="text-headline-sm font-headline-sm text-on-surface mb-3 group-hover:text-primary-container transition-colors line-clamp-2">
                    Pelatihan TOT Angk. 3
                </h3>
                <div class="flex items-center gap-2 text-on-surface-variant text-label-md font-label-md mb-6">
                    <span class="material-symbols-outlined text-[18px] text-primary-container/70" data-icon="calendar_month">calendar_month</span>
                    <span>1 - 15 Mei 2024</span>
                </div>
                <div class="mt-auto space-y-3">
                    <div class="flex items-center justify-between text-label-md font-label-md">
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px] text-primary-container/70" data-icon="groups">groups</span>
                            <span>25 Peserta</span>
                        </div>
                        <span class="text-primary-container font-semibold">78% Selesai</span>
                    </div>
                    <div class="w-full h-2.5 bg-surface-container-high/50 inset-shadow-sm rounded-full overflow-hidden">
                        <div class="h-full bg-primary-container rounded-full" style="width: 78%"></div>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Card 2 -->
        <a class="group bg-white/70 backdrop-blur-lg rounded-2xl border border-white/60 overflow-hidden shadow-[0_8px_30px_rgb(30,58,138,0.04)] hover:shadow-[0_8px_30px_rgb(30,58,138,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative" href="#">
            <div class="p-6 flex-1 flex flex-col relative z-10">
                <div class="flex justify-between items-start mb-5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-secondary-container/50 text-secondary border border-secondary/10 text-label-sm font-label-sm uppercase tracking-wider font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary shadow-[0_0_8px_rgba(0,108,73,0.6)]"></span>
                        Aktif
                    </span>
                    <span class="text-on-surface-variant text-label-sm font-label-sm bg-surface-container-high/50 border border-outline-variant/20 px-3 py-1.5 rounded-full">Batch 1</span>
                </div>
                <h3 class="text-headline-sm font-headline-sm text-on-surface mb-3 group-hover:text-primary-container transition-colors line-clamp-2">
                    Diklat Kepemimpinan Tingkat IV
                </h3>
                <div class="flex items-center gap-2 text-on-surface-variant text-label-md font-label-md mb-6">
                    <span class="material-symbols-outlined text-[18px] text-primary-container/70" data-icon="calendar_month">calendar_month</span>
                    <span>10 Mei - 20 Jun 2024</span>
                </div>
                <div class="mt-auto space-y-3">
                    <div class="flex items-center justify-between text-label-md font-label-md">
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px] text-primary-container/70" data-icon="groups">groups</span>
                            <span>40 Peserta</span>
                        </div>
                        <span class="text-primary-container font-semibold">45% Selesai</span>
                    </div>
                    <div class="w-full h-2.5 bg-surface-container-high/50 inset-shadow-sm rounded-full overflow-hidden">
                        <div class="h-full bg-primary-container rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Card 3 -->
        <a class="group bg-white/70 backdrop-blur-lg rounded-2xl border border-white/60 overflow-hidden shadow-[0_8px_30px_rgb(30,58,138,0.04)] hover:shadow-[0_8px_30px_rgb(30,58,138,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative opacity-90" href="#">
            <div class="p-6 flex-1 flex flex-col relative z-10">
                <div class="flex justify-between items-start mb-5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container-high/50 text-on-surface-variant border border-outline-variant/30 text-label-sm font-label-sm uppercase tracking-wider font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
                        Selesai
                    </span>
                    <span class="text-on-surface-variant text-label-sm font-label-sm bg-surface-container-high/50 border border-outline-variant/20 px-3 py-1.5 rounded-full">Batch 2</span>
                </div>
                <h3 class="text-headline-sm font-headline-sm text-on-surface mb-3 group-hover:text-primary-container transition-colors line-clamp-2">
                    Bimtek Penyusunan KTI
                </h3>
                <div class="flex items-center gap-2 text-on-surface-variant text-label-md font-label-md mb-6">
                    <span class="material-symbols-outlined text-[18px] text-outline" data-icon="calendar_month">calendar_month</span>
                    <span>5 - 15 Apr 2024</span>
                </div>
                <div class="mt-auto space-y-3">
                    <div class="flex items-center justify-between text-label-md font-label-md">
                        <div class="flex items-center gap-2 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px] text-outline" data-icon="groups">groups</span>
                            <span>30 Peserta</span>
                        </div>
                        <span class="text-secondary font-semibold">100% Selesai</span>
                    </div>
                    <div class="w-full h-2.5 bg-surface-container-high/50 inset-shadow-sm rounded-full overflow-hidden">
                        <div class="h-full bg-secondary rounded-full" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</x-app-layout>
