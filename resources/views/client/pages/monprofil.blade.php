@extends('client.layouts.master')

@section('contenu')
<div class="container">



<div class="imgd">
  <img class ="imagebien" src="{{ url('clients/images_clients',Auth::user()->image)}}">
</div>


<div class="details">
    <h1 style="font-size: 35px;color:#177d85">Mes Informations</h1>

  <table>
    <tr>
  <td><p><span id="spant">Nom</span> </p></td>
  <td><p><span id="spand">{{ Auth::user()->nom }}</span></p></td>
    </tr>
      <tr>
        <td><p><span id="spant">Prenom</span> </p></td>
        <td><p><span id="spand">{{ Auth::user()->prenom}}</span></p></td>
      </tr>
            <tr>
              <td><p><span id="spant">Email</span> </p></td>
              <td><p><span id="spand">{{Auth::user()->email}}</span></p></td>
            </tr>
                    <tr>
                        <td><p><span id="spant">Adresse</span> </p></td>
                        <td><p><span id="spand">{{Auth::user()->adresse}}</span></p></td>
                          </tr>
                          <tr>
                            <td><p><span id="spant">Téléphone</span> </p></td>
                            <td><p><span id="spand">{{Auth::user()->tel}}</span></p></td>
                              </tr>
                              <tr>
                                <td><p><span id="spant">Role</span> </p></td>
                                <td><p><span id="spand">{{Auth::user()->role}}</span></p></td>
                                  </tr>
                                     
  </table>
  <div class="button">
  <a href="{{ route('modif_infos' )}}"><button type="submit">Modifier</button></a>
  </div> 
</div>

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
  height: 400px;
  margin: 15px 15px;
  background-color: white;
  border-radius: 50%;
  box-shadow: 0 5px 15px slategray;

}

div.details{
  width:300px;
  border-radius: 5px;
  margin: 40px 80px ;
  height:300px;
}

.imagebien:hover{
  /*box-shadow: 0 5px 15px slategray;*/

}



#spant{
  color: slategray;
  font-size: 25px; 
  margin-left: 20px;
  text-transform: capitalize;
}

#spand{
  margin-left: 40px;
  font-size: 20px;
  text-transform: capitalize;
}

.button button{
    width:200px;
    margin-top:40px;
    margin-left:50px;
    height:30px;
    background-color:#177d85;
    border: #177d85 solid;
    border-radius: 5px;
    color: #fff
}

.button button:hover{
    color: black;
}
</style>