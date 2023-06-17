@extends("layout.main")

@section("title")
   ajouter projet
@endsection

@section("title_page")
   ajouter projet
@endsection

@section("body")

    <form enctype="multipart/form-data" action="{{ Route('projets.store') }}" method="post">
        @csrf
        <div class="mt-2">
            <label class="form-label" for="titre">titre :</label>
            <input value="{{ old('title') }}" class="form-control @error('title') is-invalid  @enderror" id="title" name="title"/>
        </div>
        @error("title")
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="adresse">adresse :</label>
            <input value="{{ old('adresse') }}" id="adresse" class="form-control @error('adresse') is-invalid  @enderror" name="adresse"/>
        </div>
        @error("adresse")
           <span class="text-danger">{{ $message }}</span>
        @enderror


        <div class="mt-2">
            <button class="btn btn-danger" type="submit">ajouter</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>

    </form>

@endsection

@section("cssCode")

@endsection
