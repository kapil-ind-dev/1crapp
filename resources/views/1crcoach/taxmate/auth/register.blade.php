<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('coach/images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('coach/css/components.css') }}">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
<div class="lg_re_all_pgss">
    <div class="login_cn registress">
        <div class="meddils">
		  <div class="al_dts_sprt">
            <div class="hedding_areaa text-center">
			    <img src="images/logo.png" alt="" />
                <h4>Welcome To 1CR</h4>                
            </div>

            <div class="form_box_areaa">
                <form action="">
				    <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <label>Name</label>
                        <input type="text" class="form-control logn" id="" placeholder="Enter your name" required="" />
                    </fieldset>
					
					<fieldset class="form-label-group form-group position-relative has-icon-left">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control logn" id="" placeholder="Enter your mobile no" required="" />
                    </fieldset>		
				
				
                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <label>Email ID</label>
                        <input type="text" class="form-control logn" id="" placeholder="Enter your Email ID" required="" />
                    </fieldset>

                    <fieldset class="form-label-group position-relative has-icon-left">
                        <label>Password</label>
                        <input type="password" class="form-control logn" id="" placeholder="Type Password" required="" />
                    </fieldset>
					
					<fieldset class="form-label-group form-group position-relative has-icon-left">
                        <label>Count Number</label>
                        <input type="text" class="form-control logn" id="" value="8 + 6 =" placeholder="?" required="" />
                    </fieldset>	

                    <div class="align-items-center">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-inline-block">
                                            <fieldset>
                                                <div class="vs-checkbox-con">
                                                    <input type="checkbox" name="vueradio" value="false" />
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
														 <i class="vs-icon feather icon-check"></i>
														</span>
                                                    </span>
                                                    <span class="">I agree with <a href="javascript:void(0);">Terms and Conditions of Organization.</a></span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <button type="submit" class="btn b_plcol btn-block btn-inline">Sign Up</button>
                    </fieldset>
					<fieldset class="mt-1">
                        <a href="{{ route('1crcoach.taxmate.login') }}" class="btn plcol btn-block btn-inline">Sign In</a>
                    </fieldset>
					<p class="sm_txtxt text-center">Already have an account?</p>
                </form>
            </div>
          </div>
		  <div class="btm_data">
		   @1CRAPP II Designed & Developed By 
           <span>Digitalramjee  +91-8295500152</span>
		  </div>
		</div>        
	</div>
	
</div>
</body>
</html>