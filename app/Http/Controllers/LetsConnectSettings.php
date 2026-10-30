<?php

namespace App\Http\Controllers;

use App\Models\LetsConnectLayoutModel;
use App\Models\LetsConnectMenuModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
// use App\Helper\Helper as Helper;

class LetsConnectSettings extends Controller
{

    public function index()
    {
        $menues = LetsConnectMenuModel::with('parent')->where('created_by', auth()->user()->id)->paginate(10);
        $parents = LetsConnectMenuModel::select('id', 'title')->whereNull('parent_id')->where('created_by', auth()->user()->id)->orderBy('title', 'ASC')->get();
        $layout = LetsConnectLayoutModel::where('created_by', auth()->user()->id)->first();
        return view('dashboard.lead-magnet-settings', compact('menues', 'layout', 'parents'));
    }
    
    public function menu_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255'
        ]);
        // dd($request->parent_id);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if($request->id){
            $menu = LetsConnectMenuModel::find($request->id);
            $msg = 'Menu updated successfully.';
        } else {
            $menu = new LetsConnectMenuModel();
            $msg = 'Menu added successfully.';
        }
        $menu->icon = $request->icon;
        $menu->title = $request->title;
        $menu->page_url = $request->page_url;
        $menu->parent_id = $request->parent_id;
        $menu->type = $request->type;
        $menu->open_new_tab = $request->open_new_tab;
        $menu->status = $request->status;
        $menu->created_by = auth()->id();
        $menu->save();
        return redirect()->back()->with('success', $msg);
    }
    public function delete($id){
        $Menu = LetsConnectMenuModel::find($id);
        if(is_null($Menu)){
            return redirect()->back()->with('error', 'No Data Found.');
        }
        $Menu->delete();
        return redirect()->back()->with('success', 'Menu Deleted Successfully.');
    }
    public function store(Request $request)
    {
        if ($request->id) {
            $setting = LetsConnectLayoutModel::find($request->id);
            $msg = 'Layout updated successfully.';
        } else {
            $setting = new LetsConnectLayoutModel();
            $msg = 'Layout added successfully.';

        }
        // if($request->hasFile('logo')) {
        //     $imageName = time() . '_' . $request->logo->getClientOriginalName();
        //     $request->logo->move(public_path('uploads'), $imageName);
        //     $logo = asset('uploads/'.$imageName);
        //     $setting->logo = $logo;
        // }
        $setting->header_bg_color = $request->header_bg_color;
        $setting->header_text_color = $request->header_text_color;
        $setting->btn_text = $request->btn_text;
        $setting->btn_bg_color = $request->btn_bg_color;
        $setting->btn_text_color = $request->btn_text_color;
        $setting->btn_link = $request->btn_link;
        $setting->countdown_color = $request->countdown_color;
        $setting->open_new_tab = $request->has('open_new_tab') ? 1 : 0;
        // $setting->footer_bg_color = $request->footer_bg_color;
        // $setting->footer_text_color = $request->footer_text_color;
        // $setting->footer_btn_text = $request->footer_btn_text;
        // $setting->footer_btn_bgcolor = $request->footer_btn_bgcolor;
        // $setting->footer_btn_textcolor = $request->footer_btn_textcolor;
        // $setting->footer_btn_link = $request->footer_btn_link;
        // $setting->footer_btn_ont = $request->has('footer_btn_ont') ? 1 : 0;
        // $setting->copyright_text = $request->copyright_text;
        $setting->status = 1;
        $setting->created_by = auth()->id();
        $setting->save();

        return redirect()->back()->with('success', $msg);
    }

}