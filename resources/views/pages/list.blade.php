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
    @if (count($page)>0)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
          <h5>All Pages</h5>
          </div>
          <div class="float-right">
            <a name="" id="" class="btn btn-primary" href="{{  route('page.create')  }}" role="button">Add page</a>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">


            <table class="display" id="advance-1" >

              <thead>
                <tr>

                  <th>Page Name</th>
                  <th>Page Duration</th>
                  <th>On Frontend</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($page as $page)
                <tr>
                  <td>{{ $page->title }}</td>
                  <td>{{ $page->slug }}</td>
                  <td>{{ $page->show_on_front_page }}</td>

                  <td >
                    <label class="switch">
                      <input type="checkbox" onclick="checkFluency({{ $page->id }})"  id="{{ $page->id  }}"

                        @if($page->status=="active")
                            checked

                         @endif

                      >
                      <span class="slider round"></span>

                    </label>

                    </td>
                  <td>
                    <a href="{{route('page.edit',$page->id)}}">
                        <i class="fa fa-edit text-primary mr-2"></i>
                    </a>
                    <a href="javascript:void(0)" data-action="{{route('pageDestroy',$page->id)}}" class="deleteRecord">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </td>

                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>Page Name</th>
                    <th>Page Duration</th>
                    <th>On Frontend</th>
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
                        <h2 class="font-info">Pages are Not Found</h2>
                        </div>
                        <div class="col-md-8 offset-md-2">
                        <p class="sub-content">Pages are not yet added for further Proceding Add Page</p>
                        </div>
                    <div>
                        <a name="" id="" class="btn btn-primary" href="{{ route('page.create') }}" role="button">Add Page</a>

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
