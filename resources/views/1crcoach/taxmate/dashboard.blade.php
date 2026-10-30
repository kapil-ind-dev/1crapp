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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('coach/images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/vendors/css/extensions/shepherd-theme-default.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/plugins/tour/tour.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('coach/css/pages/app-chat.css') }}">
    <!-- END: Page CSS-->
</head>


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application 2-columns  navbar-floating footer-static  menu-expanded pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<div id="myHeader">
	<div class="top-bar">
		<div class="top-links">
			<a href="javascript:void(0);" class="top-link">
				<!-- WhatsApp SVG -->
				<svg viewBox="0 0 24 24">
					<path d="M17.47 14.38c-.29-.15-1.7-.84-1.96-.94-.26-.1-.45-.15-.64.15-.19.29-.74.94-.91 1.13-.17.19-.33.22-.62.07-.29-.15-1.22-.45-2.32-1.43-.86-.77-1.44-1.72-1.61-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.33.44-.49.15-.17.19-.29.29-.48.1-.19.05-.36-.02-.51-.07-.15-.64-1.54-.88-2.11-.23-.55-.47-.48-.64-.49h-.55c-.19 0-.49.07-.75.36-.26.29-.98.96-.98 2.35s1 2.72 1.14 2.91c.14.19 1.97 3 4.78 4.21.67.29 1.19.46 1.59.59.67.21 1.28.18 1.76.11.54-.08 1.7-.69 1.94-1.35.24-.66.24-1.23.17-1.35-.07-.12-.26-.19-.55-.34z"/>
					<path d="M12.01 2C6.49 2 2 6.49 2 12c0 1.76.46 3.41 1.26 4.84L2 22l5.31-1.24A9.96 9.96 0 0 0 12.01 22C17.52 22 22 17.51 22 12S17.52 2 12.01 2zm0 18.31c-1.64 0-3.25-.44-4.65-1.27l-.33-.2-3.15.74.75-3.07-.21-.32A8.28 8.28 0 0 1 3.69 12c0-4.59 3.73-8.31 8.32-8.31s8.31 3.72 8.31 8.31-3.72 8.31-8.31 8.31z"/>
				</svg>
				+91-9966680133
			</a>
			<a href="javascript:void(0);" class="top-link">
				<!-- User SVG -->
				<svg viewBox="0 0 24 24">
					<path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
				</svg>
				About Us
			</a>
			<a href="javascript:void(0);" class="top-link">
				<!-- Info SVG -->
				<svg viewBox="0 0 24 24">
					<path d="M11 17h2v-6h-2v6zm1-15a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm0 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zM11 9h2V7h-2v2z"/>
				</svg>
				Instant Help ?
			</a>

		</div>
	</div>
	<header class="main-header">	
      <div class="container">	
		<div class="header-inner">
		    <!-- LOGO -->
			<a href="#" class="logo">
				<img src="https://admin.1crapp.com/profile/profile-18591384811785921571.png" alt="" />
			</a>		
		
			<div class="rt_areeea">
			 <nav class="nav-menu" id="navMenu">
				<div class="nav-item dropdown-item">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle">
						Home
						<svg class="arrow" viewBox="0 0 24 24">
							<path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/>
						</svg>
					</a>
					<div class="dropdown-menu"><a href="javascript:void(0);">Features</a></div>
				</div>
				<div class="nav-item"><a href="javascript:void(0);" class="nav-link"> Property Market </a></div>
				<div class="nav-item dropdown-item">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle">
						My Portfolio
						<svg class="arrow" viewBox="0 0 24 24">
							<path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/>
						</svg>
					</a>
					<div class="dropdown-menu">
						<a href="javascript:void(0);">My Properties</a>
						<a href="javascript:void(0);">Personal Money Path</a>
						<a href="javascript:void(0);">Budget-Management</a>
						<a href="javascript:void(0);">Net-Worth Tracking</a>
						<a href="javascript:void(0);">Financial Freedom Journey</a>
					</div>
				</div>
				<div class="nav-item">
					<a href="javascript:void(0);" class="nav-link">Price</a>
				</div>
				<div class="nav-item">
					<a href="javascript:void(0);" class="nav-link"> FAQ</a>
				</div>
			 </nav>
			 


			 <!-- BUTTONS -->
			 <div class="header-buttons">
				<a href="javascript:void(0);" class="login-btn">Login</a>
				<a hrefjavascript:void(0);" class="register-btn">Register Free</a>
			 </div>


			 <!-- MOBILE MENU -->
			 <button class="mobile-toggle" id="mobileToggle">
				<svg viewBox="0 0 24 24" fill="none">
					<path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
				</svg>
			 </button>
			</div>
		</div>
	  </div>
	</header>
</div>	

	<!-- BEGIN: Header-->
	<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light adm_desk_menuss">
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
				</div>
			</div>
		</div>
	</nav>
    <!-- END: Header-->

<div class="container dash_ar_cnter">
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-home"></i>
				  <span class="menu-title">Tax Wallet</span>
				 </a>
                </li>  
							
				<li class="nav-item">
				  <a href="javascript:void(0);">
				  <i class="fa fa-briefcase"></i>
				  <span class="menu-title">Salary Income</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-university"></i>
				  <span class="menu-title">House Property</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-line-chart"></i>
				  <span class="menu-title">Capital Gains</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-building"></i>
				  <span class="menu-title">Business / Professional Income</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-usd"></i>
				  <span class="menu-title">Other Sources</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-bullseye"></i>
				  <span class="menu-title">Deductions & Tax Planning</span>
				 </a>
                </li>

				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-bar-chart"></i>
				  <span class="menu-title">TDS/TCS & Advance Taxes</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-file-text"></i>
				  <span class="menu-title">Review, Documents & File Return</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-calculator"></i>
				  <span class="menu-title">Tax Summary & Computation</span>
				 </a>
                </li>

                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-clock-o"></i>
				  <span class="menu-title">Previous Years</span>
				 </a>
                </li>

                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-file"></i>
				  <span class="menu-title">Documents</span>
				 </a>
                </li>

                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-download"></i>
				  <span class="menu-title">Downloads</span>
				 </a>
                </li>

                <li class="nav-item">
				 <a href="javascript:void(0);">
				  <i class="fa fa-cog"></i>
				  <span class="menu-title">Settings & Profile</span>
				 </a>
                </li>				
				
				<li class="nav-item">
				 <a href="login.html">
				  <i class="fa fa-question-circle"></i>
				  <span class="menu-title">Help & Support</span>
				 </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper mt-1">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="dashes_ara_main">
					<div class="topbar">
						<div class="greeting">
							<h1>Good Evening, <span>Ramjee Meena</span> 👋</h1>
							<p>Welcome back to your Tax Wallet</p>
						</div>
						<div class="top-actions">
							<select class="fy" onchange="notify('Financial Year changed to '+this.value)">
								<option>FY 2026-27</option>
								<option>FY 2025-26</option>
								<option>FY 2024-25</option>
							</select>
							<button class="icon-btn" onclick="notify('You have 3 notifications')">
								<i class="fa fa-bell"></i><b class="bell-dot">3</b>
							</button>
							<div class="user">
								<div class="avatar">RM</div>
								Ramjee Meena <i class="fa fa-angle-down"></i>
							</div>
						</div>
					</div>

					<div class="grid-top">
						<div class="card progress-card">
							<div class="progress-title">
								<div><h2>Overall Progress</h2></div>
								<div class="percent">62%</div>
							</div>
							<div class="bar"><span></span></div>
							<div class="continue">
								<span>Continue where you left off</span>
								<button class="primary" onclick="notify('Opening next pending step...')">Continue Filing →</button>
							</div>
						</div>

						<div class="card profile-card">
							<div class="profile-head">
								<h3><i class="fa fa-user-circle"></i> Personal Profile</h3>
								<span class="complete">● Completed</span>
							</div>
							<div class="profile-row">
								<div class="metric"><label>Updated</label><strong>12 Jul 2026</strong></div>
								<div class="metric"><label>Profile Status</label><strong class="good">Complete</strong></div>
							</div>
							<div class="profile-date">Permanent taxpayer profile • View / Edit Profile →</div>
						</div>

						<div class="card quick">
							<h3>Quick Actions</h3>
							<div class="quick-grid">
								<div class="quick-item blue" onclick="notify('Upload Document')">
									<i class="fa fa-arrow-up"></i>Upload<br />Document
								</div>
								<div class="quick-item green" onclick="notify('Download Computation')">
									<i class="fa fa-download"></i>Download<br />Computation
								</div>
								<div class="quick-item purple" onclick="notify('Start Tax Summary')">
									<i class="fa fa-calculator"></i>Start Tax<br />Summary
								</div>
								<div class="quick-item orange" onclick="notify('Opening Previous Year')">
									<i class="fa fa-folder-open"></i>View Last<br />Year
								</div>
							</div>
						</div>
					</div>

					<div class="layout">
						<div>
							<div class="section card steps">
								<div class="section-title">
									<h2>Filing Progress (9 Steps)</h2>
									<a href="#" onclick="notify('Showing all filing steps');return false;">View Details →</a>
								</div>
								<div class="step-line">
									<div class="circle">1</div>
									<div class="arrow"></div>
									<div class="circle">2</div>
									<div class="arrow"></div>
									<div class="circle">3</div>
									<div class="arrow"></div>
									<div class="circle">4</div>
									<div class="arrow"></div>
									<div class="circle warn">5</div>
									<div class="arrow"></div>
									<div class="circle warn">6</div>
									<div class="arrow"></div>
									<div class="circle">7</div>
									<div class="arrow"></div>
									<div class="circle warn">8</div>
									<div class="arrow"></div>
									<div class="circle lock">9</div>
								</div>

								<div class="step-grid">
									<div class="step-card">
										<div class="step-no">1</div>
										<div class="step-icon"><i class="fa fa-briefcase"></i></div>
										<h3>Salary Income</h3>
										<div class="step-status done">● Completed</div>
										<div class="step-status">Updated on 14 Jul 2026</div>
									</div>

									<div class="step-card">
										<div class="step-no">2</div>
										<div class="step-icon"><i class="fa fa-home"></i></div>
										<h3>House Property</h3>
										<div class="step-status done">● Completed</div>
										<div class="step-status">Updated on 15 Jul 2026</div>
									</div>

									<div class="step-card yellow">
										<div class="step-no yellow">3</div>
										<div class="step-icon"><i class="fa fa-line-chart"></i></div>
										<h3>Capital Gains</h3>
										<div class="mini-progress"><span style="width: 45%"></span></div>
										<div class="mini-percent">45%</div>
										<div class="step-status">Updated on 16 Jul 2026</div>
									</div>

									<div class="step-card gray">
										<div class="step-no gray">4</div>
										<div class="step-icon"><i class="fa fa-building"></i></div>
										<h3>Business /<br />Professional Income</h3>
										<div class="step-status">◉ Not Started</div>
									</div>

									<div class="step-card">
										<div class="step-no">5</div>
										<div class="step-icon"><i class="fa fa-dollar"></i></div>
										<h3>Other Sources</h3>
										<div class="step-status done">● Completed</div>
										<div class="step-status">Updated on 16 Jul 2026</div>
									</div>

									<div class="step-card yellow">
										<div class="step-no yellow">6</div>
										<div class="step-icon"><i class="fa fa-bullseye"></i></div>
										<h3>Deductions &amp;<br />Tax Planning</h3>
										<div class="mini-progress"><span style="width: 30%"></span></div>
										<div class="mini-percent">30%</div>
									</div>

									<div class="step-card yellow">
										<div class="step-no yellow">7</div>
										<div class="step-icon"><i class="fa fa-bar-chart"></i></div>
										<h3>TDS/TCS &amp; Advance Taxes</h3>
										<div class="mini-progress"><span style="width: 60%"></span></div>
										<div class="mini-percent">60%</div>
										<div class="step-status">Updated on 16 Jul 2026</div>
									</div>

									<div class="step-card gray">
										<div class="step-no gray">8</div>
										<div class="step-icon"><i class="fa fa-calculator"></i></div>
										<h3>Review, Documents &amp;<br />ITR Mapping</h3>
										<div class="step-status">🔒 Locked</div>
									</div>

									<div class="step-card gray">
										<div class="step-no gray">9</div>
										<div class="step-icon"><i class="fa fa-file"></i></div>
										<h3>Tax Summary &amp;<br />Computation</h3>
										<div class="step-status">🔒 Locked</div>
									</div>
								</div>
							</div>

							<div class="section">
								<div class="section-title">
									<h2>Income &amp; Tax Summary <small style="font-size: 9px; color: #8a95a6">(Preview)</small></h2>
									<a href="#" onclick="notify('Opening detailed tax summary');return false;">View Details →</a>
								</div>
								<div class="summary">
									<div class="summary-card">
										<div class="sum-icon"><i class="fa fa-shopping-bag"></i></div>
										<div><label>Gross Total Income</label><strong>₹24.35 Lakh</strong></div>
									</div>
									<div class="summary-card sum-green">
										<div class="sum-icon"><i class="fa fa-tag"></i></div>
										<div><label>Total Deductions</label><strong>₹2.15 Lakh</strong></div>
									</div>
									<div class="summary-card sum-yellow">
										<div class="sum-icon"><i class="fa fa-calculator"></i></div>
										<div><label>Total Tax Payable</label><strong>₹42,520</strong></div>
									</div>
									<div class="summary-card sum-red">
										<div class="sum-icon"><i class="fa fa-rupee"></i></div>
										<div><label>Estimated Refund</label><strong class="good">₹18,450</strong></div>
									</div>
								</div>
							</div>

							<div class="section card documents">
								<div class="section-title">
									<h2 style="font-size: 13px">Documents Status</h2>
									<a href="#" onclick="notify('Opening document manager');return false;">Manage Documents →</a>
								</div>
								<div class="doc-grid">
									<div class="doc">
										<h4>Form 16</h4>
										<p class="uploaded">● Uploaded</p>
									</div>
									<div class="doc">
										<h4>AIS (Annual Info.)</h4>
										<p class="uploaded">● Uploaded</p>
									</div>
									<div class="doc">
										<h4>Form 16A</h4>
										<p class="pending">◷ Pending</p>
									</div>
									<div class="doc">
										<h4>Bank Statements</h4>
										<p class="uploaded">● Uploaded</p>
									</div>
									<div class="doc">
										<h4>Home Loan Docs</h4>
										<p class="pending">◷ Pending</p>
									</div>
									<div class="doc">
										<h4>Capital Gain Proof</h4>
										<p class="uploaded">● Uploaded</p>
									</div>
								</div>
							</div>
						</div>

						<div class="right-stack">
							<div class="card tax-health">
								<div class="health-row">
									<h3>Tax Health</h3>
									<span class="stars">★★★★<span style="color: #dfe3e8">★</span></span>
									<span class="health-good">Good</span>
								</div>
								<div class="health-grid">
									<div class="health-metric"><span>Return Type</span><strong>ITR-2</strong></div>
									<div class="health-metric"><span>Tax Regime</span><strong class="good">New Regime</strong></div>
									<div class="health-metric"><span>Estimated Refund</span><strong class="good">₹18,450</strong></div>
									<div class="health-metric"><span>Last Saved</span><strong>Today, 07:45 PM</strong></div>
								</div>
							</div>

							<div class="card activity">
								<div class="section-title">
									<h3>Recent Activity</h3>
									<a href="#" onclick="notify('Showing all activity');return false;">View All</a>
								</div>
								<div class="activity-item">
									<div class="activity-icon"><i class="fa fa-shopping-bag"></i></div>
									<div class="activity-text"><strong>Salary details updated</strong><span>Today, 07:45 PM</span></div>
								</div>
								<div class="activity-item">
									<div class="activity-icon"><i class="fa fa-download"></i></div>
									<div class="activity-text"><strong>AIS document uploaded</strong><span>Today, 06:30 PM</span></div>
								</div>
								<div class="activity-item">
									<div class="activity-icon"><i class="fa fa-line-chart"></i></div>
									<div class="activity-text">
										<strong>Capital gains entries added</strong><span>Yesterday, 10:15 PM</span>
									</div>
								</div>
								<div class="activity-item">
									<div class="activity-icon"><i class="fa fa-bullseye"></i></div>
									<div class="activity-text"><strong>Deductions updated</strong><span>Yesterday, 07:20 PM</span></div>
								</div>
								<div class="activity-item">
									<div class="activity-icon"><i class="fa fa-file"></i></div>
									<div class="activity-text">
										<strong>Return created for FY 2026-27</strong><span>15 Jul 2026, 09:10 PM</span>
									</div>
								</div>
							</div>

							<div class="card years">
								<div class="section-title">
									<h3>Previous Years</h3>
									<a href="#" onclick="notify('Opening all previous years');return false;">View All</a>
								</div>
								<div class="year-card">
									<div class="year-top">
										<span>FY 2025-26 <small>(AY 2026-27)</small></span
										><span class="filed">Filed</span>
									</div>
									<div class="year-bottom">
										<span>Refund: <b class="good">₹14,520</b></span
										><a href="#">View / Download</a>
									</div>
								</div>
								<div class="year-card">
									<div class="year-top">
										<span>FY 2024-25 <small>(AY 2025-26)</small></span
										><span class="filed">Filed</span>
									</div>
									<div class="year-bottom">
										<span>Refund: <b class="good">₹12,800</b></span
										><a href="#">View / Download</a>
									</div>
								</div>
								<div class="year-card">
									<div class="year-top">
										<span>FY 2023-24 <small>(AY 2024-25)</small></span
										><span class="filed">Filed</span>
									</div>
									<div class="year-bottom">
										<span>Refund: <b class="good">₹9,650</b></span
										><a href="#">View / Download</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
	</div>
	
	
	
	
	
	

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('coach/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('coach/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('coach/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('coach/vendors/js/extensions/shepherd.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('coach/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('coach/js/core/app.js') }}"></script>
    <script src="{{ asset('coach/js/scripts/components.js') }}"></script>
	
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('coach/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <!-- END: Page JS-->
	<!-- BEGIN: Page JS-->
    <script src="{{ asset('coach/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
	
	    <!-- BEGIN: Page JS-->
    <script src="{{ asset('coach/js/scripts/charts/chart-apex.js') }}"></script>
    <!-- END: Page JS-->
	
	<script src="{{ asset('coach/js/Chart.min.js') }}"></script>
	<script src="{{ asset('coach/js/membersh.js') }}"></script>
	
<script>
$(document).ready(function () {

    /* =========================================
       DESKTOP DROPDOWN - MOUSE HOVER
    ========================================= */

    $(".dropdown-item").on("mouseenter", function () {

        // Sirf desktop par
        if ($(window).width() > 900) {

            // Baaki dropdown close
            $(".dropdown-item")
                .not(this)
                .removeClass("active")
                .find(".dropdown-menu")
                .stop(true, true)
                .slideUp(150);

            // Current dropdown open
            $(this)
                .addClass("active")
                .find(".dropdown-menu")
                .stop(true, true)
                .slideDown(200);
        }

    });


    $(".dropdown-item").on("mouseleave", function () {

        // Sirf desktop par
        if ($(window).width() > 900) {

            $(this)
                .removeClass("active")
                .find(".dropdown-menu")
                .stop(true, true)
                .slideUp(200);
        }

    });


    /* =========================================
       MOBILE DROPDOWN - CLICK
    ========================================= */

    $(".dropdown-toggle").on("click", function (e) {

        // Mobile par hi click dropdown
        if ($(window).width() <= 900) {

            e.preventDefault();

            var parent = $(this).closest(".dropdown-item");
            var dropdown = parent.find(".dropdown-menu");

            // Agar already open hai
            if (parent.hasClass("active")) {

                parent.removeClass("active");

                dropdown
                    .stop(true, true)
                    .slideUp(200);

            } else {

                // Baaki dropdown close
                $(".dropdown-item")
                    .not(parent)
                    .removeClass("active")
                    .find(".dropdown-menu")
                    .stop(true, true)
                    .slideUp(200);

                // Current dropdown open
                parent.addClass("active");

                dropdown
                    .stop(true, true)
                    .slideDown(200);
            }

        }

    });


    /* =========================================
       OUTSIDE CLICK - MOBILE
    ========================================= */

    $(document).on("click", function (e) {

        if ($(window).width() <= 900) {

            if (!$(e.target).closest(".dropdown-item").length) {

                $(".dropdown-item")
                    .removeClass("active")
                    .find(".dropdown-menu")
                    .stop(true, true)
                    .slideUp(200);
            }

        }

    });


    /* =========================================
       MOBILE MENU TOGGLE
    ========================================= */

    $("#mobileToggle").on("click", function (e) {

        e.stopPropagation();

        $("#navMenu").toggleClass("show");

    });


    /* =========================================
       MOBILE NORMAL MENU LINK CLICK
    ========================================= */

    $(".nav-menu > .nav-item:not(.dropdown-item) .nav-link")
        .on("click", function () {

            if ($(window).width() <= 900) {

                $("#navMenu").removeClass("show");

                $(".dropdown-item")
                    .removeClass("active")
                    .find(".dropdown-menu")
                    .stop(true, true)
                    .slideUp(200);
            }

        });


    /* =========================================
       RESIZE HANDLER
    ========================================= */

    $(window).on("resize", function () {

        if ($(window).width() > 900) {

            // Mobile menu close
            $("#navMenu").removeClass("show");

            // Dropdown reset
            $(".dropdown-item")
                .removeClass("active");

            $(".dropdown-menu")
                .stop(true, true)
                .removeAttr("style");
        }

    });


    /* =========================================
       ESC KEY - DROPDOWN CLOSE
    ========================================= */

    $(document).on("keydown", function (e) {

        if (e.key === "Escape") {

            $(".dropdown-item")
                .removeClass("active");

            $(".dropdown-menu")
                .stop(true, true)
                .slideUp(200);

            $("#navMenu").removeClass("show");
        }

    });

});
</script>

<script>
    window.onscroll = function() {
        myFunction()
    };
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>

<style>
nav.adm_desk_menuss {display: none;}
#myHeader .main-header .container {
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
}
.container.dash_ar_cnter {
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
}
html body .content .content-wrapper {
    padding-right: 0;
}


#myHeader.sticky {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
    box-shadow: 0px 0px 10px #ccc;
}

#myHeader .top-bar {
    height: auto;
    background: #245a9b;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 9px 0;
    width: 100%;
    position: relative;
    z-index: 9999;
}

#myHeader .top-links {
    display: flex;
    align-items: center;
    gap: 32px;
}

#myHeader .top-link {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #fff;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
}

