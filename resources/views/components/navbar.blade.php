<div x-data="{ isOpen: false, searchOpen: false }" class="relative">
    <!-- HEADER -->
    <header class="bg-white/90 backdrop-blur-md shadow-md sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI"
                        class="h-10 w-auto object-contain transition-transform duration-300 hover:scale-105">
                    <span class="font-semibold text-lg text-primary hidden sm:inline">.com</span>
                </a>

                <!-- Desktop Search -->
                <form action="{{ route('home') }}" method="GET"
                    class="hidden md:flex items-center bg-gray-100 rounded-full overflow-hidden shadow-inner focus-within:ring-2 focus-within:ring-primary transition-all duration-300 w-full max-w-md mx-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berita..."
                        class="flex-1 bg-transparent px-4 py-2 text-gray-700 outline-none">
                    <button type="submit"
                        class="bg-primary text-white px-4 py-2 hover:bg-red-700 transition-all duration-300">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                </form>

                <!-- Mobile Buttons -->
                <div class="flex items-center space-x-3 md:hidden">
                    <button @click="searchOpen = !searchOpen"
                        class="p-2 rounded-full bg-gray-100 text-gray-600 hover:text-primary hover:bg-gray-200 transition-all">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                    <button @click="isOpen = !isOpen"
                        class="p-2 rounded-full bg-gray-100 text-gray-600 hover:text-primary hover:bg-gray-200 transition-all">
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

    <!-- NAV MENU -->
    <nav class="bg-white border-t-4 border-primary shadow-sm sticky top-[68px] z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="hidden md:flex items-center space-x-1">
                <li><x-navbar.nav-item title="Beranda" route="home" /></li>
                <li><x-navbar.nav-item title="Profil" route="profile.index" /></li>
                <li><x-navbar.nav-item title="Agenda" route="news.index" :params="'agenda'" /></li>

                <!-- Dropdown AKD -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-1 px-4 py-4 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 transition-colors rounded-md">
                        AKD
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute left-0 mt-0 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black/5 z-50 overflow-hidden">
                        <div class="py-1">
                            @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                                <a href="{{ route('news.index', $item) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary transition">
                                    {{ Str::of($item)->replace('-', ' ')->upper() }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li><x-navbar.nav-item title="Kunjungan Tamu" route="news.index" :params="'kunjungan-tamu'" /></li>
                <li><x-navbar.nav-item title="Fraksi" route="news.index" :params="'fraksi'" /></li>

                <!-- Dropdown Paripurna -->
                <li x-data="{ openParipurna: false }" class="relative">
                    <button @click="openParipurna = !openParipurna"
                        class="flex items-center gap-1 px-4 py-4 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 transition-colors rounded-md">
                        PARIPURNA
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': openParipurna }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="openParipurna" @click.away="openParipurna = false" x-transition
                        class="absolute left-0 mt-0 w-48 bg-white rounded-lg shadow-lg ring-1 ring-black/5 z-50 overflow-hidden">
                        <div class="py-1">
                            @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                                <a href="{{ route('news.index', $item) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary transition">
                                    {{ Str::of($item)->replace('paripurna-', '')->title() }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li><x-navbar.nav-item title="Akun" route="filament.admin.pages.dashboard" /></li>
            </ul>
        </div>
    </nav>

    <!-- MOBILE MENU SLIDE-IN DARI KANAN -->
    <!-- Overlay -->
    <div
        x-show="isOpen"
        x-transition.opacity
        class="fixed inset-0 bg-black/40 z-40 md:hidden"
        @click="isOpen = false">
    </div>

    <!-- Sidebar Menu -->
    <div
        x-show="isOpen"
        x-transition:enter="transition transform duration-400 ease-out"
        x-transition:enter-start="translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition transform duration-300 ease-in"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="translate-x-full opacity-0"
        class="fixed right-0 top-0 h-full w-72 bg-white shadow-2xl z-50 overflow-y-auto md:hidden border-l-2 border-primary"
    >
        <!-- Header Sidebar -->
        <div class="sticky top-0 bg-gradient-to-br from-primary via-blue-600 to-blue-700 p-5 shadow-xl z-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI" class="h-8 w-auto object-contain">
                    <div>
                        <p class="text-xs text-blue-100 mt-1"></p>
                    </div>
                </div>
                <button @click="isOpen = false" class="text-white hover:bg-white/20 p-2 rounded-xl transition-all duration-200 hover:rotate-90">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <ul class="flex flex-col py-4 px-4 space-y-1">
            <li>
                <a href="{{ route('home') }}"
                    class="group relative flex items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 overflow-hidden shadow-sm hover:shadow-md">
                    <span class="absolute left-0 w-1 h-0 bg-primary group-hover:h-full transition-all duration-300 rounded-r"></span>
                    <span class="relative z-10 text-sm font-semibold text-gray-700 group-hover:text-primary group-hover:translate-x-2 transition-all duration-300">Beranda</span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.index') }}"
                    class="group relative flex items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 overflow-hidden shadow-sm hover:shadow-md">
                    <span class="absolute left-0 w-1 h-0 bg-primary group-hover:h-full transition-all duration-300 rounded-r"></span>
                    <span class="relative z-10 text-sm font-semibold text-gray-700 group-hover:text-primary group-hover:translate-x-2 transition-all duration-300">Profil</span>
                </a>
            </li>

            <li>
                <a href="{{ route('news.index', 'agenda') }}"
                    class="group relative flex items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 overflow-hidden shadow-sm hover:shadow-md">
                    <span class="absolute left-0 w-1 h-0 bg-primary group-hover:h-full transition-all duration-300 rounded-r"></span>
                    <span class="relative z-10 text-sm font-semibold text-gray-700 group-hover:text-primary group-hover:translate-x-2 transition-all duration-300">Agenda</span>
                </a>
            </li>

            <!-- Mobile Dropdown AKD -->
            <li x-data="{ openAKD: false }" class="border-t border-gray-200 pt-3 mt-3">
                <button @click="openAKD = !openAKD"
                    class="w-full group relative flex justify-between items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 shadow-sm hover:shadow-md">
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-primary transition-colors duration-300">AKD</span>
                    <svg class="w-5 h-5 text-gray-400 transition-all duration-300 group-hover:text-primary"
                        :class="{ 'rotate-180 text-primary': openAKD }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openAKD"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="mt-2 space-y-1 pl-3">
                    @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                        <a href="{{ route('news.index', $item) }}"
                            class="group flex items-center px-4 py-2.5 text-sm text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition-all duration-200 hover:translate-x-1 hover:shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-300 group-hover:bg-primary mr-3 transition-all duration-200"></span>
                            {{ Str::of($item)->replace('-', ' ')->title() }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li>
                <a href="{{ route('news.index', 'kunjungan-tamu') }}"
                    class="group relative flex items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 overflow-hidden shadow-sm hover:shadow-md">
                    <span class="absolute left-0 w-1 h-0 bg-primary group-hover:h-full transition-all duration-300 rounded-r"></span>
                    <span class="relative z-10 text-sm font-semibold text-gray-700 group-hover:text-primary group-hover:translate-x-2 transition-all duration-300">Kunjungan Tamu</span>
                </a>
            </li>

            <li>
                <a href="{{ route('news.index', 'fraksi') }}"
                    class="group relative flex items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 overflow-hidden shadow-sm hover:shadow-md">
                    <span class="absolute left-0 w-1 h-0 bg-primary group-hover:h-full transition-all duration-300 rounded-r"></span>
                    <span class="relative z-10 text-sm font-semibold text-gray-700 group-hover:text-primary group-hover:translate-x-2 transition-all duration-300">Fraksi</span>
                </a>
            </li>

            <!-- Mobile Dropdown Paripurna -->
            <li x-data="{ openParipurna: false }" class="border-t border-gray-200 pt-3 mt-3">
                <button @click="openParipurna = !openParipurna"
                    class="w-full group relative flex justify-between items-center px-5 py-3.5 rounded-xl hover:bg-gray-50 transition-all duration-300 shadow-sm hover:shadow-md">
                    <span class="text-sm font-semibold text-gray-700 group-hover:text-primary transition-colors duration-300">Paripurna</span>
                    <svg class="w-5 h-5 text-gray-400 transition-all duration-300 group-hover:text-primary"
                        :class="{ 'rotate-180 text-primary': openParipurna }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openParipurna"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="mt-2 space-y-1 pl-3">
                    @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                        <a href="{{ route('news.index', $item) }}"
                            class="group flex items-center px-4 py-2.5 text-sm text-gray-600 hover:text-primary hover:bg-gray-50 rounded-lg transition-all duration-200 hover:translate-x-1 hover:shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-300 group-hover:bg-primary mr-3 transition-all duration-200"></span>
                            {{ Str::of($item)->replace('paripurna-', '')->title() }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="border-t border-gray-200 pt-3 mt-3">
                <a href="{{ route('filament.admin.pages.dashboard') }}"
                    class="group relative flex items-center px-5 py-3.5 rounded-xl hover:bg-white transition-all duration-300 overflow-hidden shadow-sm hover:shadow-md">
                    <span class="absolute left-0 w-1 h-0 bg-primary group-hover:h-full transition-all duration-300 rounded-r"></span>
                    <span class="relative z-10 text-sm font-semibold text-gray-700 group-hover:text-primary group-hover:translate-x-2 transition-all duration-300">Akun</span>
                </a>
            </li>
        </ul>

        <!-- Decorative Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-primary/5 to-transparent pointer-events-none"></div>
    </div>
</div>
