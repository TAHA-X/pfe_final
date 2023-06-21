@section('script')
    <!--residences-->
    $( document ).ready(function() {
    var chart = new CanvasJS.Chart("chartResidences", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title: {
    text: "top residences"
    },
    axisY: {
    title: "nombres de ventes",
    },
    axisX: {
    title: "residences"
    },
    data: [{
    type: "column",
    yValueFormatString: "#,##0.0#\"%\"",
    dataPoints:<?php echo json_encode($residences_list); ?>
    }]
    });
    chart.render();
    });

    <!--projets-->
    var chart = new CanvasJS.Chart("chartProjets", {

    theme: "light2", // "light1", "light2", "dark1", "dark2"
    exportEnabled: true,
    animationEnabled: true,
    title: {
    text: "top projets"
    },
    data: [{
    type: "pie",
    startAngle: 25,
    toolTipContent: "<b>{label}</b>: {y}%",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 16,
    indexLabel: "{label} - {y}%",
    dataPoints: <?php echo json_encode($projets_list);?>
    }]
    });
    chart.render();

    <!--residences detaills-->


    var chart = new CanvasJS.Chart("chartResidences_detaills", {
        animationEnabled: true,
        theme: "light2", //"light1", "dark1", "dark2"
        title:{
            text: "residences detailles"             
        },
        axisY:{
            interval: 10,
            suffix: "%"
        },
        toolTip:{
            shared: true
        },
        data:[   {
            type: "stackedBar100",
            toolTipContent: "<b>{name}:</b> {y} (#percent%)",
            showInLegend: true, 
            name: "en cours",
            dataPoints: 
                    <?php
                    $en_cours = [];
                    foreach ($residences_list as $r) {
                        $r = (object) $r;
                        array_push($en_cours, (object) ['y' =>$r->appartements_en_cours , 'label' => $r->label]);
                    }
                    echo json_encode($en_cours);
                    
                ?>
    },   {
        type: "stackedBar100",
        toolTipContent: "{label}<br><b>{name}:</b> {y} (#percent%)",
        showInLegend: true, 
        name: "vendu",
        dataPoints: 
                <?php
                $vendu = [];
                foreach ($residences_list as $r) {
                    $r = (object) $r;
                    array_push($vendu, (object) ['y' =>$r->y, 'label' =>$r->label]);
                }
                // dd($vendu);
                echo json_encode($vendu); 
                ?>
        },
            {
                type: "stackedBar100",
                toolTipContent: "<b>{name}:</b> {y} (#percent%)",
                showInLegend: true, 
                name: "pas vendu",
                dataPoints: 
                                    <?php
                        $pas_vendu = [];
                        foreach ($residences_list as $r) {
                            $r = (object) $r;
                            array_push($pas_vendu, (object) ['y' =>$r->appartements_pas_vendu , 'label' => $r->label]);
                        }
                        echo json_encode($pas_vendu);
                        
                        ?>
            }]
    });
    chart.render();


    <!-- rendez vous chartResidences_rendez_vous -->
    $( document ).ready(function() {
        var chart = new CanvasJS.Chart("chartResidences_rendez_vous", {
        animationEnabled: true,
        theme: "light2", 
        title: {
        text: "rendez-vous"
        },
        axisY: {
        title: "",
        },
        axisX: {
        title: ""
        },
        data: [{
        type: "column",
        yValueFormatString: "#,##0.0#\"%\"",
        dataPoints:
            <?php 
               echo json_encode($residences_rendez_vous_statistiques);
            ?>
        }]
        });
        chart.render();
        });
    $(document).ready( function () {
    $('#residences').DataTable();
    $("#rendez_vous").DataTable();
    });
@endsection
