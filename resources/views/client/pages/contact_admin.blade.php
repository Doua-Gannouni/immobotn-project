@extends('client.layouts.master')

@section('contenu')

<div class="container">
    <div class="title" Style="text-transform: capitalize;">Contacter l'administrateur</div>
    <div class="content">
      @if(Session::has('success'))
      <div Style="color: green;">{{Session::get('success')}} </div>
      @endif

      <form action="{{ route('send_mail_admin') }}" method="POST">
        @csrf
        <div class="user-details">
          

          <div class="input-box">
            <span class="details">Titre</span>
            <input type="text" name="titre" placeholder="Titre..." value="{{ old('titre') }}">
            @error('titre')
          <div Style="color:red">
          {{ $message }}
          </div>
          @enderror
          </div>
         
          <div class="input-box">
            <span class="details">Sujet</span>
            <input type="text" name="sujet" placeholder="Sujet..." value="{{ old('sujet') }}">
            @error('sujet')
          <div Style="color:red">
          {{ $message }}
          </div>
          @enderror
          </div>

          <div class="input-box">
            <span class="details">Description</span>
            <textarea name="description" placeholder="Description..." >{{ old('description') }}</textarea>
            @error('description')
          <div Style="color:red">
          {{ $message }}
          </div>
          @enderror
          </div>
        </div>

        
        <div class="button">
          <input type="submit" value="Envoyer">
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
  margin-top: 140px;
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
  display:grid;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
  }
  form .user-details .input-box{
  margin-bottom: 15px;
  width: 758px;
  }
  form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  }
  .user-details .input-box input , textarea{
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
  .user-details .input-box input:focus, textarea:focus ,
  .user-details .input-box {
  border-color:#177d85;
  }
  
  
  form .button{
   height: 45px;
   margin: 10px 0;
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

  .content form .user-details{
    max-height: 300px;
    /*overflow-y: scroll;*/
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content {
    flex-direction: column;
  }
  }

textarea{
    height: 100px;
}
  </style>
