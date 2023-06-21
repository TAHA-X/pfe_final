@extends("template")
@section("titre")
    contact
@endsection
<section class="section section1_contact">
    <header class="shadow">
        <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
        <nav>
            <ul>
                <li><a class="link_nav" href="{{ url('/') }}">Home</a></li>
                <li><a class="link_nav" href="{{ url('/about') }}">About</a></li>
                <li><a class="link_nav" href="{{ url('/allResidences') }}">Projets</a></li>
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
                <a class="nav-link" href="{{ url('/allResidences') }}">Projets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/guide') }}">Guide</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/contact') }}">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> 
    <h1 class="title_page">Contacter nous </h1>
</section>
@if(session("messageSent"))
   <div style="z-index:200; position:fixed; top:50%; left:50%; transform:translate(-50%)" id="messageSent" class="alert text-center w-75 alert-success">message est envoyé avec succès</div>
@endif
@section("contenu")
<section class="section section2_contact">
    <div class="left">
       <div  class="title_paragraph"><div class="circle"></div> informations</div> 
       <p>nous serons contents de repondre vos questions , n'hesidte pas de nous contacter ou visiter nos agences</p>
       <div class="box_info">
           <i class="bi icon_title bi-geo-alt"></i>
           <div>
               <span class="title_box_info">Localisation</span> <br> 
               <strong>131 Martens Place, Alexandra Hills, Australia.</strong>
           </div>
       </div>
       <div class="box_info">
           <i class="bi icon_title bi-telephone"></i>
           <div>
               <span class="title_box_info">Appel</span> <br> 
               <strong>+212 0678986354</strong>
           </div>
       </div>
       <div class="box_info">
           <i class="bi icon_title bi-share"></i>
           <div>
               <span class="title_box_info">Suivier nous</span> <br> 
               <div class="social_media">
                   <a href="#"><i class="bi bi-facebook"></i></a>
                   <a href="#"><i class="bi bi-instagram"></i></a>
                   <a href="#"><i class="bi bi-linkedin"></i></a>
               </div>
           </div>
       </div>

    </div>
    <div class="right shadow-lg">
        <form  method="post" action="{{ route('send_message') }}">
           @csrf
           <strong>Quik Contact</strong>
           <div class="inputs">
               <div>
                   <label for="name">Name *</label>
                   <input class="@error('nom') is-invalid @enderror" placeholder="nom" name="nom" value="{{ old('nom') }}" id="name" type="text">
                   @error("nom")
                       <span class="text-danger mt-1">{{ $message }}</span>
                   @enderror
               </div>
               <div>
                   <label for="name">Phone *</label>
                   <input value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" placeholder="phone" name="phone" type="number">
                   @error("phone")
                   <span class="text-danger mt-1">{{ $message }}</span>
                 @enderror
               </div>
           </div>
           <div>
               <label for="sujet">Sujet *</label>
               <input  value="{{ old('sujet') }}" placeholder="sujet" name="sujet" type="text">
                @error("sujet")
                  <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
           </div>
           <div>
            <label for="projet">choisir le projet qui vous intéresse *</label>
            <select class="form-control" name="projet" id="projet">
                @foreach ($SettingProjetsPage as $projet)
                   <option value="{{$projet->id}}">{{$projet->title}} - {{$projet->ville}}</option>                  
                @endforeach
            </select>
            @error("projet")
              <span class="text-danger mt-1">{{ $message }}</span>
            @enderror
           </div>
           <div>
               <label for="message">Message *</label>
               <textarea name="message" id="message" >{{ old('message') }}</textarea>
               @error("message")
               <span class="text-danger mt-1">{{ $message }}</span>
           @enderror
           </div>
           <button type="submit" id="sendBtn">Envoyer</button>
        </form>
    </div>
</section>

<section class="section section_localisation_contact">
   <div  class="title_paragraph"><div class="circle"></div> localisation</div> 
   <iframe src="{{$settings->localisation}}" width="100%" height="550" style="border:0; margin-top:25px !important;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>
<section class="section_images_about mb-5">
   <div class="title_paragraph mb-5"><div class="circle"></div> découvrir nos appartements</div>
   <div class="list_images_about">
        <img src="{{asset('assets/imgsInterface/cuisine.jpg')}}"/>
        <img style="transform:translateX(100%);" src="{{asset('assets/imgsInterface/salon.jpg')}}">
        <img src="{{asset('assets/imgsInterface/room.jpg')}}">
        <img style="transform:translateX(100%);" src="{{asset('assets/imgsInterface/balcon.jpg')}}">
   </div>
</section>
    <script>
        setTimeout(()=>{
            document.getElementById("messageSent").style.display = "none";
        },4000)
    </script>
@endsection

