@extends("template")
@section("titre")
    projets
@endsection

@section("contenu")
<section class="section section1_contact">
    <header class="shadow">
        <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
        <nav>
            <ul>
                <li><a class="link_nav" href="{{ url('/') }}">Home</a></li>
                <li><a class="link_nav" href="{{ url('/about') }}">About</a></li>
                <li class="active"><a class="link_nav" href="{{ url('/allResidences') }}">Projet</a></li>
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
  
    <h1 class="title_page">Découvrir nos projets </h1>
</section>

<section class="section section_projets">
    <form class="d-flex gap-2" id="filter_form" method="post" action="{{ route('filtrer_par_ville') }}">
        @csrf
        <select id="filter_select" name="filter_ville" class="wide">
            <option selected value="">toutes les villes</option>
            <option value="casa">Casablanca</option>
            <option value="tanger">Tanger</option>
            <option value="marrakech">Marrakech</option>
            <option value="fes">Fes</option>
            <option value="El Jedida">El Jedida</option>
            <option value="Agadir">Agadir</option>
            <option value="Rabat">Rabat</option>
            <option value="Meknes">Meknes</option>
            <option value="Nador">Nador</option>
            <option value="Assila">Assila</option>
        </select>
        <button class="btn btn-dark" type="submit">filtrer</button>
    </form>
    @if(isset($villes_after_filter))
    <a class="btn btn-outline-danger" href="{{ url('allResidences') }}">annuler le filter</a>
    @endif
    <div id="list_projets">
        @if(isset($villes_after_filter))
            @foreach ($villes_after_filter as $projet)
        
                <div class="projet_card">
                    <div class="img_card">
                        <img src="{{ $projet->img }}" alt="">
                    </div>
                    <div class="content_card">
                        <span class="city">Casablanca</span>
                        <p class="title_projet">{{ $projet->title }}</p>
                        <a class="link_projet" href="{{ route('everyResidence',$projet->id) }}"><span>détaills</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
        
            @endforeach
        @else
        @foreach ($SettingProjetsPage as $projet)
                <div class="projet_card">
                    <div class="img_card">
                        <img src="{{ $projet->img }}" alt="">
                    </div>
                    <div class="content_card">
                        <span class="city">{{ $projet->ville }}</span>
                        <p class="title_projet">{{ $projet->title }}</p>
                        <a class="link_projet" href="{{ route('everyResidence',$projet->id) }}"><span>détaills</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
        @endforeach
        @endif
    </div>
    {{-- <script>
      $(document).ready(function(){

// // Department Change
// $('#filter_select').change(function(){

//      // Department id
//      var ville = $(this).val();

//      // Empty the dropdown
//      $('#residence_id').find('option').remove();

//      // AJAX request
//      $.ajax({
//         url: "{{ url('changer_ville') }}"  + '/' + ville,
//         type: 'get',
//          dataType: 'json',
//          success: function(response){
//              console.log(response)
//              var len = response.length;


//              if(len > 0){
//                   // Read data and create <option >
//                   for(var i=0; i<len; i++){

//                        var id = response[i].id;
//                        var title = response[i].title;

//                        var option = "<option value='"+id+"'>"+title+"</option>";

//                        $("#residence_id").append(option);
//                   }
//              }
//              else{
//                 alert("ce projet n'a aucune résidence")
//              }

//          }
//      });
// });
// });
    </script> --}}
</section>
@endsection

 