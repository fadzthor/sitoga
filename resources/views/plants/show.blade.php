<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Literasi Toga – {{ $plant->local_name }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#325749',
                    }
                }
            }
        }
    </script>
    <style>
        .torn-edge {
            position: relative;
            overflow: hidden;
        }

        .torn-edge::after {
            content: "";
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
            background-color: var(--edge-color);
            clip-path: polygon(0 60%, 5% 70%, 8% 55%, 13% 75%, 18% 60%, 24% 85%, 30% 58%,
                    35% 75%, 42% 50%, 47% 78%, 50% 55%, 60% 82%, 65% 63%, 70% 80%,
                    75% 58%, 80% 70%, 85% 55%, 90% 70%, 95% 50%, 100% 75%,
                    100% 100%, 0 100%);
            z-index: 1;
        }

        :root {
            --edge-color: #b4c4ba;
        }

        .dark {
            --edge-color: #1f2937;
        }

        .custom-scroll::-webkit-scrollbar {
            width: 1px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-[#b4c4ba] dark:bg-gray-900 text-primary dark:text-white min-h-screen font-sans">
    <!-- toggle & scroll-up -->
    <div class="fixed bottom-6 right-6 flex flex-col items-center gap-3 z-50">
        <button id="toggleTheme"
            class="bg-white dark:bg-gray-700 text-gray-800 dark:text-white p-3 rounded-full shadow-lg hover:scale-110 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m8.66-10h-1M4.34 12H3m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M12 5a7 7 0 100 14a7 7 0 000-14z" />
            </svg>
        </button>
        <a href="#top" class="bg-[#325749] text-white p-3 rounded-full shadow-lg hover:bg-[#203830] transition"
            title="Kembali ke Atas">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </a>
    </div>
    <header class="w-full max-w-md mx-auto">
        <div class="torn-edge relative">
            <img src="{{ $plant->photo ? asset('storage/' . $plant->photo) : 'https://placehold.co/600x300?text=No+Image' }}"
                alt="{{ $plant->local_name }}" class="w-full h-40 object-cover rounded-b-xl">
            <div class="absolute inset-x-0 top-4 flex justify-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Literasi Toga"
                        class="w-32 opacity-80 hover:opacity-100 transition-opacity" />
                </a>
            </div>
        </div>
    </header>

    <main class="w-full max-w-md mx-auto px-4 py-6 text-center">
        <h1 class="text-2xl font-bold mb-1">{{ $plant->local_name }}</h1>
        @if ($plant->scientific_name)
            <p class="text-sm italic text-gray-600 dark:text-gray-300 mb-4">{{ $plant->scientific_name }}</p>
        @endif

        <article
            class="custom-scroll bg-[#7ea79b] bg-opacity-80 dark:bg-gray-800 rounded-xl p-4 pr-5 text-justify text-white dark:text-gray-200 text-sm sm:text-base leading-relaxed max-h-[50vh] overflow-y-auto">
            {!! nl2br(e($plant->description ?? $plant->benefits . "\n\n" . $plant->processing)) !!}
        </article>
    </main>

    <footer class="w-full max-w-md mx-auto px-4 py-6">
        <div class="flex justify-between space-x-4">
            <!-- Kembali -->
            <button onclick="history.back()" aria-label="Kembali"
                class="flex-1 flex items-center justify-center bg-[#4e6a5e] hover:bg-[#3b5248] text-white rounded-full px-4 py-3 shadow-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

<!-- Order -->
@if ($plant->products->count())
    <button
        type="button"
        aria-label="Lihat Produk"
        class="flex-1 flex items-center justify-center bg-[#3e5f4f] hover:bg-[#2e483c] text-white rounded-full px-4 py-3 shadow-lg transition-colors"
        onclick="document.getElementById('productModal').classList.remove('hidden')"
    >
        {{-- Heroicon: Information Circle --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M18 10A8 8 0 112 10a8 8 0 0116 0zm-9-4a1 1 0 112 0 1 1 0 01-2 0zm1 2a1 1 0 00-1 1v4a1 1 0 102 0v-4a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
    </button>
@else
    <div class="flex-1"></div>
@endif


            <!-- Share -->
            <button type="button" aria-label="Share"
                class="flex-1 flex items-center justify-center bg-[#5d786b] hover:bg-[#446057] text-white rounded-full px-4 py-3 shadow-lg transition-colors"
                onclick="document.getElementById('shareModal').classList.remove('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 8a3 3 0 103-3m0 0 3.5 3.5M18 5.5l-7.5 7.5M6 21l12-12" />
                </svg>
            </button>
        </div>
    </footer>

    <!-- Modal Produk -->
    @if ($plant->products->count())
        <div id="productModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div
                class="bg-white dark:bg-gray-800 w-11/12 max-w-md p-6 rounded-xl relative shadow-xl max-h-[80vh] overflow-y-auto">
                <button onclick="document.getElementById('productModal').classList.add('hidden')"
                    class="absolute top-2 right-3 text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white text-lg">&times;</button>
                <h2 class="text-xl font-semibold text-center mb-4 text-primary dark:text-white">Produk Olahan Terkait
                </h2>
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($plant->products as $product)
                        <div class="bg-[#f0f4f2] dark:bg-gray-700 rounded-xl p-4 flex items-center space-x-4">
                            <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('images/placeholder-product.jpg') }}"
                                alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-md">
                            <div class="flex-1">
                                <h3 class="text-base font-bold text-[#203830] dark:text-white">{{ $product->name }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('products.show', $product->slug) }}"
                                class="text-white bg-primary hover:bg-[#203830] rounded-full px-3 py-1 text-sm">
                                Lihat
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Modal Share -->
    <div id="shareModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 w-80 p-6 rounded-lg text-center relative shadow-xl">
            <button onclick="document.getElementById('shareModal').classList.add('hidden')"
                class="absolute top-2 right-3 text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white text-lg">&times;</button>
            <h2 class="text-lg font-semibold mb-2 text-primary dark:text-white">Bagikan Halaman Ini</h2>
            <p class="text-sm text-gray-600 dark:text-gray-300 break-all mb-3">{{ url()->current() }}</p>
            <div class="flex justify-center mb-4">
                <img src="https://api.qrserver.com/v1/create-qr-code?size=150x150&data={{ urlencode(url()->current()) }}"
                    alt="QR Code" class="w-36 h-36 mx-auto" />
            </div>
            <button onclick="navigator.clipboard.writeText('{{ url()->current() }}').then(()=>alert('URL disalin!'))"
                class="bg-primary text-white px-4 py-2 rounded-full hover:bg-[#203830] transition-colors">
                Salin URL
            </button>
        </div>
    </div>

    <script>
        const toggleThemeBtn = document.getElementById('toggleTheme');
        toggleThemeBtn.addEventListener('click', () => {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                html.classList.add('dark');
                localStorage.theme = 'dark';
            }
        });

        // Load theme preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>

</html>
