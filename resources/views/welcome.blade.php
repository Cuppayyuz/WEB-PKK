[<!doctype html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Aubira Purplora</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-[#540863] overflow-x-hidden">
        <main class="relative w-full min-h-screen flex flex-col justify-center overflow-hidden">
            <header id="navbar" class="fixed left-0 right-0 top-0 z-50 py-2 transition-all duration-300">
                <div class="container mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between lg:justify-normal">
                    <div class="flex items-center gap-x-3">
                        <div class="w-12 h-12 bg-[#F0BCD3] flex justify-center items-center lg:ml-13 rounded-xl">
                            <img src="aubiira_purplora.png" alt="logo" class="h-5 md:h-7 lg:h-8 w-auto" onerror="this.style.display='none'" />
                        </div>
                        <h1 class="text-[#FFD3D5] font-semibold">Aubira Purplora</h1>
                    </div>

                    <nav class="hidden lg:flex lg:justify-between py-1 ml-auto mr-10">
                        <a href="#home" class="rounded-full py-2 px-6 font-semibold text-[#FFD3D5] hover:bg-white/10 transition">HOME</a>
                        <a href="#ceritakita" class="rounded-full py-2 px-6 font-semibold text-[#FFD3D5] hover:bg-white/10 transition">ABOUT US</a>
                        <a href="#menukami" class="rounded-full py-2 px-6 font-semibold text-[#FFD3D5] hover:bg-white/10 transition">PRODUCT</a>
                        <a href="#contact" class="rounded-full py-2 px-6 font-semibold text-[#FFD3D5] hover:bg-white/10 transition">CONTACT</a>
                    </nav>

                    <button onclick="toggleCart()" class="relative text-[#FFD3D5] hover:text-white transition p-2 mr-2 lg:mr-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span id="cart-badge" class="absolute top-0 right-0 bg-red-500 text-white text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full hidden">0</span>
                    </button>

                    <div class="lg:hidden flex items-center">
                        <button id="hamburger-button" class="relative z-[60] w-8 h-6 flex flex-col justify-between items-center focus:outline-none p-1 md:w-10 md:h-8">
                            <span class="block w-full h-0.75 bg-white"></span>
                            <span class="block w-full h-0.75 bg-white"></span>
                            <span class="block w-full h-0.75 bg-white"></span>
                        </button>
                    </div>
                </div>
            </header>

            <img src="image 18.jpg" alt="img-hero" class="absolute inset-0 w-full h-full object-cover opacity-30 z-0 scale-x-105" />

            <div id="home" class="relative z-10 px-8 md:px-16 lg:px-24 mt-20 lg:mt-0">
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm rounded-full px-4 py-1 mb-6">
                    <span class="text-yellow-300">✨</span>
                    <span class="text-white text-sm font-medium">dibuat dengan cinta</span>
                </div>

                <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight mb-6">
                    The Purple Revolution:<br />
                    Ubi Ungu Level Up,<br />
                    Asli Lokal!
                </h1>

                <p class="text-white/90 max-w-lg mb-8">
                    Bosen sama camilan yang itu-itu aja? Kenalan sama koleksi Purple Treats kita. Dari renyahnya Lumpia Ubi, lumeran Ubi Roll, lembutnya Dessert Box, sampai segarnya Es Taro. Semuanya dibuat dari ubi ungu asli, tanpa pengawet, dan pastinya aesthetic banget buat masuk story kamu!
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#menukami" class="w-full sm:w-50 h-12 bg-white items-center flex justify-center rounded-3xl text-[#361966] font-bold lg:text-lg transition hover:bg-gray-200">
                        Kunjungi Menu &rarr;
                    </a>
                    <a href="#ceritakita" class="w-full sm:w-40 h-12 bg-transparent border-2 border-white flex justify-center rounded-3xl items-center font-bold text-white transition hover:bg-white/10">
                        Cerita Kita
                    </a>
                </div>
            </div>
        </main>

        <div class="bg-[linear-gradient(105deg,_#D968FF_0%,_#76177E_50%,_#982598_100%)] w-full py-6 flex flex-wrap justify-center lg:justify-between items-center px-8 lg:px-25 gap-6">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-white/20 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <p class="text-white font-semibold text-sm">Kualitas Premium<br><span class="text-xs font-normal opacity-80">100% ubi ungu asli</span></p>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-white/20 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <p class="text-white font-semibold text-sm">Kualitas Premium<br><span class="text-xs font-normal opacity-80">100% ubi ungu asli</span></p>
            </div>
            <div class="hidden md:flex items-center gap-3">
                <div class="w-8 h-8 bg-white/20 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <p class="text-white font-semibold text-sm">Kualitas Premium<br><span class="text-xs font-normal opacity-80">100% ubi ungu asli</span></p>
            </div>
            <div class="hidden lg:flex items-center gap-3">
                <div class="w-8 h-8 bg-white/20 rounded-md flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                </div>
                <p class="text-white font-semibold text-sm">Kualitas Premium<br><span class="text-xs font-normal opacity-80">100% ubi ungu asli</span></p>
            </div>
        </div>

        <section class="items-center text-center px-4" id="menukami">
            <h1 class="mt-16 font-bold text-[#D8B4FE] tracking-widest uppercase text-sm bg-white/10 inline-block px-4 py-1 rounded-full">Menu Kami</h1>
            <h2 class="font-bold text-3xl md:text-4xl lg:text-5xl text-white mt-6">
                Kreasi Artistik Ubi Ungu Premium
            </h2>
            <p class="text-white/80 mt-5 text-lg max-w-2xl mx-auto">
                Setiap sajian dibuat dengan tangan menggunakan ubi ungu pilihan, memadukan resep tradisional dengan sentuhan teknik modern untuk rasa yang tak terlupakan.
            </p>
            
            <div class="flex flex-wrap justify-center text-center gap-4 mt-12">
                <button class="px-6 py-2 bg-[#D8B4FE] text-[#7A379B] font-bold rounded-full transition">Semua Produk</button>
                <button class="px-6 py-2 bg-white/20 text-white hover:bg-white hover:text-[#7A379B] font-bold rounded-full transition">Goreng</button>
                <button class="px-6 py-2 bg-white/20 text-white hover:bg-white hover:text-[#7A379B] font-bold rounded-full transition">Desert</button>
                <button class="px-6 py-2 bg-white/20 text-white hover:bg-white hover:text-[#7A379B] font-bold rounded-full transition">Minuman</button>
            </div>

            <div class="max-w-7xl mx-auto mt-16 pb-20 text-left">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-[#E9DFFF] rounded-3xl p-5 shadow-xl flex flex-col transform hover:scale-105 transition-transform duration-300">
                        <div class="relative rounded-2xl overflow-hidden mb-4 aspect-square">
                            <img src="https://placehold.co/400x400/4a0e4e/ffffff?text=Ubi+Roll" alt="Roll Ubi Klasik" class="w-full h-full object-cover rounded-2xl" />
                            <span class="absolute top-3 left-3 bg-[#D8B4FE] text-[#7A379B] text-xs font-semibold px-3 py-1 rounded-full">New</span>
                        </div>
                        <div class="flex-grow">
                            <p class="text-[#7A379B] font-medium text-xs">Lumpia</p>
                            <h2 class="text-[#7A379B] text-xl font-bold mt-1">Roll Ubi Klasik</h2>
                            <p class="text-[#6B7280] text-sm mt-2 leading-relaxed line-clamp-2">Lumpia renyah dengan isian ubi manis original.</p>
                        </div>
                        <hr class="border-t-2 border-[#D8B4FE] my-4" />
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-[#7A379B] text-xl font-bold">Rp 2.000</p>
                            <button onclick="openModal('Roll Ubi Klasik', 'Rp 2.000', 'https://placehold.co/400x400/4a0e4e/ffffff?text=Ubi+Roll', 2000)" class="text-[#7A379B] font-medium text-sm flex items-center hover:opacity-80 transition-opacity">
                                Add to Card
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-5 ml-1"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                            </button>
                        </div>
                    </div>

                    <div class="bg-[#E9DFFF] rounded-3xl p-5 shadow-xl flex flex-col transform hover:scale-105 transition-transform duration-300">
                        <div class="relative rounded-2xl overflow-hidden mb-4 aspect-square">
                            <img src="https://placehold.co/400x400/5e1762/ffffff?text=Ubi+Premium" alt="Roll Ubi Premium" class="w-full h-full object-cover rounded-2xl" />
                            <span class="absolute top-3 left-3 bg-[#D8B4FE] text-[#7A379B] text-xs font-semibold px-3 py-1 rounded-full">Rare</span>
                        </div>
                        <div class="flex-grow">
                            <p class="text-[#7A379B] font-medium text-xs">Lumpia</p>
                            <h2 class="text-[#7A379B] text-xl font-bold mt-1">Roll Ubi Premium</h2>
                            <p class="text-[#6B7280] text-sm mt-2 leading-relaxed line-clamp-2">Ubi jalar ungu premium pilihan dengan sentuhan madu.</p>
                        </div>
                        <hr class="border-t-2 border-[#D8B4FE] my-4" />
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-[#7A379B] text-xl font-bold">Rp 3.000</p>
                            <button onclick="openModal('Roll Ubi Premium', 'Rp 3.000', 'https://placehold.co/400x400/5e1762/ffffff?text=Ubi+Premium', 3000)" class="text-[#7A379B] font-medium text-sm flex items-center hover:opacity-80 transition-opacity">
                                Add to Card
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-5 ml-1"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                            </button>
                        </div>
                    </div>

                    <div class="bg-[#E9DFFF] rounded-3xl p-5 shadow-xl flex flex-col transform hover:scale-105 transition-transform duration-300">
                        <div class="relative rounded-2xl overflow-hidden mb-4 aspect-square">
                            <img src="https://placehold.co/400x400/7a379b/ffffff?text=Special+Bliss" alt="Special Ubi Bliss" class="w-full h-full object-cover rounded-2xl" />
                            <span class="absolute top-3 left-3 bg-[#D8B4FE] text-[#7A379B] text-xs font-semibold px-3 py-1 rounded-full">Special</span>
                        </div>
                        <div class="flex-grow">
                            <p class="text-[#7A379B] font-medium text-xs">Lumpia</p>
                            <h2 class="text-[#7A379B] text-xl font-bold mt-1">Special Ubi Bliss</h2>
                            <p class="text-[#6B7280] text-sm mt-2 leading-relaxed line-clamp-2">Perpaduan ubi ungu dan keju mozzarella lumer.</p>
                        </div>
                        <hr class="border-t-2 border-[#D8B4FE] my-4" />
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-[#7A379B] text-xl font-bold">Rp 4.000</p>
                            <button onclick="openModal('Special Ubi Bliss', 'Rp 4.000', 'https://placehold.co/400x400/7a379b/ffffff?text=Special+Bliss', 4000)" class="text-[#7A379B] font-medium text-sm flex items-center hover:opacity-80 transition-opacity">
                                Add to Card
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-5 ml-1"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                            </button>
                        </div>
                    </div>

                    <div class="bg-[#E9DFFF] rounded-3xl p-5 shadow-xl flex flex-col transform hover:scale-105 transition-transform duration-300">
                        <div class="relative rounded-2xl overflow-hidden mb-4 aspect-square">
                            <img src="https://placehold.co/400x400/2a0640/ffffff?text=Ubi+Manis" alt="Roll Lumpia Manis" class="w-full h-full object-cover rounded-2xl" />
                            <span class="absolute top-3 left-3 bg-[#D8B4FE] text-[#7A379B] text-xs font-semibold px-3 py-1 rounded-full">New</span>
                        </div>
                        <div class="flex-grow">
                            <p class="text-[#7A379B] font-medium text-xs">Lumpia</p>
                            <h2 class="text-[#7A379B] text-xl font-bold mt-1">Roll Lumpia Manis</h2>
                            <p class="text-[#6B7280] text-sm mt-2 leading-relaxed line-clamp-2">Lumpia renyah dengan isian ubi jalar manis yang autentik.</p>
                        </div>
                        <hr class="border-t-2 border-[#D8B4FE] my-4" />
                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-[#7A379B] text-xl font-bold">Rp 2.500</p>
                            <button onclick="openModal('Roll Lumpia Manis', 'Rp 2.500', 'https://placehold.co/400x400/2a0640/ffffff?text=Ubi+Manis', 2500)" class="text-[#7A379B] font-medium text-sm flex items-center hover:opacity-80 transition-opacity">
                                Add to Card
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-5 ml-1"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 overflow-hidden bg-black/10" id="ceritakita">
            <h1 class="text-center text-[#D8B4FE] text-sm font-semibold tracking-widest uppercase mb-16 bg-white/5 inline-block px-6 py-2 rounded-full mx-auto flex w-max">
                Cerita Kami
            </h1>

            <div class="flex flex-col lg:flex-row items-center justify-center gap-16 lg:gap-24 px-6 lg:px-20">
                <div class="relative inline-block shrink-0 mt-4 md:mt-0">
                    <img src="https://placehold.co/400x400/540863/ffffff?text=Cerita+Kami" alt="Cerita Kami" class="w-[320px] h-[320px] md:w-[400px] md:h-[400px] object-cover rounded-[40px] shadow-2xl" />

                    <div class="absolute -bottom-6 -right-4 md:-right-12 flex items-center gap-4 p-3 pr-8 rounded-3xl shadow-xl bg-gradient-to-r from-[#F0BDE0] to-[#99239D]">
                        <div class="w-12 h-12 bg-white/40 rounded-2xl flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="#7A379B" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-bold text-gray-900 leading-tight">Made with my bini</span>
                            <span class="text-xs text-gray-900 font-medium mt-0.5">since 2024</span>
                        </div>
                    </div>
                </div>

                <div class="max-w-xl">
                    <h2 class="font-bold text-4xl md:text-5xl text-white mb-6 leading-tight">
                        Lorem ipsum dolor sit amet
                    </h2>

                    <div class="space-y-4 mb-10">
                        <p class="text-[#E9DFFF] text-lg opacity-90 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="text-[#E9DFFF] text-lg opacity-90 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#F0BCD3] rounded-2xl flex items-center justify-center text-[#7A379B]">✓</div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Keunggulan 1</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Detail singkat</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#F0BCD3] rounded-2xl flex items-center justify-center text-[#7A379B]">✓</div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Keunggulan 2</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Detail singkat</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#F0BCD3] rounded-2xl flex items-center justify-center text-[#7A379B]">✓</div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Keunggulan 3</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Detail singkat</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#F0BCD3] rounded-2xl flex items-center justify-center text-[#7A379B]">✓</div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Keunggulan 4</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Detail singkat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="text-white py-16 px-6 md:px-12 lg:px-24">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
                
                <div class="flex-1 w-full">
                    <span class="inline-block bg-[#DCAEC0] text-[#75267D] font-bold px-6 py-2 rounded-full mb-6">Cerita Kami</span>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Lorem ipsum dolor</h1>
                    <p class="text-[#E9DFFF] mb-12 leading-relaxed opacity-90 max-w-lg">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#A374A6] rounded-xl flex items-center justify-center shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="#280C34" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Alamat</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Jl. Smea no 4 , Kecamatan Wonokromo,<br />Kota Surabaya</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#A374A6] rounded-xl flex items-center justify-center shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="#280C34" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Alamat</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Jl. Smea no 4 , Kecamatan Wonokromo,<br />Kota Surabaya</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-[#A374A6] rounded-xl flex items-center justify-center shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="#280C34" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Alamat</h3>
                                <p class="text-[#E9DFFF] text-sm opacity-80">Jl. Smea no 4 , Kecamatan Wonokromo,<br />Kota Surabaya</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full max-w-lg">
                    <div class="bg-white rounded-[40px] p-8 md:p-10 shadow-2xl">
                        <h2 class="text-[#8E2598] text-3xl font-bold mb-8">Beri kami masukan</h2>
                        <form action="#" method="POST" class="space-y-4">
                            <input type="text" placeholder="nama" class="w-full bg-[#E4C7E0] text-[#701E78] placeholder-[#945A96] rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#8E248C] transition" />
                            <input type="email" placeholder="email" class="w-full bg-[#E4C7E0] text-[#701E78] placeholder-[#945A96] rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#8E248C] transition" />
                            <textarea placeholder="pesan" rows="4" class="w-full bg-[#E4C7E0] text-[#701E78] placeholder-[#945A96] rounded-xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#8E248C] transition resize-none"></textarea>
                            <button type="button" class="w-full bg-[#8E248C] hover:bg-[#701a6f] text-white font-bold rounded-xl px-5 py-4 mt-4 transition duration-300">Kirim</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <footer class="bg-[#151B26] text-white py-12 px-6 md:px-12 lg:px-24 border-t border-gray-800">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-[#E5C3C6] rounded-full flex items-center justify-center shrink-0">
                            <span class="text-[#8E248C] font-bold text-lg font-serif">A</span>
                        </div>
                        <h2 class="text-xl font-serif tracking-wide">Aubira Purplora</h2>
                    </div>
                    <p class="text-gray-400 text-xs leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-sm mb-4">Quick links</h3>
                    <ul class="space-y-2 text-gray-400 text-xs">
                        <li><a href="#" class="hover:text-white transition">Shop</a></li>
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Menu</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-sm mb-4">Customer Service</h3>
                    <ul class="space-y-2 text-gray-400 text-xs">
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Shipping</a></li>
                        <li><a href="#" class="hover:text-white transition">Returns</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-sm mb-4">Contact Us</h3>
                    <ul class="space-y-3 text-gray-400 text-xs">
                        <li class="flex items-center gap-2"><span class="text-red-500">📍</span> Surabaya, Indonesia</li>
                        <li class="flex items-center gap-2"><span>📞</span> +62 812-3456-7890</li>
                        <li class="flex items-center gap-2"><span>✉️</span> hello@aubira.com</li>
                    </ul>
                </div>
            </div>
            <div class="max-w-7xl mx-auto border-t border-gray-800 mt-12 pt-6 text-center text-gray-500 text-[10px]">
                &copy; 2026 aubira purplora
            </div>
        </footer>

        <div id="product-modal" class="fixed inset-0 z-[100] hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 transition-opacity">
            <div class="bg-[#E9DFFF] rounded-[2rem] p-6 w-full max-w-md relative flex flex-col sm:flex-row gap-6 shadow-2xl scale-95 transition-transform" id="modal-content">
                <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </button>

                <div class="w-full sm:w-1/2 aspect-square relative rounded-2xl overflow-hidden shrink-0">
                    <img id="modal-img" src="" alt="Product" class="w-full h-full object-cover" />
                    <span class="absolute top-2 left-2 bg-[#D8B4FE] text-[#7A379B] text-[10px] font-bold px-2 py-0.5 rounded-full">New</span>
                </div>

                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <p class="text-[#7A379B] font-bold text-sm bg-white/50 w-max px-2 py-0.5 rounded text-[10px]">Lumpia</p>
                        <h2 id="modal-title" class="text-[#540863] text-xl font-extrabold mt-1 leading-tight">Ubi Roll</h2>
                        <p id="modal-price" class="text-[#540863] text-lg font-bold mt-2">Rp 2000</p>
                    </div>

                    <div class="mt-4">
                        <p class="text-xs text-gray-500 mb-1">Kuantitas</p>
                        <div class="flex items-center bg-white rounded-lg w-max shadow-sm border border-gray-200">
                            <button onclick="updateQty(-1)" class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-l-lg font-bold">-</button>
                            <span id="modal-qty" class="px-4 py-1 text-sm font-bold text-[#540863]">1</span>
                            <button onclick="updateQty(1)" class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-r-lg font-bold">+</button>
                        </div>
                    </div>

                    <button onclick="addToCart()" class="w-full bg-[#540863] hover:bg-[#3d0548] text-white text-sm font-bold py-2.5 rounded-xl mt-5 transition shadow-lg">
                        + Tambah ke keranjang
                    </button>

                    <div class="mt-3 text-[10px] text-gray-500 space-y-1">
                        <p class="flex items-center gap-1"><svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tanpa pengawet</p>
                        <p class="flex items-center gap-1"><svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Gula Alami</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="cart-overlay" onclick="toggleCart()" class="fixed inset-0 bg-black/50 z-[105] hidden backdrop-blur-sm transition-opacity"></div>
        <div id="cart-drawer" class="fixed top-0 right-0 h-full w-full sm:w-[380px] bg-[#E9DFFF] z-[110] transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
            <div class="p-6 border-b border-[#D8B4FE] flex justify-between items-center">
                <h2 class="text-[#540863] text-xl font-bold">Keranjangmu</h2>
                <button onclick="toggleCart()" class="text-gray-400 hover:text-gray-800 transition bg-white rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <div id="cart-items" class="flex-grow p-6 overflow-y-auto space-y-4">
                <div class="text-center text-gray-500 mt-10 text-sm italic" id="empty-cart-msg">Keranjangmu masih kosong.</div>
            </div>

            <div class="p-6 border-t border-[#D8B4FE] bg-white/50">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600 font-semibold text-sm">Total:</span>
                    <span id="cart-total" class="text-[#540863] font-bold text-lg">Rp 0</span>
                </div>
                <button class="w-full bg-[#540863] hover:bg-[#3d0548] text-white font-bold py-3 rounded-xl transition shadow-lg">
                    Beli Sekarang
                </button>
                <p class="text-center text-[10px] text-gray-400 mt-3">*pajak ringgit atau gratis ongkir dihitung saat checkout</p>
            </div>
        </div>

        <script>
            // Sticky Navbar
            const navbar = document.getElementById("navbar");
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) {
                    navbar.classList.add("shadow-lg", "backdrop-blur-md");
                } else {
                    navbar.classList.remove("shadow-lg", "backdrop-blur-md");
                }
            });

            // State Management
            let currentProduct = null;
            let cart = [];

            // Modal Logic
            const modal = document.getElementById('product-modal');
            const modalContent = document.getElementById('modal-content');
            let qty = 1;

            function openModal(title, priceStr, imgSrc, rawPrice) {
                currentProduct = { title, priceStr, imgSrc, rawPrice };
                qty = 1; // reset qty
                
                document.getElementById('modal-title').innerText = title;
                document.getElementById('modal-price').innerText = priceStr;
                document.getElementById('modal-img').src = imgSrc;
                document.getElementById('modal-qty').innerText = qty;

                modal.classList.remove('hidden');
                setTimeout(() => {
                    modalContent.classList.remove('scale-95');
                    modalContent.classList.add('scale-100');
                }, 10);
            }

            function closeModal() {
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 150);
            }

            function updateQty(change) {
                qty += change;
                if (qty < 1) qty = 1;
                document.getElementById('modal-qty').innerText = qty;
            }

            // Keranjang (Cart) Logic
            function addToCart() {
                // Cek apakah item sudah ada di keranjang
                const existingItemIndex = cart.findIndex(item => item.title === currentProduct.title);
                
                if (existingItemIndex > -1) {
                    cart[existingItemIndex].qty += qty;
                } else {
                    cart.push({ ...currentProduct, qty });
                }
                
                closeModal();
                updateCartUI();
                
                // Otomatis buka drawer keranjang
                setTimeout(() => {
                    if(document.getElementById('cart-drawer').classList.contains('translate-x-full')){
                        toggleCart();
                    }
                }, 200);
            }

            function removeFromCart(index) {
                cart.splice(index, 1);
                updateCartUI();
            }

            function updateCartUI() {
                const cartContainer = document.getElementById('cart-items');
                const emptyMsg = document.getElementById('empty-cart-msg');
                const totalEl = document.getElementById('cart-total');
                const badge = document.getElementById('cart-badge');
                
                cartContainer.innerHTML = '';
                let total = 0;
                let totalItems = 0;

                if (cart.length === 0) {
                    cartContainer.appendChild(emptyMsg);
                    emptyMsg.style.display = 'block';
                    badge.classList.add('hidden');
                } else {
                    emptyMsg.style.display = 'none';
                    badge.classList.remove('hidden');
                    
                    cart.forEach((item, index) => {
                        total += (item.rawPrice * item.qty);
                        totalItems += item.qty;

                        const itemHTML = `
                            <div class="flex items-center gap-4 bg-white p-3 rounded-2xl shadow-sm">
                                <img src="${item.imgSrc}" alt="${item.title}" class="w-14 h-14 rounded-xl object-cover" />
                                <div class="flex-grow">
                                    <h3 class="text-[#540863] font-bold text-sm leading-tight">${item.title}</h3>
                                    <p class="text-xs text-gray-500">Jumlah: ${item.qty}</p>
                                    <p class="text-[#7A379B] font-bold text-sm mt-0.5">Rp ${ (item.rawPrice * item.qty).toLocaleString('id-ID') }</p>
                                </div>
                                <button onclick="removeFromCart(${index})" class="text-red-400 hover:text-red-600 bg-red-50 p-2 rounded-lg transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                </button>
                            </div>
                        `;
                        cartContainer.innerHTML += itemHTML;
                    });
                }
                
                totalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
                badge.innerText = totalItems;
            }

            // Sidebar Drawer Toggles
            function toggleCart() {
                const drawer = document.getElementById('cart-drawer');
                const overlay = document.getElementById('cart-overlay');
                
                if (drawer.classList.contains('translate-x-full')) {
                    // Open
                    drawer.classList.remove('translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    // Close
                    drawer.classList.add('translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        </script>
    </body>
</html>]