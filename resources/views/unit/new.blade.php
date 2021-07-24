@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($unit)?'Edit':'Add New'}} Unit</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" action="{{isset($unit)?route('unit.update',$unit->id):route('unit.store')}}" class="theme-form">
                    @csrf
                    @if(isset($unit))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Unit Name</label>

                            <input id="name" type="text" placeholder="Unit Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $unit->name ?? ''}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Unit Description</label>

                            <input id="unit_description" type="text" placeholder="Unit Description" class="form-control @error('unit_description') is-invalid @enderror" name="unit_description" value="{{old('unit_description') ?? $unit->unit_description ?? ''}}" required autocomplete="unit_description" >

                            @error('unit_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group m-form__group">
                            <label>Unit Type</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="unit_type">
                                <optgroup label="Unit Type">
                                    <option value="Video"  
                                    @if(isset($unit))
                                        @if($unit->unit_type=='Video')
                                            selected
                                        @endif
                                    @endif
                                    >Video</option>
                                    <option value="Audio"
                                    @if(isset($unit))
                                        @if($unit->unit_type=='Audio')
                                            selected
                                        @endif
                                    @endif
                                    >Audio</option> 
                                    <option value="Podcast"
                                    @if(isset($unit))
                                        @if($unit->unit_type=='Podcast')
                                            selected
                                        @endif
                                    @endif                             
                                    >Podcast</option>

                                    <option value="General"
                                    @if(isset($unit))
                                        @if($unit->unit_type=='General')
                                            selected
                                        @endif
                                    @endif                             
                                    >General</option>
                                </optgroup>
                               
                                
                              </select>
                              @error('unit_type')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                            </div>
                        </div>

                        <div class="form-group m-form__group">
                            <label>Unit Start Time</label>
                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                <input id="access_time"  class="form-control @error('access_time') is-invalid @enderror" name="access_time"  required  autofocus type="text" value="{{old('access_time') ?? $unit->access_time ?? ''}}"  placeholder="9:00"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                @error('access_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror  
                            </div>
                          </div>

                        <div class="form-group">
                            <label>Unit Duration</label>

                            <input id="duration" type="text" placeholder="Unit Duration( 10 For e.g)" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{old('duration') ?? $unit->duration ?? ''}}" required autocomplete="duration" >

                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <label>Unit Start Date</label>
                            <div class="input-group">
                              <input id="access_date" data-date-format='yyyy-mm-dd' data-multiple-dates='false' placeholder="2021-08-05"  data-language="en"  class="datepicker-here digits form-control @error('access_date') is-invalid @enderror" name="access_date" value="{{old('access_date') ?? $unit->access_date ?? ''}}"  required type="text" >
                              @error('access_date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror    
                            </div>
                          </div>
                       
                        <div class="form-group m-form__group">
                            <label>Course Name</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="course_id">
                                <optgroup label="Course Name">
                                    @foreach($course as $course)
                                            <option value="{{ $course->id }}"  
                                            @if(isset($unit))
                                                @if($unit->course_id== $course->id)
                                                    selected
                                                @endif
                                            @endif
                                            >{{ $course->name }}</option> 
                                    @endforeach               
                                </optgroup>
                               
                                
                              </select>
                              @error('role')
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

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
          </div>
        </div>
      </div>
    </form>
 
    </div>
@endsection
