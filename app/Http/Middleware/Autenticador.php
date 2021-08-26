<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            !$request
                ->is('entrar', 'registrar/create')
            &&
            !Auth::check()
        ) {
            return redirect()
                ->route('entrar.index');
        }

        return $next($request);
    }
}
