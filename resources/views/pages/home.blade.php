@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Navbar --}}
    <x-navbar />

    {{-- Carousel --}}
    @if (!empty($carousel) && !request('search'))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Kategori Berita --}}
        @if (!request('search'))
            <section class="py-20">
                <div data-aos="fade-up" class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        Kategori Berita
                    </h2>
                    <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Jelajahi berbagai topik informasi terkini seputar kegiatan DPRD Kabupaten Banyuwangi
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('news.index', $category->slug) }}"
                            class="group block bg-white rounded-2xl p-6 border border-gray-100 hover:border-primary/30 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl flex items-center justify-center text-2xl group-hover:from-primary/20 group-hover:to-primary/10 transition-all duration-300">
                                    📰
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary transition-colors duration-300">
                                        {{ $category->name }}
                                    </h3>
                                    <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed">
                                        {{ $category->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Berita Terbaru / Hasil Pencarian --}}
        <section class="py-20 bg-gradient-to-b from-gray-50 to-white -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                @if (request('search'))
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">
                        Hasil Pencarian
                    </h2>
                    <div class="inline-flex items-center gap-2 px-6 py-3 bg-primary/10 rounded-full">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="text-primary font-semibold">{{ request('search') }}</span>
                    </div>
                @else
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        Berita Terbaru
                    </h2>
                    <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Simak kabar terkini dan agenda penting dari DPRD Kabupaten Banyuwangi
                    </p>
                @endif
            </div>

            @if (!$posts->isEmpty())
                <div data-aos="fade-up" data-aos-delay="100"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <x-card.news.news-card :post="$post" />
                    @endforeach
                </div>
            @else
                <div data-aos="zoom-in"
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm px-8 py-16 text-center max-w-lg mx-auto">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if (request('search'))
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            @endif
                        </svg>
                    </div>
                    @if (request('search'))
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Berita Tidak Ditemukan</h3>
                        <p class="text-gray-500 leading-relaxed">Coba gunakan kata kunci lain untuk hasil yang lebih spesifik.</p>
                    @else
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Belum Ada Berita Terbaru</h3>
                        <p class="text-gray-500 leading-relaxed">Kunjungi kembali untuk melihat pembaruan terbaru kami.</p>
                    @endif
                </div>
            @endif

            @if (request('search'))
                <div class="mt-12 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        </section>
    </main>

    {{-- Footer --}}
    <x-footer />
@endsection
