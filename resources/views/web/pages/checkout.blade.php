<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout</title>
<link rel="shortcut icon" type="image/jpg" href="https://admin.1crapp.com/images/icon.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<title>1crapp.com — Plan & Addons</title>
<style>
  :root{
    --blue: #4f46e5;
    --blue-dark: #4338ca;
    --blue-bg: #eef0fd;
    --border: #e5e7eb;
    --text: #1f2330;
    --muted: #6b7280;
    --green-bg: #eaf7ee;
    --green-text: #1f8a3b;
    --radius: 10px;
  }
  *{box-sizing:border-box;}
  body{
    margin:0;
    font-family: 'Segoe UI', Roboto, -apple-system, BlinkMacSystemFont, Arial, sans-serif;
    background:#f6f7fb;
    color:var(--text);
  }
  .page{
    max-width:1200px;
    margin:0 auto;
    padding:20px;
  }

  /* Header */
  .topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:16px 4px;
    flex-wrap:wrap;
    gap:10px;
  }
  .logo{
    font-weight:700;
    font-size:20px;
    color:var(--blue);
  }
  .logo span{color:var(--text);}
  .secure{
    font-size:13px;
    color:var(--muted);
    display:flex;
    align-items:center;
    gap:6px;
  }

  /* Steps */
  .steps{
    display:flex;
    justify-content:center;
    gap:40px;
    padding:20px 0 30px;
    flex-wrap:wrap;
  }
  .step{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
    color:var(--muted);
  }
  .step .dot{
    width:22px;height:22px;
    border-radius:50%;
    background:#d1d5db;
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:12px;
    flex-shrink:0;
  }
  .step.active{color:var(--text); font-weight:600;}
  .step.active .dot{background:var(--blue);}

  /* Layout */
  .layout{
    display:grid;
    grid-template-columns: 2fr 1fr;
    gap:20px;
    align-items:start;
  }

  .card{
    background:#fff;
    border:1px solid var(--border);
    border-radius:var(--radius);
    padding:20px;
  }

  .section-title{
    font-size:14px;
    font-weight:600;
    margin:0 0 14px;
    color:var(--text);
  }

  /* Plan row */
  .plan-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    flex-wrap:wrap;
  }
  .plan-left{
    display:flex;
    gap:12px;
    align-items:center;
  }
  .plan-icon{
    width:38px;height:38px;
    border-radius:8px;
    background:var(--blue);
    color:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:16px;
    flex-shrink:0;
  }
  .plan-name{font-weight:600; font-size:14px;}
  .plan-sub{font-size:12px; color:var(--muted); margin-top:2px;}
  .plan-price{
    font-weight:700;
    text-align:right;
    white-space:nowrap;
  }
  .plan-price small{
    display:block;
    font-weight:400;
    color:var(--muted);
    font-size:11px;
  }

  /* Promo */
  .promo{
    margin-top:18px;
    background:var(--blue-bg);
    border:1px solid #d7dafc;
    border-radius:var(--radius);
    padding:14px 16px;
  }
  .promo-label{
    font-size:13px;
    font-weight:600;
    color:var(--blue-dark);
    margin-bottom:10px;
    display:flex;
    align-items:center;
    gap:8px;
  }
  .promo-form{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
  }
  .promo-form input{
    flex:1;
    min-width:160px;
    padding:10px 12px;
    border:1px solid var(--border);
    border-radius:8px;
    font-size:13px;
    background:#fff;
  }
  .promo-form button{
    padding:10px 20px;
    background:var(--blue);
    color:#fff;
    border:none;
    border-radius:8px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    white-space:nowrap;
  }
  .promo-form button:hover{background:var(--blue-dark);}

  /* Addons */
  .addons-wrap{margin-top:24px;}
  .addons-sub{font-size:12px; color:var(--muted); margin:-8px 0 14px;}
  .addon{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    padding:14px 0;
    border-bottom:1px solid var(--border);
  }
  .addon:last-child{border-bottom:none;}
  .addon-left{
    display:flex;
    gap:12px;
    align-items:center;
    min-width:0;
  }
  .addon-icon{
    width:34px;height:34px;
    border-radius:8px;
    background:#f1f2fb;
    color:var(--blue);
    display:flex;align-items:center;justify-content:center;
    font-size:15px;
    flex-shrink:0;
  }
  .addon-name{font-size:13px; font-weight:600;}
  .addon-desc{font-size:12px; color:var(--muted); margin-top:2px;}
  .addon-right{
    display:flex;
    align-items:center;
    gap:16px;
    flex-shrink:0;
  }
  .addon-price{font-size:13px; font-weight:600; white-space:nowrap;}
  .addon-price small{display:block; font-weight:400; color:var(--muted); font-size:11px;}
  .addon input[type="checkbox"]{
    width:18px;height:18px;
    accent-color:var(--blue);
    cursor:pointer;
  }

  /* Yearly banner */
  .yearly-banner{
    margin-top:18px;
    background:var(--blue-bg);
    border:1px solid #d7dafc;
    border-radius:var(--radius);
    padding:14px 16px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    flex-wrap:wrap;
  }
  .yearly-banner p{
    margin:0;
    font-size:13px;
    font-weight:600;
    color:var(--blue-dark);
  }
  .yearly-banner button{
    padding:8px 16px;
    background:#fff;
    color:var(--blue);
    border:1px solid var(--blue);
    border-radius:8px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    white-space:nowrap;
  }

  /* Billing form */
  .billing{margin-top:28px;}
  .billing-sub{font-size:12px; color:var(--muted); margin:-8px 0 16px;}
  .form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
  }
  .field{display:flex; flex-direction:column; gap:6px;}
  .field label{font-size:12px; font-weight:600; color:var(--text);}
  .field input{
    padding:11px 12px;
    border:1px solid var(--border);
    border-radius:8px;
    font-size:13px;
    width:100%;
  }
  .field input:focus{
    outline:2px solid var(--blue);
    outline-offset:1px;
    border-color:var(--blue);
  }
  .secure-note{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    font-size:12px;
    color:var(--muted);
    margin:18px 0;
  }
  .pay-btn{
    width:100%;
    padding:14px;
    background:var(--blue);
    color:#fff;
    border:none;
    border-radius:8px;
    font-size:14px;
    font-weight:700;
    cursor:pointer;
  }
  .pay-btn:hover{background:var(--blue-dark);}
  .pay-note{
    text-align:center;
    font-size:12px;
    color:var(--muted);
    margin-top:10px;
  }

  /* Sidebar */
  .sidebar{
    display:flex;
    flex-direction:column;
    gap:20px;
    position:sticky;
    top:20px;
  }
  .summary-row{
    display:flex;
    justify-content:space-between;
    font-size:13px;
    margin-bottom:10px;
  }
  .summary-row.label-only{color:var(--muted); font-weight:600; margin-top:16px;}
  .summary-sub{font-size:11px; color:var(--muted); margin-top:-6px; margin-bottom:10px;}
  .edit-link{color:var(--blue); font-size:12px; font-weight:600; cursor:pointer;}
  hr.sep{border:none; border-top:1px solid var(--border); margin:14px 0;}
  .discount-box{
    background:var(--green-bg);
    border-radius:8px;
    padding:10px 12px;
    margin:14px 0;
  }
  .discount-box p{margin:0; font-size:12px; font-weight:600; color:var(--green-text);}
  .discount-box p.sub{font-weight:400; margin-top:2px;}
  .total-row{
    display:flex;
    justify-content:space-between;
    align-items:baseline;
    font-size:18px;
    font-weight:700;
    margin-top:6px;
  }
  .total-row small{font-size:11px; font-weight:400; color:var(--muted);}
  .tax-note{font-size:11px; color:var(--muted); margin-top:4px;}
  .why-list{list-style:none; padding:0; margin:14px 0 0; display:flex; flex-direction:column; gap:8px;}
  .why-list li{font-size:12px; display:flex; align-items:center; gap:8px; color:var(--text);}
  .why-list li:before{content:"✓"; color:var(--green-text); font-weight:700;}

  .secure-card{
    display:flex;
    gap:10px;
    align-items:flex-start;
    background:#eef0fd;
    border-radius:8px;
    padding:12px;
  }
  .secure-card b{font-size:13px;}
  .secure-card p{font-size:12px; color:var(--muted); margin:2px 0 0;}

  .testimonial{text-align:center; overflow:hidden;}
  .avatar{
    width:56px;height:56px;
    border-radius:50%;
    background:#e5e7eb;
    margin:0 auto 10px;
  }
  .testimonial b{font-size:13px; display:block;}
  .testimonial .role{font-size:11px; color:var(--muted); margin-bottom:8px;}
  .testimonial p.quote{font-size:12px; color:var(--muted); line-height:1.5;}
  .testimonial-nav{display:flex; align-items:center; justify-content:center; gap:10px; margin-top:8px;}
  .testimonial-nav button{
    border:1px solid var(--border);
    background:#fff;
    border-radius:50%;
    width:26px;height:26px;
    cursor:pointer;
    flex-shrink:0;
  }
  .testimonial-nav button:hover{border-color:var(--blue); color:var(--blue);}
  .phone{font-size:12px; margin-top:8px;}

  /* Testimonial slider */
  .slider-viewport{
    overflow:hidden;
    width:100%;
  }
  .slider-track{
    display:flex;
    transition: transform 0.4s ease;
  }
  .slide{
    flex:0 0 100%;
    width:100%;
    box-sizing:border-box;
  }
  .slider-dots{
    display:flex;
    justify-content:center;
    gap:6px;
    margin-top:10px;
  }
  .slider-dots button{
    width:6px;
    height:6px;
    padding:0;
    border-radius:50%;
    border:none;
    background:#d1d5db;
    cursor:pointer;
  }
  .slider-dots button.active{
    background:var(--blue);
    width:16px;
    border-radius:3px;
  }
  .watch-btn{
    margin-top:10px;
    width:100%;
    padding:10px;
    background:#1a9d4c;
    color:#fff;
    border:none;
    border-radius:8px;
    font-size:12px;
    font-weight:700;
    cursor:pointer;
  }
  .happy-note{font-size:11px; color:var(--muted); margin-top:8px;}

  /* ===== Responsive ===== */
  @media (max-width: 900px){
    .layout{
      grid-template-columns: 1fr;
    }
    .sidebar{
      position:static;
    }
  }

  @media (max-width: 640px){
    .page{padding:14px;}
    .steps{gap:16px; padding:14px 0 22px;}
    .step span.label{display:none;}
    .form-grid{grid-template-columns:1fr;}
    .card{padding:16px;}
    .plan-row{flex-direction:column; align-items:flex-start;}
    .plan-price{text-align:left;}
    .addon{flex-wrap:wrap;}
    .addon-right{width:100%; justify-content:space-between;}
    .yearly-banner{flex-direction:column; align-items:flex-start;}
    .yearly-banner button{width:100%;}
  }

  @media (max-width: 400px){
    .logo{font-size:17px;}
    .secure{display:none;}
  }
  .avatar{
        width:90px;
        height:90px;
        margin:0 auto 15px;
    }
    
    .avatar img{
        width:100%;
        height:100%;
        border-radius:50%;
        object-fit:cover;
        border:3px solid #eee;
    }
