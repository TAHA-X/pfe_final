@extends('layout.main')

@section('title')
    afficher rendez-vous
@endsection

@section('title_page')
    <h2>afficher rendez-vous</h2>
@endsection
@section('body')
    <div class="table-responsive">
        <table id="rendezVous" class="table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>phone</th>
                    <th>projet</th>
                    <th>résidence</th>
                    <th>status</th>
                    <th>date création</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rendezVous as $ren)
                    <tr>
                        <td>{{ $ren->nom }}</td>
                        <td>{{ $ren->phone }}</td>
                        <td>{{ $ren->projet->title }}</td>
                        <td>
                            @foreach ($residences as $residence)
                                @if ($residence->id == $ren->résidence_id)
                                    {{ $residence->title }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if ($ren->status == 1)
                                <a class="btn disabled btn-dark" href="{{ Route('rendezVous.enCours', $ren->id) }}">en cours</a>
                                <a class="btn  btn-success" href="{{ Route('rendezVous.realiser', $ren->id) }}">realisé</a>
                                <a class="btn  btn-warning" href="{{ Route('rendezVous.reporter', $ren->id) }}">reporter</a>
                                <button class="btn btn-dark"></button>
                            @endif

                            @if ($ren->status == 2)
                            <a class="btn btn-dark" href="{{ Route('rendezVous.enCours', $ren->id) }}">en cours</a>
                            <a class="btn  btn-success" href="{{ Route('rendezVous.realiser', $ren->id) }}">realisé</a>
                            <a class="btn disabled btn-warning" href="{{ Route('rendezVous.reporter', $ren->id) }}">reporter</a>
                            <div class="btn btn-warning"></div>
                            @endif 

                            @if ($ren->status == 3)
                            <a class="btn btn-dark" href="{{ Route('rendezVous.enCours', $ren->id) }}">en cours</a>
                            <a class="btn disabled btn-success" href="{{ Route('rendezVous.realiser', $ren->id) }}">realisé</a>
                            <a class="btn  btn-warning" href="{{ Route('rendezVous.reporter', $ren->id) }}">reporter</a>
                            <div class="btn btn-success"></div>
                            @endif
                        </td>
                        <td>{{ $ren->created_at }}</td>
                        <td>
                            <a onclick="return confirm('vous voulez vraiment supprimer ce responsable')"
                                href="{{ Route('rendezVous.delete', $ren->id) }}" style="font-size:16px;"
                                class="btn btn-danger m-1"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@if (session('supprimer'))
    <div style="position:fixed; bottom:12px; right:12px;" id="supprimer" class="toast" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
            <div style="width:30px; height:30px; border-radius:3px;" class="bg-danger"></div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('supprimer') }}
        </div>
    </div>
@endif


@section('cssCode')
@endsection

@section('script')
    $(document).ready( function () {
    $('#rendezVous').DataTable();
    });


    const supprimer = document.getElementById('supprimer')
    if (supprimer) {
    const toast = new bootstrap.Toast(supprimer)
    toast.show()
    }
@endsection
