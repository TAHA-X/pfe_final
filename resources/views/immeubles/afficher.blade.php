@extends("layout.main")

@section("title")
   afficher immeubles
@endsection

@section("title_page")
   <h2>afficher immeubles</h2>
@endsection
@section("body")

  <div class="table-responsive">
    <table id="immeublesTable" class="table text-center">
        <thead>
            <tr>
                <th>Projet</th>
                <th>Résidence</th>
                <th>adresse</th>
                <th>Numéro</th>
                <th>Entrée</th>
                <th>status</th>
                <th>appartements</th>
                <th>date création</th>
                <th>date modification</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @if(count($immeubles)>0)
            @foreach ($immeubles as $immeuble)
                        <td>{{ $immeuble->residence->projet->title }}</td>
                        <td>{{ $immeuble->residence->title }}</td>
                        <td>{{$immeuble->residence->adresse}}</td>
                        <td>{{ $immeuble->num }}</td>
                        <td>{{ $immeuble->entrée }}</td>
                        <td>
                            @if($immeuble->status=="vendu")
                               <span class="badge bg-success"> {{ $immeuble->status }} </span>
                            @else
                            <span class="badge bg-dark"> {{ $immeuble->status }} </span>

                            @endif
                        </td>
                        <td>
                            <a href="{{ Route('appartements.show',$immeuble->id) }}"><i style="font-size:40px; color:blue; cursor:pointer;"  class="bi bi-buildings-fill"></i></a>
                        </td>
                        <td>{{ $immeuble->created_at }}</td>
                        <td>
                            @if($immeuble->updated_at==$immeuble->created_at)
                                 pas de modification
                            @else
                                 {{ $immeuble->updated_at }}
                            @endif
                        </td>
                        <td>
                            <a style="font-size:16px;" class="btn btn-primary m-1" href="{{ Route('immeubles.edit',$immeuble->id)  }}"><i class="bi bi-pen"></i></a>
                            <a onclick="return confirm('vous voulez vraiment supprimer cet immeuble')" style="font-size:16px;" class="btn btn-danger m-1" href="{{ Route('immeubles.delete',$immeuble->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
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
    $('#immeublesTable').DataTable();
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
