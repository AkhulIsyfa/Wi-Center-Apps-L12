<x-app-layout>
    @section('title', 'Detail Kelas')

    @php
        $isActive = \Carbon\Carbon::parse($kelas->tgl_akhir)->isFuture() || \Carbon\Carbon::parse($kelas->tgl_akhir)->isToday();
    @endphp

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
            <span class="font-semibold text-primary line-clamp-1 max-w-md">{{ $kelas->diklat->nama_diklat ?? 'Detail Kelas' }}</span>
          </div>

          <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">
              <div>
                @if($isActive)
                    <span class="inline-flex items-center gap-2 rounded-full bg-green-50 text-green-700 border border-green-200 px-3 py-1 text-xs font-semibold">
                      <span class="w-2 h-2 rounded-full bg-green-600"></span>
                      Aktif
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 text-slate-700 border border-slate-200 px-3 py-1 text-xs font-semibold">
                      <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                      Selesai
                    </span>
                @endif
                <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1 text-xs font-semibold ml-2">
                  Angkatan {{ $kelas->angkatan ?? '-' }}
                </span>

                <h1 class="text-3xl font-bold text-primary mt-3">
                  {{ $kelas->diklat->nama_diklat ?? 'Pelatihan Tanpa Nama' }}
                </h1>

                <div class="flex flex-wrap gap-5 text-sm text-slate-600 mt-4">
                  <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">calendar_month</span>
                    {{ \Carbon\Carbon::parse($kelas->tgl_mulai)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($kelas->tgl_akhir)->translatedFormat('d M Y') }}
                  </span>
                  <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">groups</span>
                    {{ $kelas->peserta->count() }} Peserta Terdaftar
                  </span>
                  <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">location_on</span>
                    {{ $kelas->tempat_acara ?? 'Tidak disebutkan' }}
                  </span>
                </div>
              </div>

              <button class="inline-flex items-center justify-center gap-2 rounded-lg border border-primary px-5 py-2.5 text-primary font-semibold hover:bg-primary/5">
                <span class="material-symbols-outlined text-lg">download</span>
                Unduh Rekap
              </button>
            </div>
          </div>
        </div>

        <!-- Tab Navigation -->
        <div class="bg-white border-t border-slate-200 px-7 overflow-x-auto tab-scroll">
            <nav class="flex gap-8 min-w-max" id="classTabs">
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-primary text-primary" data-tab="ringkasan">Ringkasan</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="jadwal">Jadwal Mengajar</button>
                <button class="tab-btn py-5 text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-primary" data-tab="peserta">Daftar Peserta</button>
            </nav>
        </div>
    </section>

    <!-- Tab Content Wrapper -->
    <div class="bg-slate-50 rounded-xl p-6 min-h-[calc(100vh-360px)] relative">
        
        <!-- TAB 1: RINGKASAN -->
        <section id="tab-ringkasan" class="tab-content block space-y-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-primary">Ringkasan Kelas</h2>
                    <p class="text-slate-500 mt-1">Monitoring umum aktivitas {{ $kelas->diklat->nama_diklat ?? 'Pelatihan' }}.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Total Peserta</p>
                        <span class="material-symbols-outlined text-primary">groups</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">{{ $kelas->peserta->count() }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Peserta Terdaftar</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Total Sesi Mengajar</p>
                        <span class="material-symbols-outlined text-primary">calendar_clock</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">{{ $schedules->count() }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Sesi Dijadwalkan</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-500">Total JP</p>
                        <span class="material-symbols-outlined text-primary">schedule</span>
                    </div>
                    <h3 class="text-3xl font-bold text-slate-900 mt-3">{{ $schedules->sum('jp') ?? 0 }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Jam Pelajaran</p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 mt-6">
                <h3 class="text-lg font-bold text-primary mb-4">Deskripsi Pelatihan</h3>
                <div class="prose prose-sm max-w-none text-slate-600">
                    {!! $kelas->diklat->deskripsi ?? '<p class="italic">Tidak ada deskripsi tersedia.</p>' !!}
                </div>
            </div>
        </section>
        
        <!-- TAB 2: JADWAL MENGAJAR -->
        <section id="tab-jadwal" class="tab-content hidden space-y-6">
            <h2 class="text-2xl font-bold text-primary mb-4">Jadwal Mengajar</h2>
            
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                                <th class="py-4 px-6">Tanggal & Waktu</th>
                                <th class="py-4 px-6">Materi / Modul</th>
                                <th class="py-4 px-6">Widyaiswara</th>
                                <th class="py-4 px-6">JP</th>
                                <th class="py-4 px-6">Link Zoom / Tatap Muka</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($schedules as $jadwal)
                                <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-slate-800">
                                            {{ \Carbon\Carbon::parse($jadwal->tgl_mulai)->translatedFormat('l, d M Y') }}
                                        </div>
                                        <div class="text-slate-500 text-xs mt-1">
                                            {{ \Carbon\Carbon::parse($jadwal->tgl_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->tgl_selesai)->format('H:i') }} WIB
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-primary">
                                            {{ $jadwal->modul->materi ?? 'Materi Belum Ditentukan' }}
                                        </div>
                                        <div class="text-slate-500 text-xs mt-1">
                                            Kategori: {{ $jadwal->modul->kategori ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-xs">
                                                {{ substr($jadwal->user->name ?? 'W', 0, 1) }}
                                            </div>
                                            <span class="text-slate-700">{{ $jadwal->user->name ?? 'Unknown' }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-slate-700">
                                        {{ $jadwal->jp ?? 0 }} JP
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($jadwal->link_conference)
                                            <a href="{{ $jadwal->link_conference }}" target="_blank" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:underline">
                                                <span class="material-symbols-outlined text-sm">videocam</span>
                                                Gabung Kelas
                                            </a>
                                        @else
                                            <span class="text-slate-400 italic">Offline / Belum Ada Link</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 px-6 text-center text-slate-500">
                                        Belum ada jadwal yang dimasukkan untuk pelatihan ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- TAB 3: PESERTA -->
        <section id="tab-peserta" class="tab-content hidden space-y-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                <h2 class="text-2xl font-bold text-primary">Daftar Peserta</h2>
                <div class="relative w-full md:w-64">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input type="text" placeholder="Cari nama peserta..." class="w-full pl-9 pr-4 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                </div>
            </div>
            
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                                <th class="py-4 px-6 w-12">No</th>
                                <th class="py-4 px-6">Nama & NIP</th>
                                <th class="py-4 px-6">Instansi / Unit Kerja</th>
                                <th class="py-4 px-6">Jabatan</th>
                                <th class="py-4 px-6">Status Lulus</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($kelas->peserta as $index => $peserta)
                                <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-slate-500">{{ $index + 1 }}</td>
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-slate-800">
                                            {{ $peserta->nama }}
                                        </div>
                                        <div class="text-slate-500 text-xs mt-1">
                                            NIP: {{ $peserta->noktp ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-slate-600">
                                        {{ $peserta->nm_instansi ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6 text-slate-600">
                                        {{ $peserta->jabatan ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if(strtolower($peserta->status_lulus) == 'l')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Lulus</span>
                                        @elseif(strtolower($peserta->status_lulus) == 'tl')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Tidak Lulus</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Belum Dinilai</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 px-6 text-center text-slate-500">
                                        Belum ada peserta yang terdaftar di kelas ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            const contents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Reset all tabs
                    tabs.forEach(t => {
                        t.classList.remove('border-primary', 'text-primary');
                        t.classList.add('border-transparent', 'text-slate-600');
                    });
                    
                    // Hide all contents
                    contents.forEach(c => {
                        c.classList.add('hidden');
                        c.classList.remove('block');
                    });
                    
                    // Activate clicked tab
                    tab.classList.remove('border-transparent', 'text-slate-600');
                    tab.classList.add('border-primary', 'text-primary');
                    
                    // Show corresponding content
                    const targetId = 'tab-' + tab.getAttribute('data-tab');
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('block');
                    }
                });
            });
        });
    </script>
</x-app-layout>
