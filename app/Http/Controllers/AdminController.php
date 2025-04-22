<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
        // Redirect langsung ke dashboard admin setelah login
        return redirect()->route('admin.profile');
    }

    return back()->with('error', 'Email atau password salah.');
}


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Invalidate session untuk keamanan tambahan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login admin setelah logout
        return redirect()->route('admin.login');
    }

    public function showProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function editProfile()
    {
        return view('admin.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'address' => 'nullable|string|max:255',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'password' => 'nullable|min:6|confirmed'
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
