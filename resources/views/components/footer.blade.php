<footer class="bg-indigo-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <div>
                <h3 class="text-lg font-bold mb-4">BWIpost.id</h3>
                <p class="text-gray-300 text-sm leading-relaxed mb-4">
                    Portal berita terpercaya yang menghadirkan informasi akurat dan objektif dari seluruh Indonesia.
                </p>
                @if (!$socialMedias->isEmpty())
                    <div class="flex space-x-3">
                        @foreach ($socialMedias as $social)
                            <x-social-media-icon :social="$social" />
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Kategori Berita</h3>
                <ul class="space-y-2 text-sm">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('news.index', $category->slug) }}"
                                class="text-gray-300 hover:text-white transition-colors">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Informasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('profile.index') }}"
                            class="text-gray-300 hover:text-white transition-colors">Tentang Kami</a>
                    </li>
                    {{-- <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Redaksi</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Karir</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Kode Etik</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Kebijakan Privasi</a>
                    </li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Kontak</a></li> --}}
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-600 mt-8 pt-8 text-center text-sm text-gray-300">
            © {{ date('Y') }} {{ env('APP_NAME') }}. Hak cipta dilindungi undang-undang.
        </div>
    </div>
</footer>
