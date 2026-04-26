@extends('layouts.admin')

@section('content')
    <main class="flex-1 overflow-y-auto p-8 custom-scrollbar relative">

        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-1">Kelola Label Produk</h1>
            <p class="text-gray-500">Atur tag/label (seperti Best Seller, New, dll) untuk produkmu</p>
        </header>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <div class="lg:col-span-4 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden h-fit transition-shadow hover:shadow-md">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="font-bold text-gray-800 text-sm">Tambah Label Baru</h3>
                </div>
                <form action="{{ route('admin.labels.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-2">Nama Label</label>
                        <input type="text" name="name" required placeholder="Contoh: Best Seller"
                               class="w-full border border-gray-200 bg-gray-50 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] transition">
                    </div>
                    <button type="submit" class="w-full bg-[#8A1A9A] hover:bg-[#6C157E] text-white font-semibold rounded-lg py-2.5 text-sm transition-colors shadow-sm mt-2">
                        Simpan Label
                    </button>
                </form>
            </div>

            <div class="lg:col-span-8 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-shadow hover:shadow-md">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm">Daftar Label</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-white border-b border-gray-100 text-xs uppercase text-gray-400">
                            <tr>
                                <th class="px-6 py-4 font-medium">Nama Label</th>
                                <th class="px-6 py-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($labels as $label)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $label->name }}</td>
                                    <td class="px-6 py-4 text-right flex justify-end gap-2">
                                        <button type="button" 
                                                onclick="openEditModal({{ $label->id }}, '{{ $label->name }}')" 
                                                class="px-3 py-1.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 rounded-md font-medium text-xs transition">
                                            Edit
                                        </button>

                                        <form action="{{ route('admin.labels.destroy', $label->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-md font-medium text-xs transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-gray-500">Belum ada data label.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div id="modalEdit" class="fixed inset-0 z-50 hidden invisible opacity-0 transition-all duration-300">
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeEditModal()"></div>
            
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div id="modalPanel" class="relative bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-md w-full scale-95">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-800">Edit Label</h3>
                        <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    
                    <form id="formEdit" method="POST" class="p-6">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nama Label</label>
                            <input type="text" id="editName" name="name" required
                                   class="w-full border border-gray-200 bg-gray-50 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#8A1A9A] transition">
                        </div>
                        <div class="flex gap-3 justify-end">
                            <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg text-sm transition">
                                Batal
                            </button>
                            <button type="submit" class="px-4 py-2 bg-[#8A1A9A] hover:bg-[#6C157E] text-white font-medium rounded-lg text-sm transition shadow-sm">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection

@push('scripts')
    <script>
        const modalEdit = document.getElementById('modalEdit');
        const modalPanel = document.getElementById('modalPanel');
        const formEdit = document.getElementById('formEdit');
        const inputEditName = document.getElementById('editName');

        // Ganti URL ini sesuai dengan prefix route kamu
        const baseUrl = "{{ url('/admin/labels') }}"; 

        function openEditModal(id, name) {
            // 1. Isi form dengan data saat ini
            inputEditName.value = name;
            
            // 2. Ubah URL action form sesuai ID yang diklik
            formEdit.action = `${baseUrl}/${id}`;

            // 3. Tampilkan Modal dengan animasi cantik
            modalEdit.classList.remove('hidden', 'invisible', 'opacity-0');
            modalEdit.classList.add('opacity-100');
            setTimeout(() => {
                modalPanel.classList.remove('scale-95');
                modalPanel.classList.add('scale-100');
            }, 10);
        }

        function closeEditModal() {
            // Tutup modal dengan animasi mundur
            modalPanel.classList.remove('scale-100');
            modalPanel.classList.add('scale-95');
            modalEdit.classList.remove('opacity-100');
            modalEdit.classList.add('opacity-0');

            setTimeout(() => {
                modalEdit.classList.add('invisible', 'hidden');
            }, 300);
        }
    </script>
@endpush