</style>
</head>
<body>
<div class="page">

  <div class="topbar">
    <div class="logo">1crapp<span>.com</span></div>
    <div class="secure">🔒 Secure Checkout</div>
  </div>

  <div class="steps">
    <div class="step"><span class="dot">1</span><span class="label">Plan &amp; Addons</span></div>
    <div class="step active"><span class="dot">2</span><span class="label">Checkout</span></div>
    <div class="step"><span class="dot">3</span><span class="label">Payment</span></div>
  </div>

  <div class="layout">
    <!-- Left column -->
    <div>
        @if($plan_for == 'adb')
            <form action="{{ route('upgrade-plan') }}" method="POST">
        @else
            <form action="{{ route('upgrade-cdb-plan') }}" method="POST">
        @endif
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
        <input type="hidden" name="razorpay_signature" id="razorpay_signature">
        <input type="hidden" id="order_id" value="">
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        <input type="hidden" name="plan_for" id="plan_for" value="{{ $plan_for }}">
        <input type="hidden" name="plan_type" class="plan-type" value="{{ $plan_type->id }}">
        <input type="hidden" name="coupon_discount_amount" class="coupon-discount-amount" value="0">
        <input type="hidden" name="coupon_discount_type" class="coupon-discount-type" value="">
        <input type="hidden" name="coupon_code" class="coupon-code" value="">
        <input type="hidden" name="coupon_id" class="coupon-id" value="">
        <input type="hidden" name="total_amount" class="total-amount" value="{{ $basePrice }}">
        <input type="hidden" name="plan_discount" class="plan-discount" value="{{ $discountAmount }}">
        <input type="hidden" name="amount" class="razorpay-amount" value="{{ $finalPrice }}">
        
      <div class="card">
        <div class="section-title">Selected Plan</div>
        <div class="plan-row">
          <div class="plan-left">
            <div class="plan-icon">📦</div>
            <div>
              <div class="plan-name">{{ $plan->title }}</div>
              <div class="plan-sub">{{ $plan_type->title }}</div>
            </div>
          </div>
          <div class="plan-price">₹{{ number_format($basePrice) }}<small>/ {{ $plan_type->title }}</small></div>
        </div>

        <div class="promo">
          <div class="promo-label">🏷️ Have a promo code?</div>
          <div class="promo-form">
            <input type="text" placeholder="Enter promo code" id="coupon_code" oninput="this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '')">
            <button type="button" onclick="applyCode()">Apply</button>
          </div>
            <p class="cpnmsg text-danger"></p>
        </div>

        <div class="addons-wrap">
          <div class="section-title">Add-ons (Optional)</div>
          <div class="addons-sub">Enhance your experience with powerful add-ons</div>

          <div class="addon">
            <div class="addon-left">
              <div class="addon-icon">🌐</div>
              <div>
                <div class="addon-name">Domain</div>
                <div class="addon-desc">Connect your custom domain</div>
              </div>
            </div>
            <div class="addon-right">
              <div class="addon-price">₹500<small>/ Quarterly</small></div>
              <input type="checkbox">
            </div>
          </div>

          <div class="addon">
            <div class="addon-left">
              <div class="addon-icon">✉️</div>
              <div>
                <div class="addon-name">SMTP</div>
                <div class="addon-desc">Enable custom email sending</div>
              </div>
            </div>
            <div class="addon-right">
              <div class="addon-price">₹600<small>/ Quarterly</small></div>
              <input type="checkbox">
            </div>
          </div>

          <div class="addon">
            <div class="addon-left">
              <div class="addon-icon">💬</div>
              <div>
                <div class="addon-name">SMS Notifications</div>
                <div class="addon-desc">Send SMS alerts &amp; notifications</div>
              </div>
            </div>
            <div class="addon-right">
              <div class="addon-price">₹400<small>/ Quarterly</small></div>
              <input type="checkbox">
            </div>
          </div>

          <div class="addon">
            <div class="addon-left">
              <div class="addon-icon">📊</div>
              <div>
                <div class="addon-name">Advanced Reports</div>
                <div class="addon-desc">Get detailed insights &amp; reports</div>
              </div>
            </div>
            <div class="addon-right">
              <div class="addon-price">₹800<small>/ Quarterly</small></div>
              <input type="checkbox">
            </div>
          </div>

          <div class="addon">
            <div class="addon-left">
              <div class="addon-icon">🎧</div>
              <div>
                <div class="addon-name">Priority Support</div>
                <div class="addon-desc">24/7 priority customer support</div>
              </div>
            </div>
            <div class="addon-right">
              <div class="addon-price">₹900<small>/ Quarterly</small></div>
              <input type="checkbox">
            </div>
          </div>
        </div>

        <div class="yearly-banner">
          <p>✨ Save More! Get 10% off on annual billing</p>
          <button type="button">Switch to Yearly →</button>
        </div>

        <div class="billing">
          <div class="section-title">Billing Information</div>
          <div class="billing-sub">Enter your details to continue</div>
          <div class="form-grid">
            <div class="field">
              <label>Full Name</label>
              <input type="text" placeholder="Enter your full name" value="{{ Auth()->user()->name }}">
            </div>
            <div class="field">
              <label>Email Address</label>
              <input type="email" placeholder="Enter your business email" value="{{ Auth()->user()->email }}">
            </div>
            <div class="field">
              <label>Company Name</label>
              <input type="text" placeholder="Enter your company name">
            </div>
            <div class="field">
              <label>GST Number (Optional)</label>
              <input type="text" placeholder="Enter GST number">
            </div>
            <div class="field">
              <label>Phone Number</label>
              <input type="tel" placeholder="Enter your phone number" value="{{ Auth()->user()->mobile }}">
            </div>
          </div>

          <div class="secure-note">🔒 Your information is secure and encrypted</div>

          <!--<button class="pay-btn" type="button">Continue to Payment →</button>-->
          <button class="pay-btn" type="button" onclick="paynow(this)">Continue to Payment →</button>
          <div class="pay-note">You won't be charged until the next step</div>
        </div>
      </div>
      </form>
    </div>

    <!-- Right column -->
    <div class="sidebar">
      <div class="card">
        <div class="section-title">Order Summary</div>

        <div class="summary-row label-only"><span>Plan</span></div>
        <div class="summary-row"><span>{{ $plan->title }}</span><span>₹{{ number_format($basePrice) }}</span></div>
        <div class="summary-sub">Billed {{ $plan_type->title }}</div>

        <div class="summary-row label-only">
          <span>Add-ons</span>
          <span class="edit-link">Edit</span>
        </div>
        <div class="summary-row"><span>No add-ons selected</span><span>₹0</span></div>

        <hr class="sep">

        <div class="summary-row"><span>Discount</span><span>-₹{{ number_format($discountAmount) }}</span></div>
        <div class="summary-row"><span>Subtotal</span><span>₹{{ number_format($finalPrice) }}</span></div>

        <div class="discount-box">
          <p>You Save (Promo Discount) &nbsp; - ₹<span class="coupon-discount"></span></p>
          <p class="sub">Great choice! Apply code to save more.</p>
        </div>

        <div class="total-row"><span>Total</span><span>₹<span class="grand_total">{{ number_format($finalPrice) }}</span><small>/{{ $plan_type->title }}</small></span></div>
        <div class="tax-note">*Taxes may be applicable at checkout</div>

        <div class="section-title" style="margin-top:20px;">Why choose 1crapp.com?</div>
        <ul class="why-list">
          <li>30-Day Money Back Guarantee</li>
          <li>99.9% Uptime Guarantee</li>
          <li>Secure &amp; Encrypted Data</li>
          <li>24/7 Customer Support</li>
        </ul>
      </div>

      <div class="card">
        <div class="secure-card">
          <span>🛡️</span>
          <div>
            <b>Secure Payment</b>
            <p>Your payment information is 100% secure and encrypted</p>
          </div>
        </div>
      </div>
        @php
            use App\Models\TestimonialsModel;
            $testimonials = TestimonialsModel::where([
                'status' => 1,
                'created_by' => app('currentAgent')->id
            ])->latest()
            ->limit(6)
            ->get();
        @endphp
      <div class="card testimonial">

        <div class="slider-viewport">
            <div class="slider-track" id="testimonialTrack">
    
                @foreach($testimonials as $client)
                <div class="slide">
    
                    <div class="avatar">
                        @if(!empty($client->image))
                            <img src="{{ ASSETS_PATH.$client->image }}"
                                 alt="{{ $client->name }}"
                                 class="img-fluid rounded-circle">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}"
                                 alt="User"
                                 class="img-fluid rounded-circle">
                        @endif
                    </div>
    
                    <b>{{ $client->name }}</b>
    
                    <div class="role">
                        {{ $client->designation }}
                        @if($client->company)
                            , {{ $client->company }}
                        @endif
    
                        @if($client->location)
                            , {{ $client->location }}
                        @endif
                    </div>
    
                    <div class="mb-2">
                        @for($i=1;$i<=5;$i++)
                            @if($i <= $client->rating)
                                <i class="fa fa-star text-warning"></i>
                            @else
                                <i class="fa fa-star-o text-warning"></i>
                            @endif
                        @endfor
                    </div>
    
                    <p class="quote">
                        {{ Str::limit($client->about, 120) }}
                    </p>
    
                    <div class="phone">
                        <a target="_blank"
                           href="https://api.whatsapp.com/send?phone={{ $client->contact }}&text=Hi">
                            <i class="fa fa-whatsapp text-success"></i>
                            +91 {{ $client->contact }}
                        </a>
                    </div>
    
                    @if(!empty($client->video))
                        <div class="mt-3">
                            <a href="{{ $client->video }}"
                               target="_blank"
                               class="watch-btn">
                                <i class="fa fa-play"></i>
                                WATCH VIDEO
                            </a>
                        </div>
                    @endif
    
                </div>
                @endforeach
    
            </div>
        </div>
    
        <div class="testimonial-nav">
            <button type="button" id="testimonialPrev">
                <i class="fa fa-chevron-left"></i>
            </button>
    
            <div class="slider-dots" id="testimonialDots"></div>
    
            <button type="button" id="testimonialNext">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    
        <div class="happy-note">
            More than <strong>1000+</strong> Happy Customers are using
            <strong>1crapp.com</strong>
        </div>
    
    </div>
    </div>
  </div>
