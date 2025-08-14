<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_num',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    /**
     * Get the user's role
     */
    public function getRole(): UserRole
    {
        return $this->role ?? UserRole::SUPER_ADMIN;
    }

    /**
     * Check if user has full access
     */
    public function hasFullAccess(): bool
    {
        return $this->getRole()->hasFullAccess();
    }

    /**
     * Check if user can create accounts
     */
    public function canCreateAccounts(): bool
    {
        return $this->getRole()->canCreateAccounts();
    }

    /**
     * Check if user can manage accounts
     */
    public function canManageAccounts(): bool
    {
        return $this->getRole()->canManageAccounts();
    }

    /**
     * Get dashboard route based on role
     */
    public function getDashboardRoute(): string
    {
        return $this->getRole()->getDashboardRoute();
    }

    /**
     * Check if user has specific role
     */
    public function hasRole(UserRole $role): bool
    {
        return $this->getRole() === $role;
    }

    /**
     * Check if user has any of the specified roles
     */
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->getRole(), $roles);
    }
}
