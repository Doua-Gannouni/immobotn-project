@extends('client.layouts.master')

@section('contenu')

<div class="container">
  <div class="title">Modifier bien : <span style="color: #177d85"> {{ $bien->titre }} </span> </div>
  
  <div class="content">
    @if ($message = Session::get('msg'))
    <div class="alert" Style="color: green;">{{ $message }} </div>
  @endif
    <form action="{{ route('bien.update' , $bien->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="user-details">
        <div class="input-box">
          <span class="details">Titre</span>
          <input  name="titre" value="{{ $bien->titre }}" >
          @error('titre')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Prix</span>
          <input  name = "prix" value="{{ $bien->prix }}" >
          @error('prix')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">surface</span>
          <input  name="surface" value="{{ $bien->surface }}">
          @error('surface')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Largeur</span>
          <input  name = "largeur" value="{{ $bien->largeur }}" >
          @error('largeur')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Longueur</span>
          <input  name="longueur" value="{{ $bien->longueur }}" >
          @error('longueur')
          <div Style="color:red">
          {{ $message }}
        </div>
          @enderror
        </div>
        <div class="input-box">
          <span class="details">Image</span>
          <input type="file" name="image" >
          @error('image')
          <div Style="color:red">
          {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="button">
        <input id="btnE" type="submit" value="Modifer">
      </div>
    </form>
  </div>
</div>
</html>


<style>
#btnE{
  margin: 0px 5px;


}
.container{
max-width: 700px;
width: 100%;
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
position: relative;
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
.user-details .input-box input{
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
.user-details .input-box input:focus,
.user-details .input-box {
border-color:#177d85;
}


form .button{
 height: 45px;
 margin: 35px 0;
 display: flex;
 
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