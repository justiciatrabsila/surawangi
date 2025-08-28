<article class="group cursor-pointer relative">
    <img src="{{ asset("storage/$post->thumbnail") }}" alt="Related Article"
        class="w-full h-20 sm:h-24 object-cover rounded-lg mb-2 sm:mb-3 group-hover:opacity-90 transition-opacity">
    <h4
        class="text-xs sm:text-sm font-semibold text-navy group-hover:text-primary transition-colors mb-1 sm:mb-2 line-clamp-2">
        {{ $post->title }}
    </h4>
    <p class="text-xs text-gray-600">{{ $post->published_at->format('d F Y') }} •
        {{ $post->published_at->format('H:i') }}</p>
</article>
