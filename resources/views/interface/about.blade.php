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
        <h1>Taha Echchoual</h1>
        <p>
            Energy efficiency simply means using less energy to perform the same task  that is,
            eliminating energy waste. Energy efficiency brings a variety of benefits: reducing greenhouse gas emissions.
        </p>
        <img src="{{asset('assets/imgsInterface/signature.png')}}">
        <a class="link_projets text-dark" href="{{ url('/allResidences') }}"><span>Découvrir nos projet</span><i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="section3_about_right">
        <img src="{{asset('assets/imgsInterface/inner_image_01.jpg')}}" />
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
