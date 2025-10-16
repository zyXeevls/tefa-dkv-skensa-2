<nav id="navbar"
    class="fixed top-0 left-0 w-full z-50 bg-white text-gray-800 shadow-sm transition-all duration-300 h-20 flex items-center">
    <div class="container mx-auto flex items-center justify-between px-4">
        <!-- Logo -->
        <a href="/" class="inline-flex items-center">
            <img src="{{ asset('img/dkv/dkv_skensa.png') }}" alt="Logo DKV" class="h-14 w-auto">
        </a>

        <!-- Menu Desktop -->
        <div id="nav-links" class="hidden md:flex items-center space-x-6 font-semibold relative">
            <a href="/" class="hover:text-indigo-600 transition">Beranda</a>

            <!-- Dropdown Blok -->
            <div class="relative dropdown">
                <button class="inline-flex items-center hover:text-indigo-600 transition dropdown-btn">
                    Blok
                    <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 10 6">
                        <path d="M1 1l4 4 4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div
                    class="absolute hidden dropdown-menu bg-white text-gray-700 rounded-lg shadow-lg mt-2 w-52 border border-gray-100">
                    <ul class="py-2 text-sm">
                        <li><a href="/animasi" class="block px-4 py-2 hover:bg-gray-100">Animasi 2D/3D</a></li>
                        <li><a href="/web-design" class="block px-4 py-2 hover:bg-gray-100">Software & Web Design</a>
                        </li>
                        <li><a href="/foto-video" class="block px-4 py-2 hover:bg-gray-100">Foto Video & Medsos</a></li>
                        <li><a href="/desain-percetakan" class="block px-4 py-2 hover:bg-gray-100">Desain Percetakan</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Dropdown Absensi -->
            <div class="relative dropdown">
                <button class="inline-flex items-center hover:text-indigo-600 transition dropdown-btn">
                    Absensi
                    <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 10 6">
                        <path d="M1 1l4 4 4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div
                    class="absolute hidden dropdown-menu bg-white text-gray-700 rounded-lg shadow-lg mt-2 w-48 border border-gray-100">
                    <ul class="py-2 text-sm">
                        <li><a href="/kehadiran-kinerja" class="block px-4 py-2 hover:bg-gray-100">Kehadiran &
                                Kinerja</a>
                        </li>
                        <li><a href="/logbook" class="block px-4 py-2 hover:bg-gray-100">Logbook Harian</a>
                        </li>
                        <li><a href="/cek-performa" class="block px-4 py-2 hover:bg-gray-100">Cek Performa Siswa</a>
                        </li>
                        {{-- from untuk admin!!! sekarang dihilangkan dulu --}}
                        {{-- <li><a href="/quality-control" class="block px-4 py-2 hover:bg-gray-100">Quality Control</a>
                        </li>
                        <li><a href="/skill-passport" class="block px-4 py-2 hover:bg-gray-100">Paspor Skill</a></li> --}}
                    </ul>
                </div>
            </div>

            <a href="/feedback" class="hover:text-indigo-600 transition">Feedback</a>
            <a href="#" class="hover:text-indigo-600 transition">Pelayanan</a>
        </div>

        <!-- Hamburger -->
        <button id="menu-btn"
            class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 hover:border-indigo-400 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition-all duration-200">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="hidden absolute top-20 left-0 w-full bg-white text-gray-800 md:hidden flex flex-col space-y-2 py-4 px-6 shadow-lg border-t border-indigo-100 rounded-b-2xl transition-all duration-300">
        <a href="/" class="hover:text-indigo-600 font-medium">Beranda</a>

        <div>
            <button id="mobile-blok-btn"
                class="flex justify-between items-center w-full font-medium hover:text-indigo-600">
                Blok
                <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                    viewBox="0 0 10 6">
                    <path d="M1 1l4 4 4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div id="mobile-blok-menu" class="hidden flex flex-col ml-3 mt-1 space-y-1 text-sm">
                <a href="/animasi" class="hover:text-indigo-600">Animasi 2D/3D</a>
                <a href="/web-design" class="hover:text-indigo-600">Software & Web Design</a>
                <a href="/foto-video" class="hover:text-indigo-600">Foto Video & Medsos</a>
                <a href="/desain-percetakan" class="hover:text-indigo-600">Desain Percetakan</a>
            </div>
        </div>

        <div>
            <button id="mobile-absen-btn"
                class="flex justify-between items-center w-full font-medium hover:text-indigo-600">
                Absensi
                <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                    viewBox="0 0 10 6">
                    <path d="M1 1l4 4 4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div id="mobile-absen-menu" class="hidden flex flex-col ml-3 mt-1 space-y-1 text-sm">
                <a href="/kehadiran-kinerja" class="hover:text-indigo-600">Kehadiran & Kinerja</a>
                <a href="/cek-performa" class="hover:text-indigo-600">Cek Performa Siswa</a>
                <a href="/quality-control" class="hover:text-indigo-600">Quality Control</a>
                <a href="/skill-passport" class="hover:text-indigo-600">Paspor Skill</a>
            </div>
        </div>

        <a href="/feedback" class="hover:text-indigo-600 font-medium">Feedback</a>
        <a href="#contact" class="hover:text-indigo-600 font-medium">Pelayanan</a>
    </div>

</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Desktop dropdown hover
        document.querySelectorAll('.dropdown').forEach(drop => {
            const btn = drop.querySelector('.dropdown-btn');
            const menu = drop.querySelector('.dropdown-menu');
            let timeout;

            btn.addEventListener('mouseenter', () => {
                clearTimeout(timeout);
                menu.classList.remove('hidden');
            });
            btn.addEventListener('mouseleave', () => {
                timeout = setTimeout(() => menu.classList.add('hidden'), 200);
            });
            menu.addEventListener('mouseenter', () => {
                clearTimeout(timeout);
            });
            menu.addEventListener('mouseleave', () => {
                timeout = setTimeout(() => menu.classList.add('hidden'), 200);
            });
        });

        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

        // Mobile dropdowns
        const mobileDropdowns = [{
                btn: 'mobile-blok-btn',
                menu: 'mobile-blok-menu'
            },
            {
                btn: 'mobile-absen-btn',
                menu: 'mobile-absen-menu'
            },
        ];

        mobileDropdowns.forEach(d => {
            const btn = document.getElementById(d.btn);
            const menu = document.getElementById(d.menu);
            const icon = btn.querySelector('svg');

            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    });
</script>
