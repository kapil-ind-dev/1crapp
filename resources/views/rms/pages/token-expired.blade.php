<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link Expired — RMS Onboarding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .expired-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            max-width: 500px;
            width: 100%;
            padding: 40px 30px;
            text-align: center;
        }
        .icon-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background-color: #fef2f2;
            color: #ef4444;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <div class="expired-card">
        <div class="icon-circle">
            <i class="bi bi-clock-history"></i>
        </div>
        <h4 class="fw-bold text-dark mb-2">Onboarding Link Expired</h4>
        <p class="text-secondary mb-4">
            {{ $message ?? 'This document submission link is no longer valid or has expired for security reasons.' }}
        </p>

        <div class="p-3 bg-light rounded text-start small mb-4 border">
            <div class="fw-semibold text-dark mb-1"><i class="bi bi-info-circle me-1"></i> What should you do?</div>
            <div class="text-muted">
                Contact the property administrator or property management office to request a newly generated onboarding link.
            </div>
        </div>

        <a href="javascript:window.close();" class="btn btn-outline-secondary px-4">
            Close Window
        </a>
    </div>
</body>
</html>