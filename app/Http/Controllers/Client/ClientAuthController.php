<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function loginForm(): View|RedirectResponse
    {
        return view('client.loginForm');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:clients,email'],
                'password' => ['required'],
            ]
        );
        $credentials = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('client.dashboard'));
        }
        return redirect()->route('client.loginForm')->withErrors(
            [
                'email' => 'The provided credentials do not match our records.',
            ]
        );
    }

    public function dashboard(): View
    {
        return view('client.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('client')->logout();

        if (Auth::guard('web')->check() || Auth::guard('admin')->check()) {
            $request->session()->regenerate();
            return redirect(route('client.loginForm'));
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('client.loginForm'));
    }
}
