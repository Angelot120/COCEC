@extends('layout.admin')

@section('title', 'Détails du Contrat - Finance Digitale')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Détails du Contrat d'Adhésion</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="mdi:cellphone-banking" class="icon text-lg"></iconify-icon>
                        Finance Digitale
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    <a href="{{ route('admin.digitalfinance.contracts.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        Contrats d'Adhésion
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Détails</li>
            </ul>
        </div>

        <!-- En-tête avec actions -->
        <div class="card mb-24">
            <div class="card-header bg-base py-16 px-24">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="fw-semibold mb-0">Contrat #{{ $contract->id }}</h6>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('admin.digitalfinance.contracts.pdf', $contract) }}" class="btn btn-primary" target="_blank">
                            <iconify-icon icon="lucide:file-text" class="icon"></iconify-icon>
                            Générer PDF
                        </a>
                        <a href="{{ route('admin.digitalfinance.contracts.edit', $contract) }}" class="btn btn-warning">
                            <iconify-icon icon="lucide:edit" class="icon"></iconify-icon>
                            Modifier
                        </a>
                        <a href="{{ route('admin.digitalfinance.contracts.index') }}" class="btn btn-secondary">
                            <iconify-icon icon="lucide:arrow-left" class="icon"></iconify-icon>
                            Retour
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-24">
                <!-- Statut et informations générales -->
                <div class="row mb-24">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge bg-{{ $contract->status_color }} fs-6">
                                {{ $contract->status_label }}
                            </span>
                            <span class="text-muted">Créé le {{ $contract->created_at->format('d/m/Y à H:i') }}</span>
                        </div>
                        <h5 class="fw-semibold mb-2">{{ $contract->full_name }}</h5>
                        <p class="text-muted mb-0">Compte: {{ $contract->account_number }}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="d-flex flex-column gap-2">
                            <div>
                                <strong>CNI:</strong> {{ $contract->cni_type ?? 'Non spécifié' }} - {{ $contract->cni_number }}
                            </div>
                            <div>
                                <strong>Téléphone:</strong> {{ $contract->phone }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations du souscripteur -->
                <div class="card mb-24">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="fw-semibold mb-0">
                            <iconify-icon icon="ph:user" class="icon"></iconify-icon>
                            Informations du Souscripteur
                        </h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="150" class="text-muted">Nom complet :</th>
                                        <td class="fw-semibold">{{ $contract->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Numéro de compte :</th>
                                        <td class="fw-semibold">{{ $contract->account_number }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Type de document :</th>
                                        <td>{{ $contract->cni_type ?? 'Non spécifié' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Numéro de document :</th>
                                        <td>{{ $contract->cni_number }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="150" class="text-muted">Téléphone :</th>
                                        <td>{{ $contract->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Adresse :</th>
                                        <td>{{ $contract->address }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Date du contrat :</th>
                                        <td>{{ $contract->contract_date ? $contract->contract_date->format('d/m/Y') : 'Non spécifiée' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Date de création :</th>
                                        <td>{{ $contract->created_at->format('d/m/Y à H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services souscrits -->
                <div class="card mb-24">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="fw-semibold mb-0">
                            <iconify-icon icon="ph:gear" class="icon"></iconify-icon>
                            Services Souscrits
                        </h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-3 text-primary">Services Actifs</h6>
                                <div class="d-flex flex-column gap-2">
                                    @if($contract->mobile_money)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Mobile Money (1000 F/an)</span>
                                        </div>
                                    @endif
                                    @if($contract->mobile_banking)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Mobile Banking (1000 F/an)</span>
                                        </div>
                                    @endif
                                    @if($contract->web_banking)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Web Banking (600 F/an)</span>
                                        </div>
                                    @endif
                                    @if($contract->sms_banking)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>SMS Banking (100 F/mois)</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-3 text-muted">Services Non Souscrits</h6>
                                <div class="d-flex flex-column gap-2">
                                    @if(!$contract->mobile_money)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:x-circle" class="text-muted"></iconify-icon>
                                            <span class="text-muted">Mobile Money</span>
                                        </div>
                                    @endif
                                    @if(!$contract->mobile_banking)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:x-circle" class="text-muted"></iconify-icon>
                                            <span class="text-muted">Mobile Banking</span>
                                        </div>
                                    @endif
                                    @if(!$contract->web_banking)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:x-circle" class="text-muted"></iconify-icon>
                                            <span class="text-muted">Web Banking</span>
                                        </div>
                                    @endif
                                    @if(!$contract->sms_banking)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:x-circle" class="text-muted"></iconify-icon>
                                            <span class="text-muted">SMS Banking</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Aucun service sélectionné -->
                        @if(!$contract->mobile_money && !$contract->mobile_banking && !$contract->web_banking && !$contract->sms_banking)
                            <div class="text-center py-4">
                                <div class="text-muted">
                                    <iconify-icon icon="ph:warning-circle" class="text-4xl mb-2"></iconify-icon>
                                    <p class="mb-0">Aucun service sélectionné</p>
                                </div>
                            </div>
                        @endif

                        <!-- Résumé des coûts -->
                        @if($contract->mobile_money || $contract->mobile_banking || $contract->web_banking || $contract->sms_banking)
                            <div class="mt-4 pt-4 border-top">
                                <h6 class="fw-semibold mb-3 text-primary">Résumé des Coûts Annuels</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Mobile Money:</span>
                                            <span class="fw-semibold">{{ $contract->mobile_money ? '1000 F' : '0 F' }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Mobile Banking:</span>
                                            <span class="fw-semibold">{{ $contract->mobile_banking ? '1000 F' : '0 F' }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Web Banking:</span>
                                            <span class="fw-semibold">{{ $contract->web_banking ? '600 F' : '0 F' }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>SMS Banking:</span>
                                            <span class="fw-semibold">{{ $contract->sms_banking ? '1200 F' : '0 F' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info mb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <strong>Total annuel:</strong>
                                                <strong class="text-primary">
                                                    {{ ($contract->mobile_money ? 1000 : 0) + 
                                                       ($contract->mobile_banking ? 1000 : 0) + 
                                                       ($contract->web_banking ? 600 : 0) + 
                                                       ($contract->sms_banking ? 1200 : 0) }} F
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Notes -->
                @if($contract->notes)
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">
                                <iconify-icon icon="ph:note" class="icon"></iconify-icon>
                                Notes Additionnelles
                            </h6>
                        </div>
                        <div class="card-body p-24">
                            <p class="mb-0">{{ $contract->notes }}</p>
                        </div>
                    </div>
                @endif

                <!-- Actions -->
                <div class="card">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="fw-semibold mb-0">Mettre à jour le statut</h6>
                    </div>
                    <div class="card-body p-24">
                        <form action="{{ route('admin.digitalfinance.contracts.updateStatus', $contract) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="from_show" value="1">
                            <div class="mb-16">
                                <label for="status" class="form-label">Statut</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="pending" {{ $contract->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="active" {{ $contract->status == 'active' ? 'selected' : '' }}>Actif</option>
                                    <option value="terminated" {{ $contract->status == 'terminated' ? 'selected' : '' }}>Terminé</option>
                                </select>
                            </div>
                            <div class="mb-16">
                                <label for="notes" class="form-label">Notes additionnelles</label>
                                <textarea name="notes" id="notes" class="form-control" rows="4">{{ $contract->notes }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.admin.footer')
</main>
@endsection