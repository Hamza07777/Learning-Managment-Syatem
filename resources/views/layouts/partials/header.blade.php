<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right">
      <div class="main-header-left">

        <div class="logo-wrapper">

            <a href="index.html">

                
                    @if(!empty(helper_logo_b_image()))  
                        <img src="{{ asset('public/logos/'.helper_logo_b_image()) }}" class="" alt="..." width="294" height="50">
                    @else
                        <img src="{{ asset('public/assets/images/logo/compact-logo.png') }}" alt="">
                    @endif

            </a>
        </div>

      </div>
      <div class="mobile-sidebar">
        <div class="media-body text-right switch-sm">
          <label class="switch">
            <input id="sidebar-toggle" type="checkbox" data-toggle=".container" checked="checked"><span class="switch-state"></span>
          </label>
        </div>
      </div>

      <div class="nav-right col pull-right right-menu">
        <ul class="nav-menus">
            @guest
            @if (Route::has('login'))
            <li>
                <div class="media">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>


                </div>
              </li>

            @endif

            @if (Route::has('register'))
            <li>
                <div class="media">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>


                </div>
              </li>

            @endif
        @else
           <li class="px-0">
            <form class="form-inline search-form">
              <input class="form-control-plaintext" placeholder="Search....."><i class="close-search" data-feather="x"></i>
            </form><span class="mobile-search"><i data-feather="search"></i></span>
          </li>

           <li class="onhover-dropdown"><i data-feather="message-circle"></i>
            <ul class="chat-dropdown onhover-show-div p-t-20 p-b-20">
              <li>
                <div class="media"><img class="img-fluid rounded-circle mr-3" src="{{ asset('public/assets/images/user/2.jpg')  }}" alt="">
                  <div class="status-circle online"></div>
                  <div class="media-body"><span class="f-w-600">Erica Hughes</span>
                    <p class="f-12 mb-0 light-font">There are many variations of passages...</p>
                    <p class="f-12 mb-0 font-primary">1 hr ago</p>
                  </div>
                </div>
              </li>
               <li>
                <div class="media"><img class="img-fluid rounded-circle mr-3" src=" {{ asset('public/assets/images/user/1.jpg')  }} " alt="">
                  <div class="status-circle away"></div>
                  <div class="media-body"><span class="f-w-600">Kori Thomas</span>
                    <p class="f-12 mb-0 light-font">There are many variations of passages...</p>
                    <p class="f-12 mb-0 font-primary">58 mins ago</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media"><img class="img-fluid rounded-circle mr-3" src=" {{ asset('public/assets/images/user/4.jpg')  }}" alt="">
                  <div class="status-circle offline"></div>
                  <div class="media-body"><span class="f-w-600">Ain Chavez</span>
                    <p class="f-12 mb-0 light-font">There are many variations of passages...</p>
                    <p class="f-12 mb-0 font-primary">32 mins ago</p>
                  </div>
                </div>
              </li>
              <li class="light-font text-center">Mark all as read      </li>
            </ul>
          </li>
          <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
           <li class="theme-setting"><i data-feather="layout"></i></li>
            <li class=""><a href="{{ route('setting.create') }}"><i data-feather="settings"></i></a></li>
          <li class="onhover-dropdown px-0"><span class="media user-header">


            @if(!empty(Auth::user()->file))
            <img alt="" class="mr-2 rounded-circle img-35" src="{{ asset('public/user/'.Auth::user()->file)}}" style="height: 37px;">
            @else
            <img class="mr-2 rounded-circle img-35" src="{{ asset('public/assets/images/dashboard/user.png') }}" alt="">

            @endif


            <span class="media-body"><span class="f-12 f-w-600">Elana Saint</span><span class="d-block">Admin</span></span></span>
            <ul class="profile-dropdown onhover-show-div">
            
               
                  
                
                @if (Auth::user())
                <li><i data-feather="user"> </i>
                    <a href="">
                        {{ Auth::user()->name }}
                    </a></li>

                    <li class="f-w-600">Home</li>
                    @if (Auth::user()->role=='user')
                     <li class="f-12"><i data-feather="chevron-right"> </i><a href="{{ route('user_profile') }}">Change Password</a></li>
                     @endif 
                     @if (Auth::user()->role=='admin')
                     <li class="f-12"><i data-feather="chevron-right"> </i><a href="{{ route('admin_profile') }}">Change Password</a></li>
                     @endif 
                             @if (Auth::user()->role=='instructor')
                     <li class="f-12"><i data-feather="chevron-right"> </i><a href="{{ route('instructor_profile') }}">Change Password</a></li>
                     @endif
                     <li class="f-12"><i data-feather="chevron-right"> </i>Inbox</li>
                     <li class="f-12"><i data-feather="chevron-right"> </i>Taskboard</li>
                     <li class="f-12"><i data-feather="chevron-right"> </i>Settings</li>
                     <li class="f-12"><i data-feather="chevron-right"> </i><a href="">Details</a></li>
      
                    <li><i data-feather="chevron-right"> </i>
                      <a class="mr-2" class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>
      
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
                         </li>
                @endif
            
           



            </ul>
          </li>
          @endguest
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>
<!-- Page Header Ends -->
