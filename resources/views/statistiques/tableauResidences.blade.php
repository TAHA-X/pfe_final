

  <div style="min-width:45%;" class="table-responsive ">
    <table style="min-height:190px;" id="residences" class="table">
        <thead>
            <tr>
                <th>residence</th>
                <th>vendu</th>
                <th>pas vendu</th>
                <th>en cours</th>
            </tr>
        </thead>
        <tbody>
         
            @foreach ($residences_list as $residence)
                    <?php $residence = (object)$residence; ?>
                    <tr>
                        <td>{{ $residence->label }}</td>
                        <td>{{ $residence->y*100/$residence->all_appartements }} %</td>
                        <td>{{ $residence->appartements_pas_vendu*100/$residence->all_appartements }} %</td>
                        <td>{{ $residence->appartements_en_cours*100/$residence->all_appartements }} %</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
  </div>




