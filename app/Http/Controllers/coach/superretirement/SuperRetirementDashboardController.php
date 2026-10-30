<?php

namespace App\Http\Controllers\coach\superretirement;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SuperRetirementDashboardController extends Controller
{
    public function __construct()
    {
        
    }
    public function dashboard(){
        return view('1crcoach.superretirement.dashboard');
    }
}