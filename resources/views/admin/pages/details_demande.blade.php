@extends('admin.layouts.master')
@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('demandes') }}">Demandes</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')

<!-- Top Selling -->
<div class="col-12">
    <div class="card top-selling overflow-auto">
      <div class="card-body pb-0">
        <h5 class="card-title">Demande</h5>

        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Client</th>
              <th scope="col">Professionnel</th>
              <th scope="col">Bien</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>{{ $demande->id }}</td>
              <td>{{ $demande->clients->prenom }}&nbsp;{{ $demande->clients->nom }} </td>
              <td>{{ $demande->profs->prenom }}&nbsp;{{ $demande->profs->nom }}</td>
              <td>{{ $demande->biens->titre }}</td>
              <td>{{ $demande->created_at }}</td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div>

  <div class="col-12">
    <div class="card top-selling overflow-auto">
      <div class="card-body pb-0">
        <h5 class="card-title">Bien</h5>

        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Titre</th>
              <th scope="col">Prix</th>
              <th scope="col">Surface</th>
              <th scope="col">Longueur</th>
              <th scope="col">Largeur</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#"><img src="{{ url('clients/images_biens',$demande->biens->image)}}" alt=""></a></th>
              <td><a href="{{ route('details_bien',$demande->biens->id) }}" class="text-primary fw-bold">{{ $demande->biens->titre }}</a></td>
              <td>{{ $demande->biens->prix }}&nbsp;<span class="fw-bold" style="color: gray;font-style:oblique;">TND</span></td>
              <td>{{ $demande->biens->surface }}</td>
              <td>{{ $demande->biens->longueur }}</td>
              <td>{{$demande->biens->largeur}}</td>
             
            </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div>

  
  <div class="col-12">
    <div class="card top-selling overflow-auto">
      <div class="card-body pb-0">
        <h5 class="card-title">Client</h5>

        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
              <th scope="col">Adresse</th>
              <th scope="col">Télephone</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#"><img src="{{ url('clients/images_clients',$demande->clients->image)}}" alt=""></a></th>
              <td>{{ $demande->clients->nom }}</td>
              <td>{{ $demande->clients->prenom }}</td>
              <td>{{ $demande->clients->email }}</td>
              <td>{{ $demande->clients->adresse }}</td>
              <td>{{ $demande->clients->tel }}</td>
             
            </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div>


  
  <div class="col-12">
    <div class="card top-selling overflow-auto">
      <div class="card-body pb-0">
        <h5 class="card-title">Professionnel</h5>

        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
              <th scope="col">Adresse</th>
              <th scope="col">Télephone</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#"><img src="{{ url('clients/images_clients',$demande->profs->image)}}" alt=""></a></th>
              <td>{{ $demande->profs->nom }}</td>
              <td>{{ $demande->profs->prenom }}</td>
              <td>{{ $demande->profs->email }}</td>
              <td>{{ $demande->profs->adresse }}</td>
              <td>{{ $demande->profs->tel }}</td>
             
            </tr>
          </tbody>
        </table>

      </div>

    </div>
  </div>




@endsection