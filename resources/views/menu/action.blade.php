<script>
    $(document).ready(function() {
        $('#delete').on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                reverseButtons: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                let welcomeId = $(this).attr('data-id');
                let origRoute = "{{ route('menu.contact.destroy', ':id') }}";
                let route = origRoute.replace(':id', welcomeId);

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
                        error: function(xhr, status, error) {}
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
        })
    })
</script>
