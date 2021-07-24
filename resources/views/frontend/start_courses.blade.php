@extends("layouts.front_app")

@section("content")
<style>
.wizard-4 ul.anchor li a.done:after {
    content: '\2713';
    display: inline-block;
    color: white;
    padding: 1px 6px 1px 7px;
    border: 1px solid white;
    border-radius: 50%;
    float: right;
}
</style>
<div class="row custom-scrollbar" style="margin-top: 72px;">

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
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Course Outline</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('complete_course',$id) }}" method="post" id="myForm" enctype="multipart/form-data">
                @csrf
          <!-- Smart Wizard start-->
          <div class="wizard-4 " id="wizard">
              
                <ul class="">
                    <?php $count=0;
                        $ass=0;
                        $quie=0; 
                    ?>
                    @foreach ($unit as $units)
                        <?php $count=$count+1 ?>
                        <li><a href="#step-{{ $count  }}">Unit {{ $count }} {{ $units->name }}</a></li> 
                    @endforeach
                    @foreach ($assignment as $assignmentt)
                        <?php $count=$count+1;
                            $ass=$ass+1; 
                        ?>
                        <li><a href="#step-{{ $count  }}">Assignment {{ $ass }} {{ $assignmentt->title }}</a></li> 
                    @endforeach
                    @foreach ($quiz as $quizs)
                    <?php $count=$count+1;
                        $quie=$quie+1; 
                    ?>
                    <li><a href="#step-{{ $count  }}">Quiz {{ $quie }} {{ $quizs->title }}</a></li> 
                @endforeach
                </ul>
              <?php $countt=0 ?>
              @foreach ($unit as $unitt)
              <?php $countt=$countt+1 ?>
                <div id="step-{{ $countt  }}" style="height:430px">
                    <h2>{{ $unitt->name }}</h2>
                    <div class="col-sm-12 pl-0">
                        <p class="mb-0 m-t-20">{{ $unitt->unit_description }}</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus corrupti est eum minus alias quia veniam, quaerat quas fuga sint modi amet aspernatur quisquam atque, nobis soluta mollitia accusantium accusamus?</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus corrupti est eum minus alias quia veniam, quaerat quas fuga sint modi amet aspernatur quisquam atque, nobis soluta mollitia accusantium accusamus?</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus corrupti est eum minus alias quia veniam, quaerat quas fuga sint modi amet aspernatur quisquam atque, nobis soluta mollitia accusantium accusamus?</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus corrupti est eum minus alias quia veniam, quaerat quas fuga sint modi amet aspernatur quisquam atque, nobis soluta mollitia accusantium accusamus?</p>

                    </div>
                </div>
      
            @endforeach
            @foreach ($assignment as $assignmentss)
            <?php $countt=$countt+1 ?>
              <div id="step-{{ $countt  }}" style="height:430px">
                  <h2>{{ $assignmentss->title }}</h2>
                  <div class="col-sm-12 pl-0">
                      <p class="mb-0 m-t-20">{{ $assignmentss->assignment_detail }}</p>
                    <a class="btn btn-primary" href="{{ route('download',$assignmentss->assignment_file) }}"> Download Assignment </a>

                    <div class="form-group m-t-20">
                        <label for=""> Upload Assignment</label>
                        <input  class="form-control @error('assi_{{ $assignmentss->id }}') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="assi_{{ $assignmentss->id }}" accept=" .doc, .docx, application/pdf," value="{{ old('assignment_file') }}" required autofocus>
                        @error('assi_{{ $assignmentss->id }}')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>
              </div>
    
          @endforeach
          @foreach ($quiz as $quiz)
          <?php $countt=$countt+1 ?>
            <div id="step-{{ $countt  }}" style="height:430px">
                <h2>{{ $quiz->title }}</h2>
                <div class="col-sm-12 pl-0">
                    <p class="mb-0 m-t-20">{{ $quiz->quiz_note }}</p>
                <a class="btn btn-primary" href="{{ route('quiz_download',$quiz->file) }}"> Download Quiz </a>
                <div class="form-group m-t-20">
                    <label for="" > Upload Quiz</label>
                    <input  class="form-control @error('quiz_{{ $quiz->id }}') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="quiz_{{ $quiz->id }}" accept=" .doc, .docx, application/pdf," value="{{ old('assignment_file') }}" required>
                    @error('quiz_{{ $quiz->id }}')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                </div>
            </div>
  
        @endforeach
          </div>
          <!-- Smart Wizard Ends-->
        </form>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">

</script>
@endsection
