<style>
    #somephotographsg_assumption .slider_managess {padding: 10px 10px 0px; position: relative;}
    #somephotographsg_assumption .slider_managess .owl-nav.disabled {display: block; position: absolute; top: 45%; width: 100%; z-index: 9;}
    #somephotographsg_assumption .slider_managess .owl-nav.disabled button:focus{outline:none;}
    #somephotographsg_assumption .slider_managess .owl-nav.disabled button.owl-prev {background:#eff5fd; width:30px; height:30px; position:absolute; left:0;}
    #somephotographsg_assumption .slider_managess .owl-nav.disabled button.owl-next {background: #eff5fd; width: 30px; height: 30px; position: absolute; right: 0;}
    
    
    #somephotographsg_assumption .slider_managess {padding: 10px 0px 0px 20px; position: relative;}
    #somephotographsg_assumption .slider_managess .owl-nav {position: absolute; top: 45%; width: 100%;}
    #somephotographsg_assumption .slider_managess .owl-nav button.owl-prev {position: absolute; left: 5px; font-size: 30px;}
    #somephotographsg_assumption .slider_managess .owl-nav button.owl-prev i {font-size:30px; -webkit-text-stroke: 3px #eff5fd; color: #000000;}
    #somephotographsg_assumption .slider_managess .owl-nav button.owl-next {position: absolute; right: 5px; font-size: 30px;}
    #somephotographsg_assumption .slider_managess .owl-nav button.owl-next i {font-size:30px; -webkit-text-stroke: 3px #eff5fd; color: #000000;}
    .gallery212 img{
      height: 220;
      width: 285;
    }
</style>
<!-- Some Photographsg & Videos --->
<div class="container" id="somephotographsg_assumption">
    <div class="property_desc als_show_ar">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets purchase_terms mt-5" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-12">
                    <h3>{{ $gallery_data->title }}</h3>
                    <div class="slider_managess">
                        <div class="owl-carousel owl-theme gallery-carousel">
                            @foreach($gallery_items as $item)
                                <div class="item">
                                    <div class="glr_bg">
                                        @if($item->type=='image')
                                            <a href="{{ asset('').'admin/'.$item->path }}" target="_blank" height="400" width="400" class="gallery212">
                                                <img src="{{ asset('').'admin/'.$item->path }}">
                                            </a>
                                        @else
                                             @php
                                                $videoUrl = $item->path;
                                            
                                                if (preg_match('/(?:youtu\.be\/|watch\?v=|embed\/)([A-Za-z0-9_-]{11})/', $videoUrl, $matches)) {
                                                    $videoUrl = "https://www.youtube.com/embed/".$matches[1];
                                                }
                                            @endphp
                                            
                                            <iframe
                                                width="100%"
                                                height="220"
                                                src="{{ $videoUrl }}"
                                                frameborder="0"
                                                allowfullscreen>
                                            </iframe>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Some Photographsg & Videos --->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$('.gallery-carousel').each(function () {

    $(this).owlCarousel({

        margin:20,
        loop:true,
        dots:false,
        nav:true,
        navText:[
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        autoplay:false,
        autoplayHoverPause:true,

        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:4
            },
            1200:{
                items:4
            }
        }

    });

});
</script>
