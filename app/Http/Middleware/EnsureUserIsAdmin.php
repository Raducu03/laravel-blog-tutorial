<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verifică dacă utilizatorul este autentificat și dacă are rol de admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acces interzis. Sunt necesare privilegii de admin.');
        }

        return $next($request);
    }
}
