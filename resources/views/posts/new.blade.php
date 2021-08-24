@extends("layouts.app")

@section("content")

    <div class="row">

      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($post)?'Edit':'Add New'}} Post</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" enctype="multipart/form-data" action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" class="theme-form">
                    @csrf
                    @if(isset($post))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Post Title</label>

                            <input id="title" type="text" placeholder="Post Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $post->title ?? ''}}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Permalink</label>

                            <input id="slug" type="text" placeholder="Post Permalink" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug') ?? $post->slug ?? ''}}" required autocomplete="slug" autofocus>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Content</label>

                        <textarea class="ckeditor form-control @error('description') is-invalid @enderror" id="description" type="text" placeholder="Page Content"  name="description"  required autocomplete="description"> {{old('description') ?? $post->description ?? ''}} </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label>Category Name</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="category_id">
                                <optgroup label="Category Name">

                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}"  
                                                @if(isset($post))
                                                    @if($post->category_id == $category->id)
                                                        selected
                                                    @endif
                                                @endif
                                            
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </optgroup>


                              </select>
                              @error('category_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                            </div>

                            <div class="form-group">
                                <label for=""> Upload Image</label>
                                <input  class="form-control @error('file') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="file" accept=" image/* " value="{{ old('file') }}"   >
                            @if(isset($post))
                            <small class="text-primary">{{ $post->file }}</small>
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
