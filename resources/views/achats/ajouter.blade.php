@extends("layout.main")

@section("title")
   ajouter achat
@endsection

@section("title_page")
   ajouter achat
@endsection

@section("body")
@if(count($appartements)<1 or count($clients)<1)
     <div class="alert alert-danger">vous devez avoir au mimument un client et un immeuble </div>
@else
    <form  action="{{ Route('achats.store') }}" method="post">
        @csrf

        <div class="mt-2">
            <label class="form-label" for="projet_id">projet :</label>
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

            <label class="form-label" for="residence_id">residence :</label>
            <select class="form-control" id="residence_id" name="residence_id">
                {{--  <option selected disabled>--select résidence--</option>  --}}
            </select>
            @error("residence_id")
                 <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mt-2">
            <label class="form-label" for="immeuble_id">immeuble :</label>
            <select class="form-control @error('immeuble_id') is-invalid @enderror" id="immeuble_id" name="immeuble_id">

                {{--  <option selected disabled>--select immeuble--</option>  --}}
            </select>
            @error("immeuble_id")
                 <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-2">
            <label class="form-label" for="appartement_id">appartement :</label>
            <select class="form-control @error('appartement_id') is-invalid @enderror" id="appartement_id" name="appartement_id">
                {{--  <option selected disabled>--select appartement--</option>  --}}
            </select>
            @error("appartement_id")
                 <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-2">
            <label class="form-label" for="client_id">client:</label>
            <select class="form-control" id="client_id" name="client_id">
                @foreach ($clients as $client)
                   <option value="{{ $client->id }}">{{ $client->prénom }} {{ $client->nom }} | {{ $client->phone }}</option>
                @endforeach
            </select>
            @error("client_id")
                 <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-2">
            <button class="btn btn-danger" type="submit">ajouter</button>
            <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
        </div>

    </form>
@endif
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
         $('#residence_id').find('option').remove();

         // AJAX request
         $.ajax({
            url: "{{ url('résidencefilter_achat') }}"  + '/' + id,
            type: 'get',
             dataType: 'json',
             success: function(response){
                 console.log(response)
                 var len = response.length;


                 $("#residence_id").append("<option selected disabled>--select résidence--</option>")
                 $("#immeuble_id").append("<option selected disabled>--select résidence--</option>")
                 $("#appartement_id").append("<option selected disabled>--select résidence--</option>")

                 if(len > 0){
                      // Read data and create <option >
                      for(var i=0; i<len; i++){

                           var id = response[i].id;
                           var title = response[i].title;

                           var option = "<option value='"+id+"'>"+title+"</option>";
                           $("#residence_id").append(option);
                      }
                 }
                 else{
                    alert("ce projet n'a aucune résidence")
                 }

             }
         });
    });

    // choisir le l'immeuble
    $('#residence_id').change(function(){

        // Department id
        var id = $(this).val();

        // Empty the dropdown
        $('#immeuble_id').find('option').remove();

        // AJAX request
        $.ajax({
           url: "{{ url('immeublefilter_achat') }}"  + '/' + id,
           type: 'get',
            dataType: 'json',
            success: function(response){
                console.log(response)
                var len = response.length;

                $("#immeuble_id").append("<option selected disabled>--select immeuble--</option>");
                $("#immeuble_id").append("<option selected disabled>--select résidence--</option>")
                $("#appartement_id").append("<option selected disabled>--select résidence--</option>")
                if(len > 0){
                     // Read data and create <option >
                     for(var i=0; i<len; i++){

                          var id = response[i].id;
                          var num = response[i].num;
                          var entrée = response[i].entrée;

                          var option = "<option value='"+id+"'>"+num+ '|' +entrée+"</option>";

                          $("#immeuble_id").append(option);
                     }
                }
                else{
                   alert("cet résidence n'a aucune immeuble")
                }

            }
        });
   });


   // choisir appartement
   $('#immeuble_id').change(function(){
    // Department id
    var id = $(this).val();

    // Empty the dropdown
    $('#appartement_id').find('option').remove();
    // AJAX request
    $.ajax({
       url: "{{ url('appartement_achat') }}"  + '/' + id,
       type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response)
            var len = response.length;
            $("#appartement_id").append("<option selected disabled>--select appartement--</option>");
            if(len > 0){
                 // Read data and create <option >
                 for(var i=0; i<len; i++){

                      var id = response[i].id;
                      var num = response[i].num;

                      var option = "<option value='"+id+"'>"+num+"</option>";

                      $("#appartement_id").append(option);
                 }
            }
            else{
                alert("s'il vous plait , ressayer autre fois");
            }


        }
    });
});
});

@endsection


