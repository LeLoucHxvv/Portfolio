<script>
    $(document).on('click', '#add-education-btn', function(e) {
        e.preventDefault();
        $('#education-modal').modal('show');
        $('#add-education').removeClass('d-none');
        $('#edit-education').addClass('d-none');
        $('#view-education').addClass('d-none');
    });

    $(document).on('click', '#submit-add-education', function(e){
        e.preventDefault();
        let form = $('#add-education-form')[0];
        let formData = new FormData(form);

        const route = "{{ route('education.store') }}";

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
                $('#education-modal').modal('hide');
                Swal.fire({
                    title: "Education Created!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#add-education-form')[0].reset();
                    $('#education-forms').load(window.location.href + ' #education-forms');
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

    $(document).on('click', '#edit-education-btn', function(e) {
        e.preventDefault();
        $('#education-modal').modal('show');
        $('#add-education').addClass('d-none');
        $('#edit-education').removeClass('d-none');
        $('#view-education').addClass('d-none');

        let educationId = $(this).data('id');
        let origUrl = "{{ route('education.edit', 'id') }}";
        let url = origUrl.replace('id', educationId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editing-name').text('Editing ' + response.education.master);
                $('#edit-master').val(response.education.master);
                $('#edit-sy').val(response.education.school_year);
                $('#edit-placeschool').val(response.education.place_school);
                $('#edit-summary').val(response.education.summary);
                $('#submit-edit-education').attr('data-id', educationId);
            }
        });
    });

    $(document).on('click', '#submit-edit-education', function(e){
        e.preventDefault();
        let method = 'PUT';
        let form = $('#edit-education-form')[0];
        let formData = new FormData(form);
        formData.append('_method', method);

        let educationId = $(this).attr('data-id');
        let origUrl = "{{ route('education.update', 'id') }}";
        let url = origUrl.replace('id', educationId);
        // console.log(educationId);
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
                $('#education-modal').modal('hide');
                Swal.fire({
                    title: "Education Updated!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#edit-education-form')[0].reset();
                    $('#education-forms').load(window.location.href + ' #education-forms');
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
            let origRoute = "{{ route('education.destroy', ':id') }}";
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
