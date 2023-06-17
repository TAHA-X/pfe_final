@extends("layout.main")

@section("title")
   afficher achats
@endsection

@section("title_page")
   <h2>afficher achats</h2>
@endsection
@section("body")

  <div class="table-responsive">
    <table id="achats" class="table text-center">
        <thead>
            <tr>
                <th>prénom</th>
                <th>nom</th>
                <th>projet</th>
                <th>résidence</th>
                <th>immeuble</th>
                <th>appartement</th>
                <th>date achat</th>
                <th>date modification</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achats as $achat)
                <tr>
                    <td>{{ $achat->client->prénom }}</td>
                    <td>{{ $achat->client->nom }}</td>
                    <td>{{ $achat->projet->title }}</td>
                    <td>{{ $achat->residence->title }}</td>
                    <td>num : {{ $achat->immeuble->num }} | ent : {{ $achat->immeuble->entrée }}</td>
                    <td>{{ $achat->appartement->num }}</td>
                    <td>{{ $achat->created_at}}</td>
                    <td>
                        @if($achat->created_at==$achat->updated_at)
                             pas de modification
                        @else
                            {{ $achat->updated_at }}
                        @endif
                    </td>
                    <td>
                        <a style="font-size:16px;" href="{{ Route('achats.edit',$achat->id) }}" class="btn btn-primary m-1"><i class="bi bi-pen"></i></a>
                        <a onclick="return confirm('vous voulez vraiment supprimer ce client')" href="{{ Route('achats.delete',$achat->id) }}" style="font-size:16px;"  class="btn btn-danger m-1" ><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>



@endsection

@if (session("ajouter"))
<div style="position:fixed; bottom:12px; right:12px;"  id="ajouter" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
    <div style="width:30px; height:30px; border-radius:3px;" class="bg-success"></div>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    {{ session("ajouter") }}
    </div>
</div>
@endif

@if (session("supprimer"))
<div style="position:fixed; bottom:12px; right:12px;" id="supprimer" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-danger"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("supprimer") }}
   </div>
</div>
@endif

@if (session("modifier"))
<div style="position:fixed; bottom:12px; right:12px;"  id="modifier" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-primary"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("modifier") }}
   </div>
</div>
@endif

@section("cssCode")

@endsection

@section("script")

$(document).ready( function () {
    $('#achats').DataTable();
});

const ajouter = document.getElementById('ajouter')
if (ajouter) {
    const toast = new bootstrap.Toast(ajouter)
    toast.show()
}

const supprimer = document.getElementById('supprimer')
if (supprimer) {
    const toast = new bootstrap.Toast(supprimer)
    toast.show()
}

const modifier = document.getElementById('modifier')
if (modifier) {
    const toast = new bootstrap.Toast(modifier)
    toast.show()
}
@endsection
