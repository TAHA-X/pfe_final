
<div class="d-flex justify-content-center flex-wrap gap-3">
    <div style="width:350px;" class="bg-light text-center pt-4 shadow-lg p-3 h4 rounded-4">
        <span>appartements vendu</span>
        <h1>
            @if(count($appartements) > 0)
                {{ number_format(count($appartements_vendu)*100/count($appartements), 2) }} %
            @else
                0
            @endif
        </h1>
    </div>
    
    <div style="width:350px;" class="bg-light text-center pt-4 shadow-lg p-3 h4 rounded-4">
        <span>appartements pasVendu</span>
        <h1>
            @if(count($appartements) > 0)
                {{ number_format(count($appartements_pas_vendu)*100/count($appartements), 2) }} %
            @else
                0
            @endif
        </h1>
    </div>
    
    <div style="width:350px;" class="bg-light text-center pt-4 shadow-lg p-3 h4 rounded-4">
        <span>appartements enCours</span>
        <h1>
            @if(count($appartements) > 0)
                {{ number_format(count($appartements_en_cours)*100/count($appartements), 2) }} %
            @else
                0
            @endif
        </h1>
    </div>
</div>
