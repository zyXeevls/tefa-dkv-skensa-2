@extends('layouts.app')

@section('title', 'Program Software & Website Desain')

@section('content')
    <section class="py-20 mt-8 bg-indigo-700 text-white shadow-xl">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-5xl font-extrabold mb-4 animate-fade-in">Blok Website & Apps Development</h2>
            <p class="mx-auto max-w-4xl text-xl font-light mb-8">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores recusandae quos mollitia maxime
                perspiciatis in sit quasi repellat laudantium aspernatur.
            </p>

            <a href="#modul"
                class="inline-block bg-yellow-400 text-indigo-900 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
                Lihat Kurikulum & Modul
            </a>
        </div>
    </section>

    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-10 items-start">

                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold text-indigo-700 mb-6 border-b-2 border-indigo-200 pb-2">Tentang Materi
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores nisi enim reiciendis quam
                            recusandae nam error ab omnis praesentium, laborum quia illum hic animi! Quibusdam recusandae
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quae accusamus officiis
                            aspernatur, rem ullam reiciendis ex delectus soluta omnis adipisci, modi magnam. Voluptate
                            repudiandae odit obcaecati corrupti debitis suscipit delectus consectetur pariatur numquam enim.
                        </p>
                        <ul class="list-disc text-left mt-6 space-y-2 ml-8 font-medium text-indigo-600">
                            <li>🎨 Desain Grafis & Motion Graphic (Adobe Suite, Figma)</li>
                            <li>💻 Pengembangan Antarmuka Web (HTML/CSS, JavaScript Framework Dasar)</li>
                            <li>✨ Pembuatan Konten Interaktif & UI/UX Design</li>
                            <li>🚀 Proyek *Real-World* dan Kolaborasi Tim Profesional</li>
                        </ul>
                    </div>
                </div>

                <div id="modul"
                    class="md:col-span-1 bg-indigo-50 p-6 rounded-xl shadow-lg border-t-4 border-indigo-600">
                    <h4 class="text-xl font-bold text-indigo-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Modul Ajar Pembelajaran Blok Software
                    </h4>
                    <p class="text-sm text-gray-600 mb-4">
                        Dapatkan panduan lengkap materi ajar kami (Software & Web Desain) dalam format PDF.
                    </p>
                    <a href="pdf/modul-software.pdf" download
                        class="w-full inline-block text-center bg-indigo-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Unduh Sekarang (PDF)
                    </a>
                    <p class="text-xs text-center text-gray-500 mt-2">Ukuran file: [800kb]</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-16">
        <div class="container mx-auto grid md:grid-cols-2 gap-12 px-6 items-center">

            <div class="order-2 md:order-1">
                <img src="/img/illustrasi/learn-coding.jpg" alt="Ilustrasi Tools Desain dan Coding"
                    class="rounded-xl shadow-2xl border-4 border-white transform hover:scale-[1.02] transition duration-300">
            </div>

            <div class="order-1 md:order-2">
                <h3 class="text-3xl font-bold text-indigo-700 mb-6">Fokus Pembelajaran Berbasis Proyek</h3>
                <p class="text-gray-600 mb-6">
                    Tidak hanya mengajarkan teori, tetapi memaksa siswa untuk berpikir dan bekerja seperti desainer
                    profesional. Setiap modul diakhiri dengan proyek nyata yang memperkaya portofolio Anda.
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <span class="text-indigo-600 font-bold mr-3 text-xl">✓</span>
                        <div>
                            <span class="font-semibold text-gray-900">Instruktur Industri:</span> Dibimbing langsung oleh
                            praktisi aktif di bidang desain dan pengembangan web.
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="text-indigo-600 font-bold mr-3 text-xl">✓</span>
                        <div>
                            <span class="font-semibold text-gray-900">Portofolio Siap Kerja:</span> Lulusan memiliki koleksi
                            karya yang relevan untuk melamar ke perusahaan teknologi/agensi.
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="text-indigo-600 font-bold mr-3 text-xl">✓</span>
                        <div>
                            <span class="font-semibold text-gray-900">Ekosistem Belajar Modern:</span> Akses ke platform
                            e-learning, *mockup* klien, dan workshop intensif.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="projects" class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-indigo-700 mb-10">Intip Karya Terbaik Siswa Kami</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $projects = [
                        [
                            'title' => 'Desain Landing Page Kreatif',
                            'img' => 'https://source.unsplash.com/400x300/?web-design,ui-ux',
                            'desc' =>
                                'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut, quam nulla veritatis reiciendis veniam numquam minus possimus eligendi quod commodi!',
                        ],
                        [
                            'title' => 'Motion Graphic Produk UMKM',
                            'img' => 'https://source.unsplash.com/400x300/?motion-graphic,branding',
                            'desc' =>
                                'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut, quam nulla veritatis reiciendis veniam numquam minus possimus eligendi quod commodi!',
                        ],
                        [
                            'title' => 'Branding & Ilustrasi Digital',
                            'img' => 'https://source.unsplash.com/400x300/?digital-illustration,branding-design',
                            'desc' =>
                                'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut, quam nulla veritatis reiciendis veniam numquam minus possimus eligendi quod commodi!',
                        ],
                    ];
                @endphp

                @foreach ($projects as $p)
                    <div
                        class="bg-gray-50 rounded-xl shadow-lg hover:shadow-2xl overflow-hidden transition transform hover:-translate-y-1 duration-300">
                        <img src="{{ $p['img'] }}" alt="{{ $p['title'] }}" class="w-full h-52 object-cover">
                        <div class="p-5 text-left">
                            <h4 class="text-xl font-extrabold text-indigo-800">{{ $p['title'] }}</h4>
                            <p class="text-sm text-gray-600 mt-2">{{ $p['desc'] }}</p>
                            <a href="#"
                                class="mt-3 inline-block text-indigo-600 hover:text-indigo-800 text-sm font-semibold">Lihat
                                Detail →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
