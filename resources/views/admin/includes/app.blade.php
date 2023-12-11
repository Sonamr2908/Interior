<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title> Portfolio-b | @yield('title') </title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('adminassets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin-assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('admin-assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('admin-assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('admin-assets/js/config.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/simplebar/simplebar.min.js') }}"></script>



    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/bootstrap-extendedd.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/themes/semi-dark-layout.css') }}">


    <!-- ===============================================-->
      <!-- BEGIN: Vendor CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/vendors.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/apexcharts.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/extensions/toastr.min.css') }}">
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('admin-assets/vendors/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https:/fonts.gstatic.com">
    <link
        href="https:/fonts.googleapis.com/css2?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('admin-assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('admin-assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('admin-assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>

    <main class="main" id="top">

          <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
              var container = document.querySelector('[data-layout]');
              container.classList.remove('container');
              container.classList.add('container-fluid');
            }
          </script>

    @include('admin.includes.sidenav')



    @yield('content')



    <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog"
    aria-labelledby="authentication-modal-label" aria-hidden="true">
    <div class="modal-dialog mt-6" role="document">
      <div class="modal-content border-0">
        <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
          <div class="position-relative z-index-1 light">
            <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
            <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
          </div><button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2"
            data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-4 px-5">
          <form>
            <div class="mb-3"><label class="form-label" for="modal-auth-name">Name</label><input
                class="form-control" type="text" autocomplete="on" id="modal-auth-name"></div>
            <div class="mb-3"><label class="form-label" for="modal-auth-email">Email address</label><input
                class="form-control" type="email" autocomplete="on" id="modal-auth-email"></div>
            <div class="row gx-2">
              <div class="mb-3 col-sm-6"><label class="form-label" for="modal-auth-password">Password</label><input
                  class="form-control" type="password" autocomplete="on" id="modal-auth-password"></div>
              <div class="mb-3 col-sm-6"><label class="form-label" for="modal-auth-confirm-password">Confirm
                  Password</label><input class="form-control" type="password" autocomplete="on"
                  id="modal-auth-confirm-password"></div>
            </div>
            <div class="form-check"><input class="form-check-input" type="checkbox"
                id="modal-auth-register-checkbox"><label class="form-label" for="modal-auth-register-checkbox">I
                accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit"
                name="submit">Register</button></div>
          </form>
          <div class="position-relative mt-5">
            <hr>
            <div class="divider-content-center">or register with</div>
          </div>
          <div class="row g-2 mt-2">
            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span
                  class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span
                  class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main><!-- ===============================================-->
<!--    End of Main Content-->

  <!-- BEGIN: Vendor JS-->
  <script src="{{ asset('admin-assets/vendors/js/vendors.min.js') }}"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="{{ asset('admin-assets/vendors/toastr.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/moment.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js') }}"></script>


    @include('admin.includes.footer')




</body>

</html>