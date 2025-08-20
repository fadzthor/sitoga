<section class="product section container" id="education">
    <h2 class="section__title-center">
        Artikel & Edukasi
    </h2>
    <p class="product__description">
        Artikel rutin seputar kesehatan herbal, tips tanaman obat keluarga, tutorial menanam herbal sendiri di
        rumah, jurnal ringan, dan pengalaman pengunjung.
    </p>
    <div class="product__container grid">
        @foreach ($articles as $article)
            <article class="product__card">
                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                        class="product__img"
                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 0;">
                @else
                    <div class="product__img bg-gray-200 flex items-center justify-center"
                        style="width: 150px; height: 150px; border-radius: 0;">
                        <i class="ri-file-text-line text-3xl text-gray-400"></i>
                    </div>
                @endif

                <h3 class="product__title">{{ \Illuminate\Support\Str::limit($article->title, 50) }}</h3>
                @if ($article->published_at)
                    <span class="text-xs text-gray-600 block mb-2">
                        {{ $article->published_at->format('d M Y') }}
                    </span>
                @endif

                <a href="{{ route('articles.show', $article) }}" class="button--flex product__button">
                    <i class="ri-arrow-right-up-line"></i>
                </a>
            </article>
        @endforeach
    </div>

    <div class="product__description mt-6">
        <a href="{{ route('articles.index') }}" class="button--link button--flex">
            Telusuri Semua Artikel <i class="ri-arrow-right-up-line button__icon"></i>
        </a>
    </div>
</section>