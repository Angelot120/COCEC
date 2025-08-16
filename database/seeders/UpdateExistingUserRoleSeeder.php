<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UpdateExistingUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mettre à jour tous les utilisateurs existants pour qu'ils aient le rôle super_admin
        User::whereNull('role')->orWhere('role', '')->update(['role' => UserRole::SUPER_ADMIN]);
        
        $this->command->info('Rôles des utilisateurs existants mis à jour avec succès.');
    }
}