</div>

<script>
(function(){
  const track = document.getElementById('testimonialTrack');
  const dotsWrap = document.getElementById('testimonialDots');
  const prevBtn = document.getElementById('testimonialPrev');
  const nextBtn = document.getElementById('testimonialNext');
  if(!track) return;

  const slides = Array.from(track.children);
  let index = 0;
  let autoplayTimer = null;

  // Build dots
  slides.forEach((_, i) => {
    const dot = document.createElement('button');
    dot.type = 'button';
    dot.setAttribute('aria-label', 'Go to testimonial ' + (i + 1));
    if(i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goTo(i));
    dotsWrap.appendChild(dot);
  });
  const dots = Array.from(dotsWrap.children);

  function render(){
    track.style.transform = 'translateX(-' + (index * 100) + '%)';
    dots.forEach((d, i) => d.classList.toggle('active', i === index));
  }

  function goTo(i){
    index = (i + slides.length) % slides.length;
    render();
    resetAutoplay();
  }

  function next(){ goTo(index + 1); }
  function prev(){ goTo(index - 1); }

  nextBtn.addEventListener('click', next);
  prevBtn.addEventListener('click', prev);

  function startAutoplay(){
    autoplayTimer = setInterval(next, 5000);
  }
  function resetAutoplay(){
    clearInterval(autoplayTimer);
    startAutoplay();
  }
  startAutoplay();

  // Swipe support for touch devices
  let touchStartX = 0;
  const viewport = track.parentElement;
  viewport.addEventListener('touchstart', e => {
    touchStartX = e.touches[0].clientX;
  }, {passive:true});
  viewport.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if(dx > 40) prev();
    else if(dx < -40) next();
  }, {passive:true});

  render();
})();
</script>
<script>

