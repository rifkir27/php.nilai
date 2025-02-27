<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SomeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ...
    }
} 