<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\PageModel;
use App\Models\CDOCategoryModel;
use App\Models\CDOModel;
use App\Models\MainProperty;
use App\Models\ProductServiceCategory;
use App\Models\ProductService;
use App\Models\EmbedPageModel;
use App\Models\FormModel;
use App\Models\AssetModel;
use Illuminate\Support\Facades\Http;
// use function Adminer\redirect;
class PageController extends Controller
{
    public function index($slug = NULL){
        $agent_id = app('currentAgent')->id;
        // $agent_id = 78;
        $page_data = PageModel::where(['slug'=>$slug,'status'=>1, 'created_by'=>$agent_id])->first();
        $page_data->page_url = null;
        $page_data->assets_url = null;
        // dd($page_data);
        if(!is_null($page_data)){
            if($page_data->addination_cta_type == 'custom_url'){
                $page_data->addination_url = $page_data->addination_url;
            }elseif($page_data->addination_cta_type == 'page'){
                $addination_cta_page = PageModel::where(['id'=>$page_data->additional_custom_page_id,'status'=>1, 'created_by'=>$agent_id])->first();
                $page_data->addination_url = route('page',['slug'=>$addination_cta_page->slug]);
            }else{
                $asset = DB::table('tbl_assets')->where(['id'=>$page_data->asset_id])->first();
                // dd($asset);
                if($asset){
                    $page_data->addination_url = $asset->url;
                }else{
                    $page_data->addination_url = 'javascript:void(0)';
                }
            }
            if($page_data->form_type == 'page'){
                $cta_page = PageModel::where(['id'=>$page_data->page_id,'status'=>1, 'created_by'=>$agent_id])->first();
                $page_data->page_url = route('page',['slug'=>$cta_page->slug]);
            }
            if($page_data->form_type == 'assets'){
                $digital_assets = AssetModel::where(['id'=>$page_data->digital_asset_id,'status'=>1, 'created_by'=>$agent_id])->first();
                $page_data->assets_url = $digital_assets->url;
            }
            
            // dd($page_data->page_url);
            return view('front.page',compact('page_data'));
        }
        return redirect()->route('404');
    }
    public function get_page_popup_info(Request $request){
        $request->validate(['id'=>'required|integer']);
        $page_data = PageModel::select('id','form_id', 'popup_content','popup_image','embed_form_code','embed_form_status','popup_image_status','popup_content_status', 'popup_status', 'form_type')->where('id',$request->id)->first();
        $cdo_category = CDOCategoryModel::select('id','name')->where('status',1)->get();
        $product_category = ProductServiceCategory::select('id','name')->where('status',1)->get();
        // return $cdo_category;
        $id = $request->id;
        if(!is_null($page_data)){
            $data = view('front/page-popup-info',compact('page_data','cdo_category','product_category','id'))->render();
            return response()->json(['status'=>true,'data'=>$data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function get_cdo_by_cat(Request $request){
        $request->validate(['id'=>'required|integer']);
        $cdo_data = CDOModel::select('id','name')->where('category',$request->id)->get();
        // return $cdo_category;
        if(!is_null($cdo_data)){
            return response()->json(['status'=>true,'data'=>$cdo_data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function get_product_by_cat(Request $request){
        $request->validate(['id'=>'required|integer']);
        $product_data = ProductService::select('id','prod_name')->where('prod_category',$request->id)->get();
        // return $cdo_category;
        if(!is_null($product_data)){
            return response()->json(['status'=>true,'data'=>$product_data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function save_page_popup_data(Request $request)
    {
        $request->validate([
            'page_id'            => 'required|integer',
            'name'               => 'required',
            'source'             => 'required',
            'email'              => 'required|email',
            'cdo_category'       => 'required',
            'phone'              => 'required|numeric',
            'product_category'   => 'required|integer',
            'message'            => 'required',
        ]);
        $page_data = PageModel::where([
            'id'         => $request->page_id,
            'status'     => 1,
            'created_by' => app('currentAgent')->id
        ])->first();
        if(!$page_data){
            return back()->with('error','Page not found');
        }
        // API Payload
        $payload = [
            // required by API
            'form_id' => base64_encode($page_data->form_id),
            'name' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->phone,
            'message' => $request->message,
            // company => CDO
            'company' => $request->cdo_id ?? $request->cdo_category,
            // product service
            'ps_id' => $request->product_id,
            // optional extra data
            'page_id' => $request->page_id,
            'source' => $request->source,
            'tag_id' => $page_data->tag_id,
            'list_id' => $page_data->list_id,
            'other_cod' => $request->other_cod,
            'other_product_and_service' => $request->other_product_and_service,
        ];
        // Call external API
        $apiUrl = request()->getSchemeAndHttpHost() . '/admin/api/save-leads';
        $response = Http::post($apiUrl, $payload);
        dd($response);
        if($response->successful()){
            return redirect()
                ->back()
                ->with(
                    'success',
                    'Lead submitted successfully'
                );
        }
        return redirect()
            ->back()
            ->with(
                'error',
                'Lead submission failed'
            );
    }
    // public function save_page_popup_data(Request $request){
    //     $request->validate([
    //         'page_id'=>'required|integer',
    //         'name'=>'required',
    //         'source'=>'required',
    //         'email'=>'required',
    //         'cdo_category'=>'required',
    //         'phone'=>'required|numeric',
    //         'product_category'=>'required|integer',
    //         'message'=>'required',
    //     ]);
    //     $other_product = $request->other_product_and_service;
    //     $other_cod = $request->other_cod;
    //     $page_data = PageModel::where(['id'=>$request->page_id,'status'=>1, 'created_by'=>app('currentAgent')->id])->first();
    //     dd($request->all(), $page_data);
    //     // dd($page_data);
    //     $product_data = ProductService::select('id','prod_name')->where('prod_category',$request->id)->get();
    //     // return $cdo_category;
    //     if(!is_null($product_data)){
    //         return redirect()->back()->with('success','Your information has been submitted successfully!');
    //         // return response()->json(['status'=>true,'data'=>$product_data,'message'=>'Success!']);
    //     }else{
    //         return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
    //     }
    // }
    public function embed_pages($slug = NULL){
        $user_id = auth()->id();
        $agent_id = app('currentAgent')->id;
        // $agent_id = 78;
        $page_data = DB::table('tbl_embedded_pages')->where(['page_url'=>$slug,'status'=>'active', 'created_by'=> $agent_id])->first();
        // dd($page_data);
        if(is_null($page_data)){
            return redirect()->route('404');
        }
        if($page_data->login_status == 1){
            return view('web.pages.embed-page',compact('page_data')); // before login
        }else{
            if(!$user_id){
                return redirect()->route('login');
            }
            return view('dashboard.embed-page',compact('page_data')); // after login
        }
    }
    public function custom_block($slug = NULL){
        $user_id = auth()->id();
        $agent_id = app('currentAgent')->id;
        // $agent_id = 78;
        $page_data = DB::table('tbl_custom_blocks')->where(['page_url'=>$slug,'status'=>'active', 'created_by'=> $agent_id])->first();
        // dd($page_data);
        if(is_null($page_data)){
            return redirect()->route('404');
        }
        return view('dashboard.custom-block',compact('page_data')); // after login
        
    }
    public function core_page($slug){
        // dd($slug);
        $agent_id = app('currentAgent')->id;
        // $agent_id = 78;
        $bodyData = '';
        $is_banner = 0;
        $page_data = DB::table('tbl_core_pages')->where(['slug'=>$slug,'status'=>1, 'created_by'=> $agent_id, 'is_temp'=>0])->first();
        if($page_data){
            if($page_data->access_type == 'post' && is_null(auth()->id())){
                return redirect()->route('login');
            }
            if($page_data->creation_type == 'template'){
                $sections = DB::table('tbl_cp_sections')->where('cp_id', $page_data->temp_id)->get();
            }else{
                $sections = DB::table('tbl_cp_sections')->where('cp_id', $page_data->id)->get();
            }
            // $sections = DB::table('tbl_cp_sections')->where('cp_id', $page_data->id)->get();
            foreach($sections as $section){
                if($section->block_type == 1){ // Custom Block Type
                    $custom_data = DB::table('tbl_custom_blocks')->where(['id'=>$section->section_id, 'status'=>'active', 'created_by'=> $agent_id])->first();
                    if($custom_data){
                        $bodyData .= view('sections.custom-block',compact('custom_data'))->render();
                    }
                }elseif($section->block_type == 2){ // Dynamic Block Type 
                    if($section->type == 2){
                        $embedpage_data = DB::table('tbl_embedded_pages')->where(['id'=>$section->section_id, 'status'=>'active', 'created_by'=> $agent_id])->first();
                        if($embedpage_data){
                            $bodyData .= view('sections.embed-page',compact('embedpage_data'))->render();
                        }
                    }elseif($section->type == 3){
                        $cta_data = DB::table('tbl_call_to_actions')->where(['id'=>$section->section_id, 'status'=>1, 'created_by'=> $agent_id])->first();
                        if($cta_data){
                            $bodyData .= view('sections.cta-page',compact('cta_data'))->render();
                        }
                    }elseif($section->type == 4){
                        $gallery_data = DB::table('tbl_section_gallery')->where(['id'=>$section->section_id, 'status'=>'1', 'created_by'=> $agent_id])->first();
                        if($gallery_data){
                            $gallery_items = DB::table('tbl_gallery_items')->where(['gallery_id'=>$gallery_data->id])->orderBy('id', 'ASC')->get();
                            // dd($gallery_items);
                            $bodyData .= view('sections.gallery-page',compact('gallery_data', 'gallery_items'))->render();
                        }
                    }elseif($section->type == 5){
                        $navigation_data = DB::table('tbl_mininavigation')->where(['id'=>$section->section_id, 'status'=>1, 'created_by'=> $agent_id])->first();
                        if($navigation_data){
                            $bodyData .= $this->getNavigationData($navigation_data);
                        }
                    }elseif($section->type == 6){
                        $review_data = DB::table('tbl_review_feedback')->where(['id'=>$section->section_id, 'status'=>1, 'agent_id'=> $agent_id])->first();
                        if($review_data){
                            $review_setting = DB::table('tbl_review_setting')->where('agent_id', $agent_id)->first();
                            $review_items = DB::table('tbl_reviewfeedback_items')->select('tbl_customer_reviews.*')
                            ->join('tbl_customer_reviews', 'tbl_customer_reviews.id', '=', 'tbl_reviewfeedback_items.review_id')
                            ->where(['tbl_reviewfeedback_items.rf_id'=>$review_data->id])->orderBy('tbl_reviewfeedback_items.id', 'ASC')->get();
                            // dd($gallery_items);
                            $bodyData .= view('sections.review-page',compact('review_data', 'review_items', 'review_setting'))->render();
                        }
                    }
                }else{ // Static Block Type
                   if($section->section_id == 1){
                        $is_banner = 1;
                        $bodyData .= view('sections.banner')->render();
                    }else if($section->section_id == 2){
                        $bodyData .= view('sections.about-us')->render();
                    }else if($section->section_id == 5){
                        $bodyData .= view('sections.testimonials')->render();
                    }else if($section->section_id == 6){
                        $bodyData .= view('sections.features')->render();
                    }else if($section->section_id == 7){
                        $bodyData .= view('sections.easy-to-share')->render();
                    }else if($section->section_id == 9){
                        $bodyData .= view('sections.easy-to-use')->render();
                    }else if($section->section_id == 10){
                        $bodyData .= view('sections.work-matrix')->render();
                    }else if($section->section_id == 16){
                        $bodyData .= view('sections.need-help')->render();
                    }else if($section->section_id == 17){
                        $bodyData .= view('sections.how-it-works')->render();
                    }else if($section->section_id == 18){
                        $bodyData .= view('sections.faq')->render();
                    }else if($section->section_id == 30){
                        $bodyData .= view('sections.company')->render();
                    } 
                }
                
            }
            // dd($bodyData);
            return view('sections.core-page',compact('bodyData', 'page_data', 'is_banner'));
        }
        return redirect()->route('404');
    }
    
    public function getNavigationData($navigation_data)
    {
        $navigationUniqueId = 'nav_'.$navigation_data->id.'_'.uniqid();
        $agent_id = app('currentAgent')->id;
    
        $tabs = '';
        $contents = '';
    
        $defaultSections = [
            1  => ['title' => 'Walk Through',     'view' => 'sections.banner'],
            2  => ['title' => 'About Us',         'view' => 'sections.about-us'],
            5  => ['title' => 'Testimonials',     'view' => 'sections.testimonials'],
            6  => ['title' => 'Project Features', 'view' => 'sections.features'],
            7  => ['title' => 'Easy To Share',    'view' => 'sections.easy-to-share'],
            9  => ['title' => 'Easy To Use',      'view' => 'sections.easy-to-use'],
            10 => ['title' => 'Work Matrix',      'view' => 'sections.work-matrix'],
            16 => ['title' => 'Need Help',        'view' => 'sections.need-help'],
            17 => ['title' => 'How It Works',     'view' => 'sections.how-it-works'],
            18 => ['title' => 'FAQ',              'view' => 'sections.faq'],
            30 => ['title' => 'Company',          'view' => 'sections.company'],
        ];
    
        $navigation_sections = DB::table('tbl_navigation_menu')
            ->where('navigation_id', $navigation_data->id)
            ->orderBy('id')
            ->get();
    
        foreach ($navigation_sections as $key => $section) {
    
            $active = $key == 0 ? 'active' : '';
            $show   = $key == 0 ? 'active in' : '';
            $tabId = $navigationUniqueId.'_tab_'.$section->id;;
    
            $tabTitle = '';
            $html = '';
    
            switch ($section->type) {
    
                case 2:
    
                    $embedpage_data = DB::table('tbl_embedded_pages')
                        ->where([
                            'id'=>$section->section_id,
                            'status'=>'active',
                            'created_by'=>$agent_id
                        ])->first();
    
                    if($embedpage_data){
                        $tabTitle = $embedpage_data->title;
                        $html = view('sections.embed-page',compact('embedpage_data'))->render();
                    }
    
                break;
    
                case 3:
    
                    $cta_data = DB::table('tbl_call_to_actions')
                        ->where([
                            'id'=>$section->section_id,
                            'status'=>1,
                            'created_by'=>$agent_id
                        ])->first();
    
                    if($cta_data){
                        $tabTitle = $cta_data->title;
                        $html = view('sections.cta-page',compact('cta_data'))->render();
                    }
    
                break;
    
                case 4:
    
                    $gallery_data = DB::table('tbl_section_gallery')
                        ->where([
                            'id'=>$section->section_id,
                            'status'=>'1',
                            'created_by'=>$agent_id
                        ])->first();
    
                    if($gallery_data){
    
                        $tabTitle = $gallery_data->name;
    
                        $gallery_items = DB::table('tbl_gallery_items')
                            ->where('gallery_id',$gallery_data->id)
                            ->orderBy('id')
                            ->get();
    
                        $html = view('sections.gallery-page',compact('gallery_data','gallery_items'))->render();
                    }
    
                break;
    
                default:
    
                    if(isset($defaultSections[$section->section_id])){
    
                        $tabTitle = $defaultSections[$section->section_id]['title'];
    
                        if($section->section_id == 1){
    
                            $is_banner = 1;
    
                            $html = view(
                                $defaultSections[$section->section_id]['view'],
                                compact('is_banner')
                            )->render();
    
                        }else{
    
                            $html = view($defaultSections[$section->section_id]['view'])->render();
    
                        }
                    }
    
            }
    
            if(empty($html)){
                continue;
            }
    
            $tabs .= '
                <li class="nav-item">
                    <a class="nav-link '.$active.'"
                        id="'.$tabId.'-tab"
                        data-toggle="tab"
                        href="#'.$tabId.'"
                        role="tab">
                        '.$tabTitle.'
                    </a>
                </li>';
    
            $contents .= '
                <div class="tab-pane fade '.$show.'"
                    id="'.$tabId.'"
                    role="tabpanel">
                    '.$html.'
                </div>';
        }
        $logo = '';
        if($navigation_data->logo_status == 1){
            $layouts = DB::table('tbl_customlayout')->where('created_by', app('currentAgent')->id)->first();
            if($layouts && $layouts->logo){
                $logo = '<div class="navigation-logo"><img src="'.$layouts->logo.'" alt="Logo"></div>';
            }
        }
    
        return '
    <style>
    
    .navigation-wrapper{
        background:#1f5ca8;
        padding:15px;
        display:flex;
        align-items:center;
        overflow-x:auto;
    }
    
    .navigation-logo{
        margin-right:15px;
        flex:0 0 auto;
    }
    
    .navigation-logo img{
        width:45px;
        height:45px;
    }
    
    .navigation-tabs{
        display:flex;
        flex-wrap:nowrap;
        border:none;
    }
    
    .navigation-tabs .nav-item{
        margin-right:8px;
    }
    
    .navigation-tabs .nav-link{
    
        color:#fff;
        border:1px solid rgba(255,255,255,.8);
        border-radius:40px;
        background:transparent;
        padding:6px 12px;
        white-space:nowrap;
        font-weight:600;
        transition:.3s;
    }
    
    .navigation-tabs .nav-link:hover{
        background:#fff;
        color:#1f5ca8;
    }
    
    .navigation-tabs .nav-link.active{
        background:#fff;
        color:#1f5ca8;
        border-color:#fff;
    }
    
    .navigation-content{
        margin-top:25px;
    }
    
    </style>
    
    <div class="navigation-wrapper">
    
        '.$logo.'
    
        <ul class="nav navigation-tabs" id="'.$navigationUniqueId.'" role="tablist">
            '.$tabs.'
        </ul>
    
    </div>
    
    <div class="tab-content navigation-content">
        '.$contents.'
    </div>';
    }
    
    
    public function appointments($slug = NULL){
        return view('dashboard.appointments-page');
    }
    public function report($slug){
        $agent_id = app('currentAgent')->id;
        $bodyData = '';
        // $agent_id = 78;
        $page_data = DB::table('tbl_property_landingpage')->where(['slug'=>$slug,'status'=>1, 'created_by'=> $agent_id])->first();
        if(is_null($page_data)){
            return redirect()->route('404');
        }
        $property = DB::table('propertymarkets')
        ->select('propertymarkets.location', 'propertymarkets.current_status', 'propertymarket_details.date_of_booking', 'propertymarket_details.date_of_possession', 'propertymarket_details.rera_number', 'propertymarket_details.rera_link',
        'tbl_property_type.title as property_type_title', 'propertymarkets.price_from', 'propertymarkets.price_to', 'propertymarket_details.property_unit', 'propertymarket_details.property_size', 'propertymarket_details.property_size_type')
        ->leftjoin('propertymarket_details', 'propertymarket_details.property_market_id', '=','propertymarkets.id')
        ->leftjoin('tbl_property_type', 'tbl_property_type.id', '=','propertymarkets.property_type')
        ->where(['propertymarkets.id'=>$page_data->property_id,'propertymarkets.status'=>1])->first();
        // dd($property);
        if(is_null($property)){
            return redirect()->route('404');
        }
        $bannerImages = null;
        $banner = DB::table('tbl_landing_banner')->where(['id'=>$page_data->banner_id,'status'=>1])->first();
        if(!is_null($banner)){
            $bannerImages = DB::table('tbl_landing_banner_images')->select('image_url')->where('banner_id', $banner->id)->orderBy('priority', 'ASC')->get();
            // dd($bannerImages);
        }
        // dd($property);
        $navigation_data = DB::table('tbl_mininavigation')->where(['id'=>$page_data->mini_nav_id, 'status'=>1, 'created_by'=> $agent_id])->first();
        if($navigation_data){
            $bodyData .= $this->getNavigationData($navigation_data);
        }
        $cta_data = DB::table('tbl_call_to_actions')->where(['id'=>$page_data->cta_id, 'status'=>1, 'created_by'=> $agent_id])->first();
        if($cta_data){
            $bodyData .= view('sections.cta-page',compact('cta_data'))->render();
        }
        // dd($page_data);
        return view('front.landing-page',compact('bodyData', 'page_data', 'property', 'banner', 'bannerImages'));
    }
    public function preview_core_page($slug){
        // dd($slug);
        // $agent_id = app('currentAgent')->id;
        $agent_id = 8;
        $bodyData = '';
        $is_banner = 0;
        $page_data = DB::table('tbl_core_pages')->where(['slug'=>$slug,'status'=>1, 'created_by'=> $agent_id, 'is_temp'=>1])->first();
        if($page_data){
            if($page_data->access_type == 'post' && is_null(auth()->id())){
                return redirect()->route('login');
            }
            $sections = DB::table('tbl_cp_sections')->where('cp_id', $page_data->id)->get();
            foreach($sections as $section){
                if($section->block_type == 1){ // Custom Block Type
                    $custom_data = DB::table('tbl_custom_blocks')->where(['id'=>$section->section_id, 'status'=>'active', 'created_by'=> $agent_id])->first();
                    if($custom_data){
                        $bodyData .= view('sections.custom-block',compact('custom_data'))->render();
                    }
                }elseif($section->block_type == 2){ // Dynamic Block Type 
                    if($section->type == 2){
                        $embedpage_data = DB::table('tbl_embedded_pages')->where(['id'=>$section->section_id, 'status'=>'active', 'created_by'=> $agent_id])->first();
                        if($embedpage_data){
                            $bodyData .= view('sections.embed-page',compact('embedpage_data'))->render();
                        }
                    }elseif($section->type == 3){
                        $cta_data = DB::table('tbl_call_to_actions')->where(['id'=>$section->section_id, 'status'=>1, 'created_by'=> $agent_id])->first();
                        if($cta_data){
                            $bodyData .= view('sections.cta-page',compact('cta_data'))->render();
                        }
                    }elseif($section->type == 4){
                        $gallery_data = DB::table('tbl_section_gallery')->where(['id'=>$section->section_id, 'status'=>'1', 'created_by'=> $agent_id])->first();
                        if($gallery_data){
                            $gallery_items = DB::table('tbl_gallery_items')->where(['gallery_id'=>$gallery_data->id])->orderBy('id', 'ASC')->get();
                            // dd($gallery_items);
                            $bodyData .= view('sections.gallery-page',compact('gallery_data', 'gallery_items'))->render();
                        }
                    }elseif($section->type == 5){
                        $navigation_data = DB::table('tbl_mininavigation')->where(['id'=>$section->section_id, 'status'=>1, 'created_by'=> $agent_id])->first();
                        if($navigation_data){
                            $bodyData .= $this->getNavigationData($navigation_data);
                        }
                    }
                }else{ // Static Block Type
                   if($section->section_id == 1){
                        $is_banner = 1;
                        $bodyData .= view('sections.banner')->render();
                    }else if($section->section_id == 2){
                        $bodyData .= view('sections.about-us')->render();
                    }else if($section->section_id == 5){
                        $bodyData .= view('sections.testimonials')->render();
                    }else if($section->section_id == 6){
                        $bodyData .= view('sections.features')->render();
                    }else if($section->section_id == 7){
                        $bodyData .= view('sections.easy-to-share')->render();
                    }else if($section->section_id == 9){
                        $bodyData .= view('sections.easy-to-use')->render();
                    }else if($section->section_id == 10){
                        $bodyData .= view('sections.work-matrix')->render();
                    }else if($section->section_id == 16){
                        $bodyData .= view('sections.need-help')->render();
                    }else if($section->section_id == 17){
                        $bodyData .= view('sections.how-it-works')->render();
                    }else if($section->section_id == 18){
                        $bodyData .= view('sections.faq')->render();
                    }else if($section->section_id == 30){
                        $bodyData .= view('sections.company')->render();
                    } 
                }
                
            }
            // dd($bodyData);
            return view('sections.core-page',compact('bodyData', 'page_data', 'is_banner'));
        }
        return redirect()->route('404');
    }
    
}