@include('web.common.header')
@php
use Illuminate\Support\Facades\DB;
@endphp
<style>

.razorpay-payment-button{
display:none;
}

/* Duration Switcher */

.plan-duration-switcher{
    display:flex;
    justify-content:center;
    gap:15px;
    margin-bottom:40px;
}

.duration-option input{
    display:none;
}

.duration-option span{
padding:10px 18px;
border-radius:25px;
border:1px solid #ddd;
font-weight:600;
cursor:pointer;
background:#fff;
}

.duration-option input:checked + span{
background:#4e73df;
color:#fff;
border-color:#4e73df;
}

/* Plan Card */

.plan-card{
background:#fff;
border-radius:10px;
padding:30px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
margin-bottom:30px;
text-align:center;
position:relative;
border: 2px solid #1c5299;
overflow:hidden;
}

.plan-card h4{
font-weight:700;
margin-bottom:5px;
}

.plan-price{
font-size:34px;
font-weight:700;
margin:20px 0;
}

.prc_per_month{
font-size:14px;
color:#666;
}

.ribbon-wrap{
	position:absolute;
	top:0px;
	right:0px;
}

.ribbon-wrap {
    width: 190px;
    height: 120px;
}
.ribbon {
    width: 275px;
}

.ribbon{
background:#ff4d4d;
color:#fff;
padding:5px 15px;
font-size:10px;
border-radius:4px;
}

.str_bnt_area a{
display:inline-block;
padding:12px 25px;
background:#4e73df;
color:#fff;
border-radius:5px;
font-weight:600;
text-decoration:none;
}

.str_bnt_area a:hover{
background:#3d5bd1;
}
.list-unstyled {
  text-align: left;
  max-height: 400px;
  overflow-x: scroll;
}
.fade {
    opacity: 999;
}
.modal-dialog-centered {
    margin-top: 10%;
}
</style>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />

    <div class="midils_contnts">
        <div class="medilss">
            <h4>Price</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Price</span>
        </div>
    </div>
