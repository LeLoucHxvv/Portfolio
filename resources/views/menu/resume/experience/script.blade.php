<script>
    $(document).on('click', '#add-experience-btn', function(e) {
        e.preventDefault();
        $('#experience-modal').modal('show');
        $('#add-experience').removeClass('d-none');
        $('#edit-experience').addClass('d-none');
        $('#view-experience').addClass('d-none');
    });

    $(document).on('click', '#submit-add-experience', function(e){
        e.preventDefault();
        let form = $('#add-experience-form')[0];
        let formData = new FormData(form);

        const route = "{{ route('experience.store') }}";

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
                $('#experience-modal').modal('hide');
                Swal.fire({
                    title: "Experience Created!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#add-experience form')[0].reset();
                    $('#experience-forms').load(window.location.href + ' #experience-forms');
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

    $(document).on('click', '#edit-experience-btn', function(e) {
        e.preventDefault();
        $('#experience-modal').modal('show');
        $('#add-experience').addClass('d-none');
        $('#edit-experience').removeClass('d-none');
        $('#view-experience').addClass('d-none');

        let experienceId = $(this).data('id');
        let origUrl = "{{ route('experience.edit', 'id') }}";
        let url = origUrl.replace('id', experienceId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editing-name').text('Editing ' + response.experience.job);
                $('#edit-job').val(response.experience.job);
                $('#edit-ye').val(response.experience.year_experience);
                $('#edit-companyName').val(response.experience.company_name);
                $('#edit-summary').val(response.experience.summary);
                $('#submit-edit-experience').attr('data-id', experienceId);
            }
        });
    });

    $(document).on('click', '#submit-edit-experience', function(e){
        e.preventDefault();
        let method = 'PUT';
        let form = $('#edit-experience-form')[0];
        let formData = new FormData(form);
        formData.append('_method', method);

        let experienceId = $(this).attr('data-id');
        let origUrl = "{{ route('experience.update', 'id') }}";
        let url = origUrl.replace('id', experienceId);

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
                $('#experience-modal').modal('hide');
                Swal.fire({
                    title: "Experience Updated!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#edit-experience-form')[0].reset();
                    $('#experience-forms').load(window.location.href + ' #experience-forms');
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
        let educationId = $(this).data('id'); // Retrieve data-id attribute of clicked button
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#Ff0000",
            reverseButtons: true,
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            let origRoute = "{{ route('experience.destroy', ':id') }}";
            let route = origRoute.replace(':id', educationId);
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
