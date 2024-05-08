<script>
    $(document).on('click', '#add-portfolio-btn', function(e) {
        e.preventDefault();
        $('#portfolio-modal').modal('show');
        $('#add-portfolio').removeClass('d-none');
        $('#edit-portfolio').addClass('d-none');
        $('#view-portfolio').addClass('d-none');

    });

    $(document).on('click', '#submit-add-portfolio', function(e) {
        e.preventDefault();
        let form = $('#add-portfolio-form')[0];
        let formData = new FormData(form);
        // formData.append('image', $('#image')[0].files[0]);

        const route = "{{ route('portfolio.store') }}";

        $.ajax({
            url: route,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#portfolio-modal').modal('hide');
                Swal.fire({
                    title: "portfolio Created!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#add-portfolio form')[0].reset();
                    // $('#portfolio-card').load(window.location.href + ' #portfolio-card');
                    window.location.reload();
                });
            },
            error: function(response) {
                const errors = response.responseJSON.errors;
                let allFieldsEmpty = true;
                $('.form-control').each(function() {
                    if ($(this).val().trim() !== '') {
                        allFieldsEmpty = false;
                        return false;
                    }
                });
                let errorMessage;

                if (allFieldsEmpty) {
                    errorMessage = "Please fill in all required fields!";
                } else {
                    errorMessage = Object.values(errors)[0];
                }

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "error",
                    title: "Validation error!",
                    html: errorMessage,
                });

                $('.form-control').removeClass('is-invalid');
                $('.text-danger').remove();

                $.each(errors, function(field, message) {
                    $('[name="' + field + '"]').addClass('is-invalid').after(
                        '<span class="text-danger">' + message + '</span>');
                });
            }
        });
    });

    $(document).on('click', '#view-portfolio-btn', function(e) {
        e.preventDefault();
        $('#portfolio-modal').modal('show');
        $('#add-portfolio').addClass('d-none');
        $('#edit-portfolio').addClass('d-none');
        $('#view-portfolio').removeClass('d-none');

        let portfolioId = $(this).attr('data-id');
        let origUrl = "{{ route('portfolio.show', 'id') }}";
        let url = origUrl.replace('id', portfolioId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                let name = response.portfolio.name;
                let detail = response.portfolio.detail;
                let year_created = response.portfolio.year_created;
                let img = response.portfolio.img;

                // $('#view-name').value(name);
                $('#view-name').val(name);
                $('#view-detail').val(detail);
                $('#view-year_created').val(year_created);
                $('#view-img').attr('src', img);
            }
        });
    });

    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        let portfolioId = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#Ff0000",
            reverseButtons: true,
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            let origRoute = "{{ route('portfolio.destroy', ':id') }}";
            let route = origRoute.replace(':id', portfolioId);
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
