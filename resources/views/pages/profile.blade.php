@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<x-navbar />

@if (!empty($carousel))
    <x-carousel.carousel :carousel="$carousel" />
@endif

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- ===== ABOUT SECTION ===== -->
    <section class="mb-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-6 border-l-8 border-primary pl-4">
                Visi & Misi Surawangi
            </h2>

            <div class="space-y-6">
                <div class="bg-white/95 border border-gray-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="flex items-center gap-2 text-xl font-semibold text-primary mb-2">
                        @svg('heroicon-o-eye', 'w-6 h-6') <span>Visi</span>
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi portal berita online terdepan dan terpercaya di Indonesia yang memberikan informasi
                        berkualitas, akurat, dan berimbang untuk mencerdaskan bangsa.
                    </p>
                </div>

                <div class="bg-white/95 border border-gray-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="flex items-center gap-2 text-xl font-semibold text-primary mb-2">
                        @svg('heroicon-o-light-bulb', 'w-6 h-6') <span>Misi</span>
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        {!! str($profile->mission)->sanitizeHtml() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <img src="{{ asset('assets/img/berempat.png') }}" alt="Tim Surawangi"
                class="w-full h-80 object-cover rounded-2xl shadow-2xl hover:scale-[1.02] transition-transform duration-300">

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-primary to-accent text-white rounded-xl p-5 text-center shadow-lg">
                    <div class="text-3xl font-bold">5+</div>
                    <div class="text-xs opacity-90">Tahun Pengalaman</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-3xl font-bold text-primary">10K+</div>
                    <div class="text-xs text-gray-600">Artikel Dipublikasi</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-3xl font-bold text-primary">50K+</div>
                    <div class="text-xs text-gray-600">Pembaca Aktif</div>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-3xl font-bold text-primary">8</div>
                    <div class="text-xs text-gray-600">Kategori Berita</div>
                </div>
            </div>
        </div>
    </section>

   <!-- ===== TEAM SECTION (Fixed 4 Columns & Square Image) ===== -->
@if (!$staffs->isEmpty())
<section class="mb-24">
    <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
        Tim Redaksi Surawangi
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($staffs as $staff)
        <div
            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group flex flex-col items-center text-center p-5 hover:-translate-y-1.5">

            <!-- Foto -->
            <div class="relative w-full h-56 rounded-xl overflow-hidden shadow-md mb-4 group-hover:scale-[1.03] transition-transform duration-300">
                <img src="{{ asset("storage/$staff->photo") }}" alt="{{ $staff->position }}"
                    class="w-full h-full object-cover">
            </div>

            <!-- Info -->
            <div class="flex-1 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $staff->name }}</h3>
                    <p class="text-primary text-xs font-medium mb-2 uppercase tracking-wide">{{ $staff->position }}</p>
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                        {{ $staff->bio }}
                    </p>
                </div>
            </div>

            <!-- Accent line -->
            <div class="mt-4 h-1 w-10 bg-primary rounded-full group-hover:w-16 transition-all duration-300"></div>
        </div>
        @endforeach
    </div>
</section>
@endif

    <!-- ===== VALUES SECTION ===== -->
    <section class="mb-20">
        <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
            Nilai & Prinsip Kerja
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $values = [
                    ['Integritas', 'Menjunjung tinggi kejujuran dan transparansi dalam setiap pemberitaan.', 'heroicon-o-shield-check'],
                    ['Akurasi', 'Memastikan setiap informasi melalui proses verifikasi yang ketat.', 'heroicon-o-magnifying-glass'],
                    ['Berimbang', 'Menyajikan berbagai sudut pandang secara objektif dan adil.', 'heroicon-o-scale'],
                    ['Aktual', 'Mengutamakan kecepatan tanpa mengorbankan kualitas.', 'heroicon-o-clock'],
                    ['Humanis', 'Mengutamakan nilai kemanusiaan dalam setiap berita.', 'heroicon-o-heart'],
                    ['Inovatif', 'Terus berinovasi dengan teknologi terkini.', 'heroicon-o-bolt'],
                ];
            @endphp

            @foreach ($values as [$title, $desc, $icon])
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all transform hover:-translate-y-2 text-center">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center bg-primary text-white rounded-xl shadow-md">
                    @svg($icon, 'w-7 h-7')
                </div>
                <h3 class="font-bold text-navy text-lg mb-2">{{ $title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    @if (!$contacts->isEmpty())
    <section class="mb-20">
        <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
            Hubungi Kami
        </h2>

        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-wrap justify-center gap-8">
            @foreach ($contacts as $contact)
            <div class="flex items-center gap-4 bg-gray-50 px-5 py-3 rounded-xl shadow-sm hover:shadow-md transition">
                <x-icon.contact-icon :contact="$contact" />
                <div>
                    <p class="font-semibold text-gray-700 text-sm">{{ ucwords($contact->platform) }}</p>
                    <p class="text-gray-500 text-xs">{{ $contact->contact }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- ===== ACHIEVEMENTS SECTION ===== -->
    @if (!$achievements->isEmpty())
    <section>
        <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
            Pencapaian & Penghargaan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($achievements as $achievement)
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all">
                <div class="flex items-center gap-4 mb-4">
                    @if ($achievement->image)
                        <img src="{{ asset("storage/$achievement->image") }}" class="w-14 h-14 rounded-full object-cover shadow-md" />
                    @else
                        <div class="w-14 h-14 flex items-center justify-center rounded-full bg-primary text-white shadow-md">
                            @svg('heroicon-o-trophy', 'w-6 h-6')
                        </div>
                    @endif
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">{{ $achievement->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $achievement->organizer }}</p>
                    </div>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">{{ $achievement->description }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</main>

<x-footer />
@endsection
