

<div style="min-width:45%;" class="table-responsive ">
    <table style="min-height:190px;" id="residences" class="table">
        <thead>
            <tr>
                <th>residence</th>
                <th>en cours</th>
                <th>reporté</th>
                <th>réalisé</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($residences_rendez_vous as $residence)
            @php
                $enCours = count($residence->rendez_vous()->where("status",1)->get());
                $reporté = count($residence->rendez_vous()->where("status",2)->get());
                $realisé = count($residence->rendez_vous()->where("status",3)->get());
            @endphp
                    <tr>
                        <td>{{$residence->title}}</td>
                        <td>{{$enCours}}</td>
                        <td>{{ $reporté }}</td>
                        <td>{{ $realisé }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
  </div>




