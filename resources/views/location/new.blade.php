@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($location)?'Edit':'Add New'}} Location</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" enctype="multipart/form-data" action="{{isset($location)?route('location.update',$location->id):route('location.store')}}" class="theme-form">
                    @csrf
                    @if(isset($location))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Location Name</label>

                            <input id="location" type="text" placeholder="Location Name" class="form-control @error('location') is-invalid @enderror" name="location" value="{{old('location') ?? $location->location ?? ''}}" required autocomplete="location" autofocus>

                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Location Description</label>

                            <input id="description" type="text" placeholder="Location Description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description') ?? $location->description ?? ''}}" required autocomplete="description" >

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label for=""> Upload Image</label>
                          <input  class="form-control @error('file') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="file" accept=" image/* " value="{{ old('file') }}"  @if(!isset($location))
                          required
                      @endif >
                      @if(isset($location))
                      <small class="text-primary">{{ $location->file }}</small>
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
@endsection
