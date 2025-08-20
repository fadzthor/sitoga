<footer class="footer section">
    <div class="footer__container container grid">
        <div class="footer__content">
            <a href="#" class="footer__logo">
                <i class="ri-leaf-line footer__logo-icon"></i> Kesuma Bangsa
            </a>
            <h3 class="footer__title">
                Langganan newsletter kami
            </h3>

            {{-- Subscription Form --}}
            <form action="{{ route('subscribe') }}" method="POST" class="footer__subscribe">
                @csrf

                {{-- Email Input --}}
                <input type="email" name="email" placeholder="Email Anda" class="footer__input"
                    value="{{ old('email') }}" required>

                {{-- Submit Button --}}
                <button type="submit" class="button button--flex footer__button">
                    Subscribe <i class="ri-arrow-right-up-line button__icon"></i>
                </button>
            </form>

            {{-- Feedback Messages --}}
            @if (session('success'))
                <p class="mt-2 text-sm text-green-600 text-center">{{ session('success') }}</p>
            @endif

            @error('email')
                <p class="mt-2 text-sm text-red-600 text-center">{{ $message }}</p>
            @enderror
        </div>


        <div class="footer__content">
            <h3 class="footer__title">Alamat</h3>
            <ul class="footer__data">
                <li class="footer__information">Argowisata Kesuma Bangsa</li>
                <li class="footer__information">Desa Pujorahayu</li>
                <li class="footer__information">Kec. Negeri Katon, Pesawaran</li>
                <li class="footer__information">Lampung, 35353</li>
                <div class="footer__social">
                    <a href="https://maps.app.goo.gl/CqRZaFQ3HTWUPYhx9" class="footer__social-link"><i
                            class="ri-map-pin-line"></i></a>
                </div>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Kontak</h3>
            <ul class="footer__data">
                <li class="footer__information">0896 xxxx xxxx</li>
                <li class="footer__information">info@kesumabangsaherbal.id</li>
                <div class="footer__social">
                    <a href="#" class="footer__social-link"><i class="ri-facebook-fill"></i></a>
                    <a href="#" class="footer__social-link"><i
                            class="ri-instagram-line"></i></a>
                </div>
            </ul>
        </div>
        <div class="footer__content">
            <h3 class="footer__title">Pengguna</h3>
            <div class="flex flex-col space-y-2">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="footer__information">
                        @csrf
                        <button type="submit"
                            class="footer__social-link flex items-center gap-2 text-current hover:text-[#325749] transition">
                            <i class="ri-logout-box-line text-xl"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                @else
                    <ul class="footer__data">
                        <li class="footer__information">
                            <a href="{{ route('login') }}"
                                class="footer__social-link flex items-center gap-2 text-current hover:text-[#325749] transition">
                                <i class="ri-login-box-line text-xl"></i>
                                <span>Masuk</span>
                            </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('register') }}"
                                class="footer__social-link flex items-center gap-2 text-current hover:text-[#325749] transition">
                                <i class="ri-user-add-line text-xl"></i>
                                <span>Daftar</span>
                            </a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </div>
    <p class="footer__copy">&#169; 2025 Kesuma Bangsa. All rights reserved</p>
</footer>
