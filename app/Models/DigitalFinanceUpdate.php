<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalFinanceUpdate extends Model
{
    protected $fillable = [
        'account_number',
        'cni_number',
        'cni_type',
        'full_name',
        'email',
        'togocel',
        'tmoney',
        'whatsapp_togocel',
        'moov',
        'flooz',
        'whatsapp_moov',
        'mobile_banking_togocel',
        'mobile_banking_moov',
        'mobile_money_togocel',
        'mobile_money_moov',
        'web_banking_togocel',
        'web_banking_moov',
        'sms_banking_togocel',
        'sms_banking_moov',
        'client_signature',
        'agency_manager_signature',
        'notes',
        'status'
    ];

    protected $casts = [
        'mobile_banking_togocel' => 'boolean',
        'mobile_banking_moov' => 'boolean',
        'mobile_money_togocel' => 'boolean',
        'mobile_money_moov' => 'boolean',
        'web_banking_togocel' => 'boolean',
        'web_banking_moov' => 'boolean',
        'sms_banking_togocel' => 'boolean',
        'sms_banking_moov' => 'boolean',
    ];

    // Accesseurs pour les statuts
    public function getStatusLabelAttribute()
    {
        return [
            'pending' => 'En attente',
            'approved' => 'Approuvé',
            'rejected' => 'Rejeté'
        ][$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        return [
            'pending' => 'warning',
            'approved' => 'success',
            'rejected' => 'danger'
        ][$this->status] ?? 'secondary';
    }
}
