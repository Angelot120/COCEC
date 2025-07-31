
@extends('layout.admin')

@section('content')
<div class="container-fluid {{ request()->query('print') ? 'printable' : '' }}">
    <h1 class="mt-4">Détails de la soumission #{{ $submission->id }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Actions -->
    <div class="mb-4 no-print">
        <a href="{{ route('accounts.physical.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour à la liste
        </a>
        <a href="{{ route('accounts.physical.pdf', $submission->id) }}" class="btn btn-primary">
            <i class="bi bi-file-earmark-pdf"></i> Télécharger PDF
        </a>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="bi bi-printer"></i> Imprimer
        </button>
    </div>

    <!-- Personal Information -->
    <div class="card mb-4">
        <div class="card-header">Informations personnelles</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nom :</strong> {{ $submission->last_name }}</p>
                    <p><strong>Prénoms :</strong> {{ $submission->first_names }}</p>
                    <p><strong>Genre :</strong> {{ $submission->gender == 'M' ? 'Masculin' : 'Féminin' }}</p>
                    <p><strong>Date de naissance :</strong> {{ $submission->birth_date ? $submission->birth_date->format('d/m/Y') : '-' }}</p>
                    <p><strong>Lieu de naissance :</strong> {{ $submission->birth_place }}</p>
                    <p><strong>Nationalité :</strong> {{ $submission->nationality }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Nom du père :</strong> {{ $submission->father_name }}</p>
                    <p><strong>Nom de la mère :</strong> {{ $submission->mother_name }}</p>
                    <p><strong>Téléphone :</strong> {{ $submission->phone ?? '-' }}</p>
                    <p><strong>Catégorie :</strong> {{ $submission->category ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="card mb-4">
        <div class="card-header">Informations supplémentaires</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Statut marital :</strong> {{ $submission->marital_status }}</p>
                    <p><strong>Nom du conjoint :</strong> {{ $submission->spouse_name ?? '-' }}</p>
                    <p><strong>Profession du conjoint :</strong> {{ $submission->spouse_occupation ?? '-' }}</p>
                    <p><strong>Téléphone du conjoint :</strong> {{ $submission->spouse_phone ?? '-' }}</p>
                    <p><strong>Adresse du conjoint :</strong> {{ $submission->spouse_address ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Profession :</strong> {{ $submission->occupation }}</p>
                    <p><strong>Nom de l’entreprise :</strong> {{ $submission->company_name_activity ?? '-' }}</p>
                    <p><strong>Type d’activité :</strong> {{ $submission->activity_type ?? '-' }}</p>
                    <p><strong>Description de l’activité :</strong> {{ $submission->activity_description ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Residence & Workplace -->
    <div class="card mb-4">
        <div class="card-header">Résidence & Lieu de travail</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Résidence</h5>
                    <p><strong>Description :</strong> {{ $submission->residence_description ?? '-' }}</p>
                    @if ($submission->residence_lat && $submission->residence_lng)
                        <p><strong>Coordonnées :</strong> {{ $submission->residence_lat }}, {{ $submission->residence_lng }}</p>
                    @endif
                    @if ($submission->residence_plan_path)
                        <p><strong>Plan :</strong> <a href="{{ Storage::url($submission->residence_plan_path) }}" target="_blank">Voir le plan</a></p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Lieu de travail</h5>
                    <p><strong>Description :</strong> {{ $submission->workplace_description ?? '-' }}</p>
                    @if ($submission->workplace_lat && $submission->workplace_lng)
                        <p><strong>Coordonnées :</strong> {{ $submission->workplace_lat }}, {{ $submission->workplace_lng }}</p>
                    @endif
                    @if ($submission->workplace_plan_path)
                        <p><strong>Plan :</strong> <a href="{{ Storage::url($submission->workplace_plan_path) }}" target="_blank">Voir le plan</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- KYC Information -->
    <div class="card mb-4">
        <div class="card-header">KYC (Know Your Customer)</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Type de pièce :</strong> {{ $submission->id_type }}</p>
                    <p><strong>Numéro de pièce :</strong> {{ $submission->id_number }}</p>
                    <p><strong>Date d’émission :</strong> {{ $submission->id_issue_date ? $submission->id_issue_date->format('d/m/Y') : '-' }}</p>
                    <p><strong>Personne politiquement exposée (nationale) :</strong> {{ $submission->is_ppe_national ? 'Oui' : 'Non' }}</p>
                    <p><strong>Personne politiquement exposée (étrangère) :</strong> {{ $submission->ppe_foreign ? 'Oui' : 'Non' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Sanctions :</strong> {{ $submission->sanctions ?? '-' }}</p>
                    <p><strong>Financement du terrorisme :</strong> {{ $submission->terrorism_financing ?? '-' }}</p>
                    <p><strong>Dépôt initial :</strong> {{ number_format($submission->initial_deposit, 2) }} FCFA</p>
                </div>
            </div>
        </div>
    </div>

    <!-- References -->
    <div class="card mb-4">
        <div class="card-header">Références</div>
        <div class="card-body">
            @if ($submission->references->isEmpty())
                <p>Aucune référence enregistrée.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Téléphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submission->references as $reference)
                            <tr>
                                <td>{{ $reference->name }}</td>
                                <td>{{ $reference->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Beneficiaries -->
    <div class="card mb-4">
        <div class="card-header">Bénéficiaires</div>
        <div class="card-body">
            @if ($submission->beneficiaries->isEmpty())
                <p>Aucun bénéficiaire enregistré.</p>
            @else
                <table class="table table-bordered">
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
                                <td>{{ $beneficiary->birth_date ? $beneficiary->birth_date->format('d/m/Y') : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Documents -->
    <div class="card mb-4">
        <div class="card-header">Documents</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Photo d’identité :</strong> <a href="{{ Storage::url($submission->photo_path) }}" target="_blank">Voir la photo</a></p>
                    <p><strong>Scan de la pièce :</strong> <a href="{{ Storage::url($submission->id_scan_path) }}" target="_blank">Voir le scan</a></p>
                </div>
                <div class="col-md-6">
                    @if ($submission->signature_method === 'draw' && $submission->signature_base64)
                        <p><strong>Signature :</strong></p>
                        <img src="data:image/png;base64,{{ $submission->signature_base64 }}" alt="Signature" style="max-width: 200px;">
                    @elseif ($submission->signature_method === 'upload' && $submission->signature_upload_path)
                        <p><strong>Signature :</strong> <a href="{{ Storage::url($submission->signature_upload_path) }}" target="_blank">Voir la signature</a></p>
                    @else
                        <p><strong>Signature :</strong> Aucune signature disponible</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update Form -->
    <div class="card mb-4 no-print">
        <div class="card-header">Mettre à jour le statut</div>
        <div class="card-body">
            <form action="{{ route('accounts.physical.update', $submission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <select name="statut" id="statut" class="form-control">
                                <option value="en_attente" {{ $submission->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                <option value="accepter" {{ $submission->statut == 'accepter' ? 'selected' : '' }}>Accepté</option>
                                <option value="refuser" {{ $submission->statut == 'refuser' ? 'selected' : '' }}>Refusé</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Numéro de compte</label>
                            <input type="text" name="account_number" id="account_number" class="form-control" value="{{ $submission->account_number }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="membership_date">Date d’adhésion</label>
                            <input type="date" name="membership_date" id="membership_date" class="form-control" value="{{ $submission->membership_date ? $submission->membership_date->format('Y-m-d') : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="account_opening_date">Date d’ouverture de compte</label>
                            <input type="date" name="account_opening_date" id="account_opening_date" class="form-control" value="{{ $submission->account_opening_date ? $submission->account_opening_date->format('Y-m-d') : '' }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarques</label>
                    <textarea name="remarks" id="remarks" class="form-control" rows="4">{{ $submission->remarks }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>

<style>
@media print {
    body * {
        visibility: hidden;
    }
    .printable, .printable * {
        visibility: visible;
    }
    .printable {
        position: absolute;
        left: 0;
        top: 0;
    }
    .no-print {
        display: none;
    }
}
</style>
@endsection
