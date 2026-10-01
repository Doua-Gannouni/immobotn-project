@extends('client.layouts.master')

@section('contenu')
<div class="container">



<div class="imgd">
  <img class ="imagebien" src="{{ url('clients/images_biens',$bien->image) }}">
</div>


<div class="details">

  <h1 style="font-size: 35px;color:#177d85">{{ $bien->titre }}</h1>
  <table>
    <tr>
      <td><p><span class="spant">Prix</span> </p></td>
      <td><p><span class="spand">{{ $bien->prix }}&nbsp;TND</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Surface</span> </p></td>
      <td><p><span class="spand">{{ $bien->surface }}</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Longueur</span> </p></td>
      <td><p><span class="spand">{{ $bien->longueur }}</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Largeur</span> </p></td>
      <td><p><span class="spand">{{ $bien->largeur }}</span></p></td>
    </tr>
  </table>
  <h1 style="font-size: 35px;color:#177d85">Posté par&nbsp;:</h1>
  <table>
    <tr>
      <td><p><span class="spant">Nom</span> </p></td>
      <td><p><span class="spand">{{ $bien->users->nom }}</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Prénom</span> </p></td>
      <td><p><span class="spand">{{ $bien->users->prenom }}</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Adresse</span> </p></td>
      <td><p><span class="spand">{{ $bien->users->adresse}}</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Email</span> </p></td>
      <td><p><span class="spand" style="text-transform:none;">{{ $bien->users->email }}</span></p></td>
    </tr>
    <tr>
      <td><p><span class="spant">Téléphone</span> </p></td>
      <td><p><span class="spand">{{ $bien->users->tel }}</span></p></td>
    </tr>
  </table>
 </div>

@if (count($images) > 0)
<div class="galerie">
  @foreach ($images as $i)
    <img class="imagegalerie" src="{{ url('clients/images_biens',$i->image) }}">
  @endforeach
</div>
@endif


</div>


@endsection

<style>

.container{
  background-color: #fff;
padding: 25px 30px 25px 30px ;
border-radius: 5px;
margin-top: 150px;
margin-left: auto;
margin-right: auto;;
display: flex;
flex-wrap: wrap;
}

.imagebien {
  width: 400px;
  height: 500px;
  margin: 15px 15px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 5px 15px slategray;


}

div.details{
  width:300px;
  border-radius: 5px;
  margin: 10px 80px ;
  height:300px;
}

.galerie{
  width: 100%;
  display: flex;
  flex-wrap: wrap;
}

.imagegalerie{
  width: 200px;
  height: 150px;
  margin: 15px 15px;
  border-radius: 5px;
  box-shadow: 0 5px 15px slategray;
}



.spant{
  color: slategray;
  font-size: 25px; 
  margin-left: 20px;
  text-transform: capitalize;
}

.spand{
  margin-left: 40px;
  font-size: 20px;
  text-transform: capitalize;
}


</style>