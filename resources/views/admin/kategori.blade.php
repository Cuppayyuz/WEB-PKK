@extends('layouts.admin')

@section('content')
    <main class="flex-1 overflow-y-auto p-8 custom-scrollbar">

        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-1">Kelola Kategori Produk</h1>
            <p class="text-gray-500">atur jenis kategori produk dan warna kategorinya</p>
        </header>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div
                class="lg:col-span-4 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden h-fit transition-shadow hover:shadow-md">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="font-bold text-gray-800 text-sm">Tambah Kategori</h3>
                </div>
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="p-6 space-y-5">
                    @csrf
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nama Kategori</label>
                            <input type="text" name="name" placeholder="Contoh: Goreng" required
                                class="w-full border border-gray-200 bg-gray-50 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-brand-light focus:ring-1 focus:ring-brand-light transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Warna Background</label>
                            <div class="relative flex items-center">
                                <input type="text" name="color_hex" id="colorText" placeholder="Contoh: #8c8c8c" required
                                    class="w-full border border-gray-200 bg-gray-50 rounded-lg pl-4 pr-12 py-2.5 text-sm focus:outline-none focus:border-brand-light focus:ring-1 focus:ring-brand-light transition">

                                <button type="button" onclick="document.getElementById('colorPicker').click()"
                                    class="absolute right-2 w-8 h-8 rounded border border-gray-300 flex items-center justify-center overflow-hidden hover:border-gray-400 transition cursor-pointer">
                                    <div id="colorPreview" class="w-full h-full bg-gray-300"></div>
                                </button>

                                <input type="color" id="colorPicker" class="absolute opacity-0 w-0 h-0"
                                    onchange="updateColor(this.value)">
                            </div>
                        </div>

                        <button
                            class="w-full bg-brand-light hover:bg-[#6C157E] text-white font-semibold rounded-lg py-3 text-sm transition-colors mt-4 shadow-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

            <div
                class="lg:col-span-8 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col transition-shadow hover:shadow-md">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="font-bold text-gray-800 text-sm">List Kategori Produk</h3>
                    <p class="text-xs text-gray-500 mt-1">Daftar Semua Kategori Yang Tersedia</p>
                </div>

                <div class="flex-1 p-0 overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-gray-100 text-gray-600 text-xs font-bold border-y border-gray-200">
                            <tr>
                                <th class="px-6 py-3 w-16">No</th>
                                <th class="px-6 py-3 text-center">Kategori</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">

                            @forelse ($categories as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-semibold">{{ $loop->iteration }}</td>

                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="inline-block bg-gray-200 text-gray-700 px-4 py-1 rounded-full text-xs font-semibold w-24"
                                            style="background-color: {{ $item->color_hex ?? '#E5E7EB' }}"> {{ $item->name }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="{{ route('admin.kategori.edit', $item->id) }}"
                                            class="inline-block px-3 py-1 border border-blue-400 text-blue-500 hover:bg-blue-500 hover:text-white text-xs font-semibold rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 border border-red-400 text-red-500 hover:bg-red-500 hover:text-white text-xs font-semibold rounded transition-colors">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between text-xs">
                    <span class="text-gray-500">Halaman Kategori</span>
                </div>

            </div>

        </div>
    </main>
@endsection

@push('scripts')
    <script>
        function updateColor(hexValue) {
            document.getElementById('colorText').value = hexValue;
            document.getElementById('colorPreview').style.backgroundColor = hexValue;
        }

        document.getElementById('colorText').addEventListener('input', function (e) {
            let val = e.target.value;
            if (/^#[0-9A-F]{6}$/i.test(val)) {
                document.getElementById('colorPreview').style.backgroundColor = val;
                document.getElementById('colorPicker').value = val;
            }
        });
    </script>
@endpush