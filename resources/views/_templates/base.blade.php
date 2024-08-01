<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title') </title>
  <link rel="shortcut icon" type="image/png" href="/template/assets/images/logos/favicon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
          rel="stylesheet">
  <link rel="stylesheet" href="/template/assets/css/styles.min.css" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    @include('_partials/menu')

    <div class="body-wrapper">
      @include('_partials/navbar')

      <div class="body-wrapper-inner p-4">
          @yield('content')

          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p>
          </div>
      </div>
    </div>
  </div>
  <script src="/template/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/template/assets/js/sidebarmenu.js"></script>
  <script src="/template/assets/js/app.min.js"></script>
  <script src="/template/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/template/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/template/assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
