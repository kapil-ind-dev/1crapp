<!--// post login-->
@if($cms->custom_header == 1)
    @include('front.custom-layout.header')
@else
    @include('front.layouts.user-header')
@endif
<body>
    <div class="page">
@php
function rating($num)
{
    $num = (int) $num;
    if ($num < 0) {
        $num=0;
    }
    if ($num> 5) {
        $num = 5;
    }
    return str_repeat('★', $num) . str_repeat('☆', 5 - $num);
}
@endphp
            <section class="hero">
                <div class="intro">
                    <div class="kicker">👋 LET'S CONNECT</div>
                    <h1>Hi, I'm <span>{{ $agent->first_name }} {{ $agent->last_name }}</span></h1>
                    <div class="role">Founder, {{ $agent->custom_domain??$agent->subdomain }}</div>
                    <div class="meta">
                        <div>🏢 <strong>{{ $cms->sub_title }}</strong></div>
                        <div>⭐ <strong>{{ number_format($averageRating, 1) }}</strong> ({{ $totalReview}} Reviews)</div>
                    </div>
                    <div class="intro-copy">{{ $cms->description }}</div>
                    <div class="quote">“{{ $cms->quotes }}”<b>— {{ $agent->first_name }} {{ $agent->last_name }}</b></div>
                </div>

                <div>
                    <div class="meetings-head">
                        <h2>📅 Book a Meeting</h2>
                        <p>Choose a conversation that works for you.</p>
                    </div>
                    <div class="meeting-list">
                        @foreach($list as $meeting)
                        <div class="meeting">
                            <div class="micon">🎥</div>
                            <div>
                                <h3>{{ $meeting->title }}</h3>
                                <p>{!! \Str::limit($meeting->content, 50) !!}</p>
                                <div class="mtime">◷ {{ $meeting->duration }} Min</div>
                            </div>
                            <a href="{{ route('master-booking', $meeting->page_slug) }}" class="book" style="text-decoration: underline;" target="_blank">Book Now →</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="note">💡 <strong>Not sure which one to choose?</strong> Book a General Discussion and we'll figure it out together.</div>
                </div>
            </section>

            @if(isset($cms) && $cms->features->isNotEmpty())
            <section class="benefits">
                @foreach($cms->features as $index => $feature)
                <div class="benefit">
                    <div class="bicon"><img src="{{ $feature->image }}" height="25" width="25"/></div><b>{{ $feature->title }}</b><span>{{ $feature->sub_title }}</span>
                </div>
                @endforeach
            </section>
            @endif

            <section class="lower">
                @if($cms->review_status == 1)
                <div class="panel">
                    <div class="panel-head">
                        <h2>⭐ What People Are Saying</h2>
                        <div class="score"><b>{{ number_format($averageRating, 1) }}</b> <span class="stars">★★★★★</span><br><small>{{ $totalReview}} Reviews</small></div>
                    </div>
                    @foreach($reviews as $review)
                    <div class="review">
                        <div class="person">
                            <div class="avatar">{{ strtoupper(substr($review->name, 0, 1)) }}</div>
                            <div><b>{{ $review->name }}</b><small>{{ $review->designation }}</small></div>
                        </div>
                        <div class="review-text">{{ Str::words($review->review, 10) }}</div>
                    </div>
                    @endforeach
                    <!-- <div class="review"><div class="person"><div class="avatar" style="background:#159447">N</div><div><b>Neha Singh</b><small>Investor</small></div></div><div class="review-text">Clear insights and genuine guidance. Loved the session!</div></div>
                        <div class="review"><div class="person"><div class="avatar" style="background:#7b4db8">A</div><div><b>Amit Sharma</b><small>Channel Partner</small></div></div><div class="review-text">Great discussion! Ramjee understands the real estate market very well.</div></div> -->
                    <button class="view-all" onclick="document.getElementById('reviewsModal').style.display='flex'">View all reviews →</button>
                </div>
                @endif
                
                @if($cms->testimonial_status == 1)
                @foreach($testimonials as $testimo)
                <div class="panel video">
				   <!---
                    <div class="video-box">
                        <div class="play"><video src="{{ $testimo->video }}"></video></div>
                    </div>
                    <h3>{{ $testimo->name }}</h3>
                    <p>{{ $testimo->designation }}</p>
                    <a href="{{ $testimo->video }}" target="_blank"><button class="video-btn">▶ Watch Testimonial</button></a>
					--->	

					<div class="owl-carousel owl-theme my-carousel">
						<div class="item">
							<div class="preview">
							<div class="preview-photo">R</div>
							<div class="preview-name">Ramjee Meena</div>
							<div class="preview-line">Chief Manager, Electrical</div>
							<div class="preview-line preview-org">Indian Oil Corporation Ltd.</div>
							<div class="preview-line preview-location">⌖ Panipat, Haryana</div>
							<div class="preview-stars">
								<span class="stars">★★★★★</span> <span style="font-size: 11px; color: #68758a">5.0 (28 Reviews)</span>
							</div>
							<div class="preview-review">
								“1CR App has completely transformed the way I manage my real estate leads and client interactions. It's simple,
								powerful and highly effective.”
							</div>
							<div class="preview-date">▣ 3 Sep 2026</div>
							<div class="preview-phone">⌕ &nbsp; +91 98765 43210</div>
							<button class="video-btn openYoutube">▶ WATCH VIDEO</button>
							<div class="cta-buttons">
								<button>💬 WhatsApp</button><button>☎ Call Now</button><button>📅 Book a Call</button>
							</div>
						</div>
						</div>
						
						<div class="item">
							<div class="preview">
							<div class="preview-photo">R</div>
							<div class="preview-name">Ramjee Meena</div>
							<div class="preview-line">Chief Manager, Electrical</div>
							<div class="preview-line preview-org">Indian Oil Corporation Ltd.</div>
							<div class="preview-line preview-location">⌖ Panipat, Haryana</div>
							<div class="preview-stars">
								<span class="stars">★★★★★</span> <span style="font-size: 11px; color: #68758a">5.0 (28 Reviews)</span>
							</div>
							<div class="preview-review">
								“1CR App has completely transformed the way I manage my real estate leads and client interactions. It's simple,
								powerful and highly effective.”
							</div>
							<div class="preview-date">▣ 3 Sep 2026</div>
							<div class="preview-phone">⌕ &nbsp; +91 98765 43210</div>
							<button class="video-btn openYoutube">▶ WATCH VIDEO</button>
							<div class="cta-buttons">
								<button>💬 WhatsApp</button><button>☎ Call Now</button><button>📅 Book a Call</button>
							</div>
						</div>
						</div>

						<div class="item">
							<div class="preview">
							<div class="preview-photo">R</div>
							<div class="preview-name">Ramjee Meena</div>
							<div class="preview-line">Chief Manager, Electrical</div>
							<div class="preview-line preview-org">Indian Oil Corporation Ltd.</div>
							<div class="preview-line preview-location">⌖ Panipat, Haryana</div>
							<div class="preview-stars">
								<span class="stars">★★★★★</span> <span style="font-size: 11px; color: #68758a">5.0 (28 Reviews)</span>
							</div>
							<div class="preview-review">
								“1CR App has completely transformed the way I manage my real estate leads and client interactions. It's simple,
								powerful and highly effective.”
							</div>
							<div class="preview-date">▣ 3 Sep 2026</div>
							<div class="preview-phone">⌕ &nbsp; +91 98765 43210</div>
							<button class="video-btn openYoutube">▶ WATCH VIDEO</button>
							<div class="cta-buttons">
								<button>💬 WhatsApp</button><button>☎ Call Now</button><button>📅 Book a Call</button>
							</div>
						</div>
						</div>
					</div>					
					 
					
					
					
					
					
                    <div class="proof">
                        <div><strong>👥 100+ Realtors have already booked a call!</strong><span>Join them and take your real estate business to the next level.</span></div>
                        <div class="people">
                            <div class="avatar">R</div>
                            <div class="avatar" style="background:#159447">A</div>
                            <div class="avatar" style="background:#7b4db8">S</div>
                            <div class="avatar" style="background:#526175">+97</div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </section>

            <!-- <section class="cta">
                <div class="cta-brand">
                    <div class="logo">1CR</div>
                    <div>
                        <h2>Ready to Grow Your Real Estate Business?</h2>
                        <p>Get the right guidance, tools and strategies with 1CR APP.</p>
                    </div>
                </div><button onclick="alert('Connect this button to your 1CR APP signup page.')">Try 1CR APP Now →</button>
            </section> -->
            <div class="footer">🛡 Trusted by 1000+ Users &nbsp; • &nbsp; 🔒 Secure & Confidential &nbsp; • &nbsp; ♥ Focused on Your Growth<br><br>Powered by 1CR APP</div>
    </div>

    <!-- <div class="overlay" id="bookingModal">
        <div class="modal">
            <div class="modal-head">
                <h2>Complete Your Booking</h2><button class="close" onclick="closeModal('bookingModal')">×</button>
            </div>
            <div class="summary"><b id="bookingTitle">Meeting</b><br>◷ <span id="bookingDuration">30 minutes</span><br><br>After clicking Continue, your actual 1CR APP calendar/booking flow should open here.</div>
            <div class="form-grid">
                <div class="field"><label>Full Name *</label><input placeholder="Enter your name"></div>
                <div class="field"><label>Email *</label><input type="email" placeholder="Enter your email"></div>
                <div class="field"><label>Phone / WhatsApp</label><input placeholder="+91 98765 43210"></div>
                <div class="field"><label>Company / Organisation</label><input placeholder="Company name"></div>
            </div>
            <div class="field"><label>Anything you would like to discuss?</label><textarea placeholder="Optional"></textarea></div>
            <button class="confirm" onclick="alert('Connect this button to your actual 1CR APP calendar booking flow.')">Continue to Calendar →</button>
        </div>
    </div> -->

    <div class="overlay" id="reviewsModal">
        <div class="modal">
            <div class="modal-head">
                <h2>⭐ All Reviews</h2><button class="close" onclick="closeModal('reviewsModal')">×</button>
            </div>
            <div style="font-size:13px;margin:12px 0"><b>{{ number_format($averageRating, 1) }}</b> <span class="stars">★★★★★</span> ({{ $totalReview}} Reviews)</div>						<div class="scrol_listtt">
            @foreach($allreviews as $review)
            <div class="review"><b>{{ $review->name }}</b> <span class="stars">{{ rating($review->rating) }}</span>
                <div class="date">{{ date('M, Y', strtotime($review->created_at)) }}</div>
                <div class="review-text">{{ Str::words($review->review, 10) }}</div>
            </div>
            @endforeach			</div>
        </div>
    </div>







 <!-- YouTube Modal -->
  <div class="youtube-modal" id="youtubeModal">
    <div class="youtube-modal-content">
      <button class="youtube-close" id="closeYoutube">&times;</button>
      <div class="youtube-video">
        <iframe
          id="youtubeIframe"
          src=""
          title="YouTube video"
          allow="autoplay; encrypted-media"
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Owl Carousel CSS -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



