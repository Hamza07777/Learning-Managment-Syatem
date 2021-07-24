@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($quiz)?'Edit':'Add New'}} Quiz</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" enctype="multipart/form-data" action="{{isset($quiz)?route('instructor-quiz.update',$quiz->id):route('instructor-quiz.store')}}" class="theme-form">
                    @csrf
                    @if(isset($quiz))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Quiz title</label>

                            <input id="title" type="text" placeholder="Quiz title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $quiz->title ?? ''}}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Quiz Total Marks</label>

                            <input id="total_marks" type="text" placeholder="Quiz Total Marks ( 95 For e.g)" class="form-control @error('total_marks') is-invalid @enderror" name="total_marks" value="{{old('total_marks') ?? $quiz->total_marks ?? ''}}" required autocomplete="total_marks" >

                            @error('total_marks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Quiz Allow Days</label>

                            <input id="quiz_allow_days" type="text" placeholder="Quiz Allow Days( 10 For e.g)" class="form-control @error('quiz_allow_days') is-invalid @enderror" name="quiz_allow_days" value="{{old('quiz_allow_days') ?? $quiz->quiz_allow_days ?? ''}}" required autocomplete="quiz_allow_days" >

                            @error('quiz_allow_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label>Quiz Note</label>

                            <input id="quiz_note" type="text" placeholder="Quiz Note ( Lorem ipsum dolor sit amet, consectetur adipiscing elit.)" class="form-control @error('quiz_note') is-invalid @enderror" name="quiz_note" value="{{old('quiz_note') ?? $quiz->quiz_note ?? ''}}" required autocomplete="quiz_note" >

                            @error('quiz_note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Quiz Retakes</label>

                            <input id="quiz_retakes" type="text" placeholder="Quiz Retakes ( 10 For e.g)" class="form-control @error('quiz_retakes') is-invalid @enderror" name="quiz_retakes" value="{{old('quiz_retakes') ?? $quiz->quiz_retakes ?? ''}}" required autocomplete="quiz_retakes" >

                            @error('quiz_retakes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(!isset($quiz))
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
                            <input  class="form-control @error('file') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="file" accept=" .doc, .docx, application/pdf," value="{{ old('file') }}"  @if(!isset($quiz))
                            required
                        @endif >
                        @if(isset($quiz))
                        <small class="text-primary">{{ $quiz->file }}</small>
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
