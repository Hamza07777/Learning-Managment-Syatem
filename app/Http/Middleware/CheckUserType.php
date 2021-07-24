<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\CheckUserType as Middleware;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if(isUser()){
    //         auth()->logout();
    //         session()->flash('danger','These credentials do not match our records.');
    //         return redirect()->to('login');
    //     }
    //     return $next($request);
    // }


    public function handle($request, Closure $next, String $role) {
  
        $user = Auth::user();
        if($user->role == $role)
          return $next($request);
    
        abort(401, 'This action is unauthorized.');
      }
}