#myHeader .top-link svg {
    width: 16px;
    height: 16px;
    fill: currentColor;
}

        /* ================= NAVBAR ================= */

#myHeader .main-header {
    height: auto;
    background: #fff;
    display: flex;
    align-items: center;
    padding: 0 20px;
    box-shadow: none;
    width: 100%;
}

#myHeader .main-header .header-inner {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
#myHeader .main-header .rt_areeea {
    display: flex;
    gap: 40px;
}

/* ================= LOGO ================= */

#myHeader .main-header .logo {
    width: 65px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

#myHeader .main-header .logo img {
    width: 100%;
}
#myHeader .main-header .logo svg {
    width: 62px;
    height: 68px;
}

/* ================= MENU ================= */

#myHeader .main-header .nav-menu {
    display: flex;
    align-items: center;
    gap: 34px;
}

#myHeader .main-header .nav-item {
    position: relative;
}

#myHeader .main-header .nav-link {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #111;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    padding: 12px 0;
    cursor: pointer;
    white-space: nowrap;
}

#myHeader .main-header .nav-link:hover {
    color: #245a9b;
}

#myHeader .main-header .arrow {
    width: 13px;
    height: 13px;
    transition: 0.25s ease;
}

#myHeader .main-header  .nav-item.active .arrow {
    transform: rotate(180deg);
}

