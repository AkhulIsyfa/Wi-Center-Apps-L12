<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        // Sesuaikan dengan view login Anda (misalnya view bawaan htmlcodeUI)
        return view('auth.login');
    }

    /**
     * Proses autentikasi login (MD5 + Salt)
     */
    public function authenticate(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'user_name' => 'required|string',
            'password'  => 'required|string',
        ]);

        // 2. Cari user berdasarkan user_name
        $user = User::where('user_name', $request->user_name)->first();

        if ($user) {
            // 3. Logika Hashing Legacy: Cek semua kemungkinan (md5($pass), md5($pass.$salt), dan md5($salt.$pass))
            $hashedPassword1 = md5($request->password . $user->user_salt);
            $hashedPassword2 = md5($user->user_salt . $request->password);
            $hashedPassword3 = md5($request->password);

            // 4. Pencocokan Hash
            if ($user->user_password === $hashedPassword1 || $user->user_password === $hashedPassword2 || $user->user_password === $hashedPassword3) {
                
                // Pastikan user aktif sebelum diizinkan masuk
                // Dari database, mayoritas user memiliki user_status = 1 (aktif).
                if (isset($user->user_status) && $user->user_status !== 1) {
                    throw ValidationException::withMessages([
                        'user_name' => 'Akun Anda sedang tidak aktif.',
                    ]);
                }

                // 5. Login Paksa (Force Login)
                Auth::login($user);

                // Regenerate session untuk menghindari serangan session fixation
                $request->session()->regenerate();

                // 6. Redirect ke halaman dashboard
                return redirect()->intended('/dashboard');
            }
        }

        // 7. Jika user tidak ditemukan atau password salah
        throw ValidationException::withMessages([
            'user_name' => 'Kredensial yang Anda berikan tidak cocok dengan data kami.',
        ]);
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
