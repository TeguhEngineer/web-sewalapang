<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'user') {
                return redirect('/home')->with('welcome', '');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['general' => 'Username dan Password tidak valid.']);
            }
        } else {
            return back()->withErrors(['general' => 'Username dan Password tidak valid.']);
        }
    }

    public function loginAdmin()
    {
        return view('auth.loginAdmin');
    }

    public function cekLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/homeAdmin');
            } else {
                Auth::logout();
                return redirect('/administrator')->withErrors(['general' => 'Username dan Password tidak valid.']);
            }
        } else {
            Auth::logout();
            return redirect('/administrator')->withErrors(['general' => 'Username dan Password tidak valid.']);
        }
    }
}
