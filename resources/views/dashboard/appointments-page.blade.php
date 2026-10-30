@include('front.layouts.user-header')
<style>
.bookingwrapper {
    display: inline-block;
    max-width: 100%;
    margin: auto;
    background: #fff;
    padding: 0px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
	overflow:hidden;
	width:100%;
}
.bookingwrapper .bk_bothhhs {
    display: flex;
    gap: 25px;
    padding: 15px 15px 0px;
}

.bookingwrapper .left-box {
    width:50%;
}

.bookingwrapper .profile {
        display: flex;
    gap: 10px;
    align-items: flex-start;
    margin-bottom: 15px;
}

.bookingwrapper .profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.bookingwrapper .profile h3 {
    font-size: 14px;
    font-weight: 600;
    margin: 0;
}

.bookingwrapper .review {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 5px;
}

.bookingwrapper .stars svg {
    width: 12px;
    height: 12px;
    fill: #ffb400;
}
.bookingwrapper .review small {
    font-size: 12px;
}

.bookingwrapper .review-btn {
    background: #1f6bff;
    color: #fff;
    padding: 2px 5px;
    border-radius: 3px;
    text-decoration: none;
    font-size:11px;
    text-wrap-mode: nowrap;
    font-weight: 600;
}

.bookingwrapper .content {
    font-size: 11px;
    line-height: 16px;
    color: #444;
    margin: 0;
	min-height: auto;
}
.bookingwrapper .left-box .contentss {
        font-size: 13px;
    line-height: 20px;
    color: #444;
    margin: 0;
}
.bookingwrapper .left-box .contentss span.moreText p {
    font-size: 11px;
    line-height: 16px;
    margin: 0 0 10px;
}
.bookingwrapper .left-box .contentss span.moreText p:last-child {
    margin: 0px;
}


.bookingwrapper .moreText {
    display: none;
}

.bookingwrapper .showBtn {
    display: inline-block;
    margin-top: 5px;
    font-size: 13px;
    color: #111;
    font-weight: 700;
    cursor: pointer;
    text-decoration: underline;
    text-transform: capitalize;
}

