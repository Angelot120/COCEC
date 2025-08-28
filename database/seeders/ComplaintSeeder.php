<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintSeeder extends Seeder
{
    /**
     * Exécuter le seeder.
     */
    public function run(): void
    {
        $complaints = [
            [
                'member_name' => 'Koffi Mensah',
                'member_number' => 'MEM-2024-001',
                'member_phone' => '+228 90123456',
                'member_email' => 'koffi.mensah@email.com',
                'subject' => 'Retard dans le traitement de ma demande de crédit',
                'category' => 'credit',
                'description' => 'J\'ai soumis ma demande de crédit il y a plus de 2 semaines et je n\'ai toujours pas reçu de réponse. J\'ai besoin de ce crédit pour développer mon commerce et le délai commence à poser problème.',
                'status' => 'pending',
                'admin_notes' => 'Demande reçue, en cours d\'analyse',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ],
            [
                'member_name' => 'Akouvi Sossou',
                'member_number' => 'MEM-2024-002',
                'member_phone' => '+228 90234567',
                'member_email' => 'akouvi.sossou@email.com',
                'subject' => 'Problème avec l\'application mobile',
                'category' => 'technique',
                'description' => 'L\'application mobile ne se connecte plus depuis hier. J\'ai essayé de me reconnecter plusieurs fois mais j\'obtiens toujours une erreur de connexion. Pouvez-vous vérifier le problème ?',
                'status' => 'processing',
                'admin_notes' => 'Problème technique identifié, équipe IT en cours de résolution',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15'
            ],
            [
                'member_name' => 'Fati Ali',
                'member_number' => 'MEM-2024-003',
                'member_phone' => '+228 90345678',
                'member_email' => 'fati.ali@email.com',
                'subject' => 'Question sur les taux d\'épargne',
                'category' => 'epargne',
                'description' => 'Je souhaite connaître les taux d\'intérêt actuels pour les comptes d\'épargne à terme. Pouvez-vous me fournir cette information et m\'expliquer les différentes options disponibles ?',
                'status' => 'resolved',
                'admin_notes' => 'Informations fournies par email, plainte résolue',
                'resolved_at' => now()->subDays(2),
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ],
            [
                'member_name' => 'Komlan Doe',
                'member_number' => 'MEM-2024-004',
                'member_phone' => '+228 90456789',
                'member_email' => 'komlan.doe@email.com',
                'subject' => 'Service client peu réactif',
                'category' => 'service',
                'description' => 'J\'ai contacté le service client plusieurs fois cette semaine pour une question urgente mais je n\'ai pas reçu de réponse. Le temps de réponse est trop long.',
                'status' => 'closed',
                'admin_notes' => 'Processus d\'amélioration du service client mis en place',
                'resolved_at' => now()->subDays(5),
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36'
            ]
        ];

        foreach ($complaints as $complaintData) {
            Complaint::create($complaintData);
        }
    }
}
