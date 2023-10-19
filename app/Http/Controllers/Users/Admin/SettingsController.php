<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use Auth;

class SettingsController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth:admin', '2faadmin']);
  }

  public function index()
  {
    return view('admin.settings');
  }

  public function domain_name_server()
  {
    return view('admin.domain_name_server');
  }

  public function ChangePassword(Request $request)
  {
    if ($request->password != $request->confirm_password) {
      $request->session()->flash('success', 'Password Not Match');
      return redirect()->back()->with('success', 'Password Not Match');
    }
    $data = array(
      'password' => Hash::make($request->password),
    );
    DB::table('admins')->where('id', $request->id)->update($data);
    return redirect()->back()->with('success', 'Password Updated  Successfully');
  }

  public function  UpdateLandingSettings(Request $request)
  {
    // dd($request->toArray());
    $play_store_logo = '';
    if ($request->play_store_logo != '') {
      @unlink('uploads/' . $request->play_store_logo);
      $play_store_logo = mt_rand(1, 1000) . '' . time() . '.' . $request->file('play_store_logo')->getClientOriginalExtension();
      $request->file('play_store_logo')->move('uploads', $play_store_logo);
    } else {
      $play_store_logo = $request->hidden_play_store_logo;
    }

    $apple_store_logo = '';
    if ($request->apple_store_logo != '') {
      @unlink('uploads/' . $request->apple_store_logo);
      $apple_store_logo = mt_rand(1, 1000) . '' . time() . '.' . $request->file('apple_store_logo')->getClientOriginalExtension();
      $request->file('apple_store_logo')->move('uploads', $apple_store_logo);
    } else {
      $apple_store_logo = $request->hidden_apple_store_logo;
    }

    DB::table('system_configurations')->where('type', 'service_show')->update(['value'=>$request->service_show]);
    DB::table('system_configurations')->where('type', 'about_us_show')->update(['value'=>$request->about_us_show]);
    DB::table('system_configurations')->where('type', 'our_team_show')->update(['value'=>$request->our_team_show]);
    DB::table('system_configurations')->where('type', 'news_blog_show')->update(['value'=>$request->news_blog_show]);
    DB::table('system_configurations')->where('type', 'contact_show')->update(['value'=>$request->contact_show]);
    DB::table('system_configurations')->where('type', 'about_heading')->update(['value'=>$request->about_heading]);
    DB::table('system_configurations')->where('type', 'about_para1')->update(['value'=>$request->about_para1]);
    DB::table('system_configurations')->where('type', 'about_para2')->update(['value'=>$request->about_para2]);
    DB::table('system_configurations')->where('type', 'pay_per_lead_heading')->update(['value'=>$request->pay_per_lead_heading]);
    DB::table('system_configurations')->where('type', 'pay_per_lead_details')->update(['value'=>$request->pay_per_lead_details]);
    DB::table('system_configurations')->where('type', 'pay_per_click_heading')->update(['value'=>$request->pay_per_click_heading]);
    DB::table('system_configurations')->where('type', 'pay_per_click_details')->update(['value'=>$request->pay_per_click_details]);
    DB::table('system_configurations')->where('type', 'pay_per_install_heading')->update(['value'=>$request->pay_per_install_heading]);
    DB::table('system_configurations')->where('type', 'pay_per_install_details')->update(['value'=>$request->pay_per_install_details]);
    DB::table('system_configurations')->where('type', 'cost_per_sell_heading')->update(['value'=>$request->cost_per_sell_heading]);
    DB::table('system_configurations')->where('type', 'cost_per_sell_details')->update(['value'=>$request->cost_per_sell_details]);
    DB::table('system_configurations')->where('type', 'pay_per_view_heading')->update(['value'=>$request->pay_per_view_heading]);
    DB::table('system_configurations')->where('type', 'pay_per_view_details')->update(['value'=>$request->pay_per_view_details]);
    DB::table('system_configurations')->where('type', 'play_store_link')->update(['value'=>$request->play_store_link]);
    DB::table('system_configurations')->where('type', 'apple_store_link')->update(['value'=>$request->apple_store_link]);
    DB::table('system_configurations')->where('type', 'play_store_logo')->update(['value'=>$play_store_logo]);
    DB::table('system_configurations')->where('type', 'apple_store_logo')->update(['value'=>$apple_store_logo]);
    return redirect()->back()->with('success', 'Settings Updated Successfully');
  }

  public function  UpdateSettings(Request $request)
  {
    $imageName = '';
    if ($request->logo != '') {
      @unlink('site_images/' . $request->hidden_logo);
      $imageName = mt_rand(1, 1000) . '' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move('site_images', $imageName);
    } else {
      $imageName = $request->hidden_logo;
    }

    $icon = '';
    if ($request->icon != '') {
      @unlink('site_images/' . $request->hidden_icon);
      $icon = mt_rand(1, 1000) . '' . time() . '.' . $request->file('icon')->getClientOriginalExtension();
      $request->file('icon')->move('site_images', $icon);
    } else {
      $icon = $request->hidden_icon;
    }

    $data = array(
      'auto_signup' => $request->auto_signup,
      'minimum_withdraw_amount' => $request->minimum_withdraw_amount,
      'payout_percentage' => $request->payout_percentage,
      'default_tracking_domain' => $request->default_tracking_domain,
      'default_smartlink_domain' => $request->default_smartlink_domain,
      'default_affliate_manager' => $request->affliate_manager,
      'affliate_manager_salary_percentage' => $request->affliate_percentage,
      'default_payment_terms' => $request->default_payment_terms,
      'logo' => $imageName,
      'icon' => $icon,
      'vpn_check' => $request->vpn_check,
      'smtp_host' => $request->smtp_host,
      'smtp_port' => $request->smtp_port,
      'smtp_user' => $request->smtp_user,
      'smtp_password' => $request->smtp_password,
      'smtp_enc' => $request->smtp_enc,
      'from_email' => $request->from_email,
      'from_name' => $request->from_name,
      'from_security' => $request->from_security,
      'zerobounce_api' => $request->zerobounce_api,
      'zerobounce_check' => $request->zerobounce_check,
    );
    DB::table('site_settings')->update($data);
    return redirect()->back()->with('success', 'Settings Updated Successfully');
  }

  public function privacy_policy(Request $request)
  {
    // My Code
    return view('admin.settings.privacy_policy');
  }

  public function privacy_policy_store(Request $request)
  {
    // My Code    
    $meta_img = '';
    if ($request->meta_img != '') {
      @unlink('uploads/' . $request->meta_img);
      $meta_img = mt_rand(1, 1000) . '' . time() . '.' . $request->file('meta_img')->getClientOriginalExtension();
      $request->file('meta_img')->move('uploads', $meta_img);
    } else {
      $meta_img = $request->hidden_meta_img;
    }

    DB::table('system_configurations')->where('type', 'privacy_policy_description')->update(['value'=>$request->description]);
    DB::table('system_configurations')->where('type', 'privacy_policy_meta_title')->update(['value'=>$request->meta_title]);
    DB::table('system_configurations')->where('type', 'privacy_policy_meta_description')->update(['value'=>$request->meta_description]);
    DB::table('system_configurations')->where('type', 'privacy_policy_meta_keywords')->update(['value'=>$request->meta_keywords]);
    DB::table('system_configurations')->where('type', 'privacy_policy_meta_image')->update(['value'=>$request->meta_img]);
    return redirect()->back()->with('success', 'Settings Updated Successfully');
  }

  public function terms_conditions(Request $request)
  {
    // My Code
    return view('admin.settings.terms_conditions');
  }
  
  public function terms_conditions_store(Request $request)
  {
    // My Code
    $meta_img = '';
    if ($request->meta_img != '') {
      @unlink('uploads/' . $request->meta_img);
      $meta_img = mt_rand(1, 1000) . '' . time() . '.' . $request->file('meta_img')->getClientOriginalExtension();
      $request->file('meta_img')->move('uploads', $meta_img);
    } else {
      $meta_img = $request->hidden_meta_img;
    }

    DB::table('system_configurations')->where('type', 'terms_conditions_description')->update(['value'=>$request->description]);
    DB::table('system_configurations')->where('type', 'terms_conditions_meta_title')->update(['value'=>$request->meta_title]);
    DB::table('system_configurations')->where('type', 'terms_conditions_meta_description')->update(['value'=>$request->meta_description]);
    DB::table('system_configurations')->where('type', 'terms_conditions_meta_keywords')->update(['value'=>$request->meta_keywords]);
    DB::table('system_configurations')->where('type', 'terms_conditions_meta_image')->update(['value'=>$request->meta_img]);
    return redirect()->back()->with('success', 'Settings Updated Successfully');
  }
}
