<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->ensureIsNotRateLimited();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            $request->clearRateLimiter();
            return redirect()->intended(route('home'))->with('success', trans('auth.login_success'));
        }

        $request->incrementRateLimiter();
        Log::warning('Gagal login', [
            'email' => $request->input('email'),
            'ip' => $request->ip(),
            'time' => now()->toDateTimeString(),
        ]);

        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $request->ensureIsNotRateLimited();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);
            $request->session()->regenerate();
            $request->clearRateLimiter();

            return redirect()->route('home')->with('success', trans('auth.register_success'));
        } catch (\Exception $e) {
            $request->incrementRateLimiter();
            Log::error('Gagal registrasi', [
                'email' => $request->input('email'),
                'ip' => $request->ip(),
                'error' => $e->getMessage(),
                'time' => now()->toDateTimeString(),
            ]);

            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => [trans('auth.register_failed')],
            ]);
        }
    }

    public function logout(Request $request)
    {
        Log::info('Pengguna logout', [
            'user_id' => Auth::id(),
            'email' => Auth::user()->email ?? 'unknown',
            'ip' => $request->ip(),
            'time' => now()->toDateTimeString(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', trans('auth.logout_success'));
    }
}