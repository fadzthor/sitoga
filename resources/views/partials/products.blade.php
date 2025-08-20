 <!--==================== PRODUK POPULER ====================-->
 {{-- <section class="product section container" id="products"> --}}
     <section class="product section container">
     <h2 class="section__title-center">
         Produk Olahan Populer
     </h2>
     <p class="product__description">
         Produk-produk hasil olahan dari tanaman toga, siap dipesan dan dikonsumsi sebagai solusi sehat alami.
     </p>
     <div class="product__container grid">
         @foreach ($featuredProducts as $product)
             <article class="product__card">
                 <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('images/placeholder-product.jpg') }}"
                     alt="{{ $product->name }}" class="product__img"
                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                 <h3 class="product__title">{{ $product->name }}</h3>
                 <span class="product__price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                 @if ($product->slug)
                      <a href="{{ route('products.show', $product->slug) }}" class="button--flex product__button">
                     <i class="ri-eye-line"></i>
                 </a>
                 @endif
             </article>
         @endforeach
     </div>
     <!-- Bungkus tombol dengan div flex dan center alignment -->
     <div class="product__description">
         <a href="{{ route('products.index') }}" class="button--link button--flex">
             Telusuri Produk<i class="ri-arrow-right-up-line button__icon"></i>
         </a>
     </div>
 </section>
