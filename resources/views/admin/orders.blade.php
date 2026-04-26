@extends('layouts.admin')

@section('content')
    <main
        class="flex-1 flex flex-col h-full overflow-y-auto p-8 relative bg-white m-4 rounded-2xl shadow-sm border border-gray-100 custom-scrollbar">

        <header class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Pesanan</h1>
                <p class="text-xs text-gray-500">Kelola dan pantau pesanan pelanggan</p>
            </div>
            <button id="btnBukaModal"
                class="bg-[#8A1A9A] hover:bg-[#6C157E] text-white text-sm font-medium px-5 py-2.5 rounded-lg transition-colors shadow-md flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Pesanan
            </button>
        </header>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm border-l-4 border-green-500">
                {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm border-l-4 border-red-500">{{ $errors->first() }}
            </div>
        @endif

        <div class="flex items-center gap-2 mb-6 border-b border-gray-200 pb-4">
            <a href="{{ route('admin.orders') }}"
                class="{{ request('status') == '' ? 'bg-[#8A1A9A] text-white' : 'text-gray-500 hover:bg-gray-100' }} px-5 py-1.5 rounded-full text-xs font-semibold transition-all">Semua</a>
            <a href="{{ route('admin.orders', ['status' => 'pending']) }}"
                class="{{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : 'text-gray-500 hover:bg-gray-100' }} px-5 py-1.5 rounded-full text-xs font-semibold transition-all">Pending</a>
            <a href="{{ route('admin.orders', ['status' => 'processing']) }}"
                class="{{ request('status') == 'processing' ? 'bg-blue-500 text-white' : 'text-gray-500 hover:bg-gray-100' }} px-5 py-1.5 rounded-full text-xs font-semibold transition-all">Diproses</a>
            <a href="{{ route('admin.orders', ['status' => 'success']) }}"
                class="{{ request('status') == 'success' ? 'bg-green-500 text-white' : 'text-gray-500 hover:bg-gray-100' }} px-5 py-1.5 rounded-full text-xs font-semibold transition-all">Sukses</a>
            <a href="{{ route('admin.orders', ['status' => 'failed']) }}"
                class="{{ request('status') == 'failed' ? 'bg-red-500 text-white' : 'text-gray-500 hover:bg-gray-100' }} px-5 py-1.5 rounded-full text-xs font-semibold transition-all">Gagal</a>
        </div>

        <div class="overflow-x-auto bg-[#FBFBFB] rounded-xl border border-gray-100">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-[#EAEAEA] text-gray-700">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Order ID</th>
                        <th class="px-6 py-4 font-semibold">Pelanggan</th>
                        <th class="px-6 py-4 font-semibold">Rincian Barang</th>
                        <th class="px-6 py-4 font-semibold text-center">Total</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-bold text-[#8A1A9A]">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                            </td>

                            <td class="px-6 py-4 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($order->customer_name) }}&background=8A1A9A&color=fff&rounded=true"
                                    alt="Avatar" class="w-10 h-10 rounded-full shadow-sm">
                                <div>
                                    <p class="font-bold text-gray-900">{{ $order->customer_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $order->customer_phone }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <ul class="text-xs text-gray-600 space-y-1">
                                    @foreach($order->items as $item)
                                        <li>• {{ $item->product->name }} <span class="font-bold">x{{ $item->quantity }}</span>
                                            @if($item->variant) <span class="text-gray-400">({{ $item->variant }})</span> @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="px-6 py-4 text-center font-bold text-gray-900">Rp
                                {{ number_format($order->total_price, 0, ',', '.') }}</td>

                            <td class="px-6 py-4 text-center">
                                @if($order->status == 'pending') <span
                                    class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-md text-xs font-bold">Pending</span>
                                @elseif($order->status == 'processing') <span
                                    class="bg-blue-100 text-blue-700 px-3 py-1 rounded-md text-xs font-bold">Diproses</span>
                                @elseif($order->status == 'success') <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-md text-xs font-bold">Sukses</span>
                                @else <span class="bg-red-100 text-red-700 px-3 py-1 rounded-md text-xs font-bold">Gagal</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <select name="status" onchange="this.form.submit()"
                                            class="text-xs border border-gray-300 rounded-md py-1 px-2 focus:outline-none focus:border-[#8A1A9A]">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Proses
                                            </option>
                                            <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Sukses
                                            </option>
                                            <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Gagal</option>
                                        </select>
                                    </form>

                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus pesanan ini? Stok barang akan dikembalikan.');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="border border-[#E04F54] text-[#E04F54] hover:bg-[#E04F54] hover:text-white px-2 py-1 rounded-md text-xs font-medium transition-colors">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <div id="modalOrder" class="fixed inset-0 z-50 flex justify-end invisible opacity-0 transition-all duration-300">
        <div id="modalBackdrop"
            class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm cursor-pointer transition-opacity duration-300"></div>
        <div id="modalPanel"
            class="relative w-full max-w-lg bg-white h-full shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex items-center justify-between p-6 border-b border-gray-100 bg-white">
                <h2 class="text-xl font-bold text-[#8A1A9A]">Buat Pesanan Baru</h2>
                <button id="btnTutupModal"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-50 hover:bg-gray-200 text-gray-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.orders.store') }}" method="POST" class="flex-1 flex flex-col overflow-hidden">
                @csrf
                <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar bg-gray-50/50">

                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm space-y-4">
                        <h3 class="font-bold text-sm text-gray-800 border-b pb-2">Informasi Pelanggan</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">Nama Pembeli</label>
                                <input type="text" name="customer_name" required placeholder="Contoh: Budi"
                                    class="w-full rounded-lg border border-gray-200 py-2 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">No. WhatsApp</label>
                                <input type="text" name="customer_phone" required placeholder="0812..."
                                    class="w-full rounded-lg border border-gray-200 py-2 px-3 text-sm focus:border-[#8A1A9A] focus:ring-1 focus:ring-[#8A1A9A] outline-none transition">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <h3 class="font-bold text-sm text-gray-800">Daftar Barang</h3>
                            <button type="button" id="btnTambahBarang"
                                class="text-xs bg-[#8A1A9A]/10 text-[#8A1A9A] font-bold px-3 py-1.5 rounded-md hover:bg-[#8A1A9A]/20 transition">+
                                Tambah Baris</button>
                        </div>

                        <div id="itemContainer" class="space-y-4">
                            <div class="flex gap-2 items-start border-b border-gray-50 pb-4">
                                <div class="flex-1">
                                    <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Produk</label>
                                    <select name="product_id[]" required
                                        class="w-full rounded-lg border border-gray-200 py-2 px-2 text-sm focus:border-[#8A1A9A] outline-none">
                                        <option value="">-- Pilih --</option>
                                        @foreach($products as $prod)
                                            <option value="{{ $prod->id }}">{{ $prod->name }} (Sisa: {{ $prod->stock }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-24"> <label
                                        class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Varian</label>
                                    <select name="variant[]"
                                        class="w-full rounded-lg border border-gray-200 py-2 px-2 text-sm focus:border-[#8A1A9A] outline-none bg-white">
                                        <option value="">- Tanpa -</option>
                                        @foreach($variants as $var)
                                            <option value="{{ $var->name }}">{{ $var->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-16">
                                    <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Jml</label>
                                    <input type="number" name="quantity[]" min="1" value="1" required
                                        class="w-full rounded-lg border border-gray-200 py-2 px-2 text-sm focus:border-[#8A1A9A] outline-none">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-6 border-t border-gray-100 bg-white flex gap-3">
                    <button type="button" id="btnBatal"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 bg-[#8A1A9A] hover:bg-[#6C157E] text-white font-bold py-3 rounded-xl transition-colors shadow-md">Simpan
                        Pesanan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // SCRIPT BUKA TUTUP MODAL
        const modalOrder = document.getElementById('modalOrder');
        const modalPanel = document.getElementById('modalPanel');

        function openModal() {
            modalOrder.classList.remove('invisible', 'opacity-0');
            modalOrder.classList.add('opacity-100');
            setTimeout(() => { modalPanel.classList.remove('translate-x-full'); modalPanel.classList.add('translate-x-0'); }, 10);
        }
        function closeModal() {
            modalPanel.classList.remove('translate-x-0'); modalPanel.classList.add('translate-x-full');
            modalOrder.classList.remove('opacity-100'); modalOrder.classList.add('opacity-0');
            setTimeout(() => { modalOrder.classList.add('invisible'); }, 300);
        }

        document.getElementById('btnBukaModal').addEventListener('click', openModal);
        document.getElementById('btnTutupModal').addEventListener('click', closeModal);
        document.getElementById('btnBatal').addEventListener('click', closeModal);
        document.getElementById('modalBackdrop').addEventListener('click', closeModal);

        // SCRIPT TAMBAH BARIS BARANG DINAMIS
        document.getElementById('btnTambahBarang').addEventListener('click', function () {
            const container = document.getElementById('itemContainer');

            // Buat elemen baris baru menggunakan template literal HTML
            const newRow = document.createElement('div');
            newRow.className = "flex gap-2 items-start border-b border-gray-50 pb-4 mt-2";
            newRow.innerHTML = `
                    <div class="flex-1">
                        <select name="product_id[]" required class="w-full rounded-lg border border-gray-200 py-2 px-2 text-sm focus:border-[#8A1A9A] outline-none">
                            <option value="">-- Pilih --</option>
                            @foreach($products as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->name }} (Sisa: {{ $prod->stock }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-24">
                        <select name="variant[]" class="w-full rounded-lg border border-gray-200 py-2 px-2 text-sm focus:border-[#8A1A9A] outline-none bg-white">
                            <option value="">- Tanpa -</option>
                            @foreach($variants as $var)
                                <option value="{{ $var->name }}">{{ $var->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-16">
                        <input type="number" name="quantity[]" min="1" value="1" required class="w-full rounded-lg border border-gray-200 py-2 px-2 text-sm focus:border-[#8A1A9A] outline-none">
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="w-8 h-9 flex items-center justify-center bg-red-100 text-red-500 rounded-lg hover:bg-red-200 mt-0.5">
                        &times;
                    </button>
                `;
            container.appendChild(newRow);
        });
    </script>
@endpush