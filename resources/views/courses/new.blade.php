@extends("layouts.app")

@section("content")

    <div class="row">
      
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($course)?'Edit':'Add New'}} Course</h5>
          </div>
 
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" enctype="multipart/form-data" action="{{isset($course)?route('course.update',$course->id):route('course.store')}}" class="theme-form">
                    @csrf
                    @if(isset($course))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Course Name</label>

                            <input id="name" type="text" placeholder="Course Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $course->name ?? ''}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Course Permalink</label>

                            <input id="slug" type="text" placeholder="Course Permalink" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug') ?? $course->slug ?? ''}}" required autocomplete="slug" autofocus>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Course Description</label>

                            <!--<input id="description" type="text" placeholder="Course Description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description') ?? $course->description ?? ''}}" required autocomplete="description" autofocus>-->

                    
                        <textarea class="ckeditor form-control @error('description') is-invalid @enderror" id="description" type="text" placeholder="Course Description"  name="description"  required autocomplete="description"> {{old('description') ?? $course->description ?? ''}} </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Course Duration</label>

                            <input id="course_duration" type="text" placeholder="Course Duration" class="form-control @error('course_duration') is-invalid @enderror" name="course_duration" value="{{old('course_duration') ?? $course->course_duration ?? ''}}" required autocomplete="course_duration" >

                            @error('course_duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Course Total Marks</label>

                            <input id="total_marks" type="text" placeholder="Course Total Marks( 100 For e.g)" class="form-control @error('total_marks') is-invalid @enderror" name="total_marks" value="{{old('total_marks') ?? $course->total_marks ?? ''}}" required autocomplete="total_marks" >

                            @error('total_marks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <label>Number Of Student Allow</label>

                            <input id="no_of_student_allow" type="text" placeholder="Number Of Student Allow( 10 For e.g)" class="form-control @error('no_of_student_allow') is-invalid @enderror" name="no_of_student_allow" value="{{old('no_of_student_allow') ?? $course->no_of_student_allow ?? ''}}" required autocomplete="no_of_student_allow" >

                            @error('no_of_student_allow')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <label>Course Start Date</label>
                            <div class="input-group">
                              <input id="course_start_date" data-date-format='yyyy-mm-dd' data-multiple-dates='false' placeholder="2021-08-05"  data-language="en"  class="datepicker-here digits form-control @error('course_start_date') is-invalid @enderror" name="course_start_date" value="{{old('course_start_date') ?? $course->course_start_date ?? ''}}"  required type="text" >
                              @error('course_start_date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror    
                            </div>
                          </div>
                        <div class="form-group">
                            <label>Course Passing Percentage</label>

                            <input id="passing_percentage" type="text" placeholder="Course Passing Percentage ( 70 For e.g)" class="form-control @error('passing_percentage') is-invalid @enderror" name="passing_percentage" value="{{old('passing_percentage') ?? $course->passing_percentage ?? ''}}" required autocomplete="passing_percentage" >

                            @error('passing_percentage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Course Retakes</label>

                            <input id="course_retakes" type="text" placeholder="Course Retakes ( 5 For e.g)" class="form-control @error('course_retakes') is-invalid @enderror" name="course_retakes" value="{{old('course_retakes') ?? $course->course_retakes ?? ''}}" required autocomplete="course_retakes" >

                            @error('course_retakes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Course Regular Price($)</label>

                            <input id="price" type="text" placeholder="Course Regular Price ( 100 For e.g)" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price') ?? $course->price ?? ''}}" required autocomplete="price" >

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                           <div class="form-group">
                            <label>Course Sale Price($)</label>

                            <input id="sale_price" type="text" placeholder="Course Sale Price ( 100 For e.g)" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price" value="{{old('sale_price') ?? $course->sale_price ?? ''}}" required autocomplete="sale_price" >

                            @error('sale_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label>Course Type</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="course_type">
                                <optgroup label="Course Type">
                                   
                                            <option value="Published"
                                            @if(isset($course))
                                                @if($course->course_type=='Published')
                                                    selected
                                                @endif
                                            @endif
                                            > Published
                                            </option>
                                            
                                            
                                             <option value="Featured"
                                            @if(isset($course))
                                                @if($course->course_type=='Featured')
                                                    selected
                                                @endif
                                            @endif
                                            > Featured
                                            </option>
                                              
                                            
                                             <option value="Trending"
                                            @if(isset($course))
                                                @if($course->course_type=='Trending')
                                                    selected
                                                @endif
                                            @endif
                                            > Trending
                                            </option>
                                              
                                            
                                             <option value="Popular"
                                            @if(isset($course))
                                                @if($course->course_type=='Popular')
                                                    selected
                                                @endif
                                            @endif
                                            >Popular
                                            </option>
                                              
                                            
                                             <option value="Free"
                                            @if(isset($course))
                                                @if($course->course_type=='Free')
                                                    selected
                                                @endif
                                            @endif
                                            > Free
                                            </option>
                                            
                                    
                                </optgroup>


                              </select>
                              @error('course_type')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                            </div>
                        </div>
                     
                        
                        
                      
                          <div class="form-group">
                            <label>Meta Title</label>

                            <input id="meta_title" type="text" placeholder="Course Meta Title " class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{old('meta_title') ?? $course->meta_title ?? ''}}" required autocomplete="meta_title" >

                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                             <div class="form-group">
                            <label>Meta Keywords(Keyords are comma sperated)</label>

                            <input id="meta_keyword" type="text" placeholder="Course Meta Keyword " class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" value="{{old('meta_keyword') ?? $course->meta_keyword ?? ''}}" required autocomplete="meta_keyword" >

                            @error('meta_keyword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        
                        
                        
                        
                             <div class="form-group">
                            <label>Meta Description</label>

                                <textarea class="ckeditor form-control @error('meta_description') is-invalid @enderror" id="meta_description" type="text" placeholder="Course Meta Description"  name="meta_description"  required autocomplete="meta_description"> {{old('meta_description') ?? $course->meta_description ?? ''}} </textarea>
                                

                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
   
                    <div class="form-group m-t-15 m-checkbox-inline mb-0">
                       <label>Category Name</label>
                       <br>

                      @foreach($category as $category)
                          <div class="checkbox checkbox-primary">
                            <input id="inline-{{$category->id}}" type="checkbox" value="{{$category->id}}" name="category_id[]" 
                            
                                @if(isset($course))
                                    @foreach($course_category as $course_categorys)
                                        @if($course_categorys->category_id == $category->id)
                                            checked
                                          @endif
                                    @endforeach       
                                @endif

                            >
                            <label for="inline-{{$category->id}}">{{ $category->name }}</label>
                          </div>
                      @endforeach    
                        </div>
                        
                        
                        
                        
                        
                      <div class="form-group m-t-15 m-checkbox-inline mb-0">
                       <label>Tag Name</label>
                       <br>

                      @foreach($tag as $tag)
                          <div class="checkbox checkbox-primary">
                            <input id="inline-{{$tag->id}}" type="checkbox" value="{{$tag->id}}" name="tag_id[]" 
                            
                                @if(isset($course))
                                    @foreach($course_tag as $course_tags)
                                        @if($course_tags->tag_id == $tag->id)
                                            checked
                                          @endif
                                    @endforeach       
                                @endif

                            >
                            <label for="inline-{{$tag->id}}">{{ $tag->name }}</label>
                          </div>
                      @endforeach    
                        </div>
                        
                        
                    <div class="form-group m-t-15 m-checkbox-inline mb-0">
                       <label>Location Name</label>
                       <br>

                      @foreach($location as $location)
                          <div class="checkbox checkbox-primary">
                            <input id="inline-{{$location->id}}" type="checkbox" value="{{$location->id}}" name="location_id[]" 
                            
                                @if(isset($course))
                                    @foreach($course_location as $course_locations)
                                        @if($course_locations->location_id == $location->id)
                                            checked
                                          @endif
                                    @endforeach       
                                @endif

                            >
                            <label for="inline-{{$location->id}}">{{ $location->location }}</label>
                          </div>
                      @endforeach    
                        </div>
                            
                        
                        
                  <div class="form-group m-t-15 m-checkbox-inline mb-0">
                       <label>Assignment Name</label>
                       <br>

                      @foreach($assignment as $assignment)
                          <div class="checkbox checkbox-primary">
                            <input id="inline-{{$assignment->id}}" type="checkbox" value="{{$assignment->id}}" name="assignment_id[]" 
                            
                                @if(isset($course))
                                    @foreach($course_assignment as $course_assignments)
                                        @if($course_assignments->assignment_id == $assignment->id)
                                            checked
                                          @endif
                                    @endforeach       
                                @endif

                            >
                            <label for="inline-{{$assignment->id}}">{{ $assignment->title }}</label>
                          </div>
                      @endforeach    
                        </div>    
                    
                    
                    <div class="form-group m-t-15 m-checkbox-inline mb-0">
                       <label>Quiz Name</label>
                       <br>

                      @foreach($quiz as $quiz)
                          <div class="checkbox checkbox-primary">
                            <input id="inline-{{$quiz->id}}" type="checkbox" value="{{$quiz->id}}" name="quiz_id[]" 
                            
                                @if(isset($course))
                                    @foreach($course_quiz as $course_quizs)
                                        @if($course_quizs->quiz_id == $quiz->id)
                                            checked
                                          @endif
                                    @endforeach       
                                @endif

                            >
                            <label for="inline-{{$quiz->id}}">{{ $quiz->title }}</label>
                          </div>
                      @endforeach    
                        </div>      
   

                        
                        
                                                
                        
                        <div class="form-group">
                            <label for=""> Upload Image</label>
                            <input  class="form-control @error('file') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="file" accept=" image/* " value="{{ old('file') }}"  @if(!isset($course))
                            required
                        @endif >
                        @if(isset($course))
                        <small class="text-primary">{{ $course->file }}</small>
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
    
    <script>
          $(document).ready(function(){
          
          
          
         
          // Fetch all records
        $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
                 
            
      });
  $('#name').change(function(e) {

                $.ajax(
          {
              url: '{{ route("course.check_slug") }}',
              type: 'POST',
               dataType: 'json',
               data: {
                   'title': $(this).val()
                 // "_token": token,
               },
      success: function (response){
                    
                    $('#slug').val(response);
             
              //   }
          
               // console.log(name);
              },
                error: function (xhr, b, c) {
                      console.log("xhr=" + xhr + " b=" + b + " c=" + c);
                  }

          });
    
    
  });
</script>
@endsection
