<div x-data="{ isOpen: false, searchOpen: false }" class="relative">
    <!-- HEADER -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI"
                        class="h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    <span class="font-bold text-xl text-blue-600 hidden sm:inline">.com</span>
                </a>

                <!-- Desktop Search -->
                <form action="{{ route('home') }}" method="GET"
                    class="hidden md:flex items-center bg-gray-50 rounded-full overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:bg-white transition-all duration-300 w-full max-w-lg mx-6">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berita atau informasi..."
                        class="flex-1 bg-transparent px-5 py-2.5 text-gray-700 text-sm outline-none placeholder:text-gray-400">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2.5 hover:bg-blue-700 transition-all duration-300 font-medium">
                        @svg('bi-search', 'w-4 h-4')
                    </button>
                </form>

                <!-- Mobile Buttons -->
                <div class="flex items-center space-x-3 md:hidden">
                    <button @click="searchOpen = !searchOpen"
                        class="p-2 rounded-full bg-gray-100 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                    <button @click="isOpen = !isOpen"
                        class="p-2 rounded-full bg-gray-100 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-all">
                        <template x-if="!isOpen">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </template>
                        <template x-if="isOpen">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </template>
                    </button>
                </div>
            </div>

            <!-- Mobile Search -->
            <div x-show="searchOpen" x-transition
                class="md:hidden mt-2 border-t border-gray-100 pt-2 pb-4">
                <form action="{{ route('home') }}" method="GET" class="flex bg-gray-100 rounded-full overflow-hidden shadow-inner">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berita..."
                        class="flex-1 bg-transparent px-4 py-2 text-gray-700 outline-none">
                    <button type="submit"
                        class="bg-primary text-white px-4 py-2 hover:bg-red-700 transition-all">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- NAV MENU - ELEGANT MODERN DESIGN -->
    <nav class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 sticky top-[76px] z-40 shadow-lg backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="hidden md:flex items-center justify-center space-x-1">
                <!-- Beranda -->
                <li>
                    <a href="{{ route('home') }}"
                        class="relative group flex items-center px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Beranda</span>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Profil -->
                <li>
                    <a href="{{ route('profile.index') }}"
                        class="relative group flex items-center px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Profil</span>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Agenda -->
                <li>
                    <a href="{{ route('news.index', 'agenda') }}"
                        class="relative group flex items-center px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Agenda</span>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Dropdown AKD -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="relative group flex items-center gap-1.5 px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">AKD</span>
                        <svg class="w-4 h-4 transition-transform duration-300 relative z-10" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="absolute left-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl border border-blue-100 overflow-hidden z-50">
                        <div class="py-3 px-2">
                            @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                                <a href="{{ route('news.index', $item) }}"
                                    class="group flex items-center px-4 py-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 mb-1 last:mb-0">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-blue-50 group-hover:bg-blue-600 mr-3 transition-all duration-200">
                                        <span class="w-2 h-2 rounded-full bg-blue-600 group-hover:bg-white transition-all duration-200"></span>
                                    </span>
                                    <span class="font-medium">{{ Str::of($item)->replace('-', ' ')->upper() }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <!-- Kunjungan Tamu -->
                <li>
                    <a href="{{ route('news.index', 'kunjungan-tamu') }}"
                        class="relative group flex items-center px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Kunjungan Tamu</span>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Fraksi -->
                <li>
                    <a href="{{ route('news.index', 'fraksi') }}"
                        class="relative group flex items-center px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Fraksi</span>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Dropdown Paripurna -->
                <li x-data="{ openParipurna: false }" class="relative">
                    <button @click="openParipurna = !openParipurna"
                        class="relative group flex items-center gap-1.5 px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Paripurna</span>
                        <svg class="w-4 h-4 transition-transform duration-300 relative z-10" :class="{ 'rotate-180': openParipurna }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </button>

                    <div x-show="openParipurna" @click.away="openParipurna = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="absolute left-0 mt-2 w-60 bg-white rounded-2xl shadow-2xl border border-blue-100 overflow-hidden z-50">
                        <div class="py-3 px-2">
                            @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                                <a href="{{ route('news.index', $item) }}"
                                    class="group flex items-center px-4 py-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 mb-1 last:mb-0">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-blue-50 group-hover:bg-blue-600 mr-3 transition-all duration-200">
                                        <span class="w-2 h-2 rounded-full bg-blue-600 group-hover:bg-white transition-all duration-200"></span>
                                    </span>
                                    <span class="font-medium">{{ Str::of($item)->replace('paripurna-', '')->title() }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <!-- Akun -->
                <li>
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="relative group flex items-center px-6 py-4 text-sm font-semibold text-white/90 hover:text-white transition-all duration-300">
                        <span class="relative z-10">Akun</span>
                        <span class="absolute inset-0 bg-white/0 group-hover:bg-white/10 rounded-lg transition-all duration-300"></span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-1 bg-white rounded-full group-hover:w-3/4 transition-all duration-300"></span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Decorative gradient line at bottom -->
        <div class="h-1 bg-gradient-to-r from-transparent via-blue-400 to-transparent opacity-50"></div>
    </nav>

    <!-- MOBILE MENU - ELEGANT & MINIMAL -->
    <!-- Overlay -->
    <div
        x-show="isOpen"
        x-transition.opacity.duration.300ms
        class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 md:hidden"
        @click="isOpen = false">
    </div>

    <!-- Sidebar Menu -->
    <div
        x-show="isOpen"
        x-transition:enter="transition transform duration-300 ease-out"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-250 ease-in"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl z-50 overflow-y-auto md:hidden"
    >
        <!-- Header Sidebar - Simple & Clean -->
        <div class="sticky top-0 bg-white border-b border-gray-100 px-6 py-5 z-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI" class="h-9 w-auto object-contain">
                    <span class="text-lg font-bold text-blue-600">.com</span>
                </div>
                <button @click="isOpen = false" class="text-gray-400 hover:text-gray-600 p-2 hover:bg-gray-100 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Items -->
        <nav class="px-4 py-6">
            <ul class="space-y-1">
                <!-- Beranda -->
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        Beranda
                    </a>
                </li>

                <!-- Profil -->
                <li>
                    <a href="{{ route('profile.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        Profil
                    </a>
                </li>

                <!-- Agenda -->
                <li>
                    <a href="{{ route('news.index', 'agenda') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        Agenda
                    </a>
                </li>

                <!-- Divider -->
                <li class="py-2">
                    <div class="border-t border-gray-100"></div>
                </li>

                <!-- AKD Dropdown -->
                <li x-data="{ openAKD: false }">
                    <button @click="openAKD = !openAKD"
                        class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        <span>AKD</span>
                        <svg class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': openAKD }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openAKD"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="mt-1 ml-4 space-y-1">
                        @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                            <a href="{{ route('news.index', $item) }}"
                                class="flex items-center px-4 py-2.5 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300 mr-3"></span>
                                {{ Str::of($item)->replace('-', ' ')->title() }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <!-- Kunjungan Tamu -->
                <li>
                    <a href="{{ route('news.index', 'kunjungan-tamu') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        Kunjungan Tamu
                    </a>
                </li>

                <!-- Fraksi -->
                <li>
                    <a href="{{ route('news.index', 'fraksi') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        Fraksi
                    </a>
                </li>

                <!-- Paripurna Dropdown -->
                <li x-data="{ openParipurna: false }">
                    <button @click="openParipurna = !openParipurna"
                        class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 font-medium">
                        <span>Paripurna</span>
                        <svg class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': openParipurna }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openParipurna"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="mt-1 ml-4 space-y-1">
                        @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                            <a href="{{ route('news.index', $item) }}"
                                class="flex items-center px-4 py-2.5 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300 mr-3"></span>
                                {{ Str::of($item)->replace('paripurna-', '')->title() }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <!-- Divider -->
                <li class="py-2">
                    <div class="border-t border-gray-100"></div>
                </li>

                <!-- Akun -->
                <li>
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg transition-all duration-200 font-semibold">
                        Akun
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
