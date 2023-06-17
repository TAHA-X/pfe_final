


@extends("layout.main")

@section("title")
   profile
@endsection

@section("title_page")
   <h2>mon profile</h2>
@endsection

@section("body")
<div>
    {{--  @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif  --}}

        <form enctype="multipart/form-data" method="post" action="{{ Route('profile.update') }}">
            @csrf
            @method("patch")
            <div class="mb-2">
                <label for="nom" class="form-label">nom :</label>
                <input value="{{ $user->nom }}" id="nom" type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"/>
                @error("nom")
                      <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="prenom" class="form-label">prénom :</label>
                <input value="{{ $user->prenom }}" id="prenom" type="text" name="prenom" class="form-control"/>
                @error("prenom")
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="phone" class="form-label">phone :</label>
                <input value="{{ $user->phone }}" id="phone" type="text" name="phone" class="form-control"/>
                @error("phone")
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">email :</label>
                <input value="{{ $user->email }}" id="email" type="email" name="email" class="form-control"/>
                @error("email")
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">neauvau mot de pass :</label>
                <input id="password" type="password" name="password" class="form-control"/>
                @error("password")
                     <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">

                <?php
                  if(auth()->user()->img){
                    $img = auth()->user()->img;
                  }
                  else{
                    $img = null;
                  }
    
                ?>

                <img width="220" height="180"
                  @if($img)
                     src="{{ asset($img) }}"
                  @else
                     src="{{ asset('assets/img/defaultProfile.png')}}"
                  @endif /> <br/>

                  @if($img)
                     <a href="{{ Route('profile.deleleImg') }}" onclick="return confirm('voulez vous vraiment supprimer votre image ?')" type="submit" style="width:220px;" class="btn btn-dark mt-2">supprimer image</a>
                  @endif
                <br/>
                <label for="img" class="form-label mt-1">image :</label>
                <input id="img" type="file" name="img" class="form-control"/>
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">modifier</button>
                <a href="javascript:history.go(-1)" class="btn btn-light">cancel</a>
            </div>
        </form>

</div>
@endsection
@if (session("deleteImg"))
<div style="position:absolute; bottom:12px; right:12px;" id="deleteImg" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-danger"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("deleteImg") }}
   </div>
</div>
@endif

@section("cssCode")

@endsection

@section("script")
const deleteImg = document.getElementById('deleteImg')
if (deleteImg) {
    const toast = new bootstrap.Toast(deleteImg)
    toast.show()
}
@endsection
