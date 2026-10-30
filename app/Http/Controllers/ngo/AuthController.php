<?php

namespace App\Http\Controllers\ngo;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        return view('ngo.auth.login');
    }
    public function register(){
        return view('ngo.auth.register');
    }
    public function forgot_password(){
        return view('ngo.auth.forgot-password');
    }
    public function dashboard(){
        return view('ngo.dashboard');
    }
    public function dashboard1(){
        return view('ngo.dashboard1');
    }
    public function membership_registration(){
        return view('ngo.membership-registration');
    }
}