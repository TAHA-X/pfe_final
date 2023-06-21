@extends("layout.main")

@section("title")
   update résidence
@endsection

@section("title_page")
   update résidence
@endsection

@section("body")

    <form enctype="multipart/form-data" action="{{ Route('residences.update',$residence->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="mt-2">
            <label class="form-label" for="titre">titre :</label>
            <input value="{{ $residence->title }}" class="form-control @error('title') is-invalid  @enderror" id="title" name="title"/>
        </div>
        @error("title")
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="adresse">adresse :</label>
            <input value="{{ $residence->adresse }}" id="adresse" class="form-control @error('adresse') is-invalid  @enderror" name="adresse"/>
        </div>
        @error("adresse")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="adresse">responsable :</label>
            <select name="user_id" class="form-control">
                @foreach ($filterUsers as $user)
                   @if($residence->user_id==$user->id)
                      <option selected value="{{ $user->id }}">{{ $user->prenom }} {{ $user->nom }}</option>
                   @else
                      <option value="{{ $user->id }}">{{ $user->prenom }} {{ $user->nom }}</option>
                   @endif
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <label class="form-label" for="adresse">projet :</label>
            <select name="projet_id" class="form-control">
                @foreach ($projets as $projet)
                   @if($residence->projet_id==$projet->id)
                      <option  selected value="{{ $projet->id }}">{{ $projet->title }} </option>
                   @else
                       <option value="{{ $projet->id }}">{{ $projet->title }} </option>
                   @endif
                @endforeach
            </select>
        </div>

        <div class="mt-2">
            <button class="btn btn-danger" type="submit">modifier</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>
    </form>

@endsection

@section("cssCode")

@endsection
