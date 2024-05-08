<script>
    // $(document).ready(function(){
    //     $('#uploadForm').submit(function(event){
    //         event.preventDefault();
    //         var formData = new FormData(this);

    //         $.ajax({
    //             url: $(this).attr('action'),
    //             type: 'POST',
    //             data: formData,
    //             success: function(response){
    //                 $('#successMessage').show();
    //             },
    //             error: function(xhr, textStatus, errorThrown){
    //                 console.log(xhr);
    //             },
    //             cache: false,
    //             contentType: false,
    //             processData: false
    //         });
    //     });
    // });
    $(document).ready(function() {
        $('#uploadForm').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#successMessage').show();
                    toastr.success('PDF uploaded successfully!');
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });

    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        let blogId = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#Ff0000",
            reverseButtons: true,
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            let origRoute = "{{ route('cv.destroy', ':id') }}";
            let route = origRoute.replace(':id', blogId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            if (result.isConfirmed) {
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        success(data)
                    },
                    error: function(xhr, status, error) {

                    }
                });

                function success(data) {
                    Swal.fire({
                        title: "Deleted Success",
                        html: data.success,
                        icon: "success",
                        showCancelButton: false,
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        });
    });

</script>
