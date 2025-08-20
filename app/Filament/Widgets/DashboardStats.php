<?php

namespace App\Filament\Widgets;

use App\Models\Plant;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Subscription;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [

            Card::make('Total Tanaman', Plant::count())
                ->description('Jumlah tanaman herbal')
                ->icon('heroicon-o-sparkles'),

            Card::make('Total Produk', Product::count())
                ->description('Jumlah produk herbal')
                ->icon('heroicon-o-shopping-bag'),

            Card::make('Total Mitra', Partner::count())
                ->description('Jumlah mitra agrowisata')
                ->icon('heroicon-o-user-group'),

            Card::make('News Letter', Subscription::count())
                ->description('Jumlah e-mail pelanggan')
                ->icon('heroicon-o-user-group'),

            Card::make('Artikel', Article::count())
                ->description('Jumlah artikel')
                ->icon('heroicon-o-newspaper'),
            Card::make('Reservasi', Booking::count())
                ->description('Jumlah reservasi')
                ->icon('heroicon-o-calendar'),
            Card::make('Testimoniaal', Testimonial::count())
                ->description('Jumlah Testimoni')
                ->icon('heroicon-o-calendar'),
        ];
    }
}
