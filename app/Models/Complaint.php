<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Les attributs qui sont assignables en masse.
     */
    protected $fillable = [
        'member_name',
        'member_number',
        'member_phone',
        'member_email',
        'subject',
        'category',
        'description',
        'status',
        'reference',
        'attachments',
        'admin_notes',
        'resolved_at',
        'ip_address',
        'user_agent'
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     */
    protected $casts = [
        'resolved_at' => 'datetime',
        'attachments' => 'array',
    ];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     */
    protected $hidden = [
        'ip_address',
        'user_agent'
    ];

    /**
     * Les statuts possibles pour une plainte
     */
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RESOLVED = 'resolved';
    const STATUS_CLOSED = 'closed';

    /**
     * Les catégories possibles pour une plainte
     */
    const CATEGORY_SERVICE = 'service';
    const CATEGORY_CREDIT = 'credit';
    const CATEGORY_EPARGNE = 'epargne';
    const CATEGORY_TECHNIQUE = 'technique';
    const CATEGORY_AUTRE = 'autre';

    /**
     * Obtenir le statut formaté
     */
    public function getStatusLabelAttribute()
    {
        $statuses = [
            self::STATUS_PENDING => 'En attente',
            self::STATUS_PROCESSING => 'En cours de traitement',
            self::STATUS_RESOLVED => 'Résolue',
            self::STATUS_CLOSED => 'Fermée'
        ];

        return $statuses[$this->status] ?? 'Inconnu';
    }

    /**
     * Obtenir la catégorie formatée
     */
    public function getCategoryLabelAttribute()
    {
        $categories = [
            self::CATEGORY_SERVICE => 'Service client',
            self::CATEGORY_CREDIT => 'Crédit',
            self::CATEGORY_EPARGNE => 'Épargne',
            self::CATEGORY_TECHNIQUE => 'Problème technique',
            self::CATEGORY_AUTRE => 'Autre'
        ];

        return $categories[$this->category] ?? 'Inconnue';
    }

    /**
     * Vérifier si la plainte est résolue
     */
    public function isResolved()
    {
        return in_array($this->status, [self::STATUS_RESOLVED, self::STATUS_CLOSED]);
    }

    /**
     * Vérifier si la plainte est en cours de traitement
     */
    public function isProcessing()
    {
        return $this->status === self::STATUS_PROCESSING;
    }

    /**
     * Vérifier si la plainte est en attente
     */
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    /**
     * Scope pour les plaintes en attente
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope pour les plaintes en cours de traitement
     */
    public function scopeProcessing($query)
    {
        return $query->where('status', self::STATUS_PROCESSING);
    }

    /**
     * Scope pour les plaintes résolues
     */
    public function scopeResolved($query)
    {
        return $query->where('status', self::STATUS_RESOLVED);
    }

    /**
     * Scope pour les plaintes fermées
     */
    public function scopeClosed($query)
    {
        return $query->where('status', self::STATUS_CLOSED);
    }

    /**
     * Scope pour les plaintes actives (non résolues)
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', [self::STATUS_PENDING, self::STATUS_PROCESSING]);
    }

    /**
     * Générer une nouvelle référence unique
     */
    public static function generateReference()
    {
        $year = date('Y');
        $count = self::whereYear('created_at', $year)->count() + 1;
        return 'PLAINT-' . $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Boot du modèle
     */
    protected static function boot()
    {
        parent::boot();

        // Avant de créer, générer la référence
        static::creating(function ($complaint) {
            if (empty($complaint->reference)) {
                $complaint->reference = self::generateReference();
            }
            
            // Enregistrer l'IP et l'agent utilisateur
            $complaint->ip_address = request()->ip();
            $complaint->user_agent = request()->userAgent();
        });
    }
}
