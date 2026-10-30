<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ngo/images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/vendors/css/extensions/shepherd-theme-default.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/plugins/tour/tour.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/pages/app-chat.css') }}">
    <!-- END: Page CSS-->
</head>


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application 2-columns  navbar-floating footer-static  menu-expanded pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

	<!-- BEGIN: Header-->
	<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light">
		<div class="navbar-wrapper">
			<div class="navbar-container content">
				<div class="navbar-collapse" id="navbar-mobile">
					<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
						<ul class="nav navbar-nav">
							<li class="nav-item mobile-menu d-xl-none mr-auto">
								<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ficon feather icon-menu"></i></a>
							</li>
						</ul>
					</div>
					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-notification nav-item">
							<a class="nav-link nav-link-label" href="javascript:void(0);" data-toggle="dropdown">
							<i class="ficon feather icon-bell"></i>
							<span class="badge badge-pill badge-primary badge-up">2</span></a>
							<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
								<li class="dropdown-menu-header">
									<div class="dropdown-header m-0 p-1">
										<h3 class="white">Notifications</h3>
									</div>
								</li>
								<li class="scrollable-container media-list">
									<a class="d-flex justify-content-between" href="javascript:void(0)">
										<div class="media d-flex align-items-start">
											<div class="media-left"><i class="feather icon-user font-medium-5 primary"></i></div>
											<div class="media-body">
												<h6 class="blank media-heading">You have new order!</h6>
												<small class="notification-text"> Are your going to meet me tonight?</small>
											</div>
											<small> <time class="media-meta">9 hours ago</time></small>
										</div>
									</a> 
									<a class="d-flex justify-content-between" href="javascript:void(0)">
										<div class="media d-flex align-items-start">
											<div class="media-left"><i class="feather icon-user font-medium-5 primary"></i></div>
											<div class="media-body">
												<h6 class="blank media-heading">You have new order!</h6>
												<small class="notification-text"> Are your going to meet me tonight?</small>
											</div>
											<small> <time class="media-meta">9 hours ago</time></small>
										</div>
									</a>                                
								</li>
								<li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a></li>
							</ul>
						</li>
						
						<li class="dropdown dropdown-user nav-item">
							<a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
								<div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">Jackson</span></div>
								<span><img class="round" src="{{ asset('ngo/images/user_sm_pk.jpg') }}" alt="avatar" height="40" width="40" /></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="javascript:void(0);"><i class="feather icon-user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0);"><img src="images/key.svg" alt="" /> Change Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0);"><i class="feather icon-power"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
				 <a class="navbar-brand" href="{{ route('ngo.dashboard') }}">
                  <div class="brand-logo">
				   <img src="{{ asset('ngo/images/d_logo.png') }}" alt="" />
				  </div>
                 </a>
				</li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/dash_icon.png') }}" alt="" />
				  <span class="menu-title">Apply For Membership</span>
				 </a>
                </li>  
							
				<li class="nav-item">
				  <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/customer_icon.png') }}" alt="" />
				  <span class="menu-title">Membership Status</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/vendor_icon.pn') }}g" alt="" />
				  <span class="menu-title">Membership Certificate</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/driver_icon.png') }}" alt="" />
				  <span class="menu-title">Generate ID Card</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/booking_icon.png') }}" alt="" />
				  <span class="menu-title">Share ID Card</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/notification_icon.png') }}" alt="" />
				  <span class="menu-title">Appointment Letter</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/report_icon.png') }}" alt="" />
				  <span class="menu-title">Our Certificate</span>
				 </a>
                </li>


				

				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/review-comment-icons.png') }}" alt="" />
				  <span class="menu-title">Donate Now</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/setting_icon.png') }}') }}" alt="" />
				  <span class="menu-title">Share Donation Link</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/profile_icon.png') }}" alt="" />
				  <span class="menu-title">Membership Referral</span>
				 </a>
                </li>


                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/profile_icon.png') }}" alt="" />
				  <span class="menu-title">Referral Link</span>
				 </a>
                </li>


                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/profile_icon.png') }}" alt="" />
				  <span class="menu-title">Receipt</span>
				 </a>
                </li>

                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/profile_icon.png') }}" alt="" />
				  <span class="menu-title">Update Profile</span>
				 </a>
                </li>

                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <img src="{{ asset('ngo/images/profile_icon.png') }}" alt="" />
				  <span class="menu-title">My Profile</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="login.html">
				  <img src="{{ asset('ngo/images/logout_icon.png') }}" alt="" />
				  <span class="menu-title">Logout</span>
				 </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="dh_congratulations">
						<div class="header">

							<div class="check-icon">
								<!-- SVG CHECK ICON -->
								<svg width="32" height="32" viewBox="0 0 24 24" fill="none">
									<path d="M5 12.5L10 17L19 7"
										  stroke="#0d8a77"
										  stroke-width="3"
										  stroke-linecap="round"
										  stroke-linejoin="round"/>
								</svg>
							</div>

							<h1>Congratulations!</h1>
						</div>

						<div class="content">

							<div class="message">
								Your membership application has been successfully submitted.<br>
								Please wait for the administrator to verify your application.
							</div>

							<div class="reg-box">
								<div class="reg-title">YOUR REGISTRATION NUMBER</div>
								<div class="reg-number">18</div>
							</div>

							<div class="info-panel">

								<div class="info-item">
									<i class="fa fa-exclamation-circle"></i>
									<span>What happens next?</span>
								</div>

								<div class="info-item">
									<i class="fa fa-clock-o"></i>
									<span>Verification typically takes 1-2 business days</span>
								</div>

								<div class="info-item">
									<i class="fa fa-envelope"></i>
									<span>You will receive an email notification once verified</span>
								</div>

								<div class="info-item">
									<i class="fa fa-user"></i>
									<span>You can then access all member benefits</span>
								</div>

							</div>

							<div class="footer">

								<button class="btn">
									Account Status
									<span class="status-badge">inactive</span>
								</button>

								<button class="btn">
									Pay Membership Fee
								</button>

							</div>

						</div>

					</div>
				</section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('ngo/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('ngo/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('ngo/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('ngo/vendors/js/extensions/shepherd.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('ngo/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('ngo/js/core/app.js') }}"></script>
    <script src="{{ asset('ngo/js/scripts/components.js') }}"></script>
	
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('ngo/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <!-- END: Page JS-->
	<!-- BEGIN: Page JS-->
    <script src="{{ asset('ngo/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
	
	    <!-- BEGIN: Page JS-->
    <script src="{{ asset('ngo/js/scripts/charts/chart-apex.js') }}"></script>
    <!-- END: Page JS-->
	
	<script src="{{ asset('ngo/js/Chart.min.js') }}"></script>
	<script src="{{ asset('ngo/js/membersh.js') }}"></script>
	
	<script src="https://code.highcharts.com/highcharts.src.js"></script>
	
	<script>
	  var chart = new Highcharts.Chart({
		  chart: {
			renderTo: 'container_line',
			marginBottom: 80,
			borderColor: 'red'
		  },
		  xAxis: {
			categories: ['12 May', '13 May', '14 May', '15 May', '16 May', '17 May'],
			labels: {
			  rotation: 0,
			  borderColor: 'red'
			}
		  },

		  series: [{
			data: [0, 10, 20, 30, 40, 50],
borderColor: 'red'			
		  }]
		});
	</script>


</body>
<!-- END: Body-->

</html>