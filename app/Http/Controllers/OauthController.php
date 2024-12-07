<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OauthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try {

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                abort(403);
            }

            if ($user->gauth_id != $googleUser->id) {
                $user->update([
                    'gauth_id' => $googleUser->id,
                    'gauth_type' => 'google'
                ]);
            }

            Auth::login($user);
            return redirect()->route('dashboard');
        } catch (HttpException $e) {
            abort(403);
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
