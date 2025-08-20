  <div class="product section container partners-section" id="partners">
      <h2 class="section__title-center">Mitra & Kolaborator</h2>
      <p class="product__description">
          Berikut adalah mitra dan kolaborator Agrowisata Herbal Kesuma Bangsa dalam membangun ekosistem sehat dan
          edukatif.
      </p>

      <div class="swiper partner-swiper">
          <div class="swiper-wrapper">
              @foreach ($partners as $partner)
                  <div class="swiper-slide">
                      <div class="partner-card">
                          <a href="{{ $partner->website_url }}" target="_blank">
                              <img src="{{ $partner->logo ? asset('storage/' . $partner->logo) : asset('images/placeholder-partner.jpg') }}"
                                  alt="{{ $partner->name }}" class="partner-logo">
                          </a>
                          <h3 class="partner-name">{{ $partner->name }}</h3>
                      </div>
                  </div>
              @endforeach
          </div>

          <!-- Navigasi -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
      </div>
  </div>
