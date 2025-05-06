<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'password' => ['required', 'string'],
        ], [
            'email.exists' => 'Email tidak terdaftar sebagai admin.'
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Login berhasil!');
        }

        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['password' => 'Password yang dimasukkan salah.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('status', 'Anda telah logout.');
    }

    public function showProfile()
    {
        return view('admin.profile', [
            'admin' => Auth::guard('admin')->user()
        ]);
    }

    public function editProfile()
    {
        return view('admin.edit-profile', [
            'admin' => Auth::guard('admin')->user()
        ]);
    }

    public function updateProfilePicture(Request $request)
{
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $admin = auth()->guard('admin')->user();

    // Hapus foto lama jika ada
    if ($admin->profile_picture) {
        Storage::delete($admin->profile_picture);
    }

    // Simpan foto baru
    $path = $request->file('profile_picture')->store('profile_pictures', 'public');

    // Update di database
    $admin->profile_picture = $path;
    $admin->save();

    return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
}

public function updateProfile(Request $request)
{
    $admin = Auth::guard('admin')->user();

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:admins,email,' . $admin->id],
        'address' => ['nullable', 'string', 'max:255'],
        'birth_place' => ['nullable', 'string', 'max:255'],
        'birth_date' => ['nullable', 'date'],
        'password' => ['nullable', 'confirmed', Password::min(8)],
        'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
    ]);

    $updateData = [
        'name' => $validated['name'],
        'email' => $validated['email'],
        'address' => $validated['address'] ?? null,
        'birth_place' => $validated['birth_place'] ?? null,
        'birth_date' => $validated['birth_date'] ?? null,
    ];

    // Update password if provided
    if ($request->filled('password')) {
        $updateData['password'] = Hash::make($validated['password']);
    }

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
        // Delete old picture if exists
        if ($admin->profile_picture) {
            Storage::delete($admin->profile_picture);
        }

        $updateData['profile_picture'] = $request->file('profile_picture')
            ->store('admin_profile_pictures');
    }

    $admin->update($updateData);

    // ✅ Redirect ke route yang memang terdaftar di web.php
    return redirect()->route('admin.profile')
        ->with('success', 'Profil berhasil diperbarui!');
}

}