@php
use App\Models\LandingBannerModel;
use App\Models\LandingBannerImageModel;
use App\Models\LandingLocationModel;

// Fetch active banner
$banner = LandingBannerModel::with('images')
->where(['status'=> 1, 'created_by'=> app('currentAgent')->id, 'id'=>$page_data->banner_id])
->orderBy('launch_date', 'desc')
->first();

// Fetch active locations
$locations = LandingLocationModel::where(['status'=> 1, 'created_by'=> app('currentAgent')->id])->get();

$company = DB::table('company_details')->where('user_id', app('currentAgent')->id)->first();
@endphp

@include('web.common.header')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/css/lightgallery.min.css'>

<!-- Form Modal -->
<div id="sub_m_al_frms" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Best Deals Ending Soon.!</h4>
            </div>
            <div class="modal-body">
                <div class="frm_al_suprtsss">
                    <form action="">
                        <div class="form-group marges_ic">
                            <i class="fa fa-user"></i>
                            <input type="text" name="" value="" class="form-control" placeholder="First Name" required="" />
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-envelope"></i>
                            <input type="text" name="" value="" class="form-control" placeholder="Enail ID" required="" />
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-building"></i>
                            <select class="slt_al_arra">
                                <option value="">Select Company / Organisation</option>
                            </select>
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="" value="" class="form-control" placeholder="Contact No" required="" />
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-sitemap"></i>
                            <select class="slt_al_arra">
                                <option value="">Request For</option>
                            </select>
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-server"></i>
                            <textarea name="" id="" cols="3" rows="3" class="form-control" placeholder="Message" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" value="Submit Now" class="btn-submit2">Yes Wisit To Apply Now!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form Modal -->

