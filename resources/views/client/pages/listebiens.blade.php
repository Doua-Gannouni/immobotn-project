@extends('client.layouts.master')

@section('contenu')
<div class="container">
   <table>
      <div class="title">Mes biens</div>
      @if ($message = Session::get('msg'))
        <div class="alert" Style="color: green;">{{ $message }} </div>
      @endif
   
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Titre</th>
          <th scope="col">Prix</th>
          <th scope="col">Surface</th>
          <th scope="col">Largeur</th>
          <th scope="col">Longueur</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
         @foreach ( $biens as $bien)
        <tr>
          <td><img id="imgB" src="{{ url('clients/images_biens',$bien->image) }}"  width="50px" height="50px" ></td>
          <th scope="row">{{ $bien->titre }}</th>
          <td>{{ $bien->prix }} <span style='color:slategray;'>TND</span></td>
          <td>{{ $bien->surface }}</td>
          <td>{{ $bien->largeur }}</td>
          <td>{{ $bien->longueur }}</td>
          <td><button title="Modifier" class="btn" style="background-color: transparent;"><a id="a" href="{{ route('bien.edit' ,$bien->id) }}"><i class="fas fa-edit" style='font-size:20px;color:green'></i></a></button></td>
          <form action="{{ route('bien.destroy', $bien->id)}}" method="POST" >
            @csrf
            @method('delete')
          <td><button title="Supprimer" class="btn"><i class="fa fa-trash" style='font-size:20px;color:red'></i></button></td>
        </form>

          <td><a href="{{ route('detailsbien',$bien->id) }}"><button title="Details" class="btn"><i class="fa fa-eye" style='font-size:20px;color:slategray'></i></button></a></td>

        </tr>
        @endforeach
      </tbody>
      
    </table>
</div>    
@endsection

<style>
.container{
background-color: #fff;
padding: 25px 30px;
border-radius: 5px;
margin-top: 150px;
margin-left:auto;
margin-right: auto;
text-align: center;
}

.container .title{
font-size: 30px;
font-weight: 500;
}


table {
  table-layout: fixed;
  width: 1200px;
  margin-top: 20px;
  text-align: center;
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;

}

thead th:nth-child(1) {
  width: 35%;
  background-color: #177d85;
}

thead th:nth-child(2) {
  width: 35%;
  background-color: #177d85;
}

thead th:nth-child(3) {
  width: 35%;
  background-color: #177d85;
}

thead th:nth-child(4) {
  width: 35%;
  background-color: #177d85;
}
thead th:nth-child(5) {
  width: 35%;
  background-color: #177d85;
}
thead th:nth-child(6) {
  width: 35%;
  background-color: #177d85;
}
thead th:nth-child(7) {
  width: 20%;
  background-color: #177d85;
}
thead th:nth-child(8) {
  width: 20%;
  background-color: #177d85;
}

thead th:nth-child(9) {
  width: 20%;
  background-color: #177d85;
}

th, td {
  padding: 1em;
  background: white;
  border-bottom: 2px solid #177d85; 
}

.btn{
   border: none;
   background-color: transparent;
  cursor: pointer;

}


th{
  font-size: 20px;
}

#imgB{
   border-radius: 5px;
}





</style>
