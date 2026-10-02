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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ route('index') }}" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('clients/logo.png') }}" alt="IMMOBOTN">
                  <span>Admin</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connectez-vous à votre compte</h5>
                    <p class="text-center small">Entrer votre email & mot de passe </p>
                  </div>

                  @if ($message = Session::get('message'))
                    <div class="alert alert-danger">{{ $message }}</div>
                  @endif

                  <form action="{{  route('postlogin') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Tapez votre Email </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Tapez votre mot de passe</div>
                    </div>

                   
                    <div class="col-12 button">
                        <input type="submit" value="Se connecter">
                    </div>
                    
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>