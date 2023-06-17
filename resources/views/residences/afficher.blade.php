@extends("layout.main")

@section("title")
   afficher residences
@endsection

@section("title_page")
   <h2>afficher residences</h2>
@endsection
@section("body")

  <div class="table-responsive">
    <table id="projets" class="table">
        <thead>
            <tr>
                <th>titre</th>
                <th>adresse</th>
                <th>projet</th>
                <th>résponsable</th>
                <th>date création</th>
                <th>date modification</th>
                @if(auth()->user()->status=="directeur")
                   <th>actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if(count($residences)>0)
            @foreach ($residences as $residence)
                        <td>{{ $residence->title }}</td>
                        <td>{{ $residence->adresse }}</td>
                        <td>{{ $residence->projet->title }}</td>
                        <td>{{ $residence->user->prenom }} {{ $residence->user->nom }}</td>
                        <td>{{ $residence->created_at }}</td>
                        <td>
                            @if($residence->created_at==$residence->updated_at)
                                  pas de modification
                            @else
                               {{ $residence->updated_at }}
                            @endif
                        </td>
                        @if(auth()->user()->status=="directeur")
                            <td>
                                <a style="font-size:16px;" class="btn btn-primary m-1" href="{{ Route('residences.edit',$residence->id)  }}"><i class="bi bi-pen"></i></a>
                                <a onclick="return confirm('vous voulez vraiment supprimer ce responsable')" style="font-size:16px;" class="btn btn-danger m-1" href="{{ Route('residences.delete',$residence->id)  }}"><i class="bi bi-trash"></i></a>
                            </td>
                        @endif
                    </tr>
            @endforeach
            @endif
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
    $('#projets').DataTable();
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
