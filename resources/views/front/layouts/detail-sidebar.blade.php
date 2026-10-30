<?php
   $imgurl = url('img/property-placeholder.png');
    if(isset($MainProperty->imageVideo)){
        $imageideos = explode(',', $MainProperty->imageVideo);
        if(count($imageideos)>0){
            $imgurl= url('img') . '/' . $imageideos[0];
        }
    }
    // dd($MainProperty);
 ?>
 <style>
    .propty_item_liststs .croosss {
    z-index: 1;
    position: absolute;
    bottom: 1px;
    right: 1px;
    background: #f00;
    padding: 0px 5px;
    color: #fff;
    font-weight: 200;
    border-radius: 20px;
    cursor: pointer;
}
.propty_item_liststs {

    display: inline-block;
    width: 100%;
    max-height: initial;
    min-height: initial;
    overflow: initial;
    z-index: 100;
    overflow-y: initial;
    background-color: #fff;
    border: 1px solid rgba(207,219,226,.5);
    border-radius: 4px!important;
    -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 5%);
    -moz-box-shadow: 0 4px 12px rgba(0,0,0,.05);
    box-shadow: 0 4px 12px rgb(0 0 0 / 5%);
}


.propty_item_liststs .croosss i {
    -webkit-text-stroke: 1px #f00;
    cursor: pointer;
    position: relative;
    top: 3px;
    left: 1px;
}

.contensss_list ul {
    list-style: none;
    padding: 0;
}

.lists_tablssts .unddrlstt h6 {
    font-weight: normal;
    font-size: 14px;
    line-height: 34px;
    margin: 0px;
}
.managess_cnts {
    width: 75%;
    float: left;
    line-height: 22px;
}

.contensss_list {
    display: inline-block;
    width: 100%;
    padding: 10px;
}

.propty_item_liststs .are_bxxx {
    position: absolute;
    background: transparent;
    width: 25px;
    height: 25px;
    z-index: 1;
    border-radius: 0px 50px 50px 50px;
    left: 10px;
    top: -4px;
}

.contensss_list .copyyy_txt .clicckshowd ul {

    list-style: none;
    padding: 0;
    margin: 0;
    border-bottom: #ddd solid 1px;
}

.contensss_list .copyyy_txt .clicckshowd ul li:hover a {
    text-decoration: none;
}

.contensss_list .copyyy_txt .clicckshowd ul li:hover {
    background: #eee;
    text-decoration: none;
}
.contensss_list .copyyy_txt .clicckshowd ul li {
    margin-bottom: 3px;
    padding: 3px 10px;
}

.contensss_list .propety_lststs p.tool-worksheet {display:none;}
.propty_item_liststs .mgs_areaa a.gobackess {
    position: absolute;
	display:block;
    top: 3px;
    right: 3px;
    background: #1c5299;
    color: #fff;
    font-weight: 600;
    font-size: 12px;
    padding: 4px 10px;
    border-radius: 4px;
}
.propty_item_liststs .mgs_areaa a.gobackess i {
    font-size: 16px;
    position: relative;
    top: 1px;
    left: -2px;
}

.contensss_list .copyyy_txt h5.onclicks span.dots_clicks{top: 0px; position: absolute; right: 0;}