/* ================= DROPDOWN ================= */

.dropdown-menu {
    position: absolute;
    top: calc(100% + 4px);
    left: -15px;
    min-width: 190px;
    background: #fff;
    border-radius: 4px;
    padding: 0;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.14);
    margin: 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(8px);
    transition: all 0.25s ease;
    z-index: 999;
}

/* Mouse hover */
.dropdown-item:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* Arrow rotate */
.dropdown-item:hover .arrow {
    transform: rotate(180deg);
}

.dropdown-menu a {
    display: block;
    padding: 9px 10px;
    color: #333;
    text-decoration: none;
    font-size: 13px;
    font-weight: 400;
    transition: 0.2s ease;
}

.dropdown-menu a:hover {
    background: #f3f7fc;
    color: #245a9b;
}
.dropdown-item.active,
.dropdown-item:active {
    color: #ffffff;
    text-decoration: none;
    background-color: transparent;
    border-radius: 0;
    padding: 0.25rem 1.5rem;
    top: 0;
}
.nav-menu .nav-item.dropdown-item {
    padding: 0.25rem 0rem;
}

/* ================= BUTTONS ================= */

#myHeader .main-header .header-buttons {
    display: flex;
    align-items: center;
    gap: 12px;
}

#myHeader .main-header .login-btn,
#myHeader .main-header .register-btn {
    height: auto;
    padding: 8px 15px;
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.25s ease;
    color: #fff !important;
}

