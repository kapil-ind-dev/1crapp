@extends('rms.layout.app')
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    {{-- Left: Tenant Summary & All Leased Shops --}}
    <div class="col-12 col-xl-4">
        <!-- Tenant Identity -->
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-person-fill"></i></div>
            <div class="body">
                <small>Tenant Name</small>
                <h4>{{ $tenant->name }}</h4>
            </div>
            <div class="foot">{{ $tenant->mobile }} | {{ $tenant->email ?? '-' }}</div>
        </div>

        <!-- All Assigned Properties Card -->
        <div class="card tcard mt-4">
            <div class="card-head bg-g-blue">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">My Properties ({{ $tenant->tenancies->count() }})</h6>
                    <small class="opacity-75">All leased units</small>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($tenant->tenancies as $tenancy)
                        @php
                            $status = $tenancy->onboarding_status ?? 'Submitted';
                            $statusBadge = match($status) {
                                'Approved for Move-In', 'Owner Approve' => 'bg-success',
                                'Manager Review', 'Awaiting Owner Approval' => 'bg-info text-dark',
                                'Corrections Required', 'Owner Returned' => 'bg-danger',
                                default => 'bg-warning text-dark',
                            };
                            $isComplete = in_array($status, ['Approved for Move-In', 'Owner Approve']);
                        @endphp
                        <div class="list-group-item p-3">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="mb-0 fw-bold">{{ $tenancy->shop->shop_name ?? ('Shop #' . $tenancy->shop_id) }}</h6>
                                <span class="badge {{ $statusBadge }} font-monospace small" style="font-size: 0.72rem;">
                                    {{ $status }}
                                </span>
                            </div>
                            <small class="text-secondary d-block">{{ $tenancy->project->name ?? 'Project #' . $tenancy->project_id }}</small>
                            <small class="text-muted d-block mt-1">Rent: ₹{{ number_format($tenancy->monthly_rent, 2) }}/mo</small>

                            {{-- Option to update/complete information if not fully approved --}}
                            @if(!$isComplete)
                                <div class="mt-2 pt-2 border-top d-flex justify-content-between align-items-center">
                                    <small class="text-danger"><i class="bi bi-exclamation-circle me-1"></i>Action required</small>
                                    <a href="{{ route('rms.tenancy.edit', $tenancy->id) }}" class="btn btn-sm btn-outline-primary py-0 px-2" style="font-size:0.8rem;">
                                        <i class="bi bi-pencil-square me-1"></i>Update Info & Docs
                                    </a>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="p-3 text-center text-muted">No properties linked yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Right: Personal Profile Form --}}
    <div class="col-12 col-xl-8">
        <div class="card tcard">
            <div class="card-head bg-g-pink">
                <h6>Update Profile Information</h6>
                <small class="opacity-75">Keep your personal contact details accurate.</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rms.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Profile image --}}
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <img id="profilePreview"
                             src="{{ $tenant->profile ?: 'https://ui-avatars.com/api/?background=random&name=' . urlencode($tenant->name) }}"
                             alt="Profile" class="rounded-circle border"
                             style="width:90px;height:90px;object-fit:cover;">
                        <div class="flex-grow-1">
                            <label class="form-label fw-bold mb-1">Profile Photo</label>
                            <input type="file" name="profile" id="profileInput" accept="image/png,image/jpeg,image/webp"
                                   class="form-control @error('profile') is-invalid @enderror">
                            @error('profile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <small class="text-muted">JPG, PNG or WEBP. Max 2 MB.</small>
                            @if($tenant->profile)
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" name="remove_profile" value="1" id="removeProfile">
                                    <label class="form-check-label small" for="removeProfile">Remove current photo</label>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $tenant->name) }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $tenant->email) }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Mobile</label>
                            <input type="text" name="mobile" maxlength="10" inputmode="numeric"
                                   class="form-control @error('mobile') is-invalid @enderror"
                                   value="{{ old('mobile', $tenant->mobile) }}" required>
                            @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Employer / Company Name</label>
                            <input type="text" name="company" class="form-control"
                                   value="{{ old('company', $tenant->company) }}" placeholder="e.g. Acme Corp">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Designation</label>
                            <input type="text" name="designation" class="form-control"
                                   value="{{ old('designation', $tenant->designation) }}" placeholder="e.g. Manager">
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Save Changes
                        </button>
                        <a href="{{ route('rms.pin') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-key me-1"></i> Change Login PIN
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('profileInput').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            document.getElementById('profilePreview').src = URL.createObjectURL(file);
        }
    });
</script>
@endsection