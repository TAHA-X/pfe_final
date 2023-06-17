@extends("layout.main")

@section("title")
   verification de compte
@endsection

@section("title_page")
   verification de compte
@endsection

@section("body")
     @if(session("error"))
          <div class="alert alert-danger">{{ session("error") }}</div>
     @endif
    <form enctype="multipart/form-data" action="{{ Route('profile.edit') }}" method="post">
        @csrf
        <div class="mt-2">
            <label class="form-label" for="email">email :</label>
            <input value="{{ old('email') }}" class="form-control @error('email') is-invalid  @enderror" id="email" name="email"/>
        </div>
        @error("email")
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="password">password :</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid  @enderror" name="password"/>
        </div>
        @error("password")
           <span class="text-danger">{{ $message }}</span>
        @enderror


        <div class="mt-2">
            <button class="btn btn-primary" type="submit">valider</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>

    </form>

@endsection

@section("cssCode")

@endsection
