<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;

class TwitterController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
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
            $user = Socialite::driver('twitter')->user();
        } catch(Exception $e) {
            return redirect('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        // return redirect()->route('home');
        return view('home');
    }

    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('client_id', $twitterUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return User::create([
            'name'=>$twitterUser->name,
            'email'=>$twitterUser->email,
            'client_id'=>$twitterUser->id,
            'avatar'=>$twitterUser->avatar
        ]);
    }
}
