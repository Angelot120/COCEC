<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouvelle candidature reçue</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f9f9f9; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        
        <!-- En-tête avec logo -->
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="color: #2c3e50; margin: 0; font-size: 1.5em;">COCEC</h2>
            <p style="color: #7f8c8d; margin: 5px 0 0 0; font-size: 0.9em;">Service de Recrutement</p>
        </div>
        
        <!-- Salutation -->
        <h3 style="color: #333; margin-bottom: 20px;">
            Bonjour Équipe RH,
        </h3>
        
        <!-- Message principal -->
        <div style="background-color: #fff3cd; padding: 20px; border-radius: 6px; margin: 20px 0; border-left: 4px solid #ffc107;">
            <h1 style="font-size: 1.4em; color: #856404; margin: 0 0 15px 0; text-align: center;">
                🆕 Nouvelle candidature reçue !
            </h1>
            
            <p style="color: #856404; font-size: 1em; margin: 15px 0;">
                Une nouvelle candidature a été soumise pour le poste de <strong>{{ $application_type }}</strong>.
            </p>
        </div>
        
        <!-- Détails du candidat -->
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 6px; margin: 20px 0;">
            <h4 style="color: #2c3e50; margin: 0 0 15px 0;">👤 Informations du candidat :</h4>
            
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px 0; color: #555; font-weight: bold; width: 40%;">Nom complet :</td>
                    <td style="padding: 8px 0; color: #333;">{{ $first_name }} {{ $last_name }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #555; font-weight: bold;">Email :</td>
                    <td style="padding: 8px 0; color: #333;">
                        <a href="mailto:{{ $email }}" style="color: #3498db;">{{ $email }}</a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #555; font-weight: bold;">Poste demandé :</td>
                    <td style="padding: 8px 0; color: #333;">{{ $application_type }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #555; font-weight: bold;">Date de candidature :</td>
                    <td style="padding: 8px 0; color: #333;">{{ date('d/m/Y à H:i') }}</td>
                </tr>
            </table>
        </div>
        
        <!-- Actions à effectuer -->
        <div style="border-left: 4px solid #28a745; padding-left: 20px; margin: 25px 0;">
            <h4 style="color: #2c3e50; margin: 0 0 10px 0;">📋 Actions recommandées :</h4>
            <ul style="color: #555; margin: 0; padding-left: 20px;">
                <li>Examiner le CV et la lettre de motivation</li>
                <li>Vérifier la correspondance avec le profil recherché</li>
                <li>Planifier un entretien si le profil convient</li>
                <li>Envoyer une réponse au candidat</li>
            </ul>
        </div>
        
        <!-- Accès au back-office -->
        <div style="background-color: #d1ecf1; padding: 15px; border-radius: 6px; margin: 20px 0; border-left: 4px solid #17a2b8;">
            <p style="color: #0c5460; font-size: 0.9em; margin: 0;">
                <strong>💼 Accès rapide :</strong> Connectez-vous à votre espace de gestion des candidatures 
                pour examiner cette candidature en détail.
            </p>
        </div>
        
        <!-- Signature -->
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ecf0f1;">
            <p style="color: #555; font-size: 0.9em; margin: 0;">
                Cordialement,<br>
                <strong>Système de recrutement COCEC</strong>
            </p>
        </div>
        
        <!-- Pied de page -->
        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #ecf0f1;">
            <p style="font-size: 0.8em; color: #95a5a6; margin: 0;">
                &copy; {{ date('Y') }} COCEC. Tous droits réservés.<br>
                Cet email est généré automatiquement - Ne pas répondre directement
            </p>
        </div>
    </div>
</body>

</html>
