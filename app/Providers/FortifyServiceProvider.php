<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureAuthentication();
        $this->configureViews();
        $this->configureRateLimiting();
    }

    /**
     * Configure custom authentication for legacy database.
     *
     * Legacy DB uses MD5 hashed passwords with optional salt.
     * This replaces Fortify's default bcrypt-based authentication.
     */
    private function configureAuthentication(): void
    {
        Fortify::authenticateUsing(function (Request $request): ?User {
            $user = User::where('user_name', $request->input('user_name'))->first();

            if (! $user) {
                return null;
            }

            // Check if user account is active (user_status = 0 means active)
            if (! $user->isActive()) {
                return null;
            }

            // Legacy password verification: MD5 hashing
            $inputPassword = $request->input('password');

            if ($this->verifyLegacyPassword($inputPassword, $user->user_password, $user->user_salt)) {
                return $user;
            }

            return null;
        });
    }

    /**
     * Verify password against legacy MD5 hash.
     *
     * Tries multiple common MD5 hashing strategies used by legacy PHP systems:
     * 1. md5(password) — plain MD5
     * 2. md5(salt + password) — salt prepended
     * 3. md5(password + salt) — salt appended
     * 4. md5(md5(password) + salt) — double MD5 with salt
     */
    private function verifyLegacyPassword(string $inputPassword, string $storedHash, ?string $salt): bool
    {
        // Strategy 1: Plain MD5 (no salt)
        if (md5($inputPassword) === $storedHash) {
            return true;
        }

        // If salt is available, try salted variants
        if ($salt !== null && $salt !== '') {
            // Strategy 2: md5(salt + password)
            if (md5($salt.$inputPassword) === $storedHash) {
                return true;
            }

            // Strategy 3: md5(password + salt)
            if (md5($inputPassword.$salt) === $storedHash) {
                return true;
            }

            // Strategy 4: md5(md5(password) + salt)
            if (md5(md5($inputPassword).$salt) === $storedHash) {
                return true;
            }
        }

        return false;
    }

    /**
     * Configure Fortify views.
     */
    private function configureViews(): void
    {
        Fortify::loginView(fn () => view('auth.login'));

        Fortify::confirmPasswordView(fn () => view('auth.confirm-password'));
    }

    /**
     * Configure rate limiting.
     */
    private function configureRateLimiting(): void
    {
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });
    }
}
