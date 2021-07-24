@extends("layouts.app")

@section("content")

<div class="row">

            @if(session()->has('success'))
            <script type="text/javascript">
                $(function () {
                    $.notify("{{session()->get('success')}}", {globalPosition: 'top right', className: 'success'});
                });
            </script>
        @endif
        @if(session()->has('error'))
            <script type="text/javascript">
                $(function () {
                    $.notify("{{session()->get('error')}}", {globalPosition: 'top right', className: 'error'});
                });
            </script>
        @endif

          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6">
                  <h3>User Profile</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid mt-lg-5">
            <div class="user-profile">
              <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                  <div class="card hovercard text-center">
                    <div class="user-image">
                      <div class="avatar">
                        @if(!empty($user->file))
                          <img alt="" src="{{ asset('public/user/'.$user->file)}}">
                        @else
                            <img alt="" src="{{ asset('public/assets/images/user/7.jpg')}}">
                        @endif
                          
                        </div>
                      {{-- <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div> --}}
                    </div>
                    <div class="info">
                      <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-left">
                                <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{ $user->email }}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-left">
                                <h6><i class="fa fa-calendar"></i>   BOD</h6><span>{{ $user->User_meta('date_of_birth') }}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                          <div class="user-designation">
                            <div class="title"><a target="_blank" href="">{{ $user->name }}</a></div>
                            <div class="desc mt-2">{{ $user->role }}</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-left">
                                <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>{{ $user->User_meta('country') }} <br>{{ $user->User_meta('phone_number') }}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-left">
                                <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>{{ $user->User_meta('address') }}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="social-media">
                        <ul class="list-inline">
                          <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                      </div>

                    </div>
                  </div>
                </div>
           
                <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h5>User Profile Details</span>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-8">
                            <form action="{{ route('instructor-coureses.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
            
                               <div class="form-group m-form__group">
                                <label>Name</label>
                                <div class="input-group">
                                  <input class="form-control @error('city') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name"   type="text" >
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              {{-- <div class="form-group m-form__group">
                                <label>Email</label>
                                <div class="input-group">
                                  <input class="form-control @error('city') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="city"   type="email" >
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div> --}}
                              {{-- <div class="form-group m-form__group">
                                <label>Company Name</label>
                                <div class="input-group">
                                  <input id="name"  class="form-control @error('name') is-invalid @enderror" name="namee" value="{{ $company->name }}" required autocomplete="name"  type="text" placeholder="Company Name">
                                  @error('namee')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div> --}}
                              <div class="form-group m-form__group">
                                <label>City</label>
                                <div class="input-group"> 
                                  <input id="city"  class="form-control @error('city') is-invalid @enderror" name="city" value="{{old('city') ?? $user->User_meta('city') ?? ''}}" required autocomplete="city"   type="text">
                                  @error('city')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              <div class="form-group m-form__group">
                                <label>Address</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="address" placeholder="Address">{{old('address') ?? $user->User_meta('address') ?? ''}}</textarea>
                                  @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
            
            
                                <div class="form-group m-form__group">
                                    <label>Date of Birth</label>
                                    <div class="input-group">
                                        <input id="date_of_birth" data-date-format='yyyy-mm-dd' data-multiple-dates='false' placeholder="2021-08-05"  data-language="en"  class="datepicker-here digits form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{old('date_of_birth') ?? $user->User_meta('date_of_birth') ?? ''}}"  required type="text" >
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                    </div>
                                  </div>
            
                           
                             


                              <div class="form-group m-form__group">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{old('phone_number') ?? $user->User_meta('phone_number') ?? ''}}" required autocomplete="phone_number"   type="text" placeholder="Phone Number">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                              </div>
                              <div class="form-group m-form__group">
                                <label>Whatsapp Number</label>
                                <div class="input-group">
                                  <input id="whatsapp_number"  class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" value="{{old('whatsapp_number') ?? $user->User_meta('whatsapp_number') ?? ''}}" required autocomplete="whatsapp_number"   type="text" placeholder="Whatsapp Number">
                                  @error('whatsapp_number')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>   
                              <div class="form-group m-form__group">
                                <label>Country</label>
                                <div class="input-group">
                                  <select class="js-example-basic-single col-sm-12" name="country">
                                    <optgroup label="Country">
                                        <option value="Pakistan"  
                                        @if(!empty($user->User_meta('country')))
                                            @if($user->User_meta('country')=='Pakistan')
                                                selected
                                            @endif
                                        @endif
                                        >Pakistan</option>
                                        <option value="Australia"
                                        @if(!empty($user->User_meta('country')))
                                            @if($user->User_meta('country')=='Australia')
                                                selected
                                            @endif
                                        @endif
                                        >Australia</option> 
                                        <option value="United States of America"
                                        @if(!empty($user->User_meta('country')))
                                            @if($user->User_meta('country')=='United States of America')
                                                selected
                                            @endif
                                        @endif                             
                                        >United States of America</option>
                                        <option value="Saudi Arabia"
                                        @if(!empty($user->User_meta('country')))
                                            @if($user->User_meta('country')=='Saudi Arabia')
                                                selected
                                            @endif
                                        @endif                             
                                        >Saudi Arabia</option>
                                    </optgroup>
                                   
                                    
                                  </select>
                                  @error('country')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                            </div>         

                              <div class="form-group m-form__group">
                                <label>Profile Image (.PNG,.JPG,)</label>
                                <div class="input-group">
                                    <input class="form-control @error('file') is-invalid @enderror" type="file"  name="file" accept="image/jpeg, image/png" value="{{ old('file') }}" 
                                    @if(empty($user->file))
                                         required
                                    @endif >
                                    @if(!empty($user->file))
                                       <small class="text-primary"><img alt="" src="{{ asset('public/user/'.$user->file)}}" style="height: 75px; margin-top: -35px;"></small>
                                    @endif
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </div>
            
                </form>
                  <!-- user profile first-style end-->
                  <!-- user profile second-style start-->
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h5>Change Passowrd</span>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-8">
                            <form action="{{ route('instructor_update_password') }}" method="post">
                                @csrf

            
                              <div class="form-group m-form__group">
                                <label>Passowrd</label>
                                <div class="input-group">
                                  <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              <div class="form-group m-form__group">
                                <label>Confirm Password</label>
                                <div class="input-group">
                                  <input id="password-confirm" type="password" placeholder="*********"  class="form-control" name="password_confirmation" required autocomplete="new-password">
            
                                </div>
                              </div>
            
                          </div>
                        </div>
                      </div>
            
                      <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                </form>
                  </div>





              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
  </div>
  <script type="text/javascript">

   
</script>
@endsection
