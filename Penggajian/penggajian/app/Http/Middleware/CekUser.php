<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekUser
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
        if (session('level') == 'user') {
            return $next($request);
        } else {
            return response(view('pegawai/404'));
        }
    }
}
