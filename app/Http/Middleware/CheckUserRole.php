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
        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }

        $user = auth()->user();
        
        // Vérifier que l'utilisateur existe toujours en base
        if (!$user) {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }

        // Vérifier que l'utilisateur a un rôle valide
        if (!$user->role) {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Rôle utilisateur invalide. Veuillez contacter l\'administrateur.');
        }
        
        // Si aucun rôle spécifique n'est requis, laisser passer
        if (empty($roles)) {
            return $next($request);
        }

        // Vérifier si l'utilisateur a l'un des rôles requis
        foreach ($roles as $role) {
            try {
                if ($user->hasRole(UserRole::from($role))) {
                    return $next($request);
                }
            } catch (\ValueError $e) {
                // Rôle invalide, continuer avec le suivant
                continue;
            }
        }

        // Vérifier si l'utilisateur a un accès complet
        try {
            if ($user->hasFullAccess()) {
                return $next($request);
            }
        } catch (\Error $e) {
            // Erreur lors de la vérification des permissions
            auth()->logout();
            return redirect()->route('login')->with('error', 'Erreur de permissions. Veuillez vous reconnecter.');
        }

        // Accès refusé
        abort(403, 'Accès non autorisé pour votre rôle.');
    }
}
