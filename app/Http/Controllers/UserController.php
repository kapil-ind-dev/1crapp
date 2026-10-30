<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\VerificationCodeMail;
use App\Mail\RegistrationSuccessfullyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserSocialNetworks;
use App\Models\UserCompanyDetails;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    public function user_home(){
        // return $this->core_page('home-page');
        $agent_id = app('currentAgent')->id;
        $appuses = DB::table('tbl_1crappuses')->where('created_by', $agent_id)->orderBy('id', 'desc')->first();
        // dd($appuses);
        return view('dashboard/user-home', compact('appuses'));
    }
    public function core_page($type){
        // dd($type);
        $agent_id = app('currentAgent')->id;
        // $agent_id = 78;
        $bodyData = '';
        $is_banner = 0;
        $page_data = DB::table('tbl_core_pages')->where(['page_type'=>$type,'status'=>1, 'created_by'=> $agent_id])->first();
        // dd($page_data);
        if($page_data){
            if($page_data->access_type == 'post' && is_null(auth()->id())){
                return redirect()->route('login');
            }
            $sections = DB::table('tbl_cp_sections')->where('cp_id', $page_data->id)->get();
            foreach($sections as $section){
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
                }else{
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
    public function realtors(){
        return view('dashboard/realtors');
    }
    public function investors(){
        return view('dashboard/investors');
    }
   
    
}
