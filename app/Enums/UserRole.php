<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case DG = 'dg';
    case INFORMATICIEN = 'informaticien';
    case SECRETAIRE = 'secretaire';

    public function getLabel(): string
    {
        return match($this) {
            self::SUPER_ADMIN => 'Super Administrateur',
            self::DG => 'Directeur Général',
            self::INFORMATICIEN => 'Informaticien',
            self::SECRETAIRE => 'Secrétaire',
        };
    }

    public function hasFullAccess(): bool
    {
        return in_array($this, [
            self::SUPER_ADMIN,
            self::DG,
            self::INFORMATICIEN
        ]);
    }

    public function canCreateAccounts(): bool
    {
        return in_array($this, [
            self::SUPER_ADMIN,
            self::DG,
            self::INFORMATICIEN
        ]);
    }

    public function canManageAccounts(): bool
    {
        return true; // Tous les rôles peuvent gérer les comptes
    }

    public function getDashboardRoute(): string
    {
        return match($this) {
            self::SECRETAIRE => 'admin.accounts.index',
            default => 'admin.dashboard',
        };
    }
} 