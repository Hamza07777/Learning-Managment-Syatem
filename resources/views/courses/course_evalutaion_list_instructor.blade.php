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
    @if (count($course)>0)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
          <h5>All Courses For Evaluation</h5>
          </div>
          <div class="float-right">
            {{-- <a name="" id="" class="btn btn-primary" href="{{  route('course.create')  }}" role="button">Add Course</a> --}}
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">

            <table class="display" id="advance-1" >

              <thead>
                <tr>

                  <th>Course Name</th>
                  <th>Course Passing Percentage</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($course as $course)
                <tr>

                  <td>{{ $course->name }}</td>
                  <td>{{ $course->passing_percentage }}</td>
                  <td >
                    <label class="switch">
                      <input type="checkbox" onclick="checkFluency({{ $course->id }})"  id="{{ $course->id  }}"

                        @if($course->status=="active")
                            checked

                         @endif

                      >
                      <span class="slider round"></span>

                    </label>

                    </td>
                  <td>
                    <a href="{{route('instructor-coureses.edit',$course->order_id)}}">
                        <i class="fa fa-edit text-primary mr-2">Evaluate</i>
                    </a>

                </td>

                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>

                    <th>Course Name</th>
                    <th>Course Passing Percentage</th>
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
                        <h2 class="font-info">Courses for Evaluation are Not Found</h2>
                        </div>
                        <div class="col-md-8 offset-md-2">
                        <p class="sub-content">Courses for Evaluation are not yet added for further Proceding</p>
                        </div>
                    <div>
                        {{-- <a name="" id="" class="btn btn-primary" href="{{ route('course.create') }}" role="button">Add Course</a> --}}

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
