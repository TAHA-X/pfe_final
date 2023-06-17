



@extends("layout.main")

@section("title")
   afficher responsable
@endsection

@section("title_page")
   <h2>afficher responsable</h2>
@endsection
@section("body")
  <a href="{{ Route('responsables.email') }}" style="font-size:16px;" class="btn btn-secondary m-1"><i class="bi bi-envelope"> Envoyer Message</i></a>
  <div class="table-responsive mt-2">
    <table id="responsables" class="table">
        <thead>
            <tr>
                <th>image</th>
                <th>nom</th>
                <th>prénom</th>
                <th>email</th>
                <th>phone</th>
                <th>résidence</th>
                <th>date création</th>
                <th>date modification</th>
                @if(auth()->user()->status=="directeur")
                   <th>actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
                <tr>
                    <td>
                        @if($user->img==null)
                            <img style="width:80px; height:80px; border-radius:7px;" src="{{ asset('assets/img/defaultProfile.png')}}"/>
                        @else
                            <img style="width:80px; height:80px; border-radius:7px;" src="{{ $user->img }}"/>
                        @endif
                    </td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                         @if($user->Residence)
                                <a style="text-decoration:none;" href="{{ Route('residences.edit',$user->Residence->id) }}" class="badge text-white bg-primary">{{ $user->Residence->title }}</a>
                        @else
                                <span class="badge bg-dark">rien</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        @if($user->created_at==$user->updated_at)
                           pas de modification
                        @else
                           {{ $user->updated_at }}
                        @endif
                    </td>
                    @if(auth()->user()->status=="directeur")
                        <td>
                            <a style="font-size:16px;" class="btn btn-primary m-1" href="{{ Route('responsable.edit',$user->id)  }}"><i class="bi bi-pen"></i></a>
                            <a onclick="return confirm('vous voulez vraiment supprimer ce responsable')" style="font-size:16px;" class="btn btn-danger m-1" href="{{ Route('responsable.delete',$user->id) }}"><i class="bi bi-trash"></i></a>
                        </td>
                    @endif
                </tr>
        @endforeach
    </tbody>
    </table>
  </div>
@endsection

@if (session("ajouter"))
<div style="position:absolute;  bottom:12px; right:12px;" id="ajouter" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
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
<div style="position:absolute;  bottom:12px; right:12px;" id="ajouter" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
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
<div  style="position:absolute;  bottom:12px; right:12px;"  id="supprimer" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
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
<div  style="position:fixed; bottom:12px; right:12px;"  id="modifier" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-primary"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("modifier") }}
   </div>
</div>
@endif

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

$(document).ready( function () {
    $('#responsables').DataTable();
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

const warning = document.getElementById('warning')
if (warning) {
    const toast = new bootstrap.Toast(warning)
    toast.show()
}
@endsection
