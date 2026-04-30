@extends('layouts.admin')

@section('content')
    <main class="flex-1 flex flex-col h-full overflow-y-auto p-8 relative custom-scrollbar">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-1">Inbox Masukan</h1>
            <p class="text-gray-500">Daftar pesan, pertanyaan, dan masukan dari pelanggan</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-gray-500 text-sm font-medium mb-1">Total Pesan</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $messages->total() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-[#EBB8CE] rounded-lg flex items-center justify-center text-[#50155C]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-green-600">
                    <span class="bg-green-100 p-1 rounded-full mr-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M12.577 4.878a.75.75 0 01.907-.13l3.39 2.14a.75.75 0 01.002 1.274l-3.39 2.14a.75.75 0 01-.91-.131l-4.44-4.44-2.493 2.493a.75.75 0 01-1.06 0l-2-2a.75.75 0 011.06-1.06l1.47 1.47 2.492-2.492a.75.75 0 011.06 0l4.44 4.44z" clip-rule="evenodd" /></svg>
                    </span>
                    Terkumpul di Database
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#FBFBFB] rounded-2xl shadow-md border border-gray-200 overflow-hidden flex-1 flex flex-col">
            <div class="p-6 flex justify-between items-center border-b border-gray-200 bg-white">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Daftar Pesan Masuk</h2>
                    <p class="text-xs text-gray-500">Baca dan kelola interaksi dengan pengunjung</p>
                </div>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-[#EAEAEA] text-gray-700">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Pengirim</th>
                            <th class="px-6 py-4 font-semibold">Isi Pesan</th>
                            <th class="px-6 py-4 font-semibold text-center">Dikirim Pada</th>
                            <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-[#FBFBFB]">
                        @forelse($messages as $msg)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-900">{{ $msg->name }}</span>
                                        <span class="text-xs text-[#8A1A9A]">{{ $msg->email }}</span>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="max-w-sm truncate text-gray-600">
                                        {{ $msg->message }}
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 text-center text-gray-500 text-xs">
                                    {{ $msg->created_at->format('d M Y, H:i') }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick="openBacaModal('{{ addslashes($msg->name) }}', '{{ addslashes($msg->email) }}', '{{ addslashes($msg->message) }}', '{{ $msg->created_at->format('d M Y, H:i') }}')" class="border border-[#3FA0F0] text-[#3FA0F0] hover:bg-[#3FA0F0] hover:text-white px-3 py-1 rounded-md text-xs font-medium transition-colors">
                                            Baca
                                        </button>
                                        
                                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus pesan dari {{ $msg->name }}?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="border border-[#E04F54] text-[#E04F54] hover:bg-[#E04F54] hover:text-white px-3 py-1 rounded-md text-xs font-medium transition-colors">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                    <p class="italic">Belum ada pesan masuk saat ini.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t-4 border-[#D8B4FE] bg-[#FBFBFB] p-4 flex justify-between items-center text-xs text-gray-500">
                <p>Menampilkan {{ $messages->count() }} dari {{ $messages->total() }} Pesan</p>
                <div class="flex items-center gap-1">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </main>

    <div id="modalBacaPesan" class="fixed inset-0 z-50 flex justify-end invisible opacity-0 transition-all duration-300">
        <div id="modalBacaBackdrop" class="absolute inset-0 bg-white/30 backdrop-blur-md cursor-pointer transition-opacity duration-300"></div>
        <div id="modalBacaPanel" class="relative w-full max-w-md bg-[#EBE4ED] h-full shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-out">
            <div class="flex items-center justify-between p-6 border-b border-[#D4C5D9] bg-[#EBE4ED]">
                <h2 class="text-xl font-bold text-[#8A1A9A]">Detail Pesan</h2>
                <button id="btnCloseBacaModal" type="button" class="w-8 h-8 flex items-center justify-center rounded-full bg-white shadow-sm hover:bg-gray-100 text-gray-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-[#D4C5D9]">
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Dari</p>
                    <h3 id="baca_name" class="text-lg font-bold text-[#50155C]">Nama Pengirim</h3>
                    <a id="baca_email_link" href="#" class="text-sm text-[#3FA0F0] hover:underline flex items-center gap-2 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                        <span id="baca_email">email@contoh.com</span>
                    </a>
                </div>

                <div>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Dikirim Pada</p>
                    <p id="baca_time" class="text-sm font-medium text-gray-700 bg-[#E4DCE5] px-3 py-2 rounded-lg inline-block">Tanggal</p>
                </div>

                <div>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-2">Isi Pesan</p>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-[#D4C5D9]">
                        <p id="baca_message" class="text-gray-700 leading-relaxed whitespace-pre-wrap text-sm">Isi pesan...</p>
                    </div>
                </div>
            </div> 

            <div class="p-6 border-t border-[#D4C5D9] bg-[#EBE4ED]">
                <a id="btn_balas_email" href="#" class="w-full flex items-center justify-center gap-2 bg-[#8A1A9A] hover:bg-purple-600 text-white font-bold py-3 rounded-xl transition-colors shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" /></svg>
                    Balas via Email
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const modalBaca = document.getElementById('modalBacaPesan');
        const panelBaca = document.getElementById('modalBacaPanel');

        // Fungsi buka modal baca
        function openBacaModal(name, email, message, time) {
            // Isi data ke dalam modal
            document.getElementById('baca_name').innerText = name;
            document.getElementById('baca_email').innerText = email;
            document.getElementById('baca_time').innerText = time;
            document.getElementById('baca_message').innerText = message;
            
            // Set link mailto otomatis
            document.getElementById('baca_email_link').href = 'mailto:' + email;
            document.getElementById('btn_balas_email').href = 'mailto:' + email + '?subject=Balasan dari Aubira Purplora';

            // Animasi masuk modal (Slide dari kanan)
            modalBaca.classList.remove('invisible', 'opacity-0');
            modalBaca.classList.add('opacity-100');
            setTimeout(() => { 
                panelBaca.classList.remove('translate-x-full'); 
                panelBaca.classList.add('translate-x-0'); 
            }, 10);
        }

        // Fungsi tutup modal
        function closeBacaModal() {
            panelBaca.classList.remove('translate-x-0'); 
            panelBaca.classList.add('translate-x-full');
            modalBaca.classList.remove('opacity-100'); 
            modalBaca.classList.add('opacity-0');
            setTimeout(() => { 
                modalBaca.classList.add('invisible'); 
            }, 300);
        }

        // Event listener tombol tutup
        document.getElementById('btnCloseBacaModal').addEventListener('click', closeBacaModal);
        document.getElementById('modalBacaBackdrop').addEventListener('click', closeBacaModal);
    </script>
@endpush