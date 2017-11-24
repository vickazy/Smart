<?php

namespace App\Http\Middleware;

use Closure;

class KProdi
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
        if (auth()->guard('kprodi')->check()) {
            return $next($request);
        }
        return redirect()->back()->with('error', 'Anda tidak berhak mengakses halaman tersebut');
    }
}
