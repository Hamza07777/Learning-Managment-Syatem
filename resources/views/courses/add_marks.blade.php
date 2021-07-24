@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>Add Course Marks</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
          
                <form method="POST" enctype="multipart/form-data" action="{{ route('course_evaluation.update',$course['0']->order_id)}}" class="theme-form">
                    @csrf
                    @method('patch')
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Course Marks</label>

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
                                    <h3>/{{$course['0']->total_marks}}</h3>
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
