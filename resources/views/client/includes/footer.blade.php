<footer>
    <div class="footer-contenu">
     <div class="bloc bloc-1">
        <div class ="titre">
   <span style="--i:1">I</span>
   <span style="--i:3">M</span>
   <span style="--i:4">M</span>
   <span style="--i:5">O</span>
   <span style="--i:6">B</span>
   <span style="--i:7">O</span>
   <span style="--i:8">T</span>
   <span style="--i:9">N</span>
        </div>
         
         <p>Plateforme web pour la mise en relation entre les clients et les professionnels dans le domaine de l’immobilière en Tunisie.</p>
         
        
        
        </div>

         <div class="bloc bloc-2">
             <img class="img-footer" src="{{ asset('clients/logo.png') }}" >
             

         </div>
    </div>

    <div class="footer-bottom" >
      <p style="font-size: 10px;color:white;"> Développé par &nbsp; :  &nbsp;&nbsp; GANNOUNI DOUA <a href="" style="color: white;" > </a></p>
    </div>
  
</footer>

<style>

.titre span{
    
  position: relative;
  display: inline-block;
  color: black;
  text-transform: uppercase;
  font-size: 35px;
  animation: titre 3s infinite;
  animation-delay: calc(.1s * var(--i));
}

@keyframes titre {
  0%,40%,100% {
    transform: translateY(0)
  }
  20% {
    transform: translateY(-20px)
  }

</style>