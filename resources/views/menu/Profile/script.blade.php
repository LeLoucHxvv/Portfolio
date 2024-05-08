<script>
    (function($) {
        'use strict';
        $('.dropify').dropify();
        @if (session('success'))
            var message = "{!! session('success') !!}";
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
                icon: "success",
                title: "Profile Updated!",
                html: message,
            });
        @endif
    })(jQuery);
</script>
