@include('front.layouts.header')
<style>
    .propfixsd .compearss_bx button{
        background: #007bff;
        padding: 10px 25px;
        display: inline-block;
        color: #fff;
        border-radius: 4px;
        border: none;
    }
	
	
	.property_report_page {width: 100%;}
.property_report_page .bottom_partss {padding-top:30px;}
.property_report_page .bottom_partss .lg_part_lg {text-align: center;}
.property_report_page .bottom_partss .lg_part_lg img {width: 150px;}
.property_report_page .bottom_partss .ct_contents {display:flex; align-items:center; justify-content:center; height:100%; width:100%; font-size:15px;}


.thnkss_al_partss {
    border: #fff solid 1px;
    text-align: center;
    padding: 20px;
}
.thnkss_al_partss .lgo_partss {
    max-width: 210px;
    margin: 0 auto;
    width: 100%;
    margin-bottom: 30px;
}
.thnkss_al_partss .lgo_partss img {
    width: 100%;
    max-width: 210px;
}
.thnkss_al_partss h4 {
    margin: 0 0 20px;
    font-size: 30px;
    font-weight: 800;
}
	
</style>
<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="lsting_proprty purch_list_conts compare">
                <div class="mn_lststs">
                    <div class="lft_nw_heds">
                        <span class="top_lvkss">
                            <a href="{{ url()->previous() }}"><i class="fa fa-long-arrow-left"></i> View all Properties</a>
                        </span>
                        <h3>Compare Properties</h3>
                        <p>Compare properties side-by-side to help you find the best deals. <a href="javascript:void(0);">View tutorial</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="propfixsd">
                <form action="{{ route('property.compare.post') }}" method="post">
                    @csrf
                    <h6>Select two properties of the same category to compare:</h6>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="prop_ly_ad_listt">
                                <div class="extr_adsss">
                                    <div class="mg_bx_araea">
                                        <img id="first_prop_image" src="{{ asset('img/image-new-property.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="slt_bx_area_user">
                                    <div class="slt_bxxs">
                                        <select id="first_property_compare" name="first_property">
                                            <option value="">Select Property</option>
                                            <optgroup label="Buy And Sell">
                                                @foreach ($buyAnSellProperty as $item)
                                                    <option value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Buy And Hold">
                                                @foreach ($buyAnHoldProperty as $item)
                                                    <option value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Buy, Hold And Refinance">
                                                @foreach ($buyHoldRefinanceProperty as $item)
                                                    <option value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div id="first-property-small-desc"></div>
                                </div>
                            </div>                    
                        </div>

                        <div class="col-lg-2">
                            <div class="compearss">
                                <i class="fa fa-exchange"></i>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="prop_ly_ad_listt">
                                <div class="extr_adsss">
                                    <div class="mg_bx_araea">
                                        <img id="second_prop_image" src="{{ asset('img/image-new-property.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="slt_bx_area_user">
                                    <div class="slt_bxxs">
                                        <select id="second_property_compare" name="second_property">
                                            <option value="">Select Property</option>
                                            <optgroup label="Buy And Sell">
                                                @foreach ($buyAnSellProperty as $item)
                                                    <option value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Buy And Hold">
                                                @foreach ($buyAnHoldProperty as $item)
                                                    <option value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="Buy, Hold And Refinance">
                                                @foreach ($buyHoldRefinanceProperty as $item)
                                                    <option value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div id="second-property-small-desc"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="compearss_bx">
                        <button type="submit" disabled class="submit-btn" >Compare Properties</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	 <div class="property_report_page">
 <div class="bottom_partss">
    <div class="container">
	  <div class="row">
	   <div class="col-lg-5">
	    <div class="ct_contents">Prepared BY : 1CR APP Consultants</div>
	   </div>
	   <div class="col-lg-2">
	    <div class="lg_part_lg"><img src="https://kapil.1crapp.com/img/logo 1.png" alt=""></div>
	   </div>
	   <div class="col-lg-5">
	    <div class="ct_contents">G-01, Green View, Jaipur, Rajasthan 201307</div>
	   </div>
	  </div>
	  
	    <div class="thnkss_al_partss">
		   <h4>Thank You Very Much!</h4>
		</div>
	  
	  
	  <div class="ftr_content text-center py-4" style="background-color:#000000;">
        <div class="lgo">
                <a href="https://kapil.1crapp.com"><img class="logo" src="https://admin.1crapp.com/img/1779197054895525347.png" alt="Logo"></a>
            </div>
        <div class="menu_ftrr text-light mt-1">
        Fastest-Simple Yet Powerful Tool for Indian Realtors Business Automation.
    </div>
    <div class="crt_arar mt-1">
                    <a href="https://1crapp.com/register" target="_blank"><button class="btn " style="background-color:#ed0c2e; color:#ffffff;">Try 1CRAPP Now For Free !</button></a>
            </div>
    </div>
	</div>
 </div>
 </div>
	
	
</div>
@include('front.layouts.footer')
@include('front.layouts.footer_new')
<script>
    $('#first_property_compare').change(function(){
        var firstPropertyCompare = $(this).val();
        var secondPropertyCompare = $('#second_property_compare').val();
        propertyCompare(firstPropertyCompare,secondPropertyCompare,'First');
    })
    $('#second_property_compare').change(function(){
        var firstPropertyCompare = $('#first_property_compare').val();
        var secondPropertyCompare = $(this).val();
        propertyCompare(firstPropertyCompare,secondPropertyCompare,'Second');
    })

    function propertyCompare(firstPropertyCompare,secondPropertyCompare,lastSelect){
        $.ajax({
            url  : "{{ route('validate.property.compare') }}",
            type : 'POST',
            data : { first_property_id : firstPropertyCompare, second_property_id : secondPropertyCompare, last_select : lastSelect,  '_token' : "{{ csrf_token() }}" },
            dataType : 'JSON',
            success: function(response) {
                if(lastSelect == 'First'){
                    $('#first-property-small-desc').html(response.view);
                    $('#first_prop_image').attr('src',response.image);
                }
                if(lastSelect == 'Second'){
                    $('#second-property-small-desc').html(response.view);
                    $('#second_prop_image').attr('src',response.image);
                }

                if(response.compareStatus == false){
                    $('.submit-btn').attr('disabled','disabled');
                    if(lastSelect == 'First'){
                        $("#second_property_compare").prop('selectedIndex', 0);
                        $('#second-property-small-desc').html('');
                        $('#second_prop_image').attr('src',"{{ asset('img/image-new-property.png') }}");
                    }
                    if(lastSelect == 'Second'){
                        $("#first_property_compare").prop('selectedIndex', 0);
                        $('#first-property-small-desc').html('');
                        $('#first_prop_image').attr('src',"{{ asset('img/image-new-property.png') }}");
                    }
                }
                if(response.compareStatus == true){
                    $('.submit-btn').removeAttr('disabled');
                }
            },
            error: function(error) {
                
            }
        });    
    }
</script>