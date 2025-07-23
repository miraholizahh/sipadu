<div class="px-6 flex items-center justify-center flex-col">
  <img class="w-20 h-auto mt-2" src="{{ asset('images/logo-uptd.png') }}" alt="Logo">
  <a class="flex-none text-2xl font-semibold text-gray-800 dark:text-white" style="font-family: 'Lobster', cursive;" href="#">
      SIPADU-DBD
  </a>
</div>

    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
      <ul class="space-y-1.5">
        <li class="hs-accordion" id="users-accordion">
          <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
            </svg>                      
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </li>

        <li class="hs-accordion" id="account-accordion">
          <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>            
            <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
              {{ __('Kelola Akun') }}
            </x-responsive-nav-link>
          </li>
  
        <li class="hs-accordion" id="users-accordion">
          <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Z" />
            </svg>                             
            <x-responsive-nav-link :href="route('symptom.index')" :active="request()->routeIs('symptom.index')">
              {{ __('Kelola Gejala') }}
            </x-responsive-nav-link>
        </li>

        <li class="hs-accordion" id="account-accordion">
          <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 2a1 1 0 0 1 1 1v1.382a5.001 5.001 0 0 1 3.618 3.618H16a1 1 0 1 1 0 2h-1.382a5.001 5.001 0 0 1-3.618 3.618V17a1 1 0 1 1-2 0v-1.382a5.001 5.001 0 0 1-3.618-3.618H4a1 1 0 0 1 0-2h1.382a5.001 5.001 0 0 1 3.618-3.618V3a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
            </svg> 
              <x-responsive-nav-link :href="route('disease.index')" :active="request()->routeIs('disease.index')">
                {{ __('Kelola Penyakit') }}
              </x-responsive-nav-link>
        </li>

        <li class="hs-accordion" id="account-accordion">
          <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m0-12a6 6 0 0 1 6 6m-6-6a6 6 0 0 0-6 6m6 6a6 6 0 0 1-6-6m6 6a6 6 0 0 0 6-6" />
            </svg>
              <x-responsive-nav-link :href="route('knowledge_base.index')" :active="request()->routeIs('knowledge_base.index')">
                {{ __('Kelola Basis Pengetahuan') }}
              </x-responsive-nav-link>
        </li>

        <li class="hs-accordion" id="account-accordion">
          <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6m4 6V9m4 8v-3M3 3h18M4 21h16a1 1 0 0 0 1-1V7H3v13a1 1 0 0 0 1 1Z" />
            </svg> 
              <x-responsive-nav-link :href="route('laporan.diagnosa')" :active="request()->routeIs('laporan.diagnosa')">
                {{ __('Laporan Diagnosa') }}
              </x-responsive-nav-link>
        </li>
        
        <li class="hs-accordion" id="account-accordion">
            <button type="button" class="hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
              <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
              </svg>  
              <form method="POST" action="{{ route('logout') }}">
                @csrf               
              <x-responsive-nav-link :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  {{ __('Keluar') }}
              </x-responsive-nav-link>
          </form>
        </li>
      </ul>
    </nav>

