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
        @forelse($classes as $kelas)
            @php
                $isActive = \Carbon\Carbon::parse($kelas->tgl_akhir)->isFuture() || \Carbon\Carbon::parse($kelas->tgl_akhir)->isToday();
            @endphp
            <!-- Card -->
            <a class="group bg-white/70 backdrop-blur-lg rounded-2xl border border-white/60 overflow-hidden shadow-[0_8px_30px_rgb(30,58,138,0.04)] hover:shadow-[0_8px_30px_rgb(30,58,138,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative {{ !$isActive ? 'opacity-90' : '' }}" href="{{ route('classes.show', $kelas->id_kelas) }}">
                <div class="p-6 flex-1 flex flex-col relative z-10">
                    <div class="flex justify-between items-start mb-5">
                        @if($isActive)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-secondary-container/50 text-secondary border border-secondary/10 text-label-sm font-label-sm uppercase tracking-wider font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary shadow-[0_0_8px_rgba(0,108,73,0.6)]"></span>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-surface-container-high/50 text-on-surface-variant border border-outline-variant/30 text-label-sm font-label-sm uppercase tracking-wider font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-outline"></span>
                                Selesai
                            </span>
                        @endif
                        <span class="text-on-surface-variant text-label-sm font-label-sm bg-surface-container-high/50 border border-outline-variant/20 px-3 py-1.5 rounded-full">Angkatan {{ $kelas->angkatan ?? '-' }}</span>
                    </div>
                    <h3 class="text-headline-sm font-headline-sm text-on-surface mb-3 group-hover:text-primary-container transition-colors line-clamp-2" title="{{ $kelas->diklat->nama_diklat ?? 'Tanpa Nama' }}">
                        {{ $kelas->diklat->nama_diklat ?? 'Pelatihan Tanpa Nama' }}
                    </h3>
                    <div class="flex items-center gap-2 text-on-surface-variant text-label-md font-label-md mb-6">
                        <span class="material-symbols-outlined text-[18px] {{ $isActive ? 'text-primary-container/70' : 'text-outline' }}" data-icon="calendar_month">calendar_month</span>
                        <span>{{ \Carbon\Carbon::parse($kelas->tgl_mulai)->translatedFormat('d M') }} - {{ \Carbon\Carbon::parse($kelas->tgl_akhir)->translatedFormat('d M Y') }}</span>
                    </div>
                    <div class="mt-auto space-y-3">
                        <div class="flex items-center justify-between text-label-md font-label-md">
                            <div class="flex items-center gap-2 text-on-surface-variant">
                                <span class="material-symbols-outlined text-[20px] {{ $isActive ? 'text-primary-container/70' : 'text-outline' }}" data-icon="groups">groups</span>
                                <span>{{ $kelas->jml_peserta ?? 0 }} Peserta Target</span>
                            </div>
                            <span class="{{ $isActive ? 'text-primary-container' : 'text-secondary' }} font-semibold">
                                {{ $isActive ? 'Sedang Berjalan' : 'Selesai' }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full py-12 flex flex-col items-center justify-center text-center bg-white/50 backdrop-blur-sm rounded-2xl border border-white/60">
                <span class="material-symbols-outlined text-[48px] text-outline-variant mb-4">school</span>
                <h3 class="text-headline-sm font-headline-sm text-on-surface mb-2">Belum Ada Kelas</h3>
                <p class="text-body-md text-on-surface-variant">Anda belum ditugaskan untuk mengajar di kelas manapun.</p>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    <div class="mt-8">
        {{ $classes->links() }}
    </div>
</x-app-layout>
