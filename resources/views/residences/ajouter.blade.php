@extends("layout.main")

@section("title")
   ajouter résidence
@endsection

@section("title_page")
   ajouter résidence
@endsection

@section("body")


@if(count($filterUsers)<1 or count($projets)<1)
    <div class="alert alert-danger">vous devez avoir au minument un responsable et un projet</div>
@else
    <form enctype="multipart/form-data" action="{{ Route('residences.store') }}" method="post">
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
            <label class="form-label" for="responsable">responsable :</label>
            <select id="responsable" name="user_id" class="form-control">
                @foreach ($filterUsers as $user)
                    <option value="{{ $user->id }}">{{ $user->prenom }} {{ $user->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <label class="form-label" for="projet">projet :</label>
            <select id="projet" name="projet_id" class="form-control">
                @foreach ($projets as $projet)
                    <option value="{{ $projet->id }}">{{ $projet->title }} </option>
                @endforeach
            </select>
        </div>

        <div class="mt-2">
            <button class="btn btn-danger" type="submit">ajouter</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>
    </form>
@endif
@endsection

@section("cssCode")

@endsection
