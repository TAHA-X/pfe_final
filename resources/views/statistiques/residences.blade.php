<div id="chartResidences" style="height: 300px;"></div>
<script>
window.onload = function () {
    
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
            dataPoints:<?php echo json_encode($residences_list) ?>
        }]
    });
    chart.render();
    
    }
</script>