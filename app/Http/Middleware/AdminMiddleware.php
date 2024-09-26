<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role != 'admin') {
            abort(401);
            // return redirect()->view('errors.401');
        }
        return $next($request);
    }

    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->role == 'admin') {
    //         return redirect()->route('admin.dashboard');
    //     }
    //     return $next($request);

    //     // return redirect('/'); // Redirect to homepage or login if not admin
    // }
}
