@extends('rms.layout.app')
@section('content')

{{-- Property Selector Card --}}
<div class="card tcard mb-4">
    <div class="card-head bg-g-blue">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h6 class="mb-0">Property Details & Charges</h6>
                <small class="opacity-75">
                    <i class="bi bi-shop me-1"></i>{{ $activeProperty->shop_name }} ({{ $activeProperty->project_name ?? 'Project' }})
                </small>
            </div>

            {{-- Switcher if tenant occupies multiple properties --}}
            @if($tenantProperties->count() > 1)
                <form method="GET" action="{{ route('rms.my-property') }}" class="d-flex align-items-center gap-2">
                    <label class="text-white small mb-0 d-none d-md-block">Select Unit:</label>
                    <select name="shop_id" class="form-select form-select-sm" onchange="this.form.submit()" style="min-width: 200px;">
                        @foreach($tenantProperties as $prop)
                            <option value="{{ $prop->shop_id }}" {{ (int) $activeProperty->shop_id === (int) $prop->shop_id ? 'selected' : '' }}>
                                {{ $prop->shop_name }} ({{ $prop->project_name ?? 'Property' }})
                            </option>
                        @endforeach
                    </select>
                </form>
            @endif
        </div>
    </div>
</div>

{{-- Stat cards --}}
<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-house-door-fill"></i></div>
            <div class="body">
                <small>Unit Type</small>
                <h4>{{ ucfirst($activeProperty->shop_type ?: 'Commercial Unit') }}</h4>
            </div>
            <div class="foot">{{ $activeProperty->shop_name }}</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-currency-rupee"></i></div>
            <div class="body">
                <small>Agreed Monthly Rent</small>
                <h4>₹{{ number_format((float) ($activeProperty->tenancy_rent ?: 0), 2) }}</h4>
            </div>
            <div class="foot">Lease rate</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-blue"><i class="bi bi-tools"></i></div>
            <div class="body">
                <small>Maintenance / Cleaning</small>
                <h4>₹{{ number_format((float) ($activeProperty->cleaning_cost ?: 0), 2) }}</h4>
            </div>
            <div class="foot">Monthly recurring</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-blue"><i class="bi bi-lightning-charge"></i></div>
            <div class="body">
                <small>Electricity Billing</small>
                <h4>{{ $activeProperty->electricity_applicable ? 'Metered' : 'Not Applicable' }}</h4>
            </div>
            <div class="foot">{{ $activeProperty->electricity_applicable ? 'Billed as per meter' : 'Included in rent' }}</div>
        </div>
    </div>
</div>

{{-- Rent breakdown table --}}
<div class="card tcard mt-5">
    <div class="card-head bg-g-pink">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-0">Charge Particulars & Breakdown</h6>
                <small class="opacity-75">Applicable recurring charges for {{ $activeProperty->shop_name }}.</small>
            </div>
            <span class="badge bg-light text-dark">
                Move-in: {{ !empty($activeProperty->movein_date) ? \Carbon\Carbon::parse($activeProperty->movein_date)->format('d M, Y') : '-' }}
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-m mb-0">
                <thead>
                    <tr>
                        <th>Particular</th>
                        <th>Calculation / Basis</th>
                        <th class="text-end">Monthly Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Basic Monthly Rent</td>
                        <td>Fixed agreed lease amount</td>
                        <td class="text-end fw-semibold">₹{{ number_format((float) $activeProperty->tenancy_rent, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Maintenance & Cleaning</td>
                        <td>Scheduled property upkeep charge</td>
                        <td class="text-end fw-semibold">₹{{ number_format((float) $activeProperty->cleaning_cost, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Electricity</td>
                        <td>
                            @if($activeProperty->electricity_applicable)
                                @if($latestElectricity && isset($latestElectricity->units))
                                    Latest reading: {{ $latestElectricity->units }} Units × ₹{{ $latestElectricity->per_unit_rate ?? 10 }}
                                @elseif($latestElectricity && isset($latestElectricity->electricity_cost))
                                    Latest billed reading
                                @else
                                    Monthly metered reading applicable
                                @endif
                            @else
                                Not applicable / Included
                            @endif
                        </td>
                        <td class="text-end fw-semibold">
                            @if($activeProperty->electricity_applicable && $latestElectricity)
                                ₹{{ number_format((float) ($latestElectricity->electricity_cost ?? 0), 2) }}
                            @else
                                {{ $activeProperty->electricity_applicable ? 'As Per Meter' : '₹0.00' }}
                            @endif
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td colspan="2" class="fw-bold text-dark">Estimated Base Monthly Payable</td>
                        <td class="text-end fw-bold text-primary">
                            ₹{{ number_format((float) $activeProperty->tenancy_rent + (float) $activeProperty->cleaning_cost, 2) }}
                            <small class="text-muted d-block font-weight-normal">+ metered electricity</small>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Automatic penalty rule --}}
@if($penalty && !$isPenaltyOverride)
    <div class="card tcard mt-5">
        <div class="card-head bg-g-dark">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Automatic Penalty & Due Date Policy</h6>
                <small class="opacity-75">Due Day: {{ $activeProperty->due_day ?? $penalty->day_of_due }}th of every month</small>
            </div>
        </div>
        <div class="card-body">
            <div class="rule-row">
                <span>Payment on or before {{ $activeProperty->due_day ?? $penalty->day_of_due }}th</span>
                <span class="badge-s bg-g-green">No Penalty (Grace Period)</span>
            </div>
            <div class="rule-row">
                <span>After {{ $activeProperty->due_day ?? $penalty->day_of_due }}th up to {{ $penalty->penalty1_day }}th</span>
                <span class="badge-s bg-g-blue">{{ $penalty->penalty1 }}% of Base Rent</span>
            </div>
            <div class="rule-row">
                <span>After {{ $penalty->penalty1_day }}th up to {{ $penalty->penalty2_day }}th</span>
                <span class="badge-s bg-g-pink">{{ $penalty->penalty2 }}% of Base Rent</span>
            </div>
            <div class="rule-row">
                <span>After {{ $penalty->penalty2_day }}th onward</span>
                <span class="badge-s bg-g-dark">{{ $penalty->penalty3 }}% of Base Rent</span>
            </div>
        </div>
    </div>
@elseif($isPenaltyOverride)
    <div class="alert alert-info mt-4">
        <i class="bi bi-shield-check me-2"></i><strong>Special Exemption:</strong> Late payment penalty has been waived for your account by administration.
    </div>
@endif

@endsection