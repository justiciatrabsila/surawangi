@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <x-navbar :category="$category" />

    @if (!empty($carousel))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- KONTEN UTAMA -->
            <div class="lg:col-span-2 space-y-10">
                <!-- BERITA UTAMA -->
                <section class="featured-section">
                    <h2 class="text-2xl font-extrabold text-navy mb-5 pb-2 border-b-4 border-primary">Berita Utama</h2>
                    @if (is_null($featuredPosts))
                        <div class="bg-gray-50 rounded-2xl border border-gray-200 py-16 text-center">
                            <h3 class="text-lg font-semibold text-gray-700">Tidak ada berita utama</h3>
                        </div>
                    @else
                        <x-card.news.news-card :post="$featuredPosts" />
                    @endif
                </section>

                <!-- BERITA TERBARU -->
                <section class="news-section">
                    <h2 class="text-2xl font-extrabold text-navy mb-5 pb-2 border-b-4 border-primary">Berita Terbaru</h2>
                    @if (!$posts->isEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach ($posts as $post)
                                <x-card.news.news-card :post="$post" />
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-2xl border border-gray-200 py-16 text-center">
                            <h3 class="text-lg font-semibold text-gray-700">Tidak ada berita baru</h3>
                        </div>
                    @endif

                    <div class="mt-8 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                </section>
            </div>

            <!-- SIDEBAR -->
            <aside class="space-y-8">
                <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 pb-2 border-b-2 border-primary">Berita Terpopuler</h3>
                    <div class="space-y-5">
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
