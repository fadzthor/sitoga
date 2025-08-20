<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="transition-colors duration-500">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Artikel & Edukasi – Literasi Toga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: { colors: { primary: '#325749' } } },
        };
    </script>
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-gradient-to-b from-[#dbece3] to-[#b4c4ba] dark:from-gray-900 dark:to-gray-800 text-[#203830] dark:text-gray-100 min-h-screen font-sans transition-colors duration-500">

    <!-- toggle & scroll-up -->
    <div class="fixed bottom-6 right-6 flex flex-col items-center gap-3 z-50">
        <button id="modeToggle" class="bg-white dark:bg-gray-700 text-gray-800 dark:text-white p-3 rounded-full shadow-lg hover:scale-110 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 3v1m0 16v1m8.66-10h-1M4.34 12H3m15.36 6.36l-.7-.7M6.34 6.34l-.7-.7m12.02 0l-.7.7M6.34 17.66l-.7.7M12 5a7 7 0 100 14a7 7 0 000-14z"/>
            </svg>
        </button>
        <a href="#" class="bg-[#325749] text-white p-3 rounded-full shadow-lg hover:bg-[#203830] transition" title="Kembali ke Atas">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </a>
    </div>

    <header class="w-full max-w-4xl mx-auto px-4 pt-10 text-center">
        <h1 class="text-3xl font-bold mb-2">Artikel & Edukasi</h1>
        <p class="text-sm text-[#325749] dark:text-gray-300 mb-8">
            Tips, jurnal ringan, dan cerita seputar kesehatan herbal & tanaman obat keluarga.
        </p>
        <form action="{{ route('articles.index') }}" method="GET" class="mb-8 max-w-md mx-auto">
    <input type="text" name="search" placeholder="Cari artikel..." value="{{ request('search') }}"
        class="w-full px-5 py-3 rounded-full border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#325749] shadow-md dark:bg-gray-700 dark:text-white">
</form>

    </header>

    <main class="w-full max-w-4xl mx-auto px-4 pb-20">
        @if($articles->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $article)
                    <a href="{{ route('articles.show', $article) }}"
                       class="bg-white dark:bg-gray-700 rounded-2xl shadow-md hover:shadow-xl transition p-5 flex flex-col">
                        @if($article->thumbnail)
                            <img src="{{ asset('storage/'.$article->thumbnail) }}"
                                 alt="{{ $article->title }}"
                                 class="w-full h-40 object-cover rounded-lg mb-4"/>
                        @endif
                        <h3 class="text-lg font-semibold text-[#325749] dark:text-white mb-2">
                            {{ \Illuminate\Support\Str::limit($article->title, 60) }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            Oleh {{ $article->author->name }}
                            @if($article->published_at)
                                • {{ $article->published_at->format('d M Y') }}
                            @endif
                        </p>
                        <p class="text-gray-700 dark:text-gray-200 flex-1">
                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                        </p>
                        <span class="mt-4 text-primary dark:text-yellow-400 font-medium">
                            Baca Selengkapnya &rarr;
                        </span>
                    </a>
                @endforeach
            </div>

            <div class="mt-10 flex justify-center">
                {{ $articles->withQueryString()->links() }}
            </div>
        @else
            <p class="text-center text-gray-700 dark:text-gray-300 text-lg font-medium">
                Belum ada artikel.
            </p>
        @endif
    </main>

    <footer class="w-full max-w-md mx-auto px-4 pb-10">
        <div class="flex justify-center">
            <a href="{{ url('/') }}" aria-label="Kembali"
                class="flex items-center justify-center bg-[#4e6a5e] hover:bg-[#3b5248] text-white rounded-full px-6 py-3 shadow-lg transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>
        <p class="mt-6 text-center text-[#203830] dark:text-gray-300 font-semibold text-sm">
            Literasi Tanaman Obat<br />Keluarga (Si TOGA)
        </p>
    </footer>
</body>

<script>
    const toggleBtn = document.getElementById('modeToggle');
    const html      = document.documentElement;
    toggleBtn.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
    });
    if (localStorage.theme==='dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        html.classList.add('dark');
    }
</script>
</html>
