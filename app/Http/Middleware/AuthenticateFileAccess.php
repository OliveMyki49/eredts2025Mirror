<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateFileAccess
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return '' .
            '<div ' .
            '   style="' .
            '       text-align: center; ' .
            '       background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); ' .
            '       font: small-caps bold 24px/1 sans-serif;' .
            '       height: 100%;' .
            '       padding-top: 20%;' .
            '   "' .
            '>' .
            '   <span> ' .
            '       <h2>𓆩♡𓆪</h2>' .
            '       <h2><º))))><</h2>' .
            '       <h2>Denr RFSATS: You Don\'t Have Permission to Access this page</h2>' .
            '       <h3>Contact Admin For More Details. . .</h3>' .
            '   </span>' .
            '</div>' .
            '';
    }
}
