@extends('layouts.apps')

@section('title', 'Selamat Datang di EcoBank')

@section('content')

{{-- Navbar Full-width --}}
<nav class="bg-white/80 backdrop-blur-md shadow-md sticky top-0 z-50 w-full">
    <div class="max-w-screen-xl mx-auto px-6 py-4 flex items-center justify-between">
        {{-- Logo --}}
        <a href="#home" class="text-green-700 font-bold text-2xl">EcoBank ♻️</a>

        {{-- Menu Desktop --}}
        <ul class="hidden md:flex space-x-12 text-gray-700 font-medium text-lg">
            <li><a href="#home" class="hover:text-green-700 transition">Home</a></li>
            <li><a href="#about" class="hover:text-green-700 transition">About</a></li>
            <li><a href="#artikel" class="hover:text-green-700 transition">Artikel</a></li>
            <li><a href="#galeri" class="hover:text-green-700 transition">Galeri</a></li>
            <li><a href="#contact" class="hover:text-green-700 transition">Contact</a></li>
        </ul>

        {{-- Tombol Login --}}
        <a href="{{ route('login') }}" 
           class="hidden md:inline-block bg-green-700 text-white px-5 py-2 rounded-lg hover:bg-green-800 transition">
           Login
        </a>

        {{-- Hamburger Mobile --}}
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-green-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Menu Mobile --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md w-full">
        <ul class="flex flex-col space-y-4 p-6 text-gray-700 font-medium text-lg">
            <li><a href="#home" class="hover:text-green-700 transition">Home</a></li>
            <li><a href="#about" class="hover:text-green-700 transition">About</a></li>
            <li><a href="#artikel" class="hover:text-green-700 transition">Artikel</a></li>
            <li><a href="#galeri" class="hover:text-green-700 transition">Galeri</a></li>
            <li><a href="#contact" class="hover:text-green-700 transition">Contact</a></li>
            <li><a href="{{ route('login') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition text-center block">Login</a></li>
        </ul>
    </div>
</nav>

<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>


{{-- Home Section --}}
<section id="home" class="relative text-center py-24 bg-green-50">
    <h1 class="text-5xl md:text-6xl font-bold text-green-700 mb-6">Selamat Datang di EcoBank ♻️</h1>
    <p class="text-gray-700 max-w-3xl mx-auto text-lg md:text-xl">
        EkoBank Hadir Untuk  membantu kamu memahami cara menjaga kebersihan lingkungan
        dan mengelola sampah secara bijak, dan bisa menabung sampah lohh.
    </p>
    <a href="{{ route('login') }}" 
       class="mt-8 inline-block bg-green-700 text-white px-6 py-3 rounded-xl text-lg hover:bg-green-800 transition">
       Login
    </a>
</section>

{{-- About Section --}}
<section id="about" class="py-24 px-4 bg-white">
    <div class="container mx-auto max-w-4xl text-center">
        <h2 class="text-4xl font-bold text-green-700 mb-6">Tentang EcoBank</h2>
        <p class="text-gray-700 text-lg">
            EcoBank hadir untuk memberikan informasi dan edukasi seputar pengelolaan sampah,
            daur ulang, dan menjaga lingkungan. Di sini, kamu bisa membaca artikel edukasi,
            melihat galeri kegiatan, dan mempelajari tips bijak dalam mengelola sampah agar bumi tetap bersih.
        </p>
    </div>
</section>

{{-- Artikel Section --}}
<section id="artikel" class="py-24 bg-green-50">
    <h2 class="text-4xl font-bold mb-12 text-green-700 text-center">Artikel Edukasi</h2>
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-10">
        @foreach ($artikels as $artikel)
            <a href="{{ $artikel->link_artikel ?? '#' }}" class="group">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl"
                     data-aos="fade-up" data-aos-duration="800">
                    <div class="overflow-hidden h-48">
                        @if($artikel->gambar)
                            <img src="data:image/jpeg;base64,{{ base64_encode($artikel->gambar) }}" 
                                 class="w-full h-full object-cover" 
                                 alt="{{ $artikel->judul }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" 
                                 class="w-full h-full object-cover" 
                                 alt="Default Image">
                        @endif
                    </div>
                    <div class="p-6 flex flex-col h-full">
                        <h3 class="font-bold text-green-700 text-xl mb-2">{{ $artikel->judul }}</h3>
                        <p class="text-gray-600 flex-1">{{ Str::limit($artikel->deskripsi, 120) }}</p>
                        <span class="mt-4 inline-block text-green-600 font-medium relative group-hover:underline">
                            Baca Selengkapnya →
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>

{{-- Galeri Section --}}
<section id="galeri" class="py-24 bg-white">
    <h2 class="text-4xl font-bold mb-12 text-green-700 text-center">Galeri Kegiatan</h2>
    <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-3 gap-6">
        @foreach (['galeri1.jpg','galeri2.jpg','galeri3.jpg'] as $galeri)
            <img src="{{ asset('images/'.$galeri) }}" 
                 class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition duration-500"
                 data-aos="zoom-in">
        @endforeach
    </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-24 bg-green-50">
    <div class="container mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-bold text-green-700 mb-6">Contact Us</h2>
        <p class="text-gray-700 mb-6">
            Punya pertanyaan atau ingin berkolaborasi? Hubungi kami melalui email atau WhatsApp.
        </p>
        <div class="flex justify-center space-x-6">
            <a href="mailto:info@ecobank.com" class="text-green-700 font-medium hover:underline">info@ecobank.com</a>
            <a href="https://wa.me/6281234567890" target="_blank" class="text-green-700 font-medium hover:underline">WhatsApp</a>
        </div>
    </div>
</section>

{{-- AOS Animations --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ once: true });
</script>

@endsection
