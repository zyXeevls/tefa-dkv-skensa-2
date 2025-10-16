@extends('layouts.app')

@section('title', 'Program Animasi 2D / 3D — Teaching Factory DKV')

@section('content')
    <!-- Hero Section: Lebih Bersemangat dan Mengajak -->
    <section class="py-20 mt-8 bg-indigo-700 text-white shadow-xl">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-5xl font-extrabold mb-4 animate-fade-in uppercase tracking-wider">BLOK ANIMASI 2D/3D</h2>
            <p class="mx-auto max-w-4xl text-xl font-light mb-8">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam a ullam fugit magni similique dolores.
            </p>
            <a href="#modul"
                class="inline-block bg-yellow-400 text-indigo-900 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
                Lihat Kurikulum & Modul
            </a>
        </div>
    </section>

    <!-- Tentang Program & Modul Ajar (Download PDF) -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-10 items-start">

                <!-- Kolom Kiri: Deskripsi Program -->
                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold text-indigo-700 mb-6 border-b-2 border-indigo-200 pb-2">Tentang Materi
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis, dolores. Molestiae suscipit
                            rem, voluptatibus ipsum fuga cupiditate temporibus officiis excepturi sapiente. Soluta impedit
                            alias eos quasi possimus odio neque doloribus!
                        </p>
                        <p class="font-semibold text-gray-800">
                            Fokus utama kami adalah mengoptimalkan kemampuan bercerita melalui visual yang dinamis.
                        </p>
                        <ul class="list-disc text-left mt-6 space-y-2 ml-8 font-medium text-purple-600">
                            <li>Pemodelan, *Texturing*, dan *Rigging* Karakter 3D (Blender/Maya)</li>
                            <li>Animasi Interaktif dan Teknik *Spine* 2D</li>
                            <li>Seni *Motion Graphic* dan *Visual Effects* (After Effects)</li>
                            <li>Proyek Akhir berupa Film Pendek Animasi Kualitas Studio</li>
                        </ul>
                    </div>
                </div>

                <!-- Kolom Kanan: Download Modul Ajar -->
                <div id="modul"
                    class="md:col-span-1 bg-purple-50 p-6 rounded-xl shadow-lg border-t-4 border-indigo-600">
                    <h4 class="text-xl font-bold text-indigo-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Download Modul Ajar Animasi
                    </h4>
                    <p class="text-sm text-gray-700 mb-4">
                        Dapatkan silabus lengkap Program Animasi 2D & 3D (PDF) untuk melihat detail materi per semester.
                    </p>
                    <a href="/pdf/modul-animasi.pdf" download
                        class="w-full inline-block text-center bg-indigo-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-indigo-700 transition transform hover:scale-[1.02]">
                        Unduh Sekarang (PDF)
                    </a>
                    <p class="text-xs text-center text-gray-500 mt-2">Ukuran file: [800kb]</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visualisasi Software & Keunggulan (Fokus pada Tools) -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto grid md:grid-cols-2 gap-12 px-6 items-center">

            <!-- Keunggulan Program -->
            <div class="order-1">
                <h3 class="text-3xl font-bold text-indigo-700 mb-6">Menguasai Software Studio</h3>
                <p class="text-gray-600 mb-6">
                    Kami menyediakan fasilitas dan pelatihan untuk menguasai ekosistem perangkat lunak yang digunakan studio
                    animasi besar. Ini adalah kunci untuk membangun portofolio yang dihargai industri.
                </p>
                <div class="space-y-4">
                    <!-- Blender 3D -->
                    <div class="flex items-center p-3 bg-white rounded-lg shadow-md border-l-4 border-orange-500">
                        <div class="flex-shrink-0 mr-4 text-3xl text-orange-600">
                            <!-- Placeholder Icon for Blender -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 00-2 2v2a2 2 0 002 2 2 2 0 002-2V8a2 2 0 00-2-2zm-6 2H4m2 0a2 2 0 002-2V4a2 2 0 00-2-2zm12 2h2m-2 0a2 2 0 00-2-2V4a2 2 0 002-2zM4 18h2m-2 0a2 2 0 002 2v2a2 2 0 00-2-2zm12 0h2m-2 0a2 2 0 002 2v2a2 2 0 00-2-2zM4 12h2m-2 0a2 2 0 002 2v2a2 2 0 00-2-2zm12 0h2m-2 0a2 2 0 002 2v2a2 2 0 00-2-2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Blender (3D Modeling)</p>
                            <p class="text-sm text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing.
                            </p>
                        </div>
                    </div>
                    <!-- Adobe After Effects -->
                    <div class="flex items-center p-3 bg-white rounded-lg shadow-md border-l-4 border-purple-500">
                        <div class="flex-shrink-0 mr-4 text-3xl text-purple-600">
                            <!-- Placeholder Icon for After Effects -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L12 19.25L14.25 17M12 19.25V4M5 12h4m6 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Adobe After Effects (Motion Graphic)</p>
                            <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet.
                            </p>
                        </div>
                    </div>
                    <!-- animasi 2d -->
                    <div class="flex items-center p-3 bg-white rounded-lg shadow-md border-l-4 border-green-500">
                        <div class="flex-shrink-0 mr-4 text-3xl text-green-600">
                            <!-- Placeholder Icon for 2D Animation -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Animasi 2D</p>
                            <p class="text-sm text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Blanditiis, tempore perspiciatis vel quos quas saepe amet! Iusto, pariatur.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gambar Animasi  -->
            <div class="order-2">
                <img src="/img/vector/animator.png" alt="Karakter Animasi 3D"
                    class="rounded-xl shadow-2xltransform hover:scale-[1.02] transition duration-300" </div>

            </div>
    </section>

    <!-- Galeri Proyek -->
    <section id="projects" class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-indigo-700 mb-10">Portfolio Karya Siswa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $projects = [
                        [
                            'title' => 'Film Pendek 3D "The Guardian"',
                            'img' => 'https://source.unsplash.com/400x300/?fantasy-3d-animation,rendering',
                            'desc' => 'Proyek akhir 3D yang menampilkan pencahayaan dan narasi kompleks.',
                        ],
                        [
                            'title' => 'Loop Animasi Karakter Game',
                            'img' => 'https://source.unsplash.com/400x300/?2d-animation,game-art',
                            'desc' => 'Animasi siap pakai untuk aset game 2D, fokus pada fluiditas gerakan.',
                        ],
                        [
                            'title' => 'VFX & Compositing Iklan TV',
                            'img' => 'https://source.unsplash.com/400x300/?visual-effects,compositing',
                            'desc' => 'Integrasi efek visual (VFX) pada rekaman video menggunakan After Effects.',
                        ],
                    ];
                @endphp

                @foreach ($projects as $p)
                    <div
                        class="bg-gray-50 rounded-xl shadow-lg hover:shadow-2xl overflow-hidden transition transform hover:-translate-y-1 duration-300">
                        <img src="{{ $p['img'] }}" alt="{{ $p['title'] }}" class="w-full h-52 object-cover">
                        <div class="p-5 text-left">
                            <h4 class="text-xl font-extrabold text-purple-700">{{ $p['title'] }}</h4>
                            <p class="text-sm text-gray-600 mt-2">{{ $p['desc'] }}</p>
                            <a href="#"
                                class="mt-3 inline-block text-purple-600 hover:text-purple-800 text-sm font-semibold">Lihat
                                Detail Proyek →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
