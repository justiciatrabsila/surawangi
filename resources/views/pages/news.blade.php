@extends('layouts.app')

@section('title', $news->title)
@section('description', $news->excerpt)

@section('content')
    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- ===== HERO IMAGE ===== -->
        <section class="relative rounded-3xl overflow-hidden shadow-xl mb-12 group">
            <img
                src="{{ asset("/storage/$news->thumbnail") }}"
                alt="{{ $news->title }}"
                class="w-full h-72 sm:h-80 md:h-96 object-cover transition-transform duration-700 group-hover:scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

            <div class="absolute bottom-8 left-8 right-8 text-white z-10">
                <span
                    class="inline-block bg-blue-600 px-4 py-1.5 rounded-full text-xs font-semibold mb-3 shadow-lg">
                    {{ $news->category->name }}
                </span>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight mb-4 drop-shadow-lg">
                    {{ $news->title }}
                </h1>
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-200">
                    <span class="flex items-center gap-2">
                        @svg('heroicon-o-calendar', 'w-4 h-4')
                        {{ $news->published_at->format('d F Y') }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                    <span class="flex items-center gap-2">
                        @svg('heroicon-o-clock', 'w-4 h-4')
                        {{ $news->reading_time }} menit baca
                    </span>
                    <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                    <span class="flex items-center gap-2">
                        @svg('heroicon-o-eye', 'w-4 h-4')
                        {{ $news->views }} pembaca
                    </span>
                </div>
            </div>
        </section>

        <!-- ===== MAIN CONTENT ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- === ARTICLE CONTENT === -->
            <article class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 sm:p-10">
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! str($news->content)->sanitizeHtml() !!}
                    </div>

                    @if (!is_null($news->thumbnail_information))
                        <div class="mt-8 p-4 bg-gray-50 rounded-xl border-l-4 border-blue-600">
                            <p class="text-sm text-gray-600 italic">
                                {{ $news->thumbnail_information }}
                            </p>
                        </div>
                    @endif

                    <!-- === SHARE SECTION === -->
                    <div class="mt-10 pt-8 border-t border-gray-200">
                        <h3 class="text-base font-bold text-gray-900 mb-5 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                            Bagikan Artikel
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank"
                                class="group flex items-center gap-2 px-5 py-2.5 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-all duration-300 shadow-sm hover:shadow-md">
                                @svg('bi-facebook', 'w-4 h-4')
                                <span class="text-sm font-medium">Facebook</span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->title) }}"
                                target="_blank"
                                class="group flex items-center gap-2 px-5 py-2.5 rounded-full bg-black text-white hover:bg-gray-800 transition-all duration-300 shadow-sm hover:shadow-md">
                                @svg('bi-twitter-x', 'w-4 h-4')
                                <span class="text-sm font-medium">Twitter</span>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->fullUrl()) }}"
                                target="_blank"
                                class="group flex items-center gap-2 px-5 py-2.5 rounded-full bg-green-500 text-white hover:bg-green-600 transition-all duration-300 shadow-sm hover:shadow-md">
                                @svg('bi-whatsapp', 'w-4 h-4')
                                <span class="text-sm font-medium">WhatsApp</span>
                            </a>
                            <button onclick="copyUrl()"
                                class="group flex items-center gap-2 px-5 py-2.5 rounded-full bg-gray-600 text-white hover:bg-gray-700 transition-all duration-300 shadow-sm hover:shadow-md">
                                @svg('bi-share-fill', 'w-4 h-4')
                                <span class="text-sm font-medium">Salin Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- === SIDEBAR === -->
            <aside class="space-y-8">
                <!-- POPULAR NEWS -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                            @svg('bi-bar-chart', 'w-5 h-5 text-blue-600')
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">
                            Berita Terpopuler
                        </h3>
                    </div>
                    <div class="space-y-4">
                        @foreach ($popularNews as $news)
                            <x-card.news.popular-news-card :number="$loop->iteration" :post="$news" />
                        @endforeach
                    </div>
                </div>

                <!-- RELATED NEWS -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                            @svg('bi-newspaper', 'w-5 h-5 text-blue-600')
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">
                            Berita Terkait
                        </h3>
                    </div>
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
