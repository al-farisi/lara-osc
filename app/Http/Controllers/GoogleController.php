<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        // $user = Socialite::driver('facebook')->user();

        // $user->token;

        try{
            $user = Socialite::driver('google')->user();
        } catch(Exception $e) {
            return redirect('auth/google');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        // return redirect()->route('home');
        return view('home');
    }

    private function findOrCreateUser($googleUser)
    {
        $authUser = User::where('client_id', $googleUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return User::create([
            'name'=>$googleUser->name,
            'email'=>$googleUser->email,
            'client_id'=>$googleUser->id,
            'avatar'=>$googleUser->avatar
        ]);
    }
}
