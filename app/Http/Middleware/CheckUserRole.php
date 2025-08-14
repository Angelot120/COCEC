<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Si aucun rôle spécifique n'est requis, laisser passer
        if (empty($roles)) {
            return $next($request);
        }

        // Vérifier si l'utilisateur a l'un des rôles requis
        foreach ($roles as $role) {
            if ($user->hasRole(UserRole::from($role))) {
                return $next($request);
            }
        }

        // Vérifier si l'utilisateur a un accès complet
        if ($user->hasFullAccess()) {
            return $next($request);
        }

        // Accès refusé
        abort(403, 'Accès non autorisé pour votre rôle.');
    }
}
