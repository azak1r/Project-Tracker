<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Socialite;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('eveonline')->scopes([
            'esi-assets.read_assets.v1',
        ])->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $sso_user = Socialite::driver('eveonline')->user();
        } catch (InvalidStateException $exception) {
            Log::error($exception->getMessage());
            throw new \Exception("Could not retrieve user data!");
        }
        $user = User::find($sso_user->id);
        
        if (!$user) {
            $user = new User;
            
            $user->id = $sso_user->id;
            $user->eve_token = $sso_user->token;
            $user->refreshToken = $sso_user->refreshToken;
            $user->username = $sso_user->name;
            $user->avatar = $sso_user->avatar;
            
            $user->save();
        }
        Auth::loginUsingId($sso_user->id, true);
        
        flash('Login Successfull')->success();
        return redirect()->route('home');
    }   
}
