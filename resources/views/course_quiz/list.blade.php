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
    @if (count($course_quiz)>0)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
          <h5>All Quizzes of Courses</h5>
          </div>
          <div class="float-right">
            <!--<a name="" id="" class="btn btn-primary" href="{{  route('course_quiz.create')  }}" role="button">Add Quiz in Course</a>-->
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            
            <form method="post" action="{{url('multiplecourse_quizdelete')}}">
                {{ csrf_field() }}
                
           
            <table class="display" id="advance-1" >

              <thead>
                <tr>
                  <th><input type="checkbox" id="checkAll" style="margin-top: -17%;"> <span style="padding-left: 13%;">Select All</span> </th>
                  <th>Course Name</th>
                  <th>Quiz Name</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($course_quiz as $course_quiz)
                <tr>
                    <td><input name='id[]' type="checkbox" class="chk-ani" 
                        value="<?php echo $course_quiz->id; ?>"></td>
                  <td>{{ $course_quiz->course_nameee->name }}</td>
                  <td>{{ $course_quiz->quiz_name->title }}</td>
                  <td >
                    <label class="switch">
                      <input type="checkbox" onclick="checkFluency({{ $course_quiz->id }})"  id="{{ $course_quiz->id  }}"

                        @if($course_quiz->status=="active")
                            checked

                         @endif

                      >
                      <span class="slider round"></span>

                    </label>

                    </td>
                  <td>
                    <!--<a href="{{route('course_quiz.edit',$course_quiz->id)}}">-->
                    <!--    <i class="fa fa-edit text-primary mr-2"></i>-->
                    <!--</a>-->
                    <a href="javascript:void(0)" data-action="{{route('course_quizDestroy',$course_quiz->id)}}" class="deleteRecord">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </td>

                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Course Name</th>
                  <th>Quiz Name</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
            <br>
            <br>
            <button style="display: none" class="btn btn-danger"  type="" id="deleteRecordId">Delete All Record</button>
                <br><br>
        </form>
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
                        <h2 class="font-info">Quizzes in Courses are Not Found</h2>
                        </div>
                        <div class="col-md-8 offset-md-2">
                        <p class="sub-content">Quizzes in Courses are not yet added for further Proceding Add Quizzes in Courses</p>
                        </div>
                    <div>
                        <!--<a name="" id="" class="btn btn-primary" href="{{ route('course_quiz.create') }}" role="button">Add Quiz in Course</a>-->

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
