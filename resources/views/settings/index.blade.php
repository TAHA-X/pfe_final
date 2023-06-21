@extends("layout.main")

@section("title")
   settings page
@endsection

@section("title_page")
   <h2>les paramétres</h2>
@endsection

@section("body")
  <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
       <a  style="color:rgb(0, 0, 0); text-decoration:none;" href="{{ Route('settings.globale') }}">
         <div class="settings_optins" style="width:360px; border-radius:15px; display:grid; place-items:center; font-size:40px; font-family:Arial, Helvetica, sans-serif; height:300px; box-shadow:5px 5px 10px rgb(212, 212, 212),inset 3px 3px 10px rgb(235, 235, 235);">Globale</div>
       </a>
        <a style="color:rgb(0, 0, 0); text-decoration:none;" href="{{ Route('settings.homePage') }}">
            <div class="settings_optins" style="width:360px; border-radius:15px; display:grid; place-items:center; font-size:40px; font-family:Arial, Helvetica, sans-serif; height:300px; box-shadow:5px 5px 10px rgb(212, 212, 212),inset 3px 3px 10px rgb(235, 235, 235);">Home</div>
        </a>
        <a style="color:rgb(0, 0, 0); text-decoration:none;" href="{{ Route('settings.projetsPage') }}">
            <div class="settings_optins" style="width:360px; border-radius:15px; display:grid; place-items:center; font-size:40px; font-family:Arial, Helvetica, sans-serif; height:300px; box-shadow:5px 5px 10px rgb(212, 212, 212),inset 3px 3px 10px rgb(235, 235, 235);">Projets</div>
        </a>
        {{-- <a style="color:rgb(0, 0, 0); text-decoration:none;" href="{{ Route('settings.ImagesPages') }}">
            <div class="settings_optins" style="width:360px; border-radius:15px; display:grid; place-items:center; font-size:40px; font-family:Arial, Helvetica, sans-serif; height:300px; box-shadow:5px 5px 10px rgb(212, 212, 212),inset 3px 3px 10px rgb(235, 235, 235);">Img pages</div>
        </a> --}}
  </div>
@endsection

@section("cssCode")

@endsection

@section("script")


@endsection
