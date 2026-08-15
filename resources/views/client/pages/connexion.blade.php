@extends('client.layouts.master')

@section('contenu')

<div class="container">
  <div class="title">Se Connecter</div>
  <div class="content">
    @if ($message = Session::get('message1'))
    <div class="alert" Style="color: red;">{{ $message }} </div>
  @endif
    <form action="{{  route('postconnexion') }}" method="POST">
      @csrf
      <div class="user-details">
       
        <div class="input-box">
          <span class="details">Email</span>
          <input name="email" type="email" name="email" placeholder="Tapez votre Email" required>
        </div>
       
        <div class="input-box">
          <span class="details">Mot de passe</span>
          <input name = "password" type="password" name="password" placeholder="Tapez votre Mot de passe" required>
        </div>

        <div class="input-box">
          <span class="details">Vous êtes professionnel ou client ?</span>
          <div>
          <select  style="width:calc(200% + 40px);" id="role">
            <option label ="client">Client</option>
            <option label="professionnel" >Professionnel</option>
          </select>
          </div>
        </div>


      </div>
      <div class="button">
        <input name="connexionButton" type="submit" value="Se connecter">
        
      </div>
    </form>
  </div>
</div>
@endsection


<style>




.container{

background-color: #fff;
padding: 25px 30px;
border-radius: 5px;
align-items: center;
margin-top: 150px;
margin-left:auto;
margin-right: auto;
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
 margin: 20px 0
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