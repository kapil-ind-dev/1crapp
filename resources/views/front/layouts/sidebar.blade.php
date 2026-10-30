<?php
use App\Models\MainProperty;
use App\Models\PropertyTypeModel;
$property_type = PropertyTypeModel::select('title','key')->where("status",1)->orderBy('priority','ASC')->get();
$segments = request()->segments();
$secondLastSegment = $segments[count($segments) - 2] ?? null;
?>

<div class="col-lg-3"> 
    @foreach($property_type as $type)
    <!--  Buy & Sall -->
      @if($type->key == 'control-sale')
        <div class="shadow align-items-center p-4 pl-3  <?php if($secondLastSegment == $type->key){ echo 'bd-left';} ?> mb-4 property-card" id="proprty_lsts_lft">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="bothsss_mngess">
                        <a href="{{ route('properties.list',['type'=>$type->key])}}" class="linkkks" ><img src="{{url('')}}/img/prop_icnss.jpg" alt="" /> {{ $type->title }}</a>
						<span class="countts desktop_view">{{ MainProperty::where('prop_parent_type', $type->key)->where('user_id', Auth::id())->count(); }}</span>
                        <span class="float-right text-primary font-weight-bold h2 mt-0 mr-4">
                            <a href="{{ route('properties.new-property.landing-price')}}">+</a>
                        </span>
                        <span class="toggle-criteria desktop_view">
                            <a href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                        </span>
                    </h3>
                </div>


                <div class="col-lg-12 mb_v_ar_show">
                    <a href="#" class="text-primary block_fl"><i class="fa fa-home mr-2" aria-hidden="true"></i>Property</a>
					<h3 class="text-primary font-weight-bold mobile_view">{{ MainProperty::where('prop_parent_type', $type->key)->where('user_id', Auth::id())->count(); }}</h3>
                    <a href="javascript:void(0);" class="block_fl"><i class="fa fa-search mr-2" aria-hidden="true"></i>Purchase Criteria</a>
                </div>
            </div>
        </div>
      @else
        <div class="shadow align-items-center p-4 pl-3  <?php if($secondLastSegment == $type->key){ echo 'bd-left';} ?> mb-4 property-card" id="proprty_lsts_lft">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="bothsss_mngess">
                        <a href="{{ route('properties.list',['type'=>$type->key])}}" class="linkkks" ><img src="{{url('')}}/img/prop_icnss.jpg" alt="" /> {{ $type->title }}</a>
						<span class="countts desktop_view">{{ MainProperty::where('prop_parent_type', $type->key)->where('user_id', Auth::id())->count(); }}</span>
                        <span class="float-right text-primary font-weight-bold h2 mt-0  mr-4">
                            <a href="javascript:void(0);" onclick="addProperty('{{ $type->key }}')">+</a>
                        </span>
                        <span class="toggle-criteria desktop_view">
                            <a href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                        </span>
                    </h3>
                </div>


                <div class="col-lg-12 mb_v_ar_show">
                    <a href="{{ route('properties.list',['type'=>$type->key])}}" class="text-primary block_fl"><i class="fa fa-home mr-2" aria-hidden="true"></i>Property</a>
					<h3 class="text-primary font-weight-bold mobile_view">{{ MainProperty::where('prop_parent_type', $type->key)->where('user_id', Auth::id())->count(); }}</h3>
                    <a href="javascript:void(0);" class="block_fl"><i class="fa fa-search mr-2" aria-hidden="true"></i>Purchase Criteria</a>
                </div>
            </div>
        </div>
      @endif
    @endforeach

</div>
<style>
#proprty_lsts_lft h3 span {
    color: #ffffff !important;
    font-weight: 300 !important;
    top: 5px;
    position: absolute;
    right: 0;
    margin: 0 !important;
    background: #1c5299;
    height: 16px;
    width: 16px;
    text-align: center;
    padding: 0 2px;
}
#proprty_lsts_lft h3 span a {
    font-size: 18px;
    line-height: 15px;
	color: #ffffff !important;
    font-weight: 600;
	
}
#proprty_lsts_lft h3 span a:focus{outline:none;}

.mb_v_ar_show {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.mb_v_ar_show a.block_fl {
    font-size: 14px;
}
#proprty_lsts_lft h3.text-primary.font-weight-bold {
    color: #000 !important;
    position: relative;
    top: 1px;
    margin: 0;
    border: #f94554 solid 1px;
    padding: 0 5px;
}

#proprty_lsts_lft h3.bothsss_mngess a.linkkks:focus {
    outline: none;
}

 @media (min-width: 320px) and (max-width: 767px) {	  
	  #proprty_lsts_lft h3.bothsss_mngess {display:flex; gap:10px; margin:0; justify-content: left; align-items: center;}
	  #proprty_lsts_lft h3.bothsss_mngess img {margin-right: 0px;}
	  #proprty_lsts_lft h3.bothsss_mngess span.countts.desktop_view {position: relative;
        border: #1c5299 solid 1px;
        padding: 2px 4px;
        background: #1c5299;
        font-size: 10px;
        height: 16px;
		        border-radius: 4px;
        font-weight: 600 !important;
        color: #fff !important;
        top: 0;
        left: initial;
        right: initial !important;}
		
		
		
	  
	  #proprty_lsts_lft h3.bothsss_mngess span.toggle-criteria {right: -5px; top: 3px; background: transparent;}
	  #proprty_lsts_lft h3.bothsss_mngess span.toggle-criteria a {background:#f94554; color:#fff; width:16px; height:16px; display:inline-block; text-align:center; border-radius:4px;}
	  #proprty_lsts_lft h3.bothsss_mngess span.toggle-criteria a i{position:relative; top:0px;}
	  #proprty_lsts_lft h3.bothsss_mngess span.toggle-criteria a:focus {outline: none;}
	  #proprty_lsts_lft h3.bothsss_mngess span.float-right.text-primary {right:21px;
        background:#1c5299;
        display: inline-block;
        line-height: 16px;
        top: 3px;
        width: 16px;
        height: 16px;
        text-align: center;
        border-radius: 20px;}
		
		
	#proprty_lsts_lft h3.bothsss_mngess span.float-right.text-primary a {
    line-height: 16px;
    color: #fff;
    font-size: 17px !important;
}	
	  
	  
	  .mb_v_ar_show {display: none;}
      .mb_v_ar_show.active {display:flex; gap:20px; margin-top:20px;} 
	  .mb_v_ar_show.active a{margin:0 !important;}
	  


	 }
</style>


<script>
function addProperty(cat) {
    let prop_url = '{{ route('properties.new-property')}}';
    let url = '{{ route('properties.set-cat-session') }}';
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ prop_cat: cat })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            window.location.assign(prop_url);
        } else {
            alert('Failed to set category in session');
        }
    })
    .catch(error => console.error('Error:', error));
}

</script>