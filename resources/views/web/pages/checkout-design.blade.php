<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>1CRAPP Secure Checkout1</title>


<style>

/* =========================================================
   1CRAPP CHECKOUT
   FINAL VERSION
   TRUE VIEWPORT CENTERED
   PAGE BUILDER FRIENDLY
   MOBILE OPTIMIZED
========================================================= */


/* =========================================================
   RESET
========================================================= */

html,
body{

    width:100%;
    min-height:100%;

    margin:0;
    padding:0;

}

*{

    box-sizing:border-box;

}


/* =========================================================
   BRAND COLORS
========================================================= */

:root{

    --blue:#20579a;

    --blue-dark:#17477f;

    --red:#f44352;

    --red-dark:#e83748;

    --text:#202a3a;

    --muted:#8994a7;

    --border:#dce2eb;

    --light:#f7f9fc;

    --success:#21834a;

}


/* =========================================================
   BODY
========================================================= */

body{

    font-family:

        Inter,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Roboto,
        Arial,
        sans-serif;

    background:#f4f6fa;

    color:var(--text);

}


/* =========================================================
   IMPORTANT:
   FULL VIEWPORT WRAPPER

   This breaks the checkout out of a narrow
   Page Builder content container.
========================================================= */

.cr-checkout-page{

    width:100vw !important;

    max-width:none !important;

    min-height:100vh;

    margin-left:calc(50% - 50vw) !important;

    margin-right:0 !important;

    padding:
        35px
        20px
        50px;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:flex-start;

    position:relative;

    overflow-x:hidden;

}


/* =========================================================
   MAIN WRAPPER
========================================================= */

.cr-checkout-wrapper{

    width:100% !important;

    max-width:640px !important;

    margin-left:auto !important;

    margin-right:auto !important;

    display:flex;

    flex-direction:column;

    align-items:center;

}


/* =========================================================
   BRAND
========================================================= */

.cr-brand{

    width:100%;

    text-align:center;

    margin-bottom:6px;

}

.cr-brand-name{

    font-size:24px;

    line-height:1;

    font-weight:850;

    letter-spacing:-1px;

}

.cr-brand-name .cr-one{

    color:var(--red);

}

.cr-brand-name .cr-app{

    color:var(--blue);

}

.cr-secure{

    margin-top:6px;

    font-size:9px;

    color:#8994a7;

}


/* =========================================================
   STEPPER
========================================================= */

.cr-steps{

    width:100%;

    max-width:540px;

    margin:
        22px auto
        27px;

    display:flex;

    justify-content:center;

    align-items:flex-start;

}

.cr-step{

    width:75px;

    flex:0 0 75px;

    text-align:center;

}

.cr-step-circle{

    width:32px;

    height:32px;

    margin:0 auto;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#e9edf3;

    color:#aeb7c5;

    font-size:11px;

    font-weight:750;

}

.cr-step.active
.cr-step-circle{

    background:#fff0f2;

    color:var(--red);

}

.cr-step.completed
.cr-step-circle{

    background:#eaf3fc;

    color:var(--blue);

}

.cr-step-label{

    margin-top:6px;

    font-size:9px;

    font-weight:650;

    color:#aab3c0;

}

.cr-step.active
.cr-step-label{

    color:var(--red);

}

.cr-step.completed
.cr-step-label{

    color:var(--blue);

}

.cr-step-line{

    flex:0 1 45px;

    height:1px;

    background:#dce1e8;

    margin-top:16px;

}


/* =========================================================
   MAIN CARD
========================================================= */

.cr-checkout-card{

    width:100% !important;

    max-width:640px !important;

    margin-left:auto !important;

    margin-right:auto !important;

    background:#fff;

    border:1px solid #e1e5eb;

    border-radius:12px;

    overflow:hidden;

    box-shadow:

        0 14px 45px
        rgba(25,40,70,.11);

}


/* =========================================================
   CARD HEADER
========================================================= */

.cr-card-header{

    width:100%;

    padding:
        15px
        22px;

    background:var(--blue);

    color:#fff;

    display:flex;

    align-items:center;

    gap:8px;

    font-size:15px;

    font-weight:750;

}


/* =========================================================
   CONTENT
========================================================= */

.cr-content{

    width:100%;

    padding:
        30px
        32px
        28px;

}


/* =========================================================
   STEP CONTENT
========================================================= */

.cr-checkout-step{

    display:none;

}

.cr-checkout-step.active{

    display:block;

}


/* =========================================================
   HEADINGS
========================================================= */

.cr-title{

    margin:0 0 19px;

    font-size:21px;

    line-height:1.25;

    font-weight:750;

    color:#171d27;

}

.cr-subtitle{

    margin:
        -10px
        0
        20px;

    font-size:10px;

    line-height:1.5;

    color:var(--muted);

}


/* =========================================================
   FORM
========================================================= */

.cr-form-group{

    margin-bottom:15px;

}

