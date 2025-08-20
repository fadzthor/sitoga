{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literasi Toga</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <style>
        /* Estetik untuk partner card */
        .partner-card {
            border-radius: 1rem;
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .partner-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin: 0 auto 1rem;
            transition: transform 0.3s ease;
        }

        .partner-card:hover .partner-logo {
            transform: scale(1.05);
        }

        .partner-name {
            font-size: 1rem;
            font-weight: 600;
            /* color: #ffffff; */
            margin-bottom: 0.5rem;
        }

        .partner-button {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.85rem;
            color: #fff;
            background-color: #325749;
            padding: 0.5rem 0.75rem;
            border-radius: 2rem;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .partner-button:hover {
            background-color: #203830;
        }

        /* Jarak tambahan untuk section partners */
        .partners-section {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        /* Spasi dan padding section partners */
        .partners-section {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        /* Swiper padding bawah agar pagination tidak mepet */
        .swiper.partner-swiper {
            padding-bottom: 3rem;
        }

        /* Partner card tetap stylish */
        .partner-card {
            border-radius: 1rem;
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin: 0 0.5rem;
        }

        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .partner-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin: 0 auto 1rem;
            transition: transform 0.3s ease;
        }

        .partner-card:hover .partner-logo {
            transform: scale(1.05);
        }

        .partner-name {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Panah navigasi (ukuran kecil & warna) */
        .swiper-button-next,
        .swiper-button-prev {
            color: #203830 !important;
            font-size: 1.2rem !important;
            width: 30px;
            height: 30px;
            top: 45%;
        }

        .swiper-button-prev {
            left: -25px;
        }

        .swiper-button-next {
            right: -25px;
        }

        /* Pagination bullets (warna & spasi) */
        .swiper-pagination {
            bottom: -25px !important;
        }

        .swiper-pagination-bullet {
            background-color: #cbd5c0;
            opacity: 1;
            margin: 0 6px !important;
        }

        .swiper-pagination-bullet-active {
            background-color: #203830 !important;
        }

        .reservation__container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .reservation__content {
            display: flex;
            flex-direction: column;
        }

        .reservation__label {
            font-weight: 500;
            margin-bottom: .5rem;
        }

        .reservation__input {
            padding: .75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: .5rem;
        }

        .reservation__btns {
            grid-column: span 3;
            text-align: center;
            margin-top: 1rem;
        }

        @media (max-width: 640px) {
            .reservation__btns {
                grid-column: span 1;
            }
        }
    </style>

</head>

<body class="font-sans antialiased">

    {{-- Page Content --}}
    @yield('content')

    <!-- ScrollReveal (if you need it globally) -->
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const partnerSwiper = new Swiper(".partner-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
        const productSwiper = new Swiper(".product-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".product-swiper .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".product-swiper .swiper-button-next",
                prevEl: ".product-swiper .swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 4
                },
            },
        });
    </script>


</body>

</html>
