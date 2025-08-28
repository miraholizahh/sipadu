<header style="background-color: #1A0000;" class="text-white">
    <nav class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between flex-wrap">

      <div class="flex items-center gap-3">
        <a href="#" class="flex items-center gap-3">
          <img class="w-14 h-auto" src="{{ asset('images/logo-uptd.png') }}" alt="Logo UPTD">
          <span class="text-2xl font-extrabold text-white">SIPADU-DBD</span>
        </a>
      </div>

      <div class="sm:hidden">
        <button type="button"
          class="hs-collapse-toggle text-white"
          data-hs-collapse="#navbar-with-collapse"
          aria-controls="navbar-with-collapse"
          aria-label="Toggle navigation">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>
      </div>
  
      <div id="navbar-with-collapse" class="hidden transition-all duration-100 overflow-hidden basis-full grow sm:block sm:basis-auto sm:ml-auto">
        <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
            @if(Route::has('login'))
                @auth
                    <!-- Menu untuk pasien yang sudah login -->
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="homenav">Beranda</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="{{ route('diagnosis.form') }}">Diagnosa</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="{{ route('diagnosis.riwayat') }}">Riwayat Diagnosa</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="{{ route('profile.user-edit') }}">Profil</a>
                    <div class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Menu untuk pengunjung yang belum login -->
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="homenav">Beranda</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="profilenav">Tentang</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="contactnav">Kontak</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="{{ route('login') }}">Login</a>
                    <a class="font-bold text-sm uppercase tracking-wide text-white hover:text-rose-200" href="{{ route('register') }}">Registrasi</a>
                @endauth
            @endif
        </div>
      </div>
       
    </nav>
  </header>
  