</section>
<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12 default-padding2 pricarealists">
                    <div class="pricing_listst" id="alss_pgesss">
                        <h3>Pricing Plans</h3>
                         <p class="text-center">The Balance Amount  in your current plan ( if any ) will be adjusted into your upgraded Plan so that you don't Lose your current balance Credits.</p>
                         <br>
                    </div>

                    <!---- Tab Area ---->

                    <div class="prc_box_listst">
                        <div class="plan-duration-switcher">
                            @foreach($plan_type as $key=>$type)
                            <label class="duration-option">
                                <input type="radio" name="plan_duration" value="{{ $type->id }}" @if($key == 0) checked @endif>
                                <span>{{ ucwords($type->title) }}</span>
                            </label>
                            @endforeach
                            <!--<label class="duration-option">-->
                            <!--    <input type="radio" name="plan_duration" value="quarterly">-->
                            <!--    <span>Quarterly</span>-->
                            <!--</label>-->
                            <!--<label class="duration-option">-->
                            <!--    <input type="radio" name="plan_duration" value="half_yearly">-->
                            <!--    <span>Half Yearly</span>-->
                            <!--</label>-->
                            <!--<label class="duration-option">-->
                            <!--    <input type="radio" name="plan_duration" value="yearly">-->
                            <!--    <span>Yearly</span>-->
                            <!--</label>-->
                        </div>

                        
                        <div class="als_tabss">
                            <div class="tab-slider--container">
                                <div id="tab1" class="tab-slider--body">
                                    @foreach($cdb_plans as $c_plan)
                                    @php
                                    $payment_fees = $c_plan->monthly_price * 100;
                                    $active_permissions = DB::table('cdb_plan_features')
                                    ->where([
                                    'plan_id'=> $c_plan->id,
                                    'agent_id'=> app('currentAgent')->id
                                    ])
                                    ->pluck('permission')
                                    ->toArray();
                                    $activeCDBModules = collect($active_permissions)
                                    ->map(fn($p) => explode('/', $p)[0])
                                    ->unique()
                                    ->toArray();
                                    $sortedFeatures = $c_feature->sortByDesc(function ($feature) use ($activeCDBModules) {
                                    return in_array(strtolower($feature->path), $activeCDBModules);
                                    });
                                    @endphp
                                    <style>
                                    .ribbon {
                                        background: #1c5299;
                                    }
                                    </style>
                                    <div class="col-lg-4">
                                        <div class="plan-card">
                                            <div class="ribbon-wrap">
                                                <div class="ribbon">Become a Customer</div>
                                            </div>
                                            <h4>{{ $c_plan->title }}</h4>
                                            <h5 class="bill-text">Billed Monthly</h5>
                                            <p class="redss">
                                                (Save Rs.{{ $c_plan->monthly_price*12 - $c_plan->yearly_price }}/ Year)
                                            </p>
                                            <div class="plan-price" data-discount="{{ $c_plan->discount }}" data-monthly="{{ $c_plan->monthly_price }}"
                                                data-quarterly="{{ $c_plan->monthly_price*3 }}"
                                                data-half_yearly="{{ $c_plan->monthly_price*6 }}"
                                                data-yearly="{{ $c_plan->monthly_price*12 }}">
                                                ₹{{ $c_plan->monthly_price }}
                                                <span class="prc_per_month">/month</span>
                                            </div>
                                            
                                            <hr>
                                            
											
											
											<div class="sidebar_menu_sub_mnu">
												<div class="menu-item">
													<div class="menu-head">
														<div class="menu-left">
														    <i class="fa fa-check text-success"></i>
															<svg class="icon" viewBox="0 0 24 24">
																<path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5z" />
															</svg>
															<span>Admin & Role Management</span>
														</div>
														<span class="arrow">❯</span>
													</div>

													<div class="submenu">
														<span class="lnk">User Management</span>
														<span class="lnk">Role Management</span>
														<span class="lnk">Permissions</span>
													</div>
												</div>

												<div class="menu-item">
													<div class="menu-head">
														<div class="menu-left">
														    <i class="fa fa-check text-success"></i>
															<svg class="icon" viewBox="0 0 24 24">
																<path d="M5 3h14v18H5z" />
															</svg>
															<span>CMS</span>
														</div>
														<span class="arrow">❯</span>
													</div>

													<div class="submenu">
														<span class="lnk">Pages</span>
														<span class="lnk">Blogs</span>
														<span class="lnk">Banners</span>
													</div>
												</div>

												<div class="menu-item active">
													<div class="menu-head">
														<div class="menu-left">
														    <i class="fa fa-times text-danger"></i>
															<svg class="icon" viewBox="0 0 24 24">
																<path d="M4 4h16v4H4zm0 6h16v4H4zm0 6h16v4H4z" />
															</svg>
															<span>My Studio</span>
														</div>
														<span class="arrow">❯</span>
													</div>

													<div class="submenu" style="display: block">
														<span class="lnk">Mail Management</span>
														<span class="lnk">Gifts Management</span>
														<span class="lnk">Property Market</span>
														<span class="lnk">Trigger & Notification</span>
													</div>
												</div>

												<div class="menu-item">
													<div class="menu-head">
														<div class="menu-left">
														    <i class="fa fa-times text-danger"></i>
															<svg class="icon" viewBox="0 0 24 24">
																<path d="M4 4h16v4H4zm0 6h16v4H4zm0 6h16v4H4z" />
															</svg>
															<span> Tickets Management</span>
														</div>
														<span class="arrow">❯</span>
													</div>

													<div class="submenu">
														<span class="lnk">Support Tickets</span>
														<span class="lnk">Ticket Reports</span>
													</div>
												</div>
											</div>
											
											
                                            <form action="{{ route('upgrade-cdb-plan') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                                                <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                                                <input type="hidden" id="order_id" value="">
                                                <input type="hidden" name="plan_id" value="{{ $c_plan->id }}">
                                                <input type="hidden" name="plan_type" class="plan-type" value="2">
                                                <input type="hidden" name="amount" class="razorpay-amount" value="{{ $payment_fees }}">
                                            
                                                <div class="str_bnt_area">
                                                     <a href="javascript:void(0)" @if($active_user_plan && $c_plan->monthly_price <= optional($active_user_plan)->monthly_price &&  \Carbon\Carbon::parse($user->valid_upto)->isFuture()) onclick="downgradePlan('{{ $c_plan->title }}')" @else onclick="paynow(this)" @endif>
                                                        @if($have_cdb_plan == 1) Upgrade @else Sign Up @endif For {{ $c_plan->title }}
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tittalsss">All premium plans above include a <strong>free 7 day trial.</strong></div>


                    <div class="botm_titalss">
                        <h3>1CR APP Gives You Everything You Need To Find, Analyze & make best Decision for purchasing & operating any sort of properties Online…</h3>
                        <p class="redss">Plus Funnels To Get Customers To Find You!</p>
                    </div>
                </div>
            </div>

            <!---- Get Started. It's Free ---->
            <section class="get_nd_blogss mt-0">
                <div class="container">
                    <div class="get_strs">
                        <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
                        <p>No Credit Card required. Free Forever. no trial Period.</p>
                        <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
                    </div>
                </div>
            </section>
            <!---- End Get Started. It's Free ---->
        </div>
    </div>

    <!---- Help ---->
    <section class="al_sec_araea mt_50p pb-0">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 col-sm-12">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="alss_pagess" id="alss_pgesss">
                                <h3>Need Help?</h3>

                                <p>Explore our resources to quickly get started with Flowlu business management software</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="hpls_box">
                                <div class="ovr_centetent">
                                    <p>Book online demo</p>

                                    <a href="javascript:void(0);">Get a demo</a>
                                </div>

                                <img src="{{ url('home/img/hlp_1.png')}}" alt="" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="hpls_box">
                                <div class="ovr_centetent">
                                    <p>Find the answers</p>

                                    <a href="javascript:void(0);">Knowledge base</a>
                                </div>

                                <img src="{{ url('home/img/hlp_2.png')}}" alt="" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="hpls_box">
                                <div class="ovr_centetent">
                                    <p>Ask questions</p>

                                    <a href="javascript:void(0);">Support chat</a>
                                </div>

                                <img src="{{ url('home/img/hlp_3.png')}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---- Help ---->


    <!---- See how 1CR APP works for your business. ---->
    <section class="get_nd_blogss see_how_acr">
        <div class="container">
            <div class="get_strs">
                <h2>See how 1CR APP works for your business.</h2>
                <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
                <p>No Credit Card required. Free Forever. no trial Period.</p>
                <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
            </div>
        </div>
    </section>
    <!---- End See how 1CR APP works for your business. ---->
