<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'schedule',
        'price',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
