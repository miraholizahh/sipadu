<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white text-center">
                        Selamat Datang di <span class="text-blue-600">SIPEDU-DBD</span>
                    </h1>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-100 border shadow-sm rounded-xl p-4 md:p-5">
                            <h3 class="text-lg font-bold text-black flex items-center mb-2">
                                <svg class="w-6 h-6 mr-2 text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Z" />
                                </svg>
                                Gejala
                            </h3>
                            <div class="text-4xl font-bold text-black text-center">{{ $symptom_count }}</div>
                            <a href="{{ route('symptom.index') }}" class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-black hover:text-blue-700">
                                Klik Informasi
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-green-100 border shadow-sm rounded-xl p-4 md:p-5">
                            <h3 class="text-lg font-bold text-black flex items-center mb-2">
                                <svg class="w-6 h-6 mr-2 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 0 1 1 1v1.382a5.001 5.001 0 0 1 3.618 3.618H16a1 1 0 1 1 0 2h-1.382a5.001 5.001 0 0 1-3.618 3.618V17a1 1 0 1 1-2 0v-1.382a5.001 5.001 0 0 1-3.618-3.618H4a1 1 0 0 1 0-2h1.382a5.001 5.001 0 0 1 3.618-3.618V3a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
                                </svg>
                                Penyakit
                            </h3>
                            <div class="text-4xl font-bold text-black text-center">{{ $disease_count }}</div>
                            <a href="{{ route('disease.index') }}" class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-black hover:text-green-700">
                                Klik Informasi
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-yellow-100 border shadow-sm rounded-xl p-4 md:p-5">
                            <h3 class="text-lg font-bold text-black flex items-center mb-2">
                                <svg class="w-6 h-6 mr-2 text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m0-12a6 6 0 0 1 6 6m-6-6a6 6 0 0 0-6 6m6 6a6 6 0 0 1-6-6m6 6a6 6 0 0 0 6-6" />
                                </svg>
                                Basis Pengetahuan
                            </h3>
                            <div class="text-4xl font-bold text-black text-center">{{ $knowledge_base_count }}</div>
                            <a href="{{ route('knowledge_base.index') }}" class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-black hover:text-yellow-700">
                                Klik Informasi
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-gray-100 border shadow-sm rounded-xl p-4 md:p-5">
                            <h3 class="text-lg font-bold text-black flex items-center mb-2">
                                <svg class="w-5 h-5 text-gray-700 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7.5 4.5v4.5c0 5.25-3.5 9.75-7.5 10.5-4-0.75-7.5-5.25-7.5-10.5V7.5L12 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 0v4m0-4h4m-4 0H8" />
                                  </svg>
                                Solusi
                            </h3>
                            <div class="text-4xl font-bold text-black text-center">{{ $solution_count }}</div>
                            <a href="{{ route('solution.index') }}" class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-black hover:text-yellow-700">
                                Klik Informasi
                                <svg class="w-5 h-5 text-gray-700 dark:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7.5 4.5v4.5c0 5.25-3.5 9.75-7.5 10.5-4-0.75-7.5-5.25-7.5-10.5V7.5L12 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 0v4m0-4h4m-4 0H8" />
                                  </svg>
                            </a>
                        </div>

                        <div class="bg-red-100 border shadow-sm rounded-xl p-4 md:p-5">
                            <h3 class="text-lg font-bold text-black flex items-center mb-2">
                                <svg class="w-6 h-6 mr-2 text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6m4 6V9m4 8v-3M3 3h18M4 21h16a1 1 0 0 0 1-1V7H3v13a1 1 0 0 0 1 1Z" />
                                </svg>
                                Laporan
                            </h3>
                            <div class="text-4xl font-bold text-black text-center">{{ $laporan_count }}</div>
                            <a href="{{ route('laporan.diagnosa') }}" class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-black hover:text-red-700">
                                Klik Informasi
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="bg-purple-100 border shadow-sm rounded-xl p-4 md:p-5">
                            <h3 class="text-lg font-bold text-black flex items-center mb-2">
                                <svg class="w-6 h-6 mr-2 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                                </svg>
                                Akun
                            </h3>
                            <div class="text-4xl font-bold text-black text-center">{{ $user_count }}</div>
                            <a href="{{ route('user.index') }}" class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-black hover:text-purple-700">
                                Klik Informasi
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 18l6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
