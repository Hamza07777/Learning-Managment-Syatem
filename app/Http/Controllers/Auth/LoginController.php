<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
  //  protected $redirectTo = RouteServiceProvider::HOME;

        public function redirectTo() {
            $role = Auth::user()->role; 
            switch ($role) {
            case 'admin':
                return '/admin_home';
                break;
            case 'instructor':
                return '/instructor_home';
                break; 
            case 'user':
                return '/home';
                break; 
            default:
                return '/welcome'; 
            break;
            }
        }
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            return redirect()->route('login');
            
        }

        // function authenticated(Request $request, $user)
        // {
        //     $user->update([
        //         'last_login_at' => Carbon::now()->toDateTimeString(),
        //         'last_login_ip' => $request->getClientIp()
        //     ]);
        // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
