@extends("layouts.app")

@section("content")

    <div class="row">
          <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="info-General-tab" data-toggle="tab" href="#General" role="tab" aria-controls="info-General" aria-selected="true">General</a></li>
                      <li class="nav-item"><a class="nav-link" id="Logos-info-tab" data-toggle="tab" href="#Logos" role="tab" aria-controls="info-Logos" aria-selected="false">Logos</a></li>
                      <li class="nav-item"><a class="nav-link" id="Layout-info-tab" data-toggle="tab" href="#Layout" role="tab" aria-controls="info-Layout" aria-selected="false">Layout</a></li>
                      
                      <li class="nav-item"><a class="nav-link" id="info-MailConfiguration-tab" data-toggle="tab" href="#MailConfiguration" role="tab" aria-controls="info-MailConfiguration" aria-selected="false">Mail Configuration</a></li>
                      <li class="nav-item"><a class="nav-link" id="PaymentConfiguration-info-tab" data-toggle="tab" href="#PaymentConfiguration" role="tab" aria-controls="info-PaymentConfiguration" aria-selected="false">Payment Configuration</a></li>
                      <li class="nav-item"><a class="nav-link" id="LanguageSettings-info-tab" data-toggle="tab" href="#LanguageSettings" role="tab" aria-controls="info-LanguageSettings" aria-selected="false">Language Settings</a></li>
                      
                    </ul>
                    <div class="tab-content" id="info-tabContent">
                      <div class="tab-pane fade show active" id="General" role="tabpanel" aria-labelledby="info-General-tab">
                           <form method="POST" enctype="multipart/form-data" action="{{route('setting.store')}}" class="theme-form">
                               @csrf
                              <div class="form-group">
                                    <label>App Name</label>

                                     <input id="app_name" type="text" placeholder="Learning Managment System" class="form-control @error('app_name') is-invalid @enderror" name="app_name" value="{{old('app_name')  ?? helper_app_name() ?? ''}}"   autocomplete="app_name" autofocus>

                                         @error('app_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group">
                                    <label>Google Analytics ID</label>

                                     <input id="google_analytics_id" type="text" placeholder="Ex. UA-34XXXXX23-3" class="form-control @error('google_analytics_id') is-invalid @enderror" name="google_analytics_id" value="{{old('google_analytics_id') ?? helper_google_analytics_id() ?? ''}}"   autocomplete="google_analytics_id" autofocus>

                                         @error('google_analytics_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                               <div class="form-group">
                                    <label>Teacher Commission Rate (%)</label>

                                     <input id="teacher_commission_rate" type="number" placeholder="5" class="form-control @error('teacher_commission_rate') is-invalid @enderror" name="teacher_commission_rate" value="{{old('name') ?? helper_teacher_commission_rate() ?? ''}}"   autocomplete="teacher_commission_rate" autofocus>

                                         @error('teacher_commission_rate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group">
                                    <label>Custom CSS</label>

 <textarea class="form-control  @error('custom_css') is-invalid @enderror mb-3" rows="3" name="custom_css" autocomplete="custom_css" id="custom_css" placeholder="Ex. body{background:blue;}">{{old('custom_css') ?? helper_custom_css() ?? ''}}</textarea>


                                         @error('custom_css')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                                    <label>Custom JS</label>

                                     <textarea class="form-control  @error('custom_js') is-invalid @enderror mb-3" rows="3" name="custom_js" autocomplete="custom_js" id="custom_js" placeholder="Ex. $('#Demo').on('click',function(){  alert(); })">{{old('custom_js') ?? helper_custom_js() ?? ''}}</textarea>
                                    

                                         @error('custom_js')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
    
                            </form>
                    </div>
                    <div class="tab-pane fade" id="Logos" role="tabpanel" aria-labelledby="Logos-info-tab">
                   <form method="POST" enctype="multipart/form-data" action="{{ route('logo_store' )}}" class="theme-form">
                       
                       @csrf
                             <div class="form-group">
                            <label for=""> Logo 1</label>
                            <input  class="form-control @error('logo_b_image') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="logo_b_image" accept="image/*" value="{{ old('logo_b_image') }}"  >
                        
                      <p class="help-text mb-0 font-italic">Note : Upload logo with <b>black text and transparent background in .png format</b> and <b>294x50</b>(WxH) pixels.<br> <b>Height</b> should be fixed, <b>width</b> according to your <b>aspect ratio</b>.</p>
                            </br>
                                @if(!empty(helper_logo_b_image()))  

                            <div style="background-color:#eeeeee;padding: 20px; width: 454px;" id="logo_logo_b_image">
                                    <img src="{{ asset('public/logos/'.helper_logo_b_image()) }}" class="" alt="..." width="294" height="50">
                           <button type="button" class="btn" style="background: transparent;border: none;color: black;font-size: 24px;margin-left: 30px;"  onclick="remove_logo('logo_b_image')" style="">X</button>
                           
                        </div>
                                @else
                                    <img src="{{ asset('public/assets/images/xolo-logo.png') }}" class="" alt="..." width="294" height="50">
                                @endif

                            @error('logo_b_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                         <div class="form-group">
                            <label for=""> Logo 2</label>
                              <input  class="form-control @error('logo_w_image') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="logo_w_image" accept="image/*" value="{{ old('logo_w_image') }}"  >
                              <p class="help-text mb-0 font-italic">Note : Upload logo with <b>white text and transparent background in .png format</b> and <b>294x50</b> (WxH) pixels.<br> <b>Height</b> should be fixed, <b>width</b> according to your <b>aspect ratio</b>.</p>
                                     </br>
                                     @if(!empty(helper_logo_w_image()))  
                                 
                                    <div style="background-color:#eeeeee;padding: 20px; width: 454px;" id="logo_logo_w_image">
                                    <img src="{{ asset('public/logos/'.helper_logo_w_image()) }}" class="" alt="..." width="294" height="50">
                           <button type="button" class="btn" style="background: transparent;border: none;color: black;font-size: 24px;margin-left: 30px;"  onclick="remove_logo('logo_w_image')" style="">X</button>
                           
                        </div>
                                @else
                                    <img src="{{ asset('public/assets/images/xolo-logo.png') }}" class="" alt="..." width="294" height="50">
                                @endif
                            @error('logo_w_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                         <hr>
                         <div class="form-group">
                            <label for="">Logo 3</label>
                              <input  class="form-control @error('logo_white_image') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="logo_white_image" accept="image/*" value="{{ old('logo_white_image') }}"  >
                                  <p class="help-text mb-0 font-italic">Note : Upload logo with <b>only in white text and transparent background in .png format</b> and <b>294x50</b>(WxH)  pixels.<br> <b>Height</b> should be fixed, <b>width</b> according to your <b>aspect ratio</b>.</p>
                                         </br>
                                    @if(!empty(helper_logo_white_image()))  
                                   
                                    
                                <div style="background-color:#eeeeee;padding: 20px; width: 454px;" id="logo_logo_white_image">
                                    <img src="{{ asset('public/logos/'.helper_logo_white_image()) }}" class="" alt="..." width="294" height="50">
                           <button type="button" class="btn" style="background: transparent;border: none;color: black;font-size: 24px;margin-left: 30px;"  onclick="remove_logo('logo_white_image')" style="">X</button>
                           
                        </div>
                                @else
                                    <img src="{{ asset('public/assets/images/xolo-logo.png') }}" class="" alt="..." width="294" height="50">
                                @endif
                            @error('logo_white_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                         <hr>
                         <div class="form-group">
                            <label for="">Logo for Popups</label>
                              <input  class="form-control @error('logo_popup') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="logo_popup" accept="image/*" value="{{ old('logo_popup') }}"  >
                                   <p class="help-text mb-0 font-italic">Note : Add square logo minimum resolution <b>72x72</b> pixels</p>
                                    </br>
                                     @if(!empty(helper_logo_popup()))  

                                    
                                <div style="background-color:#eeeeee;padding: 20px; width: 220px;" id="logo_logo_popup">
                                    <img src="{{ asset('public/logos/'.helper_logo_popup()) }}" class="" alt="..." width="72" height="72">
                           <button type="button" class="btn" style="background: transparent;border: none;color: black;font-size: 24px;margin-left: 30px;"  onclick="remove_logo('logo_popup')" style="">X</button>
                           
                        </div>
                                @else
                                    <img src="{{ asset('public/assets/images/xolo-logo.png') }}" class="" alt="..." width="72" height="72">
                                @endif
                            @error('logo_popup')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                         <hr>
                         <div class="form-group">
                            <label for="">Add Favicon</label>
                              <input  class="form-control @error('favicon_image') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="favicon_image" accept="image/*" value="{{ old('favicon_image') }}"  >
                                 <p class="help-text mb-0 font-italic">Note : Upload logo with resolution <b>32x32</b> pixels and extension <b>.png</b> or <b>.gif</b> or <b>.ico</b></p>
                                  </br>
                                  @if(!empty(helper_favicon_image()))  

                                    
                                <div style="background-color:#eeeeee;padding: 20px; width: 178px;" id="logo_favicon_image">
                                    <img src="{{ asset('public/logos/'.helper_favicon_image()) }}" class="" alt="..." width="32px" height="32px">
                           <button type="button" class="btn" style="background: transparent;border: none;color: black;font-size: 24px;margin-left: 30px;"  onclick="remove_logo('favicon_image')" style="">X</button>
                           
                        </div>
                                @else
                                    <img src="{{ asset('public/assets/images/favicon.png') }}" class="" alt="..." width="32" height="32">
                                @endif
                            @error('favicon_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
    
                            </form>
                          
                      </div>
                      
                      
                    <div class="tab-pane fade" id="Layout" role="tabpanel" aria-labelledby="Layout-info-tab">
                         <form method="POST" enctype="multipart/form-data" action="{{ route('layout_store')}}" class="theme-form">
                             @csrf
                                  <div class="form-group">
                                   <label>Layout Type</label>

                                     <select class="form-control" id="layout_type" name="layout_type">
                                                                                       <option value="wide-layout" 
                                                                                       @if(helper_layout_type()=="wide-layout")         
                                                    selected
                                                @endif
                                   
                                            >Wide</option>
                                            <option value="box-layout"
                                                                                       @if(helper_layout_type()=="box-layout")         
                                                    selected
                                                @endif                                   
                                            >Box</option>
                                   </select>
                                         <span class="help-text font-italic">This will change frontend theme layout type</span>
                                         @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div> 
                             
                             
                                 <div class="form-group">
                                   <label>Theme Layout</label>

                                     <select class="form-control" id="theme_layout" name="theme_layout">
                                                                                     <option value="1"
                                                                                     @if(helper_theme_layout()=="1")         
                                                    selected
                                                @endif
                                            >Layout 1</option>
                                             <option value="2"
                                                                                     @if(helper_theme_layout()=="2")         
                                                    selected
                                                @endif                                   
                                            >Layout 2</option>
                                             <option value="3"
                                                                                     @if(helper_theme_layout()=="3")         
                                                    selected
                                                @endif                                   
                                            >Layout 3</option>
                                             <option value="4"
                                                                                     @if(helper_theme_layout()=="4")         
                                                    selected
                                                @endif                                   
                                            >Layout 4</option>
                                   </select>
                                       <span class="help-text font-italic">This will change frontend theme layout</span>
                                         @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div> 
                 
                               <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
    
                            </form>
                      </div>
                                            
                      
                    <div class="tab-pane fade" id="MailConfiguration" role="tabpanel" aria-labelledby="info-MailConfiguration-tab">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('mail_configration_store')}}" class="theme-form">
                            @csrf
                                    <div class="form-group">
                                    <label>Mail From Name</label>

                                     <input id="mail_from_name" type="text" placeholder="Sender Name" class="form-control @error('mail_from_name') is-invalid @enderror" name="mail_from_name" value="{{old('mail_from_name') ?? helper_mail_from_name() ?? ''}}"   autocomplete="mail_from_name" autofocus>
                                    <span class="help-text font-italic">This will be display name for your sent email.</span>
                                         @error('mail_from_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                                     <div class="form-group">
                                    <label>Mail From Address</label>

                                     <input id="mail_from_address" type="email" placeholder="App Name" class="form-control @error('mail_from_address') is-invalid @enderror" name="mail_from_address" value="{{old('mail_from_address') ?? helper_mail_from_address() ?? ''}}"   autocomplete="mail_from_address" autofocus>
                                    <span class="help-text font-italic">This email will be used for "Contact Form" correspondence.</span>
                                         @error('mail_from_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                             
                                     <div class="form-group">
                                    <label>Mail Driver</label>

                                     <input id="mail_driver" type="text" placeholder="Ex. smtp" class="form-control @error('mail_driver') is-invalid @enderror" name="mail_driver" value="{{old('mail_driver') ?? helper_mail_driver() ?? ''}}"   autocomplete="mail_driver" autofocus>
                                  <span class="help-text font-italic">You can select any driver you want for your Mail setup. <b>Ex. SMTP, Mailgun, Mandrill, SparkPost, Amazon SES etc.</b><br> Add <b>single driver only</b>.</span>
                                         @error('mail_driver')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                                     <div class="form-group">
                                    <label>Mail HOST</label>

                                     <input id="mail_host" type="text" placeholder="Ex. smtp.gmail.com" class="form-control @error('mail_host') is-invalid @enderror" name="mail_host" value="{{old('name') ?? helper_mail_host() ?? ''}}"   autocomplete="mail_host" autofocus>
                                  
                                         @error('mail_host')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                                     <div class="form-group">
                                    <label>Mail PORT</label>

                                     <input id="mail_port" type="text" placeholder="Ex. 465" class="form-control @error('mail_port') is-invalid @enderror" name="mail_port" value="{{old('mail_port') ?? helper_mail_port() ?? ''}}"   autocomplete="mail_port" autofocus>
                                    
                                         @error('mail_port')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                                     <div class="form-group">
                                    <label>Mail Username</label>

                                     <input id="mail_username" type="text" placeholder="Ex. myemail@email.com" class="form-control @error('mail_username') is-invalid @enderror" name="mail_username" value="{{old('mail_username') ?? helper_mail_username() ?? ''}}"   autocomplete="mail_username" autofocus>
                                   <span class="help-text font-italic">Add your email id you want to configure for sending emails</span>
                                         @error('mail_username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             
                                     <div class="form-group">
                                    <label>Mail Password</label>

                                     <input id="mail_password" type="text" placeholder="Mail Password" class="form-control @error('mail_password') is-invalid @enderror" name="mail_password" value="{{old('mail_password') ?? helper_mail_password() ?? ''}}"   autocomplete="mail_password" autofocus>
                               <span class="help-text font-italic">Add your email password you want to configure for sending emails</span>
                                         @error('mail_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                           
                            <div class="form-group">
                                    <label>Mail Encryption</label>

                                     <select class="form-control" id="mail_encryption" name="mail_encryption">
                                                                                    <option selected="" value="tls"
                                                                                     @if(helper_mail_encryption()=="tls")         
                                                    selected
                                                @endif
                                                >
                                                tls
                                            </option>
                                                                                    <option value="ssl"
                                            @if(helper_mail_encryption()=="ssl")         
                                                    selected
                                                @endif                                        >
                                               ssl
                                            </option>
                                   </select>
                                        <span class="help-text font-italic">Use <b>tls</b> if your site uses <b>HTTP</b> protocol and <b>ssl</b> if you site uses <b>HTTPS</b> protocol</span>
                                         @error('mail_encryption')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                          
                       
                             <hr>
                             <p class="help-text mb-1"><b>Important Note</b> : IF you are using <b>GMAIL</b> for Mail configuration, make sure you have completed following process before updating:
 </p>
 <ul class="mb-3">
    <li>Go to <a target="_blank" href="https://myaccount.google.com/security">My Account</a> from your Google Account you want to configure and Login</li>
    <li>Scroll down to <b>Less secure app access</b> and set it <b>ON</b></li>
</ul>
                                <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
    
                            </form>
                      </div>
                                            
                      
                    <div class="tab-pane fade" id="PaymentConfiguration" role="tabpanel" aria-labelledby="PaymentConfiguration-info-tab">
                         <form method="POST" enctype="multipart/form-data" action="{{ route('payment_configration_store')}}" class="theme-form">
                             @csrf
                                <div class="form-group">
                                    <label>Select Currency</label>

                                     <select class="form-control" id="app_currency" name="app_currency">
                                                                                    <option selected="" value="USD"
                                            @if(helper_app_currency()=="USD")         
                                                    selected
                                                @endif                                         >
                                                $ - United States dollar
                                            </option>
                                                                                    <option value="AUD"
                                            @if(helper_app_currency()=="AUD")         
                                                    selected
                                                @endif                                        >
                                                AUD - Australian dollar
                                            </option>
                                                                                    <option value="BRL"
                                            @if(helper_app_currency()=="BRL")         
                                                    selected
                                                @endif                                        >
                                                R$ - Brazilian real
                                            </option>
                                                                                    <option value="CAD"
                                            @if(helper_app_currency()=="CAD")         
                                                    selected
                                                @endif                                        >
                                                CAD - Canadian dollar
                                            </option>
                                                                                    <option value="DKK"
                                            @if(helper_app_currency()=="DKK")         
                                                    selected
                                                @endif                                        >
                                                KR - Danish krone
                                            </option>
                                                                                    <option value="EUR"
                                            @if(helper_app_currency()=="EUR")         
                                                    selected
                                                @endif                                        >
                                                € - Euro
                                            </option>
                                                                                    <option value="HKD"
                                            @if(helper_app_currency()=="HKD")         
                                                    selected
                                                @endif                                        >
                                                HKD - Hong Kong dollar
                                            </option>
                                                                                    <option value="ILS"
                                            @if(helper_app_currency()=="ILS")         
                                                    selected
                                                @endif                                        >
                                                ₪ - Israeli new shekel
                                            </option>
                                                                                    <option value="MYR"
                                            @if(helper_app_currency()=="MYR")         
                                                    selected
                                                @endif                                        >
                                                RM - Malaysian ringgit
                                            </option>
                                                                                    <option value="MXN"
                                            @if(helper_app_currency()=="MXN")         
                                                    selected
                                                @endif                                        >
                                                MXN - Mexican peso
                                            </option>
                                                                                    <option value="NZD"
                                                                                    @if(helper_app_currency()=="NZD")         
                                                    selected
                                                @endif
                                                >
                                                NZD - New Zealand dollar
                                            </option>
                                                                                    <option value="NOK"
                                            @if(helper_app_currency()=="NOK")         
                                                    selected
                                                @endif                                        >
                                                kr - Norwegian krone
                                            </option>
                                                                                    <option value="PHP"
                                            @if(helper_app_currency()=="PHP")         
                                                    selected
                                                @endif                                        >
                                                ₱ - Philippine peso
                                            </option>
                                                                                    <option value="PLN"
                                            @if(helper_app_currency()=="PLN")         
                                                    selected
                                                @endif                                        >
                                                zł - Polish złoty
                                            </option>
                                                                                    <option value="GBP"
                                            @if(helper_app_currency()=="GBP")         
                                                    selected
                                                @endif                                        >
                                                £ - 	British pound
                                            </option>
                                                                                    <option value="RUB"
                                            @if(helper_app_currency()=="RUB")         
                                                    selected
                                                @endif                                        >
                                                RUB - Russian ruble
                                            </option>
                                                                                    <option value="SGD"
                                            @if(helper_app_currency()=="SGD")         
                                                    selected
                                                @endif                                        >
                                                SGD - Singapore dollar
                                            </option>
                                                                                    <option value="SEK"
                                            @if(helper_app_currency()=="SEK")         
                                                    selected
                                                @endif                                        >
                                                SEK - Swedish krona
                                            </option>
                                                                                    <option value="CHF"
                                            @if(helper_app_currency()=="CHF")         
                                                    selected
                                                @endif                                        >
                                                CHF - Swiss franc
                                            </option>
                                                                                    <option value="THB"
                                            @if(helper_app_currency()=="THB")         
                                                    selected
                                                @endif                                        >
                                                ฿ - Thai baht
                                            </option>
                                                                            </select>

                                         @error('app_currency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                          <div class="form-group">
                              <label>Stripe Payment Method</label>
                            <label class="switch mt-3" style="margin-bottom: 0px;margin-left: 12%;">
                              <input type="checkbox" id="services_stripe_active" name="services_stripe_active" value="1" onchange="strip_fields_show()"  
                              @if(helper_services_stripe_active()=="1")         
                                  checked
                              @endif >
                              <span class="slider round"></span>
                            </label>
                            
                                    <a class="float-right font-weight-bold font-italic" href="https://stripe.com/docs/keys" target="_blank">How to get STRIPE API Credentials?</a>
                                    <br>
                                    <small>
                                        <i> Enables payments in site with Debit / Credit Cards</i>
                                    </small>
                             </div>
                                <div class="form-group services_stripe_active_fields">
                                    <label>API Key</label>

                                     <input id="services_stripe_key" type="text" placeholder="" class="form-control @error('services_stripe_key') is-invalid @enderror" name="services_stripe_key" value="{{old('services_stripe_key') ?? helper_services_stripe_key() ?? ''}}"   autocomplete="services_stripe_key" autofocus>
                                  
                                         @error('services_stripe_key')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group services_stripe_active_fields">
                                    <label>API Secret</label>

                                     <input id="services_stripe_secret" type="text" placeholder="" class="form-control @error('services_stripe_secret') is-invalid @enderror" name="services_stripe_secret" value="{{old('services_stripe_secret') ?? helper_services_stripe_secret() ?? ''}}"   autocomplete="services_stripe_secret" autofocus>
                                  
                                         @error('services_stripe_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>Paypal Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 12%;">
                              <input type="checkbox" id="paypal_active" name="paypal_active" value="1" onchange="paypal_fields_show()" 
                              @if(helper_paypal_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                            
                                    <a target="_blank" href="https://developer.paypal.com/developer/applications/" class="float-right font-italic font-weight-bold">How to get PayPal API Credentials?</a>
                                    <br>
                                    <small>
                                        <i> Redirects to paypal for payment</i>
                                    </small>
                             </div>
                            <div class="form-group paypal_active_fields">
                                    <label>Mode</label>

                                        <select class="form-control" id="paypal_settings_mode" name="paypal_settings_mode">
                                                    <option value="sandbox" @if(helper_paypal_settings_mode()=="sandbox")         
                                                    selected
                                                @endif >Sandbox</option>
                                                    <option value="live" @if(helper_paypal_settings_mode()=="live")         
                                                    selected
                                                @endif>Live</option>
                                                </select>
                                                <span class="help-text font-italic"><b>Sandbox</b>= Will be used for testing payments with PayPal Test Credentials. Account with USD only can make payments with PayPal for now. This options will redirect to test PayPal payment with Sandbox User Credentials. It will be used for dummy transactions only.<br>
<b>Live</b> = Will be used with you Live PayPal credentials to make actual transaction with normal users with PayPal account.</span>
                                         @error('paypal_settings_mode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group paypal_active_fields">
                                    <label>Client Username</label>

                                     <input id="paypal_client_id" type="text" placeholder="" class="form-control @error('paypal_client_id') is-invalid @enderror" name="paypal_client_id" value="{{old('paypal_client_id') ?? helper_paypal_client_id() ?? ''}}"   autocomplete="paypal_client_id" autofocus>
                                  
                                         @error('paypal_client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                            <div class="form-group paypal_active_fields">
                                    <label>Client Password</label>

                                     <input id="paypal_client_password" type="text" placeholder="" class="form-control @error('paypal_client_password') is-invalid @enderror" name="paypal_client_password" value="{{old('paypal_client_password') ?? helper_paypal_client_password() ?? ''}}"   autocomplete="paypal_client_password" autofocus>
                                  
                                         @error('paypal_client_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                                                         <div class="form-group paypal_active_fields">
                                    <label>Client Certificate</label>

                                     <input id="paypal_client_certificate" type="text" placeholder="" class="form-control @error('paypal_client_certificate') is-invalid @enderror" name="paypal_client_certificate" value="{{old('paypal_client_certificate') ?? helper_paypal_client_certificate() ?? ''}}"   autocomplete="paypal_client_certificate" autofocus>
                                  
                                         @error('paypal_client_certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group paypal_active_fields">
                                    <label>Secret</label>

                                     <input id="paypal_secret" type="text" placeholder="" class="form-control @error('paypal_secret') is-invalid @enderror" name="paypal_secret" value="{{old('paypal_secret') ?? helper_paypal_secret() ?? ''}}"   autocomplete="paypal_secret" autofocus>
                                  
                                         @error('paypal_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>Flutter Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 12%;">
                              <input type="checkbox" name="flutter_active" id="flutter_active" value="1"  onchange="flutter_active_fields_show()"          
                              @if(helper_flutter_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                            
                               <a target="_blank" href="https://developer.flutterwave.com/docs/api-keys" class="float-right font-italic font-weight-bold">How to get Flutter API Credentials?</a>
                                    <br>
                                 <small>
                                        <i> Redirects to Flutter for payment</i>
                                    </small>
                             </div>
                             <div class="form-group flutter_active_fields">
                                    <label>Mode</label>

                                        <select class="form-control" id="rave_env" name="rave_env">
                                                    <option value="sandbox" @if(helper_rave_env()=="sandbox")         
                                                    selected
                                                @endif>Sandbox</option>
                                                    <option value="live" @if(helper_rave_env()=="live")         
                                                    selected
                                                @endif>Live</option>
                                                </select>
                                                
                                         @error('rave_env')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group flutter_active_fields">
                                    <label>API Key</label>

                                     <input id="rave_publicKey" type="text" placeholder="" class="form-control @error('rave_publicKey') is-invalid @enderror" name="rave_publicKey" value="{{old('rave_publicKey') ?? helper_rave_publicKey() ?? ''}}"   autocomplete="rave_publicKey" autofocus>
                                  
                                         @error('rave_publicKey')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group flutter_active_fields">
                                    <label>API Secret</label>

                                     <input id="rave_secretKey" type="text" placeholder="" class="form-control @error('rave_secretKey') is-invalid @enderror" name="rave_secretKey" value="{{old('rave_secretKey') ?? helper_rave_secretKey() ?? ''}}"   autocomplete="rave_secretKey" autofocus>
                                  
                                         @error('rave_secretKey')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>Instamojo Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 10%;">
                              <input type="checkbox" name="services_instamojo_active" id="services_instamojo_active" value="1" onchange="services_instamojo_active_fields_show()"  
                              @if(helper_services_instamojo_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                            
                                    <br>
                                    <small>
                                        <i>Redirects to instamojo for payment</i>
                                    </small>
                             </div>
                              <div class="form-group services_instamojo_active_fields">
                                    <label>Mode</label>

                                        <select class="form-control" id="instamojo_settings_mode" name="instamojo_settings_mode">
                                                    <option value="sandbox" @if(helper_instamojo_settings_mode()=="sandbox")         
                                                    selected
                                                @endif >Sandbox</option>
                                                    <option value="live" @if(helper_instamojo_settings_mode()=="live")         
                                                    selected
                                                @endif >Live</option>
                                                </select>
                                        <span class="help-text font-italic"><b>Sandbox</b>= Will be used for testing payments with Instamojo Test Credentials. This options will redirect to test Instamojo payment with Sandbox User Credentials. It will be used for dummy transactions only.<br><a href="//test.instamojo.com/">How to get Instamojo Test API Credentials?</a><br>
<b>Live</b> = Will be used with you Live Instamojo credentials to make actual transaction with normal users with Instamojo account.<br><a href="//www.instamojo.com">How to get Instamojo Live API Credentials?</a></span>        
                                         @error('instamojo_settings_mode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_instamojo_active_fields">
                                    <label>API Key</label>

                                     <input id="services_instamojo_key" type="text" placeholder="" class="form-control @error('services_instamojo_key') is-invalid @enderror" name="services_instamojo_key" value="{{old('services_instamojo_key') ?? helper_services_instamojo_key() ?? ''}}"   autocomplete="services_instamojo_key" autofocus>
                                  
                                         @error('services_instamojo_key')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_instamojo_active_fields">
                                    <label>API Token</label>

                                     <input id="services_instamojo_secret" type="text" placeholder="" class="form-control @error('services_instamojo_secret') is-invalid @enderror" name="services_instamojo_secret" value="{{old('services_instamojo_secret') ?? helper_services_instamojo_secret() ?? ''}}"   autocomplete="services_instamojo_secret" autofocus>
                                  
                                         @error('services_instamojo_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>Razorpay Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 11%;">
                              <input type="checkbox" name="services_razorpay_active" id="services_razorpay_active" value="1" onchange="services_razorpay_active_fields_show()" 
                              @if(helper_services_razorpay_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                            
                                    <a class="float-right font-weight-bold font-italic" href="https://dashboard.razorpay.com/" target="_blank">How to get RAZORPAY API Credentials?</a>
                                    <br>
                                    <small>
                                        <i> Redirects to RazorPay for payment</i>
                                    </small>
                             </div>
                                <div class="form-group services_razorpay_active_fields">
                                    <label>API Key</label>

                                     <input id="services_razorpay_key" type="text" placeholder="" class="form-control @error('services_razorpay_key') is-invalid @enderror" name="services_razorpay_key" value="{{old('services_razorpay_key') ?? helper_services_razorpay_key() ?? ''}}"   autocomplete="services_razorpay_key" autofocus>
                                  
                                         @error('services_razorpay_key')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_razorpay_active_fields">
                                    <label>API Secret</label>

                                     <input id="services_razorpay_secret" type="text" placeholder="" class="form-control @error('services_razorpay_secret') is-invalid @enderror" name="services_razorpay_secret" value="{{old('services_razorpay_secret') ?? helper_services_razorpay_secret() ?? ''}}"   autocomplete="services_razorpay_secret" autofocus>
                                  
                                         @error('services_razorpay_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>CashFree Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 11%;">
                              <input type="checkbox" name="services_cashfree_active" id="services_cashfree_active" value="1" onchange="services_cashfree_active_fields_show()" 
                              @if(helper_services_cashfree_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                                    <br>
                                    <small>
                                        <i>Redirects to CashFree for payment</i>
                                    </small>
                             </div>
                             <div class="form-group services_cashfree_active_fields">
                                    <label>Mode</label>

                                        <select class="form-control" id="cashfree_settings_mode" name="cashfree_settings_mode">
                                                    <option value="sandbox" @if(helper_cashfree_settings_mode()=="sandbox")         
                                                    selected
                                                @endif >Sandbox</option>
                                                    <option value="live" @if(helper_cashfree_settings_mode()=="live")         
                                                    selected
                                                @endif >Live</option>
                                                </select>
                                        <span class="help-text font-italic"><b>Sandbox</b>= Will be used for testing payments with CasFree Test Credentials. Account with INR only can make payments with Cashfree for now. This options will redirect to test Cashfree payment with Sandbox User Credentials. It will be used for dummy transactions only.<br><a href="//test.cashfree.com">How to get Cashfree Test API Credentials?</a><br>
<b>Live</b> = Will be used with you Live Cashfree credentials to make actual transaction with normal users with Cashfree account.<br><strong>If you set this payment gateway then set your currency as INR</strong><br><a href="//www.cashfree.com">How to get Cashfree Live API Credentials?</a></span>        
                                         @error('cashfree_settings_mode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_cashfree_active_fields">
                                    <label>App ID</label>

                                     <input id="services_cashfree_app_id" type="text" placeholder="" class="form-control @error('services_cashfree_app_id') is-invalid @enderror" name="services_cashfree_app_id" value="{{old('services_cashfree_app_id') ?? helper_services_cashfree_app_id() ?? ''}}"   autocomplete="services_cashfree_app_id" autofocus>
                                  
                                         @error('services_cashfree_app_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_cashfree_active_fields">
                                    <label>Secret Key</label>

                                     <input id="services_cashfree_secret" type="text" placeholder="" class="form-control @error('services_cashfree_secret') is-invalid @enderror" name="services_cashfree_secret" value="{{old('services_cashfree_secret') ?? helper_services_cashfree_secret() ?? ''}}"   autocomplete="services_cashfree_secret" autofocus>
                                  
                                         @error('services_cashfree_secret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>PayUMoney Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 10%;"> 
                              <input type="checkbox" name="services_payu_active" id="services_payu_active" value="1" onchange="services_payu_active_fields_show()" 
                              @if(helper_services_payu_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                            
                               <a class="float-right font-weight-bold font-italic" href="//www.payumoney.com/merchant-dashboard/#/integration" target="_blank">How to get PayUMoney API Credentials?</a>
                                    <br>
                                    <small>
                                        <i> Redirects to PayUMoney for payment</i>
                                    </small>
                             </div>
                             <div class="form-group services_payu_active_fields">
                                    <label>Mode</label>

                                        <select class="form-control" id="payu_settings_mode" name="payu_settings_mode">
                                                    <option value="sandbox" @if(helper_payu_settings_mode()=="sandbox")         
                                                    selected
                                                @endif >Sandbox</option>
                                                    <option value="live" @if(helper_payu_settings_mode()=="live")         
                                                    selected
                                                @endif>Live</option>
                                                </select>
                                       <span class="help-text font-italic"><b>Sandbox</b>= Will be used for testing payments with PayUMoney Test Credentials. Account with INR only can make payments with Payment for now. This options will redirect to test PayUMoney payment with Sandbox User Credentials. It will be used for dummy transactions only.<br>
<b>Live</b> = Will be used with you Live PayUMoney credentials to make actual transaction with normal users with PayUMoney account.<br><strong>If you set this payment gateway then set your currency as INR</strong></span>       
                                         @error('payu_settings_mode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_payu_active_fields">
                                    <label>API Key</label>

                                     <input id="services_payu_key" type="text" placeholder="" class="form-control @error('services_payu_key') is-invalid @enderror" name="services_payu_key" value="{{old('services_payu_key') ?? helper_services_payu_key() ?? ''}}"   autocomplete="services_payu_key" autofocus>
                                  
                                         @error('services_payu_key')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                             <div class="form-group services_payu_active_fields">
                                    <label>Salt</label>

                                     <input id="services_payu_salt" type="text" placeholder="" class="form-control @error('services_payu_salt') is-invalid @enderror" name="services_payu_salt" value="{{old('services_payu_salt') ?? helper_services_payu_salt() ?? ''}}"   autocomplete="services_payu_salt" autofocus>
                                  
                                         @error('services_payu_salt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div>
                               <div class="form-group">
                              <label>Offline Payment Method</label>
                            <label class="switch   mt-3" style="margin-bottom: 0px;margin-left: 14%;">
                              <input type="checkbox" name="payment_offline_active" id="payment_offline_active" value="1" onchange="payment_offline_fields_show()" 
                              @if(helper_payment_offline_active()=="1")         
                                  checked
                              @endif>
                              <span class="slider round"></span>
                            </label>
                                    <br>
                                    <small>
                                        <i>User gets assistance for offline payment via admin</i>
                                    </small>
                             </div>
                            <textarea class="form-control mb-3" rows="3" name="payment_offline_instruction" id="payment_offline_instruction" placeholder="Enter offline payment instructions">{{old('mail_password') ?? helper_payment_offline_instruction() ?? ''}}</textarea>
                               <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
    
                            </form>
                      </div>
                                            
                      
                    <div class="tab-pane fade" id="LanguageSettings" role="tabpanel" aria-labelledby="LanguageSettings-info-tab">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('language_store')}}" class="theme-form">
                             @csrf
                                  <div class="form-group">
                                   <label>Default Language</label>

                                     <select class="form-control" id="app_locale" name="app_locale">
                                                                                    <option data-display-type="ltr" selected="" value="en" 
                                                                                    @if(helper_app_locale()=="en")         
                                                    selected
                                                @endif
                                                >English </option>
                                                                                    <option data-display-type="ltr" value="es"
                                            @if(helper_app_locale()=="es")         
                                                    selected
                                                @endif                                        >Spanish </option>
                                                                                    <option data-display-type="ltr" value="fr"
                                            @if(helper_app_locale()=="fr")         
                                                    selected
                                                @endif                                        >French </option>
                                                                                    <option data-display-type="rtl" value="ar"
                                            @if(helper_app_locale()=="ar")         
                                                    selected
                                                @endif                                        >Arabic </option>
                                                                            </select>
                                     
                                         @error('app_locale')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div> 
                             
                             
                                 <div class="form-group">
                                   <label>Display Type</label>

                                    <select class="form-control" id="app_display_type" name="app_display_type">
                                        <option selected="" value="ltr"
                                        @if(helper_app_display_type()=="ltr")         
                                                    selected
                                                @endif
                                        >Left to right</option>
                                        <option value="rtl" 
                                        @if(helper_app_display_type()=="rtl")         
                                                    selected
                                                @endif
                                        >Right to Left</option>
                                    </select>
                                      
                                         @error('app_display_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                             </div> 
                 
                               <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
    
                            </form>
                      </div>
                      
                
                    </div>
                  </div>
                </div>
              </div>
    </div>
    
    <script type="text/javascript">
    function strip_fields_show()
    {
      
        if($('#services_stripe_active').is(":checked"))  
        {
                          
            $(".services_stripe_active_fields").show();
        }

        else
        {
            $(".services_stripe_active_fields").hide();
        }
    }
    
      function paypal_fields_show()
    {
      
        if($('#paypal_active').is(":checked"))  
        {
                          
            $(".paypal_active_fields").show();
        }

        else
        {
            $(".paypal_active_fields").hide();
        }
    }
    
          function flutter_active_fields_show()
    {
      
        if($('#flutter_active').is(":checked"))  
        {
                          
            $(".flutter_active_fields").show();
        }

        else
        {
            $(".flutter_active_fields").hide();
        }
    }
    
        
    function services_instamojo_active_fields_show()
    {
      
        if($('#services_instamojo_active').is(":checked"))  
        {
                          
            $(".services_instamojo_active_fields").show();
        }

        else
        {
            $(".services_instamojo_active_fields").hide();
        }
    }
    
        function services_razorpay_active_fields_show()
    {
      
        if($('#services_razorpay_active').is(":checked"))  
        {
                          
            $(".services_razorpay_active_fields").show();
        }

        else
        {
            $(".services_razorpay_active_fields").hide();
        }
    }
            function services_cashfree_active_fields_show()
    {
      
        if($('#services_cashfree_active').is(":checked"))  
        {
                          
            $(".services_cashfree_active_fields").show();
        }

        else
        {
            $(".services_cashfree_active_fields").hide();
        }
    }
    
    function services_payu_active_fields_show()
    {
      
        if($('#services_payu_active').is(":checked"))  
        {
                          
            $(".services_payu_active_fields").show();
        }

        else
        {
            $(".services_payu_active_fields").hide();
        }
    }
    
    
        function remove_logo(key_name){
         // var token = $("meta[name='csrf-token']").attr("content");

          $.ajax(
          {
               url: '{{ route("remove_logo") }}',
              type: 'POST',
               dataType: 'json',
               data: {
                   'key': key_name,
                 // "_token": token,
               },
              success: function (response){
                     console.log(response)
                    $('#logo_'+response).hide();
              },
                error: function (xhr, b, c) {
                      console.log("xhr=" + xhr + " b=" + b + " c=" + c);
                  }
          });
          // fetchRecords();
         
      }
</script>
@endsection
