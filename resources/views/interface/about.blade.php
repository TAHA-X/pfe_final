@extends("template")
@section("titre")
    about
@endsection
<section class="section section1_contact">
  <header class="shadow">
    <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
    <nav>
        <ul>
            <li ><a class="link_nav" href="{{ url('/') }}">Home</a></li>
            <li class="active"><a class="link_nav" href="{{ url('/about') }}">About</a></li>
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
            <a class="nav-link active" href="{{ url('/about') }}">About</a>
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
  <h1 class="title_page">About </h1>
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
            moigne de l'engagement de Achorouk Group envers l'excellence, ainsi que de son désir constant
             de s'adapter aux évolutions du marché immobilier
         </p>
        <a href="{{ url('/contact') }}">Contacter nous</a>
    </div>
    <div class="right">
          <img src="{{asset('assets/imgsInterface/inner_image_01.jpg')}}" />
          <img src="{{asset('assets/imgsInterface/family2.jpg')}}" >
    </div>
</section>

<section class="section section3_about">
    <div class="section3_about_left">
        <div class="title_paragraph"><div class="circle"></div> mot du directeur</div>
        <h1>Yassine amir</h1>
        <p style="text-align:justify;">
          Nous sommes constamment engagés dans le développement de nos activités économiques, qui se concentrent sur la commercialisation de programmes de logements variés, couvrant les secteurs économique, moyen et haut de gamme. En outre, nous offrons des opportunités de terrains pour des utilisations commerciales et résidentielles.
          Notre objectif chez Achorouk Group est de proposer des offres qui tiennent compte de toutes les catégories sociales, afin de répondre aux besoins diversifiés de nos clients. Nous accordons également une grande importance à faciliter les procédures d'achat, offrant ainsi à nos clients une expérience transparente et pratique.
        </p>
        <img src="{{asset('assets/imgsInterface/signature.png')}}">
        <a class="link_projets text-dark" href="{{ url('/allResidences') }}"><span>Découvrir nos projet</span><i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="section3_about_right">
        <img src="{{asset('assets/imgsInterface/inner_team_01.jpg')}}" />
    </div>
</section>

<section class="section_images_about mb-5">
    <div class="title_paragraph mb-5"><div class="circle"></div> découvrir nos appartements</div>
    <div class="list_images_about">
         <img src="{{asset('assets/imgsInterface/cuisine.jpg')}}"/>
         <img style="transform:translateX(100%);" src="{{asset('assets/imgsInterface/salon.jpg')}}" >
         <img src="{{asset('assets/imgsInterface/room.jpg')}}">
         <img style="transform:translateX(100%);" src="{{asset('assets/imgsInterface/balcon.jpg')}}" >
    </div>
</section>

@endsection
