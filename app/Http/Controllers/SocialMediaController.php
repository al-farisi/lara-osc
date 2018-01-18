<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;

class SocialMediaController extends Controller
{
    /**
     * redirectToProvider
     *
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * handleProviderCallback
     *
     * @param mixed $provider
     * @return void
     */
    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
        } catch(Exception $e) {
            return redirect('auth/' + $provider);
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect()->to('/');
    }

    private function findOrCreateUser($socialMediaUser)
    {
        $authUser = User::where('client_id', $socialMediaUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return User::create([
            'name'=>$socialMediaUser->name,
            'email'=>$socialMediaUser->email,
            'client_id'=>$socialMediaUser->id,
            'avatar'=>$socialMediaUser->avatar
        ]);
    }
}
