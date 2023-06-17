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
                <li><a class="link_nav" href="{{ url('/allResidences') }}">Projet</a></li>
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
                <span class="title">Innovation</span>
                <h2 class="description">c'est notre but & notre facon</h2>
                <a class="link_projets" href="{{ url('/allResidences') }}"><span>Découvrir nos projet</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
      @endif
    
      @if($settings_home_page->img2!=null)
        <div class="section1_content">
            <img src="{{ $settings_home_page->img2 }}"/>
            <div>
                <span class="title">Confort</span>
                <h2 class="description">Votre confort est notre priorité</h2>
                <a class="link_projets" href="{{ url('/allResidences') }}"><span>Découvrir nos projet</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
      @endif
    
      @if($settings_home_page->img3!=null)
        <div class="section1_content">
            <img src="{{ $settings_home_page->img3 }}"/>
            <div>
                <span class="title">Responsabilité</span>
                <h2 class="description">Votre confort est notre responsabilité</h2>
                <a class="link_projets"  href="{{ url('/allResidences') }}"><span>Découvrir nos projet</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
      @endif
    </nav>
</section>
@section("contenu")
    

<section class="section section2">
    <div class="left">
        <div class="title_paragraph"><div class="circle"></div> who we are</div>
        <p>
            Building when an unknown printer took a galley of type and scram bled it to make 
            a type specimen book.
            It has survived not only five centuries, but also the leape.
        </p>
        <p>
            Building when an unknown printer took a galley of type and scram bled it to make 
            a type specimen book.
            It has survived not only five centuries, but also the leape.
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

