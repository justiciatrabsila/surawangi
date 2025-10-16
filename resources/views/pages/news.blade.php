@extends('layouts.app')

@section('title', $news->title)
@section('description', $news->excerpt)

@section('content')
    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- ===== HERO IMAGE ===== -->
        <section class="relative rounded-xl overflow-hidden shadow-md mb-10 max-h-[420px]">
            <img
                src="{{ asset("/storage/$news->thumbnail") }}"
                alt="{{ $news->title }}"
                class="w-full h-60 sm:h-72 md:h-80 object-cover transition-transform duration-700 hover:scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

            <div class="absolute bottom-6 left-6 text-white z-10 max-w-2xl">
                <span
                    class="inline-block bg-gradient-to-r from-primary to-accent px-3 py-1 rounded-full text-[10px] sm:text-xs font-semibold mb-2">
                    {{ $news->category->name }}
                </span>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold leading-snug drop-shadow-lg mb-2">
                    {{ $news->title }}
                </h1>
                <div class="text-[11px] sm:text-xs text-gray-200 flex flex-wrap items-center gap-2">
                    <span class="flex items-center gap-1">@svg('heroicon-o-calendar') {{ $news->published_at->format('d F Y') }}</span>
                    <span>•</span>
                    <span class="flex items-center gap-1">@svg('heroicon-o-clock') {{ $news->reading_time }} menit baca</span>
                    <span>•</span>
                    <span class="flex items-center gap-1">@svg('heroicon-o-eye') {{ $news->views }} pembaca</span>
                </div>
            </div>
        </section>

        <!-- ===== MAIN CONTENT ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- === ARTICLE CONTENT === -->
            <article class="lg:col-span-2 xl:col-span-3 bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="prose max-w-none text-gray-700 leading-relaxed text-justify text-[15px] sm:text-base">
                        {!! str($news->content)->sanitizeHtml() !!}
                    </div>

                    @if (!is_null($news->thumbnail_information))
                        <p class="text-xs text-gray-500 italic mt-6">
                            {{ $news->thumbnail_information }}
                        </p>
                    @endif

                    <!-- === SHARE SECTION === -->
                    <div class="mt-8 border-t border-gray-200 pt-5">
                        <h3 class="text-sm sm:text-base font-bold text-gray-800 mb-3">Bagikan artikel ini:</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank"
                                class="flex items-center justify-center w-9 h-9 rounded-full bg-blue-600 text-white hover:scale-110 transition-transform">
                                @svg('bi-facebook')
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->title) }}"
                                target="_blank"
                                class="flex items-center justify-center w-9 h-9 rounded-full bg-black text-white hover:scale-110 transition-transform">
                                @svg('bi-twitter-x')
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->fullUrl()) }}"
                                target="_blank"
                                class="flex items-center justify-center w-9 h-9 rounded-full bg-green-500 text-white hover:scale-110 transition-transform">
                                @svg('bi-whatsapp')
                            </a>
                            <button onclick="copyUrl()"
                                class="flex items-center justify-center w-9 h-9 rounded-full bg-gray-500 text-white hover:scale-110 transition-transform">
                                @svg('bi-share-fill')
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- === SIDEBAR === -->
            <aside class="space-y-8">
                <!-- POPULAR NEWS -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all">
                    <h3 class="text-lg font-bold text-navy mb-4 flex items-center gap-2">
                        @svg('bi-bar-chart') Berita Terpopuler
                    </h3>
                    <div class="space-y-4">
                        @foreach ($popularNews as $news)
                            <x-card.news.popular-news-card :number="$loop->iteration" :post="$news" />
                        @endforeach
                    </div>
                </div>

                <!-- RELATED NEWS -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all">
                    <h3 class="text-lg font-bold text-navy mb-4 flex items-center gap-2">
                        @svg('bi-newspaper') Berita Terkait
                    </h3>
                    <div class="grid gap-4">
                        @foreach ($relatedNews as $news)
                            <x-card.news.related-news-card :post="$news" />
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <x-footer />
@endsection

@push('scripts')
    <script>
        async function copyUrl() {
            try {
                await navigator.clipboard.writeText(window.location.href);
                notyf.success("✅ Link artikel berhasil disalin!");
            } catch (error) {
                console.error('Gagal menyalin link:', error);
            }
        }
    </script>
@endpush
