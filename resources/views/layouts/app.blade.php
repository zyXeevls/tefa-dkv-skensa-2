<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teaching Factory DKV')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="text-gray-900">
    @include('components.navbar')

    {{-- content --}}
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Link</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-4">
                            <a href="/kehadiran-kinerja" class="hover:underline">Kehadiran & Kinerja</a>
                        </li>
                        <li class="mb-4">
                            <a href="/feedback" class="hover:underline">Feedback</a>
                        </li>
                        <li class="mb-4">
                            <a href="/skill-passport" class="hover:underline">Skill Passport</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Help center</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Instagram</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Tiktok</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Legal</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Licensing</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="px-4 py-6 bg-gray-200 md:flex md:items-center md:justify-between rounded-t-2xl">
                <span class="text-sm text-gray-900 sm:text-center">
                    © {{ date('Y') }} <a href="/">Teaching Factory Desain Komunikasi Visual</a>. All Rights
                    Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5">
                    <!-- Social icons here -->
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener("keydown", (e) => {
            if (e.ctrlKey && e.key.toLowerCase() === "d") {
                e.preventDefault();
                window.location.href = "/admin/dashboard";
            }
        });
    </script>
</body>

</html>
