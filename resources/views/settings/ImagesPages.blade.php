@extends("layout.main")

@section("title")
   settings images
@endsection
@section("title_page")
   <h2>les paramétres -  images pages</h2>
@endsection

@section("body")
  <form style="background:rgb(199, 199, 199); padding:15px; border-radius:10px;" enctype="multipart/form-data" action="{{ Route('settings_update_images_pages') }}" method="post">
        @csrf
        @method("put")
        <div class="mt-2">
             <img style="width:200px; height:130px;" src="{{ $settings->contactImg }}" alt="contact img">
            <label class="form-label" for="img">contact image :</label>
            <input type="file" id="img" name="contactImg"/>
        </div>

        <hr>

        <div class="mt-2">
            <img style="width:200px; height:130px;" src="{{ $settings->projetsImg }}" alt="projets img">
            <label class="form-label" for="img">projets image :</label>
            <input type="file" id="img" name="projetsImg"/>
        </div>
        <div class="mt-2">
            <button class="btn btn-success" type="submit">changer</button>
        </div>
    </form>
@endsection


@if (session("modifier"))
<div style="position:fixed; bottom:12px; right:12px;"  id="modifier" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-primary"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("modifier") }}
   </div>
</div>
@endif

@if (session("supprimer"))
<div style="position:fixed; bottom:12px; right:12px;"  id="supprimer" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-danger"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("supprimer") }}
   </div>
</div>
@endif

@if (session("ajouter"))
<div style="position:fixed; bottom:12px; right:12px;"  id="ajouter" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-success"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("ajouter") }}
   </div>
</div>
@endif


@section("cssCode")

@endsection

@section("script")
const modifier = document.getElementById('modifier')
if (modifier) {
    const toast = new bootstrap.Toast(modifier)
    toast.show()
}

const supprimer = document.getElementById('supprimer')
if (supprimer) {
    const toast = new bootstrap.Toast(supprimer)
    toast.show()
}

const ajouter = document.getElementById('ajouter')
if (ajouter) {
    const toast = new bootstrap.Toast(ajouter)
    toast.show()
}

@endsection
