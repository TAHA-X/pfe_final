@extends("layout.main")

@section("title")
   settings projets
@endsection
@section("title_page")
   <h2>les paramétres - ajouter projet</h2>
@endsection

@section("body")
<?php $check=false; ?>
@foreach ($residences as $r)
    @if(!$r->SettingProjetsPage)
         <?php $check=true; ?>
    @endif
@endforeach

@if($check)
<form enctype="multipart/form-data" action="{{ Route('settingsProjetsAjouter') }}" method="post">
    @csrf
    <div style="display:flex; justify-content:space-between;">
        <div style="width:47%" class="mt-2">
            <label class="form-label" for="title">titre :</label>
            <input value="{{ old('title') }}" class="form-control @error('title') is-invalid  @enderror" id="title" name="title"/>
            @error("title")
                    <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:47%" class="mt-2">
            <label class="form-label" for="ville">ville :</label>
            <input value="{{ old('ville') }}" class="form-control @error('ville') is-invalid  @enderror" id="ville" name="ville"/>
            @error("ville")
               <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mt-2">
        <label class="form-label" for="img">img :</label>
        <input value="{{ old('img') }}" class="form-control" type="file" id="img" name="img"/>
    </div>
    @error("img")
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="mt-2">
        <label class="form-label" for="description">description :</label>
        <textarea id="description" style="min-height:70px; width:100% !important;" class="form-control w-100 @error('description') is-invalid  @enderror" name="description" >{{ old('description') }}</textarea>
    </div>
    @error("description")
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div style="display:flex; justify-content:space-between;" class="d-felx">
        <div style="width:32%" class="mt-2">
            <label class="form-label" for="phone">phone :</label>
            <input value="{{ old('phone') }}" id="phone" type="number" class="form-control @error('phone') is-invalid  @enderror" name="phone"/>
            @error("phone")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:32%" class="mt-2">
            <label class="form-label" for="email">email :</label>
            <input value="{{ old('email') }}" id="email" type="email" class="form-control @error('email') is-invalid  @enderror" name="email"/>
            @error("email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:32%" class="mt-2">
            <label class="form-label" for="adress">adress :</label>
            <input value="{{ old('adress') }}" id="adress" type="text" class="form-control @error('adress') is-invalid  @enderror" name="adress"/>
            @error("adress")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mt-2">
        <label class="form-label" for="localisation">localisation :</label>
        <textarea id="localisation" style="min-height:70px; width:100% !important;" class="form-control w-100 @error('localisation') is-invalid  @enderror" name="localisation" >{{ old('localisation') }}</textarea>
    </div>
    @error("localisation")
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <div style="display:flex; justify-content:space-between;" class="d-felx">
        <div style="width:19%" class="mt-2">
            <label class="form-label" for="chambre">chambre :</label>
            <input value="{{ old('chambre') }}" id="chambre" type="number" class="form-control @error('chambre') is-invalid  @enderror" name="chambre"/>
            @error("chambre")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:19%" class="mt-2">
            <label class="form-label" for="salon">salon :</label>
            <input value="{{ old('salon') }}" id="salon" type="number" class="form-control @error('salon') is-invalid  @enderror" name="salon"/>
            @error("salon")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:19%" class="mt-2">
            <label class="form-label" for="cuisine">cuisine :</label>
            <input value="{{ old('cuisine') }}" id="cuisine" type="number" class="form-control @error('cuisine') is-invalid  @enderror" name="cuisine"/>
            @error("cuisine")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:19%" class="mt-2">
            <label class="form-label" for="sall_bain">sall de bain :</label>
            <input value="{{ old('sall_bain') }}" id="sall_bain" type="number" class="form-control @error('sall_bain') is-invalid  @enderror" name="sall_bain"/>
            @error("sall_bain")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div style="width:19%" class="mt-2">
            <label class="form-label" for="balcon">balcon :</label>
            <input value="{{ old('balcon') }}" id="balcon" type="number" class="form-control @error('balcon') is-invalid  @enderror" name="balcon"/>
            @error("balcon")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-2">
        <label class="form-label" for="residence">residence :</label>
        <select id="residence" name="residence_id" class="form-control">
            @foreach ($residences as $r)
              @if(!$r->SettingProjetsPage)
                <option value="{{ $r->id }}">{{ $r->title }} | {{ $r->adresse }}</option>
              @endif
            @endforeach
        </select>
    </div>


    <div class="mt-2">
        <button class="btn btn-danger" type="submit">ajouter</button>
        <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
    </div>
</form>
@else
     <div class="alert alert-danger">vous avez besoins des résidences disponibles pour les ajouter</div>
@endif

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
