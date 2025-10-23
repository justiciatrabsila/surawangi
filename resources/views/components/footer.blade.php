<footer class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white overflow-hidden">
    {{-- Decorative elements --}}
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
            {{-- Brand Section --}}
            <div class="lg:col-span-5">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                        <span class="text-2xl font-bold">S</span>
                    </div>
                    <h3 class="text-2xl font-bold">SURAWANGI</h3>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-6">
                    Portal berita terpercaya yang menyajikan informasi akurat, objektif, dan terkini seputar DPRD Kabupaten Banyuwangi. Dikelola oleh Siswa SMKN 1 Banyuwangi Jurusan PPLG dengan semangat profesionalisme dan teknologi.
                </p>

                @if (!empty($socialMedias) && !$socialMedias->isEmpty())
                    <div class="space-y-3">
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wide">Ikuti Kami</p>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($socialMedias as $social)
                                <x-social-media-icon :social="$social" />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Categories Section dengan dropdown --}}
            <div class="lg:col-span-3">
                <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    Berita Mengenai Rapat
                </h3>

                <div class="space-y-3" x-data="{ openAKD: false, openParipurna: false }">

                    {{-- AKD Dropdown --}}
                    <div class="border border-white/10 rounded-lg overflow-hidden bg-white/5 backdrop-blur-md">
                        <button @click="openAKD = !openAKD"
                            class="w-full flex justify-between items-center px-4 py-3 text-sm font-semibold text-white hover:bg-white/10 transition-all">
                            <span>AKD</span>
                            <svg :class="{'rotate-180': openAKD}" class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openAKD" x-transition class="px-4 pb-3 space-y-2 text-gray-300">
                            <a href="{{ route('news.index', 'komisi-1') }}" class="block text-sm hover:text-white transition">Komisi 1</a>
                            <a href="{{ route('news.index', 'komisi-2') }}" class="block text-sm hover:text-white transition">Komisi 2</a>
                            <a href="{{ route('news.index', 'komisi-3') }}" class="block text-sm hover:text-white transition">Komisi 3</a>
                            <a href="{{ route('news.index', 'komisi-4') }}" class="block text-sm hover:text-white transition">Komisi 4</a>
                            <a href="{{ route('news.index', 'rapat-khusus') }}" class="block text-sm hover:text-white transition">Rapat Khusus</a>
                        </div>
                    </div>

                    {{-- Paripurna Dropdown --}}
                    <div class="border border-white/10 rounded-lg overflow-hidden bg-white/5 backdrop-blur-md">
                        <button @click="openParipurna = !openParipurna"
                            class="w-full flex justify-between items-center px-4 py-3 text-sm font-semibold text-white hover:bg-white/10 transition-all">
                            <span>Paripurna</span>
                            <svg :class="{'rotate-180': openParipurna}" class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openParipurna" x-transition class="px-4 pb-3 space-y-2 text-gray-300">
                            <a href="{{ route('news.index', 'paripurna-eksternal') }}" class="block text-sm hover:text-white transition">Eksternal</a>
                            <a href="{{ route('news.index', 'paripurna-internal') }}" class="block text-sm hover:text-white transition">Internal</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Information Section --}}
            <div class="lg:col-span-4">
                <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    Navigasi
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                            class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.index') }}"
                            class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index', 'agenda') }}"
                            class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm">Agenda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index', 'kunjungan-tamu') }}"
                            class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm">Kunjungan Tamu</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index', 'fraksi') }}"
                            class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm">Fraksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('filament.admin.pages.dashboard') }}"
                            class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm">Akun</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-400">
                    © {{ date('Y') }} <span class="font-semibold text-white">{{ env('APP_NAME') }}</span>. Hak cipta dilindungi undang-undang.
                </p>
                <div class="flex items-center gap-6 text-xs text-gray-400">
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    <span>•</span>
                    <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                    <span>•</span>
                    <a href="#" class="hover:text-white transition-colors">Kontak</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave decoration --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-800 via-blue-600 to-blue-800"></div>
</footer>
