<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Vite --}}
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/49210b9441.js" crossorigin="anonymous" defer></script>


    {{-- Tailwind fix untuk SPA load --}}
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        .nav-link.active {
            background-color: #eef2ff;
            color: #4338ca;
            border-left-color: #4338ca;
        }
    </style>
</head>

<body class="flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-lg fixed h-screen flex flex-col justify-between border-r border-gray-200">
        <div>
            {{-- Logo --}}
            <div class="flex flex-col items-center py-6 border-b">
                <img src="{{ asset('img/dkv/logo_skensa-dkv.png') }}" alt="Logo DKV" class="h-16 mb-2">
                <h1 class="text-lg font-bold text-indigo-700">Admin Dashboard</h1>
            </div>

            {{-- Navigasi --}}
            <ul class="space-y-1 mt-6">
                <li>
                    <a href="{{ route('admin.dashboard') }}" data-link
                        class="nav-link flex items-center gap-3 p-3 rounded-md font-medium text-gray-700 border-l-4 border-transparent hover:bg-indigo-50">
                        <i class="fa-solid fa-gauge w-5 text-indigo-600"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.qc.index') }}" data-link
                        class="nav-link flex items-center gap-3 p-3 rounded-md font-medium text-gray-700 border-l-4 border-transparent hover:bg-indigo-50">
                        <i class="fa-solid fa-clipboard-check w-5 text-indigo-600"></i> Quality Control
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kehadiran') }}" data-link
                        class="nav-link flex items-center gap-3 p-3 rounded-md font-medium text-gray-700 border-l-4 border-transparent hover:bg-indigo-50">
                        <i class="fa-solid fa-clipboard-user w-5 text-indigo-600"></i> Kehadiran
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logbook') }}" data-link
                        class="nav-link flex items-center gap-3 p-3 rounded-md font-medium text-gray-700 border-l-4 border-transparent hover:bg-indigo-50">
                        <i class="fa-solid fa-book w-5 text-indigo-600"></i> Logbook
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.data-siswa') }}" data-link
                        class="nav-link flex items-center gap-3 p-3 rounded-md font-medium text-gray-700 border-l-4 border-transparent hover:bg-indigo-50">
                        <i class="fa-solid fa-users w-5 text-indigo-600"></i> Data Siswa
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.saran') }}" data-link
                        class="nav-link flex items-center gap-3 p-3 rounded-md font-medium text-gray-700 border-l-4 border-transparent hover:bg-indigo-50">
                        <i class="fa-solid fa-comments w-5 text-indigo-600"></i> Saran
                    </a>
                </li>
            </ul>
        </div>

        {{-- Logout --}}
        <div class="p-4 border-t">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md font-semibold">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- Konten Utama --}}
    <main class="flex-1 ml-64 p-8 transition-opacity duration-300" id="main-content">
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-indigo-700">@yield('header', 'Dashboard')</h2>
            <p class="text-gray-600">Halo, {{ Auth::user()->name ?? 'Admin' }}</p>
        </header>

        {{-- Konten halaman dinamis --}}
        @yield('content')

        {{-- Stack script halaman --}}
        @stack('scripts')
    </main>

    {{-- SPA Loader --}}
    <script type="module">
        document.addEventListener("DOMContentLoaded", () => {
            const links = document.querySelectorAll("a[data-link]");
            const mainContent = document.getElementById("main-content");

            function setActiveLink(url) {
                links.forEach(link => {
                    link.classList.toggle("active", link.getAttribute("href") === url);
                });
            }

            async function loadPage(url) {
                mainContent.style.opacity = "0.4";
                try {
                    const res = await fetch(url, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    });
                    if (!res.ok) throw new Error(res.statusText);

                    const html = await res.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, "text/html");
                    const newContent = doc.querySelector("#main-content")?.innerHTML || doc.body.innerHTML;

                    mainContent.innerHTML = newContent;
                    mainContent.style.opacity = "1";
                    window.history.pushState({}, "", url);
                    setActiveLink(url);

                    initDashboardCharts();
                } catch (err) {
                    console.error(err);
                    mainContent.innerHTML = `
                    <div class="text-center text-red-600 mt-10">
                        <p>❌ Gagal memuat halaman.</p>
                        <button onclick="location.reload()" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">Muat Ulang</button>
                    </div>`;
                }
            }

            links.forEach(link => {
                link.addEventListener("click", e => {
                    e.preventDefault();
                    loadPage(link.getAttribute("href"));
                });
            });

            window.addEventListener("popstate", () => loadPage(window.location.pathname));
            setActiveLink(window.location.pathname);

            initDashboardCharts();

            // Chart.js Dashboard
            function initDashboardCharts() {
                if (typeof Chart === "undefined") return; // kalau belum ada Chart.js skip

                const chartLulus = document.getElementById('chartLulus');
                const chartDisiplin = document.getElementById('chartDisiplin');
                const chartHadir = document.getElementById('chartHadir');

                // hapus instance lama dulu biar gak error "Chart already initialized"
                Chart.helpers.each(Chart.instances, instance => instance.destroy());

                const makeChart = (el, value, color) => {
                    if (!el) return;
                    new Chart(el, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [value, 100 - value],
                                backgroundColor: [color, '#E5E7EB'],
                                borderWidth: 0
                            }]
                        },
                        options: {
                            cutout: '80%',
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                };

                makeChart(chartLulus, 85, '#6366F1');
                makeChart(chartDisiplin, 90, '#10B981');
                makeChart(chartHadir, 75, '#FACC15');
            }
        });
    </script>

</body>

</html>
