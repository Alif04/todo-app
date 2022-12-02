<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class isGuest
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
        // cek kalau di authnya udah ada history login, dia 
        if (Auth::check()){
            return redirect('/dashboard')->with('notAllowed', 'Anda sudah login!');
        }   
        
        // kalau ganda history login bakal diarahin lagi ke login dengan pesanx`x`
        return $next($request);
    }   
}
