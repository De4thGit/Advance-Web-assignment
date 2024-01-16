<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BusinessUnitMiddleware
{
    public function handle(Request $request, Closure $next)
    {
    
        if (auth()->check() && auth()->user()->user_level === 2) {
            $user = auth()->user();
    
            // Check if the user has a business_unit_id
            if ($user->business_unit_id) {
    
                // Redirect to the specific business unit show page
                $redirect = redirect()->route('business_units.show', ['businessUnit' => $user->business_unit_id]);


            }
    
            // If no business_unit_id, proceed with normal business unit operations
            return $next($request);
        }
    
        abort(403, 'Unauthorized');
    }
    
}
