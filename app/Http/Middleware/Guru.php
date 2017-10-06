<?php

namespace App\Http\Middleware;

use Closure;

class Guru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guard('guru')->check()) {
            return $next($request);
        }
        return redirect()->back()->with('error', 'Anda tidak berhak mengakses halaman tersebut');
    }
}
