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
    <section class="py-24 bg-gradient-to-b from-white to-blue-50/30">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
                Telusuri <span class="text-purple-600">Topik Berita</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Informasi terkini dan terlengkap seputar kegiatan DPRD Kabupaten Banyuwangi
            </p>
        </div>

        {{-- Modern Grid Layout --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}" class="group">
                    <a href="{{ route('news.index', $category->slug) }}"
                        class="block h-full bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl border-2 border-transparent hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2">

                        {{-- Colored Top Bar --}}
                        <div class="h-1.5 w-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full mb-6 group-hover:w-full transition-all duration-500"></div>

                        {{-- Icon Circle --}}
                        <div class="mb-5">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $category->name }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-gray-600 text-sm leading-relaxed mb-5 line-clamp-2">
                            {{ $category->description }}
                        </p>

                        {{-- Read More Link --}}
                        <div class="flex items-center text-blue-600 font-semibold text-sm">
                            <span class="mr-2">Lihat Berita</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endif
        {{-- Berita Terbaru / Hasil Pencarian --}}
        <section class="py-24 -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-20">
                @if (request('search'))
                    <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-700 text-sm font-medium rounded-full mb-4">
                        Pencarian
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 tracking-tight">
                        Hasil untuk "{{ request('search') }}"
                    </h2>
                @else
                    <h2 class="text-4xl lg:text-5xl font-bold text-blue-600 mb-6 tracking-tight">
                        Berita Terbaru
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                        Update informasi dan agenda penting dari DPRD Kabupaten Banyuwangi
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
                    class="bg-white rounded-3xl shadow-sm px-12 py-16 text-center max-w-lg mx-auto border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if (request('search'))
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            @endif
                        </svg>
                    </div>
                    @if (request('search'))
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Tidak Ada Hasil</h3>
                        <p class="text-gray-500 leading-relaxed">Coba kata kunci lain untuk pencarian yang lebih spesifik</p>
                    @else
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Belum Ada Berita</h3>
                        <p class="text-gray-500 leading-relaxed">Pantau terus untuk informasi terbaru dari kami</p>
                    @endif
                </div>
            @endif

            @if (request('search'))
                <div class="mt-16 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        </section>
    </main>

    {{-- Footer --}}
    <x-footer />
@endsection
