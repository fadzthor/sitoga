<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Literasi Toga – {{ $product->name }}</title>
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
            background-color: var(--edge-color);

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
            <img src="{{ $product->photo ? asset('storage/' . $product->photo) : 'https://placehold.co/600x300?text=No+Image' }}"
                alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-b-xl">
            <div class="absolute inset-x-0 top-4 flex justify-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Literasi Toga"
                        class="w-32 opacity-80 hover:opacity-100 transition-opacity" />
                </a>
            </div>
        </div>
    </header>

    <main class="w-full max-w-md mx-auto px-4 py-6 text-center">
        <h1 class="text-2xl font-bold mb-1">{{ $product->name }}</h1>
        @if ($product->price)
            <p class="text-sm italic text-gray-600 dark:text-gray-300 mb-4">Rp
                {{ number_format($product->price, 0, ',', '.') }}</p>
        @endif

        <article
            class="custom-scroll bg-[#7ea79b] bg-opacity-80 dark:bg-gray-800 rounded-xl p-4 pr-5 text-justify text-white dark:text-gray-200 text-sm sm:text-base leading-relaxed max-h-[50vh] overflow-y-auto">
            {{ $product->description ?? 'Belum ada deskripsi produk.' }}
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

            <!-- Testimoni Icon Button -->
            <button type="button" aria-label="Testimoni" class="flex-1 flex items-center justify-center bg-[#325749] hover:bg-[#203830] text-white rounded-full px-4 py-3 shadow-lg transition-colors" onclick="document.getElementById('testimonialModal').classList.remove('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M3 7v14l4-4h14V7H3z" />
                </svg>
            </button>

            <!-- Order/Icon if needed -->
            @if ($product->order_link)
                <a href="{{ $product->order_link }}"
                    class="flex-1 flex items-center justify-center bg-[#3e5f4f] hover:bg-[#2e483c] text-white rounded-full px-4 py-3 shadow-lg transition-colors"
                    aria-label="Order">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h14l-1.35 6.773A2 2 0 0117.662 22H8.338a2 2 0 01-1.988-2.227L5 6H3" />
                    </svg>
                </a>
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
        <p class="mt-4 text-center text-[#203830] dark:text-gray-300 font-semibold text-sm">
            Literasi Tanaman Obat<br />Keluarga (Si TOGA)
        </p>
    </footer>

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

    <!-- Modal Testimonial -->
    <div id="testimonialModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div
            class="bg-white dark:bg-gray-800 w-11/12 max-w-lg p-6 rounded-xl shadow-xl relative max-h-[80vh] overflow-y-auto">
            <button onclick="document.getElementById('testimonialModal').classList.add('hidden')"
                class="absolute top-3 right-4 text-gray-600 dark:text-gray-300 text-xl">&times;</button>

            <h2 class="text-xl font-semibold text-center mb-4">Testimoni Pengguna</h2>
            <div class="space-y-4 mb-6">
                @foreach ($product->testimonials as $t)
                    <div class="border-b pb-3">
                        <p class="font-medium">{{ $t->user->name }}</p>
                        <p class="text-sm text-gray-700 dark:text-gray-300">{{ $t->content }}</p>
                        @if ($t->photo)
                            <img src="{{ asset('storage/' . $t->photo) }}" alt="Testimoni Foto"
                                class="mt-2 rounded w-32 h-32 object-cover mx-auto" />
                        @endif
                    </div>
                @endforeach

            </div>

            <!-- Always-visible button -->
            <button
                onclick="(function(){
                @guest
window.location='{{ route('login') }}';
                @else
                    document.getElementById('addTestimonialForm').classList.toggle('hidden'); @endguest
            })()"
                class="w-full bg-[#325749] hover:bg-[#203830] text-white py-2 rounded mb-4 transition">
                Tambah Testimoni
            </button>

            <!-- Only authenticated users see the form -->
            @auth
                <form id="addTestimonialForm" action="{{ route('testimonials.store') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-4 hidden">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div>
                        <label class="block text-sm font-medium mb-1">Isi Testimoni</label>
                        <textarea name="content" required class="w-full p-2 border rounded "></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Foto (opsional)</label>
                        <input type="file" name="photo" accept="image/*" class="w-full" />
                    </div>
                    <button type="submit"
                        class="w-full bg-[#325749] hover:bg-[#203830] text-white py-2 rounded transition">
                        Kirim Testimoni
                    </button>
                </form>
            @endauth
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

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>

</html>
