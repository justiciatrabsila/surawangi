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

    <!-- MOBILE MENU -->
    <div x-show="isOpen" x-transition class="md:hidden bg-white border-t border-gray-100 shadow-md">
        <ul class="flex flex-col py-2 space-y-1">
            <li><a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-gray-100">🏠 Beranda</a></li>
            <li><a href="{{ route('profile.index') }}" class="block px-4 py-2 hover:bg-gray-100">👤 Profil</a></li>
            <li><a href="{{ route('news.index', 'agenda') }}" class="block px-4 py-2 hover:bg-gray-100">🗓️ Agenda</a></li>

            <!-- Mobile Dropdown AKD -->
            <li x-data="{ openAKD: false }" class="border-t border-gray-100">
                <button @click="openAKD = !openAKD"
                    class="w-full flex justify-between items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    📋 AKD
                    <svg class="w-4 h-4 transition-transform duration-200"
                        :class="{ 'rotate-180': openAKD }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openAKD" x-transition class="pl-6 border-l border-gray-200">
                    @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                        <a href="{{ route('news.index', $item) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            {{ Str::of($item)->replace('-', ' ')->title() }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li><a href="{{ route('news.index', 'kunjungan-tamu') }}" class="block px-4 py-2 hover:bg-gray-100">🤝 Kunjungan Tamu</a></li>
            <li><a href="{{ route('news.index', 'fraksi') }}" class="block px-4 py-2 hover:bg-gray-100">🏛️ Fraksi</a></li>

            <!-- Mobile Dropdown Paripurna -->
            <li x-data="{ openParipurna: false }" class="border-t border-gray-100">
                <button @click="openParipurna = !openParipurna"
                    class="w-full flex justify-between items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                    📢 Paripurna
                    <svg class="w-4 h-4 transition-transform duration-200"
                        :class="{ 'rotate-180': openParipurna }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="openParipurna" x-transition class="pl-6 border-l border-gray-200">
                    @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                        <a href="{{ route('news.index', $item) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            {{ Str::of($item)->replace('paripurna-', '')->title() }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li><a href="{{ route('filament.admin.pages.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">⚙️ Akun</a></li>
        </ul>
    </div>
</div>
