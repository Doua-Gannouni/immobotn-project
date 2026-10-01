@extends('admin.layouts.master')

@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Index</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')

<div class="row">

  <!-- Biens -->
  <div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('listebiens') }}">Biens</a></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-house"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $nb_biens }}</h6>
            <span class="text-danger small pt-1 fw-bold">{{ $nb_attente }}</span> <span class="text-muted small pt-2 ps-1">en attente de validation</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Demandes -->
  <div class="col-xxl-3 col-md-6">
    <div class="card info-card revenue-card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('demandes') }}">Demandes</a></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-envelope"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $nb_demandes }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Clients -->
  <div class="col-xxl-3 col-md-6">
    <div class="card info-card customers-card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('clients') }}">Clients</a></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-people"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $nb_clients }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Professionnels -->
  <div class="col-xxl-3 col-md-6">
    <div class="card info-card customers-card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('professionnels') }}">Professionnels</a></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-briefcase"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $nb_professionnels }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
