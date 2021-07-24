@extends("layouts.app")

@section("content")

<div class="row p-lg-5">




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
                 <!-- Container-fluid starts-->
                 <div class="container-fluid">
                  <div class="card">
                    <div class="card-header">
                      <h5>Billing Details</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-sm-12">
                          <form enctype="multipart/form-data" action="{{route('course.store')}}">
                            <div class="form-row">
                              <div class="form-group col-sm-6">
                                <label for="inputEmail4">First Name</label>
                                <input class="form-control" id="inputEmail4" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="inputPassword4">Last Name</label>
                                <input class="form-control" id="inputPassword4" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-sm-6">
                                <label for="inputEmail5">Phone</label>
                                <input class="form-control" id="inputEmail5" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="inputPassword7">Email Address</label>
                                <input class="form-control" id="inputPassword7" type="email" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputState">Country</label>
                              <select class="form-control" id="inputState">
                                <option selected="">Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="inputAddress5">Address</label>
                              <input class="form-control" id="inputAddress5" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="inputCity">Town/City</label>
                              <input class="form-control" id="inputCity" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="inputAddress2">State/Country</label>
                              <input class="form-control" id="inputAddress2" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="inputAddress6">Postal Code</label>
                              <input class="form-control" id="inputAddress6" type="text" placeholder="" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" required autocomplete="name">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                            {{-- <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" id="gridCheck" type="checkbox">
                                <label class="form-check-label" for="gridCheck">Check me out</label>
                              </div>
                            </div> --}}

                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <div class="checkout-details">
                            <div class="order-box">
                              <div class="title-box">
                                <div class="checkbox-title">
                                  <h4>Course </h4><span>Total</span>
                                </div>
                              </div>
                              <ul class="qty">
                                <li>{{ $course->name }} × 1 <span>${{ $course->sale_price }}</span></li>
                              </ul>
                              <ul class="sub-total">
                                <li>Subtotal <span class="count">${{ $course->sale_price }}</span></li>

                              </ul>
                              <ul class="sub-total total">
                                <li>Total <span class="count">${{ $course->sale_price }}</span></li>
                              </ul>
                              <div class="animate-chk">
                                <div class="row">
                                  <div class="col">
                                    <label class="d-block" for="edo-ani">
                                      <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="" data-original-title="" title="">Check Payments
                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                      <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani" data-original-title="" title="">Cash On Delivery
                                    </label>
                                    <label class="d-block" for="edo-ani2">
                                      <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="" data-original-title="" title="">PayPal<img class="img-paypal" src="{{ asset('public/assets/images/checkout/paypal.png') }}" alt="">
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="text-right"><button type="submit" class="btn btn-primary" >Place Order  </button></div>
                            </div>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Container-fluid Ends-->
  </div>
  <script type="text/javascript">


</script>
@endsection