#myHeader .main-header .login-btn {
    background: #245a9b;
    color: #fff;
}

#myHeader .main-header .login-btn:hover {
    background: #17477f;
}

#myHeader .main-header .register-btn {
    background: #ff4757;
    color: #fff;
}

#myHeader .main-header .register-btn:hover {
    background: #e73545;
}

/* ================= MOBILE ================= */

#myHeader .main-header .mobile-toggle {
    display: none;
    width: 42px;
    height: 42px;
    border: 0;
    background: transparent;
    cursor: pointer;
}

#myHeader .main-header .mobile-toggle svg {
    width: 28px;
    height: 28px;
}



.dashes_ara_main .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
    margin-bottom: 16px;
}
.dashes_ara_main .greeting h1 {
    font-size: 18px;
    color: #17345b;
    margin: 0 0 4px;
}
.dashes_ara_main .greeting h1 span {
    color: #1260c4;
}
.dashes_ara_main .greeting p {
    font-size: 12px;
    color: #718098;
    margin-top: 2px;
    margin-bottom: 0;
}
.dashes_ara_main .top-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}
.dashes_ara_main .fy {
    background: #fff;
    border: 1px solid #dce4ef;
    border-radius: 5px;
    padding: 8px 10px;
    color: #344967;
    font-size: 10px;
    font-weight: 600;
    height: 33px;
}
.dashes_ara_main .icon-btn {
    border: 0;
    background: #fff;
    width: 34px;
    height: 34px;
    border-radius: 7px;
    color: #405675;
    position: relative;
}
.dashes_ara_main .bell-dot {
    position: absolute;
    right: 5px;
    top: 4px;
    background: #e74b4b;
    color: #fff;
    border-radius: 50%;
    font-size: 8px;
    width: 14px;
    height: 14px;
}
.dashes_ara_main .user {
    display: flex;
    align-items: center;
    gap: 3px;
    font-size: 11px;
    font-weight: 600;
    text-wrap-mode: nowrap;
}
.dashes_ara_main .avatar {
    width: 34px;
    height: 34px;
    background: #e7f0fc;
    color: #2364ad;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}
.dashes_ara_main .grid-top {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 12px;
}
.dashes_ara_main .card {
    background: #fff;
    border: 1px solid #e0e7f0;
    border-radius: 9px;
    box-shadow: 0 4px 14px rgba(35, 57, 86, 0.05);
}
.dashes_ara_main .progress-card {
    padding: 17px 19px;
    min-height: 142px;
    margin-bottom: 5px;
}
.dashes_ara_main .progress-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dashes_ara_main .progress-title h2 {
    font-size: 14px;
}
.dashes_ara_main .percent {
    font-size: 20px;
    color: #13a35e;
    font-weight: 700;
}
.dashes_ara_main .bar {
    height: 9px;
    background: #e5ebf3;
    border-radius: 10px;
    margin: 12px 0 13px;
    overflow: hidden;
}
.dashes_ara_main .bar span {
    display: block;
    width: 62%;
    height: 100%;
    background: #12a35d;
    border-radius: 10px;
}
.dashes_ara_main .continue {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 10px;
    color: #748197;
}
.dashes_ara_main .primary {
    background: #1a4f96;
    border: 0;
    color: #fff !important;
    border-radius: 4px;
    padding: 8px 10px 7px;
    font-size: 11px;
    font-weight: 600;
}
.dashes_ara_main .profile-card {
    padding: 14px 15px;
    margin-bottom: 5px;
}
.dashes_ara_main .profile-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.profile-head h3 {
    font-size: 13px;
}
.dashes_ara_main .complete {
    color: #13a35e;
    font-weight: 600;
    font-size: 10px;
}
.dashes_ara_main .profile-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-top: 12px;
    gap: 8px;
}
.dashes_ara_main .metric {
    background: #f7f9fc;
    border-radius: 7px;
    padding: 9px;
}
.dashes_ara_main .metric label {
    display: block;
    font-size: 9px;
    color: #77859b;
}
.dashes_ara_main .metric strong {
    font-size: 11px;
}
.dashes_ara_main .good {
    color: #15985a;
}
.dashes_ara_main .profile-date {
    font-size: 10px;
    color: #8a95a6;
    margin-top: 9px;
}
.dashes_ara_main .quick {
    padding: 14px;
    margin-bottom: 5px;
}
.dashes_ara_main .quick h3 {
    font-size: 13px;
    margin-bottom: 10px;
}
.dashes_ara_main .quick-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 7px;
}
.dashes_ara_main .quick-item {
    border: 1px solid #e1e7ef;
    border-radius: 7px;
    padding: 9px 3px;
    text-align: center;
    font-size: 9px;
    color: #52627a;
}
.dashes_ara_main .quick-item i {
    display: flex;
    width: 32px;
    height: 32px;
    margin: 0 auto 5px;
    border-radius: 8px;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}
