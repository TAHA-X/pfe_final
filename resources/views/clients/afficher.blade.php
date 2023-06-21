@extends("layout.main")

@section("title")
   afficher clients
@endsection

@section("title_page")
   <h2>afficher clients</h2>
@endsection
@section("body")
<a href="{{ Route('clients.Email_form') }}" style="font-size:16px;" class="btn btn-secondary m-1"><i class="bi bi-envelope"> Envoyer Message</i></a>
  <div class="table-responsive mt-2">
    <table id="clients" class="table text-center">
        <thead>
            <tr>
                <th>prénom</th>
                <th>nom</th>
                <th>age</th>
                <th>sex</th>
                <th>phone</th>
                <th>email</th>
                @if(auth()->user()->status=="directeur")
                    <th>projet</th>
                    <th>residence</th>
                @endif
                <th>date création</th>
                <th>date modification</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @if(count($clients)>0)
            @foreach ($clients as $client)
                        <td>{{ $client->prénom }}</td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->age }}</td>
                        <td>{{ $client->sex }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->email }}</td>
                        @if(auth()->user()->status=="directeur")
                            <td>{{ $client->residence->projet->title }}</td>
                            <td>{{ $client->residence->title }}</td>
                        @endif
                        <td>{{ $client->created_at }}</td>
                        <td>
                            @if($client->updated_at==$client->created_at)
                                 pas de modification
                            @else
                                 {{ $client->updated_at }}
                            @endif
                        </td>
                        <td>
                            <a onclick="return confirm('vous voulez vraiment supprimer ce client')" style="font-size:16px;" href="{{ Route('clients.delete',$client->id) }}" class="btn btn-danger m-1" ><i class="bi bi-trash"></i></a>
                            <a style="font-size:16px;" class="btn btn-primary m-1" href="{{ Route('clients.edit',$client->id)  }}"><i class="bi bi-pen"></i></a>
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

@if (session("emailSuccess"))
<div style="position:fixed; bottom:12px; right:12px;"  id="ajouter" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
    <div style="width:30px; height:30px; border-radius:3px;" class="bg-secondary"></div>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    {{ session("emailSuccess") }}
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
    $('#clients').DataTable();
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
