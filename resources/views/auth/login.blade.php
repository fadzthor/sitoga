<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Literasi Toga – Login</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #B4C4BA;
        }

        /* Header simple dengan rounded‑bottom & shadow */
        .simple-header {
            background-color: #f5fff9;
            /* background-image: url('/images/brush.jpeg');
      background-blend-mode: multiply;
      background-size: cover; */
            border-bottom-left-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="flex flex-col items-center font-sans overflow-x-hidden">

    <!-- HEADER -->
    <header class="w-full max-w-md simple-header pt-8 pb-6 px-6 text-center">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-2">
                <span class="w-2 h-2 bg-[#2F4538] rounded-full"></span>
                <span class="w-2 h-2 bg-[#325749] rounded-full"></span>
                <span class="w-2 h-2 bg-[#7EA79B] rounded-full"></span>
            </div>
            <div class="absolute inset-x-0 top-4 flex justify-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Literasi Toga"
                        class="w-32 opacity-80 hover:opacity-100 transition-opacity" />
                </a>
            </div>
            <div class="flex space-x-2">
                <span class="w-2 h-2 bg-[#7EA79B] rounded-full"></span>
                <span class="w-2 h-2 bg-[#325749] rounded-full"></span>
                <span class="w-2 h-2 bg-[#2F4538] rounded-full"></span>
            </div>
        </div>
        <h1 class="text-xl sm:text-2xl font-bold text-[#325749] leading-snug">
            Selamat Datang di Portal

        </h1>
        <p>Literasi Tanaman Obat Keluarga (Si Toga)</p>
    </header>

    <!-- MAIN LOGIN -->
    <main class="w-full max-w-md -mt-4 mx-4 sm:mx-auto rounded-t-xl shadow-sm overflow-hidden">
        <div class="px-6 pt-12 pb-8 text-center">
            <h2 class="text-2xl font-bold text-[#325749]">Masuk</h2>
            <p class="text-sm mt-2 text-[#325749]">Silahkan masuk dengan akun untuk lanjut</p>
            <div class="w-16 h-0.5 bg-[#325749] mx-auto mt-2 mb-6"></div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <input type="email" name="email" id="email" required placeholder="Alamat E-Mail"
                    class="w-full py-3 bg-[#7EA79B] placeholder-[#325749] text-[#325749] text-center rounded-full focus:ring-2 focus:ring-[#325749]/50 outline-none" />
                <input type="password" name="password" id="password" required placeholder="Kata Sandi"
                    class="w-full py-3 bg-[#7EA79B] placeholder-[#325749] text-[#325749] text-center rounded-full focus:ring-2 focus:ring-[#325749]/50 outline-none" />

                <button type="submit"
                    class="w-full py-3 bg-[#325749] text-white font-semibold rounded-full hover:bg-[#254238] transition">
                    Masuk
                </button>
            </form>

            <p class="mt-6 text-sm text-[#325749]">
                Belum punya akun?
                <a href="{{ route('register') }}" class="underline hover:text-[#254238] font-medium">Daftar di sini</a>
            </p>
            {{-- <p class="mt-4 text-sm">
                <a href="#" class="underline hover:text-[#254238]">Lupa Sandi?</a>
            </p> --}}
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="w-full max-w-md mx-4 sm:mx-auto py-4 text-center text-[#325749]">
        <p class="text-sm font-semibold">Literasi Tanaman Obat<br />Keluarga (Si TOGA)</p>
    </footer>

</body>

</html>
