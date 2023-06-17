<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        $users = User::all();
        $check = false;
        foreach($users as $user){
              if($user->email==$request->email and $user->email==auth()->user()->email){
                  if(Hash::check($request->password,$user->password)){
                      $check = true;
                  }
              }
        }
        if($check){
            return $next($request);
        }else{
            return redirect()->back()->with("error","l'email ou mot de pass est/sont pas correcte(s)");  
        }
        
    }
}
