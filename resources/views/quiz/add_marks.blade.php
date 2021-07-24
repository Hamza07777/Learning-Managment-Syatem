@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>Add Quiz Marks</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
          
                <form method="POST" enctype="multipart/form-data" action="{{ route('add_quiz_mark_submit',$user_course_quiz_marks->id)}}" class="theme-form">
                    @csrf

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Quiz Marks</label>

                            <div class="row">
                                <div class="col-md-2" style="padding-right: 0px;">
                                     
                                    <input id="marks" type="number" placeholder="For e.g 20" class="form-control @error('marks') is-invalid @enderror" name="marks" value="{{old('marks') }}" required autocomplete="marks" autofocus >
                                    @error('marks')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2" style="padding-left: 4px;">
                                    <h3>/{{$quiz->total_marks}}</h3>
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
