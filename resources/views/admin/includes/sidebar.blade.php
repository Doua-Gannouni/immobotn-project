<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('listebiens', 'details_bien') ? '' : 'collapsed' }}" href="{{ route('listebiens')}}">
          <i class="bi bi-menu-button-wide"></i><span>Gérer les biens</span>
        </a>
        
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('demandes', 'details_demande') ? '' : 'collapsed' }}" href="{{ route('demandes') }}">
          <i class="bi bi-journal-text"></i><span>Les demandes</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('clients') ? '' : 'collapsed' }}" href="{{ route('clients') }}">
          <i class="bi bi-journal-text"></i><span>Les Clients</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('professionnels') ? '' : 'collapsed' }}" href="{{ route('professionnels') }}">
          <i class="bi bi-journal-text"></i><span>Les Professionnels</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('edit_profil') ? '' : 'collapsed' }}" href="{{ route('edit_profil') }}">
          <i class="bi bi-person"></i>
          <span>Gérer mon profil</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->