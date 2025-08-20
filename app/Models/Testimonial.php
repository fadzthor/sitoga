<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// app/Models/Testimonial.php

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'photo',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Tambahkan ini:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
