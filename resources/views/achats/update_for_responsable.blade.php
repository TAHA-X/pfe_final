@extends("layout.main")

@section("title")
   modifier achat
@endsection

@section("title_page")
   modifier achat
@endsection

@section("body")
    <div style="display:flex; justify-content:space-between; flex-wrap:wrap;">

        <div class="bg-dark rounded p-2 text-white" style="width:170px; display:grid; place-items:center; height:100px;">
            @foreach ($immeubles as $immeuble)
                  @if($immeuble->id==$achat->immeuble_id)
                     <span style="font-size:20px; font-weight:bold;">num : {{ $immeuble->num }} entrée : {{ $immeuble->entrée }}</span>
                  @endif
            @endforeach
        </div>
        <div class="bg-dark rounded p-2 text-white" style="width:170px; display:grid; place-items:center; height:100px;">

            @foreach ($appartements as $appartement)
                    @if($appartement->id==$achat->appartement_id)
                    <span style="font-size:20px; font-weight:bold;">{{ $appartement->num }}</span>
                    @endif
            @endforeach


        </div>
        <div class="bg-dark rounded p-2 text-white" style="width:170px; display:grid; place-items:center; height:100px;">
            @foreach ($clients as $client)
                  @if($client->id==$achat->client_id)
                     <span style="font-size:20px; font-weight:bold;">{{ $client->prénom }} {{ $client->nom }} | {{ $client->phone }}</span>
                  @endif
            @endforeach
        </div>
    </div>
    <form  action="{{ Route('achats.update',$achat->id) }}" method="post">
        @csrf
        @method("PUT")


        <div class="mt-2">
            <label class="form-label" for="immeuble_id">immeuble :</label>
            <select class="form-control @error('immeuble_id') is-invalid @enderror" id="immeuble_id" name="immeuble_id">
                <option selected disabled>--select immeuble--</option>
                @foreach ($immeubles as $immeuble)
                    <option value="{{ $immeuble->id }}">num : {{ $immeuble->num }} | entrée : {{ $immeuble->entrée }}</option>
                @endforeach
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
            <button class="btn btn-danger" type="submit">modifier</button>
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


