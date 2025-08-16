<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DigitalFinanceContract;

class DigitalFinanceContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contracts = [
            [
                'full_name' => 'Kossi Mensah',
                'phone' => '90 12 34 56',
                'cni_type' => 'CNI',
                'cni_number' => '123456789',
                'address' => 'Lomé, Quartier Akodessewa',
                'account_number' => 'COC001234',
                'mobile_money' => true,
                'mobile_banking' => true,
                'web_banking' => false,
                'sms_banking' => true,
                'contract_date' => now(),
                'status' => 'active',
                'notes' => 'Client très satisfait du service'
            ],
            [
                'full_name' => 'Afiwa Adjo',
                'phone' => '91 23 45 67',
                'cni_type' => 'Passeport',
                'cni_number' => 'AB987654',
                'address' => 'Lomé, Quartier Tokoin',
                'account_number' => 'COC005678',
                'mobile_money' => true,
                'mobile_banking' => false,
                'web_banking' => true,
                'sms_banking' => false,
                'contract_date' => now()->subDays(5),
                'status' => 'pending',
                'notes' => 'En attente de validation'
            ],
            [
                'full_name' => 'Kodjo Tete',
                'phone' => '92 34 56 78',
                'cni_type' => 'CNI',
                'cni_number' => '987654321',
                'address' => 'Lomé, Quartier Bè',
                'account_number' => 'COC009876',
                'mobile_money' => false,
                'mobile_banking' => true,
                'web_banking' => true,
                'sms_banking' => true,
                'contract_date' => now()->subDays(10),
                'status' => 'active',
                'notes' => 'Utilise principalement le web banking'
            ],
            [
                'full_name' => 'Mawuena Doe',
                'phone' => '93 45 67 89',
                'cni_type' => 'Permis de conduire',
                'cni_number' => 'CD123456',
                'address' => 'Lomé, Quartier Nyékonakpoé',
                'account_number' => 'COC012345',
                'mobile_money' => true,
                'mobile_banking' => true,
                'web_banking' => true,
                'sms_banking' => true,
                'contract_date' => now()->subDays(15),
                'status' => 'terminated',
                'notes' => 'Contrat résilié à la demande du client'
            ],
            [
                'full_name' => 'Komi Agbeko',
                'phone' => '94 56 78 90',
                'cni_type' => 'CNI',
                'cni_number' => '456789123',
                'address' => 'Lomé, Quartier Adidogomé',
                'account_number' => 'COC015678',
                'mobile_money' => true,
                'mobile_banking' => false,
                'web_banking' => false,
                'sms_banking' => true,
                'contract_date' => now()->subDays(20),
                'status' => 'pending',
                'notes' => 'Nouveau client, en cours de traitement'
            ]
        ];

        foreach ($contracts as $contract) {
            DigitalFinanceContract::create($contract);
        }
    }
}
