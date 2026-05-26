<aside class="hidden md:flex fixed left-0 top-0 h-screen w-sidebar-width bg-[#1e293b] flex-col py-8 gap-2 z-40">
    <div class="px-6 mb-8">
        <h1 class="text-headline-sm font-headline-sm font-black text-white">
            WI-Center
        </h1>
        <p class="text-label-sm font-label-sm text-slate-300">
            Expert Facilitator
        </p>
    </div>
    <nav class="flex-1 px-4 space-y-2">
        @php
            $navItems = [
                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard'],
                ['route' => 'classes.index', 'label' => 'Kelas Saya', 'icon' => 'school'],
                ['route' => 'schedule.index', 'label' => 'Jadwal', 'icon' => 'calendar_today'],
                ['route' => 'report.index', 'label' => 'Report', 'icon' => 'analytics'],
                ['route' => 'profile.edit', 'label' => 'Profil', 'icon' => 'account_circle'],
            ];
        @endphp

        @foreach ($navItems as $item)
            @php
                $isActive = request()->routeIs($item['route']);
            @endphp
            <a href="{{ route($item['route']) }}"
                class="flex items-center gap-4 px-4 py-3 transition-all duration-200 {{ $isActive ? 'bg-[#334155] text-white font-semibold border-l-4 border-white' : 'text-slate-300 hover:text-white hover:bg-[#334155]' }}">
                <span class="material-symbols-outlined">{{ $item['icon'] }}</span>
                <span class="text-label-md font-label-md">{{ $item['label'] }}</span>
            </a>
        @endforeach
        
        <a href="{{ route('login') }}"
            class="flex items-center gap-4 text-slate-300 hover:text-white px-4 py-3 hover:bg-[#334155] transition-all duration-200 mt-auto">
            <span class="material-symbols-outlined">logout</span>
            <span class="text-label-md font-label-md">Logout</span>
        </a>
    </nav>
</aside>
