@extends("template")
@section("titre")
    projets
@endsection
<section class="section section1_contact">
  <header class="shadow">
    <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
    <nav>
        <ul>
            <li ><a class="link_nav" href="{{ url('/') }}">Home</a></li>
            <li><a class="link_nav" href="{{ url('/about') }}">About</a></li>
            <li><a class="link_nav" href="{{ url('/allResidences') }}">Projet</a></li>
            <li class="active"><a class="link_nav" href="{{ url('/guide') }}">Guide</a></li>
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
            <a class="nav-link active" href="{{ url('/guide') }}">Guide</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> 
  <h1 class="title_page">Guide </h1>
</section>

@section("contenu")
<section class="section section2_guide">
  <div class="title_paragraph"><div class="circle"></div> comment l'achat se passe ?</div>
  <div id="paragraphs">
      <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi ullam optio at 
          placeat alias perspiciatis reprehenderit quibusdam voluptates id provident laborum a eligendi,
          dolorem facilis, praesentium sit? Ad quas officia praesentium assumenda soluta ea debitis officiis
          ipsa nemo. Iusto, quae! Qui reiciendis
          quibusdam mollitia quo, quos adipisci debitis fugiat corporis.
      </p>
      <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi ullam optio at 
          placeat alias perspiciatis reprehenderit quibusdam voluptates id provident laborum a eligendi,
          dolorem facilis, praesentium sit? Ad quas officia praesentium assumenda soluta ea debitis officiis
          ipsa nemo. Iusto, quae! Qui reiciendis
          quibusdam mollitia quo, quos adipisci debitis fugiat corporis.
      </p>
      <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi ullam optio at 
          placeat alias perspiciatis reprehenderit quibusdam voluptates id provident laborum a eligendi,
          dolorem facilis, praesentium sit? Ad quas officia praesentium assumenda soluta ea debitis officiis
          ipsa nemo. Iusto, quae! Qui reiciendis
          quibusdam mollitia quo, quos adipisci debitis fugiat corporis.
      </p>
      <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi ullam optio at 
          placeat alias perspiciatis reprehenderit quibusdam voluptates id provident laborum a eligendi,
          dolorem facilis, praesentium sit? Ad quas officia praesentium assumenda soluta ea debitis officiis
          ipsa nemo. Iusto, quae! Qui reiciendis
          quibusdam mollitia quo, quos adipisci debitis fugiat corporis.
      </p>
  </div>
</section>
@endsection
