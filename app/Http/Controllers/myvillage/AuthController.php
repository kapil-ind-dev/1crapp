<?php

namespace App\Http\Controllers\myvillage;
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
        return view('my-village.auth.login');
    }
    public function register(){
        return view('my-village.auth.register');
    }
    public function forgot_password(){
        return view('my-village.auth.forgot-password');
    }
    public function dashboard(){
        return view('my-village.dashboard');
    }
}