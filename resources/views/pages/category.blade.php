@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <x-navbar :category="$category" />

    @if (!empty($carousel))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-12 ">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
            <div class="lg:col-span-2 space-y-8">
                <section class="featured-section">
                    <h2 class="text-xl lg:text-2xl font-bold text-navy mb-6 pb-3 border-b-4 border-primary">Berita
                        Utama
                    </h2>
                    @if (is_null($featuredPosts))
                        <div class="bg-gray-50 rounded-xl border border-gray-200 px-8 py-16">
                            <h3 class="text-xl font-bold text-center text-gray-800">Tidak ada berita utama</h3>
                        </div>
                    @else
                        <x-card.news.news-card :post="$featuredPosts" />
                    @endif
                </section>

                <section class="news-section">
                    <h2 class="text-xl lg:text-2xl font-bold text-navy mb-6 pb-3 border-b-4 border-primary">Berita
                        Terbaru</h2>
                    @if (!$posts->isEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6"">
                            @foreach ($posts as $post)
                                <x-card.news.news-card :post="$post" />
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-xl border border-gray-200 px-8 py-16">
                            <h3 class="text-xl font-bold text-center text-gray-800">Tidak ada berita baru</h3>
                        </div>
                    @endif

                    <div class="mt-5">
                        {{ $posts->links() }}
                    </div>
                </section>
            </div>

            <aside class="space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg lg:text-xl font-bold text-navy mb-4 pb-2 border-b-2 border-primary">Berita
                        Terpopuler</h3>
                    <div class="space-y-4">
                        @foreach ($popularPosts as $post)
                            <x-card.news.popular-news-card :number="$loop->iteration" :post="$post" />
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <x-footer />
@endsection
