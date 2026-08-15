@extends('admin.layouts.master')

@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Index</a></li>
        <li class="breadcrumb-item active">Professionnels</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')

 <div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Liste Professionnels</h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Adresse</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($professionnels as $p)
          <tr>
            <td><img id="imgB" src="{{ url('clients/images_clients',$p->image) }}" width="50px" height="50px"></td>
            <th scope="row">{{ $p->nom }}</th>
            <th>{{ $p->prenom}}</th>
            <td>{{ $p->email}}</td>
            <td>{{ $p->adresse}}</td>
            <td>{{ $p->tel}}</td>
             <td>
                @if ($p->archive==1)
                  Activé
              @else
              Archivé
            @endif 


             </td>
            <td><a href="{{ route('archiver_user',$p->id)}}"><button title = "Archiver" type="button" style="background-color: transparent;border:transparent;"><i class="ri-archive-fill" style="font-size:25px;color:red"></i></button></a>
            <a href="{{ route('activer_user',$p->id) }}"><button title = "Archiver" type="button" style="background-color: transparent;border:transparent;"><i class="ri-shield-check-line" style="font-size:25px;color:green;"></i></button></a></td>
          </tr>
         @endforeach
          </tr>
       
        </tbody>
      </table>

    </div>

  </div>
</div>


          @endsection