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

class IndexController extends Controller
{
    public function dashboard2(){
        return view('1crcoach.taxmate.dashboard');
    }
    public function dashboard(){
        return view('1crcoach.taxmate.dashboard2');
    }
    
    public function income_from_salary(){
        return view('1crcoach.taxmate.income-from-salary');
    }
    public function income_from_house_property(){
        return view('1crcoach.taxmate.income-from-house-property');
    }
    public function income_from_capital_gains(){
        return view('1crcoach.taxmate.income-from-capital-gains');
    }
    public function income_from_business(){
        return view('1crcoach.taxmate.income-from-business');
    }
    public function income_from_other_sources(){
        return view('1crcoach.taxmate.income-from-other-sources');
    }
    public function deductions_tax_planning(){
        return view('1crcoach.taxmate.deductions-tax-planning');
    }
    public function tds_tcs_advance_taxes(){
        return view('1crcoach.taxmate.tds-tcs-advance-taxes');
    }
    public function review_documents_itr_mapping(){
        return view('1crcoach.taxmate.review-documents-itr-mapping');
    }
    public function tax_summary_computation(){
        return view('1crcoach.taxmate.tax-summary-computation');
    }
}