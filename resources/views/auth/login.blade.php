<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Super Admin - Aubira Purplora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi mengambang sederhana untuk background */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center relative overflow-hidden font-sans">

    <div class="absolute inset-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-[#F0BCD3] rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-[20%] right-[-5%] w-96 h-96 bg-[#D8B4FE] rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-80 h-80 bg-[#C3A9CD] rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 bg-white rounded-[2rem] shadow-2xl flex flex-col md:flex-row w-[90%] max-w-5xl min-h-[550px] overflow-hidden border border-white/50 backdrop-blur-sm">
        
        <div class="w-full md:w-1/2 bg-[#8A1A9A] text-white p-8 md:p-12 flex flex-col relative overflow-hidden">
            
            <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

            <div class="flex justify-between items-center text-[10px] font-bold tracking-widest uppercase opacity-80 mb-12">
                <span>Aubira Purplora</span>
                <span>Super Admin</span>
            </div>

            <div class="text-center mb-10 mt-auto">
                <h2 class="text-3xl font-extrabold tracking-wide mb-2">LOGIN</h2>
                <p class="text-sm font-medium tracking-widest opacity-80">WELCOME BACK!</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="w-full max-w-sm mx-auto space-y-5 mb-auto relative z-10">
                @csrf
                
                <div>
                    <input type="email" name="email" placeholder="Email" required 
                           class="w-full px-5 py-3.5 rounded-xl text-gray-800 bg-white border-none focus:ring-4 focus:ring-[#E5C3C6] outline-none shadow-inner transition-all placeholder-gray-400 text-sm font-medium">
                </div>
                
                <div>
                    <input type="password" name="password" placeholder="Password" required 
                           class="w-full px-5 py-3.5 rounded-xl text-gray-800 bg-white border-none focus:ring-4 focus:ring-[#E5C3C6] outline-none shadow-inner transition-all placeholder-gray-400 text-sm font-medium">
                </div>

                <div class="flex items-center justify-between text-xs font-medium px-1 pt-1">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-none text-[#50155C] focus:ring-0 focus:ring-offset-0 bg-white/20 checked:bg-[#50155C] transition-colors cursor-pointer">
                        <span class="ml-2 opacity-80 group-hover:opacity-100 transition-opacity">Remember me</span>
                    </label>
                    <a href="#" class="opacity-80 hover:opacity-100 hover:underline transition-all">Forgot password?</a>
                </div>
                
                @error('email')
                    <p class="text-red-300 text-xs text-center font-medium bg-red-900/30 py-2 rounded-lg">{{ $message }}</p>
                @enderror

                <button type="submit" class="w-full bg-[#50155C] hover:bg-[#3a0f44] text-white py-3.5 rounded-xl font-bold tracking-wide transition-all duration-300 shadow-lg hover:shadow-xl mt-6 transform hover:-translate-y-0.5">
                    Login
                </button>
            </form>
            
            <div class="absolute bottom-4 right-4 w-24 h-24 bg-white/5 rounded-full blur-xl pointer-events-none"></div>
        </div>

        <div class="hidden md:flex w-1/2 bg-white items-center justify-center p-12 relative">
            <img src="https://placehold.co/600x600/ffffff/8A1A9A?text=Masukkan+Ilustrasi+Disini" 
                 alt="Admin Dashboard Illustration" 
                 class="max-w-full h-auto drop-shadow-2xl hover:scale-105 transition-transform duration-500">
                 
            <div class="absolute bottom-8 text-center w-full text-xs text-gray-400 font-medium">
                Secure Access Portal &copy; 2026 Aubira Purplora
            </div>
        </div>

    </div>
</body>
</html>