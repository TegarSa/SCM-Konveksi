<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLogin {
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // cek login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // cek role
        if (!in_array($user->role, $roles)) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
