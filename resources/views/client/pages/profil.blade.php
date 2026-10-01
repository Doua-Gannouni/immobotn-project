@extends('client.layouts.master')

@section('contenu')

<div class="container">
  <div class="title" Style="text-transform: capitalize;">{{ Auth::user()->nom  }}&nbsp;{{ Auth::user()->prenom }}</div>
  <div class="content">
    @if ($message = Session::get('msg'))
      <div class="alert" Style="color: green;text-align:center;">{{ $message }} </div>
    @endif

      
      <div class="btnPs">
        <div class="btnP"><a href="{{ route('monprofil') }}"><button type="button">Mon Profil</button></a></div>
        @if (Auth::user()->role=='Client')
          
        <div class="btnP"><a href="{{ route('demande') }}"><button type="button">Mes demandes</button></a></div>
        @else
          
        <div class="btnP"><a href="{{ route('bien.create') }}"><button type="button">Ajouter bien</button></a></div>
        <div class="btnP"><a href="{{ route('bien.index') }}"><button type="button">Liste biens</button></a></div>
        <div class="btnP"><a href="{{ route('demandes_prof') }}"><button type="button">Mes demandes</button></a></div>

          
        @endif
        
      </div>
    
  </div>
</div>


@endsection




<style>


.container{
background-color: #fff;
border-radius: 5px;
align-items: center;
margin-top: 150px;
padding: 25px 30px 25px 30px ;
margin-right: auto;
margin-left: auto;
margin-bottom: 40px;

}


.container .title{
font-size: 30px;
font-weight: 500;
position: relative;
text-align: center;
animation: color-change 1s infinite;
}

@keyframes color-change {
  0% { color: #177d85; }
  50% { color: slategray; }
 100%{color : #177d85;}
}

div.btnP button{
    padding: 0.6em 2em;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    background: linear-gradient(135deg, #177d85, #708090);
    cursor: pointer;
    border-radius: 5px;
    margin-top:10px;
    width: 200px;
    height:150px;
}

div.btnPs {
  display: flex;
  
  
}

div.btnPs button{
  margin: 0px 5px;
  margin-top: 20px;
}

div.btnP  button:hover{

 border-radius: 5px;
 border: none;
 color: #fff;
 font-size: 18px;
 font-weight: 500;
 letter-spacing: 1px;
 cursor: pointer;
 transition: all 0.3s ease;
 background: linear-gradient(135deg, #177d85, #708090);
}


div.btnP button:hover{
/* transform: scale(0.99); */
background: linear-gradient(-135deg,#177d85, #708090);
}
@media(max-width: 584px){
.container{
max-width: 100%;
}


}

</style>