{{-- resources/views/plants/show.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Literasi Toga – {{ $plant->local_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            background: #b4c4ba;
            clip-path: polygon(0 60%, 5% 70%, 8% 55%, 13% 75%, 18% 60%, 24% 85%, 30% 58%,
                    35% 75%, 42% 50%, 47% 78%, 50% 55%, 60% 82%, 65% 63%, 70% 80%,
                    75% 58%, 80% 70%, 85% 55%, 90% 70%, 95% 50%, 100% 75%,
                    100% 100%, 0 100%);
        }

        .custom-scroll::-webkit-scrollbar {
            width: 6px;
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

<body class="bg-[#b4c4ba] min-h-screen flex flex-col items-center font-sans overflow-x-hidden">

    <header class="w-full max-w-md mx-4 sm:mx-auto">
        <div class="torn-edge relative">
            <img src="{{ $plant->photo ? asset('storage/' . $plant->photo) : 'https://placehold.co/600x300?text=No+Image' }}"
                alt="{{ $plant->local_name }}" class="w-full h-32 sm:h-40 object-cover rounded-b-xl" />
            <div class="absolute inset-x-0 top-4 flex justify-center pointer-events-none">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Literasi Toga" class="w-32 opacity-80" />
            </div>
        </div>
    </header>

    <main class="w-full max-w-md mx-4 sm:mx-auto px-4 py-6 text-center text-[#325749]">
        <h1 class="text-2xl font-bold mb-1">{{ $plant->local_name }}</h1>
        @if ($plant->scientific_name)
            <p class="text-sm italic text-gray-600 mb-4">{{ $plant->scientific_name }}</p>
        @endif

        <article
            class="custom-scroll bg-[#7ea79b] bg-opacity-80 rounded-xl p-4 pr-5 text-justify text-white text-sm sm:text-base leading-relaxed max-h-[50vh] overflow-y-auto shadow-lg scroll-smooth">
            {!! nl2br(e($plant->description ?? $plant->benefits . "\n\n" . $plant->processing)) !!}
        </article>
    </main>

    <footer class="w-full max-w-md mx-4 sm:mx-auto px-4 py-6">
        <div class="flex justify-between space-x-4">
            {{-- Kembali --}}
            <button onclick="history.back()" aria-label="Kembali"
                class="flex-1 flex items-center justify-center bg-[#4e6a5e] hover:bg-[#3b5248] text-white rounded-full px-4 py-3 shadow-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            {{-- Order --}}
            @if ($plant->e_commerce_url)
                <a href="{{ $plant->e_commerce_url }}" target="_blank" aria-label="Order"
                    class="flex-1 flex items-center justify-center bg-[#3e5f4f] hover:bg-[#2e483c] text-white rounded-full px-4 py-3 shadow-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h14l-1.35 6.773A2 2 0 0117.662 22H8.338a2 2 0 01-1.988-2.227L5 6H3" />
                    </svg>
                </a>
            @else
                <div class="flex-1"></div>
            @endif

            {{-- Share --}}
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
        <p class="mt-6 text-center text-[#203830] font-semibold text-sm">
                Literasi Tanaman Obat<br />Keluarga (Si TOGA)
            </p>
    </footer>

    {{-- Modal Share --}}
    <div id="shareModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-80 p-6 rounded-lg text-center relative shadow-xl">
            <button onclick="document.getElementById('shareModal').classList.add('hidden')"
                class="absolute top-2 right-3 text-gray-600 hover:text-black text-lg">&times;</button>

            <h2 class="text-lg font-semibold mb-2 text-[#325749]">Bagikan Halaman Ini</h2>
            <p class="text-sm text-gray-600 break-all mb-3">{{ url()->current() }}</p>

            <div class="flex justify-center mb-4">
                <img src="https://api.qrserver.com/v1/create-qr-code?size=150x150&data={{ urlencode(url()->current()) }}"
                    alt="QR Code" class="w-36 h-36 mx-auto" />
            </div>

            <button onclick="navigator.clipboard.writeText('{{ url()->current() }}').then(()=>alert('URL disalin!'))"
                class="bg-[#325749] text-white px-4 py-2 rounded-full hover:bg-[#203830] transition-colors">
                Salin URL
            </button>
        </div>
    </div>

</body>

</html>
