<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Auction;
use App\Models\Challenge;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
       
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        
        $request->authenticate();
        $remember = $request->filled('remember');


        // Attempt to authenticate the user with the provided credentials and "remember me" option
        if (Auth::attempt($credentials, $remember)) {

            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

          

            // Redirect the user to their intended destination
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'message' => 'کاربری یافت نشد',
        ]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
