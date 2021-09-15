<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    /************* login by google ************/
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        
    }

    public function handleCallback()
    {
        
           
           try{
                $user = Socialite::driver('google')->user();
           
            $finduser = User::where('social_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect('/');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                     'picture'=>$user->avatar,
                    'password' => encrypt(Str::random(8))
                ]);
      
                Auth::login($newUser);
      
                return redirect('/');
            }
           
        } catch (Exception $e) {
            dd($e);
        }
    }
 /*  public function redirectToTW()
    {
        return Socialite::driver('twitter')->redirect();
        
    }

    public function handleCallbackTW()
    {
        
          try{
            $user = Socialite::driver('twitter')->user();
           
            $finduser = User::where('social_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect('/');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'twitter',
                    'password' => encrypt('123456luay')
                ]);
      
                Auth::login($newUser);
      
                return redirect('/');
            }
           
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
 */

    /************* login by facebook  ***************/

/*     public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    public function handleCallbackFb()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id', $user->id)->first();
             if($finduser){
                 Auth::login($finduser);
                return redirect('/home');
            }else{
                 $newUser = User::create([
                     'name' => $user->name,
                     'social_id'=> $user->id,
                     'social_type'=> 'facebook',
                     //'avatar'=>$user->avatar,
                     'password' => encrypt('my-facebook')
                ]);
                 Auth::login($newUser);
                return redirect('/home');
            }
        } catch (Exception $e) {
             dd($e->getMessage());
        }
    }
 */

}
