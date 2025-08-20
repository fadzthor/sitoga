<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Kirim email dengan konten langsung, tanpa pakai view
        Mail::raw("Pesan dari: {$data['email']}\n\n{$data['message']}", function ($mail) use ($data) {
            $mail->from($data['email']);
            $mail->to('kesuma@gmail.com')->subject($data['subject']);
        });

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}