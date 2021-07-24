@extends('layouts.login_app')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid p-0">
      <!-- login page start-->
      <div class="authentication-main mt-0">
        <div class="row">
          <div class="col-md-12">
            <div class="auth-innerright auth-bg">
              <div class="authentication-box">
               
                <div class="mt-4">
                  <div class="card-body p-0">
                    <div class="cont text-center">
                      <div>
                        <form method="POST" action="{{ route('login') }}" class="theme-form">
                            @csrf
                            
                          <h4>LOGIN</h4>
                          <h6>Enter your Email and Password</h6>
                          <div class="form-group">
                            <label class="col-form-label pt-0">Your Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="someone@gmail.com" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                          </div>
                          <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*********">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="checkbox p-0">

                            <input class="form-check-input" id="checkbox1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="checkbox1">Remember me</label>
                          </div>
                          <div class="form-group form-row mt-3 mb-0">
                            <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                          </div>
                          <div class="login-divider"></div>
                          <div class="social mt-3">
                            <div class="form-row btn-showcase">
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-fb">Facebook</button>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-twitter">Twitter</button>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-google">Google + </button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="sub-cont">
                        <div class="img">
                          <div class="img__text m--up">
                            <h2>New User?</h2>
                            <p>Sign up and discover great amount of new opportunities!</p>
                          </div>
                          <div class="img__text m--in">
                            <h2>One of us?</h2>
                            <p>If you already has an account, just sign in. We've missed you!</p>
                          </div>
                          <div class="img__btn"><span class="m--up">Sign up</span><span class="m--in">Sign in</span></div>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('register') }}" class="theme-form">
                                @csrf
                            <h4 class="text-center">NEW USER</h4>
                            <h6 class="text-center">Enter your Username,Email and Password For Signup</h6>
                            <div class="form-row">
                              <div class="col-md-12">
                                <div class="form-group">

                                    <input id="name" type="text" placeholder="USERNAME" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                     </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="someone@gmail.com">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="*********"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="*********"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-row form-group ">
                              <div class="col-sm-12">
                                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                              </div>
                              <div class="col-sm-12">
                                <div class="text-center mt-2 m-l-20">Are you already user?  <a class="btn-link text-capitalize" href="login.html">Login</a></div>
                              </div>
                            </div>
                            <div class="form-divider"></div>
                            <div class="social mt-3">
                              <div class="form-row btn-showcase">
                                <div class="col-sm-4">
                                  <button class="btn social-btn btn-fb">Facebook</button>
                                </div>
                                <div class="col-sm-4">
                                  <button class="btn social-btn btn-twitter">Twitter</button>
                                </div>
                                <div class="col-sm-4">
                                  <button class="btn social-btn btn-google">Google +</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- login page end-->
    </div>
  </div>
@endsection
