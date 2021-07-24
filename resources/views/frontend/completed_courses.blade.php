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
        <div class="container-fluid product-wrapper ">
            <div class="product-grid">
              <div class="feature-products">
                <div class="row">
                  <div class="col-md-6 products-total">
                    <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
                    <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div><span class="d-none-productlist filter-toggle">
                      <h6 class="mb-0">Filters<span class="ml-2"><i class="toggle-data" data-feather="chevron-down"></i></span></h6></span>
                    <div class="grid-options d-inline-block">
                      <ul>
                        <li><a class="product-2-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
                        <li><a class="product-3-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
                        <li><a class="product-4-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
                        <li><a class="product-6-layout-view" href="#" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
                      </ul>
                    </div>
                  </div>

                </div>

              </div>
              <div class="product-wrapper-grid mt-5">
                <div class="row">
                 @foreach ($course as $course)



                    <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                        <div class="product-box">
                            <div class="product-img">
                            <div class="ribbon ribbon-clip ribbon-warning">Completed</div>
                                    @if (!@empty($course->file))

                                    <img class="img-fluid" src="{{ asset('public/course/'.$course->file )}}" alt="Image description">
                                    @else
                                    <img class="img-fluid" src="{{ asset('public/assets/images/ecommerce/04.jpg')}}" alt="">
                                    @endif

                            {{-- <div class="product-hover">
                                <ul>
                                <li>
                                    <button class="btn" type="button"><i class="icon-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button class="btn" type="button" data-toggle="modal" data-target="#exampleModalCenter14"><i class="icon-eye"></i></button>
                                </li>

                                </ul>
                            </div> --}}
                            </div>
                            <div class="modal fade" id="exampleModalCenter14" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter14" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="product-box row">
                                            <div class="col-md-6 text-center">
                                                <div class="product-img">
                                                    @if (!@empty($course->file))

                                                        <img class="img-fluid" src="{{ asset('public/course/'.$course->file )}}" alt="Image description">
                                                        @else
                                                        <img class="img-fluid" src="{{ asset('public/assets/images/ecommerce/04.jpg')}}" alt="">
                                                        @endif
                                                </div>
                                            </div>
                                        <div class="product-details col-md-6 text-left">
                                        <a href="{{ route('user-coureses.show',$course->id) }}"><h4>{{ $course->name }}</h4></a>
                                            <div class="product-price">
                                            <del>${{ $course->price }}    </del>${{ $course->sale_price }}
                                            </div>
                                            <div class="product-view">
                                            <h6 class="f-w-600">Product Details</h6>
                                            <p class="mb-0">{{ $course->description }}</p>
                                            </div>



                                            {{-- <div class="addcart-btn mt-3">
                                                <button class="btn btn-primary" type="button">Add to Cart</button>
                                                <a class="btn btn-primary" role="button" href="{{ route('user-coureses.show',$course->id) }}">View Details</a>
                                            </div> --}}

                                        </div>
                                        </div>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×                              </span></button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details">
                                {{-- <a href="{{ route('user-coureses.show',$course->id) }}"><h4>{{ $course->name }}</h4></a> --}}
                                <h4>{{ $course->name }}</h4>
                                <p class="mb-0">{{ $course->description }}</p>
                            <hr>
                            <div class="product-price">
                                <h2>{{ $course->percentage }}%</h2>
                                {{-- <a href="{{ route('start_course',$course->id) }}" role="button" class="btn btn-primary">Start Course</a> --}}
                            </div>
                            {{-- <div class="product-price">
                                <del>${{ $course->price }}    </del>${{ $course->sale_price }}
                            </div> --}}
                            </div>
                        </div>
                        </div>
                    </div>

                  @endforeach
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
                         <h2 class="font-info">Courses are Not Completed</h2>
                         </div>
                         <div class="col-md-8 offset-md-2">
                         <p class="sub-content">Courses are not yet Completed for further Proceding Complete Course</p>
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


</script>
@endsection
