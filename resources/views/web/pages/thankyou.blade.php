<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Subscription Successful</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
html,
body{
    height:100%;
    margin:0;
    padding:0;
    overflow:hidden; /* Prevent scrolling */
    background:linear-gradient(135deg,#0d6efd,#3d8bfd);
    font-family:'Segoe UI',sans-serif;
}

.page-wrapper{
    height:100%;
    width:100%;
    display:flex;
    justify-content:center;
    align-items:flex-start;
    padding-top:5vh; /* 5% from top */
    box-sizing:border-box;
}

.thankyou-card{
    width:100%;
    max-width:500px;
    max-height:500px;
    background:#fff;
    border-radius:20px;
    padding:45px;
    text-align:center;
    box-shadow:0 20px 50px rgba(0,0,0,.15);
}

.success-icon{
    width:50px;
    height:50px;
    margin:0 auto 25px;
    border-radius:50%;
    background:#e9f7ef;
    display:flex;
    align-items:center;
    justify-content:center;
}

.success-icon i{
    font-size:42px;
    color:#28a745;
}

.subscription-box{
    background:#f8fbff;
    border:1px solid #dbeafe;
    border-radius:12px;
    padding:5px;
    margin:5px 0;
}

.btn-custom{
    min-width:180px;
    border-radius:30px;
    padding:12px 25px;
    font-weight:600;
}

@media (max-width:768px){

    html,
    body{
        overflow:auto; /* Allow scroll on mobile if needed */
    }

    .page-wrapper{
        padding:20px;
        padding-top:40px;
        height:auto;
    }

    .thankyou-card{
        padding:30px 20px;
    }
}
</style>

</head>
<body>
<div class="page-wrapper">
    <div class="thankyou-card">
    
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                <path d="M13.485 1.929a.75.75 0 0 1 .086 1.057l-7 8a.75.75 0 0 1-1.08.02l-3-3a.75.75 0 1 1 1.06-1.06l2.434 2.433 6.47-7.394a.75.75 0 0 1 1.03-.056z"/>
            </svg>
        </div>
    
        <h3>Thank You!</h3>
    
        <p>
            Your subscription has been activated successfully.
            Welcome to our <strong>Real Estate Management Software</strong>.
            You now have access to powerful tools to manage leads, properties,
            appointments, CRM, and sales from one place.
        </p>
    
    
        <div class="d-flex justify-content-center gap-3 flex-wrap">
    
            <a href="{{ route('price') }}" class="btn btn-outline-primary btn-custom">
                ← Back
            </a>
    
            <a href="/user-home" class="btn btn-primary btn-custom">
                Go to Dashboard
            </a>
    
        </div>
    
        <div class="footer-text">
            Need assistance? Contact our support team anytime.
        </div>
    
    </div>
</div>

</body>
</html>