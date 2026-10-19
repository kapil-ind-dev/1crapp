<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tenant Lease Onboarding — {{ $tenancy->tenant->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #1e293b; }
        .top-navbar { background: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 14px 0; }
        .card-custom { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); margin-bottom: 24px; overflow: hidden; }
        .card-custom .card-header-custom { background: #f8fafc; padding: 14px 20px; font-weight: 700; border-bottom: 1px solid #e2e8f0; font-size: 0.95rem; }
        .card-custom .card-body { padding: 22px; }
        .verify-box { max-width: 460px; margin: 40px auto; background: #fff; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 10px 25px rgba(0,0,0,0.06); padding: 32px; }
        .icon-circle { width: 56px; height: 56px; border-radius: 50%; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 26px; margin: 0 auto 16px; }
    </style>
</head>
<body>

    <!-- Simple Top Bar (No Sidebar, No Portal Layout) -->
    <header class="top-navbar mb-4 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="fw-bold text-primary"><i class="bi bi-building me-1"></i> RMS Onboarding Portal</span>
            <span class="badge bg-light text-secondary border px-3 py-2">
                Lease Reference #{{ $tenancy->id }}
            </span>
        </div>
    </header>

    <div class="container pb-5">

        {{-- Alerts --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ========================================================================= --}}
        {{-- STEP 1: IF NOT VERIFIED -> SHOW AGENT IDENTITY VERIFICATION SCREEN         --}}
        {{-- ========================================================================= --}}
        @if(!$isVerified)
            <div class="verify-box text-center">
                <div class="icon-circle">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h4 class="fw-bold mb-1">Agent Verification</h4>
                <p class="text-muted small mb-4">
                    Please verify your registered contact info to update details for 
                    <strong>{{ $tenancy->tenant->name }}</strong> ({{ $tenancy->shop->shop_name ?? 'Unit #' . $tenancy->shop_id }}).
                </p>

                <form method="POST" action="{{ route('rms.public.onboard-verify', $token) }}">
                    @csrf
                    <div class="mb-3 text-start">
                        <label class="form-label small fw-bold">Agent Mobile Number or Email *</label>
                        <input type="text" 
                               name="agent_credential" 
                               class="form-control py-2" 
                               placeholder="e.g. 9876543210 or agent@email.com" 
                               required 
                               autofocus>
                        <small class="text-muted d-block mt-1" style="font-size: 11px;">
                            Enter the phone or email specified when creating this tenancy.
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                        Verify & Open Form <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </form>
            </div>

        {{-- ========================================================================= --}}
        {{-- STEP 2: IF VERIFIED -> SHOW FULL DOCUMENT UPLOAD FORM                     --}}
        {{-- ========================================================================= --}}
        @else
            @php
                $verif = $tenancy->verification;
                $docs  = $tenancy->tenant->documents;
            @endphp

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <div>
                    <h3 class="fw-bold mb-0">Update Tenancy Documents & Proofs</h3>
                    <div class="text-muted small mt-1">
                        <strong>Tenant:</strong> {{ $tenancy->tenant->name }} ({{ $tenancy->tenant->mobile }}) | 
                        <strong>Property:</strong> {{ $tenancy->shop->shop_name ?? ('Shop #' . $tenancy->shop_id) }} ({{ $tenancy->project->name ?? 'Project' }})
                    </div>
                </div>
                <div>
                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                        Status: {{ $tenancy->onboarding_status ?? 'Submitted' }}
                    </span>
                </div>
            </div>

            @if($tenancy->onboarding_status === 'Corrections Required' && !empty($tenancy->manager_notes))
                <div class="alert alert-warning mb-4">
                    <strong><i class="bi bi-exclamation-circle-fill me-1"></i> Return Notes:</strong>
                    <div class="mt-1 small">{{ $tenancy->manager_notes }}</div>
                </div>
            @endif

            <form method="POST" action="{{ route('rms.public.onboard-save', $token) }}" enctype="multipart/form-data">
                @csrf

                <!-- 1. KYC Documents -->
                <div class="card-custom">
                    <div class="card-header-custom text-primary">
                        <i class="bi bi-person-badge me-2"></i>1. Tenant KYC & Identity Documents
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">ID Proof (Aadhaar / Voter ID / Passport)</label>
                                <input type="file" name="identity_proof" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($docs?->identity_proof))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $docs->identity_proof }}" target="_blank">View Uploaded ID</a>
                                    </small>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">PAN Card Document</label>
                                <input type="file" name="pan_card" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($docs?->pan_card))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $docs->pan_card }}" target="_blank">View Uploaded PAN</a>
                                    </small>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Permanent Address Proof</label>
                                <input type="file" name="address_proof" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($docs?->address_proof))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $docs->address_proof }}" target="_blank">View Address Proof</a>
                                    </small>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Employment Proof / Business Registration</label>
                                <input type="file" name="employment_proof" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($docs?->employment_proof))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $docs->employment_proof }}" target="_blank">View Employment Proof</a>
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Police & Agreement Formalities -->
                <div class="card-custom">
                    <div class="card-header-custom text-primary">
                        <i class="bi bi-shield-check me-2"></i>2. Lease Agreement & Police Verification
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            {{-- Police Verification --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Police Verification Status *</label>
                                <select name="police_status" class="form-select" {{ $isLocked ? 'disabled' : '' }}>
                                    <option value="Not started" {{ ($verif?->police_status ?? '') === 'Not started' ? 'selected' : '' }}>Not started</option>
                                    <option value="Applied" {{ ($verif?->police_status ?? '') === 'Applied' ? 'selected' : '' }}>Applied</option>
                                    <option value="Under process" {{ ($verif?->police_status ?? '') === 'Under process' ? 'selected' : '' }}>Under process</option>
                                    <option value="Completed" {{ ($verif?->police_status ?? '') === 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <!-- <div class="col-md-4">
                                <label class="form-label fw-bold small">Police Reference / Ack #</label>
                                <input type="text" name="police_ref" class="form-control" value="{{ $verif->police_ref ?? '' }}" placeholder="Ref number" {{ $isLocked ? 'disabled' : '' }}>
                            </div> -->

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Upload Police Copy</label>
                                <input type="file" name="police_file" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($verif?->police_file))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $verif->police_file }}" target="_blank">View Police Copy</a>
                                    </small>
                                @endif
                            </div>

                            {{-- Agreement --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Rent Agreement Status *</label>
                                <select name="agreement_status" class="form-select" {{ $isLocked ? 'disabled' : '' }}>
                                    <option value="Not started" {{ ($verif?->agreement_status ?? '') === 'Not started' ? 'selected' : '' }}>Not started</option>
                                    <option value="Draft prepared" {{ ($verif?->agreement_status ?? '') === 'Draft prepared' ? 'selected' : '' }}>Draft prepared</option>
                                    <option value="Sent for signing" {{ ($verif?->agreement_status ?? '') === 'Sent for signing' ? 'selected' : '' }}>Sent for signing</option>
                                    <option value="Executed" {{ ($verif?->agreement_status ?? '') === 'Executed' ? 'selected' : '' }}>Executed</option>
                                </select>
                            </div>

                            <!-- <div class="col-md-4">
                                <label class="form-label fw-bold small">Execution Date</label>
                                <input type="date" name="agreement_date" class="form-control" value="{{ $verif->agreement_date ?? '' }}" {{ $isLocked ? 'disabled' : '' }}>
                            </div> -->

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Signed Agreement Copy *</label>
                                <input type="file" name="agreement_file" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($verif?->agreement_file))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $verif->agreement_file }}" target="_blank">View Agreement Copy</a>
                                    </small>
                                @endif
                            </div>

                            <!-- {{-- RWA --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">RWA / Society Submission Method</label>
                                <input type="text" name="rwa_method" class="form-control" value="{{ $verif->rwa_method ?? '' }}" placeholder="Email / Society Portal / In-person" {{ $isLocked ? 'disabled' : '' }}>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">RWA Receipt / Proof</label>
                                <input type="file" name="rwa_file" class="form-control" accept=".pdf,image/*" {{ $isLocked ? 'disabled' : '' }}>
                                @if(!empty($verif?->rwa_file))
                                    <small class="d-block mt-1">
                                        <i class="bi bi-check-circle text-success me-1"></i><a href="{{ $verif->rwa_file }}" target="_blank">View RWA File</a>
                                    </small>
                                @endif
                            </div> -->
                        </div>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="details_accurate" value="1" id="confirmAccuracy" required {{ !empty($verif?->details_accurate) ? 'checked' : '' }} {{ $isLocked ? 'disabled' : '' }}>
                            <label class="form-check-label small fw-semibold" for="confirmAccuracy">
                                I confirm that all uploaded documents and formalities are authentic and accurate.
                            </label>
                        </div>
                    </div>
                </div>

                @if(!$isLocked)
                    <div class="d-flex justify-content-end mb-4">
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold">
                            <i class="bi bi-cloud-arrow-up me-1"></i> Submit Details
                        </button>
                    </div>
                @else
                    <div class="alert alert-secondary text-center">
                        <i class="bi bi-lock-fill me-1"></i> This lease has already been approved and can no longer be edited.
                    </div>
                @endif
            </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>