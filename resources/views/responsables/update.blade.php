@extends("layout.main")

@section("title")
   modifier responsable
@endsection

@section("title_page")
  modifier responsables
@endsection

@section("body")
    <form enctype="multipart/form-data" action="{{ Route('responsable.update',$user->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="mt-2">
            <label class="form-label" for="prénom">prénom :</label>
            <input value="{{ $user->prenom }}" class="form-control @error('prenom') is-invalid  @enderror" id="prénom" name="prenom"/>
        </div>
        @error("prenom")
            <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="nom">nom :</label>
            <input value="{{ $user->nom }}" id="nom" class="form-control @error('nom') is-invalid  @enderror" name="nom"/>
        </div>
        @error("nom")
           <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="phone">phone :</label>
            <input value="{{ $user->phone }}" id="phone" type="number" class="form-control @error('phone') is-invalid  @enderror" name="phone"/>
        </div>
        @error("phone")
            <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="email">email :</label>
            <input value="{{ $user->email }}" id="email" type="email" class="form-control @error('email') is-invalid  @enderror" name="email"/>
        </div>
        @error("email")
            <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="password">password :</label>
            <input id="password" type="password" class="form-control" name="password"/>
        </div>
        <div class="mt-2">
            <img style="width:150px; height:150px; border-radius:15px;" src="{{ $user->img }}"/> <br/>
            <label class="form-label mt-2" for="image">image :</label>
            <input id="image"  class="form-control" type="file" name="img"/>
        </div>
        <div class="mt-2">
            <button class="btn btn-danger" type="submit">ajouter</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>
    </form>
@endsection

@section("cssCode")

@endsection
