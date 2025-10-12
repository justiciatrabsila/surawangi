<article class="relative flex gap-2 sm:gap-3 pb-3 sm:pb-4 border-b border-gray-100 last:border-b-0 last:pb-0">
    <div
        class="size-6 sm:size-8 bg-primary text-white rounded-full flex items-center justify-center text-xs sm:text-sm font-bold flex-shrink-0">
        {{ $number }}
    </div>
    <div class="flex-1 min-w-0">
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
            class="stretched-link text-xs sm:text-sm font-semibold hover:text-primary cursor-pointer mb-1 transition-colors line-clamp-2">
            {{ $post->title }}
        </a>
        <div class="text-xs text-gray-600">{{ \Illuminate\Support\Number::forHumans($post->views) }} pembaca • {{ $post->published_at->diffForHumans() }}</div>
    </div>
</article>
