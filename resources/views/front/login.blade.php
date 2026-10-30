@include('front.layouts.header_new')

<style>
.login-form.flu_lnth .medls_araeass .login-form-inner .forms_reass input.lg_frms {width:100%;}
.iti--separate-dial-code .iti__selected-flag {color: #0e3992; font-size: 14px;}
.iti__country {color: #333; font-size: 12px;}
.login-container.regisstr .onboarding.flu_lnth {height: auto; overflow: auto;}

.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content {align-items: baseline; height:auto;}
.login-container.regisstr .login-form.flu_lnth.col-md-6.justify-content-center.d-flex{height: auto;}

.login-form.flu_lnth .medls_araeass{margin-top:0 !important; padding: 40px 0;}

.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content .mg_areeea {
    max-width: 392px;
    width: 100%;
    height: 220px;
    margin: 0 auto;
	overflow: hidden;
}
.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content .mg_areeea img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.onboarding.flu_lnth .slide-content .medilss_areaaa .lgo_areaa {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    margin-bottom: 30px;
    overflow: hidden;
}
.onboarding.flu_lnth .slide-content .medilss_areaaa .lgo_areaa a {
    display: block;
}
.onboarding.flu_lnth .slide-content .medilss_areaaa .lgo_areaa a img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.login-form.flu_lnth .medls_araeass .login-form-inner .alert.alert-danger {
    max-width: 360px;
    width: 100%;
    margin: 0 auto;
    margin-bottom: 15px;
    padding: 12px !important;
    line-height: 20px;
	font-size: 13px !important;
}
.login-form.flu_lnth .medls_araeass .login-form-inner .alert.alert-danger a.text-info {
    color: #5e0a08 !important;
    font-size: 13px;
    font-weight: 600;
    text-decoration: underline;
}

.onboarding.flu_lnth .slide-content .medilss_areaaa embed {
    object-fit: cover;
	height: 220px;
}
.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content p.py-4.btnmss_tx {
    max-width: 320px;
	width:100%;
    margin: 0 auto;
    margin-bottom: 20px;
    margin-top: 20px;
    padding: 0 !important;
}
.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content .socila_mds {
    max-width: 200px;
    width: 100%;
    height: 60px;
    margin: 0 auto;
    overflow: hidden;
}
.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content .socila_mds a{
    display:block;
}
.login-container.regisstr .onboarding.flu_lnth.top_data .slide-content .socila_mds a img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}



@media screen and (max-width: 800px) {
    .login-form.flu_lnth .medls_araeass {padding: 30px 20px; width: 100% !important; margin: 0 0 20px;}
	.login-form.flu_lnth .medls_araeass .login-form-inner h3 {font-size: 23px;}
	.top_hedderrss .rt_contentss {line-height: 30px;}
	.top_hedderrss .rt_contentss span.titlsss {font-size:15px; margin-right:0;  display: block;}
	.onboarding.flu_lnth .slide-content {height: 100%;}
	.top_hedderrss .rt_contentss a {padding: 0px 20px; line-height: 33px; font-size: 12px;}
	.iti__country-list {white-space: normal; width: 100%; max-width: 290px; min-width: 290px;}
	.login-container .login-form .login-form-group.with_both.lft_rigt .snd_cd {padding: 12px 5px; font-size: 11px;}	
    .login-container.regisstr .onboarding.flu_lnth { height: auto !important; overflow: initial; }
    .login-container.regisstr .onboarding.flu_lnth .slide-content {height: auto; }
	.onboarding.flu_lnth .slide-content .medilss_areaaa {margin-bottom: 25px;}
}
</style>


<body style="background: #1347a2;">
<div class="top_hedderrss">
 <div class="container">
  <div class="row">
   <div class="col-lg-1 col-xs-3"><div class="tp_lgin"><a href="{{ url('') }}"><img src="{{ url('') }}/img/logo_trnsp.png" alt="Logo" /></a></div></div>
   <div class="col-lg-11 col-xs-9">
    <div class="rt_contentss">
	 <span class="titlsss">Don't have 1CR APP Account Yet ?</span>  <a href="{{url('register')}}">Create an Account Now</a>
	</div>
   </div>
  </div>
 </div>
</div>


    <!--PEN HEADER-->
    <div class="container-fluid px-0 pdding_0">
        <div class="login-container regisstr">
            <div class="col-md-6">
                <div class="onboarding flu_lnth text-center top_data">
                    <div class="slide-content">
                        @if(isset($logincms) && !is_null($logincms))
                        <div class="medilss_areaaa">
                            @if(isset($logincms->logo_visible) && $logincms->logo_visible == 1)<div class="lgo_areaa"><a href="{{ url('') }}"><img src="{{ $logincms->company_logo }}" alt="Logo" /></a></div>@endif
                            @if(isset($logincms->tagline_visible) && $logincms->tagline_visible == 1)<h2 class="txt_hdns">{{ $logincms->tagline_text }}</h2>@endif
							<div class="mg_areeea">
                            @if(isset($logincms->file_visible) && $logincms->file_visible == 1)
                                @if(isset($logincms->file_type) && $logincms->file_type == 1)
                                    <img src="{{ $logincms->file_path }}" alt="" />
                                @else
                                    <embed src="{{ $logincms->file_path }}" />
                                @endif
                            @endif
							</div>
                            @if(isset($logincms->content_visible) && $logincms->content_visible == 1)<p class="py-4 btnmss_tx">{{ $logincms->content }}</p>@endif
                            @if(isset($logincms->gotit_visible) && $logincms->gotit_visible == 1)<div class="socila_mds"><a href="{{ $logincms->gotit_link }}" target="_blank"><img src="{{ $logincms->gotit_image }}" alt="" /></a></div>@endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="login-form flu_lnth col-md-6 justify-content-center d-flex">
                <div class="medls_araeass">
                    <div class="login-form-inner">
                        <h3>Login & Explore 1CR APP</h3>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('fail'))
                        <div class="alert alert-danger">
                            {!! session('fail') !!}
                        </div>
                        @endif
                        <form action="{{route('login')}}" method="post" onsubmit="return validateb11()" name="f4"
                            id="myForm" autocomplete="off">
                            @csrf
                            <div class="forms_reass">
                                <div class="login-form-group" id="ico_managess">
								    <i class="fa fa-envelope"></i>
                                    <input type="text" placeholder="User Name/ ID Or Email" class="lg_frms"
                                        name="email" value="{{ old('email') }}"/>
                                    <span id="email" class="err" style="color:red"></span>
                                    @error('email')
                                        <span id="email" class="err" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="login-form-group" id="ico_managess">
								     <i class="fa fa-lock"></i>
                                    <input autocomplete="off" type="password" placeholder="Password" class="lg_frms"
                                        id="pwd" name="password"  value="{{ old('password') }}"/>
                                    <!--<i class="bi bi-eye-slash" id="togglePassword"></i>-->
                                    <span id="password" class="err" style="color:red"></span>
                                    @error('password')
                                        <span id="email" class="err" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="login-form-group single-row mb-1">
                                    <div class="custom-check"><input autocomplete="off" type="checkbox" checked=""
                                            id="remember" /><label for="remember">Remember me</label></div>

                                    <a href="{{url('forgot-password')}}" class="link forgot-link">Forgot Password ?</a>
                                </div>

                                <div class="lgoss"><button type="submit" value="Login Now" class="lgo_singup">Login Now
                                        !</button></div>


                                <div class="lgoss_1">
                                    <span class="mgssd"><img src="{{ url('') }}/img/without.PNG" alt="" /></span>
                                    <a href="{{url('login-without-password')}}" class="lgo_psdsss">Login without
                                        password</a>
                                    <span class="quess" tooltip="Hi" flow="down"><i
                                            class="fa fa-question-circle-o"></i></span>
                                </div>
                                <div class="lgo_with">
                                    <div class="or_width"><span class="orss">Or</span></div>
                                    <div class="soclls_ico">
                                        <h6>Login Using</h6>
                                        <a href="{{ env('GOOGLE_LOGIN_PATH') }}" class="glgllo"><img class="gloool"
                                                src="{{ url('') }}/img/goolge_sm.png" alt="" />Google</a>
                                        <a href="{{ url('auth/facebook') }}" class="fblgoo"><img class="fboo"
                                                src="{{ url('') }}/img/face_bks.png" alt="" />Facebook</a>
                                    </div>
                                    <p class="clr">By signing up, you agree to our<a href="javascript:void(0);"> Terms of Use</a> and <a href="javascript:void(0);">Privacy Policy</a>.
                                        <span class="lgonowws">You dont have an account yet? <a href="{{ url('register') }}">Register now</a></span>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script type="text/javascript">
    function validateb11() {
        var email = document.f4.email.value;
        var password = document.f4.password.value;
        // var emailRegx =
        //     /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var status = true;
        $('.err').html('');
        if (email == "") {
            document.getElementById("email").innerHTML = " Please enter email";
            status = false;
        } 
        // else if (emailRegx.test(String(email).toLowerCase()) == false) {
        //     document.getElementById("email").innerHTML = "Please enter valid email address";
        //     status = false;
        // }
        if (password == "") {
            document.getElementById("password").innerHTML = " Please enter password";
            status = false;
        }
        return status;
    }
    
    // password show hide functionality
    // window.addEventListener("DOMContentLoaded", function () {
    //   const togglePassword = document.querySelector("#togglePassword");
    
    //   togglePassword.addEventListener("click", function (e) {
    //     // toggle the type attribute
    //     const type =
    //       password.getAttribute("type") === "password" ? "text" : "password";
    //     password.setAttribute("type", type);
    //     // toggle the eye / eye slash icon
    //     this.classList.toggle("bi-eye");
    //   });
    // });
    </script>
    </body>
    @include('front.layouts.footer_new')