.dashes_ara_main .blue i {
    background: #eaf3ff;
    color: #2870c5;
}
.dashes_ara_main .green i {
    background: #eaf8ef;
    color: #22985a;
}
.dashes_ara_main .purple i {
    background: #f1ecff;
    color: #7251c9;
}
.dashes_ara_main .orange i {
    background: #fff3e2;
    color: #df8b18;
}
.dashes_ara_main .section {
    margin-top: 15px;
}
.dashes_ara_main .section-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}
.dashes_ara_main .section-title h2 {
    font-size: 16px;
    color: #1d3558;
    font-weight: 600;
}
.dashes_ara_main .section-title a {
    font-size: 10px;
    font-weight: 500;
    color: #1a4f96;
    text-decoration: none;
}
.dashes_ara_main .steps {
    padding: 12px 13px;
}
.dashes_ara_main .step-line {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0;
    margin: 0 5px 11px;
}
.dashes_ara_main .circle {
    width: 25px;
    height: 25px;
    border: 2px solid #20a85f;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 600;
    color: #159656;
    background: #fff;
}
.dashes_ara_main .circle.warn {
    border-color: #e6b526;
    color: #c28b00;
}
.dashes_ara_main .circle.lock {
    border-color: #e25454;
    color: #d54d4d;
}
.dashes_ara_main .arrow {
    width: 27px;
    height: 2px;
    background: #39a969;
    position: relative;
}
.dashes_ara_main .arrow:after {
    content: "";
    position: absolute;
    right: -1px;
    top: -4px;
    border-left: 6px solid #39a969;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
}
.dashes_ara_main .step-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 9px;
}
.dashes_ara_main .step-card {
    border: 1px solid #e0e7ef;
    border-radius: 9px;
    padding: 12px 10px;
    min-height: 122px;
    position: relative;
    background: #fff;
    transition: 0.2s;
}
.dashes_ara_main .step-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(30, 55, 90, 0.08);
}
.dashes_ara_main .step-no {
    position: absolute;
    left: 9px;
    top: 8px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #20a760;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 9px;
    font-weight: 700;
}
.dashes_ara_main .step-no.yellow {
    background: #e5af1a;
}
.dashes_ara_main .step-no.gray {
    background: #8893a3;
}
.dashes_ara_main .step-icon {
    width: 48px;
    height: 38px;
    margin: 8px auto 6px;
    background: #edf8f1;
    color: #159b59;
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}
.dashes_ara_main .step-card.yellow .step-icon {
    background: #fff7df;
    color: #d59d11;
}
.dashes_ara_main .step-card.gray .step-icon {
    background: #f0f2f5;
    color: #8c96a5;
}
.dashes_ara_main .step-card h3 {
    text-align: center;
    font-size: 12px;
    color: #253754;
    line-height: 1.25;
}
.dashes_ara_main .step-status {
    text-align: center;
    margin-top: 7px;
    font-size: 9px;
    color: #718097;
}
.dashes_ara_main .done {
    color: #14965a;
}
.dashes_ara_main .mini-progress {
    height: 4px;
    background: #e7ebf0;
    border-radius: 5px;
    margin: 10px 12px 0;
}
.dashes_ara_main .mini-progress span {
    display: block;
    height: 100%;
    background: #e6b21c;
    border-radius: 5px;
}
.dashes_ara_main .step-card .mini-percent {
    text-align: right;
    font-size: 8px;
    color: #66758b;
    margin-top: 3px;
}
.dashes_ara_main .summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 9px;
}
.dashes_ara_main .summary-card {
    padding: 10px;
    border: 1px solid #e0e7ef;
    border-radius: 4px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.dashes_ara_main .sum-icon {
    width:30px;
    height:30px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    background: #edf5ff;
    color: #2472c7;
}
.dashes_ara_main .sum-green .sum-icon {
    background: #ebf8f0;
    color: #20965a;
}
.dashes_ara_main .sum-yellow .sum-icon {
    background: #fff7df;
    color: #d49b13;
}
.dashes_ara_main .sum-red .sum-icon {
    background: #fff0f0;
    color: #dc5353;
}
.dashes_ara_main .summary-card label {
    display: block;
    font-size: 9px;
    color: #77859a;
}
.dashes_ara_main .summary-card strong {
    font-size: 14px;
    color: #263c5c;
}
.dashes_ara_main .documents {
    padding: 13px;
}
.dashes_ara_main .doc-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 7px;
}
.dashes_ara_main .doc {
    border: 1px solid #e1e7ef;
    border-radius: 7px;
    padding: 9px;
    text-align: center;
}
.dashes_ara_main .doc h4 {
    font-size: 9px;
    color: #52627a;
}
.dashes_ara_main .doc p {
    font-size: 9px;
    margin: 0;
    line-height: 1;
}
.dashes_ara_main .uploaded {
    color: #15995b;
}
.dashes_ara_main .pending {
    color: #dc9514;
}
.dashes_ara_main .right-layout {
    display: grid;
    grid-template-columns: 1fr;
    gap: 13px;
}
.dashes_ara_main .activity {
    padding: 13px;
    margin: 0;
}
.dashes_ara_main .activity h3,
.dashes_ara_main .years h3 {
    font-size: 13px;
    margin-bottom: 9px;
}
.dashes_ara_main .activity-item {
    display: flex;
    gap: 9px;
    padding: 8px 0;
    border-bottom: 1px solid #edf0f4;
}
.dashes_ara_main .activity-item:last-child {
    border-bottom: 0;
}
.dashes_ara_main .activity-icon {
    width: 28px;
    height: 28px;
    border-radius: 7px;
    background: #edf5ff;
    color: #2670c5;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    flex-shrink: 0;
}
.dashes_ara_main .activity-text strong {
    display: block;
    font-size: 11px;
    color: #324764;
}
.dashes_ara_main .activity-text span {
    font-size: 10px;
    color: #8a95a6;
}
.dashes_ara_main .years {
    padding: 13px;
}
.dashes_ara_main .year-card {
    border: 1px solid #e0e7ef;
    border-radius: 7px;
    padding: 9px 10px;
    margin-bottom: 7px;
}
.dashes_ara_main .year-top {
    display: flex;
    justify-content: space-between;
    font-size: 10px;
    font-weight: 600;
}
.dashes_ara_main .filed {
    color: #15995b;
    background: #eaf8ef;
    border-radius: 10px;
    padding: 2px 6px;
    font-size: 9px;
}
.dashes_ara_main .year-bottom {
    display: flex;
    justify-content: space-between;
    margin-top: 6px;
    font-size: 8px;
    color: #718097;
}
.dashes_ara_main .year-bottom a {
    color: #1a4f96;
    text-decoration: none;
    font-weight: 500;
    font-size: 9px;
}
.dashes_ara_main .layout {
    display: grid;
    grid-template-columns: minmax(0, 1.75fr) minmax(260px, 0.85fr);
    gap: 13px;
    margin-top: 13px;
}
.dashes_ara_main .tax-health {
    padding: 14px;
    margin: 0;
}
.dashes_ara_main .health-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dashes_ara_main .health-row h3 {
    font-size: 13px;
}
.dashes_ara_main .stars {
    color: #eab21d;
    font-size: 12px;
}
.dashes_ara_main .health-good {
    font-size: 9px;
    background: #eaf8ef;
    color: #168b54;
    border-radius: 12px;
    padding: 3px 7px;
}
.dashes_ara_main .health-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-top: 11px;
    gap: 6px;
}
.dashes_ara_main .health-metric {
    padding: 8px;
    background: #f7f9fc;
    border-radius: 6px;
}
.dashes_ara_main .health-metric span {
    display: block;
    color: #7a879a;
    font-size: 10px;
}
.dashes_ara_main .health-metric strong {
    font-size: 10px;
}
.dashes_ara_main .right-stack {
    display: flex;
    flex-direction: column;
    gap: 13px;
}
.dashes_ara_main .toast {
    position: fixed;
    right: 20px;
    bottom: 20px;
    background: #173b68;
    color: #fff;
    padding: 11px 15px;
    border-radius: 7px;
    font-size: 10px;
    display: none;
    z-index: 20;
    box-shadow: 0 8px 25px #0003;
}
.dashes_ara_main .toast.show {
    display: block;
}




