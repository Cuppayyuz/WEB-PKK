<aside class="w-64 bg-[#50155C] text-white flex flex-col shrink-0 transition-all">
    <div class="h-20 flex items-center px-6 border-b border-white/10 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-[#E5C3C6] rounded-full flex items-center justify-center shrink-0 shadow-inner">
                <span class="text-[#50155C] font-bold text-lg font-serif">AP</span>
            </div>
            <div>
                <h2 class="font-serif text-lg leading-tight tracking-wide">Aubira Purplora</h2>
                <p class="text-[10px] text-gray-300 italic">Dashboard Admin</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-white px-4 py-3 rounded-xl font-medium transition-all 
                {{ request()->routeIs('admin.dashboard') ? 'bg-[#A41DF0] shadow-md' : 'hover:bg-[#A41DF0]/50' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
            Dashboard
        </a>
        <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 text-white px-4 py-3 rounded-xl font-medium transition-all 
                {{ request()->routeIs('admin.orders') ? 'bg-[#A41DF0] shadow-md' : 'hover:bg-[#A41DF0]/50' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            Orders
        </a>
        <a href="{{ route('admin.kategori') }}" class="flex items-center gap-3 text-white px-4 py-3 rounded-xl font-medium transition-all 
                {{ request()->routeIs('admin.kategori') ? 'bg-[#A41DF0] shadow-md' : 'hover:bg-[#A41DF0]/50' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            Kategori
        </a>
        <a href="{{ route('admin.labels.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.labels.*') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                </path>
            </svg>
            <span class="font-medium">Labels</span>
        </a>

        <a href="{{ route('admin.variants.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.variants.*') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            <span class="font-medium">Variants</span>
        </a>
        <div class="p-4 mt-auto border-t border-white/10">
    
    </nav>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="w-full flex items-center gap-3 px-4 py-3 text-red-600 hover:text-white hover:bg-red-400 rounded-lg transition-colors mb-2">

            <div class="ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            </div>

            <span class="font-medium text-sm ml-2">Keluar Admin</span>
        </button>
    </form>
</div>
</aside>
