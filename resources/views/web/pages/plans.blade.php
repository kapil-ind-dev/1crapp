@include('web.common.header')

<style>
    :root {
        --plan-primary: #4f6fe8;
        --plan-text: #172033;
        --plan-muted: #718096;
        --plan-border: #e6eaf2;
        --plan-bg: #f6f8fc;
    }
    .subscription-page {
        background: var(--plan-bg);
        padding: 40px 18px 60px;
        min-height: 100vh;
        color: var(--plan-text);
    }
    .subscription-container {
        max-width: 1320px;
        margin: 0 auto;
    }
    .billing-switch-wrap {
        display: flex;
        justify-content: center;
        margin-bottom: 35px;
    }
    .billing-switch {
        display: inline-flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
        padding: 6px;
        background: #fff;
        border: 1px solid var(--plan-border);
        border-radius: 999px;
        box-shadow: 0 7px 24px rgba(25, 42, 70, .06);
    }
    .billing-option {
        border: 0;
        background: transparent;
        color: #273247;
        border-radius: 999px;
        padding: 10px 24px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .billing-option.active {
        background: var(--plan-primary);
        color: #fff;
        box-shadow: 0 5px 14px rgba(79, 111, 232, .25);
    }
    .duration-badge {
        font-size: 11px;
        padding: 2px 7px;
        border-radius: 12px;
        background: rgba(22, 163, 106, 0.15);
        color: #16a36a;
        font-weight: 700;
    }
    .billing-option.active .duration-badge {
        background: #fff;
        color: var(--plan-primary);
    }
    .plans-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
        align-items: stretch;
    }
    .plan-card {
        --theme: #4f6fe8;
        --theme-soft: #eef2ff;
        --theme-dark: #304fc2;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        overflow: hidden;
        background: #fff;
        border: 1.5px solid color-mix(in srgb, var(--theme) 40%, #e6eaf2);
        border-radius: 18px;
        box-shadow: 0 12px 35px rgba(24, 39, 75, .06);
        transition: transform .22s ease, box-shadow .22s ease;
    }
    .plan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 42px rgba(24, 39, 75, .12);
    }
    .plan-top {
        position: relative;
        padding: 28px 24px 20px;
        text-align: center;
        background: linear-gradient(180deg, var(--theme-soft), #fff 95%);
        border-bottom: 1px solid var(--plan-border);
    }
    .plan-badge {
        display: inline-flex;
        align-items: center;
        margin-bottom: 12px;
        padding: 4px 12px;
        border-radius: 999px;
        color: var(--theme-dark);
        background: #fff;
        border: 1px solid color-mix(in srgb, var(--theme) 30%, white);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .4px;
        text-transform: uppercase;
    }
    .plan-name {
        margin: 0 0 6px;
        font-size: 24px;
        font-weight: 800;
        color: #172033;
    }
    .plan-description {
        min-height: 38px;
        margin: 8px 0 14px;
        color: #667085;
        font-size: 13px;
        line-height: 1.4;
    }
    .plan-price {
        color: #101828;
        font-size: 34px;
        font-weight: 850;
        letter-spacing: -.8px;
        line-height: 1;
    }
    .price-period {
        margin-top: 8px;
        color: var(--plan-muted);
        font-size: 13px;
        font-weight: 600;
    }
    .plan-body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 20px;
    }
    .included-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
        color: #344054;
        font-size: 13px;
        font-weight: 800;
    }
    .included-count {
        padding: 4px 10px;
        color: var(--theme-dark);
        background: var(--theme-soft);
        border-radius: 999px;
        font-size: 11px;
    }
    .module-scroll {
        flex: 1;
        max-height: 380px;
        min-height: 180px;
        overflow-y: auto;
        padding-right: 6px;
        scrollbar-width: thin;
        scrollbar-color: var(--theme) #edf0f5;
    }
    .module-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .module-scroll::-webkit-scrollbar-thumb {
        background: var(--theme);
        border-radius: 10px;
    }
    .module-tree, .module-children {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .module-node {
        margin-bottom: 5px;
    }
    .module-line {
        display: flex;
        align-items: center;
        gap: 8px;
        min-height: 34px;
        padding: 4px 8px;
        border-radius: 8px;
        transition: background .15s ease;
    }
    .module-line:hover {
        background: #f7f8fb;
    }
    .module-check {
        display: inline-flex;
        flex: 0 0 18px;
        align-items: center;
        justify-content: center;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        font-size: 11px;
        font-weight: 900;
    }

    /* Status Indicators */
    .module-check.yes {
        background: #16a36a;
        color: #fff;
    }
    .module-check.partial {
        background: #fef3c7;
        color: #d97706;
    }
    .module-check.no {
        background: #fee2e2;
        color: #dc2626;
    }

    .module-label {
        flex: 1;
        color: #344054;
        font-size: 13px;
        font-weight: 600;
    }
    .module-label.not-included {
        color: #98a2b3;
        text-decoration: line-through;
    }
    .module-label.partially-included {
        color: #475467;
    }

    .module-toggle {
        display: inline-flex;
        flex: 0 0 24px;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        border: 1px solid #e5e9f0;
        border-radius: 6px;
        background: #fff;
        color: #667085;
        cursor: pointer;
    }
    .module-toggle .chevron {
        transition: transform .18s ease;
        font-size: 14px;
    }
    .module-toggle[aria-expanded="true"] .chevron {
        transform: rotate(90deg);
    }
    .module-children {
        margin: 3px 0 5px 16px;
        padding-left: 10px;
        border-left: 1px dashed #d8deea;
    }
    .plan-footer {
        margin-top: auto;
        padding-top: 18px;
    }
    .plan-action {
        display: block;
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        text-align: center;
        border: none;
        cursor: pointer;
        transition: opacity .2s ease;
    }
    .plan-action:hover {
        opacity: .92;
    }
    .plan-note {
        margin: 8px 0 0;
        color: #98a2b3;
        font-size: 11px;
        text-align: center;
    }
    @media (max-width: 1050px) {
        .plans-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (max-width: 680px) {
        .plans-grid { grid-template-columns: 1fr; }
        .billing-switch { width: 100%; border-radius: 16px; }
        .billing-option { flex: 1; }
    }
</style>

<div class="subscription-page">
    <div class="subscription-container">
        {{-- Billing Switch --}}
        <div class="billing-switch-wrap">
            <div class="billing-switch" role="group" aria-label="Billing duration">
                @foreach($plan_type as $index => $duration)
                    <button
                        type="button"
                        class="billing-option {{ $loop->first ? 'active' : '' }}"
                        data-duration="{{ $duration->id }}"
                        data-label="{{ $duration->title }}"
                        data-months="{{ $duration->total_months }}">
                        {{ $duration->title }}
                        @if($duration->discount > 0)
                            <span class="duration-badge">{{ $duration->discount }}% OFF</span>
                        @endif
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Plans Grid --}}
        <div class="plans-grid">
            @php
                $firstDuration = $plan_type->first();

                // Helper to verify if a main module has at least one active feature in the plan
                $isModuleActiveInPlan = function ($module, $allowedIds) use (&$isModuleActiveInPlan) {
                    if (isset($allowedIds[$module->id])) {
                        return true;
                    }
                    if ($module->childrenRecursive && $module->childrenRecursive->isNotEmpty()) {
                        foreach ($module->childrenRecursive as $child) {
                            if ($isModuleActiveInPlan($child, $allowedIds)) {
                                return true;
                            }
                        }
                    }
                    return false;
                };
            @endphp

            @forelse($plans as $plan)
                @php
                    $themeColor = $plan->color ?: '#4f6fe8';

                    // Pluck allowed modules (can_view == 1)
                    $allowedModuleIds = $plan->rolePermissions
                        ->where('can_view', 1)
                        ->pluck('module_id')
                        ->flip()
                        ->toArray();

                    // Calculate active main modules count for this specific plan
                    $activeMainModulesCount = 0;
                    foreach ($modules as $module) {
                        if ($isModuleActiveInPlan($module, $allowedModuleIds)) {
                            $activeMainModulesCount++;
                        }
                    }

                    // Precompute prices for each duration
                    $durationPrices = [];
                    foreach ($plan_type as $duration) {
                        $months = (int) $duration->total_months;
                        $years = intdiv($months, 12);
                        $remainingMonths = $months % 12;

                        $base = ($years * (float) $plan->yearly_price) + ($remainingMonths * (float) $plan->monthly_price);
                        if ($plan->discount > 0) {
                            $base -= $base * ((float) $plan->discount / 100);
                        }
                        if ($duration->discount > 0) {
                            $base -= $base * ((float) $duration->discount / 100);
                        }

                        $durationPrices[$duration->id] = round($base, 2);
                    }

                    $initialPrice = $firstDuration ? ($durationPrices[$firstDuration->id] ?? 0) : 0;
                @endphp

                <article class="plan-card" 
                        style="--theme: {{ $themeColor }}; --theme-soft: {{ $themeColor }}15; --theme-dark: {{ $themeColor }};" 
                        data-prices='@json($durationPrices)'>
                        
                    <div class="plan-top">
                        @if($plan->tag)
                            <span class="plan-badge">{{ $plan->tag }}</span>
                        @endif

                        <div class="plan-name">{{ $plan->title }}</div>

                        @if($plan->sub_title)
                            <p class="plan-description">{{ $plan->sub_title }}</p>
                        @endif

                        <div class="plan-price">
                            <span>₹</span><span class="price-value">{{ number_format($initialPrice, 2) }}</span>
                        </div>

                        <div class="price-period">
                            <span class="billing-label">{{ $firstDuration->title ?? '' }}</span>
                            <span class="period-separator">·</span>
                            <span class="period-label">{{ $firstDuration ? $firstDuration->total_months . ' months' : '' }}</span>
                        </div>
                    </div>

                    <div class="plan-body">
                        <div class="included-heading">
                            <span>Available Modules</span>
                            {{-- Count of only active main modules for this plan --}}
                            <span class="included-count">{{ $activeMainModulesCount }} Active Main {{ Str::plural('Module', $activeMainModulesCount) }}</span>
                        </div>

                        <div class="module-scroll">
                            <ul class="module-tree">
                                @foreach($modules as $module)
                                    @include('web.pages.plan-module', [
                                        'module' => $module,
                                        'allowedModuleIds' => $allowedModuleIds
                                    ])
                                @endforeach
                            </ul>
                        </div>

                        <div class="plan-footer">
                            <button type="button" class="plan-action" style="background: {{ $themeColor }};" data-plan-id="{{ $plan->id }}">
                                {{ $plan->button_text ?: 'Choose ' . $plan->title }}
                            </button>
                            <p class="plan-note">Secure checkout · Cancel anytime</p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="no-plans" style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                    No subscription plans available.
                </div>
            @endforelse
        </div>
    </div>
