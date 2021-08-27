@extends("layouts.app")

@section("content")

    <div class="row">

      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($tag)?'Edit':'Add New'}} Tag</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" action="{{isset($tag)?route('tag.update',$tag->id):route('tag.store')}}" class="theme-form">
                    @csrf
                    @if(isset($tag))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tag Name</label>

                            <input id="name" type="text" placeholder="Tag Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('location') ?? $tag->name ?? ''}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tag Description</label>

                            <input id="description" type="text" placeholder="Location Description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description') ?? $tag->description ?? ''}}" required autocomplete="description" >

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tag Type</label>
                            <div class="input-group">
                              <select class="js-example-basic-single col-sm-12" name="tag_type">
                                <optgroup label="Tag Type">

                                    <option value="course"
                                            @if(isset($tag))
                                                @if($tag->tag_type=='course')
                                                    selected
                                                @endif
                                            @endif
                                            > Course
                                        </option>


                                    <option value="post"
                                            @if(isset($tag))
                                                @if($tag->tag_type=='post')
                                                    selected
                                                @endif
                                            @endif
                                            > Post
                                        </option>
                                </optgroup>


                              </select>
                              @error('tag_type')
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
@endsection