<script>
    const openYoutube = document.querySelectorAll(".openYoutube");
	const closeYoutube = document.getElementById("closeYoutube");
	const youtubeModal = document.getElementById("youtubeModal");
	const youtubeIframe = document.getElementById("youtubeIframe");

	// YouTube video ID
	const videoId = "mJVuZiK9a6I";

	// Open modal
	openYoutube.forEach(function (button) {
	  button.addEventListener("click", function () {
		youtubeIframe.src =
		  "https://www.youtube.com/embed/" + videoId + "?autoplay=1";

		youtubeModal.classList.add("active");
	  });
	});

	// Close modal
	function closeModal() {
	  youtubeModal.classList.remove("active");
	  youtubeIframe.src = "";
	}

	closeYoutube.addEventListener("click", closeModal);

	// Close when clicking outside
	youtubeModal.addEventListener("click", function (event) {
	  if (event.target === youtubeModal) {
		closeModal();
	  }
	});

	// Close with ESC
	document.addEventListener("keydown", function (event) {
	  if (event.key === "Escape") {
		closeModal();
	  }
	});
</script>


<script>
$(document).ready(function () {

    $('.my-carousel').owlCarousel({

        loop: true,

        margin: 0,

        nav: false,

        dots: false,

        autoplay: true,

        autoplayTimeout: 3000,

        autoplayHoverPause: true,

        smartSpeed: 600,

        responsive: {

            0: {
                items: 1
            },

            576: {
                items: 1
            },

            768: {
                items: 1
            },

            992: {
                items: 1
            }
        }

    });

});
</script>

    <script>
        function openBooking(title, duration) {
            document.getElementById('bookingTitle').textContent = title;
            document.getElementById('bookingDuration').textContent = duration;
            document.getElementById('bookingModal').style.display = 'flex'
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none'
        }
        window.onclick = function(e) {
            if (e.target.classList.contains('overlay')) e.target.style.display = 'none'
        }
    </script>
	
