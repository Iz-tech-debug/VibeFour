<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Login Page
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Login Process

        // 1. Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 2. Cek apakah username/email ada di database
        $user = User::where('email', $request->username)
            ->orWhere('username', $request->username)
            ->first();

        // 3. Cek validitas user dan password dalam satu kondisi
        if (!$user || !password_verify($request->password, $user->password)) {
            return back()->with('error', 'Username atau password salah!');
        }

        // 4. Cek role admin
        if ($user->role_id !== 1) {
            return back()->with('error', 'Username atau password salah!');
        }

        // 5. Login user & redirect ke dashboard
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Selamat datang, Admin!');
    }

    public function logout()
    {
        // Logout Process
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
