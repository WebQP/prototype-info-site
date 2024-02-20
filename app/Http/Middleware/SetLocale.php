<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langPrefix = ltrim($request->route()->getPrefix(), '/');
        if ($langPrefix == config('app.locale')) {
            return redirect(str_replace('ru', '', $_SERVER['REQUEST_URI']), 301);
        } else {
            App::setLocale($langPrefix);
        }
        return $next($request);
    }
}
