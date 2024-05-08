<script>
    $(document).on('click', '#add-skill-btn', function(e) {
        e.preventDefault();
        $('#skill-modal').modal('show');
        $('#add-skill').removeClass('d-none');
        $('#edit-skill').addClass('d-none');

    });

    $(document).on('click', '#submit-add-skill', function(e){
        e.preventDefault();
        let form = $('#add-skill-form')[0];
        let formData = new FormData(form);

        const route = "{{ route('skill.store') }}";

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
                $('#skill-modal').modal('hide');
                Swal.fire({
                    title: "Skill Created!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#add-skill form')[0].reset();
                    $('#skill-forms').load(window.location.href + ' #skill-forms');
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

    $(document).on('click', '#edit-skill-btn', function(e) {
        e.preventDefault();
        $('#skill-modal').modal('show');
        $('#add-skill').addClass('d-none');
        $('#edit-skill').removeClass('d-none');


        let skillId = $(this).data('id');
        let origUrl = "{{ route('skill.edit', 'id') }}";
        let url = origUrl.replace('id', skillId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editing-name').text('Editing ' + response.skill.skill);
                $('#edit-skills').val(response.skill.skill);
                $('#edit-ye').val(response.skill.yr_experience);
                $('#edit-icon').val(response.skill.icon);
                $('#submit-edit-skill').attr('data-id', skillId);
            }
        });
    });

    $(document).on('click', '#submit-edit-skill', function(e){
        e.preventDefault();
        let method = 'PUT';
        let form = $('#edit-skill-form')[0];
        let formData = new FormData(form);
        formData.append('_method', method);

        let skillId = $(this).attr('data-id');
        let origUrl = "{{ route('skill.update', 'id') }}";
        let url = origUrl.replace('id', skillId);

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
                $('#skill-modal').modal('hide');
                Swal.fire({
                    title: "Skill Updated!",
                    html: response.success,
                    icon: "success",
                }).then((result) => {
                    $('#edit-skill-form')[0].reset();
                    $('#skill-forms').load(window.location.href + ' #skill-forms');
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
        let skillId = $(this).data('id'); // Retrieve data-id attribute of clicked button
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#Ff0000",
            reverseButtons: true,
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            let origRoute = "{{ route('skill.destroy', ':id') }}";
            let route = origRoute.replace(':id', skillId);
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
