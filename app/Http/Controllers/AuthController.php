<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
            'ip' => $request->ip(),
        ]);

        if (!$response->json()['success']) {
            return back()->withErrors([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal, silakan coba lagi.'
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            if ($user->status == 'belum_aktif') {
                return redirect()->route('lengkapidata');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'alamat' => ['required', 'string'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'role' => self::DEFAULT_USER_ROLE,
                'status' => 'belum_aktif'
            ]);

            Auth::login($user);

            return redirect('/')->with('success', 'Registrasi berhasil!');
            
        } catch (\Exception $e) {
            \Log::error('Register error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi.'])->withInput();
        }
    }

    const DEFAULT_USER_ROLE = 'user';

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->get('g-recaptcha-response'),
            'ip' => $request->ip(),
        ]);

        if (!$response->json()['success']) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => ['Verifikasi reCAPTCHA gagal, silakan coba lagi.']
            ]);
        }

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    
  
}
