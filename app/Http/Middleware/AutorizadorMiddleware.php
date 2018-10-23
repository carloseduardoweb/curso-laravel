<?php namespace CursoLaravel\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AutorizadorMiddleware {

    public function handle($request, Closure $next) {
        
        if (!$request->is('login') && Auth::guest()) {
            return redirect('login');
            //return redirect()->route('/login'); //Dá erro! Por quê? Ainda não sei... :/
        }

        return $next($request);
    }
}