.cr-label{

    display:block;

    margin-bottom:6px;

    font-size:10px;

    line-height:1.2;

    font-weight:650;

    color:#303947;

}

.cr-required{

    color:var(--red);

}

.cr-input,
.cr-select{

    width:100%;

    height:43px;

    padding:
        0
        12px;

    border:
        1px solid
        #d7dde6;

    border-radius:7px;

    background:#fff;

    color:#354156;

    font-size:11px;

    outline:none;

}

.cr-input::placeholder{

    color:#a0a9b7;

}

.cr-input:focus,
.cr-select:focus{

    border-color:var(--blue);

    box-shadow:

        0 0 0 3px
        rgba(32,87,154,.08);

}


/* =========================================================
   TWO COLUMN
========================================================= */

.cr-row{

    display:grid;

    grid-template-columns:
        1fr 1fr;

    gap:14px;

}


/* =========================================================
   SPECIAL OFFER
========================================================= */

.cr-offer{

    margin:
        18px
        0;

    padding:15px;

    background:#f7faff;

    border:
        1px solid
        #d7e3f4;

    border-radius:8px;

}

.cr-offer-title{

    margin-bottom:5px;

    font-size:11px;

    font-weight:750;

    color:var(--blue);

}

.cr-offer-text{

    margin-bottom:10px;

    font-size:9px;

    line-height:1.55;

    color:#7e899b;

}

.cr-offer-row{

    display:flex;

    gap:7px;

}

.cr-offer-row .cr-input{

    flex:1;

}

.cr-small-btn{

    height:43px;

    padding:
        0
        16px;

    border:0;

    border-radius:7px;

    background:var(--blue);

    color:#fff;

    font-size:9px;

    font-weight:750;

    cursor:pointer;

    white-space:nowrap;

}


/* =========================================================
   PRODUCT BOX
========================================================= */

.cr-product{

    width:100%;

    padding:15px;

    margin-bottom:17px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;

    border:
        1px solid
        var(--border);

    border-radius:8px;

    background:#fafbfd;

}

.cr-product-name{

    font-size:11px;

    font-weight:750;

    color:#344056;

}

.cr-product-description{

    margin-top:4px;

    font-size:8px;

    color:var(--muted);

}

.cr-price{

    font-size:19px;

    font-weight:850;

    color:var(--blue);

    white-space:nowrap;

}


/* =========================================================
   COUPON
========================================================= */

.cr-coupon{

    text-align:center;

    margin:
        14px
        0
        17px;

}

.cr-coupon-toggle{

    border:0;

    background:none;

    color:var(--blue);

    font-size:10px;

    font-weight:650;

    cursor:pointer;

}

.cr-coupon-area{

    display:none;

    margin-top:10px;

    gap:7px;

}

.cr-coupon-area.show{

    display:flex;

}

.cr-coupon-area .cr-input{

    flex:1;

}


/* =========================================================
   ADDONS
========================================================= */

.cr-addon{

    width:100%;

    min-height:52px;

    display:flex;

    align-items:center;

    gap:10px;

    padding:12px;

    margin-bottom:9px;

    border:
        1px solid
        var(--border);

    border-radius:7px;

}

.cr-addon-check{

    width:auto;

    height:auto;

}

.cr-addon-name{

    font-size:10px;

    font-weight:650;

    color:#354156;

}

.cr-addon-description{

    margin-top:3px;

    font-size:8px;

    color:var(--muted);

}

.cr-addon-price{

    margin-left:auto;

    font-size:9px;

    font-weight:700;

    color:var(--blue);

}


/* =========================================================
   ORDER SUMMARY
========================================================= */

.cr-summary{

    margin-top:18px;

    padding-top:15px;

    border-top:
        1px solid
        #e5e9ef;

}

.cr-summary-row{

    display:flex;

    justify-content:space-between;

    gap:10px;

    margin-bottom:9px;

    font-size:9px;

    color:#7f8999;

}

.cr-summary-row strong{

    color:#455168;

}

.cr-discount-row{

    display:none;

    color:var(--success);

}

.cr-discount-row strong{

    color:var(--success);

}

.cr-total{

    margin-top:10px;

    padding-top:13px;

    border-top:
        1px solid
        #e5e9ef;

    display:flex;

    align-items:center;

    justify-content:space-between;

}

.cr-total span{

    font-size:12px;

    font-weight:750;

    color:#273247;

}

.cr-total strong{

    font-size:21px;

    font-weight:850;

    color:var(--blue);

}


/* =========================================================
   PAYMENT OPTIONS
========================================================= */

.cr-payment-option{

    width:100%;

    display:flex;

    align-items:center;

    gap:10px;

    padding:13px;

    margin-bottom:9px;

    border:
        1px solid
        var(--border);

    border-radius:7px;

    cursor:pointer;

    background:#fff;

}

.cr-payment-option:hover{

    border-color:#b8c9dd;

    background:#fafcff;

}

.cr-payment-option input{

    width:auto;

    height:auto;

}

