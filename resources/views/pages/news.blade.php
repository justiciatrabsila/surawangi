@extends('layouts.app')

@section('title', $news->title)

@section('description', $news->excerpt)

@section('content')
    <x-navbar />

    <main class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4 sm:py-6 lg:py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
            <!-- Article Content -->
            <article
                class="lg:col-span-2 xl:col-span-3 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Article Header -->
                <div class="p-4 sm:p-6">
                    <div
                        class="flex flex-col space-y-3 sm:space-y-0 sm:flex-row sm:justify-between sm:items-start gap-3 mb-4 sm:mb-6">
                        <span class="bg-primary text-white px-3 py-1 rounded-full text-xs sm:text-sm font-semibold w-fit">
                            {{ $news->category->name }}
                        </span>
                        <div class="text-gray-600 text-xs sm:text-sm">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                                <span>{{ $news->published_at->format('d F Y') }}
                                    {{ $news->published_at->format('H:i') }}</span>
                                <span class="hidden sm:inline">•</span>
                                <span>Penerbit: {{ $news->publisher->name }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="text-xl sm:text-2xl md:text-3xl xl:text-4xl font-bold text-navy mb-4 sm:mb-6 leading-tight">
                        {{ $news->title }}
                    </h1>

                    <!-- Meta Info -->
                    <div
                        class="flex flex-col sm:flex-row sm:flex-wrap items-start sm:items-center gap-3 sm:gap-4 pb-4 sm:pb-6 mb-4 sm:mb-6 border-b border-gray-200 text-xs sm:text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="size-4">
                                @svg('heroicon-o-eye')
                            </span>
                            {{ $news->views }} pembaca
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="size-4">
                                @svg('heroicon-o-clock')
                            </span>
                            {{ $news->reading_time }} menit baca
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="px-4 sm:px-6 mb-4 sm:mb-6">
                    <img src="{{ asset("/storage/$news->thumbnail") }}" alt="{{ $news->title }}"
                        class="w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover">
                    @if (!is_null($news->thumbnail_information))
                        <p class="text-xs sm:text-sm text-gray-500 mt-2 sm:mt-3 italic">
                            {{ $news->thumbnail_information }}
                        </p>
                    @endif
                </div>

                <!-- Article Content -->
                <div class="px-4 sm:px-6 pb-4 sm:pb-6">
                    <section class="text-sm sm:text-base prose">
                        {!! str($news->content)->sanitizeHtml() !!}
                    </section>

                    <!-- Share Buttons -->
                    <div class="mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-800 mb-3">Bagikan Artikel:</h3>
                        <div class="grid grid-cols-2 sm:flex sm:flex-wrap gap-2 sm:gap-3">
                            <x-button class="text-white !bg-blue-500 !hover:bg-blue-600" :asChild="true">
                                <a
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}">
                                    @svg('bi-facebook')
                                </a>
                            </x-button>
                            <x-button class="text-white !bg-gray-800 !hover:bg-gray-900" :asChild="true">
                                <a
                                    href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->title) }}">
                                    @svg('bi-twitter-x')
                                </a>
                            </x-button>
                            <x-button class="text-white !bg-green-500 !hover:bg-green-600" :asChild="true">
                                <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->fullUrl()) }}">
                                    @svg('bi-whatsapp')
                                </a>
                            </x-button>
                            <x-button class="text-white !bg-slate-500 !hover:bg-slate-600" :asChild="true">
                                <button onclick="copyUrl()">
                                    @svg('bi-share-fill')
                                </button>
                            </x-button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:col-span-1 xl:col-span-1 space-y-4 sm:space-y-6">
                <!-- Popular Articles -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
                    <h3 class="text-base sm:text-lg font-bold text-navy mb-3 sm:mb-4 pb-2 border-b-2 border-primary">
                        <span class="inline-block align-middle me-2">
                            @svg('bi-bar-chart')
                        </span>
                        <span class="inline-block align-middle">
                            Berita Terpopuler
                        </span>
                    </h3>
                    <div class="space-y-3 sm:space-y-4">
                        @foreach ($popularNews as $news)
                            <x-card.news.popular-news-card :number="$loop->iteration" :post="$news" />
                        @endforeach
                    </div>
                </div>

                <!-- Related Articles -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
                    <h3 class="text-base sm:text-lg font-bold text-navy mb-3 sm:mb-4 pb-2 border-b-2 border-primary">
                        <span class="inline-block align-middle me-2">
                            @svg('bi-newspaper')
                        </span>
                        <span class="inline-block align-middle">
                            Berita Terkait
                        </span>
                    </h3>
                    <div class="space-y-3 sm:space-y-4">
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
                notyf.success("Link artikel berhasil disalin!");
            } catch (error) {
                console.error('Gagal menyalin link:', error);
            }
        }
    </script>
@endpush
