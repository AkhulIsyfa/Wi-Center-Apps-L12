<x-guest-layout>
    <!-- Left Panel: Branding & Hero Image -->
    <div class="hidden lg:flex flex-col flex-1 relative overflow-hidden bg-primary">
      <!-- Abstract Animated Gradient Background Simulation -->
      <div class="absolute inset-0 z-0">
        <div class="absolute -top-[20%] -left-[10%] w-[70%] h-[70%] rounded-full bg-tertiary-container blur-[120px] opacity-80 mix-blend-screen"></div>
        <div class="absolute bottom-[10%] -right-[20%] w-[80%] h-[80%] rounded-full bg-primary-container blur-[150px] opacity-70 mix-blend-screen"></div>
        <div class="absolute top-[40%] left-[20%] w-[50%] h-[50%] rounded-full bg-surface-tint blur-[100px] opacity-50 mix-blend-screen"></div>
      </div>
      <!-- Content Area -->
      <div class="relative z-10 flex flex-col justify-center items-center h-full p-margin-desktop text-center">
        <!-- Illustration -->
        <div class="w-full max-w-lg mb-12">
          <img
            alt="Professional Educator"
            class="w-full h-auto object-contain drop-shadow-2xl rounded-xl opacity-90"
            data-alt="A sleek, professional 3D or high-quality vector illustration of a modern educator or facilitator standing confidently next to a large, interactive digital display showing abstract data charts and educational nodes. The setting is a bright, contemporary corporate training environment with soft glass panels and subtle natural light. The color palette is dominated by authoritative primary blues, deep tertiary navies, and soft, clean white backgrounds, embodying a 'Corporate Modernism' aesthetic. The overall mood is organized, knowledgeable, and reliable, conveying institutional trust without feeling heavy or outdated."
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCd7YjfRlsblLa2MJadHwLthA5H4wUI67SitwPvUv65uuNx3SmVikHMQx2YRoBPLaHKI-abnhx6cvCoEk4aIh0ai4yLsw0sMVC_byZ2kxMLpfG9gg1IZwwnqhaMqDZm21rrIqHqVk1_D3sYiRPzjf8u6-mETQ6kBbZ-69QodkkW6snjlz_9YotGhnrJc3xd9iS0kjAZZYWwdpnm2kZTC4wN481Epav_1O24OlW05OI5fxv5_LQlIp5C3WzFlUvcXTU-DAnFQHrgBd8"
          />
        </div>
        <div class="space-y-4">
          <h1 class="text-display-lg font-display-lg text-on-primary tracking-tight">
            WI-Center
          </h1>
          <p class="text-headline-sm font-headline-sm text-on-primary-container">
            Platform Pengajar Profesional
          </p>
        </div>
      </div>
    </div>
    <!-- Right Panel: Login Form -->
    <div class="flex-1 flex flex-col justify-center items-center p-margin-mobile md:p-margin-desktop bg-surface-container-lowest relative z-10 shadow-[-10px_0_30px_rgba(0,35,111,0.05)]">
      <div class="w-full max-w-[420px] flex flex-col">
        <!-- Mobile Header (Hidden on Desktop where Left Panel exists) -->
        <div class="lg:hidden flex flex-col items-center mb-10 text-center">
          <h1 class="text-headline-lg font-headline-lg text-primary mb-2">
            WI-Center
          </h1>
          <p class="text-body-md font-body-md text-on-surface-variant">
            Platform Pengajar Profesional
          </p>
        </div>
        <!-- Form Header -->
        <div class="mb-8">
          <h2 class="text-headline-md font-headline-md text-on-surface mb-2">
            Selamat Datang
          </h2>
          <p class="text-body-md font-body-md text-on-surface-variant">
            Silakan masuk ke akun Anda untuk melanjutkan.
          </p>
        </div>
        <!-- Login Form -->
        <form action="{{ route('login') }}" class="flex flex-col gap-6" method="POST">
          @csrf
          @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">Error!</span> {{ $errors->first() }}
            </div>
          @endif
          <div class="flex flex-col gap-2">
            <label class="text-label-sm font-label-sm text-on-surface uppercase tracking-wider" for="user_name">NIP / Username</label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">person</span>
              <input
                class="w-full pl-12 pr-4 py-3 bg-surface-container-low border border-outline-variant rounded-lg text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors placeholder:text-outline/70"
                id="user_name"
                name="user_name"
                value="{{ old('user_name') }}"
                placeholder="Masukkan NIP atau Username"
                type="text"
                required
              />
            </div>
          </div>
          <div class="flex flex-col gap-2">
            <div class="flex justify-between items-center">
              <label class="text-label-sm font-label-sm text-on-surface uppercase tracking-wider" for="password">Password</label>
              <a class="text-label-sm font-label-sm text-primary hover:text-primary-container transition-colors" href="#">Lupa Password?</a>
            </div>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">lock</span>
              <input
                class="w-full pl-12 pr-12 py-3 bg-surface-container-low border border-outline-variant rounded-lg text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors placeholder:text-outline/70"
                id="password"
                name="password"
                placeholder="Masukkan Password"
                type="password"
                required
              />
              <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors focus:outline-none" type="button">
                <span class="material-symbols-outlined">visibility_off</span>
              </button>
            </div>
          </div>
          <!-- Primary Action -->
          <button class="mt-2 w-full flex items-center justify-center gap-2 py-3 px-4 bg-primary hover:bg-primary-container text-on-primary rounded-lg text-label-md font-label-md shadow-sm transition-all active:scale-[0.98]" type="submit">
            <span>Masuk</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </button>
        </form>
        <div class="my-8 flex items-center gap-4">
          <div class="flex-1 h-px bg-outline-variant"></div>
          <span class="text-label-sm font-label-sm text-outline uppercase tracking-wider">Atau</span>
          <div class="flex-1 h-px bg-outline-variant"></div>
        </div>
        <!-- Secondary Action -->
        <button class="w-full flex items-center justify-center gap-2 py-3 px-4 border border-outline-variant bg-surface-container-lowest hover:bg-surface-container-low text-on-surface rounded-lg text-label-md font-label-md transition-all active:scale-[0.98]" type="button">
          <span class="material-symbols-outlined text-primary text-[20px]">apps</span>
          <span>Masuk via SuperApps</span>
        </button>
        <!-- Footer subtle text -->
        <p class="mt-8 text-center text-label-sm font-label-sm text-outline">
          Dengan masuk, Anda menyetujui
          <a class="text-primary hover:underline" href="#">Syarat &amp; Ketentuan</a>
          serta
          <a class="text-primary hover:underline" href="#">Kebijakan Privasi</a>
          kami.
        </p>
      </div>
    </div>
</x-guest-layout>
