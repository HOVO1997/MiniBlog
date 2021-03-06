<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use \Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function LoginSocialite($website)
    {
        return Socialite::driver($website)->redirect();
    }
    public function LoginSocialiteCallback($website)
    {
        $github_user = Socialite::driver($website)
            ->stateless()
            ->user();

        $user  = User::firstOrCreate(
            [
                'email' => $github_user->email
            ],
            [
                'name' => $github_user->name ?? $github_user->nickname,
                'password' => Hash::make(Str::random(16))
            ]
        );

        Auth::login($user,true);
        return redirect('/home');
    }


}
