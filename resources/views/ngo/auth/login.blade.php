<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ngo/images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ngo/css/components.css') }}">
</head>
<body>
<div class="lg_re_all_pgss">
    <div class="login_cn">
        <div class="meddils">
		  <div class="al_dts_sprt">
            <div class="hedding_areaa text-center">
			    <img src="images/logo.png" alt="" />
                <h4>Welcome To 1CR</h4>
            </div>
            <div class="form_box_areaa">
                <form action="dashboard.html">
                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <label>Login ID</label>
                        <input type="text" class="form-control logn" id="" placeholder="Enter your Login ID" required="" />
                    </fieldset>
                    <fieldset class="form-label-group position-relative has-icon-left">
                        <label>Password</label>
                        <input type="password" class="form-control logn" id="" placeholder="Password" required="" />
                    </fieldset>
                    <div class="align-items-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
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
                                                    <span class="">Keep me logged in</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="text-right"><a href="{{ route('ngo.forgot-password') }}" class="card-link">Forgot Password?</a></div>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <a href="{{ route('ngo.login') }}"><button type="submit" class="btn b_plcol btn-block btn-inline">Sign In</button></a>
                    </fieldset>
					<fieldset class="mt-1">
                        <a href="{{ route('ngo.register') }}" class="btn plcol btn-block btn-inline">Create an account</a>
                    </fieldset>					
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