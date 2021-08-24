<?php

use App\Models\Setting;
  
function helper_app_name(){
    if (Setting::where('setting_key', 'app_name')->exists())
    {
        $setting=Setting::where('setting_key','app_name')->first('setting_value');
        return $setting->setting_value;   
    }
}

function helper_google_analytics_id(){   
    if (Setting::where('setting_key', 'google_analytics_id')->exists())
    {
        
        $setting=Setting::where('setting_key','google_analytics_id')->first('setting_value');
        return $setting->setting_value;
    }
}

function helper_teacher_commission_rate(){
    if (Setting::where('setting_key', 'teacher_commission_rate')->exists())
    {
        $setting=Setting::where('setting_key','teacher_commission_rate')->first('setting_value');
        return $setting->setting_value;  
    }
}

function helper_custom_css(){
    if (Setting::where('setting_key', 'custom_css')->exists())
    {
        $setting=Setting::where('setting_key','custom_css')->first('setting_value');
        return $setting->setting_value;
    }
}


function helper_custom_js(){
    if (Setting::where('setting_key', 'custom_js')->exists())
    {
        $setting=Setting::where('setting_key','custom_js')->first('setting_value');
        return $setting->setting_value;   
    }
}



function helper_mail_from_name(){
    if (Setting::where('setting_key', 'mail_from_name')->exists())
    {
        $setting=Setting::where('setting_key','mail_from_name')->first('setting_value');
        return $setting->setting_value;   
    }
}



function helper_mail_from_address(){
    if (Setting::where('setting_key', 'mail_from_address')->exists())
    {
        $setting=Setting::where('setting_key','mail_from_address')->first('setting_value');
        return $setting->setting_value;  
    }
}




function helper_mail_driver(){
    if (Setting::where('setting_key', 'mail_driver')->exists())
    {
        $setting=Setting::where('setting_key','mail_driver')->first('setting_value');
        return $setting->setting_value;  
    }
}




function helper_mail_host(){
    if (Setting::where('setting_key', 'mail_host')->exists())
    {
        $setting=Setting::where('setting_key','mail_host')->first('setting_value');
        return $setting->setting_value;
    }
}




function helper_mail_port(){
    if (Setting::where('setting_key', 'mail_port')->exists())
    {
        $setting=Setting::where('setting_key','mail_port')->first('setting_value');
        return $setting->setting_value; 
    }
}




function helper_mail_username(){
    if (Setting::where('setting_key', 'mail_username')->exists())
    {
        $setting=Setting::where('setting_key','mail_username')->first('setting_value');
        return $setting->setting_value;   
    }
}




function helper_mail_password(){
    if (Setting::where('setting_key', 'mail_password')->exists())
    {
        $setting=Setting::where('setting_key','mail_password')->first('setting_value');
        return $setting->setting_value;  
    }
}




function helper_payment_offline_instruction(){
    if (Setting::where('setting_key', 'payment_offline_instruction')->exists())
    {
        $setting=Setting::where('setting_key','payment_offline_instruction')->first('setting_value');
        return $setting->setting_value;   
    }
}




function helper_services_stripe_active(){
    
    if (Setting::where('setting_key', 'services_stripe_active')->exists())
    {
        $setting=Setting::where('setting_key','services_stripe_active')->first('setting_value');
        return $setting->setting_value;   
    }
}





function helper_flutter_active(){
    if (Setting::where('setting_key', 'flutter_active')->exists())
    {
        $setting=Setting::where('setting_key','flutter_active')->first('setting_value');
        return $setting->setting_value;   
    }
}





function helper_paypal_active(){
 if (Setting::where('setting_key', 'paypal_active')->exists())
    {
        $setting=Setting::where('setting_key','paypal_active')->first('setting_value');
        return $setting->setting_value;   
    }
}





function helper_services_instamojo_active(){
 if (Setting::where('setting_key', 'services_instamojo_active')->exists())
    {
        $setting=Setting::where('setting_key','services_instamojo_active')->first('setting_value');
        return $setting->setting_value;   
    }
}





