<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use App\Models\BannerModel;
use App\Models\EasytoShareModel;
use App\Models\EasytoUseModel;
use App\Models\FaqCategoryModel;
use App\Models\FaqModel;
use App\Models\FeatureModel;
use App\Models\ReviewSettingModel;
use App\Models\ServiceCategoryModel;
use App\Models\ServiceModel;
use App\Models\TestimonialsModel;
use App\Models\OurClientsModel;
use App\Models\QuicklyAnalyzeModel;
use App\Models\SubscribeModel;
use App\Models\Cms;
use App\Models\WorkMatrixModel;
use App\Models\NeedHelpModel;
use App\Models\HowItWorkModel;
use App\Models\AboutUsModel;
use App\Models\MeetTeamModel;
use App\Models\TeamDetailModel;
use App\Models\MeetCategoryModel;
use App\Models\AffiliateEnquiryModel;
use App\Models\SubscriptionPlan;
use App\Models\PlanFeature;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\UserWallet;
use App\Models\PlanTypeModel;
use App\Models\CdbFeature;
use App\Models\CdbPlanModel;
use App\Models\CdbPlanFeature;
use App\Models\CdbTransactionModel;
use App\Mail\BecomeAgent;
use App\Models\LeadMagnetModel;
use App\Models\LeadMagenetModel1;
use App\Models\BookingTypeModel;
use App\Models\MasterBookingCms;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PageController;
// use function Adminer\redirect;
// use function Adminer\redirect;
class WebController extends Controller
{
    public function index()
    {
        return $this->core_page('index');
        // dd(app('currentAgent')->id);
        $quickly_analyze = QuicklyAnalyzeModel::where('status', 1)->limit(6)->orderBy('id', 'DESC')->get();
        $banners = BannerModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('id', 'DESC')->get();
        $clients = OurClientsModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('id', 'DESC')->limit(12)->get();
        $services = ServiceModel::select('ws_services.*', 'ws_servicecategory.title as category_name', 'ws_servicecategory.slug as category_slug')->join('ws_servicecategory', 'ws_servicecategory.id', '=', 'ws_services.category_id')->where(['ws_services.status' => 1, 'ws_services.created_by' => app('currentAgent')->id])->orderBy('ws_services.id', 'ASC')->get();
        $easytoshare = EasytoShareModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('id', 'DESC')->get();
        $easytouse = EasytoUseModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->limit(6)->orderBy('id', 'DESC')->get();
        $workmatrix = WorkMatrixModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('priority', 'DESC')->get();
        $needhelp = NeedHelpModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
        $how_it_works = HowItWorkModel::where(['status' => 1, 'created_by' => app('currentAgent')->id, 'category' => 1])->orderBy('step', 'ASC')->get();
        $testimonials = OurClientsModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('id', 'DESC')->limit(3)->get();
        return view('web.pages.index', compact('banners', 'services', 'testimonials', 'clients', 'quickly_analyze', 'easytoshare', 'easytouse', 'needhelp', 'workmatrix', 'how_it_works'));
    }
    public function core_page($type)
    {
        $agent_id = app('currentAgent')->id;
        // dd($agent_id);
        // $agent_id = 78;
        $bodyData = '';
        $is_banner = 0;
        $page_data = DB::table('tbl_core_pages')->where(['page_type' => $type, 'status' => 1, 'created_by' => $agent_id])->first();
        // dd($page_data);
        if ($page_data) {
              $controller = app(PageController::class);

            return $controller->core_page($page_data->slug);
            if ($page_data->access_type == 'post' && is_null(auth()->id())) {
                return redirect()->route('login');
            }
            $sections = DB::table('tbl_cp_sections')->where('cp_id', $page_data->id)->get();
            foreach ($sections as $section) {
                if ($section->type == 2) {
                    $embedpage_data = DB::table('tbl_embedded_pages')->where(['id' => $section->section_id, 'status' => 'active', 'created_by' => $agent_id])->first();
                    if ($embedpage_data) {
                        $bodyData .= view('sections.embed-page', compact('embedpage_data'))->render();
                    }
                } elseif ($section->type == 3) {
                    $cta_data = DB::table('tbl_call_to_actions')->where(['id' => $section->section_id, 'status' => 1, 'created_by' => $agent_id])->first();
                    if ($cta_data) {
                        $bodyData .= view('sections.cta-page', compact('cta_data'))->render();
                    }
                } else {
                    if ($section->section_id == 1) {
                        $is_banner = 1;
                        $bodyData .= view('sections.banner')->render();
                    } else if ($section->section_id == 2) {
                        $bodyData .= view('sections.about-us')->render();
                    } else if ($section->section_id == 5) {
                        $bodyData .= view('sections.testimonials')->render();
                    } else if ($section->section_id == 6) {
                        $bodyData .= view('sections.features')->render();
                    } else if ($section->section_id == 7) {
                        $bodyData .= view('sections.easy-to-share')->render();
                    } else if ($section->section_id == 9) {
                        $bodyData .= view('sections.easy-to-use')->render();
                    } else if ($section->section_id == 10) {
                        $bodyData .= view('sections.work-matrix')->render();
                    } else if ($section->section_id == 16) {
                        $bodyData .= view('sections.need-help')->render();
                    } else if ($section->section_id == 17) {
                        $bodyData .= view('sections.how-it-works')->render();
                    } else if ($section->section_id == 18) {
                        $bodyData .= view('sections.faq')->render();
                    } else if ($section->section_id == 30) {
                        $bodyData .= view('sections.company')->render();
                    }
                }
            }
            // dd($bodyData);
            return view('sections.core-page', compact('bodyData', 'page_data', 'is_banner'));
        }
        return redirect()->route('404');
    }
    public function how_it_works()
    {
        $easytoshare = EasytoShareModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('id', 'DESC')->get();
        $easytouse = EasytoUseModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->limit(6)->orderBy('id', 'DESC')->get();
        return view('web.pages.how-it-works', compact('easytoshare', 'easytouse'));
    }
    public function features()
    {
        $features = FeatureModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('id', 'DESC')->get();
        return view('web.pages.features', compact('features'));
    }
    public function about_us()
    {
        // Fetch the latest active About Us record
        $about = AboutUsModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->latest()->first();
        // dd($about);
        // Pass it to the view
        return view('web.pages.about-us', compact('about'));
    }
    public function faq()
    {
        // dd(app('currentAgent')->id);
        $categories = FaqCategoryModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('priority', 'DESC')->get();
        $faqData = [];
        foreach ($categories as $category) {
            $faqs = FaqModel::where(['category' => $category->id, 'created_by' => app('currentAgent')->id])
                ->get(['id', 'title', 'description', 'status', 'created_by', 'created_at', 'updated_at']);
            $faqData[] = [
                'category' => $category,
                'faqs' => $faqs,
            ];
        }
        // dd($faqData);
        return view('web.pages.faq', compact('faqData', 'categories'));
    }
    public function price2()
    {
        $user = Auth()->user();
        $plan_type = PlanTypeModel::where('status', 1)->orderBy('total_days', 'ASC')->get();
        $cdb_plans = CdbPlanModel::where(['status' => 1, 'agent_id' => app('currentAgent')->id])->orderBy('id', 'ASC')->get();
        $c_feature = CdbFeature::all();
        $have_cdb_plan = 0;
        $active_user_plan = null;
        if (!is_null($user->package_id)) {
            $active_user_plan = CdbPlanModel::select('id', 'monthly_price')->where(['id' => $user->package_id, 'status' => 1, 'agent_id' => app('currentAgent')->id])->first();
            $have_cdb_plan = 1;
        }
        // dd($user);
        $plans = SubscriptionPlan::where(['status' => 1])->orderBy('priority', 'ASC')->get();
        $features = PlanFeature::all();
        $have_any_plan = 1;
        $is_active_plan = 1;
        $active_agent_plan = null;
        $agent = DB::table('agents')->where('email', $user->email)->first();
        if ($agent) {
            $have_any_plan = 2;
            if (empty($agent->valid_upto) || Carbon::parse($agent->valid_upto)->isPast()) {
            } else {
                $active_agent_plan = SubscriptionPlan::select('id', 'monthly_price')->where(['id' => $agent->package_id, 'status' => 1])->first();
                $is_active_plan = 2;
            }
        }
        // dd($active_agent_plan);
        return view('web.pages.price2', compact('plans', 'features', 'have_any_plan', 'is_active_plan', 'active_agent_plan', 'agent', 'cdb_plans', 'c_feature', 'have_cdb_plan', 'plan_type', 'active_user_plan', 'user'));
    }
    public function getReferralCode()
    {
        $referral_code = '1CRAPP-AGT' . rand(100000, 999999);
        if (DB::table('agents')->where('referral_code', $referral_code)->exists()) {
            $this->getReferralCode();
        }
        return $referral_code;
    }
    public function help()
    {
        $needhelp = NeedHelpModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
        return view('web.pages.help', compact('needhelp'));
    }
    public function resources_tools()
    {
        return view('web.pages.resources-tools');
    }
    public function meet_team()
    {
        // Get the main Meet Team page content (assumed only one active row)
        $meetTeam = MeetTeamModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->first();
        // Get all categories active
        $categories = MeetCategoryModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->get();
        // Get all team details grouped by category id for easy use in view
        $teamDetails = TeamDetailModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->get()->groupBy('category_id');
        $needhelp = NeedHelpModel::where(['status' => 1, 'created_by' => app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
        return view('web.pages.meet-team', compact('meetTeam', 'categories', 'teamDetails', 'needhelp'));
    }
    public function Signup_subscribe(Request $request)
    {
        // dd(url()->previous());
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $agentId = app('currentAgent')->id;
        $alreadySubscribed = SubscribeModel::where('email', $email)->exists();
        if ($alreadySubscribed) {
            return redirect()->to(url()->previous())->with('error', 'You have already subscribed with this email. Please try a different one.');
        }
        $subscription = SubscribeModel::create([
            'email' => $email,
            'agent_id' => $agentId,
        ]);
        if ($subscription) {
            return redirect()->to(url()->previous())->with('success', 'Thank you for subscribing!');
        }
        return redirect()->to(url()->previous())->with('error', 'Subscription failed!');
    }
    public function privacy_policy()
    {
        $privacy = Cms::where(['slug' => 'privacy-policy', 'created_by' => app('currentAgent')->id])->first();
        return view('front.privacy-policy', compact('privacy'));
    }
    public function terms_conditions()
    {
        $terms = Cms::where(['slug' => 'terms-and-conditions', 'created_by' => app('currentAgent')->id])->first();
        return view('front.terms-conditions', compact('terms'));
    }
    public function data_deletion()
    {
        $data = Cms::where(['slug' => 'data-deletion', 'created_by' => app('currentAgent')->id])->first();
        return view('front.data-deletion', compact('data'));
    }
    public function editorial_policy()
    {
        $editorials = Cms::where(['slug' =>  'editorial-policy', 'created_by' => app('currentAgent')->id])->first();
        return view('front.editorial-policy', compact('editorials'));
    }
    public function cookie_policy()
    {
        $cookies = Cms::where(['slug' =>  'cookie-policy', 'created_by' => app('currentAgent')->id])->first();
        return view('front.cookie-policy', compact('cookies'));
    }
    public function disclaimers()
    {
        $disclaimer = Cms::where(['slug' => 'disclaimers', 'created_by' => app('currentAgent')->id])->first();
        return view('front.disclaimers', compact('disclaimer'));
    }
    public function accessibility()
    {
        $access = Cms::where(['slug' => 'accessibility', 'created_by' => app('currentAgent')->id])->first();
        return view('front.accessibility', compact('access'));
    }
    public function realtors()
    {
        return view('web.pages.realtors');
    }
    public function investors()
    {
        return view('web.pages.investors');
    }
    public function realtors_menu_popup()
    {
        return view('web.pages.realtors-menu-popup');
    }
    public function investors_menu_popup()
    {
        return view('web.pages.investors-menu-popup');
    }
    public function saveAffiliateEnquiry(Request $req)
    {
        // Validate request
        $req->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_no' => 'required',
            'monthly_referrals' => 'nullable',
            'message' => 'nullable'
        ]);
        // Save the enquiry including current agent ID
        AffiliateEnquiryModel::create([
            'first_name' => $req->first_name,
            'email' => $req->email,
            'contact_no' => $req->contact_no,
            'monthly_referrals' => $req->monthly_referrals,
            'message' => $req->message,
            'agent_id' => optional(app('currentAgent'))->id,
        ]);
        // Redirect to specific URL with success message
        return redirect(url('/thank-you-affiliate'))
            ->with('success', 'Thank you! Your affiliate request has been submitted.');
        // return back()->with('success', 'Thank you! Your affiliate request has been submitted.');
    }
    public function submitForm(Request $request)
    {
        // Validate form (adjust fields as needed)
        $request->validate([
            'overall_experience' => 'required|integer',
            'recommend_rating' => 'required|integer',
            'easy_to_manage' => 'required|integer',
            'suggestion' => 'nullable|string',
        ]);
        // Insert into DB
        DB::table('tbl_app_feedback')->insert([
            'overall_experience' => $request->overall_experience,
            'recommend_rating' => $request->recommend_rating,
            'easy_to_manage' => $request->easy_to_manage,
            'suggestion' => $request->suggestion,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
    public function review(Request $request)
    {
        $request->validate([
            'rating'      => 'required|integer|min:1|max:5',
            'review_text' => 'required',
            // 'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        // User Must be Logged In
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to submit a review.');
        }
        // Get user data
        $user = auth()->user();
        // Image upload
        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imageName = time() . '_' . $request->image->getClientOriginalName();
        //     $request->image->move(public_path('uploads/reviews'), $imageName);
        //     $imagePath = 'uploads/reviews/' . $imageName;
        // }
        // Insert into tbl_reviews
        DB::table('tbl_reviews')->insert([
            'name'        => $user->name,          // AUTO USER NAME
            'rating'      => $request->rating,
            'review_text' => $request->review_text,
            // 'image'       => $imagePath,
            'status'      => 1,
            'created_by'  => $user->id,            // LOGIN USER ID
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
    public function lead_magnet(Request $request)
    {
        // dd($request->post_headline_visible);
        // Validation (optional but recommended)
        $request->validate([
            'page_name' => 'required|string|max:255',
            'pre_headline' => 'required|string|max:255',
            'headline' => 'required|string|max:255',
            'post_headline' => 'nullable|string|max:255',
            'bullet1' => 'nullable|string|max:255',
            'bullet2' => 'nullable|string|max:255',
            'bullet3' => 'nullable|string|max:255',
            'bullet4' => 'nullable|string|max:255',
            'bullet5' => 'nullable|string|max:255',
            'bullet6' => 'nullable|string|max:255',
            'media_type' => 'nullable|string|max:50',
            'media_embeded_code' => 'nullable',
            'countdown_datetime' => 'nullable|date',
            'pre_cta' => 'nullable|string|max:255',
            'pre_cta_visible' => 'nullable',
            'ps_text' => 'nullable|string|max:255',
            'ps_text_visible' => 'nullable',
            'page_cta_url' => 'nullable|string|max:255',
            'popup_type' => 'nullable|in:1,2',
            'custom_form_id' => 'nullable|integer',
            'form_embed_code' => 'nullable|string',
            'enter_cta_url' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_sub_title' => 'nullable|string|max:255',
            'public_type' => 'nullable|in:pre-login,post-login',
        ]);
        // Checkbox handling: agar unchecked ho toh 0 set karo
        $data = $request->all();
        $checkboxes = [
            'pre_headline_visible',
            'headline_visible',
            'post_headline_visible',
            'bullet_status',
            'media_visible',
            'countdown_visible',
            'pre_cta_visible',
            'ps_text_visible',
            'popup_enable',
            'page_cta_url_visible',
            'page_new_tab',
            'is_public',
        ];
        if ($request->hasFile('media_path')) {
            // 👉 If updating, delete old file first
            if ($request->id) {
                $lead_data = LeadMagnetModel::find($request->id);
                if ($lead_data && $lead_data->media_path && file_exists(public_path($lead_data->media_path))) {
                    unlink(public_path($lead_data->media_path)); // 🔥 delete old file
                }
            }
            // 👉 Upload new file
            $uploadPath = public_path('uploads/lead_magnets');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file = $request->file('media_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $logoPath = 'uploads/lead_magnets/' . $filename;
        }
        foreach ($checkboxes as $cb) {
            $data[$cb] = $request->has($cb) ? 1 : 0;
        }
        $data['media_path'] = $logoPath ?? $request->media_path ?? null;
        $data['user_id'] = auth()->id();
        $data['agent_id'] = app('currentAgent')->id;
        $data['page_url'] = Str::slug($request->page_name);
        // dd($data);
        // Save data to database
        if ($request->id) {
            $lead = LeadMagnetModel::find($request->id);
            if ($lead) {
                $lead->update($data);
            }
        } else {
            $lead = LeadMagnetModel::create($data);
        }
        // company details save
        $companylogoPath = null;
        if ($request->hasFile('company_logo')) {
            if ($request->id) {
                $company_details = LeadMagenetModel1::where('lead_magnet_id', $request->id)->first();
                if ($company_details && $company_details->company_logo && file_exists(public_path($company_details->company_logo))) {
                    unlink(public_path($company_details->company_logo)); // 🔥 delete old file
                }
            }
            // Make sure the uploads/company_logo folder exists
            $uploadPath = public_path('uploads/lead_magnets');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true); // recursive create
            }
            $file = $request->file('company_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $companylogoPath = 'uploads/lead_magnets/' . $filename; // store relative path in DB
        } else {
            $company_details = LeadMagenetModel1::where('lead_magnet_id', $request->id)->first();
            $companylogoPath = $company_details->company_logo ?? null;
        }
        $company_details = LeadMagenetModel1::updateOrCreate(
            [
                'lead_magnet_id' => $lead->id // 🔥 condition
            ],
            [
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone' => $request->company_phone,
                'company_address' => $request->company_address,
                'company_website' => $request->company_website,
                'company_logo'    => $companylogoPath ?? null,
                'header_footer_bg_color' => $request->header_footer_bg_color,
                'button_bg_color' => $request->button_bg_color,
                'header_footer_text_color' => $request->header_footer_text_color,
                'button_text_color' => $request->button_text_color,
            ]
        );
        // Redirect back with success message
        return redirect()->route('lead-magnet-form')->with('success', 'Lead Magnet Saved Successfully!');
    }
    public function lead_magenet1(Request $request)
    {
        // Debug all request data
        // dd($request->all());
        // ================= Validation =================
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string|max:500',
            'company_website' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'header_footer_bg_color' => 'nullable|string|max:20',
            'button_bg_color' => 'nullable|string|max:20',
            'header_footer_text_color' => 'nullable|string|max:20',
            'button_text_color' => 'nullable|string|max:20',
        ]);
        // ================= File Upload =================
        if ($request->hasFile('company_logo')) {
            // Make sure the uploads/company_logo folder exists
            $uploadPath = public_path('uploads/company_logo');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true); // recursive create
            }
            $file = $request->file('company_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $logoPath = 'uploads/company_logo/' . $filename; // store relative path in DB
        } else {
            $logoPath = null;
        }
        // ================= Save Data =================
        $lead = LeadMagenetModel1::create([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_email_type' => $request->company_email_type,
            'company_phone' => $request->company_phone,
            'company_phone_type' => $request->company_phone_type,
            'company_address' => $request->company_address,
            'company_website' => $request->company_website,
            'company_logo' => $logoPath,
            'header_footer_bg_color' => $request->header_footer_bg_color,
            'button_bg_color' => $request->button_bg_color,
            'header_footer_text_color' => $request->header_footer_text_color,
            'button_text_color' => $request->button_text_color,
        ]);
        // Debug saved record
        // dd($lead);
        // Redirect back with success message
        return redirect()->back()->with('success', 'Company details saved successfully!');
    }
    //business card
    public function businessCard($slug = null)
    {
        $agent_id = app('currentAgent')->id;
        $card = DB::table('tbl_businesscard')->select('tbl_businesscard.*', 'rk_countries.name as country_name', 'rk_states.name as state_name', 'rk_cities.name as city_name')
            ->leftjoin('rk_countries', 'rk_countries.id', '=', 'tbl_businesscard.country')
            ->leftjoin('rk_states', 'rk_states.id', '=', 'tbl_businesscard.state')
            ->leftjoin('rk_cities', 'rk_cities.id', '=', 'tbl_businesscard.city')
            ->where('tbl_businesscard.user_id', $agent_id)
            ->where('tbl_businesscard.category', 1);
        if ($slug) {
            $card = $card->where('tbl_businesscard.link_slug', $slug);
        } else {
            $card = $card->where('tbl_businesscard.is_public', 1);
        }
        $card = $card->orderBy('tbl_businesscard.id', 'desc')
            ->first();
        return view('front.business-card-new', compact('card'));
    }
    //customer business card
    public function CustomerBusinessCard($slug = null)
    {
        // $agent_id = app('currentAgent')->id;
        $card = DB::table('tbl_businesscard')->select('tbl_businesscard.*', 'rk_countries.name as country_name', 'rk_states.name as state_name', 'rk_cities.name as city_name')
            ->leftjoin('rk_countries', 'rk_countries.id', '=', 'tbl_businesscard.country')
            ->leftjoin('rk_states', 'rk_states.id', '=', 'tbl_businesscard.state')
            ->leftjoin('rk_cities', 'rk_cities.id', '=', 'tbl_businesscard.city')
            // ->where('tbl_businesscard.user_id', $agent_id)
            ->where('tbl_businesscard.category', 2)
            ->orWhere('tbl_businesscard.is_public', 1)
            ->where('tbl_businesscard.link_slug', $slug)
            ->orderBy('tbl_businesscard.id', 'desc')
            ->first();
        // dd($card);
        return view('front.business-card-new', compact('card'));
    }
    // booking page
    public function master_booking()
    {
        $cms = MasterBookingCms::with('features')->where(['status' => 1, 'agent_id' => app('currentAgent')->id])->first();
        if (is_null($cms)) {
            abort(404);
        }
        $averageRating = DB::table('tbl_customer_reviews')->where('agent_id', app('currentAgent')->id)->avg('rating');
        $totalReview = DB::table('tbl_customer_reviews')->where('agent_id', app('currentAgent')->id)->count();
        $reviews = DB::table('tbl_customer_reviews')->where('agent_id', app('currentAgent')->id)->limit(3)->orderBy('id', 'DESC')->get();
        $allreviews = DB::table('tbl_customer_reviews')->where('agent_id', app('currentAgent')->id)->get();
        $agent = DB::table('agents')->where('id', app('currentAgent')->id)->first();
        $list = BookingTypeModel::select('title', 'slug', 'page_slug', 'content', 'duration')->where(['status' => '1', 'agent_id' => app('currentAgent')->id])->whereIn('id', explode(',', $cms->type_ids))->orderBy('id', 'ASC')->get();
        $testimonials = TestimonialsModel::select('*')->where(['created_by' => app('currentAgent')->id, 'status' => 1])->whereIn('id', explode(',', $cms->testimonial_ids))->orderBy('id', 'DESC')->limit(1)->get();
        //    dd($cms, $agent, $list);
        return view('front.master-booking', compact('list', 'cms', 'agent', 'testimonials', 'reviews', 'allreviews', 'averageRating', 'totalReview'));
    }
    public function booking_type($slug)
    {
        $bookingType = BookingTypeModel::with([
            'availability.weeklyDays.windows',
            'availability.specificDates.windows',
            'availability.blockedDates',
        ])
            ->where('page_slug', $slug)
            ->where('status', '1')
            ->where('agent_id', app('currentAgent')->id)
            ->firstOrFail();
            
        $timezone = 'Asia/Kolkata';
        $now = Carbon::now($timezone);
        $bookingDaysAhead = (int) ($bookingType->booking_days_ahead ?? 0); 
        $noticeTime = (int) ($bookingType->notice_time ?? 0); 
        $noticeTimeType = strtolower(trim($bookingType->notice_time_type ?? 'minutes')); 
        $noticeUntil = $now->copy();

        if ($noticeTime > 0) {
            switch ($noticeTimeType) {
                case 'minute':
                case 'minutes':
                    $noticeUntil->addMinutes($noticeTime);
                    break;

                case 'hour':
                case 'hours':
                    $noticeUntil->addHours($noticeTime);
                    break;

                case 'day':
                case 'days':
                    $noticeUntil->addDays($noticeTime);
                    break;

                default:
                    // Safety fallback
                    $noticeUntil->addMinutes($noticeTime);
                    break;
            }
        }
        // dd($noticeUntil);
        /*
        |--------------------------------------------------------------------------
        | BOOKING DATA
        |--------------------------------------------------------------------------
        */
        $bookingData = [
            'id' => $bookingType->id,
            'title' => $bookingType->title,
            'duration' => (int) $bookingType->duration,
            /*
            |--------------------------------------------------------------------------
            | AVAILABILITY
            |--------------------------------------------------------------------------
            */
            'availability_status' => (int)
            $bookingType->availability_status,
            'availability_type' => $bookingType->availability
                ? $bookingType->availability->type
                : null,
            /*
            |--------------------------------------------------------------------------
            | INTERVAL
            |--------------------------------------------------------------------------
            */
            'interval' => (int) (
                $bookingType->time_slot_intervals ?? 30
            ),
            'interval_type' =>
            $bookingType->interval_type ?? 'minutes',
            /*
            |--------------------------------------------------------------------------
            | BOOKING DAYS AHEAD
            |--------------------------------------------------------------------------
            */
            'booking_days_ahead' =>
            $bookingDaysAhead,
            /*
            |--------------------------------------------------------------------------
            | NOTICE TIME
            |--------------------------------------------------------------------------
            */
            'notice_time' =>
            $noticeTime,
            'notice_time_type' =>
            $noticeTimeType,
            /*
            |--------------------------------------------------------------------------
            | IMPORTANT:
            | SEND SERVER TIME + NOTICE CUTOFF TO JAVASCRIPT
            |--------------------------------------------------------------------------
            */
            'current_time' => $now->toIso8601String(),
            'notice_until' => $noticeUntil->toIso8601String(),
            'timezone' => $timezone,
            /*
            |--------------------------------------------------------------------------
            | WEEKLY DAYS
            |--------------------------------------------------------------------------
            */
            'weekly_days' =>
            $bookingType->availability &&
                $bookingType->availability->weeklyDays
                ? $bookingType->availability
                ->weeklyDays
                ->map(function ($day) {
                    return [
                        'day_of_week' =>
                        (int) $day->day_of_week,
                        'status' =>
                        (int) $day->status,
                        'windows' =>
                        $day->windows
                            ->map(function ($window) {
                                return [
                                    'start_time' =>
                                    $window->start_time,
                                    'end_time' =>
                                    $window->end_time,
                                ];
                            })
                            ->values()
                            ->toArray(),
                    ];
                })
                ->values()
                ->toArray()
                : [],
            /*
            |--------------------------------------------------------------------------
            | SPECIFIC DATES
            |--------------------------------------------------------------------------
            */
            'specific_dates' =>
            $bookingType->availability &&
                $bookingType->availability->specificDates
                ? $bookingType->availability
                ->specificDates
                ->map(function ($date) {
                    return [
                        'date' =>
                        $date->date,
                        'windows' =>
                        $date->windows
                            ->map(function ($window) {
                                return [
                                    'start_time' =>
                                    $window->start_time,
                                    'end_time' =>
                                    $window->end_time,
                                ];
                            })
                            ->values()
                            ->toArray(),
                    ];
                })
                ->values()
                ->toArray()
                : [],
            /*
            |--------------------------------------------------------------------------
            | BLOCKED DATES
            |--------------------------------------------------------------------------
            */
            'blocked_dates' =>
            $bookingType->availability &&
                $bookingType->availability->blockedDates
                ? $bookingType->availability
                ->blockedDates
                ->pluck('blocked_date')
                ->map(function ($date) {
                    return substr(
                        (string) $date,
                        0,
                        10
                    );
                })
                ->unique()
                ->values()
                ->toArray()
                : [],
        ];
        // dd($bookingData);
        $reviews = DB::table('tbl_customer_reviews')->where(['agent_id'=> app('currentAgent')->id, 'type'=>1, 'type_id' => $bookingType->id])->whereIn('status', ['2','3','4'])->limit(10)->orderBy('id', 'DESC')->get();
        $averageRating = DB::table('tbl_customer_reviews')->where(['agent_id'=> app('currentAgent')->id, 'type'=>1, 'type_id' => $bookingType->id])->whereIn('status', ['2','3','4'])->avg('rating');
        $totalReview = DB::table('tbl_customer_reviews')->where(['agent_id'=> app('currentAgent')->id, 'type'=>1, 'type_id' => $bookingType->id])->whereIn('status', ['2','3','4'])->count();
        $cms = MasterBookingCms::with('features')->where(['status' => 1, 'agent_id' => app('currentAgent')->id])->first();
        $agent = DB::table('agents')->where('id', app('currentAgent')->id)->first();
        $formdata = $this->getForm($bookingType->form_id);
        return view(
            'front.booking-type',
            compact(
                'bookingType',
                'bookingData', 'formdata', 'agent', 'cms', 'reviews', 'averageRating', 'totalReview'
            )
        );
    }
    function getForm($formId)
    {
        $response = Http::get('https://www.admin.1crapp.com/api/get-embeded-fields/' . $formId);
        if ($response->successful()) {
            $result = $response->json();
            if ($result['status']) {
                return $result['form'];
            }
        } else {
            return null;
        }
    }

    // public function getBookedSlots(Request $request)
    // {
    //     $request->validate([
    //         'booking_type_id' => 'required|integer',
    //         'booking_date'    => 'required|date',
    //     ]);

    //     $bookedSlots = DB::table('tbl_booking_list')
    //         ->where('agent_id', app('currentAgent')->id)
    //         ->where('booking_type_id', $request->booking_type_id)
    //         ->whereDate('booking_date', $request->booking_date)
    //         ->whereIn('status', [2, 3, 4]) // Pending + Approved
    //         ->get([
    //             'start_time',
    //             'end_time',
    //         ]);

    //     return response()->json([
    //         'status' => true,
    //         'booked_slots' => $bookedSlots,
    //     ]);
    // }
    public function getBookedSlots(Request $request)
    {
        $request->validate([
            'booking_type_id' => 'required|integer',
            'booking_date'    => 'required|date',
        ]);

        $agentId = app('currentAgent')->id;

        // Existing appointment bookings
        $bookedSlots = DB::table('tbl_booking_list')
            ->where('agent_id', $agentId)
            ->where('booking_type_id', $request->booking_type_id)
            ->whereDate('booking_date', $request->booking_date)
            ->whereIn('status', [2, 3, 4])
            ->get([
                'start_time',
                'end_time',
            ]);

        // Existing events
        $eventSlots = DB::table('tbl_event_list') // <-- change table name
            ->where('agent_id', $agentId)
            ->whereDate('date', $request->booking_date)
            // ->whereIn('status', [1]) // change according to your event status
            ->get([
                'start_time',
                'end_time',
            ]);

        return response()->json([
            'status' => true,
            'booked_slots' => $bookedSlots,
            'event_slots' => $eventSlots,
        ]);
    }
    public function booking_review($slug)
    {
        $bookingType = BookingTypeModel::select('id')->where('page_slug', $slug)
            ->where('status', '1')
            ->where('agent_id', app('currentAgent')->id)
            ->firstOrFail();
        $setting = ReviewSettingModel::where(['setting_id' => 1, 'agent_id' => app('currentAgent')->id])->first();
        // dd($setting);
        return view('front.booking-review', compact('setting', 'bookingType'));
    }
    public function saveReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],
            'designation' => [
                'nullable',
                'string',
                'max:255',
            ],
            'department' => [
                'nullable',
                'string',
                'max:255',
            ],
            'organisation' => [
                'nullable',
                'string',
                'max:255',
            ],
            'location' => [
                'nullable',
                'string',
                'max:255',
            ],
            'rating' => [
                'nullable',
                'integer',
                'min:1',
                'max:5',
            ],
            'review' => [
                'nullable',
                'string',
            ],
            'video_url' => [
                'nullable',
                'url',
                'max:500',
            ],
            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'video_file' => [
                'nullable',
                'mimes:mp4,mov,webm',
                'max:20480',
            ],
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',
            'rating.min' => 'Please select a valid rating.',
            'rating.max' => 'Rating cannot be more than 5.',
            'profile_photo.image' => 'Profile photo must be an image.',
            'profile_photo.mimes' => 'Profile photo must be JPG, JPEG, PNG or WEBP.',
            'profile_photo.max' => 'Profile photo cannot exceed 2MB.',
            'video_file.mimes' => 'Video must be MP4, MOV or WEBM.',
            'video_file.max' => 'Video cannot exceed 20MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // DB::beginTransaction();
        // try {
        /*
            |--------------------------------------------------------------------------
            | Profile Photo
            |--------------------------------------------------------------------------
            */
        $profilePhoto = null;
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');

            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('reviews/profile'),
                $filename
            );

            // Full URL
            $profilePhoto = asset('reviews/profile/' . $filename);
        }
        /*
            |--------------------------------------------------------------------------
            | Video File
            |--------------------------------------------------------------------------
            */
        $videoFile = null;
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');

            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            $directory = public_path('reviews/videos');

            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $file->move($directory, $filename);

            $videoFile = asset('reviews/videos/' . $filename);
        }
        /*
            |--------------------------------------------------------------------------
            | Save Review
            |--------------------------------------------------------------------------
            */
        $review = DB::table('tbl_customer_reviews')->insertGetId([
            'agent_id' => app('currentAgent')->id ?? null,
            'type' => 1,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'department' => $request->department,
            'organisation' => $request->organisation,
            'location' => $request->location,
            'rating' => $request->rating,
            'review' => $request->review,
            'profile_photo' => $profilePhoto,
            'video_url' => $request->video_url,
            'video_file' => $videoFile,
            'consent' => $request->has('consent') ? 1 : 0,
            // Pending until admin approves it
            'status' => '1',
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // DB::commit();
        return redirect()->route('review.thank-you', ['id' => base64_encode($review)])->with('success', 'Thank you! Your review has been submitted successfully.');
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Thank you! Your review has been submitted successfully.',
        //     'data' => $review,
        // ]);
        // } catch (\Throwable $e) {
        //     DB::rollBack();
        //     return redirect()->back()->with('error', 'An error occurred while submitting your review. Please try again later.');
        // }
    }
    public function thank_you_review($id)
    {
        $reviewId = base64_decode($id);
        $review = DB::table('tbl_customer_reviews')->where('id', $reviewId)->first();
        if (!$review) {
            return redirect()->route('404');
        }
        return view('front.thankyou-review', compact('review'));
    }

    public function checkout()
    {
        return view('web.pages.checkout-design');
    }
}