function paynow(el)
{
    const form = el.closest("form");
    let amount = form.querySelector(".razorpay-amount").value;
    let planType = form.querySelector(".plan-type").value;
    let planId = form.querySelector('[name="plan_id"]').value;

    fetch("{{ route('create.order') }}",{
        method:"POST",
        headers:{
            "Content-Type":"application/json",
            "X-CSRF-TOKEN":"{{ csrf_token() }}"
        },
        body:JSON.stringify({
            amount:amount*100
        })
    })
    .then(res=>res.json())
    .then(function(data){

        var options = {
            "key": "{{ config('razorpay.key') }}",
            "amount": data.amount,
            "currency": "INR",
            "order_id": data.order_id, // ⭐ important
            "name": "1CRAPP",
            "description": "Plan Purchase",
            "image": "{{ url('home/img/logo 1.png') }}",
            "handler": function (response){
                form.querySelector("#razorpay_payment_id").value = response.razorpay_payment_id;
                form.querySelector("#razorpay_order_id").value = response.razorpay_order_id;
                form.querySelector("#razorpay_signature").value = response.razorpay_signature;
                form.submit();
            },

            "prefill": {
                "name": "{{ Auth()->user()->name }}",
                "email": "{{ Auth()->user()->email }}"
            },

            "notes": {
                "plan_id": planId,
                "plan_type": planType
            },

            "theme": {
                "color": "#4e73df"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();

    });
}
</script>
<script>
    function applyCode() {

        let code = $('#coupon_code').val().trim();
        let plan_for = $('#plan_for').val().trim();
        let total_amount = "{{ $finalPrice }}";
    
        $('.cpnmsg').removeClass('text-success text-danger');
    
        if (!code) {
            $('.cpnmsg')
                .addClass('text-danger')
                .text('Please enter promo code!');
            return;
        }
    
        $.ajax({
            url: "{{ route('coupon.apply') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                code: code,
                subtotal: total_amount,
                plan_for: plan_for
            },
            beforeSend: function () {
                $('.cpnmsg')
                    .removeClass('text-danger text-success')
                    .text('Checking coupon...');
            },
            success: function (response) {
                if (response.status) {
            
                    $('.cpnmsg')
                        .removeClass('text-danger')
                        .addClass('text-success')
                        .text(response.message);
                    
                    $('.coupon-discount-type').val(response.discount_type);
                    $('.coupon-code').val(code);
                    $('.coupon-id').val(response.coupon_id);
                    if (response.discount_type == 'percent') {
            
                        $('.coupon-discount').text('- ' + response.discount_value + '%');
                        $('.discount-amount').text('- ₹' + response.discount.toFixed(2));
                        $('.grand_total').text(response.grand_total.toFixed(2));
                        $('.coupon-discount-amount').val(response.discount.toFixed(2));
                        $('.razorpay-amount').val(response.grand_total.toFixed(2));
            
                    } else if (response.discount_type == 'fixed') {
            
                        $('.coupon-discount').text('- ₹' + response.discount.toFixed(2));
                        $('.discount-amount').text('- ₹' + response.discount.toFixed(2));
                        $('.grand_total').text(response.grand_total.toFixed(2));
                        $('.coupon-discount-amount').val(response.discount.toFixed(2));
                        $('.razorpay-amount').val(response.grand_total.toFixed(2));
            
                    } else if (response.discount_type == 'free') {
            
                        $('.coupon-discount').text('FREE');
                        $('.discount-amount').text('₹0.00');
                        $('.grand_total').text('0.00');
                        $('.coupon-discount-amount').val(response.discount.toFixed(2));
                        $('.razorpay-amount').val(0);
            
                    }
            
                } else {
            
                    $('.cpnmsg')
                        .removeClass('text-success')
                        .addClass('text-danger')
                        .text(response.message);
            
                }
            
            },
            error: function (xhr, status, error) {

                console.log(xhr);
                console.log(xhr.responseText);
            
                $('.cpnmsg')
                    .removeClass('text-success')
                    .addClass('text-danger')
                    .text(xhr.responseJSON?.message || 'Something went wrong.');
            }
        });
    }
</script>
</body>
</html>