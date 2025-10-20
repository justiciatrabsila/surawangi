<div x-data="{ isOpen: false, searchOpen: false }">
    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI"
                            class="w-auto h-10 object-contain hover:scale-105 transition-transform duration-300">
                    </a>
                </div>

                <!-- Desktop Search -->
                <form action="{{ route('home') }}" method="GET" class="hidden md:flex flex-1 max-w-md mx-4">
                    <x-input type="text" name="search" value="{{ request('search') }}"
                        class="rounded-r-none rounded-l-full flex-1"
                        placeholder="Cari berita..." />
                    <button type="submit"
                        class="bg-primary text-white px-4 py-3 rounded-r-full hover:bg-red-700 transition-colors">
                        @svg('bi-search')
                    </button>
                </form>

                <!-- Mobile buttons -->
                <div class="flex items-center space-x-2 md:hidden">
                    <button @click="searchOpen = !searchOpen"
                        class="p-2 rounded-md text-gray-600 hover:text-primary hover:bg-gray-100 transition-colors">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                    <button @click="isOpen = !isOpen"
                        class="p-2 rounded-md text-gray-600 hover:text-primary hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6" x-show="!isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="w-6 h-6" x-show="isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Search -->
            <div x-show="searchOpen" x-transition class="pb-4 md:hidden">
                <form action="{{ route('home') }}" method="GET" class="flex">
                    <x-input type="text" name="search" value="{{ request('search') }}"
                        class="rounded-r-none rounded-l-full flex-1"
                        placeholder="Cari berita..." />
                    <button type="submit"
                        class="bg-primary text-white px-4 py-3 rounded-r-full hover:bg-red-700 transition-colors">
                        @svg('bi-search')
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- NAV MENU -->
    <nav class="bg-white border-t-4 border-primary shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="hidden md:flex flex-row">
                <li><x-navbar.nav-item title="Beranda" route="home" /></li>
                <li><x-navbar.nav-item title="Profil" route="profile.index" /></li>
                <li><x-navbar.nav-item title="Agenda" route="news.index" :params="'agenda'" /></li>

                <!-- Dropdown AKD -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-1 px-4 py-4 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 transition-colors">
                        AKD
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition
                        class="absolute left-0 mt-0 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('news.index', 'komisi-1') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary">KOMISI 1</a>
                            <a href="{{ route('news.index', 'komisi-2') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary">KOMISI 2</a>
                            <a href="{{ route('news.index', 'komisi-3') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary">KOMISI 3</a>
                            <a href="{{ route('news.index', 'komisi-4') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary">KOMISI 4</a>
                            <a href="{{ route('news.index', 'rapat-khusus') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary">RAPAT KHUSUS</a>
                        </div>
                    </div>
                </li>

                <li><x-navbar.nav-item title="Kunjungan Tamu" route="news.index" :params="'kunjungan-tamu'" /></li>
                <li><x-navbar.nav-item title="Fraksi" route="news.index" :params="'fraksi'" /></li>
                <li><x-navbar.nav-item title="Paripurna" route="news.index" :params="'paripurna'" /></li>
                <li><x-navbar.nav-item title="Akun" route="filament.admin.pages.dashboard" /></li>
            </ul>
        </div>
    </nav>

    <!-- MOBILE MENU -->
    <div x-show="isOpen" x-transition class="md:hidden bg-white border-t border-gray-200 shadow-md">
        <ul class="flex flex-col py-2">
            <li><a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Beranda</a></li>
            <li><a href="{{ route('profile.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a></li>
            <li><a href="{{ route('news.index', 'agenda') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Agenda</a></li>

            <li x-data="{ openAKD: false }">
                <button @click="openAKD = !openAKD"
                    class="w-full flex justify-between items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    AKD
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': openAKD }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openAKD" x-transition class="pl-4">
                    <a href="{{ route('news.index', 'komisi-1') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">KOMISI 1</a>
                    <a href="{{ route('news.index', 'komisi-2') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">KOMISI 2</a>
                    <a href="{{ route('news.index', 'komisi-3') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">KOMISI 3</a>
                    <a href="{{ route('news.index', 'komisi-4') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">KOMISI 4</a>
                    <a href="{{ route('news.index', 'rapat-khusus') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">RAPAT KHUSUS</a>
                </div>
            </li>

            <li><a href="{{ route('news.index', 'kunjungan-tamu') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Kunjungan Tamu</a></li>
            <li><a href="{{ route('news.index', 'fraksi') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Fraksi</a></li>
            <li><a href="{{ route('news.index', 'paripurna') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Paripurna</a></li>
            <li><a href="{{ route('filament.admin.pages.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Akun</a></li>
        </ul>
    </div>
</div>
