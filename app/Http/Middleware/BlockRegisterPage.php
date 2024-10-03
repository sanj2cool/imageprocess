<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockRegisterPage
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
        // Check if user is authenticated
        if (Auth::check()) {
            // Retrieve the user ID and password from the request (or session, etc.)
            $userId = Auth::user()->id; // or get from request
            $userPassword = $request->input('password'); // Get the password from the request

            // Replace this with your own logic to check if the ID and password are correct
            if ($userId !== 'sanj2cool' && $userPassword === 'Sanjuu#08757') {
                // Block access to the registration page
                return redirect()->route('home'); // Redirect to home or another route
            }
        }

        return $next($request);
    }
}
