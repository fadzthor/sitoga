<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'stock',
        'order_link',
        'description',
        'photo',
        'view_count',
    ];
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price'       => 'decimal:2',
        'stock'       => 'integer',
        'view_count'  => 'integer',
    ];

    /**
     * Use `slug` for route model binding instead of `id`.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Automatically generate slug from name if not provided.
     */
    protected static function booted()
    {
        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
    // contoh relasi jika product memiliki testimonial
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
