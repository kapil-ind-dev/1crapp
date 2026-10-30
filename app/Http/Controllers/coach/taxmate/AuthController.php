<?php

namespace App\Http\Controllers\coach\taxmate;
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
        return view('1crcoach.taxmate.auth.login');
    }
    public function register(){
        return view('1crcoach.taxmate.auth.register');
    }
    public function forgot_password(){
        return view('1crcoach.taxmate.auth.forgot-password');
    }
}