<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle plainte déposée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #EC281C;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 20px;
            border: 1px solid #dee2e6;
        }
        .complaint-details {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            border-left: 4px solid #EC281C;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #EC281C;
        }
        .field-value {
            margin-top: 5px;
            padding: 8px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background: #6c757d;
            color: white;
            border-radius: 0 0 8px 8px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #EC281C;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🚨 Nouvelle Plainte Déposée</h1>
        <p>Une nouvelle plainte a été soumise via le formulaire de la COCEC</p>
    </div>

    <div class="content">
        <div class="complaint-details">
            <h2>Détails de la plainte</h2>
            
            <div class="field">
                <div class="field-label">Référence :</div>
                <div class="field-value">{{ $complaint->reference }}</div>
            </div>

            <div class="field">
                <div class="field-label">Membre :</div>
                <div class="field-value">
                    <strong>{{ $complaint->member_name }}</strong><br>
                    Numéro d'adhérent : {{ $complaint->member_number }}<br>
                    Téléphone : {{ $complaint->member_phone }}
                    @if($complaint->member_email)
                        <br>Email : {{ $complaint->member_email }}
                    @endif
                </div>
            </div>

            <div class="field">
                <div class="field-label">Catégorie :</div>
                <div class="field-value">{{ $complaint->category_label }}</div>
            </div>

            <div class="field">
                <div class="field-label">Objet :</div>
                <div class="field-value">{{ $complaint->subject }}</div>
            </div>

            <div class="field">
                <div class="field-label">Description :</div>
                <div class="field-value">{{ $complaint->description }}</div>
            </div>

            <div class="field">
                <div class="field-label">Date de soumission :</div>
                <div class="field-value">{{ $complaint->created_at->format('d/m/Y H:i') }}</div>
            </div>

            @if($complaint->attachments)
            <div class="field">
                <div class="field-label">Pièces jointes :</div>
                <div class="field-value">
                    @foreach($complaint->attachments as $attachment)
                        • {{ basename($attachment) }}<br>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div style="text-align: center;">
            <a href="{{ route('admin.complaints.show', $complaint->id) }}" class="btn">
                Voir les détails complets
            </a>
        </div>

        <div style="margin-top: 20px; padding: 15px; background: #e9ecef; border-radius: 5px;">
            <strong>Action requise :</strong> Cette plainte nécessite votre attention. 
            Veuillez la traiter dans les plus brefs délais conformément aux procédures de la COCEC.
        </div>
    </div>

    <div class="footer">
        <p><strong>COCEC - Gestion des Plaintes</strong></p>
        <p>Cet email a été généré automatiquement. Merci de ne pas y répondre directement.</p>
    </div>
</body>
</html>