.cr-payment-name{

    font-size:10px;

    font-weight:700;

    color:#354156;

}

.cr-payment-description{

    display:block;

    margin-top:3px;

    font-size:8px;

    color:var(--muted);

}


/* =========================================================
   PRIMARY BUTTON
========================================================= */

.cr-primary-btn{

    width:100%;

    min-height:47px;

    margin-top:10px;

    border:0;

    border-radius:7px;

    background:var(--red);

    color:#fff;

    font-size:11px;

    font-weight:750;

    cursor:pointer;

    transition:
        background .15s,
        transform .15s;

}

.cr-primary-btn:hover{

    background:var(--red-dark);

    transform:translateY(-1px);

}


/* =========================================================
   BACK BUTTON
========================================================= */

.cr-back-btn{

    width:100%;

    min-height:38px;

    border:0;

    background:none;

    color:#929baa;

    font-size:9px;

    cursor:pointer;

}


/* =========================================================
   TRUST
========================================================= */

.cr-trust{

    margin-top:14px;

    text-align:center;

    font-size:8px;

    line-height:1.6;

    color:#9ba4b1;

}


/* =========================================================
   REVIEW
========================================================= */

.cr-review-box{

    margin-bottom:14px;

    padding:14px;

    background:#fafbfd;

    border:
        1px solid
        var(--border);

    border-radius:8px;

}

.cr-review-heading{

    margin-bottom:10px;

    font-size:10px;

    font-weight:750;

    color:#354156;

}

.cr-review-row{

    display:flex;

    justify-content:space-between;

    gap:15px;

    padding:7px 0;

    border-bottom:
        1px solid
        #edf0f4;

    font-size:9px;

}

.cr-review-row:last-child{

    border-bottom:0;

}

.cr-review-row span{

    color:#8a94a3;

}

.cr-review-row strong{

    color:#354156;

    text-align:right;

}


/* =========================================================
   FINISH
========================================================= */

.cr-finish{

    padding:
        15px
        0
        5px;

    text-align:center;

}

.cr-success{

    width:60px;

    height:60px;

    margin:
        0
        auto
        15px;

    border-radius:50%;

    background:#eaf7ef;

    color:var(--success);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:27px;

    font-weight:800;

}

.cr-finish-title{

    margin-bottom:8px;

    font-size:21px;

    font-weight:750;

    color:#202937;

}

.cr-finish-text{

    font-size:9px;

    line-height:1.65;

    color:var(--muted);

}

.cr-order-number{

    margin:
        16px
        0;

    padding:11px;

    border-radius:7px;

    background:#f7f9fc;

    font-size:9px;

    color:#657186;

}

.cr-order-number strong{

    color:var(--blue);

}


/* =========================================================
   POWERED BY
========================================================= */

.cr-powered{

    width:100%;

    margin-top:15px;

    text-align:center;

    font-size:8px;

    color:#a2a9b4;

}

.cr-powered strong{

    color:var(--blue);

}


/* =========================================================
   PAGE BUILDER OVERRIDES
========================================================= */

.cr-checkout-page,
.cr-checkout-page *{

    box-sizing:border-box !important;

}


/*
   Prevent common Page Builder restrictions
*/

.cr-checkout-page{

    max-width:none !important;

    float:none !important;

}


/*
   Do NOT allow builder alignment
   to move the wrapper
*/

.cr-checkout-wrapper{

    float:none !important;

    position:relative !important;

    left:auto !important;

    right:auto !important;

    transform:none !important;

}


/*
   Force actual card center
*/

