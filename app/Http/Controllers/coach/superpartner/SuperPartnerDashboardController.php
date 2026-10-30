<?php

namespace App\Http\Controllers\coach\superpartner;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SuperPartnerDashboardController extends Controller
{
    public function __construct()
    {
        
    }
    public function dashboard(){
        return view('1crcoach.superpartner.dashboard');
    }
}