@media(max-width:1200px){
.dashes_ara_main .grid-top {
    grid-template-columns: 1fr 1fr;
}
.dashes_ara_main .quick {
	grid-column: 1/-1;
}
.dashes_ara_main .layout {
	display: block;
}
.dashes_ara_main .right-stack {
	display: grid;
	grid-template-columns: 1fr 1fr;
}
.dashes_ara_main .doc-grid {
	grid-template-columns: repeat(3, 1fr);
}
}


@media(max-width:900px){
.dashes_ara_main .step-grid {
    grid-template-columns: repeat(2, 1fr);
}
.dashes_ara_main .grid-top {
    grid-template-columns: 1fr;
}
.dashes_ara_main .quick {
    grid-column: auto;
}

}
@media(max-width:650px){
.dashes_ara_main {
    padding: 12px;
}
.dashes_ara_main .topbar {
    align-items: flex-start;
}
.dashes_ara_main .greeting h1 {
    font-size: 17px;
}
.dashes_ara_main .user {
    display: none;
}
.dashes_ara_main .step-grid,
.dashes_ara_main .summary,
.dashes_ara_main .right-stack {
    grid-template-columns: 1fr;
}
.dashes_ara_main .doc-grid {
    grid-template-columns: repeat(2, 1fr);
}
.dashes_ara_main .step-line {
    overflow: auto;
    justify-content: flex-start;
}
.dashes_ara_main .arrow {
    min-width: 20px;
}	
}





