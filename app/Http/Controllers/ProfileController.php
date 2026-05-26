<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            // In legacy DB, user_name is used as login/NIP
            'user_name' => 'required|string|max:50|unique:users,user_name,' . $user->id,
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->user_name = $request->user_name;

        // Password update logic if provided
        if ($request->filled('current_password') && $request->filled('new_password')) {
            // Check if current password matches
            // Assuming MD5 or whatever logic Fortify uses here.
            // For now, standard Hash check if it was migrated to bcrypt, or custom check.
            if (Hash::check($request->current_password, $user->user_password) || md5($request->current_password) === $user->user_password) {
                // Determine how legacy DB stores password. Usually md5.
                $user->user_password = md5($request->new_password); // or Hash::make() if migrated
            } else {
                return back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profil berhasil diperbarui!');
    }
}