function helper_services_razorpay_active(){
 if (Setting::where('setting_key', 'services_razorpay_active')->exists())
    {
        $setting=Setting::where('setting_key','services_razorpay_active')->first('setting_value');
        return $setting->setting_value;   
    }  
}





function helper_services_cashfree_active(){
 if (Setting::where('setting_key', 'services_cashfree_active')->exists())
    {
        $setting=Setting::where('setting_key','services_cashfree_active')->first('setting_value');
        return $setting->setting_value;   
    }
}




function helper_services_payu_active(){
 if (Setting::where('setting_key', 'services_payu_active')->exists())
    {
        $setting=Setting::where('setting_key','services_payu_active')->first('setting_value');
        return $setting->setting_value;   
    }   
}




function helper_payment_offline_active(){
 if (Setting::where('setting_key', 'payment_offline_active')->exists())
    {
        $setting=Setting::where('setting_key','payment_offline_active')->first('setting_value');
        return $setting->setting_value;   
    }
}




function helper_layout_type(){
 if (Setting::where('setting_key', 'layout_type')->exists())
    {
        $setting=Setting::where('setting_key','layout_type')->first('setting_value');
        return $setting->setting_value;   
    }
}





function helper_theme_layout(){
 if (Setting::where('setting_key', 'theme_layout')->exists())
    {
        $setting=Setting::where('setting_key','theme_layout')->first('setting_value');
        return $setting->setting_value;   
    }
}





function helper_mail_encryption(){
 if (Setting::where('setting_key', 'mail_encryption')->exists())
    {
        $setting=Setting::where('setting_key','mail_encryption')->first('setting_value');
        return $setting->setting_value;   
    } 
}






function helper_app_currency(){
 if (Setting::where('setting_key', 'app_currency')->exists())
    {
        $setting=Setting::where('setting_key','app_currency')->first('setting_value');
        return $setting->setting_value;   
    } 
}





function helper_app_locale(){
 if (Setting::where('setting_key', 'app_locale')->exists())
    {
        $setting=Setting::where('setting_key','app_locale')->first('setting_value');
        return $setting->setting_value;   
    } 
}






function helper_app_display_type(){
 if (Setting::where('setting_key', 'app_display_type')->exists())
    {
        $setting=Setting::where('setting_key','app_display_type')->first('setting_value');
        return $setting->setting_value;   
    } 
}



function helper_logo_b_image(){
 if (Setting::where('setting_key', 'logo_b_image')->exists())
    {
        $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
        return $setting->setting_value;   
    } 
}



function helper_logo_w_image(){
 if (Setting::where('setting_key', 'logo_w_image')->exists())
    {
        $setting=Setting::where('setting_key','logo_w_image')->first('setting_value');
        return $setting->setting_value;   
    } 
}






