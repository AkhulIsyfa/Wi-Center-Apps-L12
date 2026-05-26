<x-app-layout>
    @section('title', 'Profil')

    <!-- Page Header (Desktop) -->
    <div class="hidden md:flex justify-between items-center mb-8">
        <div>
            <h2 class="text-headline-lg font-headline-lg text-primary">
                Manajemen Profil
            </h2>
            <p class="text-body-md font-body-md text-on-surface-variant mt-1">
                Kelola informasi pribadi dan kredensial akun Anda.
            </p>
        </div>
    </div>
    
    <!-- Profile Bento Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter max-w-6xl mx-auto">
        <!-- Left Column: Avatar & Summary (Span 4) -->
        <div class="lg:col-span-4 flex flex-col gap-gutter">
            <!-- Avatar Card -->
            <div class="bg-white rounded-xl shadow-[0px_4px_20px_-5px_rgba(30,58,138,0.08)] p-6 flex flex-col items-center text-center">
                <div class="relative mb-6">
                    <img alt="Dr. Ahmad Suryadi, M.Pd. Profile Avatar" class="w-32 h-32 rounded-full border-4 border-surface-container-low shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVcUzpQIe742mFXazQMQy_8MFeq_bMRqfc2k0bWVgW-nUPTYtXb0-Y2bCl3KzyGVtYvE3CpLOCRDz6JS6JRIO6wc2aAwxfX_creOgJXMt_MOYOJTe17ExuXDIB9M0C0ZMD0vnaWU-0z6vz8KJBavK1GvmQnXmMHYN6sfy9Iq7bTyJ94ML-sBEzPurWQRHZzyQUFx38EWkNZx6ocKS985E6Yu5PxBshZwQoOFHM3AaHb08cgLK2zEm59iRJ7_PZLiFTw1idADM9PuY" />
                    <button aria-label="Ubah Foto" class="absolute bottom-0 right-0 w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center hover:bg-primary-container transition-colors border-2 border-white shadow-sm">
                        <span class="material-symbols-outlined text-[20px]">photo_camera</span>
                    </button>
                </div>
                <h3 class="text-headline-md font-headline-md text-on-surface mb-1">
                    Dr. Ahmad Suryadi, M.Pd.
                </h3>
                <p class="text-label-md font-label-md text-primary mb-2 font-semibold">
                    Widyaiswara Ahli Madya
                </p>
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container-low rounded-full text-label-sm font-label-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-[16px]">badge</span>
                    NIP: 19800512 200501 1 003
                </div>
            </div>
            <!-- Quick Stats/Info -->
            <div class="bg-white rounded-xl shadow-[0px_4px_20px_-5px_rgba(30,58,138,0.08)] p-6">
                <h4 class="text-label-md font-label-md text-on-surface-variant uppercase tracking-wider mb-4 border-b border-outline-variant pb-2">
                    Status Akun
                </h4>
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between items-center">
                        <span class="text-body-md font-body-md text-on-surface">Status Aktif</span>
                        <span class="px-2 py-1 bg-secondary-fixed-dim text-secondary rounded text-label-sm font-label-sm font-semibold flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">check_circle</span>
                            Aktif
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-body-md font-body-md text-on-surface">Terakhir Login</span>
                        <span class="text-label-md font-label-md text-on-surface-variant">Hari ini, 08:30</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column: Form Sections (Span 8) -->
        <div class="lg:col-span-8 flex flex-col gap-gutter">
            <!-- Personal Data Form -->
            <div class="bg-white rounded-xl shadow-[0px_4px_20px_-5px_rgba(30,58,138,0.08)]">
                <div class="p-6 border-b border-surface-container-high">
                    <h3 class="text-headline-sm font-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined">person</span> Data Pribadi
                    </h3>
                </div>
                <div class="p-6">
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="fullName">Nama Lengkap &amp; Gelar</label>
                            <input class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="fullName" type="text" value="Dr. Ahmad Suryadi, M.Pd." />
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="email">Alamat Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-outline-variant text-[20px]">mail</span>
                                </div>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg pl-10 pr-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="email" type="email" value="ahmad.suryadi@instansi.go.id" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="phone">Nomor Telepon</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-outline-variant text-[20px]">call</span>
                                </div>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg pl-10 pr-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="phone" type="tel" value="0812-3456-7890" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="unit">Unit Kerja</label>
                            <select class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors appearance-none" id="unit">
                                <option value="pusdiklat">Pusdiklat Kepemimpinan</option>
                                <option selected value="bdk-jakarta">BDK Jakarta</option>
                                <option value="bdk-bandung">BDK Bandung</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="specialization">Spesialisasi Mengajar</label>
                            <input class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="specialization" type="text" value="Manajemen Publik, Etika Birokrasi" />
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Security / Password Form -->
            <div class="bg-white rounded-xl shadow-[0px_4px_20px_-5px_rgba(30,58,138,0.08)]">
                <div class="p-6 border-b border-surface-container-high">
                    <h3 class="text-headline-sm font-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined">lock</span> Keamanan Akun
                    </h3>
                </div>
                <div class="p-6">
                    <form class="grid grid-cols-1 gap-6 max-w-md">
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="currentPassword">Password Saat Ini</label>
                            <div class="relative">
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="currentPassword" placeholder="••••••••" type="password" />
                                <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline-variant hover:text-primary" type="button">
                                    <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="newPassword">Password Baru</label>
                            <div class="relative">
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="newPassword" placeholder="Minimal 8 karakter" type="password" />
                                <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline-variant hover:text-primary" type="button">
                                    <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-label-md font-label-md text-on-surface-variant mb-2" for="confirmPassword">Konfirmasi Password Baru</label>
                            <div class="relative">
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-4 py-3 text-body-md font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="confirmPassword" placeholder="Ulangi password baru" type="password" />
                                <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline-variant hover:text-primary" type="button">
                                    <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Action Bar -->
            <div class="flex justify-end gap-4 mt-2">
                <button class="px-6 py-2 rounded-lg border border-primary text-primary text-label-md font-label-md font-semibold hover:bg-primary/5 transition-colors">
                    Batal
                </button>
                <button class="px-6 py-2 rounded-lg bg-primary text-white text-label-md font-label-md font-semibold hover:bg-primary-container shadow-sm hover:shadow-md transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
