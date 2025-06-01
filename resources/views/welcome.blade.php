{{-- @extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section (Parallax) -->
    <section id="home" class="py-20 md:py-36 parallax bg-cover bg-center relative"
        style="background-image: url('img/batikandrepati.jpg');">
        <div class="absolute inset-0 bg-[#16123f] bg-opacity-70"></div>
        <div class="max-w-7xl mx-auto text-center text-white relative z-10 fade-in px-4">
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold mb-6 text-shadow animate-float">
                <span class="text-white">Selamat Datang di</span><br>
                <span class="text-[#ffce00]">Toko Batik Online</span>
            </h1>
            <p class="text-lg md:text-xl lg:text-2xl max-w-3xl mx-auto mb-8 leading-relaxed">
                Eksplorasi keindahan batik Indonesia dengan sentuhan modern dan tradisional yang memukau, dibuat dengan
                keahlian tangan terbaik.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="#products" class="btn-primary flex items-center justify-center mx-auto md:mx-0">
                    <span>Lihat Koleksi</span>
                    <i class="fas fa-arrow-right ml-3 icon-hover"></i>
                </a>
                <a href="#about"
                    class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-full font-semibold hover:bg-white hover:text-[#16123f] transition duration-300 flex items-center justify-center mx-auto md:mx-0">
                    <span>Tentang Kami</span>
                    <i class="fas fa-info-circle ml-3 icon-hover"></i>
                </a>
            </div>
            <div class="scroll-indicator text-white">
                <i class="fas fa-chevron-down text-2xl text-[#ffce00]"></i>
            </div>
        </div>
        <div class="custom-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-32 h-32 bg-[#ffce00] rounded-full opacity-10 transform -translate-x-16 -translate-y-16">
        </div>
        <div
            class="absolute bottom-0 right-0 w-48 h-48 bg-[#ff6b35] rounded-full opacity-10 transform translate-x-24 translate-y-24">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 md:mb-8 custom-title">Tentang Kami</h2>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Kami adalah <span class="font-semibold text-[#3b21a0]">pelestari budaya Indonesia</span> yang
                        menghadirkan batik dengan desain elegan dan kualitas premium, menggabungkan warisan tradisional
                        dengan estetika masa kini.
                    </p>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Setiap motif batik kami dipilih dengan cermat dan diproduksi oleh pengrajin terampil yang telah
                        berpengalaman selama bertahun-tahun, memastikan setiap kain memiliki ketahanan dan keindahan yang
                        tak tertandingi.
                    </p>
                    <div class="flex flex-wrap gap-4 my-6">
                        <div class="bg-[#f8f9fa] p-4 rounded-lg shadow-md border-l-4 border-[#ff6b35] flex items-center">
                            <i class="fas fa-medal text-[#ff6b35] text-2xl mr-3"></i>
                            <div>
                                <h3 class="font-bold text-[#3b21a0]">Kualitas Premium</h3>
                                <p class="text-sm text-gray-600">100% bahan berkualitas terbaik</p>
                            </div>
                        </div>
                        <div class="bg-[#f8f9fa] p-4 rounded-lg shadow-md border-l-4 border-[#ff6b35] flex items-center">
                            <i class="fas fa-heart text-[#ff6b35] text-2xl mr-3"></i>
                            <div>
                                <h3 class="font-bold text-[#3b21a0]">Buatan Tangan</h3>
                                <p class="text-sm text-gray-600">Dibuat dengan teknik tradisional</p>
                            </div>
                        </div>
                    </div>
                    <a href="#products" class="btn-secondary inline-flex items-center">
                        <span>Jelajahi Produk Kami</span>
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                </div>
                <div class="order-1 md:order-2 relative">
                    <img src="img/batikcapung.jpg`" alt="Batik"
                        class="rounded-xl shadow-2xl image-glow mx-auto relative z-10">
                    <div
                        class="absolute -bottom-5 -right-5 w-32 h-32 bg-[#ff6b35] rounded-xl opacity-20 transform rotate-12 z-0">
                    </div>
                    <div
                        class="absolute -top-5 -left-5 w-24 h-24 bg-[#ffce00] rounded-xl opacity-20 transform -rotate-12 z-0">
                    </div>
                </div>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-4 gap-6">
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Tahun Pengalaman</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">15+</p>
                </div>
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Pengrajin Terampil</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">50+</p>
                </div>
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Produk Terjual</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">10K+</p>
                </div>
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Rating Pelanggan</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">4.9/5</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 md:py-24 pattern-background relative">
        <div class="max-w-7xl mx-auto fade-in px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 custom-title inline-block">Produk Kami</h2>
                <p class="text-base md:text-lg text-gray-700 max-w-3xl mx-auto">
                    Temukan koleksi batik eksklusif kami dengan beragam motif dan warna yang menakjubkan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                @foreach ($products as $product)
                    <div class="bg-white rounded-2xl shadow-lg relative overflow-hidden border border-gray-100"
                        x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                        @if ($loop->first)
                            <span class="featured-tag">Populer</span>
                        @endif
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-[#ffce00] rounded-full opacity-20 transform translate-x-12 -translate-y-12">
                        </div>
                        <div class="p-1">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-56 md:h-64 object-cover rounded-t-xl">
                            @else
                                <img src="https://images.unsplash.com/photo-1598965672098-90412bffd65c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                    alt="Placeholder" class="w-full h-56 md:h-64 object-cover rounded-t-xl">
                            @endif
                        </div>
                        <div class="p-5 relative">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold text-[#16123f]">{{ $product->name }}</h3>
                                <span class="bg-[#f8f9fa] py-1 px-3 rounded-full text-sm font-semibold text-[#3b21a0]">
                                    {{ $product->category ?? 'Batik' }}
                                </span>
                            </div>
                            <p class="text-gray-600 mt-2 text-sm md:text-base line-clamp-2">{{ $product->description }}</p>
                            <div class="mt-4 flex items-center">
                                <span class="text-[#ff6b35] font-bold text-xl md:text-2xl">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center mt-2">
                                <div class="flex text-[#ffce00]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= ($product->rating ?? 5))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-500 ml-2 text-sm">({{ $product->reviews ?? rand(10, 200) }})</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-2 mb-4">
                                <i class="fas fa-box mr-1"></i> Stok:
                                @if ($product->stock > 10)
                                    <span class="text-green-600 font-semibold">{{ $product->stock }} tersedia</span>
                                @elseif($product->stock > 0)
                                    <span class="text-orange-500 font-semibold">{{ $product->stock }} tersisa</span>
                                @else
                                    <span class="text-red-600 font-semibold">Habis</span>
                                @endif
                            </p>
                            <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                                <a href="{{ route('product.detail', $product->id) }}"
                                    class="text-[#3b21a0] font-semibold hover:text-[#ff6b35] transition duration-300 text-sm md:text-base flex items-center">
                                    <i class="fas fa-eye mr-1"></i> Detail
                                </a>
                                @if (auth()->check())
                                    @if ($product->stock > 0)
                                        <form action="{{ route('order.buy', $product->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit" class="btn-secondary">
                                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-red-600 font-semibold text-sm md:text-base">Stok Habis</span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="text-[#3b21a0] font-semibold hover:text-[#ff6b35] transition duration-300 text-sm md:text-base flex items-center">
                                        <i class="fas fa-sign-in-alt mr-1"></i> Login untuk Beli
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full opacity-20 transform translate-x-32 -translate-y-32">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-12 text-center custom-title">Testimoni Pelanggan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                @forelse ($testimonials as $testimonial)
                    <div
                        class="bg-white p-6 rounded-xl shadow-md relative border-t-4 border-blue-600 transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="absolute -top-6 left-6">
                            <div class="w-12 h-12 rounded-full bg-white p-1 shadow-md">
                                @if ($testimonial->photo)
                                    <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                        alt="{{ $testimonial->name }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div
                                        class="w-full h-full rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex text-yellow-400 mt-6 mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $testimonial->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="text-gray-700 italic mb-3">"{{ $testimonial->content }}"</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold text-blue-600">{{ $testimonial->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $testimonial->location ?? 'Tidak diketahui' }}</p>
                            </div>
                            <i class="fas fa-quote-right text-3xl text-blue-200"></i>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-gray-600">Belum ada testimoni saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 md:py-24 pattern-background relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-[#ffce00] rounded-full opacity-10 transform -translate-x-32 -translate-y-32">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-12 text-center custom-title">Pertanyaan Umum (FAQ)</h2>
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#3b21a0]">Bagaimana cara memesan produk?</h3>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-[#ff6b35]"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-700">
                        <p>Anda dapat memesan produk dengan login ke akun Anda, memilih produk di bagian "Produk Kami", lalu
                            klik tombol "Beli". Ikuti langkah-langkah checkout untuk menyelesaikan pesanan.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#3b21a0]">Berapa lama pengiriman?</h3>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-[#ff6b35]"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-700">
                        <p>Pengiriman biasanya memakan waktu 3-7 hari kerja tergantung lokasi Anda. Kami bekerja sama dengan
                            jasa pengiriman terpercaya untuk memastikan barang sampai tepat waktu.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#3b21a0]">Apakah bisa mengembalikan produk?</h3>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-[#ff6b35]"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-700">
                        <p>Ya, Anda dapat mengembalikan produk dalam waktu 7 hari setelah penerimaan jika ada cacat produksi
                            atau kesalahan pengiriman. Silakan hubungi kami untuk detail lebih lanjut.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div
            class="absolute bottom-0 right-0 w-64 h-64 bg-[#ff6b35] rounded-full opacity-10 transform translate-x-32 translate-y-32">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-12 text-center custom-title">Hubungi Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Kami siap membantu Anda dengan pertanyaan apa pun. Silakan hubungi kami melalui informasi di bawah
                        ini atau isi formulir kontak.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-[#ff6b35] text-2xl mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-[#3b21a0]">Email</h3>
                                <p class="text-gray-600">info@tokobatik.com</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-[#ff6b35] text-2xl mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-[#3b21a0]">Telepon</h3>
                                <p class="text-gray-600">+62 123 456 7890</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-[#ff6b35] text-2xl mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-[#3b21a0]">Alamat</h3>
                                <p class="text-gray-600">Jl. Batik No. 123, Yogyakarta, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="#" method="POST" class="bg-[#f8f9fa] p-6 rounded-xl shadow-md">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea name="message" id="message" rows="4"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full flex items-center justify-center">
                            <span>Kirim Pesan</span>
                            <i class="fas fa-paper-plane ml-3 icon-hover"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section (Parallax) -->
    <section id="home" class="py-20 md:py-36 parallax bg-cover bg-center relative"
        style="background-image: url('img/batikandrepati.jpg');">
        <div class="absolute inset-0 bg-[#16123f] bg-opacity-70"></div>
        <div class="max-w-7xl mx-auto text-center text-white relative z-10 fade-in px-4">
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold mb-6 text-shadow animate-float">
                <span class="text-white">Selamat Datang di</span><br>
                <span class="text-[#ffce00]">Toko Batik Online</span>
            </h1>
            <p class="text-lg md:text-xl lg:text-2xl max-w-3xl mx-auto mb-8 leading-relaxed">
                Eksplorasi keindahan batik Indonesia dengan sentuhan modern dan tradisional yang memukau, dibuat dengan
                keahlian tangan terbaik.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="#products" class="btn-primary flex items-center justify-center mx-auto md:mx-0">
                    <span>Lihat Koleksi</span>
                    <i class="fas fa-arrow-right ml-3 icon-hover"></i>
                </a>
                <a href="#about"
                    class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-full font-semibold hover:bg-white hover:text-[#16123f] transition duration-300 flex items-center justify-center mx-auto md:mx-0">
                    <span>Tentang Kami</span>
                    <i class="fas fa-info-circle ml-3 icon-hover"></i>
                </a>
            </div>
            <div class="scroll-indicator text-white">
                <i class="fas fa-chevron-down text-2xl text-[#ffce00]"></i>
            </div>
        </div>
        <div class="custom-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-32 h-32 bg-[#ffce00] rounded-full opacity-10 transform -translate-x-16 -translate-y-16">
        </div>
        <div
            class="absolute bottom-0 right-0 w-48 h-48 bg-[#ff6b35] rounded-full opacity-10 transform translate-x-24 translate-y-24">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 md:mb-8 custom-title">Tentang Kami</h2>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Kami adalah <span class="font-semibold text-[#3b21a0]">pelestari budaya Indonesia</span> yang
                        menghadirkan batik dengan desain elegan dan kualitas premium, menggabungkan warisan tradisional
                        dengan estetika masa kini.
                    </p>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Setiap motif batik kami dipilih dengan cermat dan diproduksi oleh pengrajin terampil yang telah
                        berpengalaman selama bertahun-tahun, memastikan setiap kain memiliki ketahanan dan keindahan yang
                        tak tertandingi.
                    </p>
                    <div class="flex flex-wrap gap-4 my-6">
                        <div class="bg-[#f8f9fa] p-4 rounded-lg shadow-md border-l-4 border-[#ff6b35] flex items-center">
                            <i class="fas fa-medal text-[#ff6b35] text-2xl mr-3"></i>
                            <div>
                                <h3 class="font-bold text-[#3b21a0]">Kualitas Premium</h3>
                                <p class="text-sm text-gray-600">100% bahan berkualitas terbaik</p>
                            </div>
                        </div>
                        <div class="bg-[#f8f9fa] p-4 rounded-lg shadow-md border-l-4 border-[#ff6b35] flex items-center">
                            <i class="fas fa-heart text-[#ff6b35] text-2xl mr-3"></i>
                            <div>
                                <h3 class="font-bold text-[#3b21a0]">Buatan Tangan</h3>
                                <p class="text-sm text-gray-600">Dibuat dengan teknik tradisional</p>
                            </div>
                        </div>
                    </div>
                    <a href="#products" class="btn-secondary inline-flex items-center">
                        <span>Jelajahi Produk Kami</span>
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                </div>
                <div class="order-1 md:order-2 relative">
                    <img src="img/batikcapung.jpg" alt="Batik"
                        class="rounded-xl shadow-2xl image-glow mx-auto relative z-10">
                    <div
                        class="absolute -bottom-5 -right-5 w-32 h-32 bg-[#ff6b35] rounded-xl opacity-20 transform rotate-12 z-0">
                    </div>
                    <div
                        class="absolute -top-5 -left-5 w-24 h-24 bg-[#ffce00] rounded-xl opacity-20 transform -rotate-12 z-0">
                    </div>
                </div>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-4 gap-6">
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Tahun Pengalaman</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">15+</p>
                </div>
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Pengrajin Terampil</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">50+</p>
                </div>
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Produk Terjual</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">10K+</p>
                </div>
                <div
                    class="bg-[#f8f9fa] p-5 rounded-xl shadow-md text-center transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 border-t-4 border-[#3b21a0]">
                    <div
                        class="w-16 h-16 bg-[#16123f] rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#3b21a0] mb-2">Rating Pelanggan</h3>
                    <p class="text-3xl font-bold text-[#ff6b35]">4.9/5</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 md:py-24 pattern-background relative">
        <div class="max-w-7xl mx-auto fade-in px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 custom-title inline-block">Produk Kami</h2>
                <p class="text-base md:text-lg text-gray-700 max-w-3xl mx-auto">
                    Temukan koleksi batik eksklusif kami dengan beragam motif dan warna yang menakjubkan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                @foreach ($products as $product)
                    <div class="bg-white rounded-2xl shadow-lg relative overflow-hidden border border-gray-100"
                        x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                        @if ($loop->first)
                            <span class="featured-tag">Populer</span>
                        @endif
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-[#ffce00] rounded-full opacity-20 transform translate-x-12 -translate-y-12">
                        </div>
                        <div class="p-1">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-56 md:h-64 object-cover rounded-t-xl">
                            @else
                                <img src="https://images.unsplash.com/photo-1598965672098-90412bffd65c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                    alt="Placeholder" class="w-full h-56 md:h-64 object-cover rounded-t-xl">
                            @endif
                        </div>
                        <div class="p-5 relative">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-semibold text-[#16123f]">{{ $product->name }}</h3>
                                <span class="bg-[#f8f9fa] py-1 px-3 rounded-full text-sm font-semibold text-[#3b21a0]">
                                    {{ $product->category ?? 'Batik' }}
                                </span>
                            </div>
                            <p class="text-gray-600 mt-2 text-sm md:text-base line-clamp-2">{{ $product->description }}</p>
                            <div class="mt-4 flex items-center">
                                <span class="text-[#ff6b35] font-bold text-xl md:text-2xl">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center mt-2">
                                <div class="flex text-[#ffce00]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= ($product->rating ?? 5))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-500 ml-2 text-sm">({{ $product->reviews ?? rand(10, 200) }})</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-2 mb-4">
                                <i class="fas fa-box mr-1"></i> Stok:
                                @if ($product->stock > 10)
                                    <span class="text-green-600 font-semibold">{{ $product->stock }} tersedia</span>
                                @elseif($product->stock > 0)
                                    <span class="text-orange-500 font-semibold">{{ $product->stock }} tersisa</span>
                                @else
                                    <span class="text-red-600 font-semibold">Habis</span>
                                @endif
                            </p>
                            <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                                <a href="{{ route('product.detail', $product->id) }}"
                                    class="text-[#3b21a0] font-semibold hover:text-[#ff6b35] transition duration-300 text-sm md:text-base flex items-center">
                                    <i class="fas fa-eye mr-1"></i> Detail
                                </a>
                                @if (auth()->check())
                                    @if ($product->stock > 0)
                                        <form action="{{ route('order.buy', $product->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit" class="btn-secondary">
                                                <i class="fas fa-shopping-cart mr-2"></i>Beli
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-red-600 font-semibold text-sm md:text-base">Stok Habis</span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="text-[#3b21a0] font-semibold hover:text-[#ff6b35] transition duration-300 text-sm md:text-base flex items-center">
                                        <i class="fas fa-sign-in-alt mr-1"></i> Login untuk Beli
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full opacity-20 transform translate-x-32 -translate-y-32">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-12 text-center custom-title">Testimoni Pelanggan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                @forelse ($testimonials as $testimonial)
                    <div
                        class="bg-white p-6 rounded-xl shadow-md relative border-t-4 border-blue-600 transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="absolute -top-6 left-6">
                            <div class="w-12 h-12 rounded-full bg-white p-1 shadow-md">
                                @if ($testimonial->photo)
                                    <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                        alt="{{ $testimonial->name }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div
                                        class="w-full h-full rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex text-yellow-400 mt-6 mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $testimonial->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="text-gray-700 italic mb-3">"{{ $testimonial->content }}"</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold text-blue-600">{{ $testimonial->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $testimonial->location ?? 'Tidak diketahui' }}</p>
                            </div>
                            <i class="fas fa-quote-right text-3xl text-blue-200"></i>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 bg-white p-6 rounded-xl shadow-md text-center">
                        <p class="text-gray-600">Belum ada testimoni saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 md:py-24 pattern-background relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-[#ffce00] rounded-full opacity-10 transform -translate-x-32 -translate-y-32">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-12 text-center custom-title">Pertanyaan Umum (FAQ)</h2>
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#3b21a0]">Bagaimana cara memesan produk?</h3>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-[#ff6b35]"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-700">
                        <p>Anda dapat memesan produk dengan login ke akun Anda, memilih produk di bagian "Produk Kami", lalu
                            klik tombol "Beli". Ikuti langkah-langkah checkout untuk menyelesaikan pesanan.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#3b21a0]">Berapa lama pengiriman?</h3>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-[#ff6b35]"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-700">
                        <p>Pengiriman biasanya memakan waktu 3-7 hari kerja tergantung lokasi Anda. Kami bekerja sama dengan
                            jasa pengiriman terpercaya untuk memastikan barang sampai tepat waktu.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-[#3b21a0]">Apakah bisa mengembalikan produk?</h3>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-[#ff6b35]"></i>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-700">
                        <p>Ya, Anda dapat mengembalikan produk dalam waktu 7 hari setelah penerimaan jika ada cacat produksi
                            atau kesalahan pengiriman. Silakan hubungi kami untuk detail lebih lanjut.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-24 bg-white relative overflow-hidden">
        <div
            class="absolute bottom-0 right-0 w-64 h-64 bg-[#ff6b35] rounded-full opacity-10 transform translate-x-32 translate-y-32">
        </div>
        <div class="max-w-7xl mx-auto fade-in px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 md:mb-12 text-center custom-title">Hubungi Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Kami siap membantu Anda dengan pertanyaan apa pun. Silakan hubungi kami melalui informasi di bawah
                        ini atau isi formulir kontak. Anda juga dapat meninggalkan testimoni untuk berbagi pengalaman Anda!
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-[#ff6b35] text-2xl mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-[#3b21a0]">Email</h3>
                                <p class="text-gray-600">info@tokobatik.com</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-[#ff6b35] text-2xl mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-[#3b21a0]">Telepon</h3>
                                <p class="text-gray-600">+62 123 456 7890</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-[#ff6b35] text-2xl mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-[#3b21a0]">Alamat</h3>
                                <p class="text-gray-600">Jl. Batik No. 123, Yogyakarta, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data"
                        class="bg-[#f8f9fa] p-6 rounded-xl shadow-md">
                        @csrf
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label for="is_testimonial" class="block text-sm font-medium text-gray-700">
                                <input type="checkbox" name="is_testimonial" id="is_testimonial" value="1"
                                    onchange="toggleTestimonialFields(this)">
                                This is a testimonial
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                required>
                        </div>
                        <div class="mb-4" id="location_field" style="display: none;">
                            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi (Opsional)</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan atau Testimoni</label>
                            <textarea name="content" id="message" rows="4"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                required>{{ old('content') }}</textarea>
                        </div>
                        <div class="mb-4" id="rating_field" style="display: none;">
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <select name="rating" id="rating"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]">
                                <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                                <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                                <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                                <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                                <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                            </select>
                        </div>
                        <div class="mb-4" id="photo_field" style="display: none;">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Foto (Opsional)</label>
                            <input type="file" name="photo" id="photo"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-[#ff6b35] focus:border-[#ff6b35]"
                                accept="image/*">
                        </div>
                        <button type="submit" class="btn-primary w-full flex items-center justify-center">
                            <span>Kirim</span>
                            <i class="fas fa-paper-plane ml-3 icon-hover"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for toggling testimonial fields -->
    <script>
        function toggleTestimonialFields(checkbox) {
            const ratingField = document.getElementById('rating_field');
            const photoField = document.getElementById('photo_field');
            const locationField = document.getElementById('location_field');
            if (checkbox.checked) {
                ratingField.style.display = 'block';
                photoField.style.display = 'block';
                locationField.style.display = 'block';
            } else {
                ratingField.style.display = 'none';
                photoField.style.display = 'none';
                locationField.style.display = 'none';
            }
        }
    </script>
@endsection 
