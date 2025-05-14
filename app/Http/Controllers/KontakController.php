<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KontakMail;

class KontakController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Kirim email ke Gmail admin
        Mail::to('admin@gmail.com')->send(new KontakMail($validated));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim ke email admin.');
    }
}
