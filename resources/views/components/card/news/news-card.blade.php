<article
    class="news-card relative bg-white/90 backdrop-blur-sm rounded-xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-500 overflow-hidden group opacity-0 translate-y-6"
    data-id="{{ $post->id }}">

    {{-- Gambar --}}
    <div class="relative aspect-[16/10] overflow-hidden">
        <img src="{{ asset("/storage/$post->thumbnail") }}"
             alt="Foto {{ $post->title }}"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 group-hover:brightness-90">

        {{-- Efek overlay gradasi bawah --}}
        <div class="absolute inset-x-0 bottom-0 h-1/4 bg-gradient-to-t from-black/50 to-transparent"></div>
    </div>

    {{-- Konten --}}
    <div class="p-4 relative z-10">
        {{-- Judul berita --}}
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
           class="stretched-link block text-base font-semibold text-gray-900 leading-snug mb-1 group-hover:text-primary transition-colors duration-300 line-clamp-2">
            {{ $post->title }}
        </a>

        {{-- Info tanggal --}}
        <div class="text-[11px] text-gray-500 mb-2">
            {{ $post->published_at->format('d F Y') }} • {{ $post->published_at->format('H:i') }}
        </div>

        {{-- Ringkasan berita --}}
        <p class="text-gray-700 text-[13px] line-clamp-3 leading-relaxed mb-3">
            {!! str($post->excerpt)->sanitizeHtml() !!}
        </p>

        {{-- Tombol baca selengkapnya --}}
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
           class="inline-flex items-center gap-1 text-[13px] font-medium text-primary hover:text-indigo-600 transition-all duration-300 group">
            <span>Baca Selengkapnya</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</article>

{{-- ==== Animasi saat muncul ==== --}}
<style>
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(16px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.news-card {
  animation: fadeInUp 0.8s ease-out forwards;
  animation-delay: calc(var(--card-index, 0) * 0.1s);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".news-card");
  cards.forEach((card, index) => {
    card.style.setProperty("--card-index", index);
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            card.classList.add("animate");
            card.style.opacity = "1";
          }
        });
      },
      { threshold: 0.15 }
    );
    observer.observe(card);
  });
});
</script>
