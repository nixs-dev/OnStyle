<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('LoggedUser') != 'MASTERUSER010' && $request->path() == 'private/auth/root/addProduct') {
            return redirect('/');
        }

        if (!session()->has('LoggedUser') && ($request->path() != 'auth/login' && $request->path() != 'auth/register')) {
            return redirect('auth/login')->with('fail', 'Você deve estar logado!');
        }

        if (session()->has('LoggedUser') && ($request->path() == 'auth/login' || $request->path() == 'auth/register')) {
            return back();
        }

        return $next($request);
    }
}
