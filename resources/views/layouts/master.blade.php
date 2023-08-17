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

        @livewireStyles
        <!-- Scripts -->
        <link rel="stylesheet" href="../backend/lib/remixicon/fonts/remixicon.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="../backend/lib/prismjs/themes/prism.min.css">

        <!-- Select2  -->
        <link rel="stylesheet" href="../backend/lib/select2/css/select2.min.css">
        @stack('styles')
        <!-- Template CSS -->
        <link rel="stylesheet" href="../backend/assets/css/style.min.css">

        <style>
          /*Primary (#3B71CA) Secondary (#9FA6B2) Success (#14A44D) Danger (#DC4C64) Warning (#E4A11B) Info (#54B4D3) Light (#FBFBFB)  Dark (#332D2D)*/
          .toast-success {
              background-color: #14A44D !important;
          }
          .toast-error {
              background-color: #DC4C64 !important;
          }
          .toast-info {
              background-color: #54B4D3 !important;
          }
          .toast-warning {
              background-color: #E4A11B !important;
          }
        </style>
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
              <!-- <h4 class="main-title mb-0">Welcome to Dashboard</h4> -->
            </div>

          </div>

          <div class="row g-3">
            <div class="col-xl-12">
              @php $userchack = appHelper::chackVerification();@endphp
           
              @if($userchack=='notverified')
              <div class="alert alert-solid alert-danger" role="alert">
                your account is not verified. please check your register mail mailbox and click to verified.
                <a href='{{route("send-verification-mail")}}' class='btn btn-success'>Re-Send Mail</a>
              </div>
              @endif

              {{ $slot }}
            </div>
          </div>

          <div class="main-footer mt-5">
            <span>&copy; {{ date('Y') }}. Vusic Records. All Rights Reserved.</span>
            <span>Created by: <a href="#" target="_blank">Speedwell IT Solutions Pvt. Ltd.</a></span>
          </div><!-- main-footer -->
        </div><!-- main -->


        @livewireScripts

        <script src="../backend/lib/jquery/jquery.min.js"></script>
        <script src="../backend/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../backend/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="../backend/lib/prismjs/prism.js"></script>
        <!-- Select2  -->
        <script src="../backend/lib/select2/js/select2.full.min.js"></script>

        <script src="../backend/assets/js/script.js"></script>
        <script>
          window.addEventListener('showToastr', function(event){
            toastr.remove();
            if(event.detail.type == 'info') {
              toastr.info(event.detail.message);
            }else if(event.detail.type == 'warning') {
              toastr.warning(event.detail.message);
            }else if(event.detail.type == 'error') {
              toastr.error(event.detail.message);
            }else if(event.detail.type == 'success') {
              toastr.success(event.detail.message);
            }else {
              return false;
            }
          });

          window.addEventListener('showModel', function(e){
            $('#addModal').modal('show');
          });

          window.addEventListener('hideModel', function(e){
            $('#addModal, #addArtist, #addComposer, #addLyricist').modal('hide');
          });
        </script>
        @stack('scripts')

    </body>
</html>
