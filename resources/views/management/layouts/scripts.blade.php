<script src="{{ url('/management/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ url('/management/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="{{ url('/management/assets/js/shared/off-canvas.js') }}"></script>
<script src="{{ url('/management/assets/js/shared/misc.js') }}"></script>
<script src="{{ url('/management/assets/js/demo_1/dashboard.js') }}"></script>
<script src="{{ url('/management/assets/js/chosen.jquery.js') }}"></script>
<script src="{{ url('/management/assets/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}

<script>

   
    function deleteAlert() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-user')submit();
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    }
    
</script>