.bookingwrapper .right-box {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.bookingwrapper .card {
    background: #fff;
    padding: 0;
    border-radius: 0;
    box-shadow: none;
	margin:0px;
	border:none
}
.bookingwrapper .card:last-child {
	margin:0;
}

.bookingwrapper .card h4 {
    font-size: 14px;
    margin-bottom: 5px;
    font-weight: 600;
}

.bookingwrapper .desc {
    font-size: 13px;
    color: #666;
    line-height: 14px;
    margin: 0 0 4px;
}
.bookingwrapper .desc span.more {
    padding: 0;
}

.bookingwrapper .more {
    display: none;
}

.bookingwrapper .readMore {
    color: #d80000;
    font-size: 13px;
    cursor: pointer;
    font-weight: 600;
    text-transform: capitalize;
}

.bookingwrapper .bottom {
    margin-top:8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.bookingwrapper .time {
        display: flex;
    align-items: center;
    gap: 3px;
    font-size: 11px;
}

.bookingwrapper .time svg {
    width: 14px;
    height: 14px;
    stroke: #555;
    fill: none;
    stroke-width: 2;
}

.bookingwrapper .details {
       background: #e32020;
    color: #fff;
    padding: 3px 6px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 2px;
    font-size: 11px;
    font-weight: 600;
}

.bookingwrapper .details svg {
    width: 13px;
    height: 13px;
    stroke: #fff;
    fill: none;
    stroke-width: 2;
}



.bookingwrapper .left-box .testimonial-section{padding: 14px 0px; background: #111; margin-top: 20px;}
.bookingwrapper .left-box .testimonial-section .container{max-width:100%;  width:100%; margin:auto;}
.bookingwrapper .left-box .testimonial-section .title{color:#fff; text-align:center; font-size:15px; font-weight:bold; margin:0;}
.bookingwrapper .left-box .testimonial-section .subtitle{color: #e9e9e9; text-align: center; margin-top: 5px; font-size: 12px; margin-bottom: 10px; line-height: 20px;}

/* Rating Box */
.bookingwrapper .left-box .testimonial-section .rating-box{max-width:100%; margin:0 auto 5px; background:#fff; border-radius:4px; padding:5px 10px; display:flex;
    justify-content: space-between; align-items: center;}

.bookingwrapper .left-box .testimonial-section .google{display:flex; align-items:center; gap:6px;}
.bookingwrapper .left-box .testimonial-section .google svg{width:16px;}
.bookingwrapper .left-box .testimonial-section .google strong {font-size: 12px;}

.bookingwrapper .left-box .testimonial-section .stars{display:flex; gap:2px;}
.bookingwrapper .left-box .testimonial-section .stars svg{width:15px; fill:#FFC107;}

.bookingwrapper .left-box .testimonial-section .review-btn{background:#ff9800; color:#fff; text-decoration:none; padding:6px 8px; border-radius:20px; font-size:7px; font-weight: bold;}

/* Card */

.bookingwrapper .left-box .testimonial-section .item{padding:0px;}
.bookingwrapper .left-box .testimonial-section .card{background: #1c1c1c; color: #fff; border-radius: 5px; padding: 15px; min-height: 160px; border:none;}
.bookingwrapper .left-box .testimonial-section .user{display:flex; align-items:center; gap:12px; margin-bottom:15px;}
.bookingwrapper .left-box .testimonial-section .user img{width:40px; height:40px; border-radius:50%;}
.bookingwrapper .left-box .testimonial-section .user h4 {font-size: 13px; color: #fff; margin: 0;}
.bookingwrapper .left-box .testimonial-section .user span{color:#aaa; font-size:11px;}
.bookingwrapper .left-box .testimonial-section .review{display: flex; margin: 0px 0 5px; gap: 2px; color: #f1a73a;}
.bookingwrapper .left-box .testimonial-section .review svg{width:15px; fill:#FFC107;}
.bookingwrapper .left-box .testimonial-section .card p{color: #ddd; line-height: 14px; font-size: 10px; margin: 0;}
.bookingwrapper .left-box .testimonial-section .card a{color: #ff9800; text-decoration: none; display: inline-block; margin-top: 7px; font-size:12px;}

/* Owl */
.bookingwrapper .left-box .testimonial-section .owl-nav{margin-top:10px !important;}
.bookingwrapper .left-box .testimonial-section .owl-prev,
.bookingwrapper .left-box .testimonial-section .owl-next{width:42px; height:42px; border-radius:50%!important; background:#ff9800!important; color:#fff!important;
    font-size:22px!important;}

.bookingwrapper .left-box .testimonial-section .owl-dots{margin-top:25px;}
.bookingwrapper .left-box .testimonial-section .owl-dot span{background:#555!important;}
.bookingwrapper .left-box .testimonial-section .owl-dot.active span{background:#ff9800!important;}
.bookingwrapper .left-box .testimonial-section .container .owl-stage-outer .owl-item.active {padding: 0;}
.bookingwrapper .left-box .testimonial-section .container .owl-stage-outer .owl-item.active .item {padding: 0;}





.bookingwrapper .left-box .testimonial-section1{padding: 7px 0px 0; background: #111; margin-bottom: 20px;}
.bookingwrapper .left-box .testimonial-section1 .container{max-width:100%;  width:100%; margin:auto;}
.bookingwrapper .left-box .testimonial-section1 .title{color:#fff; text-align:left; font-size:13px; font-weight:bold; margin:0;}
.bookingwrapper .left-box .testimonial-section1 .subtitle{color: #e9e9e9; text-align: left; margin-top:0px; font-size:10px; margin-bottom: 10px; line-height: 20px;}

/* Rating Box */
.bookingwrapper .left-box .testimonial-section1 .rating-box{max-width:100%; margin:0 auto 5px; background:#fff; border-radius:4px; padding:5px 10px; display:flex;
    justify-content: space-between; align-items: center;}

.bookingwrapper .left-box .testimonial-section1 .google{display:flex; align-items:center; gap:6px;}
.bookingwrapper .left-box .testimonial-section1 .google svg{width:16px;}
.bookingwrapper .left-box .testimonial-section1 .google strong {font-size: 12px;}

.bookingwrapper .left-box .testimonial-section1 .stars{display:flex; gap:2px;}
.bookingwrapper .left-box .testimonial-section1 .stars svg{width:15px; fill:#FFC107;}

.bookingwrapper .left-box .testimonial-section1 .review-btn{background:#ff9800; color:#fff; text-decoration:none; padding:6px 8px; border-radius:20px; font-size:7px; font-weight: bold;}

/* Card */

.bookingwrapper .left-box .testimonial-section1 .item{padding:5px 0px;}
.bookingwrapper .left-box .testimonial-section1 .card{background: #1c1c1c; color: #fff; border-radius: 5px; padding: 15px; min-height: 140px; border:none;}
.bookingwrapper .left-box .testimonial-section1 .user{display:flex; align-items:center; gap:12px; margin-bottom:7px;}
.bookingwrapper .left-box .testimonial-section1 .user img{width:30px; height:30px; border-radius:50%;}
.bookingwrapper .left-box .testimonial-section1 .user h4 {font-size: 13px; color: #fff; margin: 0;}
.bookingwrapper .left-box .testimonial-section1 .user span{color:#aaa; font-size:11px;}
.bookingwrapper .left-box .testimonial-section1 .review{display: flex; margin: 0px 0 5px; gap: 2px; color: #f1a73a;}
.bookingwrapper .left-box .testimonial-section1 .review svg{width:15px; fill:#FFC107;}
.bookingwrapper .left-box .testimonial-section1 .card p{color: #ddd; line-height: 14px; font-size: 10px; margin: 0;}
.bookingwrapper .left-box .testimonial-section1 .card a{color: #ff9800; text-decoration: none; display: inline-block; margin-top: 7px; font-size:12px;}

/* Owl */
.bookingwrapper .left-box .testimonial-section1 .owl-nav{margin-top:10px !important;}
.bookingwrapper .left-box .testimonial-section1 .owl-prev,
.bookingwrapper .left-box .testimonial-section1 .owl-next{width:42px; height:42px; border-radius:50%!important; background:#ff9800!important; color:#fff!important;
    font-size:22px!important;}

.bookingwrapper .left-box .testimonial-section1 .owl-dots{margin-top:25px;}
.bookingwrapper .left-box .testimonial-section1 .owl-dot span{background:#555!important;}
.bookingwrapper .left-box .testimonial-section1 .owl-dot.active span{background:#ff9800!important;}
.bookingwrapper .left-box .testimonial-section1 .container .owl-stage-outer .owl-item.active {padding: 0;}
.bookingwrapper .left-box .testimonial-section1 .container .owl-stage-outer .owl-item.active .item {padding: 0;}




.bookingwrapper .right-box .service-slider {width:605px; position: relative; overflow: hidden; background: #fff; border: #e6e6e6 solid 1px; margin-top: 6px;
    padding:0px; height: 248px;}
.bookingwrapper .right-box .service-slider .owl-stage-outer .owl-item.active {padding: 0px;}
.bookingwrapper .right-box .service-slider .owl-stage-outer .owl-stage .owl-item.cloned {padding: 0;}
.bookingwrapper .right-box .service-slider .item {background: #fff; border: none; padding:0px 10px; text-align: center;}
.bookingwrapper .right-box .service-slider .item .speaker-card .usr_mges {width:60px; height: 60px; margin: 0 auto; border-radius: 100px; overflow: hidden; margin-top:15px; margin-bottom: 10px;}
.bookingwrapper .right-box .service-slider .item .speaker-card h3 {margin:0 0 2px; font-size: 16px; font-weight: 600;  color: #000;}
.bookingwrapper .right-box .service-slider .item .speaker-card span {color: #818181; font-weight: 400; font-size:13px;}
.bookingwrapper .right-box .service-slider .item .speaker-card p {color: #333; font-size: 12px; line-height: 14px; margin: 6px 0 0;}
.bookingwrapper .right-box .service-slider .item .speaker-card a.watch-btn {font-size: 12px; display: flex; align-items: center; justify-content: center; gap: 8px;
    background: #4c9c15; color: #fff; text-decoration: none; padding: 9px; margin-top: 20px; font-weight: 600; border-radius: 2px;}
.bookingwrapper .right-box .service-slider .item .speaker-card a.watch-btn svg {width: 14px; height: 14px; fill: #fff;}
/* Navigation */
.bookingwrapper .right-box .service-slider .owl-nav {display: flex; justify-content: space-between; position: absolute; top: 50%; left: 0; width: 100%; transform: translateY(-50%); pointer-events: none;}

.bookingwrapper .right-box .service-slider .owl-nav button {width:20px; height:20px; border-radius:50% !important; background:#1a4f96 !important; color: #fff !important; pointer-events:all;}
.bookingwrapper .right-box .service-slider .owl-nav button span {font-size: 18px; line-height: 1;}
.bookingwrapper .right-box .service-slider .owl-nav button:hover {background: #333 !important;}

/* Dots */
.bookingwrapper .right-box .service-slider .owl-dots {display:none !important;}



.bookingwrapper .right-box .service-slider1 {max-width: 100%; position: relative; overflow: hidden; background: #fff; width: 100%; border: #e6e6e6 solid 1px; margin-top:0px;
    padding:0px; height: 190px;}
.bookingwrapper .right-box .service-slider1 .owl-stage-outer .owl-item.active {padding: 0px;}
.bookingwrapper .right-box .service-slider1 .owl-stage-outer .owl-stage .owl-item.cloned {padding: 0;}
.bookingwrapper .right-box .service-slider1 .item {background: #fff; border: none; padding:0px 10px; text-align: center;}
.bookingwrapper .right-box .service-slider1 .item .speaker-card .usr_mges {width:40px; height:40px; margin:0 auto; border-radius:100px; overflow:hidden; margin-top:15px; margin-bottom:10px;}
.bookingwrapper .right-box .service-slider1 .item .speaker-card h3 {margin:0px; font-size: 14px; font-weight: 600; color:#000;}
.bookingwrapper .right-box .service-slider1 .item .speaker-card span {color: #818181; font-weight: 400; font-size:12px;}
.bookingwrapper .right-box .service-slider1 .item .speaker-card p {color: #333; font-size: 12px; line-height: 14px; margin:3px 0 0;}
.bookingwrapper .right-box .service-slider1 .item .speaker-card a.watch-btn {display: flex; align-items: center; justify-content: center; gap: 8px; background: #4c9c15;
    color: #fff; text-decoration: none; padding: 8px; margin-top: 10px; font-weight: 600; border-radius: 2px; font-size: 12px;}
.bookingwrapper .right-box .service-slider1 .item .speaker-card a.watch-btn svg {width: 14px; height: 14px; fill: #fff;}
/* Navigation */
.bookingwrapper .right-box .service-slider1 .owl-nav {display: flex; justify-content: space-between; position: absolute; top: 50%; left: 0; width: 100%; transform: translateY(-50%); pointer-events: none;}

.bookingwrapper .right-box .service-slider1 .owl-nav button {width:20px; height:20px; border-radius:50% !important; background:#1a4f96 !important; color: #fff !important; pointer-events:all;}
.bookingwrapper .right-box .service-slider1 .owl-nav button span {font-size: 18px; line-height: 1;}
.bookingwrapper .right-box .service-slider1 .owl-nav button:hover {background: #333 !important;}

/* Dots */
.bookingwrapper .right-box .service-slider1 .owl-dots {display:none !important;}



.ftr_content.text-center {
    background: #000 !important;
    padding: 20px 0;
    text-align: center;
	margin-top:20px;
}
.ftr_content.text-center .lgo {
    width: 50px;
    height: 50px;
    overflow: hidden;
    margin: 0 auto;
}
.ftr_content.text-center .lgo a {
    display: block;
}
.ftr_content.text-center .lgo a img.logo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.ftr_content.text-center .menu_ftrr {
    color: #fff;
    font-size: 13px;
    margin: 14px 0 0;
}
.ftr_content.text-center .crt_arar.mt-2 a button.btn {
    font-size: 12px;
}
.ftr_content.text-center .crt_arar.mt-2 {
    margin-top: 10px !important;
}
.ftr_content.text-center .crt_arar.mt-2 button.btn.waves-effect.waves-light {
    padding: 10px 12px;
    font-size: 12px;
    font-weight: 500;
}



@media (min-width: 320px) and (max-width: 767px) {
 .bookingwrapper .right-box .service-slider {width: 305px;}
 .bookingwrapper .left-box {width: 100%;}
 .bookingwrapper .bk_bothhhs {display:block;}
}

</style>
 



<section class="dash_board_pages user_alllpgs">
    <div class="container">
	    <div class="bookingwrapper">
				    <div class="bk_bothhhs">
					<div class="left-box">
						<div class="profile">
							<img src="https://i.pravatar.cc/60" alt="" />

							<div>
								<h3>Ramjee | Smile India 1CR APP</h3>

								<div class="review">
									<div class="stars">
										<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>

										<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>

										<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>

										<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>

										<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>
									</div>

									<small>3 reviews</small>

									<a href="#" class="review-btn">View reviews</a>
								</div>
							</div>
						</div>

						<div class="contentss">
							Book a FREE NO OBLIGATION Call with me to unlock the true potential of Real Estate.

							<span class="dots">...</span>

							<span class="moreText">
								<p>For Working Professional we have Tools (1CR APP), Training, Tips & Tricks.</p>
							
								<p>You know, There is a lot that needs to be done before you even begin to think about putting your money
								in real estate.</p>
								
								<p>As I have a strong real estate family background and years of investing experience, I would love to
								share it with you.</p>
								
								<p>For Working Professional we have Tools (1CR APP), Training, Tips & Tricks.</p>
							
								<p>You know, There is a lot that needs to be done before you even begin to think about putting your money
								in real estate.</p>
								
								<p>As I have a strong real estate family background and years of investing experience, I would love to
								share it with you.</p>
							</span>
						</div>

						<div class="showBtn">Show more</div>
						
						
						
						<div class="testimonial-section">
							<div class="container">
								<h2 class="title">What Our 1CR Employees Says...</h2>
								<p class="subtitle">Know Why They Love Our Powerful Tools</p>

								<div class="rating-box">
									<div class="google">
										<!-- Google SVG -->

										<svg viewBox="0 0 48 48">
											<path
												fill="#FFC107"
												d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.3 36 24 36c-6.6 0-12-5.4-12-12S17.4 12 24 12c3 0 5.8 1.1 7.9 3l5.7-5.7C34.1 6.1 29.3 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.4-.4-3.5z"
											/>
										</svg>

										<strong>5.0</strong>

										<div class="stars">
											<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>
											<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>
											<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>
											<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>
											<svg viewBox="0 0 24 24"><path d="M12 2l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" /></svg>
										</div>
									</div>

									<a href="#" class="review-btn">WRITE A REVIEW</a>
								</div>

								<div class="owl-carousel testimonial-slider">
									<div class="item">
										<div class="card">
											<div class="user">
												<img src="https://i.pravatar.cc/60?img=12" />
												<div>
													<h4>Rajesh Kumar</h4>
													<span>Investor</span>
												</div>
											</div>

											<div class="review">★★★★★</div>

											<p>1CR APP changed my business completely. Amazing training and support from team.</p>

											<a href="#">Read More</a>
										</div>
									</div>

									<div class="item">
										<div class="card">
											<div class="user">
												<img src="https://i.pravatar.cc/60?img=22" />
												<div>
													<h4>Arvind Sharma</h4>
													<span>Business</span>
												</div>
											</div>

											<div class="review">★★★★★</div>

											<p>Excellent investment strategies and easy to understand tools.</p>

											<a href="#">Read More</a>
										</div>
									</div>

									<div class="item">
										<div class="card">
											<div class="user">
												<img src="https://i.pravatar.cc/60?img=42" />
												<div>
													<h4>Neeraj Patel</h4>
													<span>Investor</span>
												</div>
											</div>

											<div class="review">★★★★★</div>

											<p>Highly recommended for anyone looking to grow wealth.</p>

											<a href="#">Read More</a>
										</div>
									</div>

									<div class="item">
										<div class="card">
											<div class="user">
												<img src="https://i.pravatar.cc/60?img=18" />
												<div>
													<h4>Pankaj</h4>
													<span>Developer</span>
												</div>
											</div>

											<div class="review">★★★★★</div>

											<p>Professional support and wonderful learning experience.</p>

											<a href="#">Read More</a>
										</div>
									</div>
								</div>
							
							</div>
						</div>				
						
					</div>

					<div class="right-box">
						<div class="card">
							<h4>Meeting With Ramjee - 1CR Super Investor-2</h4>

							<p class="desc">
								Dear Investor, know how difficult it is...

								<span class="more"> Different and unknown agents and builders who just seem behind your money. </span>
							</p>

							<div class="readMore">Read more</div>

							<div class="bottom">
								<div class="time">
									<svg viewBox="0 0 24 24">
										<circle cx="12" cy="12" r="9" />
										<path d="M12 7v6l4 2" />
									</svg>

									30 minutes
								</div>

								<button class="details">
									View details

									<svg viewBox="0 0 24 24">
										<path d="M9 18l6-6-6-6" />
									</svg>
								</button>
							</div>
						</div>

						<div class="card">
							<h4>Meeting With Ramjee Founder-1CR APP</h4>

							<p class="desc">
								Welcome to our demo meeting.

								<span class="more"> We are excited to introduce our latest investment system. </span>
							</p>

							<div class="readMore">Read more</div>

							<div class="bottom">
								<div class="time">
									<svg viewBox="0 0 24 24">
										<circle cx="12" cy="12" r="9" />
										<path d="M12 7v6l4 2" />
									</svg>

									30 minutes
								</div>

								<button class="details">
									View details

									<svg viewBox="0 0 24 24">
										<path d="M9 18l6-6-6-6" />
									</svg>
								</button>
							</div>
						</div>
					
					    
						
						<div class="owl-carousel service-slider">
									<div class="item">
										<div class="speaker-card">
											<div class="usr_mges"><img src="https://i.pravatar.cc/120?img=12"></div>
											<h3>GANESH ASSOCIATE</h3>
											<span>Founder & CEO</span>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
											</p>

											<a href="#" class="watch-btn">
												<svg viewBox="0 0 24 24">
													<path d="M8 5v14l11-7z"/>
												</svg>
												WATCH NOW
											</a>
										</div>
									</div>

									<div class="item">
										<div class="speaker-card">
											<div class="usr_mges"><img src="https://i.pravatar.cc/120?img=22"></div>
											<h3>Mr. Kapil Dev</h3>
											<span>Director</span>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
											</p>
											<a href="#" class="watch-btn">
												<svg viewBox="0 0 24 24">
													<path d="M8 5v14l11-7z"/>
												</svg>
												WATCH NOW
											</a>
										</div>
									</div>

									<div class="item">
										<div class="speaker-card">
											<div class="usr_mges"><img src="https://i.pravatar.cc/120?img=32"></div>
											<h3>Mr. Kapil Jain</h3>
											<span>Managing Director</span>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
											</p>
											<a href="#" class="watch-btn">
												<svg viewBox="0 0 24 24">
													<path d="M8 5v14l11-7z"/>
												</svg>
												WATCH NOW
											</a>
										</div>
									</div>

									<div class="item">
										<div class="speaker-card">
											<div class="usr_mges"><img src="https://i.pravatar.cc/120?img=42"></div>
											<h3>John Smith</h3>
											<span>Developer</span>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
											</p>
											<a href="#" class="watch-btn">
												<svg viewBox="0 0 24 24">
													<path d="M8 5v14l11-7z"/>
												</svg>
												WATCH NOW
											</a>
										</div>
									</div>
								</div>
					</div>
				    </div>
				    
					<div class="ftr_content text-center">
				     <div class="lgo">
					  <a href="https://kapil.1crapp.com"><img class="logo" src="https://admin.1crapp.com/img/1779197054895525347.png" alt="Logo"></a>
					 </div>
					
					 <div class="menu_ftrr">
					  Fastest-Simple Yet Powerful Tool for Indian Realtors Business Automation.
					 </div>
					 <div class="crt_arar mt-2">
					  <a href="https://1crapp.com/register" target="_blank"><button class="btn " style="background-color:#ed0c2e; color:#ffffff;">Try 1CRAPP Now For Free !</button></a>
					 </div>
				    </div>			
					
					<!---<div class="master-card">
						<div class="top-row">
							<div class="title">
								<div class="blue-dot"></div>
								<span>Classic Master Page</span>
							</div>
							<div class="edit-btn">
								<svg width="20" height="20" fill="none" stroke="#444" stroke-width="2" viewBox="0 0 24 24">
									<path d="M12 20h9"/>
									<path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4 12.5-12.5z"/>
								</svg>
							</div>
						</div>

						<div class="bottom-row">
							<span class="status">Enabled</span>
							<label class="switchss">
								<input type="checkbox" checked>
								<span class="slider"></span>
							</label>
						</div>
					</div>--->			   
				   </div>			   				   
				 
    </div>
</section>


<!---- Help ---->	
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
$(function () {

    $(".contentss").each(function () {

        var limit = 80;

        var text = $(this).text().trim();
        var words = text.split(/\s+/);

        if (words.length > limit) {

            var first = words.slice(0, limit).join(" ");
            var rest = words.slice(limit).join(" ");

            var paragraphs = "<p>" + rest + "</p>";

            $(this).html(
                first +
                '<span class="dots">...</span>' +
                '<span class="moreText" style="display:none;">' +
                    paragraphs +
                '</span>'
            );

            $(this).next(".showBtn").show();

        } else {
            $(this).next(".showBtn").hide();
        }

    });

    $(".showBtn").click(function () {

        var content = $(this).prev(".contentss");

        content.find(".moreText").slideToggle();
        content.find(".dots").toggle();

        $(this).text($(this).text() == "Show more" ? "Show less" : "Show more");

    });

});

</script>
<script>
$(document).ready(function(){

    // First Owl
    $('.testimonial-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 2,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			1024:{
				items:2
			}
		}
    });
	
	
	
	
	
	$('.testimonial-slider1').owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		dots: false,
		autoplay: true,
		autoplayTimeout: 3000,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			1024:{
				items:2
			}
		}
	});
	

    // Second Owl
    $('.service-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        autoplay: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:2
            }
        }
    });


    // Second Owl
    $('.service-slider1').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        autoplay: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:2
            }
        }
    });

});
</script>



<script>

$(function(){

    $(".switchss input").change(function(){

        if($(this).is(":checked")){
            $(".status").text("Enabled");
        }else{
            $(".status").text("Disabled");
        }

    });

});

</script>
	
@include('front.layouts.footer')
