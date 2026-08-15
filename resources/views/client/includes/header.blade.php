<header>
   

    <section class="header">
        <div class="logo" ><a  href="{{ url('/') }}"><img class="logo" src="{{ asset('clients/logo.png') }}"></a></div>
       
        
        <div class="search" >
            <form method="post" action="{{ route('rechercher') }}">
                @csrf
                <input class = "searchtxt" type="text" name="cherche" placeholder="chercher bien..." style="height: 25px;">
                <button type="submit" class="search-btn" ><i class="fa fa-search" ></i></button>
            
        </form>
           </div>
        
           
        <div class="social-btn">
            <ul>
                <li><a href="#"><i class="fab fa-facebook " style="color: #3b5998;font-size:28px;"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" style=" color: transparent;
                    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                    background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                    background-clip: text;
                    -webkit-background-clip: text;font-size:28px;"></i></a></li>
                <li><a href="#"><i class="fab fa-Linkedin" style="color: #007bb6;font-size:28px;"></i></a></li>	
            </ul>
        </div>

        <div class="btn">
            @if (Auth::guest())
                <div class="btn1"><a href="{{ route('connexion') }}"><button type="button" name = "btnc"> Connexion</button></div>
                <div class="btn2"><a href="{{ route('inscription') }}"><button type="button"> Inscription</button></a></div>
            @else
                <div class="btn1"><a href="{{ route('profil') }}"><button type="button"><i class='fas fa-user-alt'></i>&nbsp;<span style="text-transform:capitalize;">{{  Auth::user()->prenom }}</span></button></div>
                <div class="btn2"><a href="{{ route('deconnecter_client') }}"><button type="button"> Déconnexion</button></a></div>
                
            @endif
        </div>
    </section>

    <nav>
        <ul>
                 
        @if (Auth::guest() or Auth::user()->role=='Client')
            <li><a href="{{ route('index') }}"> Index</a></li>
        @elseif (Auth::user()->role=='Professionnel')
            <li><a href="{{ route('bien.index') }}"> Index</a></li>
        @endif
        <li><a href="{{ route('service') }}"> Service</a></li>
        <li><a href="{{ route('contact_admin') }}">Contact</a></li>
      
        </ul>
    </nav>
</header>

<style>
    header{
        background: fixed;
    }
    </style>