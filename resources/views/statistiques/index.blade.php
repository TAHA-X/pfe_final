@extends("layout.main")

@section("title")
   statistiques page
@endsection

@section("title_page")
   <h2>Acceuil page</h2>
@endsection

@section("body")
    {!!$comparaisons!!}
    <div class="mt-2 d-flex justify-content-center flex-wrap ">
        <div id="chartResidences" style="min-height: 300px; min-width:400px;"></div>
        <div id="chartProjets" style="min-height: 300px; min-width:400px; "></div>
    </div>
    <div class="mt-5 d-flex justify-content-center flex-wrap gap-3">
       @include("statistiques.tableauResidences")
       <div id="chartResidences_detaills" style="min-height: 300px; width:450px; "></div>
    </div>
    <div class="mt-5 d-flex justify-content-center flex-wrap gap-3">
      @include("statistiques.tableauRendezVous")
      <div id="chartResidences_rendez_vous" style="min-height: 300px; width:450px; "></div>
   </div>
@endsection


@section("cssCode")

@endsection

@include("statistiques.script")
