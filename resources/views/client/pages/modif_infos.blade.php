@extends('client.layouts.master')

@section('contenu')

<div class="container">
  <div class="title">Modifier mes informations</div>
  <div class="content">
    <form action="{{ route('postinfos') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom</span>
          <input  name="nom"  value="{{ Auth::user()->nom }}">
          @error('nom')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Prénom</span>
          <input  name = "prenom"  value="{{ Auth::user()->prenom }}">
          @error('prenom')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input  name="email" value="{{ Auth::user()->email }}">
          @error('email')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Adresse</span>
          <input  name = "adresse"  value="{{Auth::user()->adresse}}" >
          @error('adresse')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Téléphone</span>
          <input  name="tel"  value="{{ Auth::user()->tel }}" >
          @error('tel')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Mot de passe</span>
          <input name="password" type="password" value="{{ Auth::user()->password }}" >
          @error('password')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        
        <div class="input-box">
          <span class="details">Vous etes professionnel ou client ?</span>
          <div>
          <select name="role">
            @if (Auth::user()->role=='Client')
            <option selected>{{ Auth::user()->role }}</option>
            <option>Professionnel</option>
            @else
            <option selected>{{ Auth::user()->role }}</option>
            <option>Client</option>
            @endif
          </select>
          </div>
        </div>

        <div class="input-box" >
            <span class="details">Image</span>
            <input type="file" name="image"  >
            @error('image')
            <div Style="color:red">
            {{ $message }}
            </div>
            @enderror
          </div>
      </div>

      <div class="button">
        <input type="submit" value="Modifier"> 
      </div>


    </form>
  </div>
</div>

@endsection



<style>

.container{
max-width: 700px;

background-color: #fff;
padding: 25px 30px;
border-radius: 5px;
align-items: center;
margin-top: 150px;
margin-left: auto;
  margin-right:auto;
  
}
.container .title{
font-size: 30px;
font-weight: 500;
text-align: center;
}


.content form .user-details{
display: flex;
flex-wrap: wrap;
justify-content: space-between;
margin: 20px 0 12px 0;
}
form .user-details .input-box{
margin-bottom: 15px;
width: calc(100% / 2 - 20px);
}
form .input-box span.details{
display: block;
font-weight: 500;
margin-bottom: 5px;
}
.user-details .input-box input , select{
height: 45px;
width: 100%;
outline: none;
font-size: 16px;
border-radius: 5px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
}
.user-details .input-box input:focus, select:focus 
.user-details .input-box {
border-color:#177d85;
}


form .button{
 height: 45px;
 margin: 35px 0
}
form .button input{
 height: 100%;
 width: 100%;
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
form .button input:hover{
/* transform: scale(0.99); */
background: linear-gradient(-135deg,#177d85, #708090);
}
@media(max-width: 584px){
.container{
max-width: 100%;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: 100%;
}
form .category{
  width: 100%;
}
.content form .user-details{
  max-height: 300px;
  overflow-y: scroll;
}
.user-details::-webkit-scrollbar{
  width: 5px;
}
}
@media(max-width: 459px){
.container .content .category{
  flex-direction: column;
}
}


</style>