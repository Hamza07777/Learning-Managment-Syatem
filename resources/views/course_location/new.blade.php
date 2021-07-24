@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($course_location)?'Edit':'Add New'}} Location in Course</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" action="{{isset($course_location)?route('course_location.update',$course_location->id):route('course_location.store')}}" class="theme-form">
                    @csrf
                    @if(isset($course_location))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        
                        <div class="form-group m-form__group">
                            <label>Course Name</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="course_id">
                                <optgroup label="Course Name">
                                    @foreach($course as $course)
                                            <option value="{{ $course->id }}"  
                                            @if(isset($course_location))
                                                @if($course_location->course_id== $course->id)
                                                    selected
                                                @endif
                                            @endif
                                            >{{ $course->name }}</option> 
                                    @endforeach               
                                </optgroup>
                               
                                
                              </select>
                              @error('course_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                            </div>
                        </div>



                        <div class="form-group m-form__group">
                            <label>Location Name</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="location_id">
                                <optgroup label="Location Name">
                                    @foreach($location as $location)
                                            <option value="{{ $location->id }}"  
                                            @if(isset($course_location))
                                                @if($course_location->location_id == $location->id)
                                                    selected
                                                @endif
                                            @endif
                                            >{{ $location->location }}</option> 
                                    @endforeach               
                                </optgroup>
                               
                                
                              </select>
                              @error('location_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                            </div>
                        </div>
              
                        </div>

                    </div>
                   

                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
          </div>
        </div>
      </div>
    </form>
 
    </div>
@endsection
