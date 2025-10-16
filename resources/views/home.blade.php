@extends('layouts.app')

@section('title', 'TEFA Pentahelix DKV Skensa')

@section('content')
    <section id="home" class="relative w-full h-[89dvh] overflow-hidden">
        <div x-data="{
            current: 0,
            slides: [
                { img: '/img/galeri/_MG_0106.JPG', title: 'Kolaborasi Lima Pilar', desc: 'Sinergi antar lima komponen utama. Fokus pada integrasi penuh untuk menjamin hasil optimal dan efektivitas kerja.' },
                { img: '/img/galeri/_MG_0119.JPG', title: 'Pembelajaran Berbasis Deep Learning', desc: 'Pendekatan pembelajaran yang fokus pada pemahaman konsep mendalam, berpikir kritis, dan penerapan nyata (project-based) yang relevan dengan kejuruan.' },
                { img: '/img/galeri/_MG_0127.JPG', title: 'Desain untuk Masa Depan', desc: 'Perancangan solusi yang inovatif dan berkelanjutan. Menjamin relevansi jangka panjang serta kemampuan adaptasi terhadap kebutuhan industri.' }
            ],
            intervalDuration: 7000 // Durasi per slide dalam ms
        }" x-init="// Mulai interval otomatis
        setInterval(() => current = (current + 1) % slides.length, intervalDuration);
        // Inisialisasi: Mulai animasi progress bar slide pertama secara langsung
        $nextTick(() => {
            const firstProgressBar = document.querySelector('.segment-progress-bar');
            if (firstProgressBar) {
                firstProgressBar.style.transition = `width ${intervalDuration}ms linear`;
                firstProgressBar.style.width = '100%';
            }
        })" class="relative w-full h-full">

            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="current === index" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" class="absolute inset-0 w-full h-full">
                    <img :src="slide.img" class="w-full h-full object-cover" alt="">

                    <div class="absolute inset-0 bg-gradient-to-r via-black/100 via-0% to-transparent to-70%">
                    </div>

                    <div class="absolute bottom-16 left-10 md:left-20 text-white max-w-xl">
                        <h2 class="text-4xl md:text-6xl font-bold leading-tight drop-shadow-lg mb-4" x-text="slide.title">
                        </h2>
                        <p class="text-gray-200 text-base md:text-lg mb-6" x-text="slide.desc"></p>
                        <a href="#gallery"
                            class="inline-block  bg-indigo-800 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-indigo-900 transition">
                            Jelajahi Karya
                        </a>
                    </div>
                </div>
            </template>

            <div class="absolute bottom-0 left-0 right-0 flex w-full h-[5px] bg-transparent z-10 px-4 space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <div class="flex-1 h-full bg-white/30 cursor-pointer overflow-hidden rounded-full"
                        @click="current = index">
                        <div class="h-full bg-yellow-400 rounded-full segment-progress-bar"
                            x-bind:style="current === index ? `width: 100%; transition: width ${intervalDuration}ms linear;` :
                                'width: 0%; transition: none;'"
                            x-init="// Logika saat slide berubah
                            $watch('current', (value) => {
                                // 1. Atur semua segmen (kecuali yang baru aktif) ke 0% tanpa transisi
                                $el.style.transition = 'none';
                                $el.style.width = '0%';
                            
                                // Memaksa reflow
                                void $el.offsetWidth;
                            
                                // 2. Jika slide ini adalah slide aktif, mulai transisi pengisian
                                if (current === index) {
                                    $el.style.transition = `width ${intervalDuration}ms linear`;
                                    $el.style.width = '100%';
                                }
                            });"></div>
                    </div>
                </template>
            </div>


        </div>
    </section>

    <!-- Tentang Teaching Factory -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto text-center px-4">
            <h3 class="text-3xl font-bold text-indigo-600 mb-6">Tentang Teaching Factory</h3>
            <p class="max-w-3xl mx-auto text-gray-600 leading-relaxed mb-10">
                Teaching Factory (TEFA) DKV SMKN 1 Rangkasbitung adalah model pembelajaran yang menggabungkan dunia
                pendidikan
                dengan dunia industri nyata. Melalui TEFA, siswa berperan sebagai desainer profesional muda yang
                menghasilkan karya
                bernilai guna, mulai dari desain grafis, fotografi, videografi, hingga media promosi digital.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <div class="bg-purple-50 rounded-xl p-6 shadow hover:shadow-lg transition">
                    <img src="/img/icon/design.png" class="mx-auto w-16 mb-4" alt="">
                    <h4 class="font-semibold text-xl text-indigo-700 mb-2">Desain Grafis</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Siswa menguasai teknik desain visual untuk branding, publikasi, dan kebutuhan media digital.
                    </p>
                </div>
                <div class="bg-purple-50 rounded-xl p-6 shadow hover:shadow-lg transition">
                    <img src="/img/icon/camera.png" class="mx-auto w-16 mb-4" alt="">
                    <h4 class="font-semibold text-xl text-indigo-700 mb-2">Fotografi & Videografi</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pelatihan konsep, pengambilan gambar, dan penyuntingan visual untuk kebutuhan komunikasi kreatif.
                    </p>
                </div>
                <div class="bg-purple-50 rounded-xl p-6 shadow hover:shadow-lg transition">
                    <img src="/img/icon/industri.png" class="mx-auto w-16 mb-4" alt="">
                    <h4 class="font-semibold text-xl text-indigo-700 mb-2">Kolaborasi Industri</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Melalui pendekatan Pentahelix, TEFA membangun sinergi antara sekolah, industri, dan masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pentahelix Section -->
    <section id="pentahelix" class="py-20 bg-gradient-to-b from-gray-100 to-white">
        <div class="container mx-auto text-center px-6">
            <h3 class="text-3xl font-bold text-indigo-600 mb-10">Konsep Pentahelix</h3>
            <p class="max-w-4xl mx-auto text-gray-600 mb-12 leading-relaxed">
                Model <span class="font-semibold text-indigo-700">Pentahelix</span> adalah strategi kolaboratif antara lima
                unsur utama —
                <strong>Akademisi, Bisnis, Komunitas, Pemerintah, dan Media</strong> — untuk membentuk ekosistem kreatif
                yang berkelanjutan.
                Di TEFA DKV, sinergi ini melahirkan inovasi desain yang tidak hanya indah secara visual, tetapi juga
                memiliki dampak sosial dan ekonomi.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 text-center">
                <div class="p-4 bg-white shadow rounded-xl hover:-translate-y-1 transition">
                    <h4 class="font-semibold text-indigo-700 mb-2">Akademisi</h4>
                    <p class="text-gray-600 text-sm">Pengembangan kurikulum berbasis industri kreatif.</p>
                </div>
                <div class="p-4 bg-white shadow rounded-xl hover:-translate-y-1 transition">
                    <h4 class="font-semibold text-indigo-700 mb-2">Bisnis</h4>
                    <p class="text-gray-600 text-sm">Kolaborasi proyek nyata dan magang industri.</p>
                </div>
                <div class="p-4 bg-white shadow rounded-xl hover:-translate-y-1 transition">
                    <h4 class="font-semibold text-indigo-700 mb-2">Komunitas</h4>
                    <p class="text-gray-600 text-sm">Keterlibatan sosial dalam pengabdian dan pelatihan kreatif.</p>
                </div>
                <div class="p-4 bg-white shadow rounded-xl hover:-translate-y-1 transition">
                    <h4 class="font-semibold text-indigo-700 mb-2">Pemerintah</h4>
                    <p class="text-gray-600 text-sm">Dukungan kebijakan untuk pendidikan vokasi kreatif.</p>
                </div>
                <div class="p-4 bg-white shadow rounded-xl hover:-translate-y-1 transition">
                    <h4 class="font-semibold text-indigo-700 mb-2">Media</h4>
                    <p class="text-gray-600 text-sm">Promosi dan publikasi karya inovatif siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Karya -->
    <section id="gallery" class="py-20 bg-gray-50">
        <div class="container mx-auto text-center px-4">
            <h3 class="text-3xl font-bold text-indigo-600 mb-10">Galeri Karya Siswa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="/img/galeri/_MG_0106.JPG" alt="Karya" class="rounded-t-xl w-full h-56 object-cover">
                    <div class="p-4">
                        <h4 class="font-semibold text-lg">Desain Poster Edukatif</h4>
                        <p class="text-gray-500 text-sm mt-1">Karya oleh siswa kelas XII DKV</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="/img/galeri/_MG_0119.JPG" alt="Karya" class="rounded-t-xl w-full h-56 object-cover">
                    <div class="p-4">
                        <h4 class="font-semibold text-lg">Branding Produk Lokal</h4>
                        <p class="text-gray-500 text-sm mt-1">Karya oleh siswa kelas XI DKV</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                    <img src="/img/galeri/_MG_0127.JPG" alt="Karya" class="rounded-t-xl w-full h-56 object-cover">
                    <div class="p-4">
                        <h4 class="font-semibold text-lg">Fotografi Konseptual</h4>
                        <p class="text-gray-500 text-sm mt-1">Karya oleh siswa kelas X DKV</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="py-16 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h4 class="text-xl text-indigo-600 font-medium">Our Partners</h4>
            </div>
            <div class="flex flex-wrap justify-center gap-6 sm:gap-8">
                <a href="#" class="flex justify-center items-center w-32 sm:w-40 lg:w-48">
                    <img src="/img/partners/ajun-print.png" alt="Ajun Print Logo"
                        class="h-1 sm:h-20 lg:h-24 object-contain">
                </a>
                <a href="#" class="flex justify-center items-center w-32 sm:w-40 lg:w-48">
                    <img src="/img/partners/newton.webp" alt="Newton Logo" class="h-16 sm:h-20 lg:h-24 object-contain">
                </a>
                <a href="#" class="flex justify-center items-center w-32 sm:w-40 lg:w-48">
                    <img src="/img/partners/lua.png" alt="Lua Logo"
                        class="h-16 sm:h-20 lg:h-24 bg-gray-700 rounded object-contain">
                </a>
                <a href="#" class="flex justify-center items-center w-32 sm:w-40 lg:w-48">
                    <img src="/img/partners/simetris.png" alt="Simetris Logo"
                        class="h-16 sm:h-20 lg:h-24 object-contain">
                </a>
            </div>
        </div>
    </section>


    <!-- Kontak -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto text-center px-4">
            <h3 class="text-3xl font-bold text-indigo-600 mb-6">Hubungi Kami</h3>
            <p class="text-gray-600 mb-8">Teaching Factory Pentahelix - Program Keahlian Desain Komunikasi Visual</p>
            <form class="max-w-md mx-auto text-left space-y-4">
                <input type="text" placeholder="Nama Anda"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
                <input type="email" placeholder="Email Anda"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
                <textarea placeholder="Pesan Anda" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500"></textarea>
                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">Kirim</button>
            </form>
        </div>
    </section>
@endsection
