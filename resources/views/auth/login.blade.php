<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Aubira</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#540863] h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-96">
        <h2 class="text-2xl font-bold text-[#540863] mb-6 text-center">Portal Aubira</h2>
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-[#8A1A9A] focus:border-[#8A1A9A] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-[#8A1A9A] focus:border-[#8A1A9A] outline-none">
            </div>
            
            @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <button type="submit" class="w-full bg-[#8A1A9A] hover:bg-[#6C157E] text-white py-2 rounded-lg font-bold transition">Masuk</button>
        </form>
    </div>
</body>
</html>