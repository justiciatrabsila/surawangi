@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <x-navbar />

    @if (!empty($carousel) && !request('search'))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (!request('search'))
            <section class="py-16 lg:py-20 bg-white">
                <h2 class="text-3xl lg:text-5xl font-bold text-center text-secondary mb-12 lg:mb-16">Kategori Berita</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($categories as $category)
                        <div
                            class="relative bg-white rounded-2xl p-6 lg:p-8 text-center shadow-lg border border-gray-200 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 animate-fade-in-up">
                            <h3 class="text-xl lg:text-2xl font-bold text-secondary mb-4">{{ $category->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ $category->description }}</p>
                            <a href="{{ route('news.index', $category->slug) }}"
                                class="stretched-link text-primary hover:text-primary-dark font-semibold transition-colors duration-300">Selengkapnya
                                →</a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="py-16 lg:py-20 bg-gray-50">
            @if (request('search'))
                <h2 class="text-lg font-semibold mb-5">
                    Hasil Pencarian dari {{ request('search') }}
                </h2>
            @else
                <h2 class="text-3xl lg:text-5xl font-bold text-center text-secondary mb-12 lg:mb-16">
                    Berita Terbaru
                </h2>
            @endif

            @if (!$posts->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($posts as $post)
                        <x-card.news.news-card :post="$post" />
                    @endforeach
                </div>
            @else
                <div class="bg-gray-50 rounded-xl border border-gray-200 px-8 py-16">
                    @if (request('search'))
                        <h3 class="text-xl font-bold text-center text-gray-800">Berita tidak ditemukan</h3>
                    @else
                        <h3 class="text-xl font-bold text-center text-gray-800">Tidak ada berita baru</h3>
                    @endif

                </div>
            @endif

            @if (request('search'))
                <div class="mt-5">
                    {{ $posts->links() }}
                </div>
            @endif
        </section>
    </main>

    <x-footer />
@endsection
