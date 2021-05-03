<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekStatus
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
        if (!session('nama')) {
            return redirect('/')->with('gagal', 'Anda Belum Login !!!');
        }

        return $next($request);
    }
}
