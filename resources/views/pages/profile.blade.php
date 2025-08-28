@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <x-navbar />

    @if (!empty($carousel))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-12">
        <!-- About Section -->
        <section class="mb-8 lg:mb-12 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <div class="space-y-4 lg:space-y-6">
                <h2 class="text-2xl lg:text-4xl font-bold text-navy">
                    Visi dan Misi
                </h2>

                <div class="space-y-4">
                    <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                        <h3 class="text-lg lg:text-xl font-bold text-primary mb-3">Visi</h3>
                        <p class="text-gray-700 leading-relaxed text-sm lg:text-base">
                            Menjadi portal berita online terdepan dan terpercaya di Indonesia yang memberikan
                            informasi
                            berkualitas, akurat, dan berimbang untuk mencerdaskan bangsa.
                        </p>
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                        <h3 class="text-lg lg:text-xl font-bold text-primary mb-3">Misi</h3>
                        <section class="text-gray-700 space-y-2 text-sm lg:text-base">
                            {!! str($profile->mission)->sanitizeHtml() !!}
                        </section>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <img src="{{ asset('assets/img/banjir.jpg') }}" alt="Tim BWIpost.id"
                    class="w-full h-64 lg:h-96 object-cover rounded-xl shadow-lg">

                <!-- Statistics Cards -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="stat-card bg-white p-4 rounded-xl shadow-lg text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary">5+</div>
                        <div class="text-xs lg:text-sm text-gray-600">Tahun Pengalaman</div>
                    </div>
                    <div class="stat-card bg-white p-4 rounded-xl shadow-lg text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary">10K+</div>
                        <div class="text-xs lg:text-sm text-gray-600">Artikel Dipublikasi</div>
                    </div>
                    <div class="stat-card bg-white p-4 rounded-xl shadow-lg text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary">50K+</div>
                        <div class="text-xs lg:text-sm text-gray-600">Pembaca Aktif</div>
                    </div>
                    <div class="stat-card bg-white p-4 rounded-xl shadow-lg text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-primary">8</div>
                        <div class="text-xs lg:text-sm text-gray-600">Kategori Berita</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        @if (!$staffs->isEmpty())
            <section class="mb-8 lg:mb-12">
                <h2
                    class="text-xl lg:text-3xl font-bold text-navy border-b-4 border-primary pb-2 lg:pb-3 inline-block mb-6 lg:mb-8">
                    Tim Redaksi BWIpost.id
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                    @foreach ($staffs as $staff)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <img src="{{ asset("storage/$staff->photo") }}" alt="{{ $staff->position }}"
                                class="w-full h-48 object-cover">
                            <div class="p-4 text-center">
                                <h3 class="font-bold mb-1 text-sm lg:text-base">{{ $staff->name }}</h3>
                                <p class="text-primary text-xs lg:text-sm font-medium mb-2">{{ $staff->position }}</p>
                                <p class="text-gray-600 text-xs">
                                    {{ $staff->bio }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Values & Principles -->
        <div class="mb-8 lg:mb-12">
            <h2
                class="text-xl lg:text-3xl font-bold text-navy border-b-4 border-primary pb-2 lg:pb-3 inline-block mb-6 lg:mb-8">
                Nilai & Prinsip Kerja
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-center mb-2 text-sm lg:text-base">Integritas</h3>
                    <p class="text-gray-700 text-center text-xs lg:text-sm leading-relaxed">
                        Menjunjung tinggi kejujuran dan transparansi dalam setiap pemberitaan yang kami sajikan.
                    </p>
                </div>

                <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-center mb-2 text-sm lg:text-base">Akurasi</h3>
                    <p class="text-gray-700 text-center text-xs lg:text-sm leading-relaxed">
                        Memastikan setiap informasi yang disajikan telah melalui proses verifikasi yang ketat.
                    </p>
                </div>

                <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-center mb-2 text-sm lg:text-base">Berimbang</h3>
                    <p class="text-gray-700 text-center text-xs lg:text-sm leading-relaxed">
                        Menyajikan berbagai sudut pandang untuk memberikan informasi yang objektif dan berimbang.
                    </p>
                </div>

                <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-center mb-2 text-sm lg:text-base">Aktual</h3>
                    <p class="text-gray-700 text-center text-xs lg:text-sm leading-relaxed">
                        Mengutamakan kecepatan penyampaian informasi tanpa mengorbankan kualitas dan akurasi.
                    </p>
                </div>

                <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-center mb-2 text-sm lg:text-base">Humanis</h3>
                    <p class="text-gray-700 text-center text-xs lg:text-sm leading-relaxed">
                        Mengutamakan nilai-nilai kemanusiaan dalam setiap pemberitaan yang kami publikasikan.
                    </p>
                </div>

                <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-center mb-2 text-sm lg:text-base">Inovatif</h3>
                    <p class="text-gray-700 text-center text-xs lg:text-sm leading-relaxed">
                        Terus berinovasi dalam penyajian berita dengan memanfaatkan teknologi terkini.
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        @if (!$contacts->isEmpty())
            <section class="mb-8 lg:mb-12">
                <h2
                    class="text-xl lg:text-3xl font-bold text-navy border-b-4 border-primary pb-2 lg:pb-3 inline-block mb-6 lg:mb-8">
                    Hubungi Kami
                </h2>

                <div class="flex justify-between bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                    @foreach ($contacts as $contact)
                        <div class="flex items-center gap-3">
                            <x-icon.contact-icon :contact="$contact" />
                            <div>
                                <p class="font-semibold text-gray-700 text-sm lg:text-base">{{ ucwords($contact->platform) }}</p>
                                <p class="text-gray-600 text-xs lg:text-sm">{{ $contact->contact }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Achievement Section -->
        @if (!$achievements->isEmpty())
            <section class="mb-8 lg:mb-12">
                <h2
                    class="text-xl lg:text-3xl font-bold text-navy border-b-4 border-primary pb-2 lg:pb-3 inline-block mb-6 lg:mb-8">
                    Pencapaian & Penghargaan
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                    @foreach ($achievements as $achievement)
                        <div class="bg-white p-4 lg:p-6 rounded-xl shadow-lg">
                            <div class="flex items-center gap-4 mb-4">
                                @if ($achievement->image)
                                    <img src="{{ asset("storage/$achievement->image") }}" class="object-cover w-12 h-12 lg:w-16 lg:h-16 rounded-full" />
                                @else
                                    <x-button class="!size-12 !lg:size-16 !rounded-full !bg-blue-500" asChild>
                                        <div>
                                            @svg('bi-trophy')
                                        </div>
                                    </x-button>
                                @endif

                                <div>
                                    <h3 class="font-bold text-sm lg:text-base">{{ $achievement->title }}</h3>
                                    <p class="text-gray-600 text-xs lg:text-sm">{{ $achievement->organizer }}</p>
                                </div>
                            </div>
                            <p class="text-gray-700 text-xs lg:text-sm">
                                {{ $achievement->description }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </main>

    <x-footer />
@endsection
