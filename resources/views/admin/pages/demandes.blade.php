@extends('admin.layouts.master')

@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Index</a></li>
        <li class="breadcrumb-item active">Demandes</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')

 <div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Liste Demandes</h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Titre</th>
            <th scope="col">Client</th>
            <th scope="col">Professionnel</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($demandes as $d)
           <tr>

                <td><img id="imgB" src="{{url('clients/images_biens',$d->biens->image) }}" width="50px" height="50px"></td>
                <th scope="row">{{ $d->biens->titre }}</th>
                <td>{{ $d->clients->prenom}}&nbsp;{{ $d->clients->nom}}</td>
                <td>{{ $d->profs->prenom }}&nbsp;{{ $d->profs->nom }}</td>

                <td style="width:180px;text-align:center"><a style="margin-right:15px;margin-left:auto;" href="{{ route('details_demande',$d->id) }}"><button class="btn btn-outline-primary" title = "Détails" type="button" > Détails </button></a></td>
           </tr>
         @endforeach

        </tbody>
      </table>

    </div>

  </div>
</div>


          @endsection