<div id="landing_page">

    <!---- Banner Area ---->
    <section class="bnr_al_bg">
        <div class="container">
            <div class="top_bgr_bith_ara">
                <div class="sm_logo">
                    <a href="javascript:void(0);">
                        <img class="logo" src="{{ $company->company_logo }}" alt="Logo" />
                    </a>
                </div>
                <div class="bg_logo_araea">
                    <h3>{{ $banner->title ?? '' }}</h3>
                    <p>{{ $banner->subtitle ?? '' }}</p>
                </div>
                <div class="sm_logo">
                    <a href="javascript:void(0);">
                        <img class="logo" src="{{ $banner->main_image }}" alt="Logo" />
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="owl-carousel owl-theme" id="slidersss">
                @if($banner && $banner->images)
                @foreach($banner->images as $img)
                <div class="item">
                    <img src="{{ $img->image_url }}" alt="Banner Image" />
                </div>
                @endforeach
                @else
                <div class="item">
                    <img src="{{ url('home/img/pro_perty_bg.jpg') }}" alt="Default Banner" />
                </div>
                @endif
            </div>

            <div class="row mt-5 mb-5">
                <div class="col-lg-3">
                    <div class="lun_box">
                        <p>Launch: {{ $property->date_of_booking ? \Carbon\Carbon::parse($property->date_of_booking)->format('M Y') : 'TBA' }}</p>
                        <p>Exp Poss: {{ $property->date_of_possession ? \Carbon\Carbon::parse($property->date_of_possession)->format('M Y') : 'TBA' }}</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="plyss">
                        <h5>Promo Video</h5>
                        @if($banner && $banner->promo_video_url)
                        <a href="{{ $banner->promo_video_url }}" class="al_btn_show" target="_blank">
                            {{ $banner->cta_button_text ?? "YES! I'm Ready For Rapid Growth" }}
                        </a>
                        @else
                        <a href="javascript:void(0);" class="al_btn_show">
                            {{ $banner->cta_button_text ?? "YES! I'm Ready For Rapid Growth" }}
                        </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="lun_box">
                        <p>RERA : {{ $property->rera_number ?? '' }}</p>
                        <p><a href="{{ $property->rera_link ?? '' }}">Cross Check</a></p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!---- End Banner Area ---->

    <!---- Location Area ---->
    <section class="al_sec_araea mt_50p lc_ar_paert">
        <div class="container">
            <!--<div class="row">-->
            <!-- @forelse($locations as $loc)-->
            <!-- <div class="col-lg-2 col-6">-->
            <!--  <div class="lk_bokss_als">-->
            <!--      <h6><img src="{{ $loc->image }}" alt="{{ $loc->title }}" /></h6>-->
            <!--      <h5>{{ $loc->title }}</h5>-->
            <!--      <p>{!! $loc->description !!}</p>-->
            <!--  </div>-->
            <!-- </div>-->
            <!-- @empty-->
            <!-- <div class="col-12 text-center">-->
            <!--     <p>No locations found.</p>-->
            <!-- </div>-->
            <!-- @endforelse-->
            <!--</div>-->
            <div class="row">
                @if($property->location)
                <div class="col-lg-2 col-6">
                    <div class="lk_bokss_als">
                        <h6><img src="https://kapil.1crapp.com/admin/uploads/landing_location/1764858548_locations_map.png" alt="Location-2"></h6>
                        <h5>Location</h5>
                        <p style="box-sizing: border-box; margin-bottom: 5px; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                          {{ ucwords($property->location) }}</p>
                    </div>
                </div>
                @endif
                @if($property->property_type_title)
                <div class="col-lg-2 col-6">
                    <div class="lk_bokss_als">
                        <h6><img src="https://kapil.1crapp.com/admin/uploads/landing_location/1764858530_type_property_ld.png" alt="Type"></h6>
                        <h5>Type</h5>
                        <p style="box-sizing: border-box; margin-bottom: 5px; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                            {{ ucwords($property->property_type_title) }}</p>
                    </div>
                </div>
                @endif
                @if($property->current_status)
                <div class="col-lg-2 col-6">
                    <div class="lk_bokss_als">
                        <h6><img src="https://kapil.1crapp.com/admin/uploads/landing_location/1764858508_kay_l.png" alt="Possession"></h6>
                        <h5>Possession</h5>
                        <p>@</p>
                        <p style="box-sizing: border-box; margin-bottom: 5px; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                            {{ ucwords($property->current_status) }}</p>
                    </div>
                </div>
                @endif
                @if($property->price_from && $property->price_to)
                <div class="col-lg-2 col-6">
                    <div class="lk_bokss_als">
                        <h6><img src="https://kapil.1crapp.com/admin/uploads/landing_location/1764858457_price_ic_l.png" alt="Price"></h6>
                        <h5>Price</h5>
                        <p></p>
                        <p style="box-sizing: border-box; margin-bottom: 5px; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                            Start @</p>
                        <p style="box-sizing: border-box; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                            ₹{{ number_format($property->price_from) }}* - ₹{{ number_format($property->price_to) }}</p>
                        <p></p>
                    </div>
                </div>
                @endif
                @if($property->property_unit)
                <div class="col-lg-2 col-6">
                    <div class="lk_bokss_als">
                        <h6><img src="https://kapil.1crapp.com/admin/uploads/landing_location/1764858439_proprty_sizes.png" alt="Size"></h6>
                        <h5>Size</h5>
                        <p style="box-sizing: border-box; margin-bottom: 5px; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                            {{ $property->property_size }} {{ ucwords($property->property_size_type) }}</p>
                        
                    </div>
                </div>
                @endif
                @if($property->property_unit)
                <div class="col-lg-2 col-6">
                    <div class="lk_bokss_als">
                        <h6><img src="https://kapil.1crapp.com/admin/uploads/landing_location/1764858424_bedrooms_ic_l.png" alt="Bedrooms"></h6>
                        <h5>Bedrooms</h5>
                        <p></p>
                        <p style="box-sizing: border-box; margin-bottom: 5px; padding-bottom: 0px; font-size: 15px; color: rgb(44, 44, 44); font-family: &quot;Nunito Sans&quot;, sans-serif; text-align: center;">
                            {{ $property->property_unit }} BHK
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!---- Location Area ---->



    <!-- TOP MENU -->
    {!! $bodyData !!}
    <!-- END TOP MENU -->



</div>

@include('front.layouts.footer')


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/js/lightgallery-all.min.js'></script>
<script>
    $(function() {
        $('#aniimated-thumbnials').lightGallery({
            thumbnail: true,
        });
        // Card's slider
        var $carousel = $('.slider-for');

        $carousel
            .slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                adaptiveHeight: true,
                asNavFor: '.slider-nav'
            });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            variableWidth: true
        });


    });
</script>
<script>
    $(document).ready(function() {
        function AddReadMore() {
            //This limit you can set after how much characters you want to show Read More.
            var carLmt = 600;
            // Text to show when text is collapsed
            var readMoreTxt = " ...Read More";
            // Text to show when text is expanded
            var readLessTxt = " Read Less";


            //Traverse all selectors with this class and manupulate HTML part to show Read More
            $(".add-read-more").each(function() {
                if ($(this).find(".first-section").length)
                    return;

                var allstr = $(this).text();
                if (allstr.length > carLmt) {
                    var firstSet = allstr.substring(0, carLmt);
                    var secdHalf = allstr.substring(carLmt, allstr.length);
                    var strtoadd = firstSet + "<span class='second-section'>" + secdHalf + "</span><span class='read-more'  title='Click to Show More'>" + readMoreTxt + "</span><span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
                    $(this).html(strtoadd);
                }
            });

            //Read More and Read Less Click Event binding
            $(document).on("click", ".read-more,.read-less", function() {
                $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
            });
        }

        AddReadMore();
    });
</script>