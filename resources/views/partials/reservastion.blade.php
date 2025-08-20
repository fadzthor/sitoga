<div class="product section container" id="reservasi">
    <h2 class="section__title-center">Reservasi Kunjungan</h2>
    <p class="product__description">
        Pilih aktivitas edukasi, tanggal kunjungan, dan jumlah pengunjung.
    </p>

    @guest
            <div class="reservation__btns">
            <a href="{{ route('login') }}" class="button button--flex">
                <i class="ri-login-box-line button__icon"></i> Masuk untuk Reservasi
            </a>
        </div>
    @else
        @if (session('success'))
            <div class="alert alert-success text-center mb-6">{{ session('success') }}</div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST" class="reservation__container">
            @csrf

            {{-- Pilih Aktivitas --}}
            <div class="reservation__content">
                <label class="reservation__label" for="activity_id">Aktivitas</label>
                <select name="activity_id" id="activity_id" class="reservation__input" required>
                    <option value="" disabled selected>-- Pilih Aktivitas --</option>
                    @foreach (\App\Models\Activity::all() as $act)
                        <option value="{{ $act->id }}" {{ old('activity_id') == $act->id ? 'selected' : '' }}>
                            {{ $act->title }} ({{ \Illuminate\Support\Str::title($act->type) }})
                            – Rp {{ number_format($act->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('activity_id')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div class="reservation__content">
                <label class="reservation__label" for="date">Tanggal</label>
                <input type="date" name="date" id="date" class="reservation__input"
                    min="{{ now()->format('Y-m-d') }}" value="{{ old('date', now()->format('Y-m-d')) }}" required>
                @error('date')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jumlah Orang --}}
            <div class="reservation__content">
                <label class="reservation__label" for="pax">Jumlah Orang</label>
                <input type="number" name="pax" id="pax" class="reservation__input" min="1"
                    value="{{ old('pax', 1) }}" required>
                @error('pax')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Kirim --}}
            <div class="reservation__btns">
                <button type="submit" class="button button--flex">
                    <i class="ri-calendar-check-line button__icon"></i>
                    Kirim Reservasi
                </button>
            </div>
        </form>
    @endguest
</div>