@if($cms->custom_footer == 1)
    @include('front.custom-layout.footer')
@else
    @include('front.layouts.footer')
@endif
<script>
    $(document).ready(function(){
        $('.modal').css('disply', 'none');
    });
</script>



<style>
        * {
            box-sizing: border-box
        }
		
.youtube-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.youtube-modal.active {
    display: flex;
}

.youtube-modal-content {
    width: 90%;
    max-width: 900px;
    position: relative;
    background: #000;
}

.youtube-video {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    border: #ffffff solid 5px;
}

.youtube-video iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

.youtube-close {
    position: absolute;
    right: 0px;
    top: 0px;
    width: 36px;
    height: 36px;
    border: 0;
    border-radius: 50%;
    background: #fff;
    color: #000;
    font-size: 25px;
    cursor: pointer;
    z-index: 2;
}

@media (max-width: 600px) {
    .youtube-close {
        right: 0;
        top: -50px;
    }
}
		
		
.ftr_content.text-center .lgo img.logo {    margin: 0 auto;}
.overlay#reviewsModal .modal {    padding: 20px 15px;    margin: auto;    display: inline-block;    height: max-content;}.overlay#reviewsModal .modal .scrol_listtt {    max-height: 440px;    overflow: auto;}.overlay#reviewsModal .modal .scrol_listtt .review {    padding: 10px 0px;    border-top:#e3e3e3 solid 1px;    border-bottom:none;}.overlay#reviewsModal .modal .scrol_listtt .review:last-child {    padding-bottom: 0;}.overlay#reviewsModal .modal .modal-head button.close {    opacity: 1;}.overlay#reviewsModal .modal .scrol_listtt .review b {    font-size: 14px;}.overlay#reviewsModal .modal .scrol_listtt .review .date {    font-size: 12px;}.overlay#reviewsModal .modal .scrol_listtt .review .review-text {    margin-top: 3px;}

        .page {
            max-width: 1180px;
            margin: auto;
            padding: 28px 20px 0
        }

        .hero {
            display: grid;
            grid-template-columns: 44% 56%;
            gap: 34px;
            align-items: center;
            margin-bottom: 30px
        }

        .intro {
            padding: 20px 8px
        }

        .kicker {
            color: #1764d9;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px
        }

        .intro h1 {
            font-size: 26px;
			line-height: 1.08;
			margin: 0 0 8px;
			font-weight: 700;
        }

        .intro h1 span {
            color: #1764d9
        }
		
		a.book:hover {
			color: #fff;
		}

        .role {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 15px
        }

        .meta {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            color: #66758c;
            font-size: 13px;
            margin-bottom: 20px
        }

        .meta strong {
            color: #14213d
        }

        .intro-copy {
            font-size: 15px;
            line-height: 1.7;
            color: #53627a
        }

        .quote {
            margin-top: 20px;
            background: #eaf3ff;
            border-radius: 15px;
            padding: 19px 22px;
            font-size: 15px;
            line-height: 1.6
        }

        .quote b {
            display: block;
            margin-top: 8px;
            text-align: right;
            font-size: 13px
        }

        .meetings-head {
            margin-bottom: 14px
        }

        .meetings-head h2 {
            margin: 0;
            font-size: 23px
        }

        .meetings-head p {
            margin: 4px 0;
            color: #7a879a;
            font-size: 12px
        }

        .meeting-list {
            display: flex;
            flex-direction: column;
            gap: 12px
        }

        .meeting {
            background: #fff;
            border: 1px solid #e4e9f0;
            border-radius: 14px;
            padding: 18px;
            display: grid;
            grid-template-columns: 50px 1fr auto;
            gap: 15px;
            align-items: center;
            box-shadow: 0 4px 18px #14213d0d
        }

        .meeting:hover {
            transform: translateY(-2px)
        }

        .micon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            background: #edf5ff;
            color: #1764d9;
            display: grid;
            place-items: center;
            font-size: 23px
        }

        .meeting h3 {
            font-size: 16px;
            margin: 0 0 5px
        }

        .meeting p {
            margin: 0;
            color: #65738a;
            font-size: 12px;
            line-height: 1.5
        }

        .mtime {
            margin-top: 7px;
            font-size: 11px;
            color: #7c8899
        }

        .book {
            border: 0;
            background: #ed2024;
            color: #fff;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 12px;
            font-weight: 700
        }

        .book:hover {
            background: #d7191d
        }

        .note {
            margin-top: 12px;
            background: #f2f5f9;
            border-radius: 10px;
            padding: 12px 15px;
            color: #637188;
            font-size: 11px
        }

        .benefits {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin: 30px 0
        }

        .benefit {
            background: #fff;
            border: 1px solid #e6ebf1;
            border-radius: 13px;
            padding: 18px 12px;
            text-align: center
        }

        .bicon {
            width: 40px;
            height: 40px;
            margin: auto;
            background: #eef5ff;
            color: #1764d9;
            border-radius: 11px;
            display: grid;
            place-items: center;
            font-size: 20px
        }

        .benefit b {
            display: block;
            font-size: 12px;
            margin-top: 9px
        }

        .benefit span {
            display: block;
            color: #7b8798;
            font-size: 10px;
            margin-top: 4px
        }

        .lower {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px
        }

        .panel {
            background: #fff;
            border: 1px solid #e5eaf0;
            border-radius: 15px;
            overflow: hidden
        }

        .panel-head {
            padding: 18px 20px;
            border-bottom: 1px solid #edf0f4;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .panel-head h2 {
            font-size: 18px;
            margin: 0
        }

        .score {
            font-size: 13px
        }

        .stars {
            color: #f5a623;
            letter-spacing: 1px
        }

        .review {
            padding: 16px 20px;
            border-bottom: 1px solid #edf0f4
        }

        .person {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #24518c;
            color: #fff;
            font-weight: 700
        }

        .person b {
            font-size: 12px
        }

        .person small {
            display: block;
            color: #8994a5;
            font-size: 10px;
            margin-top: 2px
        }

        .review-text {
            font-size: 12px;
            color: #53627a;
            line-height: 1.55;
            margin-top: 9px
        }

        .view-all {
            width: 100%;
            padding: 13px;
            border: 0;
            background: #fff;
            color: #1764d9;
            font-size: 12px;
            font-weight: 700
        }

        .video {
            padding: 18px
        }

        .video-box {
            height: 205px;
            border-radius: 12px;
            background: linear-gradient(135deg, #26354e, #64748b);
            display: grid;
            place-items: center
        }

        .play {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: #fff;
            color: #1764d9;
            display: grid;
            place-items: center;
            font-size: 25px;
            padding-left: 4px
        }

        .video h3 {
            text-align: center;
            margin: 15px 0 6px;
            font-size: 19px
        }

        .video p {
            text-align: center;
            color: #718096;
            font-size: 12px;
            margin: 0 0 13px
        }

        .video-btn {
            display: block;
            margin: auto;
            background: #159447;
            color: #fff;
            border: 0;
            border-radius: 7px;
            padding: 11px 20px;
            font-weight: 700;
            font-size: 12px
        }

        .proof {
            margin-top: 18px;
            background: #fff8ec;
            border: 1px solid #ffe4b9;
            border-radius: 13px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px
        }

        .proof strong {
            font-size: 13px;
            color: #8a5a13
        }

        .proof span {
            display: block;
            font-size: 11px;
            color: #8b7658;
            margin-top: 4px
        }

        .people {
            display: flex
        }

        .people .avatar {
            width: 31px;
            height: 31px;
            border: 2px solid #fff;
            margin-left: -6px;
            font-size: 9px
        }

        .people .avatar:first-child {
            margin-left: 0
        }

        .cta {
            margin-top: 28px;
            background: linear-gradient(100deg, #123b91, #1764d9);
            border-radius: 17px;
            padding: 25px 30px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px
        }

        .cta-brand {
            display: flex;
            align-items: center;
            gap: 13px
        }

        .logo {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #fff;
            color: #173e94;
            display: grid;
            place-items: center;
            font-weight: 900
        }

        .cta h2 {
            margin: 0;
            font-size: 21px
        }

        .cta p {
            margin: 5px 0 0;
            font-size: 12px;
            opacity: .85
        }

        .cta button {
            background: #fff;
            color: #1764d9;
            border: 0;
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 700
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #8994a5;
            font-size: 10px
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: #0d193066;
            z-index: 50;
            align-items: center;
            justify-content: center;
            padding: 15px
        }

        .modal {
            width: 100%;
            max-width: 560px;
            background: #fff;
            border-radius: 15px;
            padding: 24px;
            box-shadow: 0 20px 55px #0003
        }

        .modal-head {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .modal h2 {
            margin: 0;
            font-size: 19px
        }

        .close {
            border: 0;
            background: none;
            font-size: 25px;
            color: #68758a
        }

        .summary {
            background: #f5f7fa;
            border-radius: 9px;
            padding: 13px;
            margin: 15px 0;
            font-size: 12px;
            line-height: 1.6
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .field {
            margin-bottom: 12px
        }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 6px
        }

        .field input,
        .field textarea {
            width: 100%;
            border: 1px solid #dce2ea;
            border-radius: 7px;
            height: 40px;
            padding: 9px;
            font-size: 11px
        }

        .field textarea {
            height: 80px
        }

        .confirm {
            width: 100%;
            height: 45px;
            background: #ed2024;
            color: #fff;
            border: 0;
            border-radius: 7px;
            font-weight: 700
        }

        @media(max-width:900px) {
            .hero {
                grid-template-columns: 1fr;
                gap: 5px
            }

            .intro {
                padding: 5px
            }

            .lower {
                grid-template-columns: 1fr
            }

            .benefits {
                grid-template-columns: repeat(2, 1fr)
            }
        }
		
	
.my-carousel {
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
}

.my-carousel .item {
    padding: 0px;
}



	
.my-carousel .preview {
    border: 1px solid #e2e7ee;
    border-radius: 14px;
    padding: 18px;
    background: #fff;
    box-shadow: 0 4px 16px rgba(20, 40, 80, 0.05);
    text-align: center;
}
.my-carousel .preview .preview-photo {
    width: 78px;
    height: 78px;
    border-radius: 50%;
    margin: auto;
    background: linear-gradient(135deg, #dfe7f2, #f5f7fb);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: 700;
    color: #1764d9;
    overflow: hidden;
}
.my-carousel .preview .preview-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.my-carousel .preview .preview-name {
    font-size: 18px;
    font-weight: 700;
    margin-top: 10px;
}
.my-carousel .preview .preview-line {
    font-size: 11px;
    color: #5e6b7f;
    margin-top: 4px;
}
.my-carousel .preview .preview-org {
    color: #1764d9;
}
.my-carousel .preview .preview-location {
    margin-top: 5px;
}
.my-carousel .preview .preview-stars {
    margin-top: 11px;
}
.my-carousel .preview .preview-stars span.stars {
    color: #f1a125;
}
.my-carousel .preview .preview-review {
    font-size: 12px;
    line-height: 1.55;
    margin: 16px auto;
    max-width: 470px;
}
.my-carousel .preview .preview-date {
    font-size: 10px;
    color: #7d8898;
}
.my-carousel .preview .preview-phone {
    border-top: 1px solid #e8ebef;
    margin-top: 14px;
    padding-top: 13px;
    font-size: 12px;
}
.my-carousel .preview .video-btn {
    display: block;
    width: 100%;
    border: 0;
    border-radius: 7px;
    background: #4a9a0b;
    color: #fff;
    font-weight: 700;
    padding: 10px;
    margin-top: 15px;
    cursor: pointer;
}
.my-carousel .preview .cta-buttons {
    display: flex;
    gap: 7px;
    margin-top: 10px;
}
.my-carousel .preview .cta-buttons button {
    flex: 1;
    background: #fff;
    border: 1px solid #b8c7db;
    border-radius: 7px;
    padding: 8px 5px;
    font-size: 10px;
    cursor: pointer;
}


        @media(max-width:650px) {
            .page {
                padding: 18px 12px 0
            }
			
			.intro {margin-bottom: 15px;}

            .intro h1 {
                font-size: 20px
            }
			
			.quote {
				margin-top: 10px;
				border-radius: 10px;
				padding: 10px 12px;
				font-size: 14px;
			}
			.meetings-head h2 {
				font-size: 16px;
				font-weight: 600;
			}

            .meeting {
                grid-template-columns: 42px 1fr;			
				border-radius: 8px;
				padding: 10px;
				gap: 8px;				
            }

            .meeting .book {
                grid-column: 2;
                justify-self: start;
				border-radius: 6px;
				padding: 8px 10px;
				font-size: 10px;
            }
			
			.meeting h3 {
				font-size: 14px;
			}
			.meeting p {
				font-size: 11px;
			}

            .micon {
                width: 42px;
                height: 42px;
                font-size: 19px
            }

            .proof {
                align-items: flex-start
            }

            .people {
                display: none
            }

            .cta {
                flex-direction: column;
                text-align: center
            }

            .cta-brand {
                justify-content: center
            }

            .cta button {
                width: 100%
            }

            .form-grid {
                grid-template-columns: 1fr
            }
        }
        
        .availability_wrap_boox .modal-body .ftr_content.text-center {
            margin-top: 20px;
            padding: 20px 10px;
        }
        .availability_wrap_boox .modal-body .ftr_content.text-center .lgo {
            width: 50px;
            height: 50px;
        }
        .availability_wrap_boox .modal-body .ftr_content.text-center .menu_ftrr {
            font-size: 15px;
        }
        .availability_wrap_boox .modal-body .ftr_content.text-center .crt_arar.mt-2 {
            margin-top: 10px !important;
        }

        .availability_wrap_boox .modal-body .booking-box .sucsses_box {
            text-align: center;
            margin-bottom:20px;
        }
        .availability_wrap_boox .modal-body .booking-box .sucsses_box .success-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            margin-bottom:10px;
        }
        .availability_wrap_boox .modal-body .booking-box .sucsses_box .success-icon svg {
            stroke: #000;
        }
        .availability_wrap_boox .modal-body .booking-box .sucsses_box p.sub-text {
            margin: 0 0 5px;
            font-size: 15px;
        }
    </style>