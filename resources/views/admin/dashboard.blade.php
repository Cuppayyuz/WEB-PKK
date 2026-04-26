@extends('layouts.admin')

@section('content')
    <main class="flex-1 flex flex-col h-full overflow-y-auto p-8 relative custom-scrollbar">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-1">Dashboard Overview</h1>
            <p class="text-gray-500">Selamat datang, ini adalah dashboard untuk mengelola produk</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-gray-500 text-sm font-medium mb-1">Total Produk</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $products->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-[#EBB8CE] rounded-lg flex items-center justify-center text-[#50155C]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-green-600">
                    <span class="bg-green-100 p-1 rounded-full mr-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M12.577 4.878a.75.75 0 01.907-.13l3.39 2.14a.75.75 0 01.002 1.274l-3.39 2.14a.75.75 0 01-.91-.131l-4.44-4.44-2.493 2.493a.75.75 0 01-1.06 0l-2-2a.75.75 0 011.06-1.06l1.47 1.47 2.492-2.492a.75.75 0 011.06 0l4.44 4.44z" clip-rule="evenodd" /></svg>
                    </span>
                    Aktif di katalog
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-gray-500 text-sm font-medium mb-1">Total Pesanan</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $totalOrders }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-[#C3A9CD] rounded-lg flex items-center justify-center text-[#50155C]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.orders') }}" class="mt-4 flex items-center text-xs font-medium text-[#8A1A9A] hover:text-[#6C157E] group transition-all">
                    <span class="bg-[#F3E8FF] group-hover:bg-[#EBD5FF] p-1 rounded-full mr-1.5 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3">
                            <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                            <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="group-hover:underline">Kelola di menu Orders</span>
                </a>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-gray-500 text-sm font-medium mb-1">Total Pendapatan</p>
                        <h3 class="text-4xl font-bold text-gray-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-[#D1E7DD] rounded-lg flex items-center justify-center text-[#0F5132]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.546 1.16 3.74.322 4.758-1.39a3.34 3.34 0 000-3.582c-1.017-1.712-3.212-2.55-4.758-1.39l-.879.659m0 5.636l-.879-.659c-1.546-1.16-3.74-.322-4.758 1.39a3.34 3.34 0 000 3.582c1.017 1.712 3.212 2.55 4.758 1.39l.879-.659m-8.464-6.614l1.64 1.64c.293.293.767.293 1.06 0l3.14-3.14a.75.75 0 011.06 1.06l-3.14 3.14a1.5 1.5 0 01-2.12 0l-1.64-1.64a.75.75 0 011.06-1.06z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-emerald-600">
                    <span class="bg-emerald-100 p-1 rounded-full mr-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4.01-5.5z" clip-rule="evenodd" /></svg>
                    </span>
                    Penjualan keseluruhan
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-md">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-[#FBFBFB] rounded-2xl shadow-md border border-gray-200 overflow-hidden flex-1 flex flex-col">
            <div class="p-6 flex justify-between items-center border-b border-gray-200 bg-white">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Manajemen Produk</h2>
                    <p class="text-xs text-gray-500">Kelola Stok Daan Varian Menu</p>
                </div>
                <button id="btnTambahProduk"
                    class="bg-[#50155C] hover:bg-[#3a0f44] text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors shadow-md">
                    + Tambah Produk
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-[#EAEAEA] text-gray-700">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Produk</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold text-center">Varian Rasa</th>
                            <th class="px-6 py-4 font-semibold text-center">Harga</th>
                            <th class="px-6 py-4 font-semibold text-center">Stok</th>
                            <th class="px-6 py-4 font-semibold text-center">Status</th>
                            <th class="px-6 py-4 font-semibold text-center">Label</th>
                            <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-[#FBFBFB]">
                        @forelse($products as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : 'https://placehold.co/100x100/4a0e4e/ffffff?text=' . substr($item->name, 0, 1) }}"
                                        alt="{{ $item->name }}"
                                        class="w-10 h-10 rounded-md object-cover border border-gray-200">
                                    <span class="font-bold text-gray-900">{{ $item->name }}</span>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <span class="text-white text-xs px-3 py-1 rounded-md"
                                        style="background-color: {{ $item->category->color_hex ?? '#8C6D6A' }}">
                                        {{ $item->category->name }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    @if($item->variant)
                                        <span class="text-xs font-bold text-[#8A1A9A] bg-[#EBE4ED] border border-[#D4C5D9] px-3 py-1 rounded-full shadow-sm">
                                            {{ $item->variant->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-300">-</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center font-bold text-gray-900">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                
                                <td class="px-6 py-4 text-center font-bold {{ $item->stock <= 5 ? 'text-red-500' : 'text-gray-900' }}">{{ $item->stock }}</td>
                                
                                <td class="px-6 py-4 text-center">
                                    @if($item->stock > 0)
                                        <span class="bg-[#6FC05A] text-white text-[10px] font-bold px-3 py-1 rounded-md uppercase">In Stock</span>
                                    @else
                                        <span class="bg-red-500 text-white text-[10px] font-bold px-3 py-1 rounded-md uppercase">Habis</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if($item->label)
                                        <span class="px-3 py-1 text-white text-[10px] font-bold rounded-lg shadow-sm" style="background-color: {{ $item->label->color }}">
                                            {{ $item->label->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-300">-</span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick="openEditModal({{ $item }})" class="border border-[#3FA0F0] text-[#3FA0F0] hover:bg-[#3FA0F0] hover:text-white px-3 py-1 rounded-md text-xs font-medium transition-colors">Edit</button>
                                        
                                        <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="border border-[#E04F54] text-[#E04F54] hover:bg-[#E04F54] hover:text-white px-3 py-1 rounded-md text-xs font-medium transition-colors">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-8 text-center text-gray-500">Belum ada data produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="mt-auto border-t-4 border-[#D8B4FE] bg-[#FBFBFB] p-4 flex justify-between items-center text-xs text-gray-500">
                <p>Menampilkan Halaman Produk</p>
            </div>
        </div>
    </main>

    <div id="modalTambahProduk" class="fixed inset-0 z-50 flex justify-end invisible opacity-0 transition-all duration-300">
        <div id="modalBackdrop" class="absolute inset-0 bg-white/30 backdrop-blur-md cursor-pointer transition-opacity duration-300"></div>
        <div id="modalPanel" class="relative w-full max-w-md bg-[#EBE4ED] h-full shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex items-center justify-between p-6 border-b border-[#D4C5D9] bg-[#EBE4ED]">
                <h2 class="text-xl font-bold text-[#8A1A9A]">Tambah Produk Baru</h2>
                <button id="btnCloseModal" class="w-8 h-8 flex items-center justify-center rounded-full bg-white shadow-sm hover:bg-gray-100 text-gray-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col overflow-hidden">
                @csrf
                <div class="flex-1 overflow-y-auto p-6 space-y-5 custom-scrollbar">
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-2">Foto Produk</label>
                        <div id="dropZone" onclick="document.getElementById('fileInput').click()" class="relative border-2 border-dashed border-[#C3A9CD] rounded-2xl p-8 flex flex-col items-center justify-center text-center bg-[#E4DCE5] hover:bg-[#DDD2DF] transition cursor-pointer overflow-hidden min-h-[180px]">
                            <input type="file" name="image" id="fileInput" accept="image/*" class="hidden">
                            <div id="dropZoneContent" class="flex flex-col items-center pointer-events-none transition-opacity duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-[#8A1A9A] mb-2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" /></svg>
                                <p class="text-sm font-semibold text-gray-800">Seret & Lepas foto disini</p>
                                <p class="text-xs text-gray-500 mt-1">atau <span class="text-[#8A1A9A] underline">pilih file</span></p>
                            </div>
                            <img id="imagePreview" src="" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover z-10 bg-white">
                            <button type="button" id="btnRemoveImage" class="hidden absolute top-2 right-2 bg-white/80 hover:bg-white text-red-500 p-1.5 rounded-full shadow-md z-20 transition" title="Hapus Gambar">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Nama Produk</label>
                            <input type="text" name="name" required placeholder="Contoh: Pastel Ubi" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Kategori Produk</label>
                            <select name="category_id" required class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition bg-white">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Harga (Rp)</label>
                            <input type="number" name="price" required placeholder="0" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Stock Awal (Pcs)</label>
                            <input type="number" name="stock" required placeholder="0" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Varian Rasa</label>
                        <select name="variant_id" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition bg-white">
                            <option value="">Tanpa Varian</option>
                            @foreach($variants as $var)
                                <option value="{{ $var->id }}">{{ $var->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Label Promo</label>
                        <select name="label_id" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition bg-white">
                            <option value="">Tanpa Label</option>
                            @foreach($labels as $lab)
                                <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Deskripsi Produk</label>
                        <textarea name="description" rows="3" placeholder="Tuliskan Deskripsi Produk..." class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] resize-none outline-none transition"></textarea>
                    </div>
                </div> <div class="p-6 border-t border-[#D4C5D9] bg-[#EBE4ED]">
                    <button type="submit" class="w-full bg-[#6C157E] hover:bg-[#50155C] text-white font-bold py-3 rounded-xl transition-colors shadow-md">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEditProduk" class="fixed inset-0 z-50 flex justify-end invisible opacity-0 transition-all duration-300">
        <div id="modalEditBackdrop" class="absolute inset-0 bg-white/30 backdrop-blur-md cursor-pointer transition-opacity duration-300"></div>
        <div id="modalEditPanel" class="relative w-full max-w-md bg-[#EBE4ED] h-full shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex items-center justify-between p-6 border-b border-[#D4C5D9] bg-[#EBE4ED]">
                <h2 class="text-xl font-bold text-[#8A1A9A]">Edit Produk</h2>
                <button id="btnCloseEditModal" type="button" class="w-8 h-8 flex items-center justify-center rounded-full bg-white shadow-sm hover:bg-gray-100 text-gray-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <form id="formEditProduk" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col overflow-hidden">
                @csrf
                @method('PUT')
                <div class="flex-1 overflow-y-auto p-6 space-y-5 custom-scrollbar">
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-2">Ganti Foto (Opsional)</label>
                        <div id="dropZoneEdit" onclick="document.getElementById('fileInputEdit').click()" class="relative border-2 border-dashed border-[#93C5FD] rounded-2xl p-8 flex flex-col items-center justify-center text-center bg-[#EFF6FF] hover:bg-[#DBEAFE] transition cursor-pointer overflow-hidden min-h-[180px]">
                            <input type="file" name="image" id="fileInputEdit" accept="image/*" class="hidden">
                            <div id="dropZoneContentEdit" class="flex flex-col items-center pointer-events-none transition-opacity duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-[#8A1A9A] mb-2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" /></svg>
                                <p class="text-sm font-semibold text-gray-800">Seret & Lepas foto baru disini</p>
                                <p class="text-xs text-gray-500 mt-1">atau <span class="text-[#8A1A9A] underline">pilih file</span></p>
                            </div>
                            <img id="imagePreviewEdit" src="" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover z-10 bg-white">
                            <button type="button" id="btnRemoveImageEdit" class="hidden absolute top-2 right-2 bg-white/80 hover:bg-white text-red-500 p-1.5 rounded-full shadow-md z-20 transition" title="Batal Ganti Gambar">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Nama Produk</label>
                            <input type="text" name="name" id="edit_name" required class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 outline-none">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Kategori Produk</label>
                            <select name="category_id" id="edit_category" required class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm bg-white">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Harga (Rp)</label>
                            <input type="number" name="price" id="edit_price" required class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Stock</label>
                            <input type="number" name="stock" id="edit_stock" required class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Varian Rasa</label>
                        <select name="variant_id" id="edit_variant" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition bg-white">
                            <option value="">Tanpa Varian</option>
                            @foreach($variants as $var)
                                <option value="{{ $var->id }}">{{ $var->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Label Promo</label>
                        <select name="label_id" id="edit_label" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition bg-white">
                            <option value="">Tanpa Label</option>
                            @foreach($labels as $lab)
                                <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#8A1A9A] mb-1">Deskripsi</label>
                        <textarea name="description" id="edit_description" rows="3" class="w-full rounded-lg border-transparent shadow-sm py-2.5 px-3 text-sm resize-none"></textarea>
                    </div>
                </div> <div class="p-6 border-t border-[#D4C5D9] bg-[#EBE4ED]">
                    <button type="submit" class="w-full bg-[#8A1A9A] hover:bg-purple-600 text-white font-bold py-3 rounded-xl transition-colors shadow-md">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // SCRIPT UNTUK MODAL TAMBAH
        const btnTambahProduk = document.getElementById('btnTambahProduk');
        const modalTambah = document.getElementById('modalTambahProduk');
        const panelTambah = document.getElementById('modalPanel');

        function openTambahModal() {
            modalTambah.classList.remove('invisible', 'opacity-0');
            modalTambah.classList.add('opacity-100');
            setTimeout(() => { panelTambah.classList.remove('translate-x-full'); panelTambah.classList.add('translate-x-0'); }, 10);
        }
        function closeTambahModal() {
            panelTambah.classList.remove('translate-x-0'); panelTambah.classList.add('translate-x-full');
            modalTambah.classList.remove('opacity-100'); modalTambah.classList.add('opacity-0');
            setTimeout(() => { modalTambah.classList.add('invisible'); }, 300);
        }

        btnTambahProduk.addEventListener('click', openTambahModal);
        document.getElementById('btnCloseModal').addEventListener('click', closeTambahModal);
        document.getElementById('modalBackdrop').addEventListener('click', closeTambahModal);

        // SCRIPT UNTUK MODAL EDIT (BARU)
        const modalEdit = document.getElementById('modalEditProduk');
        const panelEdit = document.getElementById('modalEditPanel');

        function openEditModal(product) {
            // Isi form dengan data produk
            document.getElementById('edit_name').value = product.name;
            document.getElementById('edit_category').value = product.category_id;
            document.getElementById('edit_label').value = product.label_id || '';
            document.getElementById('edit_variant').value = product.variant_id || '';
            document.getElementById('edit_price').value = product.price;
            document.getElementById('edit_stock').value = product.stock;
            document.getElementById('edit_description').value = product.description;

            // Ubah action form ke route update
            document.getElementById('formEditProduk').action = `/admin/produk/${product.id}`;

            // Tampilkan Modal
            modalEdit.classList.remove('invisible', 'opacity-0');
            modalEdit.classList.add('opacity-100');
            setTimeout(() => { panelEdit.classList.remove('translate-x-full'); panelEdit.classList.add('translate-x-0'); }, 10);
        }

        function closeEditModal() {
            panelEdit.classList.remove('translate-x-0'); panelEdit.classList.add('translate-x-full');
            modalEdit.classList.remove('opacity-100'); modalEdit.classList.add('opacity-0');
            setTimeout(() => { modalEdit.classList.add('invisible'); }, 300);
        }

        document.getElementById('btnCloseEditModal').addEventListener('click', closeEditModal);
        document.getElementById('modalEditBackdrop').addEventListener('click', closeEditModal);

        // DRAG AND DROP IMAGE (Tetap sama seperti bawaanmu)
        const fileInput = document.getElementById('fileInput');
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                    document.getElementById('dropZoneContent').classList.add('hidden');
                    document.getElementById('btnRemoveImage').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('btnRemoveImage').addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.value = '';
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('dropZoneContent').classList.remove('hidden');
            this.classList.add('hidden');
        });

        // DRAG AND DROP IMAGE UNTUK MODAL EDIT
        const fileInputEdit = document.getElementById('fileInputEdit');
        fileInputEdit.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagePreviewEdit').src = e.target.result;
                    document.getElementById('imagePreviewEdit').classList.remove('hidden');
                    document.getElementById('dropZoneContentEdit').classList.add('hidden');
                    document.getElementById('btnRemoveImageEdit').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('btnRemoveImageEdit').addEventListener('click', function (e) {
            e.stopPropagation();
            fileInputEdit.value = '';
            document.getElementById('imagePreviewEdit').classList.add('hidden');
            document.getElementById('dropZoneContentEdit').classList.remove('hidden');
            this.classList.add('hidden');
        });
    </script>
@endpush