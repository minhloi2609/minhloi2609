<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Thể Thao 24h</title>
    <meta name="description" content="Tailwind CSS News Template">

    <!-- Development css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Production css -->
    <!-- <link rel="stylesheet" href="dist/css/style.css"> -->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/logo.png') }}">
</head>

<body class="text-gray-700 pt-9 sm:pt-10">
    @include('blocks.client.header')


    @yield('content')


    @include('blocks.client.footer')

    <!--Vendor js-->
    <script src="{{ asset('vendors/hc-sticky/dist/hc-sticky.js') }}"></script>
    <script src="{{ asset('vendors/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendors/@splidejs/splide/dist/js/splide.min.js') }}"></script>
    <script src="{{ asset('vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js') }}"></script>

    <!-- Start development js -->
    <script src="{{ asset('js/theme.js') }}"></script>

    <!-- End development js -->

    <!-- Production js -->
    <!-- <script src="dist/js/scripts.js"></script> -->
</body>

</html>