<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'date'        => 'required|date|after_or_equal:today',
            'pax'         => 'required|integer|min:1',
        ]);

        $data['user_id'] = Auth::id();
        $data['status']  = 'pending';

        Booking::create($data);

        return back()->with('success', 'Reservasi berhasil dibuat! Kami akan segera konfirmasi.');
    }
}
