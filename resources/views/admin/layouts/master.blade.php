<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IMMOBOTN - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('clients/icon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

  <!-- Couleurs et police IMMOBOTN -->
  <link href="{{ asset('admin/css/immobotn.css') }}" rel="stylesheet">


</head>

<body>
    @include('admin.includes.header')
    @include('admin.includes.sidebar')

    <main id="main" class="main">
         <div class="main_admin">
              @yield('main_admin')
         </div>

        <section class="section dashboard">
          <div class="row">

<div class="contenu">
    @yield('contenu')
 </div>
          </div>
        </section>

      </main><!-- End #main -->

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- Notifications temps réel : seulement si Pusher est configuré -->
  @if (config('broadcasting.connections.pusher.key'))
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  <script>
  var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
    cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}'
  });

  var detailsBienUrl = '{{ url('admin/bien/details') }}';
  </script>

  <script src="{{asset('pusherNotifications.js')}}"></script>
  @endif

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/js/main.js') }}"></script>




</body>

</html>