<!-- Downgrade Restriction Modal -->

<div class="modal fade" id="downgradeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content p-4" style="border:2px solid #1c5299; border-radius:12px; position:relative;">

  <div class="modal-body text-center">

    <!-- Warning Icon -->
    <div class="mb-3">
        <i class="fa fa-exclamation-circle text-danger" style="font-size:40px;"></i>
    </div>

    <!-- Title -->
    <h5 class="mb-2 font-weight-bold">
        Plan Downgrade Not Allowed
    </h5>

    <!-- Message -->
    <p class="text-muted mb-4">
        You cannot downgrade your current plan <span id="plan_title_msg"></span> at this time.
        Your current subscription includes features that are not available
        in the selected lower plan.
    </p>

    <!-- Buttons -->
    <div>
        <button class="btn btn-secondary px-4 mr-2 close-modal str_bnt_area" data-dismiss="modal">
            Close
        </button>
    </div>

  </div>

</div>
  </div>
</div>

</div>

@include('web.common.footer')


<style>
.sidebar_menu_sub_mnu{
    width:100%;
    background:#fff;
	margin-bottom: 30px;
}

.sidebar_menu_sub_mnu .menu-head{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0px;
    cursor: pointer;
    color: #1d1d1d;
    border-bottom: #eeeeee solid 1px;
}

