<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthRule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next):
//    {
//        if ($request->input('umar') !== '1313') {
//            return redirect()->back()->with('error', 'У вас нет прав для данной операции.');
//        }
//
//        return $next($request);
//    }
}
