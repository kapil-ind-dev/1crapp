<!-- What clients are saying about our 1CR App -->
<section class="what_tst mt_50p">
    <div class="containerffgdf">
        <div class="new_ar_tring bg_crl_sky br_radius_10">
            <h3>Review & Feedback</h3>
        </div>
        <div class="owl-carousel owl-theme qu_bx_partss pt_top_40 testimonial-carousel"
            id="testimonials">
            @foreach($review_items as $key => $item)
            <div class="item">
                <div class="preview">
                    {{-- Avatar --}}
                    <div class="preview-photo avatar-{{ $key % 6 }}">
                        @if($item && $item->profile_photo)
                        <img src="{{ $item->profile_photo }}" height="78" width="78" alt="Profile"/>
                        @else 
                            {{ strtoupper(substr($item->name ?? 'U', 0, 1)) }}
                        @endif
                    </div>
                    {{-- Name --}}
                    <div class="preview-name">
                        {{ $item->name }}
                    </div>
                    {{-- Designation --}}
                    @if(!empty($item->designation))
                    <div class="preview-line">
                        {{ $item->designation }}
                    </div>
                    @endif
                    {{-- Organisation --}}
                    @if(!empty($item->organisation))
                    <div class="preview-line preview-org">
                        {{ $item->organisation }}
                    </div>
                    @endif
                    {{-- Location --}}
                    @if(!empty($item->location))
                    <div class="preview-line preview-location">
                        <i class="fa fa-map-marker"></i>
                        {{ $item->location }}
                    </div>
                    @endif
                    {{-- Rating --}}
                    <div class="preview-stars">
                        <span class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <=($item->rating ?? 0))
                                <i class="fa fa-star"></i>
                                @else
                                <i class="fa fa-star-o"></i>
                                @endif
                                @endfor
                        </span>
                        @if(!empty($item->rating))
                        <span class="rating-text">
                            {{ number_format($item->rating, 1) }}
                        </span>
                        @endif
                    </div>
                    {{-- Review --}}
                    <div class="preview-review">
                        “{{ $item->review }}”
                    </div>
                    {{-- Review Date --}}
                    @if(!empty($item->review_date))
                    <div class="preview-date">
                        <i class="fa fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($item->review_date)->format('d M Y') }}
                    </div>
                    @endif
                    {{-- Phone --}}
                    @if(!empty($item->phone))
                    <div class="preview-phone">
                        <i class="fa fa-phone"></i>
                        +91 {{ $item->phone }}
                    </div>
                    @endif
                    {{-- Video --}}
                    @if(isset($item) && $item->video_url)
                    <a href="javascript:void(0);"
                        class="video-btn openYoutube" onclick="openYoutube('{{ $item->video_url }}')">
                        <i class="fa fa-play"></i>
                        WATCH VIDEO
                    </a>
                    @endif
                    {{-- CTA Buttons --}}
                    <div class="cta-buttons">
                        @if(isset($review_setting) && $review_setting->whatsapp_enabled && !empty($review_setting->whatsapp_number))
                        <a target="_blank"
                            href="https://api.whatsapp.com/send/?phone=%2B{{ $review_setting->whatsapp_number }}&text=Hi&app_absent=0"
                            class="whatsapp-btn">
                            <i class="fa fa-whatsapp"></i>
                            WhatsApp
                        </a>
                        @endif
                        @if(isset($review_setting) && $review_setting->call_enabled && !empty($review_setting->call_number))
                        <a href="tel:+91{{ $review_setting->call_number }}"
                            class="call-btn">
                            <i class="fa fa-phone"></i>
                            Call Now
                        </a>
                        @endif
                         @if(isset($review_setting) && $review_setting->meeting_enabled && !empty($review_setting->meeting_url))
                        <a href="{{ $review_setting->meeting_url }}" target="_blank"
                            class="booking-btn">
                            <i class="fa fa-calendar"></i>
                            Book a Call
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
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
<script>
    $(document).ready(function () {
        $('.testimonial-carousel').each(function () {
            $(this).owlCarousel({
                margin: 35,
                loop: true,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: false,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });

        });

    });
