@extends('admin.layouts.master')

@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Index</a></li>
        <li class="breadcrumb-item active">Biens</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')

 <div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Liste Biens</h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Titre</th>
            <th scope="col">Prix</th>
            <th scope="col">Surface</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($biens as $bien)
          <tr>
            <td><img id="imgB" src="{{ url('clients/images_biens',$bien->image) }}" width="80px" height="50px"></td>
            <th scope="row">{{ $bien->titre }}</th>
            <td>{{ $bien->prix}} TND</td>
            <td>{{ $bien->surface }}</td>
            <td>
              @if ($bien->active==0)
              Non activé
              @else
              Activé
            @endif
          </td>
            <td style="width: 200px;">
            <a href="{{ route('details_bien',$bien->id) }}"><button title="Details" type="button" style="background-color: transparent;border:transparent;" ><i class="ri-eye-fill" style="font-size:25px;color:slategray"></i></button></a>
            <form class="d-inline" action="{{  route('activer_bien',$bien->id) }}" method="POST">
              @csrf
              <button title="Valider" type="submit" style="background-color: transparent;border:transparent;"><i class="ri-checkbox-circle-fill"  style="font-size:25px;color:green"></i></button>
            </form>
            <form class="d-inline" action="{{  route('desactiver_bien',$bien->id) }}" method="POST">
              @csrf
              <button title="Invalider" type="submit" style="background-color: transparent;border:transparent;"><i class="ri-close-circle-fill"  style="font-size:25px;color:red"></i></button>
            </form>
            <form class="d-inline" action="{{ route('supprimer_bien',$bien->id) }}" method="POST" onsubmit="return confirm('Supprimer ce bien ?')">
              @csrf
              @method('DELETE')
              <button title="Supprimer" type="submit" style="background-color: transparent;border:transparent;" ><i class="ri-delete-bin-4-fill" style="font-size:25px;color:red"></i></button>
            </form>
            </td>
          </tr>
         @endforeach

        </tbody>
      </table>

    </div>

  </div>
</div>


          @endsection