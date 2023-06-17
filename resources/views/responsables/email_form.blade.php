@extends("layout.main")

@section("title")
   email responsables
@endsection

@section("title_page")
   <h2>envoyer email aux responsables</h2>
@endsection

@section("body")
<form enctype="multipart/form-data" action="{{ Route('responsables.send_email') }}" method="post">
    @csrf
    <div class="mt-2">
        <label class="form-label" for="sujet">sujet :</label>
        <input value="{{ old('sujet') }}" class="form-control @error('sujet') is-invalid  @enderror" id="sujet" name="sujet"/>
    </div>
    @error("sujet")
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="mt-2">
        <label class="form-label" for="message">message :</label>
        <textarea style="min-height:170px;" id="message" name="message" class="form-control @error('message') is-invalid  @enderror">
            {{ old('message') }}
        </textarea>
    </div>
    @error("message")
       <span class="text-danger">{{ $message }}</span>
    @enderror


    <div class="mt-2">
        <button class="btn btn-danger" type="submit">envoyer</button>
        <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
    </div>

</form>
@endsection

@section("cssCode")

@endsection

@section("script")

@endsection
