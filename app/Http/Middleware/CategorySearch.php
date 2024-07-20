<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategorySearch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $cartCount = \DB::table('cart')
                ->where('user_id', Auth::id())
                ->count();
        } else {
            $cartCount = 0;
        }

        view()->share('cartCount', $cartCount);

        return $next($request);
    }


}
