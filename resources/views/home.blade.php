{{-- resources/views/plants/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('partials.header')
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <img src="{{ asset('assets/img/home.png') }}" alt="Home" class="home__img">
                <div class="home__data">
                    <h1 class="home__title">
                        Agrowisata Tanaman Herbal <br> Kesuma Bangsa
                    </h1>
                    <p class="home__description">
                        Kebun edukasi 12 hektare di Desa Pujorahayu, Pesawaran, Lampung. Edukasi & riset tanaman obat sejak
                        2016.
                    </p>
                    <a href="#about" class="button button--flex">
                        Jelajahi <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>

                <div class="home__social">
                    <span class="home__social-follow">Ikuti Kami</span>

                    <div class="home__social-links">
                        <a href="#" target="_blank" class="home__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" target="_blank" class="home__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://maps.app.goo.gl/CqRZaFQ3HTWUPYhx9" target="_blank" class="home__social-link">
                            <i class="ri-map-pin-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.about')
        @include('partials.schedule')


        @include('partials.plants')
        @include('partials.products')
   
        @include('partials.facilities')       
        @include('partials.reservastion')
        @include('partials.partner')
       
        @include('partials.faqs')
        @include('partials.article')

        @include('partials.contact')
        @include('partials.footer')

        <!-- SCROLL UP -->
        <a href="#" class="scrollup" id="scroll-up"><i class="ri-arrow-up-fill scrollup__icon"></i></a>
    </main>
@endsection
