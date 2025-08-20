<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Literasi Toga – {{ $article->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#325749'
                    }
                }
            },
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
    <!-- Header with torn edge -->
    <header class="w-full max-w-md mx-auto" id="top">
        <div class="torn-edge relative">
            @if ($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                    class="w-full h-40 object-cover rounded-b-xl">
            @else
                <div class="w-full h-40 bg-gray-200 rounded-b-xl"></div>
            @endif
            <div class="absolute inset-x-0 top-4 flex justify-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Literasi Toga"
                        class="w-32 opacity-80 hover:opacity-100 transition-opacity" />
                </a>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="w-full max-w-md mx-auto px-4 py-6 text-center">
        <h1 class="text-2xl font-bold mb-2">{{ $article->title }}</h1>
        <p class="text-sm italic text-gray-600 dark:text-gray-300 mb-4">
            Oleh {{ $article->author->name }}
            @if ($article->published_at)
                • {{ $article->published_at->format('d M Y') }}
            @endif
        </p>
        <article
            class="custom-scroll bg-[#7ea79b] bg-opacity-80 dark:bg-gray-800 rounded-xl p-4 pr-5 text-justify text-white dark:text-gray-200 text-sm sm:text-base leading-relaxed max-h-[60vh] overflow-y-auto shadow-lg">
            {!! nl2br(e($article->content)) !!}
        </article>
    </main>

    <!-- Footer Buttons -->
    <footer class="w-full max-w-md mx-auto px-4 py-6">
        <div class="flex justify-between space-x-4">
            <!-- Back -->
            <button onclick="history.back()"
                class="flex-1 flex items-center justify-center bg-[#4e6a5e] hover:bg-[#3b5248] text-white rounded-full px-4 py-3 shadow-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </button>
            <!-- Share -->
            <button onclick="document.getElementById('shareModal').classList.remove('hidden')"
                class="flex-1 flex items-center justify-center bg-[#5d786b] hover:bg-[#446057] text-white rounded-full px-4 py-3 shadow-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 8a3 3 0 103-3m0 0l3.5 3.5M18 5.5l-7.5 7.5M6 21l12-12" />
                </svg>
                Bagikan
            </button>
        </div>
    </footer>

    <!-- Share Modal -->
    <div id="shareModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 w-11/12 max-w-sm p-6 rounded-lg text-center relative shadow-xl">
            <button onclick="document.getElementById('shareModal').classList.add('hidden')"
                class="absolute top-2 right-3 text-gray-600 dark:text-gray-300 text-lg">&times;</button>
            <h2 class="text-lg font-semibold mb-2 text-primary dark:text-white">Bagikan Artikel Ini</h2>
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

    <!-- Scripts -->
    <script>
        const toggleThemeBtn = document.getElementById('toggleTheme');
        toggleThemeBtn.addEventListener('click', () => {
            const html = document.documentElement;
            html.classList.toggle('dark');
            localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
        });
        // Load saved theme
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>

</html>
