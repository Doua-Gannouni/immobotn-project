@extends('client.layouts.master')

@section('contenu')
<div class="container">
      <div class="title">Mes demandes</div>
      @if ($message = Session::get('msg'))
        <div class="alert" Style="color: green;">{{ $message }} </div>
      @endif
   <table>
   
      <thead>
        <tr>
          <th scope="col">Bien</th>
          <th scope="col">Prix</th>
          <th scope="col">Surface</th>
          <th scope="col">Client</th>
          <th scope="col">Email</th>
          <th scope="col">Date</th>




          
          
        </tr>
      </thead>
      <tbody>
         @foreach ( $demande as $d)
        <tr>
          <td>{{ $d->biens->titre }}</td>
          <td >{{ $d->biens->prix }} <span style="color:slategray;">TND</span></td>
          <td>{{ $d->biens->surface }}</td>
          <td>{{ $d->clients->nom }}&nbsp;{{ $d->clients->prenom }}</td> 
          <td>{{ $d->clients->email }}</td>
          <td>{{ $d->created_at }}</td>    
          
          
          
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