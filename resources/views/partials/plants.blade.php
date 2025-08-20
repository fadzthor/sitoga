 <!--==================== TANAMAN POPULER ====================-->
 <section class="product section container" id="collection">
     <h2 class="section__title-center">
         Tanaman Unggulan
     </h2>
     <p class="product__description">
         Berikut adalah beberapa tanaman unggulan dari agrowisata kami, dengan manfaat herbal pilihan.
     </p>
     <div class="product__container grid">
         @foreach ($featuredPlants as $plant)
             <article class="product__card">
                 <img src="{{ $plant->photo ? asset('storage/' . $plant->photo) : asset('images/placeholder-plant.jpg') }}"
                     alt="{{ $plant->local_name }}" class="product__img"
                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                 <h3 class="product__title">{{ $plant->local_name }}</h3>
                 <a href="{{ route('plants.show', $plant->slug) }}" class="button--flex product__button">
                     <i class="ri-eye-line"></i>
                 </a>
             </article>
         @endforeach
     </div>
     <!-- Bungkus tombol dengan div flex dan center alignment -->
     <div class="product__description">
         <a href="{{ route('plants.index') }}" class="button--link button--flex">
             Koleksi Tanaman<i class="ri-arrow-right-up-line button__icon"></i>
         </a>
     </div>
 </section>
