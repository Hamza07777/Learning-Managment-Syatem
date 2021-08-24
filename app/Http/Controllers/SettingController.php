<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('setting.new'))
        {
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('setting.new');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if($request->has('app_name')) {
            
                if (Setting::where('setting_key','app_name')->exists()) {
                    Setting::where('setting_key','app_name')->update([
                        'setting_value'=>$request['app_name'],
                     ]);
                }
                else{
                     Setting::create([
                    'setting_key'=>'app_name',
                    'setting_value'=>$request['app_name'],
                    'status'=>'active',
                     ]);
                }
               
            }
        if($request->has('google_analytics_id')) {
            
            
             if (Setting::where('setting_key', 'google_analytics_id')->exists()) {
                 Setting::where('setting_key','google_analytics_id')->update([
                        'setting_value'=>$request['google_analytics_id'],
                     ]);
            }
            else{
                 Setting::create([
                'setting_key'=>'google_analytics_id',
                'setting_value'=>$request['google_analytics_id'],
                'status'=>'active',
                 ]);
            }
            
            
               
            }
        if($request->has('teacher_commission_rate')) {
            
             if (Setting::where('setting_key', 'teacher_commission_rate')->exists()) {
                     Setting::where('setting_key','teacher_commission_rate')->update([
                        'setting_value'=>$request['teacher_commission_rate'],
                     ]);
            }
            else{
                  Setting::create([
                'setting_key'=>'teacher_commission_rate',
                'setting_value'=>$request['teacher_commission_rate'],
                'status'=>'active',
                 ]); 
            }
            
            
             
            }
        if($request->has('custom_css')) {
            
                 if (Setting::where('setting_key','custom_css')->exists()) {
                     Setting::where('setting_key','custom_css')->update([
                        'setting_value'=>$request['custom_css'],
                     ]);
                }
                else{
                     Setting::create([
                'setting_key'=>'custom_css',
                'setting_value'=>$request['custom_css'],
                'status'=>'active',
                 ]);
                }
            
            
               
            }
        if($request->has('custom_js')) {
            
                 if (Setting::where('setting_key','custom_js')->exists()) {
                     Setting::where('setting_key','custom_js')->update([
                        'setting_value'=>$request['custom_js'],
                     ]);
                }
                else{
                     Setting::create([
                    'setting_key'=>'custom_js',
                    'setting_value'=>$request['custom_js'],
                    'status'=>'active',
                     ]);
                }
               
            }
       
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return redirect()->back();
           
    }

    public function logo_store(Request $request)
    {
         if ($request->hasFile('logo_b_image')) {
             
             if ($setting=Setting::where('setting_key','logo_b_image')->first()) {
                          if (isset($setting->setting_value) && file_exists(public_path('logos/'.$setting->setting_value))) {
                                unlink(public_path('logos/'.$setting->setting_value));
                            }
                            $extension=$request->logo_b_image->extension();
                            $filename=time()."_logo_b_image.".$extension;
                            $request->logo_b_image->move(public_path('logos'), $filename);                 
                    Setting::where('setting_key','logo_b_image')->update([
                        'setting_value'=>$filename,
                     ]);
                }
                else{
                 $extension=$request->logo_b_image->extension();
                            $filename=time()."_logo_b_image.".$extension;
                            $request->logo_b_image->move(public_path('logos'), $filename);
                              Setting::create([
                                'setting_key'=>'logo_b_image',
                                'setting_value'=>$filename,
                                'status'=>'active',
                                 ]);
                }
           
        }
        
          if ($request->hasFile('logo_w_image')) {
              
             if ($setting=Setting::where('setting_key','logo_w_image')->first()) {
                          if (isset($setting->setting_value) && file_exists(public_path('logos/'.$setting->setting_value))) {
                                unlink(public_path('logos/'.$setting->setting_value));
                            }
                    $extension=$request->logo_w_image->extension();
                    $filename=time()."_logo_w_image.".$extension;
                    $request->logo_w_image->move(public_path('logos'), $filename);                 
                    Setting::where('setting_key','logo_w_image')->update([
                        'setting_value'=>$filename,
                     ]);
                }
                else{
                    $extension=$request->logo_w_image->extension();
                    $filename=time()."_logo_w_image.".$extension;
                    $request->logo_w_image->move(public_path('logos'), $filename);
                      Setting::create([
                        'setting_key'=>'logo_w_image',
                        'setting_value'=>$filename,
                        'status'=>'active',
                         ]);
                }
        }
        
          if ($request->hasFile('logo_white_image')) {
              
             if ($setting=Setting::where('setting_key','logo_white_image')->first()) {
                          if (isset($setting->setting_value) && file_exists(public_path('logos/'.$setting->setting_value))) {
                                unlink(public_path('logos/'.$setting->setting_value));
                            }
                    $extension=$request->logo_white_image->extension();
                    $filename=time()."_logo_white_image.".$extension;
                    $request->logo_white_image->move(public_path('logos'), $filename);                  
                    Setting::where('setting_key','logo_white_image')->update([
                        'setting_value'=>$filename,
                     ]);
                }
                else{
                    $extension=$request->logo_white_image->extension();
                    $filename=time()."_logo_white_image.".$extension;
                    $request->logo_white_image->move(public_path('logos'), $filename);
                      Setting::create([
                        'setting_key'=>'logo_white_image',
                        'setting_value'=>$filename,
                        'status'=>'active',
                         ]);
                }

        }
        
          if ($request->hasFile('logo_popup')) {
              
             if ($setting=Setting::where('setting_key','logo_popup')->first()) {
                          if (isset($setting->setting_value) && file_exists(public_path('logos/'.$setting->setting_value))) {
                                unlink(public_path('logos/'.$setting->setting_value));
                            }
                    $extension=$request->logo_popup->extension();
                    $filename=time()."_logo_popup.".$extension;
                    $request->logo_popup->move(public_path('logos'), $filename);                 
                    Setting::where('setting_key','logo_popup')->update([
                        'setting_value'=>$filename,
                     ]);
                }
                else{
                    $extension=$request->logo_popup->extension();
                    $filename=time()."_logo_popup.".$extension;
                    $request->logo_popup->move(public_path('logos'), $filename);
                      Setting::create([
                        'setting_key'=>'logo_popup',
                        'setting_value'=>$filename,
                        'status'=>'active',
                         ]);
                }

        }
        
          if ($request->hasFile('favicon_image')) {
              
              
             if ($setting=Setting::where('setting_key','favicon_image')->first()) {
                          if (isset($setting->setting_value) && file_exists(public_path('logos/'.$setting->setting_value))) {
                                unlink(public_path('logos/'.$setting->setting_value));
                            }
                    $extension=$request->favicon_image->extension();
                    $filename=time()."_favicon_image.".$extension;
                    $request->favicon_image->move(public_path('logos'), $filename);
                    Setting::where('setting_key','favicon_image')->update([
                        'setting_value'=>$filename,
                     ]);
                }
                else{
                    $extension=$request->favicon_image->extension();
                    $filename=time()."_favicon_image.".$extension;
                    $request->favicon_image->move(public_path('logos'), $filename);
                      Setting::create([
                        'setting_key'=>'favicon_image',
                        'setting_value'=>$filename,
                        'status'=>'active',
                         ]);
                }
        }
       
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return redirect()->back();
           
    }
    public function layout_store(Request $request)
    {
       
        if($request->has('layout_type')) {
            
            
             if (Setting::where('setting_key','layout_type')->exists()) {
                    Setting::where('setting_key','layout_type')->update([
                        'setting_value'=>$request['layout_type'],
                     ]);
                }
                else{
                     Setting::create([
                'setting_key'=>'layout_type',
                'setting_value'=>$request['layout_type'],
                'status'=>'active',
                 ]);
                }
               
            }
        if($request->has('theme_layout')) {
            
             if (Setting::where('setting_key','theme_layout')->exists()) {
                    Setting::where('setting_key','theme_layout')->update([
                        'setting_value'=>$request['theme_layout'],
                     ]);
                }
                else{
                       Setting::create([
                        'setting_key'=>'theme_layout',
                        'setting_value'=>$request['theme_layout'],
                        'status'=>'active',
                         ]);
                }
                
            }
           session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return redirect()->back();
           
    }

    public function mail_configration_store(Request $request)
    {
        if($request->has('mail_from_name')) {
            
              if (Setting::where('setting_key','mail_from_name')->exists()) {
                    Setting::where('setting_key','mail_from_name')->update([
                        'setting_value'=>$request['mail_from_name'],
                     ]);
                     $this->setEnvironmentValue('MAIL_FROM_NAME', $request['mail_from_name']);

                }
                else{
               Setting::create([
                'setting_key'=>'mail_from_name',
                'setting_value'=>$request['mail_from_name'],
                'status'=>'active',
                 ]);
               $this->setEnvironmentValue('MAIL_FROM_NAME', $request['mail_from_name']);
                }
                
            }
        if($request->has('mail_from_address')) {
            
             if (Setting::where('setting_key','mail_from_address')->exists()) {
                    Setting::where('setting_key','mail_from_address')->update([
                        'setting_value'=>$request['mail_from_address'],
                     ]);
                    $this->setEnvironmentValue('MAIL_FROM_ADDRESS', $request['mail_from_address']);
                }
                else{
                Setting::create([
                'setting_key'=>'mail_from_address',
                'setting_value'=>$request['mail_from_address'],
                'status'=>'active',
                 ]);
                $this->setEnvironmentValue('MAIL_FROM_ADDRESS', $request['mail_from_address']);
                }
               
            }
        if($request->has('mail_driver')) {
            
             if (Setting::where('setting_key','mail_driver')->exists()) {
                    Setting::where('setting_key','mail_driver')->update([
                        'setting_value'=>$request['mail_driver'],
                     ]);
                     $this->setEnvironmentValue('MAIL_MAILER', $request['mail_driver']);
                    
                }
                else{
                 Setting::create([
                'setting_key'=>'mail_driver',
                'setting_value'=>$request['mail_driver'],
                'status'=>'active',
                 ]);
                 $this->setEnvironmentValue('MAIL_MAILER', $request['mail_driver']);
                }
              
            }
        if($request->has('mail_host')) {
            
             if (Setting::where('setting_key','mail_host')->exists()) {
                    Setting::where('setting_key','mail_host')->update([
                        'setting_value'=>$request['mail_host'],
                     ]);
                     $this->setEnvironmentValue('MAIL_HOST', $request['mail_host']);
                }
                else{
                      Setting::create([
                'setting_key'=>'mail_host',
                'setting_value'=>$request['mail_host'],
                'status'=>'active',
                 ]);
                 $this->setEnvironmentValue('MAIL_HOST', $request['mail_host']);
                }
              
            }
        if($request->has('mail_port')) {
            
             if (Setting::where('setting_key','mail_port')->exists()) {
                    Setting::where('setting_key','mail_port')->update([
                        'setting_value'=>$request['mail_port'],
                     ]);
                     
                     $this->setEnvironmentValue('MAIL_PORT', $request['mail_port']);
                }
                else{
                     Setting::create([
                'setting_key'=>'mail_port',
                'setting_value'=>$request['mail_port'],
                'status'=>'active',
                 ]);
                 $this->setEnvironmentValue('MAIL_PORT', $request['mail_port']);
                }
               
            }
        if($request->has('mail_username')) {
            
             if (Setting::where('setting_key','mail_username')->exists()) {
                    Setting::where('setting_key','mail_username')->update([
                        'setting_value'=>$request['mail_username'],
                     ]);
                     $this->setEnvironmentValue('MAIL_USERNAME', $request['mail_username']);
                }
                else{
                     Setting::create([
                'setting_key'=>'mail_username',
                'setting_value'=>$request['mail_username'],
                'status'=>'active',
                 ]);
                 $this->setEnvironmentValue('MAIL_USERNAME', $request['mail_username']);
                }
               
            }
        if($request->has('mail_password')) {
            
             if (Setting::where('setting_key','mail_password')->exists()) {
                    Setting::where('setting_key','mail_password')->update([
                        'setting_value'=>$request['mail_password'],
                     ]);
                     $this->setEnvironmentValue('MAIL_PASSWORD', $request['mail_password']);
                }
                else{
                    Setting::create([
                'setting_key'=>'mail_password',
                'setting_value'=>$request['mail_password'],
                'status'=>'active',
                 ]);
                   $this->setEnvironmentValue('MAIL_PASSWORD', $request['mail_password']);
                }
                
            }
             if($request->has('mail_encryption')) {
                 
                  if (Setting::where('setting_key','mail_encryption')->exists()) {
                    Setting::where('setting_key','mail_encryption')->update([
                        'setting_value'=>$request['mail_encryption'],
                     ]);
                     $this->setEnvironmentValue('MAIL_ENCRYPTION', $request['mail_encryption']);
                }
                else{
                     Setting::create([
                'setting_key'=>'mail_encryption',
                'setting_value'=>$request['mail_encryption'],
                'status'=>'active',
                 ]);
                   $this->setEnvironmentValue('MAIL_ENCRYPTION', $request['mail_encryption']);
                }
               
            }
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return redirect()->back();
           
    }
    
    public function payment_configration_store(Request $request)
    {
   
        if($request->has('app_currency')) {
            
             if (Setting::where('setting_key','app_currency')->exists()) {
                    Setting::where('setting_key','app_currency')->update([
                        'setting_value'=>$request['app_currency'],
                     ]);
                $this->setEnvironmentValue('PAYPAL_CURRENCY', $request['app_currency']); 
                }
                else{
                     Setting::create([
                'setting_key'=>'app_currency',
                'setting_value'=>$request['app_currency'],
                'status'=>'active',
                 ]);
                $this->setEnvironmentValue('PAYPAL_CURRENCY', $request['app_currency']);                 
                }
               
            }
        if($request->has('services_stripe_active')) {

             if (Setting::where('setting_key','services_stripe_active')->exists()) {
                    Setting::where('setting_key','services_stripe_active')->update([
                        'setting_value'=>$request['services_stripe_active'],
                     ]);
                    if($request->has('services_stripe_key')) {
                         if (Setting::where('setting_key','services_stripe_key')->exists()) {
                             Setting::where('setting_key','services_stripe_key')->update([
                        'setting_value'=>$request['services_stripe_key'],
                     ]);
                     
                    $this->setEnvironmentValue('STRIPE_KEY', $request['services_stripe_key']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_stripe_key',
                                'setting_value'=>$request['services_stripe_key'],
                                'status'=>'active',
                                 ]);
                                 $this->setEnvironmentValue('STRIPE_KEY', $request['services_stripe_key']);
                         }
                     }
                     
                     
                     
                    if($request->has('services_stripe_secret')) {
                         if (Setting::where('setting_key','services_stripe_secret')->exists()) {
                             Setting::where('setting_key','services_stripe_secret')->update([
                        'setting_value'=>$request['services_stripe_secret'],
                     ]);
                     $this->setEnvironmentValue('STRIPE_SECRET', $request['services_stripe_secret']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_stripe_secret',
                                'setting_value'=>$request['services_stripe_secret'],
                                'status'=>'active',
                                 ]);
                                  $this->setEnvironmentValue('STRIPE_SECRET', $request['services_stripe_secret']);
                         }
                     }
                }
                else{
                    Setting::create([
                'setting_key'=>'services_stripe_active',
                'setting_value'=>$request['services_stripe_active'],
                'status'=>'active',
                 ]);
                     if($request->has('services_stripe_key')) {
                         if (Setting::where('setting_key','services_stripe_key')->exists()) {
                             Setting::where('setting_key','services_stripe_key')->update([
                        'setting_value'=>$request['services_stripe_key'],
                     ]);
                     $this->setEnvironmentValue('STRIPE_KEY', $request['services_stripe_key']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_stripe_key',
                                'setting_value'=>$request['services_stripe_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
                     
                    if($request->has('services_stripe_secret')) {
                         if (Setting::where('setting_key','services_stripe_secret')->exists()) {
                             Setting::where('setting_key','services_stripe_secret')->update([
                        'setting_value'=>$request['services_stripe_secret'],
                     ]);
                      $this->setEnvironmentValue('STRIPE_SECRET', $request['services_stripe_secret']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_stripe_secret',
                                'setting_value'=>$request['services_stripe_secret'],
                                'status'=>'active',
                                 ]);
                            $this->setEnvironmentValue('STRIPE_SECRET', $request['services_stripe_secret']);
                         }
                     }
 
                }
                
            }
            else{
                if (Setting::where('setting_key','services_stripe_active')->exists()) {
                    $setting=Setting::where('setting_key','services_stripe_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('paypal_active')) {
            
             if (Setting::where('setting_key','paypal_active')->exists()) {
                    Setting::where('setting_key','paypal_active')->update([
                        'setting_value'=>$request['paypal_active'],
                     ]);
                     
                    if($request->has('paypal_settings_mode')) {
                         if (Setting::where('setting_key','paypal_settings_mode')->exists()) {
                             Setting::where('setting_key','paypal_settings_mode')->update([
                        'setting_value'=>$request['paypal_settings_mode'],
                     ]);
                     $this->setEnvironmentValue('PAYPAL_MODE', $request['paypal_settings_mode']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_settings_mode',
                                'setting_value'=>$request['paypal_settings_mode'],
                                'status'=>'active',
                                 ]);
                        $this->setEnvironmentValue('PAYPAL_MODE', $request['paypal_settings_mode']);
                         }
                     }
 
                    if($request->has('paypal_client_id')) {
                         if (Setting::where('setting_key','paypal_client_id')->exists()) {
                             Setting::where('setting_key','paypal_client_id')->update([
                        'setting_value'=>$request['paypal_client_id'],
                     ]);
                     
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_USERNAME', $request['paypal_client_id']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_client_id',
                                'setting_value'=>$request['paypal_client_id'],
                                'status'=>'active',
                                 ]);
                        $this->setEnvironmentValue('PAYPAL_SANDBOX_API_USERNAME', $request['paypal_client_id']);     
                         }
                     }
 
                    if($request->has('paypal_secret')) {
                         if (Setting::where('setting_key','paypal_secret')->exists()) {
                             Setting::where('setting_key','paypal_secret')->update([
                        'setting_value'=>$request['paypal_secret'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_SECRET', $request['paypal_secret']);                      
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_secret',
                                'setting_value'=>$request['paypal_secret'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_SECRET', $request['paypal_secret']); 
                         }
                     }
                     
                    if($request->has('paypal_client_password')) {
                         if (Setting::where('setting_key','paypal_client_password')->exists()) {
                             Setting::where('setting_key','paypal_client_password')->update([
                        'setting_value'=>$request['paypal_client_password'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_PASSWORD', $request['paypal_client_password']);                      
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_client_password',
                                'setting_value'=>$request['paypal_client_password'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_PASSWORD', $request['paypal_client_password']);                                 
                         }
                     }
                    if($request->has('paypal_client_certificate')) {
                         if (Setting::where('setting_key','paypal_client_certificate')->exists()) {
                             Setting::where('setting_key','paypal_client_certificate')->update([
                        'setting_value'=>$request['paypal_client_certificate'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_CERTIFICATE', $request['paypal_client_certificate']);                      
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_client_certificate',
                                'setting_value'=>$request['paypal_client_certificate'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_CERTIFICATE', $request['paypal_client_certificate']);                                  
                         }
                     }  
     
                }
                else{
                       Setting::create([
                'setting_key'=>'paypal_active',
                'setting_value'=>$request['paypal_active'],
                'status'=>'active',
                 ]);
                 
                                      
                    if($request->has('paypal_settings_mode')) {
                         if (Setting::where('setting_key','paypal_settings_mode')->exists()) {
                             Setting::where('setting_key','paypal_settings_mode')->update([
                        'setting_value'=>$request['paypal_settings_mode'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_MODE', $request['paypal_settings_mode']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_settings_mode',
                                'setting_value'=>$request['paypal_settings_mode'],
                                'status'=>'active',
                                 ]);
                        $this->setEnvironmentValue('PAYPAL_MODE', $request['paypal_settings_mode']);
                         }
                     }
 
                    if($request->has('paypal_client_id')) {
                         if (Setting::where('setting_key','paypal_client_id')->exists()) {
                             Setting::where('setting_key','paypal_client_id')->update([
                        'setting_value'=>$request['paypal_client_id'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_USERNAME', $request['paypal_client_id']);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_client_id',
                                'setting_value'=>$request['paypal_client_id'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_USERNAME', $request['paypal_client_id']);
                         }
                     }
 
                    if($request->has('paypal_secret')) {
                         if (Setting::where('setting_key','paypal_secret')->exists()) {
                             Setting::where('setting_key','paypal_secret')->update([
                        'setting_value'=>$request['paypal_secret'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_SECRET', $request['paypal_secret']);                      
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_secret',
                                'setting_value'=>$request['paypal_secret'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_SECRET', $request['paypal_secret']);                                  
                         }
                     }
                     
                    if($request->has('paypal_client_password')) {
                         if (Setting::where('setting_key','paypal_client_password')->exists()) {
                             Setting::where('setting_key','paypal_client_password')->update([
                        'setting_value'=>$request['paypal_client_password'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_PASSWORD', $request['paypal_client_password']);                     
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_client_password',
                                'setting_value'=>$request['paypal_client_password'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_PASSWORD', $request['paypal_client_password']);                                 
                         }
                     }
                    if($request->has('paypal_client_certificate')) {
                         if (Setting::where('setting_key','paypal_client_certificate')->exists()) {
                             Setting::where('setting_key','paypal_client_certificate')->update([
                        'setting_value'=>$request['paypal_client_certificate'],
                     ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_CERTIFICATE', $request['paypal_client_certificate']);                     
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'paypal_client_certificate',
                                'setting_value'=>$request['paypal_client_certificate'],
                                'status'=>'active',
                                 ]);
                    $this->setEnvironmentValue('PAYPAL_SANDBOX_API_CERTIFICATE', $request['paypal_client_certificate']);                                  
                         }
                     } 

                }
             
            }
              else{
                if (Setting::where('setting_key','paypal_active')->exists()) {
                    $setting=Setting::where('setting_key','paypal_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('flutter_active')) {
            
             if (Setting::where('setting_key','flutter_active')->exists()) {
                    Setting::where('setting_key','flutter_active')->update([
                        'setting_value'=>$request['flutter_active'],
                     ]);
                     
                    if($request->has('rave_env')) {
                         if (Setting::where('setting_key','rave_env')->exists()) {
                             Setting::where('setting_key','rave_env')->update([
                        'setting_value'=>$request['rave_env'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'rave_env',
                                'setting_value'=>$request['rave_env'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('rave_publicKey')) {
                         if (Setting::where('setting_key','rave_publicKey')->exists()) {
                             Setting::where('setting_key','rave_publicKey')->update([
                        'setting_value'=>$request['rave_publicKey'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'rave_publicKey',
                                'setting_value'=>$request['rave_publicKey'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('rave_secretKey')) {
                         if (Setting::where('setting_key','rave_secretKey')->exists()) {
                             Setting::where('setting_key','rave_secretKey')->update([
                        'setting_value'=>$request['rave_secretKey'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'rave_secretKey',
                                'setting_value'=>$request['rave_secretKey'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
     
                }
                else{
                        Setting::create([
                'setting_key'=>'flutter_active',
                'setting_value'=>$request['flutter_active'],
                'status'=>'active',
                 ]);
                     
                    if($request->has('rave_env')) {
                         if (Setting::where('setting_key','rave_env')->exists()) {
                             Setting::where('setting_key','rave_env')->update([
                        'setting_value'=>$request['rave_env'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'rave_env',
                                'setting_value'=>$request['rave_env'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('rave_publicKey')) {
                         if (Setting::where('setting_key','rave_publicKey')->exists()) {
                             Setting::where('setting_key','rave_publicKey')->update([
                        'setting_value'=>$request['rave_publicKey'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'rave_publicKey',
                                'setting_value'=>$request['rave_publicKey'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('rave_secretKey')) {
                         if (Setting::where('setting_key','rave_secretKey')->exists()) {
                             Setting::where('setting_key','rave_secretKey')->update([
                        'setting_value'=>$request['rave_secretKey'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'rave_secretKey',
                                'setting_value'=>$request['rave_secretKey'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
 
                }
                
            }
              else{
                if (Setting::where('setting_key','flutter_active')->exists()) {
                    $setting=Setting::where('setting_key','flutter_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('services_instamojo_active')) {
            
             if (Setting::where('setting_key','services_instamojo_active')->exists()) {
                    Setting::where('setting_key','services_instamojo_active')->update([
                        'setting_value'=>$request['services_instamojo_active'],
                     ]);
                     
                    if($request->has('instamojo_settings_mode')) {
                         if (Setting::where('setting_key','instamojo_settings_mode')->exists()) {
                             Setting::where('setting_key','instamojo_settings_mode')->update([
                        'setting_value'=>$request['instamojo_settings_mode'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'instamojo_settings_mode',
                                'setting_value'=>$request['instamojo_settings_mode'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_instamojo_key')) {
                         if (Setting::where('setting_key','services_instamojo_key')->exists()) {
                             Setting::where('setting_key','services_instamojo_key')->update([
                        'setting_value'=>$request['services_instamojo_key'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_instamojo_key',
                                'setting_value'=>$request['services_instamojo_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
                    if($request->has('services_instamojo_secret')) {
                         if (Setting::where('setting_key','services_instamojo_secret')->exists()) {
                             Setting::where('setting_key','services_instamojo_secret')->update([
                        'setting_value'=>$request['services_instamojo_secret'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_instamojo_secret',
                                'setting_value'=>$request['services_instamojo_secret'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
     
                }
                else{
                     Setting::create([
                'setting_key'=>'services_instamojo_active',
                'setting_value'=>$request['services_instamojo_active'],
                'status'=>'active',
                 ]);
                     
                    if($request->has('instamojo_settings_mode')) {
                         if (Setting::where('setting_key','instamojo_settings_mode')->exists()) {
                             Setting::where('setting_key','instamojo_settings_mode')->update([
                        'setting_value'=>$request['instamojo_settings_mode'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'instamojo_settings_mode',
                                'setting_value'=>$request['instamojo_settings_mode'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_instamojo_key')) {
                         if (Setting::where('setting_key','services_instamojo_key')->exists()) {
                             Setting::where('setting_key','services_instamojo_key')->update([
                        'setting_value'=>$request['services_instamojo_key'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_instamojo_key',
                                'setting_value'=>$request['services_instamojo_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_instamojo_secret')) {
                         if (Setting::where('setting_key','services_instamojo_secret')->exists()) {
                             Setting::where('setting_key','services_instamojo_secret')->update([
                        'setting_value'=>$request['services_instamojo_secret'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_instamojo_secret',
                                'setting_value'=>$request['services_instamojo_secret'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
 
                }
               
            }
              else{
                if (Setting::where('setting_key','services_instamojo_active')->exists()) {
                    $setting=Setting::where('setting_key','services_instamojo_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('services_razorpay_active')) {
            
             if (Setting::where('setting_key','services_razorpay_active')->exists()) {
                    Setting::where('setting_key','services_razorpay_active')->update([
                        'setting_value'=>$request['services_razorpay_active'],
                     ]);
 
                    if($request->has('services_razorpay_key')) {
                         if (Setting::where('setting_key','services_razorpay_key')->exists()) {
                             Setting::where('setting_key','services_razorpay_key')->update([
                        'setting_value'=>$request['services_razorpay_key'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_razorpay_key',
                                'setting_value'=>$request['services_razorpay_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_razorpay_secret')) {
                         if (Setting::where('setting_key','services_razorpay_secret')->exists()) {
                             Setting::where('setting_key','services_razorpay_secret')->update([
                        'setting_value'=>$request['services_razorpay_secret'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_razorpay_secret',
                                'setting_value'=>$request['services_razorpay_secret'],
                                'status'=>'active',
                                 ]);
                         }
                     }
                }
                else{
                     Setting::create([
                'setting_key'=>'services_razorpay_active',
                'setting_value'=>$request['services_razorpay_active'],
                'status'=>'active',
                 ]);
                 
                    if($request->has('services_razorpay_key')) {
                         if (Setting::where('setting_key','services_razorpay_key')->exists()) {
                             Setting::where('setting_key','services_razorpay_key')->update([
                        'setting_value'=>$request['services_razorpay_key'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_razorpay_key',
                                'setting_value'=>$request['services_razorpay_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_razorpay_secret')) {
                         if (Setting::where('setting_key','services_razorpay_secret')->exists()) {
                             Setting::where('setting_key','services_razorpay_secret')->update([
                        'setting_value'=>$request['services_razorpay_secret'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_razorpay_secret',
                                'setting_value'=>$request['services_razorpay_secret'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
                 
                }
               
            }
              else{
                if (Setting::where('setting_key','services_razorpay_active')->exists()) {
                    $setting=Setting::where('setting_key','services_razorpay_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('services_cashfree_active')) {
            
             if (Setting::where('setting_key','services_cashfree_active')->exists()) {
                    Setting::where('setting_key','services_cashfree_active')->update([
                        'setting_value'=>$request['services_cashfree_active'],
                     ]);
                     
                    if($request->has('cashfree_settings_mode')) {
                         if (Setting::where('setting_key','cashfree_settings_mode')->exists()) {
                             Setting::where('setting_key','cashfree_settings_mode')->update([
                        'setting_value'=>$request['cashfree_settings_mode'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'cashfree_settings_mode',
                                'setting_value'=>$request['cashfree_settings_mode'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_cashfree_app_id')) {
                         if (Setting::where('setting_key','services_cashfree_app_id')->exists()) {
                             Setting::where('setting_key','services_cashfree_app_id')->update([
                        'setting_value'=>$request['services_cashfree_app_id'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_cashfree_app_id',
                                'setting_value'=>$request['services_cashfree_app_id'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_cashfree_secret')) {
                         if (Setting::where('setting_key','services_cashfree_secret')->exists()) {
                             Setting::where('setting_key','services_cashfree_secret')->update([
                        'setting_value'=>$request['services_cashfree_secret'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_cashfree_secret',
                                'setting_value'=>$request['services_cashfree_secret'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
     
                }
                else{
                     Setting::create([
                'setting_key'=>'services_cashfree_active',
                'setting_value'=>$request['services_cashfree_active'],
                'status'=>'active',
                 ]);
 
                if($request->has('cashfree_settings_mode')) {
                         if (Setting::where('setting_key','cashfree_settings_mode')->exists()) {
                             Setting::where('setting_key','cashfree_settings_mode')->update([
                        'setting_value'=>$request['cashfree_settings_mode'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'cashfree_settings_mode',
                                'setting_value'=>$request['cashfree_settings_mode'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_cashfree_app_id')) {
                         if (Setting::where('setting_key','services_cashfree_app_id')->exists()) {
                             Setting::where('setting_key','services_cashfree_app_id')->update([
                        'setting_value'=>$request['services_cashfree_app_id'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_cashfree_app_id',
                                'setting_value'=>$request['services_cashfree_app_id'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_cashfree_secret')) {
                         if (Setting::where('setting_key','services_cashfree_secret')->exists()) {
                             Setting::where('setting_key','services_cashfree_secret')->update([
                        'setting_value'=>$request['services_cashfree_secret'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_cashfree_secret',
                                'setting_value'=>$request['services_cashfree_secret'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
 
                }
               
            }
              else{
                if (Setting::where('setting_key','services_cashfree_active')->exists()) {
                    $setting=Setting::where('setting_key','services_cashfree_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('services_payu_active')) {
            
             if (Setting::where('setting_key','services_payu_active')->exists()) {
                    Setting::where('setting_key','services_payu_active')->update([
                        'setting_value'=>$request['services_payu_active'],
                     ]);
                     
                     
                    if($request->has('payu_settings_mode')) {
                         if (Setting::where('setting_key','payu_settings_mode')->exists()) {
                             Setting::where('setting_key','payu_settings_mode')->update([
                        'setting_value'=>$request['payu_settings_mode'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'payu_settings_mode',
                                'setting_value'=>$request['payu_settings_mode'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_payu_key')) {
                         if (Setting::where('setting_key','services_payu_key')->exists()) {
                             Setting::where('setting_key','services_payu_key')->update([
                        'setting_value'=>$request['services_payu_key'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_payu_key',
                                'setting_value'=>$request['services_payu_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_payu_salt')) {
                         if (Setting::where('setting_key','services_payu_salt')->exists()) {
                             Setting::where('setting_key','services_payu_salt')->update([
                        'setting_value'=>$request['services_payu_salt'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_payu_salt',
                                'setting_value'=>$request['services_payu_salt'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
     
                }
                else{
                         Setting::create([
                'setting_key'=>'services_payu_active',
                'setting_value'=>$request['services_payu_active'],
                'status'=>'active',
                 ]);
                 
                if($request->has('payu_settings_mode')) {
                         if (Setting::where('setting_key','payu_settings_mode')->exists()) {
                             Setting::where('setting_key','payu_settings_mode')->update([
                        'setting_value'=>$request['payu_settings_mode'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'payu_settings_mode',
                                'setting_value'=>$request['payu_settings_mode'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_payu_key')) {
                         if (Setting::where('setting_key','services_payu_key')->exists()) {
                             Setting::where('setting_key','services_payu_key')->update([
                        'setting_value'=>$request['services_payu_key'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_payu_key',
                                'setting_value'=>$request['services_payu_key'],
                                'status'=>'active',
                                 ]);
                         }
                     }
 
                    if($request->has('services_payu_salt')) {
                         if (Setting::where('setting_key','services_payu_salt')->exists()) {
                             Setting::where('setting_key','services_payu_salt')->update([
                        'setting_value'=>$request['services_payu_salt'],
                     ]);
                         }
                         else{
                              Setting::create([
                                'setting_key'=>'services_payu_salt',
                                'setting_value'=>$request['services_payu_salt'],
                                'status'=>'active',
                                 ]);
                         }
                     } 
 
                }
               
            }
              else{
                if (Setting::where('setting_key','services_payu_active')->exists()) {
                    $setting=Setting::where('setting_key','services_payu_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('payment_offline_active')) {
            
             if (Setting::where('setting_key','payment_offline_active')->exists()) {
                    Setting::where('setting_key','payment_offline_active')->update([
                        'setting_value'=>$request['payment_offline_active'],
                     ]);
                }
                else{
                    Setting::create([
                'setting_key'=>'payment_offline_active',
                'setting_value'=>$request['payment_offline_active'],
                'status'=>'active',
                 ]);
                }
                
                
            }
              else{
                if (Setting::where('setting_key','payment_offline_active')->exists()) {
                    $setting=Setting::where('setting_key','payment_offline_active')->first();
                    $setting->delete();
                    
                }
            }
        if($request->has('payment_offline_instruction')) {
            
             if (Setting::where('setting_key','payment_offline_instruction')->exists()) {
                    Setting::where('setting_key','payment_offline_instruction')->update([
                        'setting_value'=>$request['payment_offline_instruction'],
                     ]);
                }
                else{
                    Setting::create([
                'setting_key'=>'payment_offline_instruction',
                'setting_value'=>$request['payment_offline_instruction'],
                'status'=>'active',
                 ]);
                }
                
            }
              else{
                if (Setting::where('setting_key','payment_offline_instruction')->exists()) {
                    $setting=Setting::where('setting_key','payment_offline_instruction')->first();
                    $setting->delete();
                    
                }
            }
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return redirect()->back();
           
    }

    public function language_store(Request $request)
    {
       
        if($request->has('app_locale')) {
            
             if (Setting::where('setting_key','app_locale')->exists()) {
                    Setting::where('setting_key','app_locale')->update([
                        'setting_value'=>$request['app_locale'],
                     ]);
                }
                else{
                     Setting::create([
                'setting_key'=>'app_locale',
                'setting_value'=>$request['app_locale'],
                'status'=>'active',
                 ]);
                }
               
            }
        if($request->has('app_display_type')) {
            
             if (Setting::where('setting_key','app_display_type')->exists()) {
                    Setting::where('setting_key','app_display_type')->update([
                        'setting_value'=>$request['app_display_type'],
                     ]);
                }
                else{
                     Setting::create([
                    'setting_key'=>'app_display_type',
                    'setting_value'=>$request['app_display_type'],
                    'status'=>'active',
                     ]);
                }
              
            }
           session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return redirect()->back();
           
    }

    public function setEnvironmentValue($key, $value){
           
             $path = app()->environmentFilePath();

                $escaped = preg_quote('='.env($key), '/');
            
                file_put_contents($path, preg_replace(
                    "/^{$key}{$escaped}/m",
                    "{$key}={$value}",
                    file_get_contents($path)
                ));
            if (file_exists(\App::getCachedConfigPath())) {
                Artisan::call("config:cache");
            }
        }

	public function remove_logo(Request $request)
    {

        $key = $request->key;
        if ($setting=Setting::where('setting_key',$key)->first()) {
            if (isset($setting->setting_value) && file_exists(public_path('logos/'.$setting->setting_value))) {
                unlink(public_path('logos/'.$setting->setting_value));
                            }
                $setting->delete();            
                }
        echo json_encode($key);
        exit;
    }

}
