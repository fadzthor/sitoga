<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_name',
        'scientific_name',
        'slug',
        'photo',
        'benefits',
        'processing',
        'order_link',
        'view_count',
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Cast attributes to proper types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'view_count' => 'integer',
    ];

    /**
     * Use slug for front-end route binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Automatically generate slug from local_name if not provided.
     */
    protected static function booted()
    {
        static::creating(function (Plant $plant) {
            if (empty($plant->slug)) {
                $plant->slug = Str::slug($plant->local_name);
            }
        });
    }
}