@media (min-width: 320px) and (max-width:767px) {
#property_anaylsis_pages .container.mt-5 {
    margin-top: 10px !important;
}	
	
	
.contensss_list .propety_lststs p.tool-title {font-weight: 700; color: #1c5299; margin: 0 0 5px; font-size:15px; display:flex; gap:7px; justify-content:left; align-items:center;}
.contensss_list .propety_lststs ul.tool-list {display: none;}
.contensss_list .propety_lststs ul.tool-list.active{display:block; background: #f5f5f5; padding: 7px; list-style: none; border: #1c5299 solid 1px;}

.contensss_list .propety_lststs p.tool-research {font-weight: 700; color: #1c5299; margin: 0 0 5px; font-size:15px; display:flex; gap:7px; justify-content:left; align-items:center;}
.contensss_list .propety_lststs ul.tool-research-list {display: none;}
.contensss_list .propety_lststs ul.tool-research-list.active{display:block; background: #f5f5f5; padding: 7px; list-style: none; border: #1c5299 solid 1px;}

.contensss_list .propety_lststs p.tool-analysis {font-weight: 700; color: #1c5299; margin: 0 0 5px; font-size:15px; display:flex; gap:7px; justify-content:left; align-items:center;}
.contensss_list .propety_lststs ul.tool-analysis-list {display: none;}
.contensss_list .propety_lststs ul.tool-analysis-list.active{display:block; background: #f5f5f5; padding: 7px; list-style: none; border: #1c5299 solid 1px;}

.contensss_list .propety_lststs p.tool-worksheet {font-weight: 700; color: #1c5299; margin: 0 0 5px; text-transform: uppercase; font-size:15px; display:flex; gap:7px; justify-content:left; align-items:center;}
.contensss_list .propety_lststs ul.tool-worksheet-list {display: none;}
.contensss_list .propety_lststs ul.tool-worksheet-list.active{display:block; background: #f5f5f5; padding: 7px; list-style: none; border: #1c5299 solid 1px;}

.contensss_list  span.tool-BSproprtyy {font-weight: 700; color: #1c5299; margin:0px; text-transform:uppercase; font-size:15px; display:flex !important; gap:7px; justify-content:left; align-items:center;}
.contensss_list .tool-BSproprtyy-list {display: none;}
.contensss_list .tool-BSproprtyy-list.active{display:block; background: #f5f5f5; padding: 7px; list-style: none; border: #1c5299 solid 1px;}




.contensss_list .bothss_area {
    position: relative;
}
.contensss_list .bothss_area .copyyy_txt h5.onclicks {
    position: absolute;
    width: auto;
    right: 0;
    top: 0;
    margin: 0;
}
.contensss_list .bothss_area .und_cntss_listst {
    margin: 0;
}
}

 </style>
<div class="col-lg-3">
            <div class="propty_item_liststs">
                <div class="are_bxxx">
                    <div class="croosss" id="language-wrapper">
                        <i class="fa fa-times language-title"></i>

                    </div>
                </div>
                <div class="mgs_areaa">
                    <img src="{{ $imgurl }}" alt="" />
                    <span class="reltalls">{{ $MainProperty->prop_type }}</span>
					<a href="{{ url('properties').'/'.$MainProperty->prop_parent_type.'/list' }}" class="gobackess" ><i class="fa fa-angle-left"></i> Go Back</a>
                </div>
                <div class="contensss_list">
				   <div class="bothss_area">
                     <div class="copyyy_txt">
                        <h5 class="onclicks">
                            <span class="mobile_view">{{ $MainProperty->prop_name }}</span> <span class="dots_clicks"><i class="fa fa-caret-down"></i></span>
                        </h5>
                        <div class="clicckshowd">
                            <h5><a href="javascript:void(0);">Share Report</a></h5>
                            <ul>
                                <li><a href="javascript:void(0);">Compare</a></li>
                                <li><a href="javascript:void(0);">Copy</a></li>
                                <li><a href="javascript:void(0);">Copy Address</a></li>
                                <li><a href="javascript:void(0);">Move to BRRRRs</a></li>
                                <li><a href="javascript:void(0);">Move to Flips</a></li>
                                <li><a href="javascript:void(0);">Move to Wholesale</a></li>
                                <li><a href="javascript:void(0);">Archive</a></li>
                                <li><a href="javascript:void(0);">Save as Template</a></li>
                            </ul>
                            <p class="dltts"><a href="javascript:void(0);">Delete</a></p>
                        </div>
                     </div>

                     <div class="und_cntss_listst">
					    <span class="tool-BSproprtyy desktop_view">{{ $MainProperty->prop_name }} <span class="iccn desktop_view"><i class="fa fa-angle-down"></i></span></span>
						<div class="tool-BSproprtyy-list">
                        <p>{{ $MainProperty->prop_street }}</p>
                        <p>{{ $MainProperty->prop_add_city }}, {{ $MainProperty->prop_add_state }}, {{ $MainProperty->prop_zip }}</p>
                       <!--  <p>
                            <span class="area_contss">4 <span class="brss">BR</span> <span class="slesss">/</span> 4 BA <span class="slesss">/</span> </span>
                        </p> -->
                        <p class="pricss_lstts">
                            <span class="blue bold">₹{{ number_format($MainProperty->prop_purchasePrice) }} </span> <!-- <span class="red"><span class="bold">-233.5%</span> Cap Rate </span> -->
                        </p>
						</div>
                     </div>
					</div>
                    <div class="propety_lststs">
					    <p class="tool-worksheet">Details Worksheet <span class="iccn desktop_view"><i class="fa fa-angle-down"></i></span></p>
                        <ul class="tool-worksheet-list">
                            <li>
                                <a href="{{ route('properties.description', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-home"></i></span> Property Description
                                </a>
                            </li>
                            <?php /*
                            <li>
                                <a href="{{ route('properties.worksheet', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-pencil"></i></span> Purchase Worksheet
                                </a>
                            </li>
                            */ ?>
                            <li>
                                <a href="{{ route('properties.edit.book-finance-payment',['id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-pencil"></i></span> Purchase Worksheet
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('properties.photos', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-picture-o"></i></span> Photos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties.map', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-map-marker"></i></span> Map
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p class="tool-analysis">ANALYSIS <span class="iccn desktop_view"><i class="fa fa-angle-down"></i></span></p>
                        <ul class="tool-analysis-list">
                            <li>
                                <a href="{{ route('property.summary', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-pie-chart"></i></span> Property Analysis
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties.projection', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-bar-chart"></i></span> Property Projections
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="propety_lststs">
                        <p class="tool-research">RESEARCH <span class="iccn desktop_view"><i class="fa fa-angle-down"></i></span></p>
                        <ul class="tool-research-list">
                            <li>
                                <a href="{{ route('properties.recent-sales-comps', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-usd"></i></span> Sales Comps &amp; ARV
                                </a>
                            </li>
                            <li>

                                <a href="{{ route('properties.recent-comps-rent', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-key"></i></span> Rental Comps &amp; Rent
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property.compare.index') }}">
                                    <span class="i_conss"><i class="fa fa-exchange"></i></span> Compare Properties
                                </a>
                            </li>
                            <?php /*
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-files-o"></i></span> Records &amp; Listings
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-user"></i></span> Owner Lookup
                                </a>
                            </li>
                            */ ?>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p class="tool-title">TOOLS <span class="iccn desktop_view"><i class="fa fa-angle-down"></i></span></p>
                        <ul class="tool-list">
                            <li>
                            <a href="{{ route('properties.reports-and-sharing', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-file-text"></i></span> Reports &amp; Sharing
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('properties.termsheet', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">
                                    <span class="i_conss"><i class="fa fa-file-text"></i></span>{{ strtoupper(implode('', array_map(fn($w) => $w[0], explode('-', $MainProperty->prop_parent_type)))) }} Term-Sheet 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){

			if ($(window).width() <= 768) {

				$('.tool-title').click(function(){
					$(this).next('.tool-list').slideToggle().toggleClass('active');
				});

				$('.tool-research').click(function(){
					$(this).next('.tool-research-list').slideToggle().toggleClass('active');
				});

				$('.tool-analysis').click(function(){
					$(this).next('.tool-analysis-list').slideToggle().toggleClass('active');
				});

				$('.tool-worksheet').click(function(){
					$(this).next('.tool-worksheet-list').slideToggle().toggleClass('active');
				});

				$('.tool-BSproprtyy').click(function(){
					$(this).next('.tool-BSproprtyy-list').slideToggle().toggleClass('active');
				});

			}

		});
		</script>
