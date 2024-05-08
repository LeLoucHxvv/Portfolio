<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nathaniel D. Nicolas</title>

     <!-- Favicons -->
     <link href="{{ asset('assetss/images/eyeee.png') }}" rel="icon">

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assetss/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('assetss/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assetss/css/vertical-layout-light/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" href="{{ asset('assetss/images/favicon.png') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />



    <style>

        #typing-animation {
            font-family: 'Roboto', sans-serif;
            /* Use a modern font */
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            /* border-right: .15em solid #00ff00; */
            /* Neon green border */
            color: #021a02;
            /* Neon green text */
            animation: typing 1s steps(40, end), blink-caret .75s infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: #00ff00;
                /* Neon green */
            }
        }

        .form-group {
            margin-bottom: 0cm;
        }

        .custom-file-upload {
            border: 2px solid #ccc;
            display: inline-block;
            padding: 8px 12px;
            cursor: pointer;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .custom-file-upload:hover {
            background-color: #e9e9e9;
        }


        .image-fixed-height {
            height: 200px;
            /* Adjust the desired height */
            object-fit: cover;
            /* Ensure the image covers the entire container */
        }

        /* Ensure consistent alignment and size for the image container */
        .portfolio-image-container {
            height: 200px;
            /* Same height as the image */
            overflow: hidden;
            /* Hide any overflow to maintain consistency */
        }
    </style>

</head>
