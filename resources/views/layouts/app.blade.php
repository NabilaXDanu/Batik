<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Toko Batik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/filament.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --primary-color: #1810f0;
            --secondary-color: #ff6b35;
            --accent-color: #ea581a;
            --text-light: #f8f9fa;
            --text-dark: #1a1a2e;
            --background-light: #ffffff;
            --background-dark: #16123f;
            --success-color: #4caf50;
            --warning-color: #ff9800;
            --error-color: #f44336;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Playfair Display', serif;
        }

        .custom-title {
            color: var(--primary-color);
            position: relative;
            display: inline-block;
        }

        .custom-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .custom-title:hover::after {
            width: 100px;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.215, 0.61, 0.355, 1),
                transform 0.8s cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .card-hover {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275),
                box-shadow 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card-hover:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1),
                0 15px 20px rgba(59, 33, 160, 0.1);
            border-color: rgba(255, 107, 53, 0.2);
        }

        .card-hover:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 206, 0, 0) 0%, rgba(255, 206, 0, 0) 85%, rgba(255, 206, 0, 0.2) 100%);
            z-index: 0;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card-hover:hover:before {
            opacity: 1;
        }

        .icon-hover {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            display: inline-block;
        }

        .icon-hover:hover {
            transform: scale(1.3) rotate(5deg);
            color: var(--accent-color);
        }

        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--accent-color);
        }

        .nav-link.active {
            color: var(--accent-color);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: var(--text-light);
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 6px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 107, 53, 0.4);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-secondary {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(59, 33, 160, 0.3);
        }

        .btn-secondary:hover {
            background-color: #4830b0;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 33, 160, 0.4);
        }

        .pattern-background {
            background-color: #f8f9fa;
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d1d9e6' fill-opacity='0.4' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='3'/%3E%3Ccircle cx='13' cy='13' r='3'/%3E%3C/g%3E%3C/svg%3E");
        }

        .custom-shape-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .custom-shape-divider svg {
            display: block;
            width: calc(100% + 1.3px);
            height: 50px;
        }

        .custom-shape-divider .shape-fill {
            fill: var(--background-light);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .image-glow {
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(255, 107, 53, 0.5);
            transition: box-shadow 0.5s ease;
        }

        .image-glow:hover {
            box-shadow: 0 0 35px rgba(255, 107, 53, 0.8);
        }

        .featured-tag {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: var(--accent-color);
            color: var(--text-dark);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            z-index: 10;
            transform: rotate(5deg);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0) translateX(-50%);
            }

            40% {
                transform: translateY(-20px) translateX(-50%);
            }

            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .dropdown-menu {
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }

        .dropdown-menu.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen scroll-smooth bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-[#f0b410] text-white p-6 sticky top-0 z-20 shadow-[0_5px_15px_rgba(0,0,0,0.3)]"
        x-data="{ open: false, dropdownOpen: false }">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl md:text-3xl font-extrabold tracking-wider relative flex items-center">
                <span class="text-[#ff6b35] mr-2"><i class="fas fa-store"></i></span>
                <span class="text-shadow">Toko Batik</span>
                <span class="absolute -bottom-1 left-0 w-full h-[3px] bg-[#ffce00] rounded-full"></span>
            </a>
            <ul class="hidden md:flex space-x-6 lg:space-x-10 text-base lg:text-lg font-medium">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">Tentang</a></li>
                <li><a href="#products" class="nav-link">Produk</a></li>
                <li><a href="#testimonials" class="nav-link">Testimoni</a></li>
                <li><a href="#faq" class="nav-link">FAQ</a></li>
                <li><a href="#contact" class="nav-link">Kontak</a></li>
                @if (auth()->check())
                    <li class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="nav-link flex items-center">
                            Akun <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 py-2 w-48 bg-white shadow-xl rounded-lg text-gray-800"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-4">
                            <a href="{{ route('orders') }}"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Pesanan</a>
                            <div class="border-t border-gray-200 my-1"></div>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endif
            </ul>
            <button class="md:hidden text-2xl" @click="open = !open">
                <i class="fas" :class="open ? 'fa-times' : 'fa-bars'"></i>
            </button>
        </div>
        <div x-show="open" class="md:hidden mt-4 px-4 rounded-lg bg-[#3C2F22] py-4"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-4">
            <ul class="space-y-4 text-base font-medium">
                <li><a href="#home"
                        class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                        <i class="fas fa-home mr-3 text-[#ff6b35]"></i>Home
                    </a></li>
                <li><a href="#about"
                        class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                        <i class="fas fa-info-circle mr-3 text-[#ff6b35]"></i>Tentang
                    </a></li>
                <li><a href="#products"
                        class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                        <i class="fas fa-tshirt mr-3 text-[#ff6b35]"></i>Produk
                    </a></li>
                <li><a href="#testimonials"
                        class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                        <i class="fas fa-comment mr-3 text-[#ff6b35]"></i>Testimoni
                    </a></li>
                <li><a href="#faq"
                        class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                        <i class="fas fa-question-circle mr-3 text-[#ff6b35]"></i>FAQ
                    </a></li>
                <li><a href="#contact"
                        class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                        <i class="fas fa-envelope mr-3 text-[#ff6b35]"></i>Kontak
                    </a></li>
                @if (auth()->check())
                    <li x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen"
                            class="w-full text-left hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center justify-between">
                            <span class="flex items-center"><i class="fas fa-user mr-3 text-[#ff6b35]"></i>Akun</span>
                            <i class="fas" :class="subOpen ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="subOpen" class="pl-8 mt-2 space-y-2"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                            <a href="{{ route('orders') }}" class="block py-1 hover:text-[#ffce00]">Pesanan</a>
                            <a href="{{ route('logout') }}"
                                class="block py-1 text-red-400 hover:text-red-300">Logout</a>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}"
                            class="hover:text-[#ffce00] transition duration-300 block py-2 border-b border-[#2d2a63] flex items-center">
                            <i class="fas fa-sign-in-alt mr-3 text-[#ff6b35]"></i>Login
                        </a></li>
                    <li><a href="{{ route('register') }}"
                            class="hover:text-[#ffce00] transition duration-300 block py-2 flex items-center">
                            <i class="fas fa-user-plus mr-3 text-[#ff6b35]"></i>Register
                        </a></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#16123f] text-white p-6 md:p-8 mt-auto relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-[#232052] rounded-full opacity-20 transform -translate-x-32 -translate-y-32">
        </div>
        <div
            class="absolute bottom-0 right-0 w-80 h-80 bg-[#232052] rounded-full opacity-20 transform translate-x-40 translate-y-40">
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 px-4 relative z-10">
            <div class="bg-[#232052] p-6 rounded-xl shadow-lg transform transition duration-500 hover:-translate-y-2">
                <h3
                    class="text-lg md:text-xl font-bold mb-4 text-[#ffce00] border-b-2 border-[#ff6b35] pb-2 inline-block">
                    Tentang Kami</h3>
                <p class="text-sm text-gray-200 leading-relaxed">Kami adalah toko batik online yang menghadirkan karya
                    seni berkualitas tinggi, memadukan tradisi dan inovasi. Setiap produk dibuat dengan ketelitian dan
                    cinta untuk memastikan kepuasan pelanggan.</p>
                <div class="mt-4 flex space-x-3">
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-[#ff6b35] flex items-center justify-center transition duration-300 hover:bg-[#ffce00] hover:text-[#16123f]">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-[#ff6b35] flex items-center justify-center transition duration-300 hover:bg-[#ffce00] hover:text-[#16123f]">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-[#ff6b35] flex items-center justify-center transition duration-300 hover:bg-[#ffce00] hover:text-[#16123f]">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="bg-[#232052] p-6 rounded-xl shadow-lg transform transition duration-500 hover:-translate-y-2">
                <h3
                    class="text-lg md:text-xl font-bold mb-4 text-[#ffce00] border-b-2 border-[#ff6b35] pb-2 inline-block">
                    Link Cepat</h3>
                <ul class="text-sm text-gray-200 space-y-2">
                    <li>
                        <a href="#home"
                            class="flex items-center hover:text-[#ffce00] transition duration-300 group">
                            <span
                                class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 group-hover:bg-[#ffce00] group-hover:text-[#16123f] transition duration-300">
                                <i class="fas fa-home text-xs"></i>
                            </span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#products"
                            class="flex items-center hover:text-[#ffce00] transition duration-300 group">
                            <span
                                class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 group-hover:bg-[#ffce00] group-hover:text-[#16123f] transition duration-300">
                                <i class="fas fa-tshirt text-xs"></i>
                            </span>
                            Produk
                        </a>
                    </li>
                    <li>
                        <a href="#testimonials"
                            class="flex items-center hover:text-[#ffce00] transition duration-300 group">
                            <span
                                class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 group-hover:bg-[#ffce00] group-hover:text-[#16123f] transition duration-300">
                                <i class="fas fa-comment text-xs"></i>
                            </span>
                            Testimoni
                        </a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="flex items-center hover:text-[#ffce00] transition duration-300 group">
                            <span
                                class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 group-hover:bg-[#ffce00] group-hover:text-[#16123f] transition duration-300">
                                <i class="fas fa-envelope text-xs"></i>
                            </span>
                            Kontak
                        </a>
                    </li>
                    <li>
                        <a href="#faq"
                            class="flex items-center hover:text-[#ffce00] transition duration-300 group">
                            <span
                                class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 group-hover:bg-[#ffce00] group-hover:text-[#16123f] transition duration-300">
                                <i class="fas fa-question text-xs"></i>
                            </span>
                            FAQ
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-[#232052] p-6 rounded-xl shadow-lg transform transition duration-500 hover:-translate-y-2">
                <h3
                    class="text-lg md:text-xl font-bold mb-4 text-[#ffce00] border-b-2 border-[#ff6b35] pb-2 inline-block">
                    Kontak</h3>
                <div class="space-y-3">
                    <p class="text-sm text-gray-200 flex items-start">
                        <span
                            class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 flex-shrink-0 mt-0.5">
                            <i class="fas fa-envelope text-xs"></i>
                        </span>
                        <span>Email: info@tokobatik.com</span>
                    </p>
                    <p class="text-sm text-gray-200 flex items-start">
                        <span
                            class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 flex-shrink-0 mt-0.5">
                            <i class="fas fa-phone text-xs"></i>
                        </span>
                        <span>Telepon: +62 123 456 7890</span>
                    </p>
                    <p class="text-sm text-gray-200 flex items-start">
                        <span
                            class="w-6 h-6 rounded-full bg-[#ff6b35] flex items-center justify-center mr-3 flex-shrink-0 mt-0.5">
                            <i class="fas fa-map-marker-alt text-xs"></i>
                        </span>
                        <span>Alamat: Jl. Batik No. 123, Yogyakarta, Indonesia</span>
                    </p>
                </div>
                <div class="mt-4">
                    <p class="text-sm text-gray-300">Jam Operasional:</p>
                    <p class="text-sm text-gray-200">Senin - Jumat: 09:00 - 17:00</p>
                    <p class="text-sm text-gray-200">Sabtu: 09:00 - 15:00</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8 text-sm text-gray-300 border-t border-[#232052] pt-6 relative z-10">
            <p class="flex flex-col md:flex-row items-center justify-center gap-2 md:gap-4">
                <span>© {{ date('Y') }} Toko Batik. All rights reserved.</span>
                <span class="hidden md:inline text-[#ff6b35]">|</span>
                <a href="#" class="hover:text-[#ffce00]">Kebijakan Privasi</a>
                <span class="hidden md:inline text-[#ff6b35]">|</span>
                <a href="#" class="hover:text-[#ffce00]">Syarat dan Ketentuan</a>
            </p>
            <p class="mt-2 text-xs text-gray-400">Dibuat dengan <i class="fas fa-heart text-[#ff6b35]"></i> di
                Indonesia</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fade in elements on scroll
            const elements = document.querySelectorAll('.fade-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(element => observer.observe(element));

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });

                        // Close mobile menu if open
                        const mobileMenu = document.querySelector('[x-data="{ open: true }"]');
                        if (mobileMenu) {
                            mobileMenu.__x.$data.open = false;
                        }
                    }
                });
            });

            // Add active class to current section in navbar
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            window.addEventListener('scroll', () => {
                let current = '';
                const scrollY = window.pageYOffset;

                sections.forEach(section => {
                    const sectionTop = section.offsetTop -
                        150; // Adjust offset for better visibility detection
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');

                    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                        current = sectionId;
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active'); // Gunakan class 'active' untuk warna
                    const href = link.getAttribute('href');
                    if (href === `#${current}` || (current === 'home' && href ===
                            '{{ route('home') }}')) {
                        link.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>

</html>
