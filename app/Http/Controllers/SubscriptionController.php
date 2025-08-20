<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Tangani request subscribe newsletter.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email'         => $data['email'],
            'subscribed_at' => now(),
        ]);

        return back()->with('success', 'Nantikan informasi terbaru dari kami!');
    }
}
