<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsProfessionnel
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
       if(Auth::check() && (Auth::user()->role =='Professionnel'))
       {
        //compte archivé par l'admin : on le déconnecte
        if(Auth::user()->archive != 1)
        {
            Auth::logout();
            return redirect()->route('connexion')->with('message1','Votre Compte est bloqué');
        }
        return $next($request);
        }
        return redirect('/');
    }

}
