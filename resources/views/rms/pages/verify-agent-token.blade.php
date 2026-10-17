<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agent Verification — {{ $tenancy->tenant->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f4f6f9; font-family: Inter, sans-serif; display: flex; align-items: center; min-height: 100vh; }
        .auth-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 10px 25px rgba(0,0,0,0.05); padding: 30px; width: 100%; max-width: 480px; margin: auto; }
        .icon-circle { width: 55px; height: 55px; border-radius: 50%; background: #eef2ff; color: #2855d9; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="auth-card">
        <div class="text-center mb-4">
            <div class="icon-circle">
                <i class="bi bi-shield-lock"></i>
            </div>
            <h4 class="fw-bold mb-1">Agent Verification</h4>
            <p class="text-muted small mb-0">
                To update documents for <strong>{{ $tenancy->tenant->name }}</strong> ({{ $tenancy->shop->shop_name ?? 'Property #' . $tenancy->shop_id }}), please verify your identity.
            </p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger py-2 small mb-3">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('rms.public.verify-agent', $token) }}">
            @csrf

            <div class="mb-3">
                <label class="form-label small fw-bold">Agent Mobile Number or Email *</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-check"></i></span>
                    <input type="text" 
                           name="agent_credential" 
                           class="form-control" 
                           placeholder="Enter registered mobile or email" 
                           required 
                           autofocus>
                </div>
                <small class="text-muted" style="font-size: 11px;">
                    Must match the agent contact provided during tenant onboarding.
                </small>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                Verify & Continue <i class="bi bi-arrow-right ms-1"></i>
            </button>
        </form>
    </div>
</div>
</body>
</html>