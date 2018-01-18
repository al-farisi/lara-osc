<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
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
            $user = Socialite::driver('facebook')->user();
        } catch(Exception $e) {
            return redirect('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        // return redirect()->route('home');
        return view('home');
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('client_id', $facebookUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return User::create([
            'name'=>$facebookUser->name,
            'email'=>$facebookUser->email,
            'client_id'=>$facebookUser->id,
            'avatar'=>$facebookUser->avatar
        ]);
    }
}