@media (max-width: 1100px) {
            #myHeader .main-header .main-header,
            #myHeader .main-header .top-bar {
                padding-left: 4%;
                padding-right: 4%;
            }

            #myHeader .main-header .nav-menu {
                gap: 20px;
            }

            #myHeader .main-header .header-buttons {
                gap: 7px;
            }

            #myHeader .main-header .login-btn,
            #myHeader .main-header .register-btn {
                padding: 0 20px;
            }
        }

        @media (max-width: 900px) {

            #myHeader .main-header .top-bar {
                height: auto;
                min-height: 45px;
                padding: 8px 20px;
            }

            #myHeader .main-header .top-links {
                gap: 15px;
            }

            #myHeader .main-header .top-link {
                font-size: 14px;
            }

            #myHeader .main-header .main-header {
                height: 75px;
                padding: 0 20px;
            }

            #myHeader .main-header .mobile-toggle {
                display: block;
            }

            #myHeader .main-header .nav-menu {
                position: absolute;
                top: 120px;
                left: 0;
                width: 100%;
                background: #fff;
                display: none;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                padding: 10px 20px 20px;
                box-shadow: 0 8px 20px rgba(0,0,0,.1);
                z-index: 1000;
            }

            #myHeader .main-header .nav-menu.show {
                display: flex;
            }

            #myHeader .main-header .nav-link {
                padding: 10px 0px;
                justify-content: space-between;
                border-bottom: 1px solid #eee;
				font-size:13px;
            }

            #myHeader .main-header .dropdown-menu {
                position: static;
                width: 100%;
                box-shadow: none;
                border-radius: 0;
                padding: 0;
            }

            #myHeader .main-header .header-buttons {
                margin-left: auto;
                margin-right: 10px;
            }

            #myHeader .main-header .login-btn,
            #myHeader .main-header .register-btn {
                height: auto;
				padding: 6px 12px;
				font-size: 12px;
            }

            #myHeader .main-header .logo {
                width: 55px;
            }

            #myHeader .main-header .logo svg {
                width: 52px;
            }
        }

