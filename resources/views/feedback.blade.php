@extends('layouts.app')

@section('title', 'Kepuasan Pelanggan')

@section('content')
    <div class="flex items-center justify-center p-4 mt-5">
        <!-- Author: FormBold Team -->
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="mx-auto w-full max-w-[700px] bg-white">
                <img src="../img/vector/feedback.png" alt="Feedback" class="block mx-auto mb-2 w-full max-w-[400px] h-auto" />
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 text-center">KEPUASAN PELANGGAN
                        (CUSTOMER
                        FEEDBACK)
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-relaxed">
                        Teaching Factory DKV Pentahelix – SMKN 1 RANGKASBITUNG
                    </p>
                </div>

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf

                    {{-- Informasi Umum --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="order_no" class="block font-semibold mb-1 text-gray-700">Nomor Order / PO</label>
                            <input type="text" id="order_no" name="order_no" class="w-full border-gray-300 rounded-lg"
                                placeholder="Contoh: 2304/PO/2025" required>
                        </div>
                        <div>
                            <label for="customer_name" class="block font-semibold mb-1 text-gray-700">Nama Pelanggan</label>
                            <input type="text" id="customer_name" name="customer_name"
                                class="w-full border-gray-300 rounded-lg" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div>
                            <label for="company" class="block font-semibold mb-1 text-gray-700">Perusahaan /
                                Instansi</label>
                            <input type="text" id="company" name="company" class="w-full border-gray-300 rounded-lg"
                                placeholder="Opsional">
                        </div>
                        <div>
                            <label for="product" class="block font-semibold mb-1 text-gray-700">Produk / Jasa yang
                                Dipesan</label>
                            <input type="text" id="product" name="product" class="w-full border-gray-300 rounded-lg"
                                placeholder="Contoh: Desain Brosur A4" required>
                        </div>
                        <div>
                            <label for="order_date" class="block font-semibold mb-1 text-gray-700">Tanggal Order</label>
                            <input type="date" id="order_date" name="order_date"
                                class="w-full border-gray-300 rounded-lg" required>
                        </div>
                        <div>
                            <label for="date_start" class="block font-semibold mb-1 text-gray-700">Mulai Produksi</label>
                            <input type="date" id="date_start" name="date_start"
                                class="w-full border-gray-300 rounded-lg" required>
                        </div>
                        <div>
                            <label for="date_end" class="block font-semibold mb-1 text-gray-700">Selesai Produksi</label>
                            <input type="date" id="date_end" name="date_end" class="w-full border-gray-300 rounded-lg"
                                required>
                        </div>
                    </div>

                    {{-- Penilaian --}}
                    <div class="mb-5 pt-3 shadow-lg bg-gray-50 border border-gray-200 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center text-gray-800">Penilaian Kepuasan</h2>

                        @php
                            $ratings = [
                                'rating_quality' => 'Kualitas Produk',
                                'rating_timeliness' => 'Ketepatan Waktu',
                                'rating_service' => 'Pelayanan',
                                'rating_price' => 'Harga',
                                'rating_overall' => 'Kepuasan Keseluruhan',
                            ];
                        @endphp

                        @foreach ($ratings as $name => $label)
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">{{ $label }}</label>
                                <div class="flex justify-between max-w-md mx-auto">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="flex flex-col items-center text-gray-600 cursor-pointer">
                                            <input type="radio" name="{{ $name }}" value="{{ $i }}"
                                                class="mb-1 focus:ring-0" required>
                                            <span class="text-sm">{{ $i }}</span>
                                        </label>
                                    @endfor
                                </div>
                                <hr class="py-2">
                            </div>
                        @endforeach
                    </div>
                    <section class="mb-5 pt-3 shadow-lg bg-gray-50 border border-gray-200 p-6 rounded-lg">
                        <div class="max-w-2xl mx-auto px-4">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Komentar Anda</h2>
                            </div>
                            <div
                                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" name="comment" rows="6"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                    placeholder="Tulis komentar Anda di sini..." required></textarea>
                            </div>
                        </div>
                    </section>
                    <div class="text-center pb-10">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md transition">
                            Kirim Feedback
                        </button>
                    </div>
                </form>
            </div>
        </form>

    @endsection
