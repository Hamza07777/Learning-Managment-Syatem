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
    @if (count($user_course_assignment_marks)>0)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
          <h5>All User Course  Assignments</h5>
          </div>
          <div class="float-right">
            {{-- <a name="" id="" class="btn btn-primary" href="{{  route('assignment.create')  }}" role="button">Add Course</a> --}}
          </div>

        </div>
        <div class="card-body">
          <form method="POST" action="{{route('all_user_course_assignment_filter')}}" class="theme-form">
            @csrf

        <div class="form-row">

            <div class="col-md-4 mb-3">
              <label>Course Name</label>
                    <div class="input-group">
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

            </div>
            <div class="col-md-4 mb-3">

              <label>Student Name</label>
                    <div class="input-group">
                      <select class="js-example-basic-single col-lg-12" name="user_id">
                        <optgroup label="Student Name">


                          @foreach($user as $user)
                            <option value="{{ $user->id }}"

                            >{{ $user->name }}</option>
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

                <button class="btn btn-primary" type="submit" style="margin-top: 3%;height: 33px;margin-left: 4%;">Submit</button>


            </div>


        </div>

      </form>
          <div class="table-responsive">


            <table class="display" id="advance-1" >

              <thead>
                <tr>

                    <th>Assignment Name</th>
                    <th>Assignment Total Marks</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Assignment File</th>
                    <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($user_course_assignment_marks as $user_course_assignment_marks)
                <tr>

                  <td>{{ $user_course_assignment_marks->assignment_name->title }}</td>
                  <td>{{ $user_course_assignment_marks->assignment_name->assignment_total_marks }}</td>
                  <td>{{ $user_course_assignment_marks->User_name->name }}</td>
                  <td>{{ $user_course_assignment_marks->course_nameee->name }}</td>
                  <td> <a class="btn btn-primary" href="{{ route('download',$user_course_assignment_marks->file) }}"> Download Assignment File</a></td>

                  <td>
                    <label class="switch">
                      <input type="checkbox" onclick="checkFluency({{ $user_course_assignment_marks->id }})"  id="{{ $user_course_assignment_marks->id  }}"

                        @if($user_course_assignment_marks->status=="active")
                            checked

                         @endif

                      >
                      <span class="slider round"></span>

                    </label>

                    </td>
                  <td>
                    <a href="{{route('add_assignment_mark_view',$user_course_assignment_marks->id)}}">
                        <i class="fa fa-edit text-primary mr-2"></i>
                    </a>
                    <a href="javascript:void(0)" data-action="{{route('assignmentDestroy',$user_course_assignment_marks->id)}}" class="deleteRecord">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </td>

                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>Assignment Name</th>
                    <th>Assignment Total Marks</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Assignment File</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </tfoot>
            </table>

          </div>
        </div>
      </div>
    </div>

    @else
         <div class="col-sm-12">
            <div class="page-wrapper compact-wrapper" id="pageWrapper">
                <!-- error-400 start-->
                <div class="error-wrapper">
                    <div class="container"><img class="img-100" src="{{ asset('public/assets/images/other-images/sad.png') }}" alt="">
                        <div class="error-heading mb-5">
                        <h2 class="font-info">Assignments are Not Found</h2>
                        </div>
                        <div class="col-md-8 offset-md-2">
                        <p class="sub-content">Assignments are not yet added for further Proceding Add Assignment</p>
                        </div>
                    <div>
                        {{-- <a name="" id="" class="btn btn-primary" href="{{ route('assignment.create') }}" role="button">Add Assignment</a> --}}

                </div>
            </div>
        </div>
        <!-- error-400 end-->
    @endif
  </div>
  <script type="text/javascript">

    $(function(){

        // add multiple select / deselect functionality
        $("#checkAll").click(function (e) {
        //    e.preventDefault();
            $('.chk-ani').attr('checked', this.checked);
            $('#deleteRecordId').css({ "display": "block"});
            if($(".chk-ani:checked").length == 0){
                $('#deleteRecordId').css({ "display": "none"})
            }

        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".chk-ani").click(function(){

            if($(".chk-ani").length == $(".chk-ani:checked").length) {
                $("#checkAll").attr("checked", "checked");

            } else {

                $("#checkAll").removeAttr("checked");

            }

        });
        });
</script>
@endsection
