@extends('rms.layout.app')
@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Update Documentation & Formalities</h4>
            <small class="text-muted">
                {{ $tenancy->shop->shop_name ?? ('Shop #' . $tenancy->shop_id) }} — {{ $tenancy->project->name ?? 'Project' }}
            </small>
        </div>
        <a href="{{ route('rms.profile') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Profile
        </a>
    </div>

    @if($tenancy->onboarding_status === 'Corrections Required' && !empty($tenancy->manager_notes))
        <div class="alert alert-danger mb-4">
            <strong><i class="bi bi-exclamation-triangle-fill me-1"></i> Manager Correction Notes:</strong>
            <p class="mb-0 mt-1">{{ $tenancy->manager_notes }}</p>
        </div>
    @endif

    @php
        $verif = $tenancy->verification;
        $docs = $tenancy->tenant->documents;
    @endphp

    <form method="POST" action="{{ route('rms.tenancy.update', $tenancy->id) }}" enctype="multipart/form-data">
        @csrf

        {{-- 1. KYC Documents --}}
        <div class="card tcard mb-4">
            <div class="card-head bg-g-blue">
                <h6 class="mb-0">1. Personal KYC & Identity Documents</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Government Photo ID Proof</label>
                        <input type="file" name="identity_proof" class="form-control" accept=".pdf,image/*">
                        @if(!empty($docs?->identity_proof))
                            <small class="d-block mt-1">Current: <a href="{{ $docs->identity_proof }}" target="_blank">View File</a></small>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">PAN Card</label>
                        <input type="file" name="pan_card" class="form-control" accept=".pdf,image/*">
                        @if(!empty($docs?->pan_card))
                            <small class="d-block mt-1">Current: <a href="{{ $docs->pan_card }}" target="_blank">View File</a></small>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Address Proof (Electricity Bill/Voter ID/Passport)</label>
                        <input type="file" name="address_proof" class="form-control" accept=".pdf,image/*">
                        @if(!empty($docs?->address_proof))
                            <small class="d-block mt-1">Current: <a href="{{ $docs->address_proof }}" target="_blank">View File</a></small>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Employment Proof / Company ID</label>
                        <input type="file" name="employment_proof" class="form-control" accept=".pdf,image/*">
                        @if(!empty($docs?->employment_proof))
                            <small class="d-block mt-1">Current: <a href="{{ $docs->employment_proof }}" target="_blank">View File</a></small>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Lease Formalities & Verifications --}}
        <div class="card tcard mb-4">
            <div class="card-head bg-g-pink">
                <h6 class="mb-0">2. Police Verification & Rent Agreement</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    {{-- Police Verification --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Police Verification Status</label>
                        <select name="police_status" class="form-select">
                            <option value="Not started" {{ ($verif?->police_status ?? '') === 'Not started' ? 'selected' : '' }}>Not started</option>
                            <option value="Applied" {{ ($verif?->police_status ?? '') === 'Applied' ? 'selected' : '' }}>Applied</option>
                            <option value="Under process" {{ ($verif?->police_status ?? '') === 'Under process' ? 'selected' : '' }}>Under process</option>
                            <option value="Completed" {{ ($verif?->police_status ?? '') === 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Police Ref / Ack Number</label>
                        <input type="text" name="police_ref" class="form-control" value="{{ $verif->police_ref ?? '' }}" placeholder="Acknowledgement Number">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Upload Police Verification Copy</label>
                        <input type="file" name="police_file" class="form-control" accept=".pdf,image/*">
                        @if(!empty($verif?->police_file))
                            <small class="d-block mt-1">Current: <a href="{{ $verif->police_file }}" target="_blank">View File</a></small>
                        @endif
                    </div>

                    {{-- Agreement --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Rent Agreement Status</label>
                        <select name="agreement_status" class="form-select">
                            <option value="Not started" {{ ($verif?->agreement_status ?? '') === 'Not started' ? 'selected' : '' }}>Not started</option>
                            <option value="Draft prepared" {{ ($verif?->agreement_status ?? '') === 'Draft prepared' ? 'selected' : '' }}>Draft prepared</option>
                            <option value="Sent for signing" {{ ($verif?->agreement_status ?? '') === 'Sent for signing' ? 'selected' : '' }}>Sent for signing</option>
                            <option value="Executed" {{ ($verif?->agreement_status ?? '') === 'Executed' ? 'selected' : '' }}>Executed</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Agreement Execution Date</label>
                        <input type="date" name="agreement_date" class="form-control" value="{{ $verif->agreement_date ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Signed Rent Agreement Copy</label>
                        <input type="file" name="agreement_file" class="form-control" accept=".pdf,image/*">
                        @if(!empty($verif?->agreement_file))
                            <small class="d-block mt-1">Current: <a href="{{ $verif->agreement_file }}" target="_blank">View File</a></small>
                        @endif
                    </div>

                    {{-- RWA --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Society / RWA Submission Method</label>
                        <!-- <input type="text" name="rwa_method" class="form-control" value="{{ $verif->rwa_method ?? '' }}" placeholder="Email / Portal / In-person"> -->
                        <select name="rwa_method" class="form-control">
                            <option value="" selected disabled>Select method</option>
                            <option value="Email" {{ ($verif->rwa_method ?? '') == 'Email' ? 'selected' : '' }}>Email</option>
                            <option value="In person" {{ ($verif->rwa_method ?? '') == 'In person' ? 'selected' : '' }}>In person</option>
                            <option value="Society Portal" {{ ($verif->rwa_method ?? '') == 'Society Portal' ? 'selected' : '' }}>Society Portal</option>
                            <option value="Not required" {{ ($verif->rwa_method ?? '') == 'Not required' ? 'selected' : '' }}>Not required (authorised exception)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">RWA Acknowledgment Receipt</label>
                        <input type="file" name="rwa_file" class="form-control" accept=".pdf,image/*">
                        @if(!empty($verif?->rwa_file))
                            <small class="d-block mt-1">Current: <a href="{{ $verif->rwa_file }}" target="_blank">View File</a></small>
                        @endif
                    </div>
                </div>

                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" name="details_accurate" value="1" id="confirmDetails" required {{ !empty($verif?->details_accurate) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="confirmDetails">
                        I confirm all entered details and uploaded documents are authentic.
                    </label>
                </div>
            </div>
        </div>

        <div class="text-end mb-5">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-cloud-arrow-up me-1"></i> Submit Details for Review
            </button>
        </div>
    </form>
</div>
@endsection