@extends("layout.main")

@section("title")
   ajouter immeuble
@endsection

@section("title_page")
   ajouter immeuble
@endsection

@section("body")
@if(count($projets)<1 or count($allResidences)<1)
     <div class="alert alert-danger">vous devez avoir au mimument un projet et une résidence </div>
@else
    <form id="add-immeuble-form" enctype="multipart/form-data" action="{{ Route('immeubles.store') }}" method="post">
        @csrf
        <div class="mt-2">
            <label class="form-label" for="entrée">entrée :</label>
            <input type="number"  value="{{ old('entrée') }}" class="form-control @error('entrée') is-invalid  @enderror" id="entrée" name="entrée"/>
        </div>
        @error("entrée")
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <label class="form-label" for="num">Numéro :</label>
            <input type="number" value="{{ old('num') }}" id="num" class="form-control @error('num') is-invalid  @enderror" name="num"/>
        </div>
        @error("num")
           <span class="text-danger">{{ $message }}</span>
        @enderror
        @if(auth()->user()->status=="directeur")
            <div class="mt-2">
                <label class="form-label" for="projet_id">projet :</label>
                <select class="form-control" id="projet_id" name="projet_id">
                    @foreach ($projets as $projet)
                        <option value="{{ $projet->id }}">{{ $projet->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <label class="form-label" for="residence_id">residence :</label>
                <select class="form-control" id="residence_id" name="residence_id">
                    @foreach ($residences as $residence)
                    <option value="{{ $residence->id }}">{{ $residence->title }}</option>
                    @endforeach
                </select>
            </div>
        @endif


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

    // Department Change
    $('#projet_id').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#residence_id').find('option').remove();

         // AJAX request
         $.ajax({
            url: "{{ url('immeublefilter') }}"  + '/' + id,
            type: 'get',
             dataType: 'json',
             success: function(response){
                 console.log(response)
                 var len = response.length;


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
});
@endsection


