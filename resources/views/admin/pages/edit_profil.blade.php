@extends('admin.layouts.master')

@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Index</a></li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')

<section class="section profile">

    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif
   
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
           
             
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ url('admin/images_admin',$admin->image)}}" alt="Profile" class="rounded-circle">
            <h2>{{ $admin->nom }}&nbsp;{{ $admin->prenom }}</h2>
            <h3>Administrateur</h3>
            
          </div>
        
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" >Informations</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier</button>
              </li>


            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                

                <h5 class="card-title">Mes informations</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nom</div>
                  <div class="col-lg-9 col-md-8">{{ $admin->nom }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Prénom</div>
                  <div class="col-lg-9 col-md-8">{{ $admin->prenom }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $admin->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Adresse</div>
                  <div class="col-lg-9 col-md-8">{{ $admin->adresse }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Téléphone</div>
                  <div class="col-lg-9 col-md-8">{{ $admin->tel }}</div>
                </div>

               

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                     
                <form action="{{ route('edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{ url('admin/images_admin',$admin->image)}}" alt="Profile">
                      <div class="pt-2">
                        <input name="image" type="file" class="btn btn-primary btn-sm" title="Modifier image">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nom" type="text" class="form-control" id="fullName" value="{{ $admin->nom }}">
                    </div>
                  </div>

                  

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Prénom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="prenom" type="text" class="form-control" id="company" value="{{ $admin->prenom }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="text" class="form-control" id="Job" value="{{ $admin->email }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="adresse" type="text" class="form-control" id="Country" value="{{ $admin->adresse }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tel" type="text" class="form-control" id="Address" value="{{ $admin->tel }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" value="" placeholder="Laisser vide pour garder le mot de passe actuel">
                    </div>
                  </div>

                  

                


                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              

             

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>











@endsection