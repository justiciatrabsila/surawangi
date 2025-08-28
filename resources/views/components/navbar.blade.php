<div x-data="{ isOpen: false, searchOpen: false }">
    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('assets/img/logo-remove.png') }}" alt="BWIpost.id"
                        class="w-auto h-10 object-contain hover:scale-105 transition-transform duration-300">
                </div>

                <!-- Desktop Search -->
                <form action="{{ route('home') }}" method="GET" class="hidden md:flex flex-1 max-w-md mx-4">
                    <x-input type="text" name="search" value="{{ request('search') }}"
                        class="rounded-r-none rounded-l-full !ring-0 !focus-visible:ring-0 !focus-visible:ring-offset-0 !focus:outline-none flex-1"
                        placeholder="Cari berita..." />
                    @isset($category)
                        @if ($category)
                            <input type="hidden" name="category" value="{{ $category->slug }}" />
                        @endif
                    @endisset
                    <button type="submit"
                        class="bg-primary text-white px-4 py-3 rounded-r-full hover:bg-red-700 transition-colors">
                        @svg('bi-search')
                    </button>
                </form>

                <!-- Mobile buttons -->
                <div class="flex items-center space-x-2 md:hidden">
                    <!-- Mobile search toggle -->
                    <button @click="searchOpen = !searchOpen"
                        class="p-2 rounded-md text-gray-600 hover:text-primary hover:bg-gray-100 transition-colors">
                        @svg('bi-search', 'w-5 h-5')
                    </button>

                    <!-- Mobile menu toggle -->
                    <button @click="isOpen = !isOpen"
                        class="p-2 rounded-md text-gray-600 hover:text-primary hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6" :class="{ 'hidden': isOpen, 'block': !isOpen }" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6" :class="{ 'block': isOpen, 'hidden': !isOpen }" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Search -->
            <div x-show="searchOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="pb-4 md:hidden">
                <form action="{{ route('home') }}" method="GET" class="flex">
                    <x-input type="text" name="search" value="{{ request('search') }}"
                        class="rounded-r-none rounded-l-full !ring-0 !focus-visible:ring-0 !focus-visible:ring-offset-0 !focus:outline-none flex-1"
                        placeholder="Cari berita..." />
                    @isset($category)
                        @if ($category)
                            <input type="hidden" name="category" value="{{ $category->slug }}" />
                        @endif
                    @endisset
                    <button type="submit"
                        class="bg-primary text-white px-4 py-3 rounded-r-full hover:bg-red-700 transition-colors">
                        @svg('bi-search')
                    </button>
                </form>
            </div>
        </div>
    </header>

    <nav class="bg-white border-t-4 border-primary shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Desktop Navigation -->
            <ul class="hidden md:flex flex-row">
                <li>
                    <x-navbar.nav-item title="Beranda" route="home" />
                </li>
                <li>
                    <x-navbar.nav-item title="Profil" route="profile.index" />
                </li>
                @foreach ($categories as $category)
                    <li>
                        <x-navbar.nav-item :title="$category->name" route="news.index" :params="$category->slug" />
                    </li>
                @endforeach
                <li>
                    <x-navbar.nav-item title="Akun" route="filament.admin.pages.dashboard" />
                </li>
            </ul>

            <!-- Mobile Navigation -->
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="md:hidden py-2">
                <ul class="space-y-1">
                    <li>
                        <x-navbar.nav-item title="Beranda" route="home"
                            class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors" />
                    </li>
                    <li>
                        <x-navbar.nav-item title="Profil" route="profile.index"
                            class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors" />
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <x-navbar.nav-item :title="$category->name" route="news.index" :params="$category->slug"
                                class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors" />
                        </li>
                    @endforeach
                    <li>
                        <x-navbar.nav-item title="Akun" route="filament.admin.pages.dashboard"
                            class="block px-4 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors" />
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
