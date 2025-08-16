<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalFinanceContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'phone', 'cni_type', 'cni_number', 'address', 'account_number',
        'mobile_money', 'mobile_banking', 'web_banking', 'sms_banking',
        'contract_date', 'status', 'notes'
    ];

    protected $casts = [
        'mobile_money' => 'boolean',
        'mobile_banking' => 'boolean',
        'web_banking' => 'boolean',
        'sms_banking' => 'boolean',
        'contract_date' => 'date',
    ];

    public function getStatusLabelAttribute()
    {
        return [
            'pending' => 'En attente',
            'active' => 'Actif',
            'terminated' => 'Terminé'
        ][$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        return [
            'pending' => 'warning',
            'active' => 'success',
            'terminated' => 'danger'
        ][$this->status] ?? 'secondary';
    }

    public function getServicesListAttribute()
    {
        $services = [];
        if ($this->mobile_money) $services[] = 'Mobile Money';
        if ($this->mobile_banking) $services[] = 'Mobile Banking';
        if ($this->web_banking) $services[] = 'Web Banking';
        if ($this->sms_banking) $services[] = 'SMS Banking';
        
        return implode(', ', $services) ?: 'Aucun service';
    }
}
