<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PesertaAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('content.web.auth.peserta.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'                  => 'required|string|max:255',
            'nim'                   => 'required|string|max:20|unique:peserta,nim',
            'telepon'               => 'required|string|max:20',
            'email'                 => 'required|email|max:255|unique:users,email',
            'prodi'                 => 'required|string|max:255',
            'password'              => 'required|string|min:8|confirmed',
        ], [
            'nama.required'         => 'Nama wajib diisi.',
            'nim.required'          => 'NIM wajib diisi.',
            'nim.unique'            => 'NIM sudah terdaftar.',
            'telepon.required'      => 'Nomor telepon wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.unique'          => 'Email sudah terdaftar.',
            'prodi.required'        => 'Program studi wajib diisi.',
            'password.required'     => 'Kata sandi wajib diisi.',
            'password.min'          => 'Kata sandi minimal 8 karakter.',
            'password.confirmed'    => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name'     => $request->nama,
                'email'    => $request->email,
                'role'     => 'peserta',
                'password' => Hash::make($request->password),
            ]);

            Peserta::create([
                'user_id' => $user->id,
                'nim'     => $request->nim,
                'telepon' => '+62' . ltrim($request->telepon, '0'),
                'prodi'   => $request->prodi,
            ]);
        });

        return redirect()->route('peserta.login')
            ->with('success', 'Akun berhasil didaftarkan. Silakan masuk!');
    }

    public function showLoginForm()
    {
        return view('content.web.auth.peserta.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role !== 'peserta') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini bukan akun peserta.']);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('peserta.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('peserta.login');
    }
}
