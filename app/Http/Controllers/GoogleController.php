<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

           // dd($user);

           $finduser = User::where('email', $user->email)->first();
     
           if($finduser){
    
               Auth::login($finduser);
               session()->flash('alert-type', 'success');
               session()->flash('message', 'User Login Successfully');
               return redirect('/home');
    
           }else{
               $newUser = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                   'role'=> 'user',
                   'password' => Hash::make('password'),
               ]);
               $data = [];
               $data['email'] = $user->email;
               $data['password'] = 'password';
               $data['name'] = $user->name;
              // dd($data);
               Mail::send('emails.credential', $data, function($message) use ($data){
                   $message->to($data['email'], env('APP_NAME'))->subject
                   ('Login Credentials');
               });
               $newUser->markEmailAsVerified();
               Auth::login($newUser);
               return redirect('/user_profile');
           }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();

           // dd($user);

           $finduser = User::where('email', $user->email)->first();
     
           if($finduser){
    
               Auth::login($finduser);
               session()->flash('alert-type', 'success');
               session()->flash('message', 'User Login Successfully');
               return redirect('/home');
    
           }else{
               $newUser = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                   'role'=> 'user',
                   'password' => Hash::make('password'),
               ]);
               $data = [];
               $data['email'] = $user->email;
               $data['password'] = 'password';
               $data['name'] = $user->name;
              // dd($data);
               Mail::send('emails.credential', $data, function($message) use ($data){
                   $message->to($data['email'], env('APP_NAME'))->subject
                   ('Login Credentials');
               });
               $newUser->markEmailAsVerified();
               Auth::login($newUser);
               return redirect('/user_profile');
           }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function loginWithgithub()
    {
        try {

            $user = Socialite::driver('github')->user();

           // dd($user);

           $finduser = User::where('email', $user->email)->first();
     
           if($finduser){
    
               Auth::login($finduser);
               session()->flash('alert-type', 'success');
               session()->flash('message', 'User Login Successfully');
               return redirect('/home');
    
           }else{
               $newUser = User::create([
                   'name' => $user->name,
                   'email' => $user->email,
                   'role'=> 'user',
                   'password' => Hash::make('password'),
               ]);
               $data = [];
               $data['email'] = $user->email;
               $data['password'] = 'password';
               $data['name'] = $user->name;
              // dd($data);
               Mail::send('emails.credential', $data, function($message) use ($data){
                   $message->to($data['email'], env('APP_NAME'))->subject
                   ('Login Credentials');
               });
               $newUser->markEmailAsVerified();
               Auth::login($newUser);
               return redirect('/user_profile');
           }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
