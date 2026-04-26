<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Aubira Purplora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('asset-css/admin.-style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#50155C',
                            light: '#8A1A9A',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#F8F9FA] text-gray-800 antialiased flex h-screen overflow-hidden">

    @include('partials.sidebar')

    @yield('content')

    @stack('scripts')
</body>

</html>