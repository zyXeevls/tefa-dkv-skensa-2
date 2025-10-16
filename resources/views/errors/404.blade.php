@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-slate-200 to-gray-200 dark:from-gray-800 dark:to-gray-900 text-black dark:text-white">
        <div class="flex items-center justify-center min-h-screen px-2">
            <div class="text-center">
                <p class="text-9xl font-bold text-indigo-700">404</p>
                <p class="text-2xl font-medium mt-4">Oops! Halaman tidak ada nih</p>
                <p class="mt-4 mb-8 text-gray-600">Halaman yang Anda cari tidak ada atau telah dipindahkan.</p>
                <a href="/"
                    class="px-6 py-3 bg-indigo-500 font-semibold rounded-full hover:bg-purple-100 transition duration-300 ease-in-out text-white">
                    Go Home
                </a>
            </div>
        </div>
    </div>
@endsection
