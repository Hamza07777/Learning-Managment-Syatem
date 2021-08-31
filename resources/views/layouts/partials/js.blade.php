
<script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('public/assets/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap/bootstrap.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('public/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('public/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('public/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('public/assets/js/config.js') }}"></script>
<!-- Plugins JS start-->

<script src="{{ asset('public/assets/js/tooltip-init.js') }}"></script>
<script src="{{ asset('public/assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('public/assets/js/select2/select2-custom.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('public/assets/js/script.js') }}"></script>
<script src="{{ asset('public/assets/js/theme-customizer/customizer.js') }}"></script>

<script src="{{ asset('public/assets/js/login.js') }}"></script>
<script src="{{ asset('public/assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('public/assets/js/time-picker/highlight.min.js') }}"></script>
<script src="{{ asset('public/assets/js/time-picker/clockpicker.js') }}"></script>
<script src="{{ asset('public/assets/js/scrollable/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/assets/js/scrollable/scrollable-custom.js') }}"></script>
<script src="{{ asset('public/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('public/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('public/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script src="{{ asset('public/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/js/datatable/datatables/datatable.custom.js') }}"></script>





<script src="{{ asset('public/assets/js/modal-animated.js') }}"></script>
<script src="{{ asset('public/assets/js/form-wizard/form-wizard-five.js') }}"></script>
<script src="{{ asset('public/assets/js/product-tab.js') }}"></script>
<script src="{{ asset('public/assets/js/rating/jquery.barrating.js') }}"></script>
<script src="{{ asset('public/assets/js/rating/rating-script.js') }}"></script>
{{-- <script src="{{ asset('public/assets/js/ecommerce.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
         $(".services_stripe_active_fields").hide();
         $(".paypal_active_fields").hide();
         $(".flutter_active_fields").hide();  
         $(".services_instamojo_active_fields").hide(); 
         $(".services_razorpay_active_fields").hide(); 
         $(".services_cashfree_active_fields").hide(); 
         $(".services_payu_active_fields").hide(); 
         
    });
</script>

<script type="text/javascript">

    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).style('display', 'none');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script>
    @if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}"

switch (type) {
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
}
@endif

$(document).on('click', '.deleteRecord', function (e) {
        // console.log(id);
        var deleteFunction = $(this).attr('data-action');
        var form =  $(this).closest("form");
        swal({
                title: "Are you sure?",
                text: "You'll not be able to recover this record again!",
                type: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Yes, Delete it!"
            },

            function () {
              
                    window.location.href = deleteFunction;
                
                
            });

            
    });

</script>
