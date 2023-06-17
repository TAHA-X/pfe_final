@extends("layout.main")

@section("title")
   modifier clients
@endsection

@section("title_page")
   modifier clients
@endsection

@section("body")

    <form  action="{{ Route('clients.update',$client->id) }}" method="post">
        @csrf
        @method("put")
        <div class="mt-2">
            <label class="form-label" for="prénom">prénom :</label>
            <input type="text"  value="{{ $client->prénom }}" class="form-control @error('prénom') is-invalid  @enderror" id="prénom" name="prénom"/>
        </div>
        @error("prénom")
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="nom">nom :</label>
            <input type="text"  value="{{ $client->nom }}" id="nom" class="form-control @error('nom') is-invalid  @enderror" name="nom"/>
        </div>
        @error("nom")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="age">age :</label>
            <input type="number"  value="{{ $client->age }}"id="age" class="form-control @error('age') is-invalid  @enderror" name="age"/>
        </div>
        @error("age")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="phone">phone :</label>
            <input type="number"  value="{{ $client->phone }}" id="phone" class="form-control @error('phone') is-invalid  @enderror" name="phone"/>
        </div>
        @error("phone")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="email">email :</label>
            <input type="email"  value="{{ $client->email }}" id="email" class="form-control @error('email') is-invalid  @enderror" name="email"/>
        </div>
        @error("email")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="sex">sex :</label> <br/>
            <input @if($client->sex=="homme") checked @endif value="homme" id="homme" name="sex" type="radio"> <label class="form-label" for="homme">homme</label> <br/>
           <input @if($client->sex=="femme") checked @endif value="femme" id="femme" name="sex" type="radio"> <label class="form-label" for="femme">femme</label>
        </div>
       @if(auth()->user()->status=="directeur")
            <div class="mt-2">
                <label class="form-label" for="projet_id">projet :</label>
                @foreach ($projets as $projet)
                    @if($client->residence->projet->id==$projet->id)
                        <div class="bg-dark text-white p-2 m-2">{{ $projet->title }}</div>
                    @endif
                @endforeach
                <select class="form-control" id="projet_id" name="projet_id">
                    <option selected disabled>--select projet--</option>
                    @foreach ($projets as $projet)
                        <option value="{{ $projet->id }}">{{ $projet->title }}</option>
                    @endforeach
                </select>
                @error("projet_id")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">

                <label class="form-label" for="résidence_id">residence :</label>


                <div class="bg-dark text-white p-2 m-2">{{ $client->residence->title }}</div>


                <select class="form-control" id="résidence_id" name="résidence_id">
                </select>
                @error("résidence_id")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <div class="mt-2">
            <button class="btn btn-danger" type="submit">ajouter</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>

    </form>

@endsection

@if (session("warning"))
<div style="position:fixed; bottom:12px; right:12px;"  id="warning" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
    <div style="width:30px; height:30px; border-radius:3px;" class="bg-warning"></div>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    {{ session("warning") }}
    </div>
</div>
@endif

@section("cssCode")

@endsection

@section("script")
const warning = document.getElementById('warning')
if (warning) {
    const toast = new bootstrap.Toast(warning)
    toast.show()
}

$(document).ready(function(){

    // choisir la Résidence (aprés selectionner le projet)
    $('#projet_id').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#résidence_id').find('option').remove();

         // AJAX request
         $.ajax({
            url: "{{ url('résidencefilter_achat') }}"  + '/' + id,
            type: 'get',
             dataType: 'json',
             success: function(response){
                 console.log(response)
                 var len = response.length;


                 $("#résidence_id").append("<option selected disabled>--select résidence--</option>")
                 $("#immeuble_id").append("<option selected disabled>--select résidence--</option>")
                 $("#appartement_id").append("<option selected disabled>--select résidence--</option>")

                 if(len > 0){
                      // Read data and create <option >
                      for(var i=0; i<len; i++){

                           var id = response[i].id;
                           var title = response[i].title;

                           var option = "<option value='"+id+"'>"+title+"</option>";
                           $("#résidence_id").append(option);
                      }
                 }
                 else{
                    alert("ce projet n'a aucune résidence")
                 }

             }
         });
    });



})
@endsection


