<?php

namespace App\Http\Controllers\coach\courses\sebp;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SebpController extends Controller
{
    public function dashboard(){
        return view('1crcoach.courses.sebp.dashboard');
    }
}