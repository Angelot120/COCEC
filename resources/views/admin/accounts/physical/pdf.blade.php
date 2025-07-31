<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soumission #{{ $submission->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 20px; }
        .section h3 { border-bottom: 1px solid #ccc; padding-bottom: 5px; }
        .info-row { margin-bottom: 10px; }
        .label { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h1>COCEC - Soumission de compte physique</h1>
        <h2>Soumission #{{ $submission->id }}</h2>
        <p>Date de soumission : {{ $submission->created_at ? $submission->created_at->format('d/m/Y H:i') : '-' }}</p>
    </div>

    <div class="section">
        <h3>Informations personnelles</h3>
        <div class="info-row">
            <span class="label">Nom :</span> {{ $submission->last_name }}
        </div>
        <div class="info-row">
            <span class="label">Prénoms :</span> {{ $submission->first_names }}
        </div>
        <div class="info-row">
            <span class="label">Genre :</span> {{ $submission->gender == 'M' ? 'Masculin' : 'Féminin' }}
        </div>
        <div class="info-row">
            <span class="label">Date de naissance :</span> {{ $submission->birth_date ? $submission->birth_date->format('d/m/Y') : '-' }}
        </div>
        <div class="info-row">
            <span class="label">Lieu de naissance :</span> {{ $submission->birth_place }}
        </div>
        <div class="info-row">
            <span class="label">Nationalité :</span> {{ $submission->nationality }}
        </div>
        <div class="info-row">
            <span class="label">Nom du père :</span> {{ $submission->father_name }}
        </div>
        <div class="info-row">
            <span class="label">Nom de la mère :</span> {{ $submission->mother_name }}
        </div>
        <div class="info-row">
            <span class="label">Téléphone :</span> {{ $submission->phone ?? '-' }}
        </div>
    </div>

    <div class="section">
        <h3>Informations supplémentaires</h3>
        <div class="info-row">
            <span class="label">Statut marital :</span> {{ $submission->marital_status }}
        </div>
        <div class="info-row">
            <span class="label">Nom du conjoint :</span> {{ $submission->spouse_name ?? '-' }}
        </div>
        <div class="info-row">
            <span class="label">Profession :</span> {{ $submission->occupation }}
        </div>
        <div class="info-row">
            <span class="label">Nom de l'entreprise :</span> {{ $submission->company_name_activity ?? '-' }}
        </div>
    </div>

    <div class="section">
        <h3>Informations de compte</h3>
        <div class="info-row">
            <span class="label">Statut :</span> {{ ucfirst($submission->statut ?? 'en_attente') }}
        </div>
        <div class="info-row">
            <span class="label">Numéro de compte :</span> {{ $submission->account_number ?? '-' }}
        </div>
        <div class="info-row">
            <span class="label">Date d'adhésion :</span> {{ $submission->membership_date ? \Carbon\Carbon::parse($submission->membership_date)->format('d/m/Y') : '-' }}
        </div>
        <div class="info-row">
            <span class="label">Date d'ouverture :</span> {{ $submission->account_opening_date ? \Carbon\Carbon::parse($submission->account_opening_date)->format('d/m/Y') : '-' }}
        </div>
        <div class="info-row">
            <span class="label">Dépôt initial :</span> {{ $submission->initial_deposit ?? '-' }}
        </div>
    </div>

    @if($submission->remarks)
    <div class="section">
        <h3>Remarques</h3>
        <p>{{ $submission->remarks }}</p>
    </div>
    @endif

    <div class="section">
        <p><em>Document généré le {{ now()->format('d/m/Y H:i:s') }}</em></p>
    </div>
</body>
</html> 