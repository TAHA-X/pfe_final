@extends("layout.main")

@section("title")
   ajouter responsable
@endsection

@section("title_page")
   ajouter responsables
@endsection

@section("body")
    <form enctype="multipart/form-data" action="{{ Route('responsable.store') }}" method="post">
        @csrf
        <div class="mt-2">
            <label class="form-label" for="prénom">prénom :</label>
            <input value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid  @enderror" id="prénom" name="prenom"/>
        </div>
        @error("prenom")
            <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="nom">nom :</label>
            <input value="{{ old('nom') }}" id="nom" class="form-control @error('nom') is-invalid  @enderror" name="nom"/>
        </div>
        @error("nom")
           <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="phone">phone :</label>
            <input value="{{ old('phone') }}" id="phone" type="number" class="form-control @error('phone') is-invalid  @enderror" name="phone"/>
        </div>
        @error("phone")
            <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="email">email :</label>
            <input value="{{ old('email') }}" id="email" type="email" class="form-control @error('email') is-invalid  @enderror" name="email"/>
        </div>
        @error("email")
            <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="password">password :</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid  @enderror"name="password"/>
        </div>
        @error("password")
           <span class="text-danger">{{ $message }}</span>            
        @enderror
        <div class="mt-2">
            <label class="form-label" for="image">image :</label>
            <input id="image" value="{{ old('img') }}" class="form-control" type="file" name="img"/>
        </div>
        <div class="mt-2">
            <button class="btn btn-danger" type="submit">ajouter</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>
    </form>
@endsection

@section("cssCode")

@endsection
