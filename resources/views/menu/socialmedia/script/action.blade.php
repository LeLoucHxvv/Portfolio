<script>
    $(document).on('click', '#add-socmed-btn', function(e) {
        e.preventDefault();
        $('#socmed-modal').modal('show');
        $('#add-socmed').removeClass('d-none');
        $('#edit-socmed').addClass('d-none');

    });

    $(document).on('click', '#submit-add-socmed', function(e){
        e.preventDefault();
        let form = $('#add-socmed-form')[0];
        let formData = new FormData(form);

        const route = "{{ route('social-media.store') }}";

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
            success: function(response){
                $('#socmed-modal').modal('hide');
                Swal.fire({
                    title: "Social Media Created!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#add-socmed form')[0].reset();
                    $('#socmed-forms').load(window.location.href + ' #socmed-forms');
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
                    $('[name="' + field + '"]').addClass('is-invalid').after('<span class="text-danger">' + message + '</span>');
                });
            }
        });
    });

    $(document).on('click', '#edit-socmed-btn', function(e) {
        e.preventDefault();
        $('#socmed-modal').modal('show');
        $('#add-socmed').addClass('d-none');
        $('#edit-socmed').removeClass('d-none');


        let socmedId = $(this).data('id');
        let origUrl = "{{ route('social-media.edit', 'id') }}";
        let url = origUrl.replace('id', socmedId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editing-name').text('Editing ' + response.socialMedia.social_media);
                $('#edit-link').val(response.socialMedia.social_link);
                $('#edit-type').val(response.socialMedia.social_media);
                $('#submit-edit-socmed').attr('data-id', socmedId);
            }
        });
    });

    $(document).on('click', '#submit-edit-socmed', function(e){
        e.preventDefault();
        let method = 'PUT';
        let form = $('#edit-socmed-form')[0];
        let formData = new FormData(form);
        formData.append('_method', method);

        let socmedId = $(this).attr('data-id');
        let origUrl = "{{ route('social-media.update', 'id') }}";
        let url = origUrl.replace('id', socmedId);

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#socmed-modal').modal('hide');
                Swal.fire({
                    title: "Social Media Updated!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#edit-socmed-form')[0].reset();
                    $('#socmed-forms').load(window.location.href + ' #socmed-forms');
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
                    $('[name="' + field + '"]').addClass('is-invalid').after('<span class="text-danger">' + message + '</span>');
                });
            }
        });
    });

    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        let socialMediaId = $(this).data('id'); // Retrieve data-id attribute of clicked button
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#Ff0000",
            reverseButtons: true,
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            let origRoute = "{{ route('social-media.destroy', ':id') }}";
            let route = origRoute.replace(':id', socialMediaId);
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
                        // Handle error
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
