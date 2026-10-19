@extends('rms.layout.app')
@section('content')
@php
    $statusLabels = [
        0 => 'Pending Request',
        1 => 'Request Sent',
        2 => 'Partially Paid',
        3 => 'Fully Paid',
        4 => 'Overdue',
        5 => 'Cancelled',
    ];
    $statusColors = [
        0 => 'bg-g-dark',
        1 => 'bg-g-blue',
        2 => 'bg-g-orange',
        3 => 'bg-g-green',
        4 => 'bg-g-pink',
        5 => 'bg-g-grey',
    ];
@endphp

<style>
#editPaymentModal { z-index: 1060; }
#editPaymentModal .modal-dialog { max-width: 850px; margin: 1rem auto; }
#editPaymentModal .modal-content { display: flex; flex-direction: column; border: 0; border-radius: 12px; }
#editPaymentModal .outstanding-box { border: 1px solid #e9ecef; gap: 1rem; }
.pay-card { border: 1px solid #e9ecef; border-radius: 10px; padding: 1rem; background: #fff; }
.bank-row { display: flex; align-items: center; justify-content: space-between; padding: 0.35rem 0; border-bottom: 1px dashed #e9ecef; font-size: 0.85rem; }
.bank-row:last-child { border-bottom: 0; }
.bank-row .lbl { color: #6c757d; }
.bank-row .val { font-weight: 600; }
.pay-summary { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 0.75rem; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px; padding: 0.75rem; font-size: 0.85rem; }
.pay-summary strong { display: block; font-size: 0.95rem; }
.pay-summary .total strong { color: #0d6efd; font-size: 1.05rem; }
</style>

<div class="card tcard">
    <div class="card-head bg-g-pink">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h6 class="mb-0">My Payments</h6>
                <small class="opacity-75">View payment requests, outstanding balances, and submitted payments.</small>
            </div>
            
            {{-- Property Switcher Filter --}}
            <form method="GET" action="{{ route('rms.my-payments') }}" class="d-flex align-items-center gap-2">
                <select name="shop_id" class="form-select form-select-sm" onchange="this.form.submit()" style="min-width: 200px;">
                    <option value="0" {{ $selectedShopId == 0 ? 'selected' : '' }}>
                        All Properties ({{ $tenantShops->count() }})
                    </option>
                    @foreach($tenantShops as $tShop)
                        <option value="{{ $tShop->shop_id }}" {{ (int) $selectedShopId === (int) $tShop->shop_id ? 'selected' : '' }}>
                            {{ $tShop->shop_name }} ({{ $tShop->project_name ?? 'Property' }})
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <div class="card-body">
        {{-- Tabs --}}
        <ul class="nav nav-underline pay-tabs mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-requests" data-bs-toggle="tab" data-bs-target="#pane-requests" type="button" role="tab">
                    Payment Requests
                    @if($requestLists->total() > 0)<span class="badge-s bg-g-pink ms-1">{{ $requestLists->total() }}</span>@endif
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-completed" data-bs-toggle="tab" data-bs-target="#pane-completed" type="button" role="tab">
                    Completed
                    @if($completedLists->total() > 0)<span class="badge-s bg-g-green ms-1">{{ $completedLists->total() }}</span>@endif
                </button>
            </li>
        </ul>

        <div class="tab-content">
            {{-- ================= PAYMENT REQUESTS ================= --}}
            <div class="tab-pane fade show active" id="pane-requests" role="tabpanel">
                @forelse($requestLists as $list)
                    @php
                        $elApplicable = $list->shop ? $list->shop->electricity_applicable : 0;
                        $maintenance = $list->shop ? $list->shop->cleaning_cost : 0;
                        $other_charge = $list->other_charge ?? 0;
                        $electricityAmount = ($elApplicable && $list->electricity) 
                            ? (float) $list->electricity->electricity_cost 
                            : 0;

                        $status = (int) $list->status;
                        $gross_due = max(0, (float) $list->basic_rent + (float) $maintenance + $electricityAmount + $other_charge);
                        $subTotalAmount = max(0, (float) $gross_due - (float) $list->paid_amount);
                        $dueDate = $list->shop ? $list->shop->due_day : null;

                        if ($isPenaltyOverride) {
                            $penalty = 0;
                        } else {
                            $penalty = calculateRentPenalty($subTotalAmount, $dueDate, $penaltySettings, $list->collection_year, $list->collection_month);
                        }

                        $gross_due += $penalty;
                        $outstanding = max(0, (float) $gross_due - (float) $list->paid_amount);
                    @endphp

                    <div class="pay-item">
                        <div class="d-flex justify-content-between align-items-start gap-2">
                            <div>
                                <div class="pay-month">
                                    {{ date('F', mktime(0, 0, 0, $list->collection_month, 1)) }} {{ $list->collection_year }}
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-1">
                                    <span class="badge bg-light text-primary border">
                                        <i class="bi bi-shop me-1"></i>{{ $list->shop->shop_name ?? ('Shop #' . $list->shop_id) }}
                                        ({{ $list->shop->project->name ?? 'Project' }})
                                    </span>
                                    <small class="text-secondary">Created: {{ date('d M, Y', strtotime($list->created_at)) }}</small>
                                </div>
                            </div>
                            <span class="badge-s {{ $penalty > 0 ? 'bg-danger' : 'bg-g-grey' }}">
                                {{ $penalty > 0 ? 'Penalty Applied' : 'No Penalty' }}
                            </span>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Basic Rent</span><strong>₹{{ number_format((float) $list->basic_rent, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Maintenance</span><strong>₹{{ number_format((float) $maintenance, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Other Charge</span><strong>₹{{ number_format((float) $other_charge, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Electricity Bill</span><strong>₹{{ number_format($electricityAmount, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Penalty</span><strong>₹{{ number_format((float) $penalty, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Gross Due</span><strong class="text-primary">₹{{ number_format((float) $gross_due, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Paid</span><strong class="up">₹{{ number_format((float) $list->paid_amount, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Outstanding</span><strong class="{{ $outstanding > 0 ? 'down' : '' }}">₹{{ number_format($outstanding, 2) }}</strong></div></div>
                        </div>

                        @if(in_array($status, [0, 1, 2, 4]) && $outstanding > 0)
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-sm btn-outline-secondary js-payment-history" data-id="{{ $list->id }}">
                                    <i class="bi bi-clock-history me-1"></i>Payment History
                                </button>
                                <button type="button" class="btn btn-gradient js-pay-btn"
                                        data-id="{{ $list->id }}"
                                        data-shop-id="{{ $list->shop_id }}"
                                        data-year="{{ $list->collection_year }}"
                                        data-month="{{ $list->collection_month }}"
                                        data-rent="{{ $gross_due }}"
                                        data-due="{{ !empty($dueDate) ? date('d F Y', strtotime($list->collection_year . '-' . str_pad($list->collection_month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($dueDate, 2, '0', STR_PAD_LEFT))) : '-' }}"
                                        data-outstanding="{{ $outstanding }}">
                                    <i class="bi bi-plus-lg me-1"></i>Add Payment
                                </button>
                            </div>
                        @elseif($status === 5)
                            <div class="text-end mt-3 small down">This payment request has been cancelled.</div>
                        @else
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-sm btn-outline-secondary js-payment-history" data-id="{{ $list->id }}">
                                    <i class="bi bi-clock-history me-1"></i>Payment History
                                </button>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="pay-empty"><i class="bi bi-inbox fs-3 d-block mb-1"></i>No payment requests found.</div>
                @endforelse

                @if($requestLists->hasPages())
                    <div class="mt-3 d-flex justify-content-end">
                        {{ $requestLists->fragment('requests')->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>

            {{-- ================= COMPLETED PAYMENTS ================= --}}
            <div class="tab-pane fade" id="pane-completed" role="tabpanel">
                @forelse($completedLists as $list)
                    @php
                        $elApplicable = $list->shop ? $list->shop->electricity_applicable : 0;
                        $maintenance = $list->shop ? $list->shop->cleaning_cost : 0;
                        $other_charge = $list->other_charge ?? 0;
                        $electricityAmount = ($elApplicable && $list->electricity) 
                            ? (float) $list->electricity->electricity_cost 
                            : 0;

                        $gross_due = max(0, (float) $list->basic_rent + (float)$maintenance + $electricityAmount +$other_charge);
                    @endphp

                    <div class="pay-item">
                        <div class="d-flex justify-content-between align-items-start gap-2">
                            <div>
                                <div class="pay-month">
                                    {{ date('F', mktime(0, 0, 0, $list->collection_month, 1)) }} {{$list->collection_year }}
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-1">
                                    <span class="badge bg-light text-primary border">
                                        <i class="bi bi-shop me-1"></i>{{ $list->shop->shop_name ?? ('Shop #' . $list->shop_id) }}
                                    </span>
                                    <small class="text-secondary">
                                        Completed: {{ $list->updated_at ? date('d M, Y', strtotime($list->updated_at)) : '-' }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge-s bg-g-green">Fully Paid</span>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Total Due</span><strong>₹{{ number_format((float) $gross_due, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Total Paid</span><strong class="up">₹{{ number_format((float) $list->approved_payment_amount, 2) }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Payment Mode</span><strong>{{ $list->payment_mode ?: '-' }}</strong></div></div>
                            <div class="col-6 col-lg-3"><div class="pay-detail"><span>Reference</span><strong class="text-break">{{ $list->reference_number ?: '-' }}</strong></div></div>
                        </div>

                        <div class="text-end mt-3">
                            @if(!empty($list->payment_proof))
                                <a href="{{ asset($list->payment_proof) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-receipt me-1"></i>View Receipt
                                </a>
                            @endif
                            <button type="button" class="btn btn-sm btn-outline-secondary js-payment-history" data-id="{{ $list->id }}">
                                <i class="bi bi-clock-history me-1"></i>Payment History
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="pay-empty"><i class="bi bi-inbox fs-3 d-block mb-1"></i>No completed payments found.</div>
                @endforelse

                @if($completedLists->hasPages())
                    <div class="mt-3 d-flex justify-content-end">
                        {{ $completedLists->fragment('completed')->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="pay-note mt-4">
            <i class="bi bi-info-circle-fill me-2"></i>
            <span><b>Payment verification:</b> Submitted payments require administrator verification before balance clearance.</span>
        </div>
    </div>
</div>

{{-- ================= PAYMENT WIZARD MODAL ================= --}}
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable pay-dialog" id="payDialog">
        <form method="POST" action="{{ route('rms.save-rent') }}" enctype="multipart/form-data" id="rentForm" class="modal-content">
            @csrf
            <input type="hidden" name="collection_id" id="payment_collection_id">
            <input type="hidden" name="shop_id" id="payment_shop_id">
            <input type="hidden" id="edit_payment_id" value="">

            {{-- STEP 1: METHOD --}}
            <div class="pay-step" data-step="1">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold" id="paymentModalTitle">Make Rent Payment</h5>
                        <small class="text-secondary">How would you like to make your rent payment?</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <button type="button" class="pay-option w-100 text-start" data-method="online">
                                <div class="pay-option-title"><i class="bi bi-credit-card-2-front me-2"></i>Online Payment</div>
                                <small>Pay using UPI, QR Code, or Bank Transfer.</small>
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="pay-option w-100 text-start" data-method="offline">
                                <div class="pay-option-title"><i class="bi bi-receipt me-2"></i>Offline Payment</div>
                                <small>I will make the payment offline and submit proof.</small>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light w-100" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>

            {{-- STEP 2: BANK & UPI DETAILS --}}
            <div class="pay-step d-none" data-step="2">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold">Bank & UPI Payment Details</h5>
                        <small class="text-secondary" id="paymentUnitLabel">Pay using the property's registered bank or UPI account.</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pay-summary mb-3">
                        <div><small>Rent Month</small><strong id="sumMonth">-</strong></div>
                        <div><small>Total Rent</small><strong id="sumRent">₹0</strong></div>
                        <div><small>Due Date</small><strong id="sumDue">-</strong></div>
                        <div class="total"><small>Total Payable</small><strong id="sumTotal">₹0</strong></div>
                    </div>

                    <div id="noAccountAlert" class="alert alert-danger d-none">
                        Payment account details are not configured for this property. Please contact management.
                    </div>

                    <div class="row g-3" id="accountDetailsRow">
                        {{-- UPI BOX --}}
                        <div class="col-lg-6" id="upiBox">
                            <div class="pay-card h-100">
                                <h6 class="fw-bold">Pay Using UPI</h6>
                                <small class="text-secondary d-block mb-3">Scan the QR code with any UPI app.</small>
                                <div class="d-flex gap-3 align-items-center">
                                    <img id="upiQr" src="" alt="UPI QR" width="130" height="130" class="border rounded p-1 bg-white" style="display:none;">
                                    <div class="flex-grow-1">
                                        <small class="text-secondary fw-semibold">UPI ID</small>
                                        <div class="input-group input-group-sm mb-2">
                                            <input type="text" class="form-control" id="upiId" readonly>
                                            <button type="button" class="btn btn-outline-primary copy-btn" data-copy-target="#upiId">Copy</button>
                                        </div>
                                        <a href="#" id="openUpiApp" class="btn btn-primary btn-sm w-100">
                                            <i class="bi bi-send-fill me-1"></i> Open UPI App
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- BANK BOX --}}
                        <div class="col-lg-6" id="bankBox">
                            <div class="pay-card h-100">
                                <h6 class="fw-bold">Bank Transfer</h6>
                                <small class="text-secondary d-block mb-3">Direct account transfer.</small>
                                <div class="bank-list">
                                    <div class="bank-row">
                                        <span class="lbl">Account Name</span>
                                        <span class="val" id="bankAccName">-</span>
                                    </div>
                                    <div class="bank-row">
                                        <span class="lbl">Bank</span>
                                        <span class="val" id="bankName">-</span>
                                    </div>
                                    <div class="bank-row">
                                        <span class="lbl">Account No.</span>
                                        <span class="val" id="bankAccNo">-</span>
                                        <button type="button" class="btn btn-outline-primary btn-sm copy-btn py-0 px-2" data-copy-target="#bankAccNo">Copy</button>
                                    </div>
                                    <div class="bank-row">
                                        <span class="lbl">IFSC Code</span>
                                        <span class="val" id="bankIfsc">-</span>
                                        <button type="button" class="btn btn-outline-primary btn-sm copy-btn py-0 px-2" data-copy-target="#bankIfsc">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pay-note mt-3">
                        <b><i class="bi bi-info-circle me-1"></i> Note:</b> Please pay the exact amount and click <b>“I Have Made the Payment”</b> to upload your transaction reference.
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-pay-back>Back</button>
                    <button type="button" class="btn btn-gradient" data-pay-next>I Have Made the Payment <i class="bi bi-arrow-right ms-1"></i></button>
                </div>
            </div>

            {{-- STEP 3: SUBMISSION FORM --}}
            <div class="pay-step d-none" data-step="3">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold" id="step3Title">Submit Payment Receipt</h5>
                        <small class="text-secondary">Enter transaction details and upload confirmation.</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="outstanding-box mb-3 p-3 bg-light rounded d-flex justify-content-between align-items-center">
                        <span class="text-muted">Payable Balance</span>
                        <strong id="outstandingAmount" class="text-danger fs-5">₹0.00</strong>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="payDate">Payment Date *</label>
                            <input id="payDate" name="payment_date" type="date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="payAmount">Amount Paid (₹) *</label>
                            <input id="payAmount" name="paid_amount" type="number" step="0.01" min="0.01" class="form-control" placeholder="Enter amount" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="payMode">Payment Mode *</label>
                            <select id="payMode" name="payment_mode" class="form-select" required>
                                <option value="">Select Mode</option>
                                <option value="UPI">UPI</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="payRef">Transaction / UTR Reference *</label>
                            <input id="payRef" name="reference_number" class="form-control" placeholder="Enter reference number" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="payProof">Payment Proof / Screenshot</label>
                            <input id="payProof" name="receipt" type="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                            <small id="currentProofInfo" class="text-muted d-none mt-1 d-block"></small>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="payRemarks">Remarks</label>
                            <textarea id="payRemarks" name="remarks" rows="2" class="form-control" placeholder="Optional remarks"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" id="step3BackBtn" data-pay-back>Back</button>
                    <button type="submit" class="btn btn-gradient" id="submitPaymentBtn">Submit for Verification</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ================= PAYMENT HISTORY MODAL ================= --}}
<div class="modal fade" id="paymentHistoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-1">Payment History</h5>
                    <small class="text-secondary" id="historyMonth"></small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="historyLoading" class="text-center py-4">
                    <div class="spinner-border spinner-border-sm me-2"></div>
                    Loading history...
                </div>
                <div id="historyEmpty" class="pay-empty d-none">
                    <i class="bi bi-receipt fs-3 d-block mb-1"></i>
                    No payments submitted for this record.
                </div>
                <div id="historyContent" class="d-none">
                    <div id="paymentHistoryList"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const shopAccounts = @json($shopAccountMap);
    const paymentModalEl = document.getElementById('paymentModal');
    const paymentHistoryModalEl = document.getElementById('paymentHistoryModal');
    const defaultSaveUrl = "{{ route('rms.save-rent') }}";
    const updateUrlBase = "{{ url('/rms/update-payment') }}";
    const getPaymentUrlBase = "{{ url('/rms/get-payment') }}";
    const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    let isEditMode = false;

    // Reset Form for New Payment
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.js-pay-btn');
        if (!btn) return;
        const d = btn.dataset;

        isEditMode = false;
        resetPaymentForm();

        fillPaymentSummary({
            collectionId: d.id,
            shopId: d.shopId,
            month: MONTHS[Number(d.month) - 1],
            year: d.year,
            rent: d.rent,
            dueDate: d.due,
            outstanding: d.outstanding
        });

        goToStep(1);
        bootstrap.Modal.getOrCreateInstance(paymentModalEl).show();
    });

    function resetPaymentForm() {
        const form = document.getElementById('rentForm');
        form.reset();
        form.action = defaultSaveUrl;
        document.getElementById('edit_payment_id').value = '';
        document.getElementById('step3Title').textContent = 'Submit Payment Receipt';
        document.getElementById('submitPaymentBtn').textContent = 'Submit for Verification';
        document.getElementById('step3BackBtn').classList.remove('d-none');
        const proofInfo = document.getElementById('currentProofInfo');
        if (proofInfo) {
            proofInfo.classList.add('d-none');
            proofInfo.innerHTML = '';
        }
        document.getElementById('payDate').value = "{{ now()->format('Y-m-d') }}";
    }

    function fillPaymentSummary({ collectionId, shopId, month, year, rent, dueDate, outstanding }) {
        const inr = v => '₹' + Number(v).toLocaleString('en-IN', { minimumFractionDigits: 2 });

        document.getElementById('payment_collection_id').value = collectionId;
        document.getElementById('payment_shop_id').value = shopId;

        document.getElementById('sumMonth').textContent = month + ' ' + year;
        document.getElementById('sumRent').textContent  = inr(rent);
        document.getElementById('sumDue').textContent   = dueDate;
        document.getElementById('sumTotal').textContent = inr(outstanding);
        document.getElementById('outstandingAmount').textContent = inr(outstanding);
        document.getElementById('payAmount').value = Number(outstanding).toFixed(2);

        // Bind property-specific account
        const acc = shopAccounts[shopId] || null;

        if (!acc || (!acc.upi_id && !acc.account_no)) {
            document.getElementById('noAccountAlert').classList.remove('d-none');
            document.getElementById('accountDetailsRow').classList.add('d-none');
            return;
        }

        document.getElementById('noAccountAlert').classList.add('d-none');
        document.getElementById('accountDetailsRow').classList.remove('d-none');

        // Populate UPI
        if (acc.upi_id) {
            document.getElementById('upiBox').classList.remove('d-none');
            document.getElementById('upiId').value = acc.upi_id;

            if (acc.barcode_file) {
                const qr = document.getElementById('upiQr');
                qr.src = acc.barcode_file;
                qr.style.display = 'block';
            }

            const upiParams = new URLSearchParams({
                pa: acc.upi_id,
                pn: acc.upi_name || acc.account_holder_name || '',
                am: Number(outstanding).toFixed(2),
                cu: 'INR',
                tn: `Rent ${month} ${year}`
            });
            document.getElementById('openUpiApp').href = 'upi://pay?' + upiParams.toString();
        } else {
            document.getElementById('upiBox').classList.add('d-none');
        }

        // Populate Bank
        if (acc.account_no) {
            document.getElementById('bankBox').classList.remove('d-none');
            document.getElementById('bankAccName').textContent = acc.account_holder_name || '-';
            document.getElementById('bankName').textContent    = acc.bank_name || '-';
            document.getElementById('bankAccNo').textContent   = acc.account_no || '-';
            document.getElementById('bankIfsc').textContent    = acc.ifsc_code || '-';
        } else {
            document.getElementById('bankBox').classList.add('d-none');
        }
    }

    // Modal navigation helpers
    const steps = paymentModalEl.querySelectorAll('.pay-step');
    const dialog = document.getElementById('payDialog');
    let paymentMethod = null;

    function goToStep(n) {
        steps.forEach(s => s.classList.toggle('d-none', s.dataset.step != n));
        dialog.classList.toggle('modal-lg', n == 2);
    }

    paymentModalEl.querySelectorAll('.pay-option').forEach(btn => {
        btn.addEventListener('click', () => {
            paymentMethod = btn.dataset.method;
            goToStep(paymentMethod === 'online' ? 2 : 3);
        });
    });

    paymentModalEl.querySelector('[data-pay-next]').addEventListener('click', () => {
        document.getElementById('payMode').value = 'UPI';
        goToStep(3);
    });

    paymentModalEl.querySelectorAll('[data-pay-back]').forEach(btn => {
        btn.addEventListener('click', () => {
            if (isEditMode) return;
            const current = btn.closest('.pay-step').dataset.step;
            goToStep(current == 3 && paymentMethod === 'online' ? 2 : 1);
        });
    });

    // Copy buttons
    paymentModalEl.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const target = document.querySelector(btn.dataset.copyTarget);
            const text = (target.value || target.textContent).trim();
            try {
                await navigator.clipboard.writeText(text);
                btn.textContent = 'Copied';
                setTimeout(() => btn.textContent = 'Copy', 1200);
            } catch (e) {}
        });
    });

    // Form Submission (Add OR Update)
    document.getElementById('rentForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = this;
        const btn = document.getElementById('submitPaymentBtn');

        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Submitting...';

        $.ajax({
            url: form.action,
            type: "POST",
            data: new FormData(form),
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
                    Swal.fire('Success', res.message || 'Payment submitted successfully.', 'success')
                        .then(() => location.reload());
                } else {
                    Swal.fire('Error', res.message || 'Submission failed.', 'error');
                }
            },
            error: function (xhr) {
                Swal.fire('Error', xhr.responseJSON?.message || 'Server error occurred.', 'error');
            },
            complete: function () {
                btn.disabled = false;
                btn.innerHTML = isEditMode ? 'Update Payment' : 'Submit for Verification';
            }
        });
    });

    // Payment History Modal & Edit Rejected Payment Action
    document.addEventListener('click', function(e) {
    const btn = e.target.closest('.js-payment-history');
    if (!btn) return;

    const id = btn.dataset.id;
    const modal = bootstrap.Modal.getOrCreateInstance(paymentHistoryModalEl);
    modal.show();

    $('#historyLoading').removeClass('d-none');
    $('#historyEmpty, #historyContent').addClass('d-none');

    $.ajax({
        url: "{{ url('/rms/my-payments') }}/" + id + "/history",
        type: "GET",
        success: function (res) {
            $('#historyLoading').addClass('d-none');
            if (!res.status || !res.payments?.length) {
                $('#historyEmpty').removeClass('d-none');
                return;
            }

            $('#historyContent').removeClass('d-none');
            let html = '';
            res.payments.forEach(p => {
                const statusBadge = p.approval_status == 1 ? 'bg-success' : (p.approval_status == 2 ? 'bg-danger' : 'bg-warning text-dark');
                const statusText  = p.approval_status == 1 ? 'Approved' : (p.approval_status == 2 ? 'Rejected' : 'Pending');

                // Normalize proof URL whether stored as full URL or relative path
                let proofUrl = '';
                if (p.payment_proof) {
                    proofUrl = p.payment_proof.startsWith('http') 
                        ? p.payment_proof 
                        : "{{ asset('') }}" + p.payment_proof.replace(/^\/+/, '');
                }

                html += `
                    <div class="border rounded p-3 mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <strong>Payment #${p.id}</strong>
                            <div>
                                <span class="badge ${statusBadge}">${statusText}</span>
                                ${p.approval_status == 2 ? `
                                    <button type="button" class="btn btn-sm btn-outline-danger ms-2 py-0 px-2 js-edit-rejected-pay" data-payment-id="${p.id}">
                                        <i class="bi bi-pencil-square me-1"></i>Edit / Resubmit
                                    </button>
                                ` : ''}
                            </div>
                        </div>

                        <div class="row g-2 small">
                            <div class="col-6 col-sm-3">Amount: <strong>₹${Number(p.payment_amount).toFixed(2)}</strong></div>
                            <div class="col-6 col-sm-3">Mode: <strong>${p.payment_mode || '-'}</strong></div>
                            <div class="col-6 col-sm-3">Date: <strong>${p.payment_date || '-'}</strong></div>
                            <div class="col-6 col-sm-3">Ref: <strong>${p.reference_number || '-'}</strong></div>
                        </div>

                        ${proofUrl ? `
                            <div class="mt-2 pt-2 border-top d-flex align-items-center justify-content-between small">
                                <span class="text-secondary"><i class="bi bi-paperclip me-1"></i>Attachment:</span>
                                <a href="${proofUrl}" target="_blank" class="btn btn-sm btn-outline-primary py-0 px-2">
                                    <i class="bi bi-file-earmark-arrow-down me-1"></i>View Attachment
                                </a>
                            </div>
                        ` : ''}

                        ${p.rejection_reason ? `
                            <div class="text-danger small mt-2">
                                <strong>Reason:</strong> ${p.rejection_reason}
                            </div>
                        ` : ''}
                    </div>
                `;
            });
            $('#paymentHistoryList').html(html);
        }
    });
});

    // Handle Edit / Resubmit of Rejected Payment in Step 3 Modal
    document.addEventListener('click', function(e) {
        const editBtn = e.target.closest('.js-edit-rejected-pay');
        if (!editBtn) return;

        const paymentId = editBtn.dataset.paymentId;
        editBtn.disabled = true;

        $.ajax({
            url: `${getPaymentUrlBase}/${paymentId}`,
            type: "GET",
            success: function(res) {
                editBtn.disabled = false;
                if (!res.status || !res.data) {
                    Swal.fire('Error', res.message || 'Unable to fetch payment details.', 'error');
                    return;
                }

                const pay = res.data;
                const col = res.collection || {};

                // Hide History Modal
                bootstrap.Modal.getOrCreateInstance(paymentHistoryModalEl).hide();

                // Setup Step 3 in Edit Mode
                isEditMode = true;
                resetPaymentForm();

                const form = document.getElementById('rentForm');
                form.action = `${updateUrlBase}/${pay.id}`;
                document.getElementById('edit_payment_id').value = pay.id;
                document.getElementById('payment_collection_id').value = pay.rentcollection_id || pay.rent_collection_id || col.id;

                // Outstanding amount banner in Step 3
                const outBal = col.remaining_amount !== undefined ? col.remaining_amount : pay.payment_amount;
                document.getElementById('outstandingAmount').textContent = '₹' + Number(outBal).toLocaleString('en-IN', { minimumFractionDigits: 2 });

                // Fill inputs with existing rejected data
                document.getElementById('payAmount').value = Number(pay.payment_amount || pay.paid_amount || 0).toFixed(2);
                document.getElementById('payDate').value = pay.payment_date ? pay.payment_date.split('T')[0] : "{{ now()->format('Y-m-d') }}";
                document.getElementById('payMode').value = pay.payment_mode || '';
                document.getElementById('payRef').value = pay.reference_number || '';
                document.getElementById('payRemarks').value = pay.remarks || '';

                if (pay.payment_proof) {
                    const info = document.getElementById('currentProofInfo');
                    info.innerHTML = `Current file: <a href="${pay.payment_proof}" target="_blank" class="text-primary text-decoration-underline">View Previous Proof</a>`;
                    info.classList.remove('d-none');
                }

                // Update UI text for Editing
                document.getElementById('step3Title').textContent = 'Update Rejected Payment #' + pay.id;
                document.getElementById('submitPaymentBtn').textContent = 'Update Payment';
                document.getElementById('step3BackBtn').classList.add('d-none'); // Hide back button in edit mode

                // Open directly to Step 3
                goToStep(3);
                bootstrap.Modal.getOrCreateInstance(paymentModalEl).show();
            },
            error: function(xhr) {
                editBtn.disabled = false;
                Swal.fire('Error', xhr.responseJSON?.message || 'Failed to load payment details.', 'error');
            }
        });
    });
</script>
@endsection