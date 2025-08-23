<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DigitalFinanceUpdate;

class DigitalFinanceUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updates = [
            [
                'account_number' => 'COC001234',
                'cni_number' => '123456789',
                'cni_type' => 'CNI',
                'full_name' => 'Kossi Mensah',
                'email' => 'kossi.mensah@email.com',
                'togocel' => '90012345',
                'tmoney' => '70012345',
                'whatsapp_togocel' => '90012345',
                'moov' => '90012345',
                'flooz' => '70012345',
                'whatsapp_moov' => '90012345',
                'mobile_banking_togocel' => true,
                'mobile_banking_moov' => false,
                'mobile_money_togocel' => true,
                'mobile_money_moov' => true,
                'web_banking_togocel' => false,
                'web_banking_moov' => true,
                'sms_banking_togocel' => true,
                'sms_banking_moov' => false,
                'notes' => 'Client très satisfait des services. Souhaite activer le web banking Togocel.',
                'status' => 'pending'
            ],
            [
                'account_number' => 'COC005678',
                'cni_number' => '987654321',
                'cni_type' => 'Passeport',
                'full_name' => 'Afiwa Adjo',
                'email' => 'afiwa.adjo@email.com',
                'togocel' => '90054321',
                'tmoney' => '70054321',
                'whatsapp_togocel' => '90054321',
                'moov' => '90054321',
                'flooz' => '70054321',
                'whatsapp_moov' => '90054321',
                'mobile_banking_togocel' => true,
                'mobile_banking_moov' => true,
                'mobile_money_togocel' => true,
                'mobile_money_moov' => true,
                'web_banking_togocel' => true,
                'web_banking_moov' => true,
                'sms_banking_togocel' => true,
                'sms_banking_moov' => true,
                'notes' => 'Client premium, tous les services activés. Excellente satisfaction.',
                'status' => 'approved'
            ],
            [
                'account_number' => 'COC009876',
                'cni_number' => '456789123',
                'cni_type' => 'CNI',
                'full_name' => 'Kodjo Tete',
                'email' => 'kodjo.tete@email.com',
                'togocel' => '90098765',
                'tmoney' => '70098765',
                'whatsapp_togocel' => '90098765',
                'moov' => '90098765',
                'flooz' => '70098765',
                'whatsapp_moov' => '90098765',
                'mobile_banking_togocel' => false,
                'mobile_banking_moov' => false,
                'mobile_money_togocel' => false,
                'mobile_money_moov' => false,
                'web_banking_togocel' => false,
                'web_banking_moov' => false,
                'sms_banking_togocel' => false,
                'sms_banking_moov' => false,
                'notes' => 'Client hésitant. Nécessite plus d\'explications sur les avantages des services.',
                'status' => 'rejected'
            ],
            [
                'account_number' => 'COC003210',
                'cni_number' => '789123456',
                'cni_type' => 'Permis de conduire',
                'full_name' => 'Mawuena Doe',
                'email' => 'mawuena.doe@email.com',
                'togocel' => '90032109',
                'tmoney' => '70032109',
                'whatsapp_togocel' => '90032109',
                'moov' => '90032109',
                'flooz' => '70032109',
                'whatsapp_moov' => '90032109',
                'mobile_banking_togocel' => true,
                'mobile_banking_moov' => false,
                'mobile_money_togocel' => true,
                'mobile_money_moov' => false,
                'web_banking_togocel' => false,
                'web_banking_moov' => false,
                'sms_banking_togocel' => true,
                'sms_banking_moov' => false,
                'notes' => 'Préfère les services Togocel. Client fidèle depuis 3 ans.',
                'status' => 'pending'
            ],
            [
                'account_number' => 'COC007654',
                'cni_number' => '321654987',
                'cni_type' => 'CNI',
                'full_name' => 'Kokouvi Agbeko',
                'email' => 'kokouvi.agbeko@email.com',
                'togocel' => '90076543',
                'tmoney' => '70076543',
                'whatsapp_togocel' => '90076543',
                'moov' => '90076543',
                'flooz' => '70076543',
                'whatsapp_moov' => '90076543',
                'mobile_banking_togocel' => true,
                'mobile_banking_moov' => true,
                'mobile_money_togocel' => false,
                'mobile_money_moov' => false,
                'web_banking_togocel' => true,
                'web_banking_moov' => true,
                'sms_banking_togocel' => false,
                'sms_banking_moov' => false,
                'notes' => 'Intéressé par le banking mobile et web. Pas encore convaincu par le mobile money.',
                'status' => 'pending'
            ]
        ];

        foreach ($updates as $update) {
            DigitalFinanceUpdate::create($update);
        }
    }
}