</script>

  
<script>
    // const openYoutube = document.querySelectorAll(".openYoutube");
	const closeYoutube = document.getElementById("closeYoutube");
	const youtubeModal = document.getElementById("youtubeModal");
	const youtubeIframe = document.getElementById("youtubeIframe");

	// YouTube video ID
	// const videoId = "mJVuZiK9a6I";

	// Open modal
	// openYoutube.forEach(function (button) {
	//   button.addEventListener("click", function () {
	// 	youtubeIframe.src =
	// 	  "https://www.youtube.com/embed/" + videoId + "?autoplay=1";

	// 	youtubeModal.classList.add("active");
	//   });
	// });
    function openYoutube(src){
        youtubeIframe.src = src + "?autoplay=1";
		youtubeModal.classList.add("active");
    }

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
<style>
    /* =========================================
   TESTIMONIAL CARD
========================================= */


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
.testimonial-carousel .preview {
    border: 1px solid #e2e7ee;
    border-radius: 14px;
    padding: 18px;
    background: #fff;
    box-shadow: 0 4px 16px rgba(20, 40, 80, 0.05);
    text-align: center;
    height: 100%;
    max-height: 500px;
}

.testimonial-carousel .preview .preview-photo {
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

.testimonial-carousel .preview .preview-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.testimonial-carousel .preview .preview-name {
    font-size: 18px;
    font-weight: 700;
    margin-top: 10px;
}

.testimonial-carousel .preview .preview-line {
    font-size: 11px;
    color: #5e6b7f;
    margin-top: 4px;
}

.testimonial-carousel .preview .preview-org {
    color: #1764d9;
}

.testimonial-carousel .preview .preview-location {
    margin-top: 5px;
}

.testimonial-carousel .preview .preview-stars {
    margin-top: 11px;
}

.testimonial-carousel .preview .preview-stars span.stars {
    color: #f1a125;
}

.testimonial-carousel .preview .preview-review {
    font-size: 12px;
    line-height: 1.55;
    margin: 16px auto;
    max-width: 470px;
}

.testimonial-carousel .preview .preview-date {
    font-size: 10px;
    color: #7d8898;
}

.testimonial-carousel .preview .preview-phone {
    border-top: 1px solid #e8ebef;
    margin-top: 14px;
    padding-top: 13px;
    font-size: 12px;
}

.testimonial-carousel .preview .video-btn {
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
    text-decoration: none;
}

.testimonial-carousel .preview .video-btn:hover {
    background: #3d8508;
    color: #fff;
}

.testimonial-carousel .preview .cta-buttons {
    display: flex;
    gap: 7px;
    margin-top: 10px;
}

.testimonial-carousel .preview .cta-buttons a,
.testimonial-carousel .preview .cta-buttons button {
    flex: 1;
    background: #fff;
    border: 1px solid #b8c7db;
    border-radius: 7px;
    padding: 8px 5px;
    font-size: 10px;
    cursor: pointer;
    text-decoration: none;
    color: #333;
}

.testimonial-carousel .preview .cta-buttons a:hover,
.testimonial-carousel .preview .cta-buttons button:hover {
    background: #f7f9fc;
    color: #333;
}


/* =========================================
   TESTIMONIAL CAROUSEL AREA
========================================= */

.what_tst .qu_bx_partss {
    background: #f9f9f9;
    padding: 0 30px 30px;
    position: relative;
}


/* =========================================
   OWL NAVIGATION
========================================= */

.what_tst .testimonial-carousel .owl-nav button.owl-prev {
    position: absolute;
    left: -30px;
    margin: 0;
}

.what_tst .testimonial-carousel .owl-nav button.owl-prev i {
    font-size: 35px;
    -webkit-text-stroke: 3px #f9f9f9;
}

.what_tst .testimonial-carousel .owl-nav button.owl-next {
    position: absolute;
    right: -30px;
    margin: 0;
}

.what_tst .testimonial-carousel .owl-nav button.owl-next i {
    font-size: 35px;
    -webkit-text-stroke: 3px #f9f9f9;
}


/* =========================================
   MOBILE
========================================= */

@media (min-width: 481px) and (max-width: 767px) {

    .what_tst .qu_bx_partss {
        padding: 10px 10px 10px !important;
    }

    .what_tst .testimonial-carousel .owl-nav button.owl-next {
        right: 5px;
    }

}


@media (min-width: 320px) and (max-width: 480px) {

    .what_tst .qu_bx_partss {
        padding: 10px 10px 10px !important;
    }

    .what_tst .testimonial-carousel .owl-nav button.owl-next {
        right: 5px;
    }

}
</style>