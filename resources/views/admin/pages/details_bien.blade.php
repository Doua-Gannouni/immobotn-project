


@extends('admin.layouts.master')

@section('main_admin')
<div class="pagetitle">
    <h1>Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('listebiens') }}">Biens</a></li>
        <li class="breadcrumb-item active">Details {{ $bien->titre }}</li>
      </ol>
    </nav>
  </div>
@endsection

@section('contenu')


<div class="row align-items-top">

 <div class="col-lg-6">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Images</h5>

        <!-- Slides with controls -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            @forelse ($images as $i )

                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  <img src="{{ url('clients/images_biens',$i->image)}}" class="d-block w-100" alt="...">
                </div>

            @empty
                <p>Aucune image supplémentaire pour ce bien.</p>
            @endforelse
           </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div><!-- End Slides with controls -->

      </div>
    </div>

    
 </div>

 <div class="col-lg-6">

    <!-- Card with an image on top -->
    <div class="card">
      <img src="{{ url('clients/images_biens',$bien->image) }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $bien->titre }}</h5>
        <p class="card-text">Prix : {{ $bien->prix }}</p>
        <p class="card-text">Surface : {{ $bien->surface }}</p>
        <p class="card-text">Longueur : {{ $bien->longueur }}</p>
        <p class="card-text">Largeur : {{ $bien->largeur }}</p>
      </div>
    </div><!-- End Card with an image on top -->

    

  </div>
</div>

    @endsection