<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'remember' => ['sometimes', 'boolean'],
        ];
    }

    public function ensureIsNotRateLimited()
    {
        $key = 'login-attempt:' . $this->ip() . ':' . $this->input('email');
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                'email' => [trans('auth.throttle', ['seconds' => $seconds])],
            ]);
        }
    }

    public function incrementRateLimiter()
    {
        $key = 'login-attempt:' . $this->ip() . ':' . $this->input('email');
        RateLimiter::hit($key, 300); // 5 menit
    }

    public function clearRateLimiter()
    {
        $key = 'login-attempt:' . $this->ip() . ':' . $this->input('email');
        RateLimiter::clear($key);
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Email harus berupa alamat email yang valid.',
            'email.max'         => 'Email tidak boleh lebih dari 255 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.max'      => 'Password tidak boleh lebih dari 255 karakter.',
        ];
    }
}