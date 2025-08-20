<section class="contact section container" id="contact">
    <div class="contact__container grid">
        <div class="contact__box">
            <h2 class="section__title">
                Hubungi Kami
            </h2>
            <div class="contact__data">
                <div class="contact__information">
                    <h3 class="contact__subtitle">Telepon</h3>
                    <span class="contact__description">
                        <i class="ri-phone-line contact__icon"></i>
                        (0896) xxxx xxxx
                    </span>
                </div>
                <div class="contact__information">
                    <h3 class="contact__subtitle">Email</h3>
                    <span class="contact__description">
                        <i class="ri-mail-line contact__icon"></i>
                        info@kesumabangsaherbal.id
                    </span>
                </div>
                <div class="contact__information">
                    <h3 class="contact__subtitle">Instagram</h3>
                    <span class="contact__description">
                        <i class="ri-instagram-line contact__icon"></i>
                        @kesumabangsaherbal
                    </span>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST" class="contact__form">
            @csrf
            <div class="contact__inputs">
                <div class="contact__content">
                    <input type="email" name="email" placeholder=" " class="contact__input"
                        value="{{ old('email') }}" required>
                    <label class="contact__label">Email</label>
                </div>
                <div class="contact__content">
                    <input type="text" name="subject" placeholder=" " class="contact__input"
                        value="{{ old('subject') }}" required>
                    <label class="contact__label">Subjek</label>
                </div>
                <div class="contact__content contact__area">
                    <textarea name="message" placeholder=" " class="contact__input" required>{{ old('message') }}</textarea>
                    <label class="contact__label">Pesan</label>
                </div>
            </div>
            <button class="button button--flex">
                Kirim Pesan <i class="ri-arrow-right-up-line button__icon"></i>
            </button>
        </form>
    </div>
</section>
