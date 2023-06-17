@extends("layout.main")

@section("title")
   modifier projet
@endsection

@section("title_page")
   modifier projet
@endsection

@section("body")
<?php $check = false ?>

    <form enctype="multipart/form-data" action="{{ Route('projets.update',$projet->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="mt-2">
            <label class="form-label" for="titre">titre :</label>
            <input value="{{ $projet->title }}" class="form-control @error('title') is-invalid  @enderror" id="title" name="title"/>
        </div>
        @error("title")
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="adresse">adresse :</label>
            <input value="{{  $projet->adresse }}" id="adresse" class="form-control @error('adresse') is-invalid  @enderror" name="adresse"/>
        </div>
        @error("adresse")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        

        <div class="mt-2">
            <button class="btn btn-danger" type="submit">modifier</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>

    </form>

@endsection

@section("cssCode")

@endsection
