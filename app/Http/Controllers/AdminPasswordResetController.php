<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use App\Models\Admin;

class AdminPasswordResetController extends Controller
{
    // Menampilkan halaman form permintaan reset password
    public function showRequestForm()
{
    return view('admin.passwords.email'); // Sekarang diarahkan ke resources/views/admin/passwords/email.blade.php
}

public function showResetForm($token)
{
    return view('admin.passwords.reset', ['token' => $token]); // Sekarang diarahkan ke resources/views/admin/passwords/reset.blade.php
}

    // Mengirim link reset password ke email (tanpa mengirim email sungguhan)
    public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:admins,email',
    ], [
        'email.exists' => 'Email tidak ditemukan dalam sistem kami.',
    ]);

    // Simpan token ke database
    $token = \Str::random(64);
    DB::table('password_resets')->updateOrInsert(
        ['email' => $request->email],
        ['token' => $token, 'created_at' => now()]
    );

    // Buat link reset password
    $resetLink = route('admin.password.reset', ['token' => $token]);

    return back()->with('status', "Link reset password telah dikirim. <br><a href='$resetLink' style='color: blue; text-decoration: underline;'>Klik di sini untuk mengatur ulang password</a>");
}


    // Menyimpan password baru ke database
    public function reset(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        // Cek apakah token valid
        $resetRequest = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$resetRequest) {
            return back()->withErrors(['email' => 'Token reset password tidak valid!']);
        }

        // Update password admin
        Admin::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        // Hapus token setelah password diubah
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('admin.login')->with('status', 'Password berhasil diubah! Silakan login dengan password baru.');
    }
}
