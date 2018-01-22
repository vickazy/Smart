<?php

namespace App\Http\Middleware;

use Closure;

class NotAuth
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
        if (auth()->guard('admin')->check() || auth()->guard('pengurus')->check() || auth()->guard('kprodi')->check() || auth()->guard('guru')->check() || auth()->guard('berita')->check()) {
            return $next($request);
        }
        return redirect()->back()->with('denied', 'Anda Harus Login');

    }
}
