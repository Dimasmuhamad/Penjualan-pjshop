<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SetCart
{
    public function handle(Request $request, Closure $next)
    {
        // Get the current user's cart
        $cart = Auth::check()? Auth::user()->cart : [];

        // Share the cart with all views
        view()->share('cart', $cart);

        return $next($request);
    }
}