.cr-checkout-card{

    position:relative !important;

    left:auto !important;

    right:auto !important;

    transform:none !important;

    margin-left:auto !important;

    margin-right:auto !important;

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width:760px){

    .cr-checkout-page{

        padding:
            25px
            15px
            35px;

    }

    .cr-checkout-wrapper{

        max-width:600px !important;

    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width:600px){

    .cr-checkout-page{

        width:100vw !important;

        margin-left:
            calc(50% - 50vw) !important;

        padding:
            15px
            10px
            30px;

    }


    .cr-checkout-wrapper{

        width:100% !important;

        max-width:100% !important;

    }


    .cr-brand-name{

        font-size:21px;

    }


    .cr-secure{

        font-size:8px;

    }


    .cr-steps{

        width:100%;

        max-width:100%;

        margin:
            15px
            auto
            20px;

    }


    .cr-step{

        width:58px;

        flex:0 0 58px;

    }


    .cr-step-circle{

        width:29px;

        height:29px;

        font-size:10px;

    }


    .cr-step-label{

        font-size:8px;

    }


    .cr-step-line{

        flex:1;

        max-width:24px;

        margin-top:14px;

    }


    .cr-checkout-card{

        width:100% !important;

        max-width:100% !important;

        border-radius:10px;

    }


    .cr-card-header{

        padding:
            13px
            17px;

        font-size:14px;

    }


    .cr-content{

        padding:
            22px
            18px
            20px;

    }


    .cr-title{

        font-size:18px;

        margin-bottom:17px;

    }


    /*
       IMPORTANT:
       Single-column mobile form
    */

    .cr-row{

        grid-template-columns:1fr;

        gap:0;

    }


    .cr-label{

        font-size:9px;

    }


    .cr-input,
    .cr-select{

        height:44px;

        font-size:11px;

    }


    .cr-offer{

        padding:13px;

    }


    .cr-offer-row{

        flex-direction:column;

    }


    .cr-offer-row .cr-input{

        width:100%;

    }


    .cr-small-btn{

        width:100%;

        height:44px;

    }


    .cr-coupon-area.show{

        flex-direction:column;

    }


    .cr-coupon-area .cr-small-btn{

        width:100%;

    }


    .cr-primary-btn{

        min-height:49px;

        font-size:11px;

    }


    .cr-product{

        padding:13px;

    }


    .cr-price{

        font-size:17px;

    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width:380px){

    .cr-checkout-page{

        padding:
            10px
            7px
            22px;

    }


    .cr-content{

        padding:
            20px
            15px
            18px;

    }


    .cr-step{

        width:51px;

        flex:0 0 51px;

    }


    .cr-step-line{

        max-width:15px;

    }


    .cr-step-label{

        font-size:7px;

    }


    .cr-card-header{

        font-size:13px;

    }

}

</style>

</head>


<body>


<!-- =======================================================
     FULL VIEWPORT CHECKOUT
======================================================= -->

<div class="cr-checkout-page">


<div class="cr-checkout-wrapper">


<!-- =====================================================
     BRAND
===================================================== -->

<div class="cr-brand">

    <div class="cr-brand-name">

        <span class="cr-one">1CR</span>
        <span class="cr-app">APP</span>

    </div>


    <div class="cr-secure">

        🔒 Secure Checkout

    </div>

</div>



<!-- =====================================================
     DYNAMIC STEPPER
===================================================== -->

<div
    class="cr-steps"
    id="crSteps">

</div>



<!-- =====================================================
     CHECKOUT CARD
===================================================== -->

<div class="cr-checkout-card">


<!-- CARD HEADER -->

<div class="cr-card-header">

    🔒 Checkout

</div>


<div class="cr-content">



<!-- =====================================================
     CONTACT
===================================================== -->

<div
    class="cr-checkout-step active"
    id="cr-contact">


<h1 class="cr-title">

    Contact Information

</h1>


<div class="cr-row">


<div class="cr-form-group">

<label class="cr-label">

    First Name
    <span class="cr-required">*</span>

</label>


<input
    id="cr-first-name"
    class="cr-input"
    type="text"
    autocomplete="given-name"
    placeholder="John">

</div>



<div class="cr-form-group">

<label class="cr-label">

    Last Name
    <span class="cr-required">*</span>

</label>


<input
    id="cr-last-name"
    class="cr-input"
    type="text"
    autocomplete="family-name"
    placeholder="Doe">

</div>


</div>



<div class="cr-form-group">

<label class="cr-label">

    Email
    <span class="cr-required">*</span>

</label>


<input
    id="cr-email"
    class="cr-input"
    type="email"
    autocomplete="email"
    placeholder="johndoe@gmail.com">

</div>



<!-- SPECIAL LIMITED-TIME OFFER -->

<div class="cr-offer">


<div class="cr-offer-title">

    🎁 Want a Special Limited-Time Offer?

</div>


<div class="cr-offer-text">

    Enter your email and we'll check if you qualify
    for a special discount coupon.

</div>


<div class="cr-offer-row">


<input
    id="cr-offer-email"
    class="cr-input"
    type="email"
    autocomplete="email"
    placeholder="Enter your email">


<button
    type="button"
    class="cr-small-btn"
    onclick="crRequestOffer()">

    Get Offer

</button>


</div>


</div>



<button
    type="button"
    class="cr-primary-btn"
    onclick="crGoTo('billing')">

    Continue to Billing

</button>


</div>



<!-- =====================================================
     BILLING
===================================================== -->

<div
    class="cr-checkout-step"
    id="cr-billing">


<h1 class="cr-title">

    Billing Information

</h1>


<div class="cr-subtitle">

    Enter the details required for your invoice.

</div>



<div class="cr-form-group">

<label class="cr-label">

    Full Address
    <span class="cr-required">*</span>

</label>


<input
    id="cr-address"
    class="cr-input"
    type="text"
    autocomplete="street-address"
    placeholder="House / Flat / Street / Area">

</div>



<div class="cr-row">


<div class="cr-form-group">

<label class="cr-label">

    City

</label>


<input
    id="cr-city"
    class="cr-input"
    type="text"
    autocomplete="address-level2"
    placeholder="City">

</div>



<div class="cr-form-group">

<label class="cr-label">

    PIN Code

</label>


<input
    id="cr-pin"
    class="cr-input"
    type="text"
    inputmode="numeric"
    maxlength="6"
    autocomplete="postal-code"
    placeholder="110001">

</div>


</div>



<div class="cr-form-group">

<label class="cr-label">

    State

</label>


<select
    id="cr-state"
    class="cr-select">

<option value="">
    Select State
</option>

<option>Andhra Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Delhi</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Tamil Nadu</option>
<option>Telangana</option>
<option>Uttar Pradesh</option>
<option>Uttarakhand</option>
<option>West Bengal</option>
<option>Other</option>

</select>

</div>



<div class="cr-form-group">

<label class="cr-label">

    GST Number

    <span
        style="
        color:#9aa2ae;
        font-weight:400;
        ">

        (Optional)

    </span>

</label>


<input
    id="cr-gst"
    class="cr-input"
    type="text"
    maxlength="15"
    placeholder="GSTIN">

</div>



<button
    type="button"
    class="cr-primary-btn"
    onclick="crGoTo('next')">

    Continue

</button>


<button
    type="button"
    class="cr-back-btn"
    onclick="crGoTo('contact')">

    ← Back to Contact

</button>


</div>



<!-- =====================================================
     ADD-ONS
===================================================== -->

<div
    class="cr-checkout-step"
    id="cr-addons">


<h1 class="cr-title">

    Enhance Your Purchase

</h1>


<div class="cr-subtitle">

    Add optional features to your order.

</div>



<div class="cr-addon">


<input
    type="checkbox"
    class="cr-addon-check"
    data-price="500">


<div>

<div class="cr-addon-name">
    Domain
</div>

<div class="cr-addon-description">
    Connect your custom domain
</div>

</div>


<div class="cr-addon-price">
    +₹500
</div>


</div>



<div class="cr-addon">


<input
    type="checkbox"
    class="cr-addon-check"
    data-price="600">


<div>

<div class="cr-addon-name">
    SMTP
</div>

<div class="cr-addon-description">
    Enable custom email sending
</div>

</div>


<div class="cr-addon-price">
    +₹600
</div>


</div>



<div class="cr-addon">


<input
    type="checkbox"
    class="cr-addon-check"
    data-price="800">


<div>

<div class="cr-addon-name">
    Advanced Reports
</div>

<div class="cr-addon-description">
    Detailed insights and reports
</div>

</div>


<div class="cr-addon-price">
    +₹800
</div>


</div>



<div class="cr-summary">


<div class="cr-summary-row">

<span>
    Base Product
</span>

<strong>
    ₹999
</strong>

</div>



<div class="cr-summary-row">

<span>
    Add-ons
</span>

<strong id="cr-addon-total">
    ₹0
</strong>

</div>



<div class="cr-total">

<span>
    Total
</span>

<strong id="cr-addon-grand-total">
    ₹999
</strong>

</div>


</div>



<button
    type="button"
    class="cr-primary-btn"
    onclick="crGoTo('payment')">

    Continue to Payment

</button>


<button
    type="button"
    class="cr-back-btn"
    onclick="crGoTo('billing')">

    ← Back to Billing

</button>


</div>



<!-- =====================================================
     REVIEW
===================================================== -->

<div
    class="cr-checkout-step"
    id="cr-review">


<h1 class="cr-title">

    Review Your Order

</h1>


<div class="cr-subtitle">

    Please review your details before payment.

</div>



<div class="cr-review-box">


<div class="cr-review-heading">

    Customer Details

</div>


<div class="cr-review-row">

<span>
    Name
</span>

<strong id="cr-review-name">
    —
</strong>

</div>


<div class="cr-review-row">

<span>
    Email
</span>

<strong id="cr-review-email">
    —
</strong>

</div>


<div class="cr-review-row">

<span>
    Address
</span>

<strong id="cr-review-address">
    —
</strong>

</div>


</div>



<div class="cr-review-box">


<div class="cr-review-heading">

    Order

</div>


<div class="cr-review-row">

<span>
    Product
</span>

<strong>
    1CR APP Product
</strong>

</div>


<div class="cr-review-row">

<span>
    Amount
</span>

<strong id="cr-review-amount">
    ₹999
</strong>

</div>


</div>



<button
    type="button"
    class="cr-primary-btn"
    onclick="crGoTo('payment')">

    Continue to Payment

</button>


<button
    type="button"
    class="cr-back-btn"
    onclick="crGoTo('billing')">

    ← Back to Billing

</button>


</div>



<!-- =====================================================
     PAYMENT
===================================================== -->

<div
    class="cr-checkout-step"
    id="cr-payment">


<h1 class="cr-title">

    Payment

</h1>


<div class="cr-subtitle">

    Select your preferred payment method.

</div>



<!-- PRODUCT -->

<div class="cr-product">


<div>

<div class="cr-product-name">

    1CR APP Product

</div>


<div class="cr-product-description">

    Secure one-time purchase

</div>

</div>


<div
    class="cr-price"
    id="cr-product-price">

    ₹999

</div>


</div>



<!-- COUPON -->

<div class="cr-coupon">


<button
    type="button"
    class="cr-coupon-toggle"
    onclick="crToggleCoupon()">

    🏷 Have a coupon code?

</button>



<div
    class="cr-coupon-area"
    id="cr-coupon-area">


<input
    id="cr-coupon"
    class="cr-input"
    type="text"
    placeholder="Enter coupon code">


<button
    type="button"
    class="cr-small-btn"
    onclick="crApplyCoupon()">

    Apply

</button>


</div>


</div>



<!-- SUMMARY -->

<div class="cr-summary">


<div class="cr-summary-row">

<span>
    Product
</span>

<strong>
    ₹999
</strong>

</div>



<div
    class="cr-summary-row cr-discount-row"
    id="cr-discount-row">

<span>
    Discount
</span>

<strong id="cr-discount">
    -₹0
</strong>

</div>



<div class="cr-total">

<span>
    Total Payable
</span>

<strong id="cr-total">
    ₹999
</strong>

</div>


</div>



<!-- PAYMENT OPTIONS -->

<div style="margin-top:18px;">


<label class="cr-payment-option">


<input
    type="radio"
    name="cr-payment"
    checked>


<div>

<div class="cr-payment-name">

    UPI

</div>

<div class="cr-payment-description">

    Google Pay, PhonePe, Paytm & other UPI apps

</div>

</div>


</label>



<label class="cr-payment-option">


<input
    type="radio"
    name="cr-payment">


<div>

<div class="cr-payment-name">

    Credit / Debit Card

</div>

<div class="cr-payment-description">

    Visa, Mastercard, RuPay

</div>

</div>


</label>



<label class="cr-payment-option">


<input
    type="radio"
    name="cr-payment">


<div>

<div class="cr-payment-name">

    Net Banking

</div>

<div class="cr-payment-description">

    Secure bank payment

</div>

</div>


</label>


</div>



<button
    type="button"
    class="cr-primary-btn"
    onclick="crFinishPayment()">

    Pay ₹<span id="cr-pay-amount">999</span>

</button>


<button
    type="button"
    class="cr-back-btn"
    onclick="crGoTo('previous')">

    ← Back

</button>



<div class="cr-trust">

    🔒 Secure & encrypted payment

    <br>

    Your payment information is protected.

</div>


</div>



<!-- =====================================================
     FINISH
===================================================== -->

<div
    class="cr-checkout-step"
    id="cr-finish">


<div class="cr-finish">


<div class="cr-success">

    ✓

</div>


<div class="cr-finish-title">

    Thank You!

</div>


<div class="cr-finish-text">

    Your order has been successfully received.

    <br>

    A confirmation has been sent to your email.

</div>


<div class="cr-order-number">

    Order Number:

    <strong id="cr-order-number">

        1CR-000001

    </strong>

</div>


<button
    type="button"
    class="cr-primary-btn"
    onclick="crFinishPage()">

    Continue

</button>


</div>


</div>



</div>

</div>



<!-- =====================================================
     POWERED BY
===================================================== -->

<div class="cr-powered">

    Powered by

    <strong>
        1CRAPP
    </strong>

</div>


</div>

</div>



<script>

/* =========================================================
   1CRAPP CHECKOUT ENGINE
========================================================= */


/* =========================================================
   PRODUCT CONFIGURATION
========================================================= */

const CR_PRODUCT_PRICE = 999;

let crDiscount = 0;

let crCurrentStep = "contact";


/* =========================================================
   SELECT CHECKOUT TEMPLATE

   QUICK
   STANDARD
   PREMIUM
   HIGH VALUE
   COMPACT
========================================================= */

const CR_CHECKOUT_TEMPLATE = "highvalue";


/*
   QUICK
   Contact → Payment → Finish

   STANDARD
   Contact → Billing → Payment → Finish

   PREMIUM
   Contact → Billing → Add-ons → Payment → Finish

   HIGH VALUE
   Contact → Billing → Review → Payment → Finish

   COMPACT
   Contact → Billing → Payment → Finish
*/


const CR_TEMPLATES = {


    quick: [

        ["contact","Contact"],

        ["payment","Payment"],

        ["finish","Finish"]

    ],


    standard: [

        ["contact","Contact"],

        ["billing","Billing"],

        ["payment","Payment"],

        ["finish","Finish"]

    ],


    premium: [

        ["contact","Contact"],

        ["billing","Billing"],

        ["addons","Add-ons"],

        ["payment","Payment"],

        ["finish","Finish"]

    ],


    highvalue: [

        ["contact","Contact"],

        ["billing","Billing"],

        ["review","Review"],

        ["payment","Payment"],

        ["finish","Finish"]

    ],


    compact: [

        ["contact","Contact"],

        ["billing","Billing"],

        ["payment","Payment"],

        ["finish","Finish"]

    ]

};


/* =========================================================
   CREATE STEPPER
========================================================= */

function crCreateStepper(){

    const container =
        document.getElementById(
            "crSteps"
        );


    const steps =
        CR_TEMPLATES[
            CR_CHECKOUT_TEMPLATE
        ];


    container.innerHTML = "";


    steps.forEach(
        function(step,index){

            const item =
                document.createElement(
                    "div"
                );


            item.className =
                "cr-step" +
                (
                    index === 0
                    ? " active"
                    : ""
                );


            item.id =
                "cr-step-indicator-" +
                index;


            item.innerHTML =

            `
            <div class="cr-step-circle">
                ${index + 1}
            </div>

            <div class="cr-step-label">
                ${step[1]}
            </div>
            `;


            container.appendChild(item);


            if(
                index <
                steps.length - 1
            ){

                const line =
                    document.createElement(
                        "div"
                    );


                line.className =
                    "cr-step-line";


                container.appendChild(
                    line
                );

            }

        }
    );

}


/* =========================================================
   GET CURRENT TEMPLATE
========================================================= */

function crGetSteps(){

    return CR_TEMPLATES[
        CR_CHECKOUT_TEMPLATE
    ];

}


/* =========================================================
   NAVIGATION
========================================================= */

function crGoTo(target){

    const steps =
        crGetSteps();


    let currentIndex =
        steps.findIndex(
            function(step){

                return (
                    step[0] ===
                    crCurrentStep
                );

            }
        );


    /* -----------------------------------------
       NEXT
    ----------------------------------------- */

    if(target === "next"){

        const nextIndex =
            currentIndex + 1;


        if(
            nextIndex >=
            steps.length
        ){

            return;

        }


        target =
            steps[
                nextIndex
            ][0];

    }


    /* -----------------------------------------
       PREVIOUS
    ----------------------------------------- */

    if(target === "previous"){

        const previousIndex =
            Math.max(
                0,
                currentIndex - 1
            );


        target =
            steps[
                previousIndex
            ][0];

    }


    /* -----------------------------------------
       VALIDATION
    ----------------------------------------- */

    if(
        target === "billing" &&
        !crValidateContact()
    ){

        return;

    }


    if(
        target === "payment" &&
        crCurrentStep === "billing" &&
        !crValidateBilling()
    ){

        return;

    }


    /* -----------------------------------------
       UPDATE REVIEW
    ----------------------------------------- */

    if(target === "review"){

        crUpdateReview();

    }


    /* -----------------------------------------
       HIDE ALL STEPS
    ----------------------------------------- */

    document
        .querySelectorAll(
            ".cr-checkout-step"
        )
        .forEach(
            function(step){

                step.classList.remove(
                    "active"
                );

            }
        );


    /* -----------------------------------------
       SHOW TARGET
    ----------------------------------------- */

    const targetElement =
        document.getElementById(
            "cr-" + target
        );


    if(!targetElement){

        return;

    }


    targetElement.classList.add(
        "active"
    );


    crCurrentStep =
        target;


    crUpdateStepper();


    /* -----------------------------------------
       Scroll
    ----------------------------------------- */

    window.scrollTo({

        top:0,

        behavior:"smooth"

    });

}


/* =========================================================
   VALIDATE CONTACT
========================================================= */

function crValidateContact(){

    const first =
        document
        .getElementById(
            "cr-first-name"
        )
        .value
        .trim();


    const last =
        document
        .getElementById(
            "cr-last-name"
        )
        .value
        .trim();


    const email =
        document
        .getElementById(
            "cr-email"
        )
        .value
        .trim();


    if(!first){

        alert(
            "Please enter your first name."
        );

        return false;

    }


    if(!last){

        alert(
            "Please enter your last name."
        );

        return false;

    }


    if(
        !email ||
        !email.includes("@")
    ){

        alert(
            "Please enter a valid email address."
        );

        return false;

    }


    return true;

}


/* =========================================================
   VALIDATE BILLING
========================================================= */

function crValidateBilling(){

    const address =
        document
        .getElementById(
            "cr-address"
        )
        .value
        .trim();


    if(!address){

        alert(
            "Please enter your billing address."
        );

        return false;

    }


    return true;

}


/* =========================================================
   UPDATE STEPPER
========================================================= */

function crUpdateStepper(){

    const steps =
        crGetSteps();


    const currentIndex =
        steps.findIndex(
            function(step){

                return (
                    step[0] ===
                    crCurrentStep
                );

            }
        );


    steps.forEach(
        function(step,index){

            const indicator =
                document.getElementById(
                    "cr-step-indicator-" +
                    index
                );


            if(!indicator){

                return;

            }


            indicator.classList.remove(
                "active",
                "completed"
            );


            if(index < currentIndex){

                indicator.classList.add(
                    "completed"
                );

            }


            if(index === currentIndex){

                indicator.classList.add(
                    "active"
                );

            }

        }
    );

}


/* =========================================================
   SPECIAL OFFER
========================================================= */

function crRequestOffer(){

    const offerEmail =
        document
        .getElementById(
            "cr-offer-email"
        )
        .value
        .trim();


    if(
        !offerEmail ||
        !offerEmail.includes("@")
    ){

        alert(
            "Please enter a valid email address."
        );

        return;

    }


    /*
       REAL 1CRAPP BACKEND:

       Send email to server.

       Server should:

       1. Check eligibility
       2. Generate private coupon
       3. Store coupon
       4. Send coupon by email
    */


    document
        .getElementById(
            "cr-email"
        )
        .value =
        offerEmail;


    alert(

        "If eligible, your special limited-time " +
        "coupon will be sent to your email."

    );

}


/* =========================================================
   COUPON TOGGLE
========================================================= */

function crToggleCoupon(){

    document
        .getElementById(
            "cr-coupon-area"
        )
        .classList.toggle(
            "show"
        );

}


/* =========================================================
   APPLY COUPON
========================================================= */

function crApplyCoupon(){

    const code =
        document
        .getElementById(
            "cr-coupon"
        )
        .value
        .trim()
        .toUpperCase();


    /*
       DEMO COUPON

       Replace with backend validation.
    */

    if(code === "SPECIAL20"){

        crDiscount = 200;


        document
            .getElementById(
                "cr-discount-row"
            )
            .style.display =
            "flex";


        document
            .getElementById(
                "cr-discount"
            )
            .textContent =
            "-₹200";


        crUpdateTotal();


        alert(
            "Coupon applied successfully."
        );

    }

    else{

        alert(
            "Invalid or expired coupon."
        );

    }

}


/* =========================================================
   UPDATE TOTAL
========================================================= */

function crUpdateTotal(){

    const total =
        CR_PRODUCT_PRICE -
        crDiscount;


    document
        .getElementById(
            "cr-total"
        )
        .textContent =
        "₹" + total;


    document
        .getElementById(
            "cr-pay-amount"
        )
        .textContent =
        total;


    document
        .getElementById(
            "cr-product-price"
        )
        .textContent =
        "₹" + total;


    document
        .getElementById(
            "cr-review-amount"
        )
        .textContent =
        "₹" + total;

}


/* =========================================================
   ADD-ONS
========================================================= */

document
    .querySelectorAll(
        ".cr-addon-check"
    )
    .forEach(
        function(check){

            check.addEventListener(
                "change",
                crUpdateAddons
            );

        }
    );


function crUpdateAddons(){

    let addonTotal = 0;


    document
        .querySelectorAll(
            ".cr-addon-check"
        )
        .forEach(
            function(check){

                if(check.checked){

                    addonTotal +=
                        Number(
                            check.dataset.price
                        );

                }

            }
        );


    const addonElement =
        document.getElementById(
            "cr-addon-total"
        );


    const grandElement =
        document.getElementById(
            "cr-addon-grand-total"
        );


    if(addonElement){

        addonElement.textContent =
            "₹" + addonTotal;

    }


    if(grandElement){

        grandElement.textContent =
            "₹" +
            (
                CR_PRODUCT_PRICE +
                addonTotal
            );

    }

}


/* =========================================================
   REVIEW
========================================================= */

function crUpdateReview(){

    const first =
        document
        .getElementById(
            "cr-first-name"
        )
        .value
        .trim();


    const last =
        document
        .getElementById(
            "cr-last-name"
        )
        .value
        .trim();


    const email =
        document
        .getElementById(
            "cr-email"
        )
        .value
        .trim();


    const address =
        document
        .getElementById(
            "cr-address"
        )
        .value
        .trim();


    document
        .getElementById(
            "cr-review-name"
        )
        .textContent =
        (
            first +
            " " +
            last
        ).trim();


    document
        .getElementById(
            "cr-review-email"
        )
        .textContent =
        email || "—";


    document
        .getElementById(
            "cr-review-address"
        )
        .textContent =
        address || "—";


    crUpdateTotal();

}


/* =========================================================
   PAYMENT
========================================================= */

function crFinishPayment(){

    /*
       DEMO ONLY.

       REAL 1CRAPP:

       1. Create payment order
       2. Send to Razorpay / Cashfree /
          PhonePe / Stripe etc.
       3. Receive payment response
       4. Verify payment server-side
       5. Create order
       6. Show Finish
    */


    const orderNumber =
        "1CR-" +
        Math.floor(
            100000 +
            Math.random() *
            900000
        );


    document
        .getElementById(
            "cr-order-number"
        )
        .textContent =
        orderNumber;


    crGoTo("finish");

}


/* =========================================================
   FINISH
========================================================= */

function crFinishPage(){

    alert(
        "Thank you for your purchase!"
    );

}


/* =========================================================
   INITIALIZE
========================================================= */

crCreateStepper();

crUpdateStepper();

crUpdateTotal();

crUpdateAddons();

</script>


</body>

</html>