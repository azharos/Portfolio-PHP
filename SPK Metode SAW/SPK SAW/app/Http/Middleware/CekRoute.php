<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRoute
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
        if ($request->isMethod('GET')) {
            return redirect('/kriteria');
        }
        return $next($request);
    }
}