@media (min-width: 320px) and (max-width: 480px) {
            #myHeader .main-header .top-links {
                width: 100%;
                justify-content: center;
                gap: 15px;
            }

            #myHeader .main-header .top-link:first-child {
                display: none;
            }

            #myHeader .main-header .header-buttons {
               display: flex;
               margin: 0;
            }

            #myHeader .main-header .main-header {
                position: relative;
            }

            #myHeader .main-header .mobile-toggle {
                margin-left: auto;
            }

            #myHeader .main-header .nav-menu {
                top: 85px;
                z-index: 999999;
            }
			
			#myHeader .main-header {padding: 0 !important;}
			
			nav.header-navbar.navbar-expand-lg.navbar.navbar-with-menu.floating-nav.navbar-light.adm_desk_menuss {
				width: calc(13vw - (100vw - 100%) - 0rem) !important;
				z-index: 99999;
				top: 160px;
				background: #1a4f96d4 !important;
				border-radius: 30px 0px 0 30px;
				align-items: center;
				justify-content: center;
				display: flex !important;
			}
			nav.header-navbar.navbar-expand-lg.navbar.navbar-with-menu.floating-nav.navbar-light.adm_desk_menuss a.nav-link.nav-menu-main.menu-toggle.hidden-xs {
				padding: 0;
				color: #fff !important;
			}
			nav.header-navbar.navbar-expand-lg.navbar.navbar-with-menu.floating-nav.navbar-light.adm_desk_menuss a.nav-link.nav-menu-main.menu-toggle.hidden-xs i.ficon.feather.icon-menu {
				color: #fff !important;
			}
			
			#myHeader .top-links {gap:10px;}
			#myHeader .top-link{top: 34px;}
			.container.dash_ar_cnter .main-menu.menu-fixed {top: 34px;}
			html body .content .content-wrapper {padding-right: 0; padding-left: 0;}
			html body .content .content-wrapper .dashes_ara_main {padding: 0;}
			#myHeader .main-header .nav-link:after {display:none !important;}
			#myHeader .main-header .nav-item:focus{background-color:transparent !important;}
			#myHeader .main-header .rt_areeea {gap: 10px;}
        }

</style>

</body>
<!-- END: Body-->

</html>