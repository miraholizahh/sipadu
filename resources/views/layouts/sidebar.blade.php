<!-- Sidebar -->
<aside class="w-64 h-screen bg-white border-r shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
  <div class="flex flex-col items-center py-6">
    <img src="{{ asset('images/logo-uptd.png') }}" alt="Logo" class="w-20 h-auto mb-2">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white" style="font-family: 'Lobster', cursive;">SIPADU-DBD</h1>
  </div>

  <nav class="flex flex-col px-4 space-y-2">
    <!-- Dashboard -->
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
      <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800">
        <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l8 8-1.414 1.414L19 12.414V20a2 2 0 0 1-2 2h-3v-5H10v5H7a2 2 0 0 1-2-2v-7.586l-1.293 1.293L2 11.293l9.293-9.293z" clip-rule="evenodd"/>
        </svg>
        Dashboard
      </div>
    </x-responsive-nav-link>

    <!-- Kelola Akun -->
    <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
      <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800">
        <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
        </svg>
        Kelola Akun
      </div>
    </x-responsive-nav-link>

    <!-- Kelola Gejala -->
    <x-responsive-nav-link :href="route('symptom.index')" :active="request()->routeIs('symptom.index')">
      <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800">
        <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Z" />
        </svg>
        Kelola Gejala
      </div>
    </x-responsive-nav-link>

    <!-- Kelola Penyakit -->
    <x-responsive-nav-link :href="route('disease.index')" :active="request()->routeIs('disease.index')">
      <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800">
        <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 2a1 1 0 0 1 1 1v1.382a5.001 5.001 0 0 1 3.618 3.618H16a1 1 0 1 1 0 2h-1.382a5.001 5.001 0 0 1-3.618 3.618V17a1 1 0 1 1-2 0v-1.382a5.001 5.001 0 0 1-3.618-3.618H4a1 1 0 0 1 0-2h1.382a5.001 5.001 0 0 1 3.618-3.618V3a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
        </svg>
        Kelola Penyakit
      </div>
    </x-responsive-nav-link>

    <!-- Basis Pengetahuan -->
    <x-responsive-nav-link :href="route('knowledge_base.index')" :active="request()->routeIs('knowledge_base.index')">
      <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800">
        <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m0-12a6 6 0 0 1 6 6m-6-6a6 6 0 0 0-6 6m6 6a6 6 0 0 1-6-6m6 6a6 6 0 0 0 6-6" />
        </svg>
        Basis Pengetahuan
      </div>
    </x-responsive-nav-link>

    <!-- Laporan Diagnosa -->
    <x-responsive-nav-link :href="route('laporan.diagnosa')" :active="request()->routeIs('laporan.diagnosa')">
      <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800">
        <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6m4 6V9m4 8v-3M3 3h18M4 21h16a1 1 0 0 0 1-1V7H3v13a1 1 0 0 0 1 1Z" />
        </svg>
        Laporan Diagnosa
      </div>
    </x-responsive-nav-link>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
        <div class="flex items-center gap-3 px-2 py-2 rounded-lg text-red-600 hover:bg-red-100 dark:hover:bg-red-900 dark:text-red-400">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1a3 3 0 016 0z" />
          </svg>
          Keluar
        </div>
      </x-responsive-nav-link>
    </form>
  </nav>
</aside>
