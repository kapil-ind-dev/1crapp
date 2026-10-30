<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Membership Registration Form</title>
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



<!-- ==== Disable Booking Modal Popup ==== -->
<div class="modal fade all_pop_modalss" id="member_shipps" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable setwth" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Membership</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pdmfor">
                <form action="">			
					<div class="und_contntss">
                       <h2>Pay Membership Free</h2>
					   <p>Designation : Member</p>
					   <div class="form-group text-center">
                        <button type="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1">Pay Now</button>
                        <button type="submit" value="submit" class="btn btn-info waves-effect waves-light">I,II Pay Later</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ==== End Disable Booking Modal Popup ==== -->


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
								<span><img class="round" src="images/user_sm_pk.jpg" alt="avatar" height="40" width="40" /></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="javascript:void(0);"><i class="feather icon-user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0);"><img src="{{ asset('ngo/images/key.svg') }}" alt="" /> Change Password</a>
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
				 <a class="navbar-brand" href="dashboard.html">
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
			        <div class="titlls_hed">Membership Registration Form</div>
					<div class="form-container">
					  <form action="">
					    <!---- Personal Information / व्यक्तिगत जानकारी ----->
						<div class="frm_areeea">
							<div class="form-title">Personal Information / व्यक्तिगत जानकारी</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Name</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-user"></i></div>
										 <input type="text" placeholder="Enter name" required="" />
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Father Name</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-user"></i></div>
										 <input type="text" placeholder="Enter father Name / husband Name" />
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Email ID</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-envelope"></i></div>
										 <input type="email" placeholder="Enter email" />
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Mobile </label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-phone"></i></div>
										 <input type="text" placeholder="Enter mobile no" />
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>DOB</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-calendar"></i></div>
										 <input type="date" placeholder="MM/DD/YYYY" />
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Aadhaar</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-id-card"></i></div>
										 <input type="text" placeholder="Enter aadhar no" />
										</div> 
									</div>
								</div>
							</div>
						</div>
						<!---- End Personal Information / व्यक्तिगत जानकारी ----->

						<!---- Demographic Information / जनसांख्यिकीय जानकारी ---->
						<div class="frm_areeea">
							<div class="form-title">Demographic Information / जनसांख्यिकीय जानकारी</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Gender</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-user"></i></div>
										 <select>
											<option value="">Select Gender</option>
										 </select>
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Marital Status</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-clone"></i></div>
										 <select>
											<option value="">Select Marital Status</option>
										 </select>
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Category</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-table"></i></div>
										 <select>
											<option value="">Select Category</option>
										 </select>
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Blood Group </label>
										<div class="bth_icon">
										  <div class="icn_uus"><i class="fa fa-gratipay"></i></div>
										  <select>
											<option value="">Select Blood Group -- (Optional)</option>
										  </select>
										</div> 
									</div>
								</div>
							</div>
						</div>
						<!---- End Demographic Information / जनसांख्यिकीय जानकारी ---->

						<!---- Professional Information / व्यावसायिक जानकारी ----->
						<div class="frm_areeea">
							<div class="form-title">Professional Information / व्यावसायिक जानकारी</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Occupation</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-shopping-bag"></i></div>
										 <select>
											<option value="">Select Occupation</option>
										 </select>
										</div> 
									</div>
								</div>
							</div>
						</div>
						<!---- End Professional Information / व्यावसायिक जानकारी ----->

						
						<!---- Residential Address Details / आवासीय पता विवरण ----->
						<div class="frm_areeea">
							<div class="form-title">Residential Address Details / आवासीय पता विवरण</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Address</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-map-marker"></i></div>
										 <input type="text" placeholder="Enter address" />
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Pin Cord</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-map-marker"></i></div>
										 <input type="text" placeholder="Enter pin cord" />
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Status</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-home"></i></div> 
										 <select>
											<option value="">Select Status</option>
										 </select>
										</div> 
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>District </label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-university"></i></div>
										 <select>
											<option value="">Select District</option>
										 </select>
										</div> 
									</div>
								</div>
							</div>
						</div>
                        <!---- End Residential Address Details / आवासीय पता विवरण ----->
						
						<!---- Media Upload / मीडिया अपलोड ----->
						<div class="frm_areeea">
							<div class="form-title">Media Upload / मीडिया अपलोड</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Upload Profile Photo / अपनी प्रोफाइल फोटो अपलोड करे।</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-file-image-o"></i></div>
										 <input type="file" class="files" placeholder="Upload Photo" />
										</div> 
									</div>
								</div>
							</div>
						</div>
						<!---- End Media Upload / मीडिया अपलोड ----->						

						<!---- Role Applying For in the Organization / संगठन में आवेदन किया गया पद ----->
						<div class="frm_areeea">
							<div class="form-title">Role Applying For in the Organization / संगठन में आवेदन किया गया पद</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-12">
									<div class="input-group">
										<label>Designation</label>
										<div class="bth_icon">
										 <div class="icn_uus"><i class="fa fa-users"></i></div>
										 <select>
											<option value="">Select Designation</option>
										 </select>
										</div> 
									</div>
								</div>
							</div>
						</div>
						<!---- End Role Applying For in the Organization / संगठन में आवेदन किया गया पद ----->
					   
					    <div class="button_tp">
						 <button type="submit" value="">Preview</button>
						 <a href="javascript:void(0);" data-toggle="modal" data-target="#member_shipps">Back to dashboard</a>
						</div>
					   </form>						
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
	
	<script src="https://code.highcharts.com/highcharts.src.js') }}"></script>
	
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