.sidebar_menu_sub_mnu .menu-left{
    display: flex;
    align-items: center;
    gap: 8px;
}
.sidebar_menu_sub_mnu .menu-left i.fa {
    position: relative;
    top: -1px;
}

.sidebar_menu_sub_mnu .icon{
    width: 16px;
    height: 16px;
    fill: #000000;
    position: relative;
    top: -1px;
}
.sidebar_menu_sub_mnu .menu-left span {
    font-weight: 700;
}

.sidebar_menu_sub_mnu .arrow{
    font-size:14px;
    transition:.3s;
}

.sidebar_menu_sub_mnu .menu-item.active .arrow{
    transform:rotate(90deg);
}

.sidebar_menu_sub_mnu .submenu{
    display:none;
    background:#f4f4f4;
}

.sidebar_menu_sub_mnu .submenu span.lnk{
    display: block;
    color: #373737;
    text-decoration: none;
    padding: 8px 15px;
    border-top: 1px solid rgba(255, 255, 255, .08);
    text-align: left;
    font-size: 14px;
    font-weight: 600;
}



.sidebar_menu_sub_mnu .menu-item.active .menu-head{
    border-bottom:2px solid #e7e7e7;
}
</style>

<script>
 $(document).ready(function(){

    $(".menu-head").click(function(){

        var parent = $(this).parent();

        $(".menu-item")
            .not(parent)
            .removeClass("active")
            .find(".submenu")
            .slideUp();

        parent.toggleClass("active");

        parent.find(".submenu")
              .stop()
              .slideToggle();

    });

});
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
            amount:amount
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
                "name": "{{ Auth()->user()->first_name }}",
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
function downgradePlan(title){
    $('#plan_title_msg').text(`( `+title+` )`);
    $('#downgradeModal').modal('show');
}
</script>
<script>
    let plans_type = @json($plan_type);
    let plansTypeMap = Object.fromEntries(plans_type.map(p => [p.id, p]));
    
    document.querySelectorAll('input[name="plan_duration"]').forEach(radio => {
    
        radio.addEventListener('change', function () {
    
            let duration_id = this.value;
            var myPlan = plansTypeMap[duration_id];
    
            document.querySelectorAll('.plan-card').forEach(card => {
    
                let priceEl = card.querySelector('.plan-price');
                let billtext = card.querySelector('.bill-text');
                let saveText = card.querySelector('.redss');
    
                var basePrice = parseFloat(priceEl.dataset['monthly']);
                basePrice = basePrice * myPlan.total_months;
    
                let discountPercent = parseFloat(myPlan.discount || 0);
    
                let saveAmount = (basePrice * discountPercent / 100);
                let finalPrice = basePrice - saveAmount;
    
                if(saveAmount > 0){
                    saveText.innerHTML = "(Save Rs." + Math.round(saveAmount) + " / "+myPlan.title+")";
                }else{
                    saveText.innerHTML = "";
                }
    
                finalPrice = Math.round(finalPrice);
    
                billtext.innerHTML = "Billed " + myPlan.title;
    
                priceEl.innerHTML =
                    "₹" + finalPrice +
                    " <span class='prc_per_month'>/" + myPlan.title + "</span>";
    
                let form = card.querySelector('form');
    
                // update hidden fields
                form.querySelector('.plan-type').value = myPlan.id;
                form.querySelector('.razorpay-amount').value = finalPrice * 100;
    
                // update razorpay script attributes
                // let razorpayScript = form.querySelector("script");
    
                // razorpayScript.setAttribute("data-amount", finalPrice * 100);
                // razorpayScript.setAttribute("data-notes.plan_type", myPlan.id);
    
            });
    
        });
    
    });
    /* ✅ Trigger first radio automatically */
    document.addEventListener("DOMContentLoaded", function () {
        let firstRadio = document.querySelector('input[name="plan_duration"]:checked');
        if(firstRadio){
            firstRadio.dispatchEvent(new Event('change'));
        }
    });
    $('.close-modal').on('click', function() {
        $(this).closest('.modal').modal('hide');
    });
</script>