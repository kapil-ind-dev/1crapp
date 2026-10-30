@php
$firstSegment = request()->segment(1);
use App\Models\User;
use App\Models\CdbPlanModel;
use App\Models\BusinessCardModel;
use Illuminate\Support\Facades\DB;
$user_data = User::select('users.profile_image as user_profile','users.*','user_details.*','user_company_details.*','user_social_networks.*')
        ->leftjoin('user_details','user_details.user_id','=','users.id')
        ->leftjoin('user_company_details','user_company_details.user_id','=','users.id')
        ->leftjoin('user_social_networks','user_social_networks.user_id','=','users.id')
        ->where('users.id', Auth::id())->first();
$package = CdbPlanModel::where('id', $user_data->package_id)->first();
$b_card = BusinessCardModel::where('user_id', Auth::id())->first();
$d_video = DB::table('adb_dashboard')->where('created_by', app('currentAgent')->id)->first();

$communities = DB::table('tbl_joincommunity')->where('created_by', app('currentAgent')->id)->orderBy('priority', 'asc')->limit(8)->get();
@endphp
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .custom-dropdown {
        position: relative;
    }
    
    .custom-dropdown-menu {
        display: none;
        position: relative; /* important for sidebar */
        background: #f8f9fa;
        padding-left: 20px;
    }
    
    .custom-dropdown-menu li a {
        display: block;
        padding: 8px 10px;
        font-size: 14px;
    }
    
    /* Show dropdown */
    .custom-dropdown.active .custom-dropdown-menu {
        display: block;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown {
        position: relative;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active a.dropdown-toggle {
        position: relative;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active a.dropdown-toggle:focus {
        color: #fff;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown a.dropdown-toggle:after {
        position: absolute;
        right: 0px;
        top: 9px;
        border-top: 0.5em solid;
        border-right: 0.5em solid transparent;
        border-bottom: 0;
        border-left: 0.5em solid transparent;
    }
     
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu {
        position: absolute;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 2px;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu li {
        padding: 0;
        margin: 0;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu li a {
        padding: 10px 10px;
        color: #0e3991;
        font-size: 13px;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu li a:hover {
        background: #fff;
        background: #0e3992;
    }
	
.mbl-top-header{display:none !important;}
.profll_area.side-menu .side-menu-header{display:none;}	
	
@media (min-width: 320px) and (max-width: 767px) {
	.dash_board_pages {padding-top: 20px;}
    .mb_v_hide{display:none !important;}	
	.profll_area.notification-dropdown {display: none;}
	.profll_area.notification-dropdown.active {display:block; position:absolute; z-index:9;	bottom:-172px;	width:92%;	margin:0;}
	
    .menu-overlay {display: none; position: fixed; inset: 0;  background: rgba(0, 0, 0, 0.4); z-index: 998;}
    .menu-overlay.active {display: block;}
    .profll_area.side-menu {position:fixed; top:0; left:0; width:300px; height:100vh; background:#1c5299; z-index:999; transform:translateX(-100%);
      transition: transform 0.35s ease; box-shadow: 5px 0 25px rgba(0, 0, 0, 0.15); padding:30px 15px 0; border-radius:0;}

    .profll_area.side-menu.active {transform: translateX(0);}
    .profll_area.side-menu .side-menu-header {height:auto; padding:0; display:flex; align-items:center; justify-content:space-between; border-bottom:none; position:relative;}
    .profll_area.side-menu .close-menu {border:0; background:transparent; cursor:pointer; font-size:30px; color:#ffffff; line-height:1; position:absolute; right:0;
      font-weight:600; top:-25px;}
	  
	  
	  
			
	.mbl-top-header {
		height: auto;
		background:#f9f9f9;
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 5px;
		box-shadow:none;
		position: relative;
		z-index: 1;
		display:block !important;
		margin-bottom:15px;
		border-radius: 5px;
		border: #0f3a95 solid 1px;
	}

	/* LEFT */
	.mbl-top-header .header-left {
		display: flex;
		align-items: center;
		gap: 5px;
	}

	/* LOGO */
	.mbl-top-header .logo-circle {
		width: 52px;
		height: 52px;
		border: 3px solid #d71920;
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		overflow: hidden;
		background: #fff;
	}

	.mbl-top-header .logo-circle svg {
		width: 39px;
		height: 39px;
	}

	/* USER AREA */
	.mbl-top-header .user-info {
	    cursor: pointer;
		padding:0px;
		border-radius: 3px;
		width: 80%;	
	}

	.mbl-top-header .user-title {
		display: flex;
		align-items: center;
		gap: 5px;
		font-size: 14px;
		font-weight: 700;
		color: #000;
		white-space: nowrap;
		width:100%;
		justify-content:center;
	}

	.mbl-top-header .user-title .hand {
		font-size: 13px;
	}
	.mbl-top-header .user-title .hand i {
    font-size: 15px;
}

	.mbl-top-header .welcome-text {
		color: #9299a5;
		font-size: 12px;
		text-align: center;
		margin-top: 0px;
	}

	/* USER DATA */
	.mbl-top-header .user-data {
		display: none;
		position: absolute;
        top: 58px;
        left: 0;
        right: 0;
        width: 280px;
        border-radius: 10px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        padding: 15px;
        border: 1px solid #eee;
        background: #1c5299;
        margin: 0 auto;
	}
	.mbl-top-header .user-data.active .user_proff {
    margin: 0;
}

	.mbl-top-header .user-data.active {
		display: block;
	}

	.mbl-top-header .user-data h4 {
		font-size: 15px;
		color: #27364d;
		margin-bottom: 10px;
	}

	.mbl-top-header .user-data p {
		font-size: 13px;
		color: #777;
		margin: 7px 0;
	}

	/* =========================
	   RIGHT HEADER
	========================= */

	.mbl-top-header .header-right {
		display: flex;
		align-items: center;
		gap: 18px;
	}

	/* BELL */
	.mbl-top-header .notification-box {
		position: relative;
	}

	.mbl-top-header .bell-btn {
		width: 34px;
		height: 34px;
		border: 0;
		background: transparent;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
	}



	.mbl-top-header .bell-btn svg {
		width: 18px;
		height: 18px;
		stroke: #46556d;
	}

	/* NOTIFICATION COUNT */
	.mbl-top-header .notification-count {
		position: absolute;
		top: 0;
		right: 0;
		width: 17px;
		height: 17px;
		background: #d71920;
		color: #fff;
		font-size: 10px;
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	/* NOTIFICATION DROPDOWN */
	.mbl-top-header .notification-dropdown {
		display: none;
			position: absolute;
			right: initial;
			left: -6px;
			top: 50px;
			width: 100%;
			background: #0e3992;
			border-radius: 0;
			box-shadow: none;
			border: 1px solid #eee;
			overflow: hidden;
			max-width: 280px;
			padding: 6px;
			color: #fff;
	}

	.mbl-top-header .notification-dropdown.active {
		display: block;
	}

	.mbl-top-header .notification-head {
		padding: 14px 16px;
		border-bottom: 1px solid #eee;
		display: flex;
		justify-content: space-between;
	}

	.mbl-top-header .notification-head strong {
		font-size: 15px;
		color: #27364d;
	}

	.mbl-top-header .notification-head span {
		color: #d71920;
		font-size: 12px;
	}

	.mbl-top-header .notification-item {
		padding: 13px 16px;
		border-bottom: 1px solid #f0f0f0;
	}



	/* =========================
	   BURGER
	========================= */

	.mbl-top-header .burger-btn {
		width: 42px;
		height: 42px;
		border: 0;
		background: transparent;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.mbl-top-header .burger-btn svg {
		width: 32px;
		height: 32px;
		stroke: #4a5568;
		stroke-width: 2;
	}
  
}
	
</style>


<div class="mbl-top-header">			
					<div class="header-left">
						<div class="notification-box">
							<button class="bell-btn">
								<svg viewBox="0 0 24 24" fill="none">
									<path
										d="M18 8a6 6 0 0 0-12 0
											 c0 7-3 7-3 9h18c0-2-3-2-3-9Z"
										stroke="currentColor"
										stroke-width="1.8"
										stroke-linejoin="round"
									/>

									<path d="M10 21h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
								</svg>

								<span class="notification-count">3</span>
							</button>
						</div>

						<!-- USER -->
						<div class="user-info">
							<div class="user-title">
								Good Evening, Ramjee Meena 
								<span class="hand">👋 <i class="fa fa-angle-down"></i></span>
							</div>

							<div class="welcome-text">Welcome back</div>

							<!-- USER DATA -->
								<div class="user-data profll_area">
									<div class="user_proff">
										@if(!is_null($user_data->user_profile))
											<div class="mg_ares"><img src="{{ url('').'/'.$user_data->user_profile }}" alt="" /></div>
										@else
											<div class="mg_ares"><img src="{{ url('uploads/profile/profile-default.jpeg') }}" alt="" /></div>
										@endif
										<h3>{{ $user_data->name }}</h3>
										<span class="text-light">{{ $package->title??'Free' }}</span><br>
										<span class="text-light">Valid Upto: {{ date('d M, Y', strtotime($user_data->valid_upto)) }}</span><br>
										<span class="text-light">My Referral Code: <br><a href="#share_section">{{ $user_data->memberid }}</a></span><br>
										<span class="text-light">Balance: ₹{{ $user_data->walletBalance }}</span>
									</div>
								</div>
						</div>
						
						<!-- BURGER -->
						<button class="burger-btn">
							<svg viewBox="0 0 32 32" fill="none">
								<path d="M5 8h22" stroke="currentColor" stroke-linecap="round" />

								<path d="M5 16h22" stroke="currentColor" stroke-linecap="round" />

								<path d="M5 24h22" stroke="currentColor" stroke-linecap="round" />
							</svg>
						</button>
					</div>
				</div>

<div class="menu-overlay"></div>
<div class="profll_area side-menu">
    <div class="side-menu-header">
        <button class="close-menu">
            &times;
        </button>
    </div>
    <div class="user_proff mb_v_hide">
        @if(!is_null($user_data->user_profile))
            <div class="mg_ares"><img src="{{ url('').'/'.$user_data->user_profile }}" alt="" /></div>
        @else
            <div class="mg_ares"><img src="{{ url('uploads/profile/profile-default.jpeg') }}" alt="" /></div>
        @endif
        <h3>{{ $user_data->name }}</h3>
        <span class="text-light">{{ $package->title??'Free' }}</span><br>
        <span class="text-light">Valid Upto: {{ date('d M, Y', strtotime($user_data->valid_upto)) }}</span><br>
        <span class="text-light">My Referral Code: <br><a href="#share_section">{{ $user_data->memberid }}</a></span><br>
        <span class="text-light">Balance: ₹{{ $user_data->walletBalance }}</span>
    </div>
    <div class="user_liststst">
        <ul>
            <li class="d-flex"> 
                <a href="{{ route('customer.business-card') }}" class="@if($firstSegment === 'business-card') actet @endif"><img src="{{ url('home/img/edit_ic.jpg')}}" alt="" />Business Card </a>
                @if(!is_null($b_card) && $b_card->link_slug)
                    <i class="fa fa-copy copy-icon ml-4 mt-1" data-url="{{ url('/').'/mydigitalcard/'.$b_card->link_slug }}" aria-hidden="true"></i>&ensp; 
                    <a href="{{ url('/').'/mydigitalcard/'.$b_card->link_slug }}" target="_blank" class="text-right mt-1">
                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                @endif
            </li>
            <li class="d-flex">
                <a href="{{ route('my-profile') }}" class="@if($firstSegment === 'my-profile') actet @endif"><img src="{{ url('home/img/my-profile.png')}}" alt="" /> My profile </a>
                @if(!is_null($d_video))
                @if($d_video->demo_link_enable == 1)
                        &ensp; &ensp; &ensp; <a href="javascript:void(0);" data-toggle="modal" data-target=".bd-example-modal-lg"><img src="{{ url('home/img/vvdio_ic.png')}}" alt="" /></a>
                    @endif
                @endif
            </li>
            <!--<li>-->
            <!--    <a href="{{ route('wallet') }}" class="@if($firstSegment === 'wallet') actet @endif"><img src="{{ url('home/img/my-profile.png')}}" alt="" /> Wallet</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="{{ route('billing') }}" class="@if($firstSegment === 'billing') actet @endif"><img src="{{ url('home/img/billing.png')}}" alt="" /> Billing </a>-->
            <!--</li>-->
            <li class="dropdown custom-dropdown">
                <a href="javascript:void(0);" 
                   class="dropdown-toggle @if(in_array($firstSegment, ['wallet','billing'])) actet @endif">
                   
                   <img src="{{ url('home/img/my-profile.png')}}" alt="" /> My Account
                </a>
            
                <ul class="dropdown-menu custom-dropdown-menu">
                    <li>
                        <a class="@if($firstSegment === 'wallet') actet @endif" 
                           href="{{ route('wallet') }}">
                           Wallet
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'billing') actet @endif" 
                           href="{{ route('billing') }}">
                           Billing
                        </a>
                    </li>
                    <li>
                        <a class="" 
                           href="#">
                           Rewards, Coupons & Credit
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);"><img src="{{ url('home/img/help.png')}}" alt="" /> Help/support tickets</a>
            </li>
            <li>
                <a href="{{ route('earn-with-us') }}"  class="@if($firstSegment === 'earn-with-us') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Earn With Us</a>
            </li>

           

            <li>
                <a href="{{ route('notifications') }}" class="@if($firstSegment === 'notifications') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Updates</a>
            </li>

            <!-- <li>
                <a href="{{ route('lead-magnet-form') }}" class="@if($firstSegment === 'lead-magnet') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Get Lead Magnet ( New)</a>
            </li> -->
            @if(auth()->user()->agent_id == 8)
             <li class="dropdown custom-dropdown">
                <a href="javascript:void(0);" 
                   class="dropdown-toggle @if(in_array($firstSegment, ['lead-magnet','mail-template-form', 'popup-form', 'lead-magnet-list'])) actet @endif">
                   
                   <img src="{{ url('home/img/earn.png')}}" alt="" /> Lead Magnet Management
                </a>
            
                <ul class="dropdown-menu custom-dropdown-menu">
                    <li>
                        <a class="@if($firstSegment === 'lead-magnet') actet @endif" 
                           href="{{ route('lead-magnet') }}">
                           Get Lead Magnet ( New )
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'mail-template-form') actet @endif" 
                           href="{{ route('mail-template-form') }}">
                           Create Mail Template
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'popup-form') actet @endif" 
                           href="{{ route('popup-form') }}">
                           Create Popup Form
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'lead-magnet-list') actet @endif" 
                           href="{{ route('lead-magnet-list') }}">
                           Enquiry List
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'lead-magnet-settings') actet @endif" 
                           href="{{ route('lead-magnet-settings') }}">
                           Settings
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li>
                <a href="javascript:void(0);"><img src="{{ url('home/img/earn.png')}}" alt="" /> Coming Soon</a>
            </li>
            <li>
                <a href="{{ route('setting') }}" class="@if($firstSegment === 'setting') actet @endif"><i class="fa fa-gear" style="font-size: 22px;"></i> Setting</a>
            </li>
        </ul>
    </div>
</div>
<div class="profll_area mt-4 notification-dropdown">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Carousel Items -->
        <div class="carousel-inner text-light">
            <!-- Item 1 -->
            @foreach($communities as $key=>$community)
            <div class="carousel-item @if($key ==0) active @endif">
                <div class="community-card text-center">
                    <div class="community-icon">
                        <i class="fa {{ $community->icon }}"></i>
                    </div><br>
                    <h6 style="font-weight:900;">{{ Str::limit($community->title, 25) }}</h6>
                    <small>
                        {{ Str::limit($community->content, 80) }}
                    </small><br>
                    <a href="{{ $community->btn_link }}" target="_blank" class="btn btn-sm btn-light">
                        {{ $community->btn_text }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>



<script>
$(document).ready(function () {

    /* =========================================
       BURGER - LEFT SIDE MENU
    ========================================= */

    $(".burger-btn").on("click", function (e) {

        e.stopPropagation();

        $(".side-menu").toggleClass("active");
        $(".menu-overlay").toggleClass("active");

        // Dropdown close
        $(".notification-dropdown").removeClass("active");
        $(".user-data").removeClass("active");

    });


    /* =========================================
       CLOSE SIDE MENU
    ========================================= */

    $(".close-menu, .menu-overlay").on("click", function () {

        $(".side-menu").removeClass("active");
        $(".menu-overlay").removeClass("active");

    });


    /* =========================================
       BELL CLICK
       Click = Show / Again Click = Hide
    ========================================= */

    $(".bell-btn").on("click", function (e) {

        e.stopPropagation();

        $(".notification-dropdown").toggleClass("active");

        // User dropdown close
        $(".user-data").removeClass("active");

    });


    /* =========================================
       RAMJEE MEENA CLICK
       Click = Show / Again Click = Hide
    ========================================= */

    $(".user-info").on("click", function (e) {

        e.stopPropagation();

        $(".user-data").toggleClass("active");

        // Notification close
        $(".notification-dropdown").removeClass("active");

    });


    /* =========================================
       IMPORTANT:
       OUTSIDE CLICK CODE REMOVED
    ========================================= */

});

</script>


<script>
document.querySelectorAll('.custom-dropdown > a').forEach(function(el){
    el.addEventListener('click', function(){
        this.parentElement.classList.toggle('active');
    });
});
</script>
<script>
    // Select all elements with the 'copy-icon' class
    document.querySelectorAll('.copy-icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            const urlToCopy = this.getAttribute('data-url'); // Get URL from the data attribute
            navigator.clipboard.writeText(urlToCopy).then(() => {
                this.classList.remove('fa-copy'); // Remove copy icon class
                this.classList.add('fa-check', 'text-success'); // Add checkmark icon class

                // Optional: Reset the icon after a few seconds
                setTimeout(() => {
                    this.classList.remove('fa-check', 'text-success'); // Remove checkmark icon class
                    this.classList.add('fa-copy'); // Add copy icon class back
                }, 10000);
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        });
    });
</script>