@extends("layouts.app")

@section("content")

    <div class="row">
        <div class="col-sm-2">
        </div>  
      <div class="col-sm-8">
        <div class="card" style="padding: 20px;">
          <div class="card-header">
            <h5>Add Deals</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('company_deals.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group m-form__group">
                        <label>Name</label>
                        <div class="input-group">
                          <input id="title"  class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus type="text" placeholder=" Name">
                          @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Description</label>
                        <div class="input-group">
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="description" placeholder="Description"></textarea>
                          @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror  
                        </div>
                      </div>

                      <div class="form-group m-form__group">
                        <label>Deal Price</label>
                        <div class="input-group">
                          <input type="text" placeholder="Deal Price"  id="price"  class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                          @error('price')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror    
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Start Date</label>
                        <div class="input-group">
                          <input id="start_date" data-date-format='yyyy-mm-dd' data-multiple-dates='false'  data-language="en"  class="datepicker-here digits form-control @error('start_date') is-invalid @enderror" name="start_date" value="2020-12-08"  required  autofocus type="text" >
                          @error('start_date')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror    
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>End Date</label>
                        <div class="input-group">
                          <input id="end_date" data-multiple-dates='false' data-date-format='yyyy-mm-dd' data-language="en"  class="datepicker-here digits form-control @error('end_date') is-invalid @enderror" name="end_date" value="2020-12-09"  required autofocus type="text" >
                          @error('end_date')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror  
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h5>Add Services in Deal</h5>
                          </div>
                          <div class="card-body animate-chk">
                            <div class="row">
                              <div class="col-md-3 bg-light" style="padding-left:0px;padding-right:0px;">
                                <div class="vertical-scroll scroll-demo " style="padding-left:0px;padding-right:0px;height: 171px;">

                                  <ul >
                                    <li class="list-group-item " style="background: none;border:none; width:100%; border-bottom:1px solid black;"><button   style="background: none;border:none;width: 100%" onclick="fetchRecords(0)">See All</button></li>

                                    <?php
                                    $x = 1;
                                    $length = count($category);
                                    ?>
                                @foreach( $category as  $index => $category )

                                @if ($x === $length)
                                <li class="list-group-item " style="background: none;border:none; width:100%;"><button   style="background: none;border:none;width: 100%" onclick="fetchRecords('{{ $category->id}}')">{{ $category->name	 }}</button></li>

                                @else
                                <li class="list-group-item " style="background: none;border:none; width:100%; border-bottom:1px solid black;"><button   style="background: none;border:none;width: 100%" onclick="fetchRecords('{{ $category->id}}')">{{ $category->name	 }}</button></li>
                                
                                @endif
                                <?php  $x++; ?>
                                @endforeach
                                  </ul>

                            </div>
                          </div>
                          <div class="col-md-9 " style="padding-left: 1px;">
                            <div class="vertical-scroll scroll-demo" style="height: 171px;" >
                                <div class="row mt-2" id="chk_boxes_jquery">


                                </div>
                              </div>
                          </div>
                            </div>


                            </div>
                          </div>
                        </div>

                      <div class="form-group m-form__group">
                        <label>Banner (.PNG,.JPG)</label>
                        <div class="input-group">
                          <input class="form-control @error('banner') is-invalid @enderror" type="file"  name="banner" accept="image/jpeg, image/png" value="{{ old('banner') }}" required >
                          @error('banner')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                       @enderror    
                        </div>
                      </div>




              </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
      </div>
    </form>
    <div class="col-sm-2">
    </div>  
    </div>

        <script type="text/javascript">

         
            $(document).ready(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Fetch all records

              fetchRecords(0);



              });


              function fetchRecords(id){
                $.ajax({
                    url: '/company_deals/get_services/'+id,
                  type: 'get',
                  dataType: 'json',
                  success: function(response){

                    var len = 0;
                    $('#chk_boxes_jquery').empty();
                    if(response['data'] != null){
                       len = response['data'].length;
                    }

                    if(len > 0){
                       for(var i=0; i<len; i++){
                        var id = response['data'][i].id;
                        var name = response['data'][i].name;



                        var tr_str = "<div class='col-md-6 mt-3'>" +
                            "<label class='d-block' for='chk-ani'>" +"<input class='checkbox_animated' name='services[]' id='chk-ani' value="+id+" type='checkbox'>"+ name+ "</label>" +


                          "</div>";




                          $("#chk_boxes_jquery").append(tr_str);
                       }
                    }

                  }
                });
              }


        </script>
@endsection
