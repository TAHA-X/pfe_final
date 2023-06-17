@extends("layout.main")

@section("title")
   settings projets
@endsection
@section("title_page")
   <h2>les paramétres - projets</h2>
@endsection

@section("body")
    <a class="btn btn-primary" href="{{ route('settingsProjets.ajouter') }}"><i class="bi bi-plus-lg"></i> ajouter</a>
    <div class="table-responsive mt-2">
        <table id="responsables" class="table">
            <thead>
                <tr>
                    <th>img</th>
                    <th>titre</th>
                    <th>ville</th>
                    <th>responsable</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>adress</th>
                    <th>plan</th>
                    <th>date création</th>
                    <th>date modification</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings_projets as $projet)
                <tr>
                    <th><img style="width:60px; height:60px;" src="{{ $projet->img }}" alt=""></th>
                    <th>{{ $projet->title }}</th>
                    <th>{{ $projet->ville }}</th>
                    <th>{{ $projet->Residence->user->prenom }} <br> {{ $projet->Residence->user->nom }}</th>
                    <th>{{ $projet->InformationProjet->email }}</th>
                    <th>{{ $projet->InformationProjet->phone }}</th>
                    <th>{{ $projet->InformationProjet->adress }}</th>
                    <th style="min-width:70px;">
                        ch : {{ $projet->PlanProjet->chambre }} <br>
                        sa : {{ $projet->PlanProjet->salon }} <br>
                        sb : {{ $projet->PlanProjet->sall_bain }} <br>
                        cu : {{ $projet->PlanProjet->cuisine }} <br>
                        ba : {{ $projet->PlanProjet->balcon }} <br>

                    </th>
                    <th>{{ $projet->created_at }}</th>
                    <th>
                          @if($projet->updated_at==$projet->created_at)
                                  pas de modification
                          @else
                                  {{ $projet->updated_at }}
                          @endif
                    </th>
                    <th>
                          <a href="{{ route('settingsProjets.edit',$projet->id) }}"  style="font-size:16px;" class="btn btn-primary m-1" ><i class="bi bi-pen"></i></a>
                          <a onclick="return confirm('vous voulez vraiment supprimer ce responsable')" href="{{ route('settingsProjets.supprimer',$projet->id) }}" style="font-size:16px;" class="btn btn-danger m-1"><i class="bi bi-trash"></i></a>
                    </th>
                </tr>
            @endforeach
            </tbody>
    </div>
@endsection


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

@if (session("supprimer"))
<div style="position:fixed; bottom:12px; right:12px;"  id="supprimer" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-danger"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("supprimer") }}
   </div>
</div>
@endif

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


@section("cssCode")

@endsection

@section("script")
const modifier = document.getElementById('modifier')
if (modifier) {
    const toast = new bootstrap.Toast(modifier)
    toast.show()
}

const supprimer = document.getElementById('supprimer')
if (supprimer) {
    const toast = new bootstrap.Toast(supprimer)
    toast.show()
}

const ajouter = document.getElementById('ajouter')
if (ajouter) {
    const toast = new bootstrap.Toast(ajouter)
    toast.show()
}

@endsection
