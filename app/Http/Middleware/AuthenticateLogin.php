<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 21/10/17
 * Time: 1:40 AM
 */


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
