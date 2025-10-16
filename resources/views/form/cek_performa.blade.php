@extends('layouts.app')

@section('title', 'Cek Performa Siswa — Teaching Factory DKV')

@section('content')
    <section class="relative bg-indigo-600 text-white py-24 overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-12">

                <!-- Kiri: Form -->
                <div class="bg-white/10 backdrop-blur-md rounded-3xl shadow-xl p-10 border border-white/20">
                    <h2 class="text-4xl font-extrabold mb-4 uppercase tracking-wider text-center">Cek Performa Siswa</h2>
                    <p class="text-indigo-100 text-center mb-8">Masukkan NISN kamu untuk melihat nilai performa, kehadiran,
                        dan soft skill.</p>

                    <form method="POST" action="{{ route('cek.performa.show') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="nisn" class="block text-sm font-semibold mb-2">NISN</label>
                            <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}"
                                placeholder="Masukkan NISN kamu"
                                class="w-full px-5 py-3 rounded-xl bg-white/20 text-white placeholder-indigo-200 border border-white/30 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition">
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-yellow-400 text-indigo-900 font-bold rounded-xl shadow-lg hover:bg-yellow-300 hover:shadow-2xl transition duration-300">
                            Lihat Performa
                        </button>
                    </form>

                    @if (session('error'))
                        <div class="mt-6 p-4 bg-red-100/90 text-red-700 rounded-xl text-center font-medium">
                            {{ session('error') }}
                        </div>
                    @endif

                    @isset($data)
                        <div class="mt-10 bg-white/10 rounded-2xl p-6 border border-white/20 shadow-lg">
                            <h3 class="text-2xl font-bold mb-4 text-yellow-400 text-center">📊 Hasil Performa</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-indigo-100">
                                <p><strong>Nama:</strong> {{ $data->nama }}</p>
                                <p><strong>NISN:</strong> {{ $data->nisn }}</p>
                                <p><strong>Nilai Produktif:</strong> {{ $data->nilai_produktif ?? '-' }}</p>
                                <p><strong>Soft Skill:</strong> {{ $data->softskill ?? '-' }}</p>
                                <p><strong>Kehadiran:</strong> {{ $data->kehadiran ?? '-' }}%</p>
                                <p><strong>Rata-rata:</strong> {{ $data->rata_rata ?? '-' }}</p>
                            </div>

                            <div class="mt-6 text-center">
                                <p class="text-lg font-semibold">
                                    Keterangan:
                                    @if (($data->rata_rata ?? 0) >= 85)
                                        <span class="text-green-400 font-bold">Sangat Baik 🏆</span>
                                    @elseif(($data->rata_rata ?? 0) >= 75)
                                        <span class="text-yellow-300 font-bold">Baik 👍</span>
                                    @else
                                        <span class="text-red-400 font-bold">Perlu Peningkatan 📈</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endisset
                </div>

                <!-- Kanan: Vector / Ilustrasi -->
                <div class="hidden lg:flex justify-center">
                    <img src="{{ asset('/img/illustrasi/performance.png') }}" alt="Ilustrasi Performa Siswa"
                        class="w-full max-w-2xlq animate-fade-in-up drop-shadow-2xl">
                </div>
            </div>
        </div>

        <!-- Dekorasi background vector (optional) -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-800/30 rounded-full blur-3xl -z-10"></div>
    </section>

    <script>
        document.addEventListener("keydown", (e) => {
            if (e.ctrlKey && e.key.toLowerCase() === "p") {
                e.preventDefault();
                window.location.href = "/cek-performa";
            }
        });
    </script>
@endsection
