@extends("layouts.app")

@section("content")

<div class="row">
    @if (count($deal)>0)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
          <h5>Deals of Company</h5>
          </div>
          <div class="float-right">
            <!-- <a name="" id="" class="btn btn-primary" href="#" role="button">Purpose Service</a> -->
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="display" id="basic-2">

              <thead>
                <tr>

                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Start date</th>
                  <th>End date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($deal as $deal)
                <tr>

                  <td>{{ $deal->title }}</td>
                  <td>{{ $deal->description }}</td>
                  <td>{{ $deal->price }}</td>
                  <td>{{ $deal->start_date }}</td>
                  <td>{{ $deal->end_date }}</td>
                  <div class="col-6">
                 </div>  
                 <div class="col-6">
             
                 </div>
                  <td>   
                    <a class="float-left mt-2" name="" id=""  href="{{url('company_deals/'.$deal->id .'/edit')}} "><i class="fa fa-edit"></i></a>
 
                    <form action="{{url('company_deals/'.$deal->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
           <button class="float-right" type="submit"><i class="fa fa-trash mr-2"></i></button>
                        
                    </form>
                     </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

    @else
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- error-400 start-->
        <div class="error-wrapper">
          <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
            <div class="error-heading mb-5">
              <h2 class="font-info">Company Deals are Not Found</h2>
            </div>
            <div class="col-md-8 offset-md-2">
              <p class="sub-content">Company Deals are not yet added for further Proceding Add Company Deals</p>
            </div>
            <div>
                <a name="" id="" class="btn btn-primary" href="{{ route('company_deals.create') }}" role="button">Add Company Deals</a>

            </div>
          </div>
        </div>
        <!-- error-400 end-->
      </div>
    @endif
  </div>
        <script type="text/javascript">

            function deleteConfirm(id){

                swal({
                    title: "Are you sure?",
                    text: "This will delete the Category permanently",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/categories/delete/"+id;
                    }
                });

            }

            function clearSearch() {

            }

        </script>
@endsection
