@extends('layout.admin')

@section('title', 'Détails du Formulaire - Finance Digitale')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Détails du Formulaire de Mise à Jour</h6>
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
                    <a href="{{ route('admin.digitalfinance.updates.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        Formulaires de Mise à Jour
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
                    <h6 class="fw-semibold mb-0">Formulaire #{{ $update->id }}</h6>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('admin.digitalfinance.updates.edit', $update) }}" class="btn btn-warning">
                            <iconify-icon icon="lucide:edit" class="icon"></iconify-icon>
                            Modifier
                        </a>
                        <a href="{{ route('admin.digitalfinance.updates.index') }}" class="btn btn-secondary">
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
                            <span class="badge bg-{{ $update->status_color }} fs-6">
                                {{ $update->status_label }}
                            </span>
                            <span class="text-muted">Soumis le {{ $update->created_at->format('d/m/Y à H:i') }}</span>
                        </div>
                        <h5 class="fw-semibold mb-2">{{ $update->full_name }}</h5>
                        <p class="text-muted mb-0">Compte: {{ $update->account_number }}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="d-flex flex-column gap-2">
                            <div>
                                <strong>CNI:</strong> {{ $update->cni_type }} - {{ $update->cni_number }}
                        </div>
                            @if($update->email)
                                <div>
                                    <strong>Email:</strong> {{ $update->email }}
                    </div>
                            @endif
                        </div>
                        </div>
                    </div>

                <!-- Informations du client -->
                <div class="card mb-24">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="fw-semibold mb-0">
                            <iconify-icon icon="ph:user" class="icon"></iconify-icon>
                            Informations du Client
                        </h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="150" class="text-muted">Nom complet :</th>
                                        <td class="fw-semibold">{{ $update->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Numéro de compte :</th>
                                        <td class="fw-semibold">{{ $update->account_number }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Type de document :</th>
                                        <td>{{ $update->cni_type }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Numéro de document :</th>
                                        <td>{{ $update->cni_number }}</td>
                                    </tr>
                                </table>
                        </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    @if($update->email)
                                        <tr>
                                            <th width="150" class="text-muted">Email :</th>
                                            <td>{{ $update->email }}</td>
                                        </tr>
                                    @endif
                                    @if($update->togocel)
                                        <tr>
                                            <th class="text-muted">Togocel :</th>
                                            <td>{{ $update->togocel }}</td>
                                        </tr>
                                    @endif
                                    @if($update->tmoney)
                                        <tr>
                                            <th class="text-muted">Tmoney :</th>
                                            <td>{{ $update->tmoney }}</td>
                                        </tr>
                                    @endif
                                    @if($update->moov)
                                        <tr>
                                            <th class="text-muted">Moov :</th>
                                            <td>{{ $update->moov }}</td>
                                        </tr>
                                    @endif
                                    @if($update->flooz)
                                        <tr>
                                            <th class="text-muted">Flooz :</th>
                                            <td>{{ $update->flooz }}</td>
                                        </tr>
                                    @endif
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
                                <h6 class="fw-semibold mb-3 text-primary">Togocel</h6>
                                <div class="d-flex flex-column gap-2">
                                    @if($update->mobile_banking_togocel)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Mobile Banking</span>
                                        </div>
                                    @endif
                                    @if($update->mobile_money_togocel)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Mobile Money</span>
                                        </div>
                                    @endif
                                    @if($update->web_banking_togocel)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Web Banking</span>
                                        </div>
                                    @endif
                                    @if($update->sms_banking_togocel)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>SMS Banking</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-3 text-primary">Moov</h6>
                                <div class="d-flex flex-column gap-2">
                                    @if($update->mobile_banking_moov)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Mobile Banking</span>
                                        </div>
                                    @endif
                                    @if($update->mobile_money_moov)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Mobile Money</span>
                                        </div>
                                    @endif
                                    @if($update->web_banking_moov)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>Web Banking</span>
                                        </div>
                                    @endif
                                    @if($update->sms_banking_moov)
                                        <div class="d-flex align-items-center gap-2">
                                            <iconify-icon icon="ph:check-circle-fill" class="text-success"></iconify-icon>
                                            <span>SMS Banking</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Aucun service sélectionné -->
                        @if(!$update->mobile_banking_togocel && !$update->mobile_banking_moov && 
                            !$update->mobile_money_togocel && !$update->mobile_money_moov && 
                            !$update->web_banking_togocel && !$update->web_banking_moov && 
                            !$update->sms_banking_togocel && !$update->sms_banking_moov)
                            <div class="text-center py-4">
                                <div class="text-muted">
                                    <iconify-icon icon="ph:warning-circle" class="text-4xl mb-2"></iconify-icon>
                                    <p class="mb-0">Aucun service sélectionné</p>
                                </div>
                            </div>
                        @endif
                            </div>
                        </div>

                <!-- WhatsApp -->
                @if($update->whatsapp_togocel || $update->whatsapp_moov)
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">
                                <iconify-icon icon="ph:whatsapp-logo" class="icon"></iconify-icon>
                                Numéros WhatsApp
                            </h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                @if($update->whatsapp_togocel)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-success">Togocel</span>
                                            <span>{{ $update->whatsapp_togocel }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if($update->whatsapp_moov)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-primary">Moov</span>
                                            <span>{{ $update->whatsapp_moov }}</span>
                                        </div>
                            </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Notes -->
                @if($update->notes)
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">
                                <iconify-icon icon="ph:note" class="icon"></iconify-icon>
                                Notes Additionnelles
                            </h6>
                        </div>
                        <div class="card-body p-24">
                            <p class="mb-0">{{ $update->notes }}</p>
                    </div>
                </div>
                @endif

                <!-- Actions -->
                <div class="card">
                    <div class="card-header bg-base py-16 px-24">
                        <h6 class="fw-semibold mb-0">Mettre à jour le statut</h6>
                        </div>
                    <div class="card-body p-24">
                        <form action="{{ route('admin.digitalfinance.updates.updateStatus', $update) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="from_show" value="1">
                            <div class="mb-16">
                                <label for="status" class="form-label">Statut</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="pending" {{ $update->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="approved" {{ $update->status == 'approved' ? 'selected' : '' }}>Approuvé</option>
                                    <option value="rejected" {{ $update->status == 'rejected' ? 'selected' : '' }}>Rejeté</option>
                                </select>
                        </div>
                            <div class="mb-16">
                                <label for="notes" class="form-label">Notes additionnelles</label>
                                <textarea name="notes" id="notes" class="form-control" rows="4">{{ $update->notes }}</textarea>
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