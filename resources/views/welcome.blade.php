@extends("template")

@section("titre")
    home page
@endsection
<section class="section section1">
    <header class="shadow">
        <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
        <nav>
            <ul>
                <li class="active"><a class="link_nav" href="{{ url('/') }}">Home</a></li>
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
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
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
                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> 
      
      @if($settings_home_page->img1!=null)
        <div class="section1_content">
            <img src="{{ $settings_home_page->img1 }}"/>
            <div>
                <span class="title">Créativité</span>
                <h2 class="description">C'est notre signature</h2>
                <a class="link_projets" href="{{ url('/allResidences') }}"><span>Découvrir nos projets</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
      @endif
    
      @if($settings_home_page->img2!=null)
        <div class="section1_content">
            <img src="{{ $settings_home_page->img2 }}"/>
            <div>
                <span class="title">Excellence</span>
                <h2 class="description">C'est notre norme</h2>
                <a class="link_projets" href="{{ url('/allResidences') }}"><span>Découvrir nos projets</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
      @endif
    
      @if($settings_home_page->img3!=null)
        <div class="section1_content">
            <img src="{{ $settings_home_page->img3 }}"/>
            <div>
                <span class="title">Confiance</span>
                <h2 class="description">C'est notre logo</h2>
                <a class="link_projets"  href="{{ url('/allResidences') }}"><span>Découvrir nos projets</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
      @endif
    </nav>
</section>
@section("contenu")
    

<section class="section section2">
    <div class="left">
        <div class="title_paragraph"><div class="circle"></div> who we are</div>
       <p style="text-align:justify;"> Achorouk Group occupe une position cruciale dans le secteur de l'immobilier et d
        u logement en tant que constructeur de complexes résidentiels répondant aux exigences
         élevées des acheteurs cherchant des logements de qualité supérieure. Le groupe sélectionne
          soigneusement des emplacements favorables aux résidents et s'engage à améliorer en permanen
          ce ses services pour atteindre les normes qui répondent à leurs attentes. Cette approche té
          moigne de l'engagement de Shorouk Group envers l'excellence, ainsi que de son désir constant
           de s'adapter aux évolutions du marché immobilier
       </p>
        <a href="contact.html">Contacter nous</a>
    </div>
    <div class="right">
          <img src="{{ asset('assets/imgsInterface/about.jpg') }}" />
          <img  src="{{ asset('assets/imgsInterface/family2.jpg') }}">
    </div>
</section>

<section class="section section3">    
    <i id="close_video" class="bi bi-x-lg"></i>
    <iframe id="video" src='{{ $settings_home_page->video }}' ></iframe>
     <div class="box">
        <div class="title_paragraph"><div class="circle"></div> comment faire un tour</div> <br>
        <h2>visitez une des nous appartements en ligne</h2> <br>
        <div id="youtube_video" class="youtube_video">
            <div class="icon shadow"></div>
            <span>Play Video</span>
        </div>
     </div>
</section>




@endsection

