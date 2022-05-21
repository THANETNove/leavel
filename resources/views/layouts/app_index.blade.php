<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"                content="https://mobile-fixit.com/" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="บริการงานซ่อมมือถือ ครบวงจร" />
    <meta property="og:description"        content="เปลี่ยนจอ, เปลี่ยนแบต, ปลดล็อคทุกรูปแบบ, ชาร์จไม่เข้า, เปิดไม่ติด, บริการติดฟิล์ม, และจำหน่ายอุปกรณ์มือ มาตราฐาน อมก." />
    <meta property="og:image"              content="assets/img/image-icon.png" />

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



  

    @foreach ($homeTop as $top)

    <title>{{$top->webName}}</title>

    @endforeach  



    <meta content="" name="description">

    <meta content="" name="keywords">

  

    <!-- Favicons -->

    <link href="assets/img/image-icon.png" rel="icon">

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



    <!-- Vendor CSS Files -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  

    <!-- Template Main CSS File -->

    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

            @yield('content')

    <!-- ======= Footer ======= -->

    @extends('bar.footer_Index')



 <!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





    <script src="assets/vendor/aos/aos.js"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <script src="assets/vendor/php-email-form/validate.js"></script>

  

    <!-- Template Main JS File -->

    <script src="assets/js/main.js"></script>



</body>

</html>

