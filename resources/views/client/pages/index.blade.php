@extends('client.layouts.master')

@section('contenu')
<div class="container">
  @forelse ($biens as $b)
  <div class="row">
     <div class="card">
          <img  class="bien_img" src="{{ url('clients/images_biens',$b->image) }}">
          <h5 class="bien_titre"> {{  $b->titre }} </h5>
          <p class="bien_prix"> {{  $b->prix}} TND</p>
        <div class="card_footer">

          @if(Auth::guest())
          <a href="{{ route('detailsbien',$b->id) }}"><button class="btn_bien1">Details</button></a>
          <a href="{{ route('connexion') }}" ><button class="btn_bien2">Contact</button></a>
          
          @elseif(Auth::user()->role=='Professionnel')
          <a href="{{ route('detailsbien',$b->id) }}"><button class="btn_bien1" style="margin-left: 110px;">Details</button></a>
          
          @elseif (Auth::user()->role == 'Client')
            <a href="{{ route('detailsbien',$b->id) }}"><button class="btn_bien1">Details</button></a>
            <a href="{{  route('contact',$b->id) }}"><button  class="btn_bien2" >Contact</button></a>

          
          @endif
      
      </div>
  
     </div>
  </div>
  @empty
  <p style="font-size:20px;color:slategray;">Aucun bien trouvé.</p>
  @endforelse
 
</div>

@endsection


<style>
.container {
 /* 
max-width: 700px;

width:100%;
background-color: #fff;
padding: 25px 30px;
border-radius: 5px;*/
/*align-items: center;*
margin-top: 150px;
margin-bottom: 100px;
margin-left: 50%;
  display: flex;
  flex-wrap:wrap;
  
  margin-left: 100px;
      padding-bottom : 20px;
*/

background-color: #fff;
padding: 25px;
border-radius: 5px;
margin-top: 140px;

display:flex;
flex-wrap: wrap;

margin-left: 60px;










}



.card {
 /* border:1px solid black;*/
  width: 300px;
  height: 340px;
  margin: 15px 15px;
  background-color: white;
  border-radius: 5px;
border: 1px solid #ccc;
border-bottom-width: 2px;



}

.bien_img{
  height: 200px;
  width: 300px;
  border-top-right-radius: 5px;
  border-top-left-radius : 5px;
  
}

.bien_titre {
    text-align: center;
    font-size: 15px;
    text-transform: capitalize;
    margin-bottom: 2px;
}

.bien_prix{
  margin-left: 4px;
  color:gray;
  margin-bottom: 2px;
}

.btn_bien1  , .btn_bien2{
  margin-top: 10px;
  text-align: center; 
  border-radius: 5px;
  color: white;
  height: 25px;
  width: 80px;
 

}

.btn_bien1:hover  , .btn_bien2:hover{
  cursor: pointer;
  color:black;
}

.btn_bien1{
  margin-left: 70px;
  background-color: #177d85;
  border-color: #177d85;
  margin-right: 5px;
  
}

.btn_bien2{
  background-color: slategray;
  border-color: slategray;
  

}

.card:hover{
  box-shadow: 0 5px 15px slategray;
}

/*form{
  display: inline-block;
}*/

.card_footer {
  height: 20px;
  margin-top: 20px;
  border-top: 1px solid #ccc;
  border-top-width: 2px;
}


@media screen and (max-width: 600px) {
  .container {
    display: block;
    margin-bottom: 5px;
    align-items: center;
    margin-left: 20px;

  }
}

</style>