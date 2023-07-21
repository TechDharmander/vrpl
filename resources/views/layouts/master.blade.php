<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="../backend/assets/img/favicon.png">
        <title>{{ config('app.name', 'Vusic Records') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="../backend/lib/remixicon/fonts/remixicon.css">

        <!-- Template CSS -->
        <link rel="stylesheet" href="../backend/assets/css/style.min.css">

        @livewireStyles
    </head>
    <body>

        @include('layouts.inc.sidebar') 
        

        @include('layouts.inc.header')

        <div class="main main-app p-3 p-lg-4">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <!-- <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Management</li>
              </ol> -->
              <h4 class="main-title mb-0">Welcome to Dashboard</h4>
            </div>

          </div>

          <div class="row g-3">
            <div class="col-xl-12">
              {{ $slot }}
            </div>
          </div>

          <div class="main-footer mt-5">
            <span>&copy; {{ date('Y') }}. Vusic Records. All Rights Reserved.</span>
            <span>Created by: <a href="#" target="_blank">Speedwell IT Solutions Pvt. Ltd.</a></span>
          </div><!-- main-footer -->
        </div><!-- main -->


        <script src="../backend/lib/jquery/jquery.min.js"></script>
        <script src="../backend/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../backend/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <script src="../backend/assets/js/script.js"></script>

        @livewireScripts
    </body>
</html>
