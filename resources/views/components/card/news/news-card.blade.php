<article
    class="relative bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300"
    data-id="{{ $post->id }}">
    <div class="aspect-video overflow-hidden">
        <img src="{{ asset("/storage/$post->thumbnail") }}" alt="Foto {{ $post->title }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" alt="News Thumbnail">
    </div>
    <div class="p-4">
        {{-- <span
            class="inline-block bg-primary text-white px-3 py-1 rounded-full text-xs font-bold mb-2">${news.categoryText}</span> --}}
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
            class="stretched-link text-lg font-bold text-secondary mb-2 line-clamp-2 cursor-pointer hover:text-primary transition-colors">{{ $post->title }}</a>
        <div class="text-sm text-gray-600 mb-5">{{ $post->published_at->format('d F Y') }} •
            {{ $post->published_at->format('H:i') }}</div>
        <p class="text-gray-700 text-sm line-clamp-3 leading-relaxed">{!! str($post->excerpt)->sanitizeHtml() !!}</p>
    </div>
</article>
