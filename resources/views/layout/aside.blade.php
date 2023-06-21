<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">
    <h2 style="font-size:35px;" id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span>chorouk</h2>
</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Projets
            </li>



            <li @if(Request::is('projets')) class="sidebar-item active" @else class="sidebar-item" @endif >
                <a class="sidebar-link" href="{{  Route('projets.index') }}">
                    <i class="bi bi-building"></i> <span class="align-middle">naviger</span>
                </a>
            </li>

            @if (auth()->user()->status=="directeur")
                <li @if(Request::is('projets/create')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link" href="{{  Route('projets.create') }}">
                        <i class="bi bi-plus-circle"></i> <span class="align-middle">ajouter</span>
                    </a>
                </li>
            @endif







            <li class="sidebar-header">
                Résidence
            </li>

            <li @if(Request::is('residences')) class="sidebar-item active" @else class="sidebar-item" @endif>
                <a class="sidebar-link" href="{{ Route('residences.index') }}">
                    <i class="bi bi-building"></i> <span class="align-middle">naviger</span>
                </a>
            </li>
            @if (auth()->user()->status=="directeur")
                <li @if(Request::is('residences/create')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link" href="{{ Route('residences.create') }}">
                        <i class="bi bi-plus-circle"></i> <span class="align-middle">ajouter</span>
                    </a>
                </li>
            @endif


            <li class="sidebar-header">
                Immeuble
            </li>

            <li @if(Request::is('immeubles')) class="sidebar-item active" @else class="sidebar-item" @endif>
                <a class="sidebar-link" href="{{ Route('immeubles.index') }}">
                    <i class="bi bi-building"></i> <span class="align-middle">naviger</span>
                </a>
            </li>

            <li @if(Request::is('immeubles/create')) class="sidebar-item active" @else class="sidebar-item" @endif>
                <a class="sidebar-link" href="{{ Route('immeubles.create') }}">
                    <i class="bi bi-plus-circle"></i> <span class="align-middle">ajouter</span>
               </a>
            </li>

            
            @if (auth()->user()->status!=="directeur")
                <li class="sidebar-header">
                    Client
                </li>

                <li @if(Request::is('clients')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link" href="{{ Route('clients.index') }}">
                        <i class="bi bi-person-circle"></i> <span class="align-middle">naviger</span>
                    </a>
                </li>

                <li @if(Request::is('clients/create')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link" href="{{ Route('clients.create') }}">
                        <i class="bi bi-plus-circle"></i> <span class="align-middle">ajouter</span>
                </a>
                </li>
            @endif
           


            <li class="sidebar-header">
                Responsables
            </li>
            <li @if(Request::is('responsable')) class="sidebar-item active" @else class="sidebar-item" @endif>
                <a class="sidebar-link" href="{{  Route('responsable.index') }}">
                    <i class="bi bi-person-circle"></i> <span class="align-middle">naviger</span>
                </a>
            </li>
            @if (auth()->user()->status=="directeur")
                <li @if(Request::is('responsable/create')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link"  href="{{  Route('responsable.create') }}">
                        <i class="bi bi-plus-circle"></i> <span class="align-middle">ajouter</span>
                </a>
                </li>
            @endif

            @if (auth()->user()->status!=="directeur")
                <li class="sidebar-header">
                    Achat
                </li>
                <li @if(Request::is('achats')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link" href="{{  Route('achats.index') }}">
                        <i class="bi bi-person-circle"></i> <span class="align-middle">naviger</span>
                    </a>
                </li>

                <li @if(Request::is('achats/create')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link"  href="{{  Route('achats.create') }}">
                        <i class="bi bi-plus-circle"></i> <span class="align-middle">ajouter</span>
                </a>
                </li>
            @endif



           

            @if (auth()->user()->status!=="directeur")
                <li class="sidebar-header">
                    Rendez-vous
                </li>

                <li @if(Request::is('rendezVous')) class="sidebar-item active" @else class="sidebar-item" @endif>
                    <a class="sidebar-link" href="{{ Route('rendezVous.index') }}">
                        <i class="bi bi-calendar-check"></i> <span class="align-middle">gérer</span>
                    </a>
                </li>
            @endif
          
{{-- 
            @if (auth()->user()->status=="directeur")
                <li class="sidebar-header">
                    Statistiques
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ Route('statistiques.index') }}">
                        <i class="bi bi-graph-up-arrow"></i> <span class="align-middle">naviger</span>
                    </a>
                </li>
@endif --}}

        @if (auth()->user()->status=="directeur")
            <li class="sidebar-header">
                Intérface
            </li>

            <li @if(Request::is('settings')) class="sidebar-item active" @else class="sidebar-item" @endif>
                <a class="sidebar-link" href="{{ Route('settings.index') }}">
                    <i class="bi bi-gear"></i> <span class="align-middle">gérer</span>
                </a>
            </li>
        @endif

        </ul>

    </div>
</nav>
