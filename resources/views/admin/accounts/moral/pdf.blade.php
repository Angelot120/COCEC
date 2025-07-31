<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande morale #{{ $submission->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #2c3e50;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            color: #7f8c8d;
        }
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        .section-title {
            background-color: #34495e;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            color: #2c3e50;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 3px;
        }
        .info-value {
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #ecf0f1;
            padding-bottom: 5px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 12px;
        }
        .table th {
            background-color: #34495e;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        .table td {
            padding: 8px 10px;
            border-bottom: 1px solid #ecf0f1;
        }
        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-en_attente { background-color: #fff3cd; color: #856404; }
        .status-accepter { background-color: #d4edda; color: #155724; }
        .status-refuser { background-color: #f8d7da; color: #721c24; }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #7f8c8d;
            border-top: 1px solid #ecf0f1;
            padding-top: 20px;
        }
        .page-break {
            page-break-before: always;
        }
        .full-width {
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DEMANDE D'OUVERTURE DE COMPTE - PERSONNE MORALE</h1>
        <p>Numéro de soumission: #{{ $submission->id }}</p>
        <p>Date de soumission: {{ $submission->created_at->format('d/m/Y à H:i') }}</p>
        <p>Statut: <span class="status-badge status-{{ $submission->statut }}">
            @if($submission->statut == 'en_attente') En attente
            @elseif($submission->statut == 'accepter') Accepté
            @elseif($submission->statut == 'refuser') Refusé
            @else {{ $submission->statut }}
            @endif
        </span></p>
    </div>

    <!-- Informations de l'entreprise -->
    <div class="section">
        <div class="section-title">INFORMATIONS DE L'ENTREPRISE</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nom de l'entreprise</div>
                <div class="info-value">{{ $submission->company_name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Catégorie</div>
                <div class="info-value">{{ $submission->category ?? 'Non spécifiée' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">RCCM</div>
                <div class="info-value">{{ $submission->rccm }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Secteur d'activité</div>
                <div class="info-value">{{ $submission->activity_sector }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Date de création</div>
                <div class="info-value">{{ $submission->creation_date ? $submission->creation_date->format('d/m/Y') : 'Non spécifiée' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Lieu de création</div>
                <div class="info-value">{{ $submission->creation_place }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Nationalité</div>
                <div class="info-value">{{ $submission->company_nationality }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Téléphone</div>
                <div class="info-value">{{ $submission->company_phone }}</div>
            </div>
            <div class="info-item full-width">
                <div class="info-label">Adresse</div>
                <div class="info-value">{{ $submission->company_address }}</div>
            </div>
            @if($submission->activity_description)
            <div class="info-item full-width">
                <div class="info-label">Description de l'activité</div>
                <div class="info-value">{{ $submission->activity_description }}</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Informations du directeur -->
    <div class="section">
        <div class="section-title">INFORMATIONS DU DIRECTEUR</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nom complet</div>
                <div class="info-value">{{ $submission->director_name }} {{ $submission->director_first_name ?? '' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Poste</div>
                <div class="info-value">{{ $submission->director_position }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Genre</div>
                <div class="info-value">{{ $submission->director_gender == 'M' ? 'Masculin' : 'Féminin' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Nationalité</div>
                <div class="info-value">{{ $submission->director_nationality }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Date de naissance</div>
                <div class="info-value">{{ $submission->director_birth_date ? $submission->director_birth_date->format('d/m/Y') : 'Non spécifiée' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Lieu de naissance</div>
                <div class="info-value">{{ $submission->director_birth_place }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Numéro de pièce</div>
                <div class="info-value">{{ $submission->director_id_number }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Date d'émission</div>
                <div class="info-value">{{ $submission->director_id_issue_date ? $submission->director_id_issue_date->format('d/m/Y') : 'Non spécifiée' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Téléphone</div>
                <div class="info-value">{{ $submission->director_phone }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Nom du père</div>
                <div class="info-value">{{ $submission->director_father_name ?? 'Non spécifié' }}</div>
            </div>
        </div>
    </div>

    <!-- KYC Information -->
    <div class="section">
        <div class="section-title">KYC (KNOW YOUR CUSTOMER)</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Personne politiquement exposée (nationale)</div>
                <div class="info-value">{{ $submission->is_ppe_national ? 'Oui' : 'Non' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Personne politiquement exposée (étrangère)</div>
                <div class="info-value">{{ $submission->ppe_foreign ? 'Oui' : 'Non' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Dépôt initial</div>
                <div class="info-value">{{ number_format($submission->initial_deposit, 2) }} FCFA</div>
            </div>
            @if($submission->sanctions)
            <div class="info-item">
                <div class="info-label">Sanctions</div>
                <div class="info-value">{{ $submission->sanctions }}</div>
            </div>
            @endif
            @if($submission->terrorism_financing)
            <div class="info-item">
                <div class="info-label">Financement du terrorisme</div>
                <div class="info-value">{{ $submission->terrorism_financing }}</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Co-directeurs -->
    @if (!$submission->coDirectors->isEmpty())
    <div class="section">
        <div class="section-title">CO-DIRECTEURS</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Poste</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submission->coDirectors as $coDirector)
                    <tr>
                        <td>{{ $coDirector->name }}</td>
                        <td>{{ $coDirector->position }}</td>
                        <td>{{ $coDirector->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Signataires du compte -->
    @if (!$submission->accountSignatories->isEmpty())
    <div class="section">
        <div class="section-title">SIGNATAIRES DU COMPTE</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type de signature</th>
                    <th>Numéro de pièce</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submission->accountSignatories as $signatory)
                    <tr>
                        <td>{{ $signatory->name }}</td>
                        <td>{{ $signatory->signature_type }}</td>
                        <td>{{ $signatory->id_number ?? 'Non spécifié' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Bénéficiaires -->
    @if (!$submission->beneficiaries->isEmpty())
    <div class="section">
        <div class="section-title">BÉNÉFICIAIRES</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>Lien</th>
                    <th>Date de naissance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submission->beneficiaries as $beneficiary)
                    <tr>
                        <td>{{ $beneficiary->nom }}</td>
                        <td>{{ $beneficiary->contact }}</td>
                        <td>{{ $beneficiary->lien }}</td>
                        <td>{{ $beneficiary->birth_date ? $beneficiary->birth_date->format('d/m/Y') : 'Non spécifiée' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Informations du compte -->
    <div class="section">
        <div class="section-title">INFORMATIONS DU COMPTE</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Numéro de compte</div>
                <div class="info-value">{{ $submission->account_number ?? 'Non attribué' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Date d'adhésion</div>
                <div class="info-value">{{ $submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'Non définie' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Date d'ouverture</div>
                <div class="info-value">{{ $submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'Non définie' }}</div>
            </div>
            @if($submission->remarks)
            <div class="info-item full-width">
                <div class="info-label">Remarques</div>
                <div class="info-value">{{ $submission->remarks }}</div>
            </div>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>Document généré le {{ now()->format('d/m/Y à H:i:s') }}</p>
        <p>COCEC - Système de gestion des comptes</p>
    </div>
</body>
</html> 