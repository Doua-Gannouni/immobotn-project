@extends('client.layouts.master')

@section('contenu')

<div class="container">
  <div class="title">Créer un compte</div>
  @if ($message = Session::get('msg'))
  <div class="alert" Style="color: green;">{{ $message }} </div>
@endif
  <div class="content">
    <form action="{{ route('postinscription') }}" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom</span>
          <input  name="nom" placeholder="Tapez votre Nom" value="{{ @old('nom') }}">
          @error('nom')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Prénom</span>
          <input  name = "prenom" placeholder="Tapez votre Prénom" value="{{ @old('prenom') }}">
          @error('prenom')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input  name="email" placeholder="Tapez votre Email" value="{{ @old('email') }}">
          @error('email')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Adresse</span>
          <input  name = "adresse" placeholder="Tapez votre Adresse" value="{{ @old('adresse') }}" >
          @error('adresse')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Téléphone</span>
          <input  name="tel" placeholder="Tapez votre Téléphone" value="{{ @old('tel') }}" >
          @error('tel')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Mot de passe</span>
          <input type = "password" name="password" placeholder="Tapez votre Mot de passe" value="{{ @old('password') }}" >
          @error('password')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        
        <div class="input-box">
          <span class="details">Vous etes professionnel ou client ?</span>
          <div>
          <select name="role" style="cursor: pointer;">
            <option selected>Client</option>
            <option>Professionnel</option>
          </select>
          </div>
        </div>

        <div class="input-box" >
          <span class="details">Image</span>
          <input id="input_image" type="file" name="image">
          <label for="input_image"><i class ="fa fa-download" style="color: #177d85;"></i>&nbsp;&nbsp;Votre image ...</label>
         
          @error('image')
          <div Style="color:red">
          {{ $message }}
          </div>
          @enderror
        </div>

      </div>
     
      <div class="button">
        <input type="submit" value="S'inscrire"> 
      </div>

      

    </form>
  </div>
</div>

@endsection



<style>

.container{
max-width: 700px;
min-width: 200px;
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
form .input-box span.details {
display: block;
font-weight: 500;
margin-bottom: 5px;
}
.user-details .input-box input , select {
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


#input_image{
  display: none;
}

input#input_image + label{
/*  display: flex;
flex-wrap: wrap;
justify-content: space-between;*/
margin: 0px 0 10px 0;

display: block;
/*font-weight: 500;
margin-bottom: 5px;*/


padding: 12px;
width: calc(100% - 16px);
outline: none;
font-size: 16px;
border-radius: 5px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
padding-right: 0px;
font-size: 16px;
vertical-align : middle;

color: #708090;
cursor: pointer;
 
}


</style>

