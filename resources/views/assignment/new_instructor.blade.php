@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($assignment)?'Edit':'Add New'}} Assignment</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" enctype="multipart/form-data" action="{{isset($assignment)?route('instructor-assignment.update',$assignment->id):route('instructor-assignment.store')}}" class="theme-form">
                    @csrf
                    @if(isset($assignment))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Assignment title</label>

                            <input id="title" type="text" placeholder="Assignment title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $assignment->title ?? ''}}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Assignment Total Marks</label>

                            <input id="assignment_total_marks" type="text" placeholder="Assignment Total Marks ( 95 For e.g)" class="form-control @error('assignment_total_marks') is-invalid @enderror" name="assignment_total_marks" value="{{old('assignment_total_marks') ?? $assignment->assignment_total_marks ?? ''}}" required autocomplete="assignment_total_marks" >

                            @error('assignment_total_marks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Assignment Allow Days</label>

                            <input id="assignment_days" type="text" placeholder="Assignment Allow Days( 10 For e.g)" class="form-control @error('assignment_days') is-invalid @enderror" name="assignment_days" value="{{old('assignment_days') ?? $assignment->assignment_days ?? ''}}" required autocomplete="assignment_days" >

                            @error('assignment_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label>Assignment Note</label>

                            <input id="assignment_note" type="text" placeholder="Assignment Note ( Lorem ipsum dolor sit amet, consectetur adipiscing elit.)" class="form-control @error('assignment_note') is-invalid @enderror" name="assignment_note" value="{{old('assignment_note') ?? $assignment->assignment_note ?? ''}}" required autocomplete="assignment_note" >

                            @error('assignment_note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Assignment Detail</label>

                            <input id="assignment_detail" type="text" placeholder="Assignment Detail ( Lorem ipsum dolor sit amet, consectetur adipiscing elit.)" class="form-control @error('assignment_detail') is-invalid @enderror" name="assignment_detail" value="{{old('assignment_detail') ?? $assignment->assignment_detail ?? ''}}" required autocomplete="assignment_detail" >

                            @error('assignment_detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(!isset($assignment))
                            <div class="form-group">
                                <label>Select Course</label>

                                <select class="js-example-basic-single col-lg-12" name="course_id">
                                        <optgroup label="Course Name">
                                        @foreach($course as $course)
                                            <option value="{{ $course->id }}"
                
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
                        @endif
                      

                        <div class="form-group">
                            <label for=""> Upload File</label>
                            <input  class="form-control @error('assignment_file') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="assignment_file" accept=" .doc, .docx, application/pdf," value="{{ old('assignment_file') }}"  @if(!isset($assignment))
                            required
                        @endif >
                        @if(isset($assignment))
                        <small class="text-primary">{{ $assignment->assignment_file }}</small>
                        @endif
                            @error('assignment_file')
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

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type=""><a href="{{url()->previous()}}">Cancel</a></button>
          </div>
        </div>
      </div>
    </form>
 
    </div>
@endsection
