@extends("layout.main")

@section("title")
   settings globale
@endsection
@section("title_page")
   <h2>les paramétres - globale</h2>
@endsection

@section("body")
<form enctype="multipart/form-data" action="{{ Route('settingsGlobale') }}" method="post">
    @csrf
    {{-- <div class="mt-2">
        @if ($settings->logo!="")
           <img style="width:150px; height:150px;" src="{{$settings->logo}}" alt="">
        @else
           <img style="width:150px; height:150px;" src="{{ asset('assets/logo.png') }}" alt="">
        @endif
        <label class="form-label" for="logo">logo :</label>
        <input id="logo" type="file" name="logo"/>
    </div> --}}
    <div class="mt-2">
        <label class="form-label" for="reseau_sociaux">réseau sociaux :</label>
        <div id="reseau_sociaux" class="d-flex gap-3">
            <input id="facebook" value="{{ $settings->facebook }}" placeholder="facebook" class="form-control" name="facebook"/>
            <input id="instagram" value="{{ $settings->instagram }}" placeholder="instagram" class="form-control" name="instagram"/>
            <input id="linkedin" value="{{ $settings->linkedin }}" placeholder="linkedin" class="form-control" name="linkedin"/>
        </div>
    </div>
    <div class="mt-2">
        <label class="form-label" for="reseau_sociaux">informations :</label>
        <div id="reseau_sociaux" class="d-flex gap-3">
            <input id="adresse" value="{{ $settings->adresse }}" placeholder="adresse" class="form-control" name="adresse"/>
            <input id="email" value="{{ $settings->email }}" placeholder="email" class="form-control" name="email"/>
            <input id="phone" value="{{ $settings->phone }}" placeholder="phone" class="form-control" name="phone"/>
        </div>
    </div>
    <div class="mt-2">
        <label for="localisation" class="form-label" for="reseau_sociaux">localisation :</label>
        <textarea style="min-height:200px;" name="localisation" id="localisation" name="localisation"  class="form-control">
            {{ $settings->localisation }}
        </textarea>
    </div>

    <div class="mt-2">
        <button class="btn btn-danger" type="submit">modifier</button>
        <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
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



@section("cssCode")

@endsection

@section("script")
const modifier = document.getElementById('modifier')
if (modifier) {
    const toast = new bootstrap.Toast(modifier)
    toast.show()
}

@endsection
