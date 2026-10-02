
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('clients/logo.png') }}" alt="IMMOBOTN">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown dropdown-notifications">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell" ></i>
            <span class="badge bg-primary badge-number notif-count" data-count="{{ Auth::user()->unreadNotifications->count() }}">{{ Auth::user()->unreadNotifications->count() }}</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Vous avez <span class="notif-count">{{ Auth::user()->unreadNotifications->count() }}</span> notification(s)
              <a href="{{ route('listebiens') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir Tous</span></a>
            </li>
            <li class="notifications-start">
              <hr class="dropdown-divider">
            </li>

            @foreach (Auth::user()->unreadNotifications as $n)
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4><a href="{{ route('details_bien', $n->data['id']) }}">{{ $n->data['titre'] }}</a></h4>
                <p>Ajouté par {{ $n->data['prof'] }}</p>
                <p>{{ $n->created_at->diffForHumans() }}</p>
              </div>
            </li>
            @endforeach

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="{{ route('listebiens') }}">Voir tous les biens</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('admin/img/logoadmin.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> Admin </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('edit_profil') }}">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{ route('deconnecter_admin') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Déconnexion</span>
                </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