</div>

@include('web.common.footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const durationButtons = document.querySelectorAll('.billing-option');
    const planCards = document.querySelectorAll('.plan-card');

    // Switch billing durations & recalculate prices
    durationButtons.forEach(button => {
        button.addEventListener('click', function () {
            durationButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const durationId = this.dataset.duration;
            const durationLabel = this.dataset.label;
            const months = this.dataset.months;

            planCards.forEach(card => {
                let prices = {};
                try {
                    prices = JSON.parse(card.dataset.prices || '{}');
                } catch (e) {
                    prices = {};
                }

                const price = prices[durationId] ?? 0;

                const labelEl = card.querySelector('.billing-label');
                const periodEl = card.querySelector('.period-label');
                const priceEl = card.querySelector('.price-value');

                if (labelEl) labelEl.textContent = durationLabel;
                if (periodEl) periodEl.textContent = months + ' months';
                if (priceEl) {
                    priceEl.textContent = Number(price).toLocaleString('en-IN', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            });
        });
    });

    // Module dropdown accordion toggle
    document.addEventListener('click', function(event) {
        const toggle = event.target.closest('.module-toggle');
        if (!toggle) return;

        const targetId = toggle.getAttribute('aria-controls');
        const target = document.getElementById(targetId);
        if (!target) return;

        const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!isExpanded));
        target.hidden = isExpanded;
    });
});
</script>