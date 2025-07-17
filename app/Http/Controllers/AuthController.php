<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->intended('/home-page');
        }

        return view('auth.login-page');
    }

    public function showHomePage()
    {
        if (! Auth::check()) {
            return redirect()->intended('/login');
        }

        return view('home.home-page');
    }

    public function login(AuthRequest $request)
    {

        $request->validated();
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        if (! Auth::attempt($credentials, $remember)) {
            throw new BadRequestException('Email or password not matched');
        }
        $request->session()->regenerate();

        return redirect()->intended('/home-page');
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->intended('/home-page');
        }

        return view('auth.register-page');
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();
        $data = $request->only('email', 'password', 'name');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/home-page');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
