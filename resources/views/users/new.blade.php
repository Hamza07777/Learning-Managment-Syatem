@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-sm-2">
        </div>  
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($user)?'Edit':'Add New'}} User</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" action="{{isset($user)?route('user.update',$user->id):route('user.store')}}" class="theme-form">
                    @csrf
                    @if(isset($user))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name</label>

                            <input id="name" type="text" placeholder="User Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $user->name ?? ''}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                             </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') ?? $user->email ?? ''}}" required autocomplete="email" placeholder="someone@gmail.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    @if(!isset($user))
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" placeholder="*********"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    @endif
                  

                    <div class="form-group m-form__group">
                        <label>User Role</label>
                        <div class="input-group">
                          <select class="js-example-basic-single col-sm-12" name="role">
                            <optgroup label="User Role">
                                <option value="admin"  
                                @if(isset($user))
                                    @if($user->role=='admin')
                                        selected
                                    @endif
                                @endif
                                >Admin</option>
                                <option value="instructor"
                                @if(isset($user))
                                    @if($user->role=='instructor')
                                        selected
                                    @endif
                                @endif
                                >Instructor</option> 
                                <option value="user"
                                @if(isset($user))
                                    @if($user->role=='user')
                                        selected
                                    @endif
                                @endif                             
                                >User</option>
                            </optgroup>
                           
                            
                          </select>
                          @error('role')
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
                             <small class="text-primary">{{ $user->file }}</small>
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
            <button class="btn btn-light" ><a href="{{url()->previous()}}">Cancel</a></button>
          </div>
        </div>
      </div>
    </form>
    <div class="col-sm-2">
    </div>  
    </div>

        <script type="text/javascript">

         
            $(document).ready(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Fetch all records

              fetchRecords(0);



              });


              function fetchRecords(id){
                $.ajax({
                    url: '/company_deals/get_services/'+id,
                  type: 'get',
                  dataType: 'json',
                  success: function(response){

                    var len = 0;
                    $('#chk_boxes_jquery').empty();
                    if(response['data'] != null){
                       len = response['data'].length;
                    }

                    if(len > 0){
                       for(var i=0; i<len; i++){
                        var id = response['data'][i].id;
                        var name = response['data'][i].name;



                        var tr_str = "<div class='col-md-6 mt-3'>" +
                            "<label class='d-block' for='chk-ani'>" +"<input class='checkbox_animated' name='services[]' id='chk-ani' value="+id+" type='checkbox'>"+ name+ "</label>" +


                          "</div>";




                          $("#chk_boxes_jquery").append(tr_str);
                       }
                    }

                  }
                });
              }


        </script>
@endsection
