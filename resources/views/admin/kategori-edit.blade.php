@extends('layouts.admin') 

@section('content')
<main class="flex-1 overflow-y-auto p-8 custom-scrollbar">

    <header class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-1">Edit Kategori Produk</h1>
        <p class="text-gray-500">Ubah nama atau warna kategori yang sudah ada</p>
    </header>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl transition-shadow hover:shadow-md">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-800 text-sm">Form Edit Kategori</h3>
        </div>

        <form action="{{ route('admin.kategori.update', $category->id) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" name="name" value="{{ $category->name }}" required 
                       class="w-full border border-gray-200 bg-gray-50 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-brand-light focus:ring-1 focus:ring-brand-light transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2">Warna Background</label>
                <div class="relative flex items-center">
                    <input type="text" name="color_hex" id="colorText" value="{{ $category->color_hex }}" 
                           class="w-full border border-gray-200 bg-gray-50 rounded-lg pl-4 pr-12 py-2.5 text-sm focus:outline-none focus:border-brand-light focus:ring-1 focus:ring-brand-light transition">
                    
                    <button type="button" onclick="document.getElementById('colorPicker').click()" 
                            class="absolute right-2 w-8 h-8 rounded border border-gray-300 flex items-center justify-center overflow-hidden hover:border-gray-400 transition cursor-pointer">
                        <div id="colorPreview" class="w-full h-full" style="background-color: {{ $category->color_hex }}"></div>
                    </button>
                    
                    <input type="color" id="colorPicker" value="{{ $category->color_hex }}" class="absolute opacity-0 w-0 h-0" 
                           onchange="document.getElementById('colorText').value = this.value; document.getElementById('colorPreview').style.backgroundColor = this.value;">
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <a href="{{ route('admin.kategori') }}" class="w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg py-3 text-sm transition-colors shadow-sm">
                    Batal
                </a>
                
                <button type="submit" class="w-full bg-[#6C157E] hover:bg-purple-900 text-white font-semibold rounded-lg py-3 text-sm transition-colors shadow-sm">
                    Update Data
                </button>
            </div>
        </form>
    </div>

</main>
@endsection