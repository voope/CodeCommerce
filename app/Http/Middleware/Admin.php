<?php namespace CodeCommerce\Http\Middleware;

use Closure;

class Admin {

    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if( ! $user->is_admin) return redirect('/');

        return $next($request);
    }
}