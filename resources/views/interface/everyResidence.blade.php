
@extends("template")
@section("titre")
    dari
@endsection
<section class="section section1_contact">
   <header class="shadow">
      <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
      <nav>
          <ul>
              <li><a class="link_nav" href="{{ url('/') }}">Home</a></li>
              <li><a class="link_nav" href="{{ url('/about') }}">About</a></li>
              <li class="active"><a class="link_nav" href="{{ url('/allResidences') }}">Projets</a></li>
              <li><a class="link_nav" href="{{ url('/guide') }}">Guide</a></li>
          </ul>
          <a  href="{{ url('/contact') }}"><button id="contactBtn">Contacter <i class="bi bi-arrow-right"></i></button></a>
      </nav>
  </header>
  <nav id="header_responsive" style="background-color: #ffffff !important;" class="navbar shadow navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span  class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/allResidences') }}">Projets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/guide') }}">Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
   <h1 class="title_page_projet">Appartements économiques - {{$projet->title}} </h1>
</section>
@if(session("ajouter"))
   <div style="z-index:200; position:fixed; top:50%; left:50%; transform:translate(-50%)" id="message" class="alert text-center w-75 alert-success">{{ session("ajouter") }}</div>
@endif
@section("contenu")
<section class="section section_detaills_projet">
   <div class="title_paragraph"><div class="circle"></div> présentation</div> <br>
   <p>
       {{ $projet->description }}
   </p>
   <div class="title_paragraph"><div class="circle"></div> plan</div> <br>
   <div class="d-flex justify-content-center flex-wrap gap-4">
       <div style="width:200px;" class="bg-light text-center pt-4 shadow p-3 h4 rounded-4">
           <span>{{ $projet->PlanProjet->chambre }}</span>
           <h5>chambres</h5>
       </div>
       <div style="width:200px;" class="bg-light text-center pt-4 shadow p-3 h4 rounded-4">
           <span>{{ $projet->PlanProjet->salon }}</span>
           <h5>salon</h5>
       </div>
       <div style="width:200px;" class="bg-light text-center pt-4 shadow p-3 h4 rounded-4">
           <span>{{ $projet->PlanProjet->cuisine }}</span>
           <h5>cuisine</h5>
       </div>
       <div style="width:200px;" class="bg-light text-center pt-4 shadow p-3 h4 rounded-4">
           <span>{{ $projet->PlanProjet->sall_bain }}</span>
           <h5>sall de bain</h5>
       </div>
       @if($projet->PlanProjet->balcon)
          <div style="width:200px;" class="bg-light text-center pt-4 shadow p-3 h4 rounded-4">
            <span>{{ $projet->PlanProjet->balcon }}</span>
            <h5>balcon</h5>
          </div>
       @endif
   </div>

</section>


<section class="section section_rendez_vous">
   <div class="left">
      <div  class="title_paragraph"><div class="circle"></div> informations</div> 
      <p>nous serons contents de repondre vos questions , n'hesidte pas de nous contacter ou visiter nos agences</p>
      <div class="box_info">
          <i class="bi icon_title bi-geo-alt"></i>
          <div>
              <span class="title_box_info">Localisation</span> <br> 
              <strong>{{ $projet->InformationProjet->adress }}</strong>
          </div>
      </div>
      <div class="box_info">
          <i class="bi icon_title bi-telephone"></i>
          <div>
              <span class="title_box_info">Appel</span> <br> 
              <strong>+212 {{ $projet->InformationProjet->phone }}</strong>
          </div>
      </div>
      <div class="box_info">
          <i class="bi icon_title bi-envelope"></i>
          <div>
              <span class="title_box_info">Email</span> <br> 
              <strong>{{ $projet->InformationProjet->email }}</strong>

          </div>
      </div>

   </div>
   <div class="right shadow-lg">
       <form method="post" action="{{ route('rendezVous.ajouter',$projet->id) }}">
           @csrf
          <strong>Rendez-vous</strong>
          <div class="inputs">
              <div>
                  <label for="name">Nom et Prenom *</label>
                  <input value="{{ old('nom') }}" id="nom" name="nom" type="text">
                  @error("nom")
          <span class="text-danger mt-1">{{$message}}</span>
    @enderror
              </div>
              <div>
                  <label for="name">Phone *</label>
                  <input value="{{ old('phone') }}" id="phone" name="phone" type="text">
                  @error("phone")
                  <span class="text-danger mt-1">{{$message}}</span>
            @enderror
              </div>
          </div>
          <div>
              <label for="sujet">Sujet *</label>
              <input value="{{ old('sujet') }}" id="sujet" name="sujet" type="text">
              @error("sujet")
              <span class="text-danger mt-1">{{$message}}</span>
        @enderror
          </div>
          <button id="sendBtn">Demander</button>
       </form>
   </div>
</section>
<section class="section section_localisation_projet">
   <div class="title_paragraph"><div class="circle"></div> localisation</div> <br>

   <iframe src="{{$projet->InformationProjet->localisation}}" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>

    <script>
        setTimeout(()=>{
            document.getElementById("message").style.display = "none";
        },4000)
    </script>
@endsection

