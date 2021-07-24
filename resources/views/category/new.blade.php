@extends("layouts.app")

@section("content")

    <div class="row">
       
      <div class="col-sm-12">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>{{isset($category)?'Edit':'Add New'}} Category</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="POST" action="{{isset($category)?route('category.update',$category->id):route('category.store')}}" class="theme-form">
                    @csrf
                    @if(isset($category))
                        @method('patch')
                    @endif
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Category Name</label>

                            <input id="name" type="text" placeholder="Category Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $category->name ?? ''}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Category Description</label>

                            <input id="description" type="text" placeholder="Category Description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description') ?? $category->description ?? ''}}" required autocomplete="description" >

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label>Category Note</label>

                          <input id="note" type="text" placeholder="Category Note" class="form-control @error('note') is-invalid @enderror" name="note" value="{{old('note') ?? $category->note ?? ''}}" required autocomplete="note" >

                          @error('note')
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