function helper_logo_white_image(){
 if (Setting::where('setting_key', 'logo_white_image')->exists())
    {
        $setting=Setting::where('setting_key','logo_white_image')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_logo_popup(){
 if (Setting::where('setting_key', 'logo_popup')->exists())
    {
        $setting=Setting::where('setting_key','logo_popup')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_favicon_image(){
 if (Setting::where('setting_key', 'favicon_image')->exists())
    {
        $setting=Setting::where('setting_key','favicon_image')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_services_stripe_key(){
 if (Setting::where('setting_key', 'services_stripe_key')->exists())
    {
        $setting=Setting::where('setting_key','services_stripe_key')->first('setting_value');
        return $setting->setting_value;   
    } 
}





function helper_services_stripe_secret(){
 if (Setting::where('setting_key', 'services_stripe_secret')->exists())
    {
        $setting=Setting::where('setting_key','services_stripe_secret')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_paypal_settings_mode(){
 if (Setting::where('setting_key', 'paypal_settings_mode')->exists())
    {
        $setting=Setting::where('setting_key','paypal_settings_mode')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_paypal_client_id(){
 if (Setting::where('setting_key', 'paypal_client_id')->exists())
    {
        $setting=Setting::where('setting_key','paypal_client_id')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_paypal_secret(){
 if (Setting::where('setting_key', 'paypal_secret')->exists())
    {
        $setting=Setting::where('setting_key','paypal_secret')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_rave_env(){
 if (Setting::where('setting_key', 'rave_env')->exists())
    {
        $setting=Setting::where('setting_key','rave_env')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_rave_publicKey(){
 if (Setting::where('setting_key', 'rave_publicKey')->exists())
    {
        $setting=Setting::where('setting_key','rave_publicKey')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_rave_secretKey(){
 if (Setting::where('setting_key', 'rave_secretKey')->exists())
    {
        $setting=Setting::where('setting_key','rave_secretKey')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_instamojo_settings_mode(){
 if (Setting::where('setting_key', 'instamojo_settings_mode')->exists())
    {
        $setting=Setting::where('setting_key','instamojo_settings_mode')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_services_instamojo_key(){
 if (Setting::where('setting_key', 'services_instamojo_key')->exists())
    {
        $setting=Setting::where('setting_key','services_instamojo_key')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_services_instamojo_secret(){
 if (Setting::where('setting_key', 'services_instamojo_secret')->exists())
    {
        $setting=Setting::where('setting_key','services_instamojo_secret')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_services_razorpay_key(){
 if (Setting::where('setting_key', 'services_razorpay_key')->exists())
    {
        $setting=Setting::where('setting_key','services_razorpay_key')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_services_razorpay_secret(){
 if (Setting::where('setting_key', 'services_razorpay_secret')->exists())
    {
        $setting=Setting::where('setting_key','services_razorpay_secret')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_cashfree_settings_mode(){
 if (Setting::where('setting_key', 'cashfree_settings_mode')->exists())
    {
        $setting=Setting::where('setting_key','cashfree_settings_mode')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_services_cashfree_app_id(){
 if (Setting::where('setting_key', 'services_cashfree_app_id')->exists())
    {
        $setting=Setting::where('setting_key','services_cashfree_app_id')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_services_cashfree_secret(){
 if (Setting::where('setting_key', 'services_cashfree_secret')->exists())
    {
        $setting=Setting::where('setting_key','services_cashfree_secret')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_payu_settings_mode(){
 if (Setting::where('setting_key', 'payu_settings_mode')->exists())
    {
        $setting=Setting::where('setting_key','payu_settings_mode')->first('setting_value');
        return $setting->setting_value;   
    } 
}



function helper_services_payu_key(){
 if (Setting::where('setting_key', 'services_payu_key')->exists())
    {
        $setting=Setting::where('setting_key','services_payu_key')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_services_payu_salt(){
 if (Setting::where('setting_key', 'services_payu_salt')->exists())
    {
        $setting=Setting::where('setting_key','services_payu_salt')->first('setting_value');
        return $setting->setting_value;   
    } 
}

function helper_paypal_client_password(){
 if (Setting::where('setting_key', 'paypal_client_password')->exists())
    {
        $setting=Setting::where('setting_key','paypal_client_password')->first('setting_value');
        return $setting->setting_value;   
    } 
}


function helper_paypal_client_certificate(){
 if (Setting::where('setting_key', 'paypal_client_certificate')->exists())
    {
        $setting=Setting::where('setting_key','paypal_client_certificate')->first('setting_value');
        return $setting->setting_value;   
    } 
}


// function helper_(){
//  if (Setting::where('setting_key', 'logo_b_image')->exists())
//     {
//         $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//         return $setting->setting_value;   
//     } 
// }

// function helper_(){
//  if (Setting::where('setting_key', 'logo_b_image')->exists())
//     {
//         $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//         return $setting->setting_value;   
//     } 
// }

// function helper_(){
//  if (Setting::where('setting_key', 'logo_b_image')->exists())
//     {
//         $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//         return $setting->setting_value;   
//     } 
// }
// function helper_(){
//  if (Setting::where('setting_key', 'logo_b_image')->exists())
//     {
//         $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//         return $setting->setting_value;   
//     } 
// }

// function helper_(){
//     $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//     return $setting->setting_value;   
// }





// function helper_(){
//     $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//     return $setting->setting_value;   
// }




// function helper_(){
//     $setting=Setting::where('setting_key','logo_b_image')->first('setting_value');
//     return $setting->setting_value;   
// }