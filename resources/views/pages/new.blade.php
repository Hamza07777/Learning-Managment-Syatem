@extends("layouts.app")

@section("content")

    <div class="row">

      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($page)?'Edit':'Add New'}} Page</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" enctype="multipart/form-data" action="{{isset($page)?route('page.update',$page->id):route('page.store')}}" class="theme-form">
                    @csrf
                    @if(isset($page))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Page Name</label>

                            <input id="title" type="text" placeholder="Page Name" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $page->title ?? ''}}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Page Permalink</label>

                            <input id="slug" type="text" placeholder="Page Permalink" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug') ?? $page->slug ?? ''}}" required autocomplete="slug" autofocus>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Page Content</label>

                        <textarea class="ckeditor form-control @error('content') is-invalid @enderror" id="content" type="text" placeholder="Page Content"  name="content"  required autocomplete="content"> {{old('content') ?? $page->content ?? ''}} </textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label>Show On Main menu</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="show_on_main_menu">
                                <optgroup label="Show On Main Menu">

                                    <option value="Yes"
                                            @if(isset($page))
                                                @if($page->show_on_main_menu=='Yes')
                                                    selected
                                                @endif
                                            @endif
                                            > Yes
                                        </option>


                                    <option value="No"
                                            @if(isset($page))
                                                @if($page->show_on_main_menu=='No')
                                                    selected
                                                @endif
                                            @endif
                                            > No
                                        </option>
                                </optgroup>


                              </select>
                              @error('show_on_front_page')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Show On Footer menu</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="show_on_footer_menu">
                                <optgroup label="Show On Footer menu">

                                    <option value="Yes"
                                            @if(isset($page))
                                                @if($page->show_on_footer_menu=='Yes')
                                                    selected
                                                @endif
                                            @endif
                                            > Yes
                                        </option>


                                    <option value="No"
                                            @if(isset($page))
                                                @if($page->show_on_footer_menu=='No')
                                                    selected
                                                @endif
                                            @endif
                                            > No
                                        </option>
                                </optgroup>


                              </select>
                              @error('show_on_front_page')
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
  $('#title').change(function(e) {

        $.ajax(
          {
              url: '{{ route("page.check_slug") }}',
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
